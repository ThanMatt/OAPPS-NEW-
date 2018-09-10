<?php

class Accounts_Model extends CI_Model {

  public function login_user($account_id, $password) {
    $this->db->where('Account_ID', $account_id);
    $result = $this->db->get('accounts');
    
    $db_password = $result->row(1)->Pass;
    // $account_id = $result->row(0);

    if (password_verify($password, $db_password)) {
      return true;
    } else {
      return false;
    }
    return false;
  }

  public function getMyRecords($account_id) {
    $this->db->where('Account_ID', $account_id);
    $result = $this->db->get('accounts');

    $organization = $result->row(2)->Organization;
    $email_address = $result->row(3)->EmailAddress;
    $contact_number = $result->row(4)->ContactNumber;
    $full_name = $result->row(5)->FullName;
    $batch = $result->row(6)->Batch;
    $org_type = $result->row(7)->Type;
    $position = $result->row(8)->Position;

    // $account_prefix = substr($account_id, 0
    //   , strrpos($account_id, "_"));

    $account_prefix = strstr($account_id, "_", true);

    if ($account_prefix == '') {
      $account_prefix = $account_id;
    }

    return array(
      'Organization' => $organization,
      'Email_Address' => $email_address,
      'Contact_Number' => $contact_number,
      'Full_Name' => $full_name,
      'Batch' => $batch,
      'Org_Type' => $org_type,
      'Position' => $position,
      'Prefix' => $account_prefix,
    );

  }

  //:: Used for body.php and other else
  //:: to determine which are for offices and
  //:: which are for orgs
  public function checkOffice($account_id) {

  }
}

?>