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

}

?>