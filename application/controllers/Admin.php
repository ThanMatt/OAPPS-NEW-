<?php

class Admin extends CI_Controller {

  //:: sub-sites
  public function index() {
    $response = array();
    $admin_id = $this->session->userdata('admin_id');
    $full_name = $this->session->userdata('full_name');

    $this->load->view('admin_main');

  }

  public function profile() {
    $admin_id = $this->session->userdata('admin_id');
    $type = $this->session->userdata('org_type');

    $approved_records = $this->proposals_model->getApprovedRecords($admin_id, $type);
    $pending_records = $this->proposals_model->getPendingRecords($admin_id, $type);

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
