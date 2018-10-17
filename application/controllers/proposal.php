<?php

class Proposal extends CI_Controller {

  public function view($proposal_id) {

    if ($this->session->userdata('logged_in')) {

      $account_id = $this->session->userdata('account_id');
      $records = $this->proposals_model->viewAPRecord($proposal_id);
      $proposal_status = $records->ProposalStatus;
      $org_type = $this->session->userdata('org_type');

      $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);

      $this->accounts_model->logMyActivity($account_id, 2, $proposal_id);
      if ($proposal_status == 'UNDER REVISION') {
        $data['comments'] = $this->proposals_model->viewComments($proposal_id);
        $data['office'] = $this->proposals_model->getTheirOfficeInfo($records->OfficeProposal);

        if ($org_type != 'N/A') {
          $this->load->view('layouts/view_comments', $data);
        } else {
          $this->load->view('layouts/view_revision_office', $data);
        }

      } else {
        $this->proposals_model->getDateTime($account_id, $proposal_id);
        $this->load->view('layouts/view_ap', $data);
      }

    } else {
      redirect(base_url() . "home");
    }

  }

  public function ask($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->proposals_model->getDateTime($account_id, $proposal_id);

    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $this->load->view('layouts/submit_comments', $data);
  }

  public function approve($proposal_id) {

    $account_id = $this->session->userdata('account_id');
    $org_type = $this->session->userdata('org_type');

    if ($org_type != 'N/A' || !$this->proposals_model->didIApproveThis($account_id, $proposal_id)) {
      redirect(base_url() . "home");
    }

    $next_office = $this->proposals_model->nextOffice($account_id, $proposal_id);
    $next_position = $this->proposals_model->nextOfficePosition($next_office, $proposal_id);

    $this->proposals_model->forwardAP($next_office, $next_position, $proposal_id);

    $this->accounts_model->logMyActivity($account_id, 3, $proposal_id);

    $this->proposals_model->approveTracker($account_id, $proposal_id);
    redirect(base_url() . "proposal/view/" . $proposal_id);

  }

  public function create() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $activity_name = $this->input->post('activity_name', true);
    $proposal_id = $this->session->flashdata('proposal_id');
    $oe_id = $this->session->flashdata('oe_id');
    $far_id = $this->session->flashdata('far_id');

    if ($this->proposals_model->createActivityProposal($proposal_id, $account_id, $activity_name)) {
      $response['success'] = true;
      $response['proposal_id'] = $proposal_id;

      if ($oe_id != false) {
        $this->proposals_model->createOE($proposal_id, $account_id, $oe_id);
      }

      if ($far_id != false) {
        $this->proposals_model->createFAR($proposal_id, $account_id, $far_id);
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
    $data['far_record'] = $this->proposals_model->viewFARRecord($proposal_id);
    $data['oe_record'] = $this->proposals_model->viewOERecord($proposal_id);

    $this->load->view('layouts/activity_proposal', $data);

  }

  public function delete($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->accounts_model->logMyActivity($account_id, 11, 0);
    $this->proposals_model->deleteThis($proposal_id);
    redirect(base_url() . "home");
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
      $start_time, $end_time, $nature, $rationale, $activity_chair, $participants,
      $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
      $collab_partner, $specified);

    $this->accounts_model->logMyActivity($account_id, 7, 0);

  }

  public function save_far() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $proposal_id = $this->input->post('proposal_id', true);
    $far_item = $this->input->post('far_item', true);
    $far_quantity = $this->input->post('far_quantity', true);
    $far_unit = $this->input->post('far_unit', true);
    $far_total_amount = $this->input->post('far_total_amount', true);
    $far_source = $this->input->post('far_source', true);

    $this->proposals_model->saveFAR($account_id, $proposal_id, $far_item,
      $far_quantity, $far_unit, $far_total_amount, $far_source);

    $this->accounts_model->logMyActivity($account_id, 7, 0);

  }

  public function save_oe() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $proposal_id = $this->input->post('proposal_id', true);
    $oe_item = $this->input->post('oe_item', true);
    $oe_quantity = $this->input->post('oe_quantity', true);
    $oe_unit = $this->input->post('oe_unit', true);
    $oe_total_amount = $this->input->post('oe_total_amount', true);
    $oe_source = $this->input->post('oe_source', true);

    $this->proposals_model->saveOE($account_id, $proposal_id, $oe_item,
      $oe_quantity, $oe_unit, $oe_total_amount, $oe_source);

    $this->accounts_model->logMyActivity($account_id, 7, 0);
  }

  public function submit($proposal_id) {

    if ($proposal_id == null) {
      redirect(base_url() . "home");
    }

    $proposal_id = $this->input->post('proposal_id');
    $account_id = $this->session->userdata('account_id');
    $contact_number = $this->input->post('contact_number', true);
    $activity_name = $this->input->post('activity_name', true);
    $date_activity = $this->input->post('date_activity', true);
    $start_time = $this->input->post('start_time_activity', true);
    $end_time = $this->input->post('end_time_activity', true);
    $nature = $this->input->post('nature', true);
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

    $this->proposals_model->submitActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $rationale, $activity_chair, $participants,
      $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
      $collab_partner, $specified);

    $this->proposals_model->insertTracker($account_id, $proposal_id);
    $this->accounts_model->logMyActivity($account_id, 9, 0);
  }

  public function tracker($proposal_id) {
    $flag = $this->input->post('flag', true);

    if ($flag == '') {
      redirect('home');
    } else {
      echo "henlo";
    }
  }

}

?>