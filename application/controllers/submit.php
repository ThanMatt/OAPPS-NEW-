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

    $records = $this->proposals_model->viewAPRecord($proposal_id);
    $data['proposal'] = $records;
    $this->load->view('success_view', $data);

  }

  public function revision($proposal_id) {
    $activity_name = $this->post->input('activity_name', true);
    $date = $this->post->input('date_activity', true);
    $time = $this->post->input('time_activity', true);
    $nature = $this->post->input('nature', true);
    $rationale = $this->post->input('rationale', true);
    $activity_chair = $this->post->input('activity_chair', true);
    $contact_number = $this->post->input('contact_number', true);
    $participants = $this->post->input('participants', true);
    $venue = $this->post->input('activity_venue', true);
    $proposal_type1 = $this->post->input('proposal_type1', true);
    $proposal_type2 = $this->post->input('proposal_type2', true);

    

  }

}

?>