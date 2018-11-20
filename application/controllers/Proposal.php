<?php

class Proposal extends CI_Controller {

  public function view($proposal_id) {

    if ($this->session->userdata('logged_in')) {

      $account_id = $this->session->userdata('account_id');
      $org_type = $this->session->userdata('org_type');
      
      $record_oe = $this->proposals_model->viewOERecord($proposal_id);
      $records_far = $this->proposals_model->viewFARRecord($proposal_id);
      $records_ap = $this->proposals_model->viewAPRecord($proposal_id);
      $data['records_oe'] = $record_oe;
      $data['records_far'] = $records_far;
      $data['records_ap'] = $records_ap;

      if ($org_type == 'N/A') {
        if ($this->proposals_model->didIApproveThis($account_id, $proposal_id)) {
          $this->proposals_model->getDateTime($account_id, $proposal_id);
        }
      }
      $this->accounts_model->logMyActivity($account_id, 2, $proposal_id);

      $this->load->view('print/proposal', $data);
      // $account_id = $this->session->userdata('account_id');
      // $records = $this->proposals_model->viewAPRecord($proposal_id);
      // $proposal_status = $records->ProposalStatus;
      // $org_type = $this->session->userdata('org_type');

      // $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);

      // if ($proposal_status == 'UNDER REVISION') {
      //   $data['comments'] = $this->proposals_model->viewComments($proposal_id);
      //   $data['office'] = $this->proposals_model->getTheirOfficeInfo($records->OfficeProposal);

      //   if ($org_type != 'N/A') {
      //     $this->load->view('proposals/view_comments', $data);
      //   } else {
      //     $this->load->view('proposals/view_revision_office', $data);
      //   }

      // } else {
      // }

    } else {
      redirect(base_url() . "home");
    }

  }

  public function ask($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->proposals_model->getDateTime($account_id, $proposal_id);

    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $this->load->view('proposals/submit_comments', $data);
  }

  public function approve($proposal_id) {

    $account_id = $this->session->userdata('account_id');
    $org_type = $this->session->userdata('org_type');

    if ($org_type != 'N/A' || !$this->proposals_model->didIApproveThis($account_id, $proposal_id)) {
      redirect(base_url() . "home");
    }

    $next_office = $this->proposals_model->nextOffice($account_id, $proposal_id);
    $next_position = $this->proposals_model->nextOfficePosition($next_office, $proposal_id);
    $far = $this->proposals_model->checkIfFARExists($proposal_id, $account_id);
    $oe = $this->proposals_model->checkIfOEExists($proposal_id, $account_id);

    $this->proposals_model->forwardProposal($next_office, $next_position, $proposal_id, $account_id, $far, $oe);

    $this->accounts_model->logMyActivity($account_id, 3, $proposal_id);

    $this->proposals_model->approveTracker($account_id, $proposal_id);

    $org_id = $this->proposals_model->whoseProposal($proposal_id);
    $next_office = $this->proposals_model->nextOffice($account_id, $proposal_id);

    if ($account_id == 'OD') {
      $next_office = '';
      $this->notifications_model->sendNotification($proposal_id, $org_id, 1, $next_office);

    } else {

      if ($this->proposals_model->checkIfBPExists($proposal_id)) {
        if ($account_id == 'SC_SG' || $account_id == 'SC_TR') {
          if ($this->proposals_model->checkOfficerApproval($proposal_id, $account_id)) {
            $this->notifications_model->sendNotification($proposal_id, $org_id, 0, $next_office);
          } else {
            $this->notifications_model->sendNotification($proposal_id, $org_id, 0, 'N/A');
          }
        } else {
          $this->notifications_model->sendNotification($proposal_id, $org_id, 0, $next_office);
        }

      } else {

        $this->notifications_model->sendNotification($proposal_id, $org_id, 0, $next_office);

      }

    }

    redirect("home");

  }

  public function create() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $activity_name = $this->input->post('activity_name', true);
    $account_id = $this->session->userdata('account_id');
    $proposal_id = $this->input->post('proposal_id', true);
    $activity_name = $this->input->post('activity_name', true);
    $date_activity = $this->input->post('date_activity', true);
    $contact_number = $this->input->post('contact_number', true);
    $start_time = $this->input->post('start_time_activity', true);
    $end_time = $this->input->post('end_time_activity', true);
    $nature = $this->input->post('nature', true);
    $objectives = $this->input->post('objectives', true);
    $rationale = $this->input->post('rationale', true);
    $activity_chair = $this->input->post('activity_chair', true);
    $participants = $this->input->post('participants', true);
    $activity_venue = $this->input->post('activity_venue', true);
    $proposal_type1 = $this->input->post('proposal_type1', true);
    $proposal_type2 = $this->input->post('proposal_type2', true);
    $non_academic_type = $this->input->post('non_academic_type', true);
    $collab_partner = $this->input->post('collab_partner', true);
    $specified_ex = $this->input->post('specified_ex', true);
    $specified_co = $this->input->post('specified_co', true);

    if ($specified_ex == '' && $specified_co != '') {
      $specified = $specified_co;
    } else if ($specified_ex != '' && $specified_co == '') {
      $specified = $specified_ex;
    } else {
      $specified = "";
    }

    // if ($proposal_id == '') {  
    //   $proposal_id = rand(1000, 9999);
    // }

    $oe_id = $this->input->post('oe_id');
    $far_id = $this->input->post('far_id');

    if ($this->proposals_model->createActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $objectives, $rationale, $activity_chair, $participants,
      $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
      $collab_partner, $specified)) {

      $response['success'] = true;
      $response['proposal_id'] = $proposal_id;

      if ($far_id != null) {
        $far_count = count($far_id);

        if ($far_count > 1) {

          for ($counter = 0; $counter < $far_count; $counter++) {

            $far_id = $this->input->post('far_id', true)[$counter];
            $account_id = $this->session->userdata('account_id');
            $far_item = $this->input->post('far_item', true)[$counter];
            $far_quantity = $this->input->post('far_quantity', true)[$counter];
            $far_unit = $this->input->post('far_unit', true)[$counter];
            $far_total_amount = $this->input->post('far_total_amount', true)[$counter];
            $far_source = $this->input->post('far_source', true)[$counter];

            if ($this->proposals_model->checkFAR($far_id)) {

              $this->proposals_model->saveFAR($account_id, $proposal_id, $far_item,
                $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);
    
            } else {
              $this->proposals_model->newFAR($account_id, $proposal_id, $far_item,
                $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);
    
            }
          }
        } else {

          $account_id = $this->session->userdata('account_id');
          $far_item = $this->input->post('far_item', true)[0];
          $far_quantity = $this->input->post('far_quantity', true)[0];
          $far_unit = $this->input->post('far_unit', true)[0];
          $far_total_amount = $this->input->post('far_total_amount', true)[0];
          $far_source = $this->input->post('far_source', true)[0];
          $far_id = $this->input->post('far_id', true)[0];

          if ($this->proposals_model->checkFAR($far_id)) {

            $this->proposals_model->saveFAR($account_id, $proposal_id, $far_item,
              $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);
  
          } else {
            $this->proposals_model->newFAR($account_id, $proposal_id, $far_item,
              $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);
  
          }
        }

      }

      if ($oe_id != null) {
        $oe_count = count($oe_id);
        if ($oe_count > 1) {

          for ($counter = 0; $counter < $oe_count; $counter++) {

            $oe_id = $this->input->post('oe_id', true)[$counter];
            $account_id = $this->session->userdata('account_id');
            $oe_item = $this->input->post('oe_item', true)[$counter];
            $oe_quantity = $this->input->post('oe_quantity', true)[$counter];
            $oe_unit = $this->input->post('oe_unit', true)[$counter];
            $oe_total_amount = $this->input->post('oe_total_amount', true)[$counter];
            $oe_source = $this->input->post('oe_source', true)[$counter];

            if ($this->proposals_model->checkOE($oe_id)) {

              $this->proposals_model->saveOE($account_id, $proposal_id, $oe_item,
                $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);
    
            } else {
              $this->proposals_model->newOE($account_id, $proposal_id, $oe_item,
                $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);
    
            }
          }
        } else {

          $account_id = $this->session->userdata('account_id');
          $oe_item = $this->input->post('oe_item', true)[0];
          $oe_quantity = $this->input->post('oe_quantity', true)[0];
          $oe_unit = $this->input->post('oe_unit', true)[0];
          $oe_total_amount = $this->input->post('oe_total_amount', true)[0];
          $oe_source = $this->input->post('oe_source', true)[0];
          $oe_id = $this->input->post('oe_id', true)[0];

          if ($this->proposals_model->checkOE($oe_id)) {

            $this->proposals_model->saveOE($account_id, $proposal_id, $oe_item,
              $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);
  
          } else {
            $this->proposals_model->newOE($account_id, $proposal_id, $oe_item,
              $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);
  
          }
        }
      }

      $this->accounts_model->logMyActivity($account_id, 8, $proposal_id);
      echo json_encode($response);

    } else {
      $response['success'] = false;
      echo json_encode($response);
    }
  }

  public function edit($proposal_id) {

    $account_id = $this->session->userdata('account_id');
    $data['ap_record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $data['far_records'] = $this->proposals_model->viewFARRecord($proposal_id);
    $data['oe_records'] = $this->proposals_model->viewOERecord($proposal_id);

    $this->load->view('proposals/activity_proposal', $data);

  }

  public function delete($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->accounts_model->logMyActivity($account_id, 11, 0);
    $this->proposals_model->deleteThis($proposal_id);
    redirect(base_url() . "home");
  }

  public function deleteFAR($far_id) {
    $response = array();

    $result = $this->proposals_model->deleteRowFAR($far_id);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);
    } else {
      $response['success'] = true;
      echo json_encode($response);
    }
  }

  public function deleteOE($oe_id) {
    $response = array();

    $result = $this->proposals_model->deleteRowOE($oe_id);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);
    } else {
      $response['success'] = true;
      echo json_encode($response);
    }
  }

  public function save_ap() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $proposal_id = $this->input->post('proposal_id', true);
    $activity_name = $this->input->post('activity_name', true);
    $date_activity = $this->input->post('date_activity', true);
    $contact_number = $this->input->post('contact_number', true);
    $start_time = $this->input->post('start_time_activity', true);
    $end_time = $this->input->post('end_time_activity', true);
    $nature = $this->input->post('nature', true);
    $objectives = $this->input->post('objectives', true);
    $rationale = $this->input->post('rationale', true);
    $activity_chair = $this->input->post('activity_chair', true);
    $participants = $this->input->post('participants', true);
    $activity_venue = $this->input->post('activity_venue', true);
    $proposal_type1 = $this->input->post('proposal_type1', true);
    $proposal_type2 = $this->input->post('proposal_type2', true);
    $non_academic_type = $this->input->post('non_academic_type', true);
    $collab_partner = $this->input->post('collab_partner', true);
    $specified_ex = $this->input->post('specified_ex', true);
    $specified_co = $this->input->post('specified_co', true);

    if ($specified_ex == '' && $specified_co != '') {
      $specified = $specified_co;
    } else if ($specified_ex != '' && $specified_co == '') {
      $specified = $specified_ex;
    } else {
      $specified = "";
    }

    $this->proposals_model->saveActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $objectives, $rationale, $activity_chair, $participants,
      $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
      $collab_partner, $specified);

    $this->accounts_model->logMyActivity($account_id, 7, 0);

  }

  public function save_far() {
    $response = array();

    $far_count = count($this->input->post('far_id'));

    if ($far_count > 1) {

      for ($counter = 0; $counter < $far_count; $counter++) {

        $far_id = $this->input->post('far_id', true)[$counter];
        $account_id = $this->session->userdata('account_id');
        $proposal_id = $this->input->post('proposal_id', true);
        $far_item = $this->input->post('far_item', true)[$counter];
        $far_quantity = $this->input->post('far_quantity', true)[$counter];
        $far_unit = $this->input->post('far_unit', true)[$counter];
        $far_total_amount = $this->input->post('far_total_amount', true)[$counter];
        $far_source = $this->input->post('far_source', true)[$counter];

        if ($this->proposals_model->checkFAR($far_id)) {

          $this->proposals_model->saveFAR($account_id, $proposal_id, $far_item,
            $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);

        } else {
          $this->proposals_model->newFAR($account_id, $proposal_id, $far_item,
            $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);

        }
      }
    } else {

      $account_id = $this->session->userdata('account_id');
      $proposal_id = $this->input->post('proposal_id', true);
      $far_item = $this->input->post('far_item', true)[0];
      $far_quantity = $this->input->post('far_quantity', true)[0];
      $far_unit = $this->input->post('far_unit', true)[0];
      $far_total_amount = $this->input->post('far_total_amount', true)[0];
      $far_source = $this->input->post('far_source', true)[0];
      $far_id = $this->input->post('far_id', true)[0];

      if ($this->proposals_model->checkFAR($far_id)) {

        $this->proposals_model->saveFAR($account_id, $proposal_id, $far_item,
          $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);

      } else {
        $this->proposals_model->newFAR($account_id, $proposal_id, $far_item,
          $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);

      }
    }

    $response['success'] = true;
    echo json_encode($response);

    $this->accounts_model->logMyActivity($account_id, 7, 0);

  }

  public function save_oe() {
    $response = array();

    $oe_count = count($this->input->post('oe_id'));

    if ($oe_count > 1) {

      for ($counter = 0; $counter < $oe_count; $counter++) {

        $oe_id = $this->input->post('oe_id', true)[$counter];
        $account_id = $this->session->userdata('account_id');
        $proposal_id = $this->input->post('proposal_id', true);
        $oe_item = $this->input->post('oe_item', true)[$counter];
        $oe_quantity = $this->input->post('oe_quantity', true)[$counter];
        $oe_unit = $this->input->post('oe_unit', true)[$counter];
        $oe_total_amount = $this->input->post('oe_total_amount', true)[$counter];
        $oe_source = $this->input->post('oe_source', true)[$counter];

        if ($this->proposals_model->checkOE($oe_id)) {

          $this->proposals_model->saveOE($account_id, $proposal_id, $oe_item,
            $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);

        } else {
          $this->proposals_model->newOE($account_id, $proposal_id, $oe_item,
            $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);

        }
      }
    } else {

      $account_id = $this->session->userdata('account_id');
      $proposal_id = $this->input->post('proposal_id', true);
      $oe_item = $this->input->post('oe_item', true)[0];
      $oe_quantity = $this->input->post('oe_quantity', true)[0];
      $oe_unit = $this->input->post('oe_unit', true)[0];
      $oe_total_amount = $this->input->post('oe_total_amount', true)[0];
      $oe_source = $this->input->post('oe_source', true)[0];
      $oe_id = $this->input->post('oe_id', true)[0];

      if ($this->proposals_model->checkOE($oe_id)) {

        $this->proposals_model->saveOE($account_id, $proposal_id, $oe_item,
          $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);

      } else {
        $this->proposals_model->newOE($account_id, $proposal_id, $oe_item,
          $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);

      }
    }

    $response['success'] = true;
    echo json_encode($response);
    $this->accounts_model->logMyActivity($account_id, 7, 0);

  }

  public function submit($proposal_id) {
    $org_type = $this->session->userdata('org_type');
    $bp = false;

    if ($proposal_id == null) {
      redirect(base_url() . "home");
    }

    $account_id = $this->session->userdata('account_id');
    $activity_name = $this->input->post('activity_name', true);
    $account_id = $this->session->userdata('account_id');
    $proposal_id = $this->input->post('proposal_id', true);
    $activity_name = $this->input->post('activity_name', true);
    $date_activity = $this->input->post('date_activity', true);
    $contact_number = $this->input->post('contact_number', true);
    $start_time = $this->input->post('start_time_activity', true);
    $end_time = $this->input->post('end_time_activity', true);
    $nature = $this->input->post('nature', true);
    $objectives = $this->input->post('objectives', true);
    $rationale = $this->input->post('rationale', true);
    $activity_chair = $this->input->post('activity_chair', true);
    $participants = $this->input->post('participants', true);
    $activity_venue = $this->input->post('activity_venue', true);
    $proposal_type1 = $this->input->post('proposal_type1', true);
    $proposal_type2 = $this->input->post('proposal_type2', true);
    $non_academic_type = $this->input->post('non_academic_type', true);
    $collab_partner = $this->input->post('collab_partner', true);
    $specified_ex = $this->input->post('specified_ex', true);
    $specified_co = $this->input->post('specified_co', true);

    if ($specified_ex == '' && $specified_co != '') {
      $specified = $specified_co;
    } else if ($specified_ex != '' && $specified_co == '') {
      $specified = $specified_ex;
    } else {
      $specified = "";
    }

    $oe_id = $this->input->post('oe_id');
    $far_id = $this->input->post('far_id');

    if ($this->proposals_model->submitActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $objectives, $rationale, $activity_chair, $participants,
      $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
      $collab_partner, $specified)) {

      $response['success'] = true;
      $response['proposal_id'] = $proposal_id;

      if ($far_id != null) {
        $bp = true;
        $far_count = count($far_id);

        if ($far_count > 1) {

          for ($counter = 0; $counter < $far_count; $counter++) {

            $far_id = $this->input->post('far_id', true)[$counter];
            $account_id = $this->session->userdata('account_id');
            $far_item = $this->input->post('far_item', true)[$counter];
            $far_quantity = $this->input->post('far_quantity', true)[$counter];
            $far_unit = $this->input->post('far_unit', true)[$counter];
            $far_total_amount = $this->input->post('far_total_amount', true)[$counter];
            $far_source = $this->input->post('far_source', true)[$counter];

            $this->proposals_model->submitFAR($account_id, $proposal_id, $far_item,
              $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);
          }
        } else {

          $account_id = $this->session->userdata('account_id');
          $far_item = $this->input->post('far_item', true)[0];
          $far_quantity = $this->input->post('far_quantity', true)[0];
          $far_unit = $this->input->post('far_unit', true)[0];
          $far_total_amount = $this->input->post('far_total_amount', true)[0];
          $far_source = $this->input->post('far_source', true)[0];
          $far_id = $this->input->post('far_id', true)[0];

          $this->proposals_model->submitFAR($account_id, $proposal_id, $far_item,
            $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id);
        }

      }

      if ($oe_id != null) {
        $bp = true;
        $oe_count = count($oe_id);

        if ($oe_count > 1) {

          for ($counter = 0; $counter < $oe_count; $counter++) {

            $oe_id = $this->input->post('oe_id', true)[$counter];
            $account_id = $this->session->userdata('account_id');
            $oe_item = $this->input->post('oe_item', true)[$counter];
            $oe_quantity = $this->input->post('oe_quantity', true)[$counter];
            $oe_unit = $this->input->post('oe_unit', true)[$counter];
            $oe_total_amount = $this->input->post('oe_total_amount', true)[$counter];
            $oe_source = $this->input->post('oe_source', true)[$counter];

            $this->proposals_model->submitOE($account_id, $proposal_id, $oe_item,
              $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);
          }
        } else {

          $account_id = $this->session->userdata('account_id');
          $oe_item = $this->input->post('oe_item', true)[0];
          $oe_quantity = $this->input->post('oe_quantity', true)[0];
          $oe_unit = $this->input->post('oe_unit', true)[0];
          $oe_total_amount = $this->input->post('oe_total_amount', true)[0];
          $oe_source = $this->input->post('oe_source', true)[0];
          $oe_id = $this->input->post('oe_id', true)[0];

          $this->proposals_model->submitOE($account_id, $proposal_id, $oe_item,
            $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id);
        }

      }

      $this->accounts_model->logMyActivity($account_id, 9, $proposal_id);
      $this->notifications_model->createNotifications($proposal_id, $account_id, $bp);
      $this->proposals_model->insertTracker($account_id, $proposal_id);
      echo json_encode($response);

    } else {
      $response['success'] = false;
      echo json_encode($response);
    }

  }

  public function tracker($proposal_id) {
    $flag = $this->input->post('flag', true);

    if ($flag == '') {
      redirect('home');
    } else {
      echo "henlo";
    }
  }

  public function review($proposal_id) {

    $account_id = $this->session->userdata('account_id');
    $data['ap_record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $data['far_records'] = $this->proposals_model->viewFARRecord($proposal_id);
    $data['oe_records'] = $this->proposals_model->viewOERecord($proposal_id);

    $this->load->view('proposals/review_proposal', $data);

  } 

}

?>