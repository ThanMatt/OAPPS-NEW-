<?php

class Home extends CI_Controller {

  //:: sub-sites
  public function index() {
    $response = array();
    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');
    $position = $this->session->userdata('position');

    if (!isset($_POST['flag'])) {
      $flag = 'Pending';
    } else {
      $flag = $this->input->post('flag');
    }

    $record = false;

    if ($flag == 'View') {
      $proposal_id = $this->input->post('proposal_id');

      $this->notifications_model->readNotification($proposal_id, $account_id);
      $record = $this->proposals_model->viewAPRecord($proposal_id);

      $data['records'] = null;

      if ($record) {
        $data['records'] = $record;
        $response = $this->load->view('layouts/display', $data);
      } 

    } else {

      if ($flag == 'Pending') {
        
        $record = $this->proposals_model->getPendingRecords($account_id, $type);
      } else if ($flag == 'Approved') {
        $record = $this->proposals_model->getApprovedRecords($account_id, $type);
      } else if ($flag == 'Revisions') {
        $record = $this->proposals_model->getRevisionRecords($account_id, $type, $position);
      } else if ($flag == 'Drafts') {
        $record = $this->proposals_model->getDraftRecords($account_id);
      }

      $data['records'] = null;
      $data['title'] = $flag;

      if ($record) {

        $data['records'] = $record;
        $response = $this->load->view('main', $data);

      } else {
        $this->load->view('main', $data);
      }

    }

  }

  public function profile() {
    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');

    $approved_records = $this->proposals_model->getApprovedRecords($account_id, $type);
    $pending_records = $this->proposals_model->getPendingRecords($account_id, $type);


    $data['approved_records'] = 'No Records';
    $data['pending_records'] = 'No Records';
    

    if ($approved_records || $pending_records) {

      $data['approved_records'] = $approved_records;
      $data['pending_records'] = $pending_records;
    }
    $this->load->view('users/profile', $data);


  }


}

?>
