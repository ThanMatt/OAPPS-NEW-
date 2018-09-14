<?php

class Submit extends CI_Controller {

  public function index() {

    $response = array();

    if (!isset($_POST['radio'])) {
      $radio = "no_bp";
      $foo = false;
    } else {
      $radio = $this->input->post('radio');
      $foo = true;
    }

    if ($radio == "yes_bp") {
      $bp_check = true;
    } else {
      $bp_check = false;
    }

    $data['check'] = $bp_check;
    $data['foo'] = $foo;
    
    if ($foo) {
      $response = $this->load->view('layouts/activity_proposal', $data); 
    } else {
      $this->load->view('layouts/activity_proposal', $data);
    }
  }


}

?>