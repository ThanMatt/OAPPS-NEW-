<?php

class Accounts extends CI_Controller {

  public function login() {

    $this->form_validation->set_rules('account-id', 'Account ID', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    
    if($this->form_validation->run == FALSE) {
      $data = array (
        'errors' => validation_errors(),
      );

      $this->session->set_flashdata($data);

      redirect('home');

    }
    $account_id = $this->input->post('account-id', true);
		$account_id = strtoupper($account_id);
    $password = $this->input->post('password', true);
    $response = array(
      'success' => FALSE,
      'account_id' => $account_id
    );

    if ($this->accounts_model->login_user($account_id, $password)) {
      $response['success'] = TRUE;

      $this->accounts_model->logMyActivity($account_id, 1, 0);


      $account = $this->accounts_model->getMyRecords($account_id);

      $account_data = array(
        'account_id' => $account_id,
        'organization' => $account['Organization'],
        'email_address' => $account['Email_Address'],
        'contact_number' => $account['Contact_Number'],
        'full_name' => $account['Full_Name'],
        'batch' => $account['Batch'],
        'org_type' => $account['Org_Type'],
        'position' => $account['Position'],
        'prefix' => $account['Prefix'],
        'logo' => $account['Logo'],
        'logged_in' => true,
        'user_type' => 0,
      );

      $this->session->set_userdata($account_data);
      echo json_encode($response);

    } else {
      $response['success'] = FALSE;
      echo json_encode($response);
    }
  }

  public function getJSON() {
    $account_id = $this->session->userdata('account_id');

    $response = array(
      'account_id' => $account_id
    );

    echo json_encode($response);
    
  }

  public function logout() {

    $account_id = $this->session->userdata('account_id');

    $this->accounts_model->logMyActivity($account_id, 0, 0);
    
    $this->session->sess_destroy();

    redirect('home');

  }

}

?>
