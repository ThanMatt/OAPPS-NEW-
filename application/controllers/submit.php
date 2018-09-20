<?php

class Submit extends CI_Controller {

  public function index() {

    $response = array();

    $proposal_id = rand(1000, 9999);

    if (!isset($_POST['radio'])) {
      $radio = "no_bp";
      $foo = false;
    } else {
      $radio = $this->input->post('radio');
      $foo = true;
    }

    if ($radio == "yes_bp") {
      $bp_check = true;

      if (isset($_POST['oe'])) {
        $oe_id = rand(1000, 9999);
        // $oe = $this->input->post('oe');
      } else {
        $oe_id = false;
      }

      if (isset($_POST['far'])) {
        $far_id = rand(1000, 9999);
      } else {
        $far_id = false;
      }

    } else {
      $bp_check = false;
      $oe_id = false;
      $far_id = false;
    }

    $data['check'] = $bp_check;
    $data['foo'] = $foo;

    if ($foo) {

      $proposal_data = array(
        'proposal_id' => $proposal_id,
        'oe_id' => $oe_id,
        'far_id' => $far_id,
      );

      $this->session->set_flashdata($proposal_data);

      $response = $this->load->view('create_view', $data);

    } else {
      $this->load->view('create_view', $data);
    }
  }

  public function success($proposal_id) {

    $org_type = $this->session->userdata('org_type');

    if ($org_type != 'N/A') {
      $records = $this->proposals_model->viewAPRecord($proposal_id);
      $data['proposal'] = $records;
      $this->load->view('success_view', $data);
    }

  }

  public function revision($proposal_id) {

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

    $inputs = array (
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

    if ($this->proposals_model->submitRevision($field_name, $values, $proposal_id)) {
      $account_id = $this->session->userdata('account_id');
      $this->proposals_model->reviseTracker($account_id, $proposal_id);
    } else {
      echo "You are out";
    }

  }

}

?>