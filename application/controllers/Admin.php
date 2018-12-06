<?php

class Admin extends CI_Controller {

  //:: sub-sites
  public function index() {
    $response = array();
    $admin_id = $this->session->userdata('admin_id');
    $full_name = $this->session->userdata('full_name');


    $data['logs'] = $this->logs_model->showLogs();
    $this->load->view('admin/admin_main', $data);

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

  public function displayLogs() {
    $data['logs'] = $this->logs_model->showLogs();
    $this->load->view('layouts/display_logs', $data);
  }

  public function add() {

    $this->load->view('admin/admin_add');

  }

  public function modify() {

    $response = array();

    $account_id = $this->input->post('account_id', true);
    $account_id2 = $this->input->post('account_id2', true);
    $organization = $this->input->post('organization', true);
    $password = $this->input->post('password', true);
    $full_name = $this->input->post('full_name', true);
    $email = $this->input->post('email', true);
    $contact_number = $this->input->post('contact_number', true);
    $batch = $this->input->post('batch', true);
    $type = $this->input->post('type', true);

    if ($password != null || $password != '') {
      $password = $this->admin_model->hashMyPass($password);
    }

    if (!empty($_FILES['logo']['tmp_name'])) {

      //:: Logo upload configuration
      $config = array(
        'upload_path' => 'uploads/logos',
        'allowed_types' => 'jpg|jpeg|png',
        'max_size' => '3072' //:: Maximum file size (in kb)
      );
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      
      if (!$this->upload->do_upload('logo')) {
        $data = array(
          'error' => $this->upload->display_errors(),
        );
        $this->session->set_flashdata($data);
        redirect('admin/edit');
        exit;
      } else {
        $data_logo = $this->upload->data();
        $logo = $data_logo['file_name'];
      }
    } else {
      $logo = '';
    }

    //:: Signature upload configuration
    if (!empty($_FILES['signature']['tmp_name'])) {
      $config = array(
        'upload_path' => 'uploads/signatures',
        'allowed_types' => 'jpg|jpeg|png',
        'max_size' => '1024' //:: Maximum file size (in kb)
      );
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      
      if (!$this->upload->do_upload('signature')) {
        $data = array(
          'error' => $this->upload->display_errors(),
        );
        $this->session->set_flashdata($data);
        redirect('admin/edit');
        exit;
      } else {
        $data_sig = $this->upload->data();
        $signature = $data_sig['file_name'];
      }
    } else {
      $signature = '';
    }

    if ($this->admin_model->editAccount($account_id, $account_id2, $organization, $password, $full_name,
    $email, $contact_number, $batch, $type, $logo, $signature)) {
      $data = array(
        'success' => 'Edit successful!',
      );
      $response['success'] = true;

    } else {
      $data = array(
        'error' => 'There was an error',
      );
      $response['success'] = false;
      
    }


    $this->session->set_flashdata($data);
    redirect('admin/edit');

  }

  public function register() {

    $response = array();

    $account_id = $this->input->post('account_id', true);
    $organization = $this->input->post('organization', true);
    $password = $this->input->post('password', true);
    $full_name = $this->input->post('full_name', true);
    $email = $this->input->post('email', true);
    $contact_number = $this->input->post('contact_number', true);
    $batch = $this->input->post('batch', true);
    $type = $this->input->post('type', true);
    $position = $this->input->post('position', true);

    $password = $this->admin_model->hashMyPass($password);

    //:: Logo upload configuration
      $config = array(
        'upload_path' => 'uploads/logos',
        'allowed_types' => 'jpg|jpeg|png',
        'max_size' => '3072', //:: in kilobytes
      );
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      
      if (!$this->upload->do_upload('logo')) {
        $response['success'] = false;
        $response['success'] = $this->upload->display_errors();
        exit;

      } else {
        $data_logo = $this->upload->data();
        $logo = $data_logo['file_name'];
      }

      //:: Signature upload configuration
      $config = array(
        'upload_path' => 'uploads/signatures',
        'allowed_types' => 'jpg|jpeg|png',
        'max_size' => '1024', //:: in kilobytes
      );
      
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      
      if (!$this->upload->do_upload('signature')) {
        $response['success'] = false;
        $response['remark'] = $this->upload->display_errors();
        exit;

      } else {
        $data_sig = $this->upload->data();
        $signature = $data_sig['file_name'];
      }

    if ($this->admin_model->addAccount($account_id, $organization, $password, $position, $full_name,
      $email, $contact_number, $batch, $type, $logo, $signature)) {
      $response['success'] = true;
    } else {
      $response['success'] = false;
    }
    echo json_encode($response);
  }

  public function edit() {

    $data['accounts'] = $this->accounts_model->getAllAccounts();
    $this->load->view('admin/admin_edit', $data);

  }

  public function showAccount() {

    $response = "";

    $account_id = $this->input->post('account_id', true);
    $record = $this->admin_model->viewAccountInfo($account_id);
    $selectPro = $this->admin_model->selectPro($account_id);
    $selectNonPro = $this->admin_model->selectNonPro($account_id);
    $selectNA = $this->admin_model->selectNA($account_id);

    $data['records'] = null;

    if ($record) {
      $data['records'] = $record;
      $data['selectPro'] = $selectPro;
      $data['selectNonPro'] = $selectNonPro;
      $data['selectNA'] = $selectNA;
      $response = $this->load->view('layouts/display_edit', $data);
    }
  }


}

?>
