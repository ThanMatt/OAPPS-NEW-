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
    redirect('home');
  }

  public function save() {
    $response = array();

    // $proposal_id = $this->session->flashdata('proposal_id');
    $account_id = $this->session->userdata('account_id');
    $proposal_id = $this->input->post('proposal_id', true);
    $activity_name = $this->input->post('activity_name', true);
    $date_activity = $this->input->post('date_activity', true);
    $start_time = $this->input->post('start_time_activity', true);
    $end_time = $this->input->post('end_time_activity', true);
    $nature = $this->input->post('nature', true);
    $rationale = $this->input->post('rationale', true);
    $activity_chair = $this->input->post('activity_chair', true);
    $participants = $this->input->post('participants', true);
    $activity_venue = $this->input->post('activity_venue', true);

    $this->proposals_model->saveActivityProposal($account_id, $proposal_id, $activity_name, $date_activity,
      $start_time, $end_time, $nature, $rationale, $activity_chair, $participants,
      $activity_venue);
  }

}

?>