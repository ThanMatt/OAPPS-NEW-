<?php

class Submit extends CI_Controller {

  public function index() {

    $this->load->view('proposals/create_view');

  }

  public function success($proposal_id) {

    $org_type = $this->session->userdata('org_type');
    $records = $this->proposals_model->viewAPRecord($proposal_id);
    $data['proposal'] = $records;
    $this->load->view('success_view', $data);

  }

  public function revision($proposal_id) {

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

    if ($this->proposals_model->submitRevision($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $rationale, $activity_chair, $participants,
      $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
      $collab_partner, $specified)) {

      $this->accounts_model->logMyActivity($account_id, 6, $proposal_id);

      $records = $this->proposals_model->viewAPRecord($proposal_id);

      $office_id = $records->OfficeProposal;

      if ($this->proposals_model->deleteComments($proposal_id)) {
        $this->proposals_model->updateTracker($office_id, $proposal_id);
        $this->success($proposal_id);
      }
    }

  }

  public function comments($proposal_id) {

    $activity_name = $this->input->post('activity_name', true);
    $date = $this->input->post('date_activity', true);
    $time = $this->input->post('time_activity', true);
    $nature = $this->input->post('nature', true);
    $rationale = $this->input->post('rationale', true);
    $activity_chair = $this->input->post('activity_chair', true);
    $contact_number = $this->input->post('contact_number', true);
    $participants = $this->input->post('participants', true);
    $venue = $this->input->post('activity_venue', true);
    $proposal_type1 = $this->input->post('proposal_type1', true);
    $proposal_type2 = $this->input->post('proposal_type2', true);

    $inputs = array(
      'Activity Name' => $activity_name,
      'Date of Activity' => $date,
      'Time' => $time,
      'Nature' => $nature,
      'Rationale' => $rationale,
      'Activity Chair' => $activity_chair,
      'Contact Number' => $contact_number,
      'Participants' => $participants,
      'Venue' => $venue,
      'Proposal Type 1' => $proposal_type1,
      'Proposal Type 2' => $proposal_type2,
    );

    $values = array();
    $field_name = array();

    foreach ($inputs as $key => $value) {
      if ($value != '') {
        $values[] = $value;
        $field_name[] = $key;
      } else {
        continue;
      }
    }

    if ($this->proposals_model->submitComments($field_name, $values, $proposal_id)) {
      $account_id = $this->session->userdata('account_id');
      $this->accounts_model->logMyActivity($account_id, 4, $proposal_id);
      $this->proposals_model->reviseTracker($account_id, $proposal_id);
      $this->success($proposal_id);

    } else {
      echo "You are out";
    }

  }

}

?>
