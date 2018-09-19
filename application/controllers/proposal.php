<?php

class Proposal extends CI_Controller {

  public function view($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->proposals_model->getDateTime($account_id, $proposal_id);

    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $this->load->view('layouts/view_ap', $data);
  }

  public function revise($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->proposals_model->getDateTime($account_id, $proposal_id);

    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $this->load->view('layouts/submit_revision', $data);
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

      echo json_encode($response);

    } else {
      $response['success'] = false;
      echo json_encode($response);
    }
  }

  public function edit($proposal_id) {

    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);

    $this->load->view('layouts/activity_proposal', $data);

  }

  public function delete($proposal_id) {
    $this->proposals_model->deleteThis($proposal_id);
    redirect(base_url() . "home");
  }

  public function save() {
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

  }

}

?>