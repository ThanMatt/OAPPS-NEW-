<?php

class Accounts extends CI_Controller {

  public function login() {

    
    $account_id = $this->input->post('account-id');
    $password = $this->input->post('password');
    $response = array(
      'success' => FALSE,
      'account_id' => $account_id
    );

    if ($this->accounts_model->login_user($account_id, $password)) {
      $response['success'] = TRUE;


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
        'logged_in' => true,
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

    $this->session->sess_destroy();

    redirect('home/index');

  }

}

?>