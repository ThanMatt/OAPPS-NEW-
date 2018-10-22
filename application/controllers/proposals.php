<?php

class Proposals extends CI_Controller {

  //:: Fix this
  public function save() {
    $response = array();

    // $proposal_id = $this->session->flashdata('proposal_id');
    $account_id = $this->session->userdata('account_id');
    $activity_name = $this->input->post('activity_name', true);
    $date_activity = $this->input->post('date_activity', true);
    $start_time = $this->input->post('start_time_activity', true);
    $end_time = $this->input->post('end_time_activity', true);
    $nature = $this->input->post('nature', true);
    $rationale = $this->input->post('rationale', true);
    $activity_chair = $this->input->post('activity_chair', true);
    $participants = $this->input->post('participants', true);
    $activity_venue = $this->input->post('activity_venue', true);

    $this->proposals_model->save_activity_proposal($account_id, $proposal_id, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $rationale, $activity_chair, $participants,
      $activity_venue);
  }

}

?>