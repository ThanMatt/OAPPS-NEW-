<?php

class Home extends CI_Controller {

  //:: sub-sites
  public function index() {
    $response = array();

    if (!isset($_POST['flag'])) {
      $flag = 'Pending';
    } else {
      $flag = $this->input->post('flag');
    }

    $record = false;

    if ($flag == 'View') {
      $proposal_title = $this->input->post('proposal_title');

      $record = $this->proposals_model->viewRecord($proposal_title);

      $data['records'] = null;

      if ($record) {
        $data['records'] = $record;
        $response = $this->load->view('layouts/display', $data);
      } 

    } else {

      if ($flag == 'Pending') {
        $record = $this->proposals_model->getPendingRecords();
      } else if ($flag == 'Approved') {
        $record = $this->proposals_model->getApprovedRecords();
      } else if ($flag == 'Revisions') {
        $record = $this->proposals_model->getRevisionRecords();
      } else if ($flag == 'Drafts') {
        $record = $this->proposals_model->getDraftRecords();
      }

      $data['records'] = null;
      $data['title'] = $flag;

      if ($record) {

        $data['records'] = $record;
        $response = $this->load->view('layouts/main', $data);

      } else {
        $this->load->view('layouts/main', $data);
      }

    }

  }

}

?>
