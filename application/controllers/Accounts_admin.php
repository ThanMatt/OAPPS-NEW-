<?php

class Accounts_Admin extends CI_Controller {

  public function login() {

    $admin_id = $this->input->post('account-id', true);
    $password = $this->input->post('password', true);
    $response = array(
      'success' => FALSE,
      'admin_id' => $admin_id
    );

    if ($this->admin_model->login_user($admin_id, $password)) {
      $response['success'] = TRUE;

      $this->accounts_model->logMyActivity($admin_id, 1, 0);


      $account = $this->admin_model->getMyRecords($admin_id);

      $account_data = array(
        'admin_id' => $admin_id,
        'full_name' => $account['Full_Name'],
        'logged_in' => true,
        'user_type' => 1,
      );

      $this->session->set_userdata($account_data);
      echo json_encode($response);

    } else {
      $response['success'] = FALSE;
      echo json_encode($response);
    }
  }

  // public function getJSON() {
  //   $admin_id = $this->session->userdata('admin_id');

  //   $response = array(
  //     'admin_id' => $admin_id
  //   );

  //   echo json_encode($response);
    
  // }

  public function logout() {

    $admin_id = $this->session->userdata('admin_id');

    $this->accounts_model->logMyActivity($admin_id, 0, 0);
    
    $this->session->sess_destroy();

    redirect('admin');

  }

}

?>
