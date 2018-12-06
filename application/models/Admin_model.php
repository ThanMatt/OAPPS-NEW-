<?php

class Admin_Model extends CI_Model {

  public function login_user($admin_id, $password) {
    $this->db->where('Admin_ID', $admin_id);
    $result = $this->db->get('admin');

    $rows = $result->num_rows();

    if ($rows == 1) {
      $db_password = $result->row(2)->Pass;
      return password_verify($password, $db_password);
    } else {
      return false;
    }
  }

  public function getMyRecords($admin_id) {
    $this->db->where('Admin_ID', $admin_id);
    $result = $this->db->get('admin');

    $full_name = $result->row(5)->FullName;

    return array(
      'Full_Name' => $full_name,
    );

  }

  public function editAccount($account_id, $account_id2, $organization, $password, $full_name, $email, $contact_number, $batch, $type, $logo, $signature) {
    $data = array (
      'Account_ID' => $account_id2,
      'Pass' => $password,
      'Organization' => $organization,
      'EmailAddress' => $email,
      'ContactNumber' => $contact_number,
      'FullName' => $full_name,
      'Batch' => $batch,
      'Type' => $type,
      'Signature' => $signature,
      'Logo' => $logo,
    );

    foreach($data as $key => $value) {
      if ($value == null || $value == '') {
        unset($data[$key]);
      } else {
        continue;
      }
    }

    $this->db->where('Account_ID', $account_id);
    $result = $this->db->update('accounts', $data);

    return $result;
  
  }

  public function addAccount($account_id, $organization, $password, $position, $full_name, $email, $contact_number, $batch, $type, $logo, $signature) {
    $data = array (
      'Account_ID' => $account_id,
      'Pass' => $password,
      'Organization' => $organization,
      'EmailAddress' => $email,
      'Position' => $position,
      'ContactNumber' => $contact_number,
      'FullName' => $full_name,
      'Batch' => $batch,
      'Type' => $type,
      'Signature' => $signature,
      'Logo' => $logo,
    );

    $result = $this->db->insert('accounts', $data);

    return $result;
  
  }

  //:: Password hasher
  public function hashMyPass($password) {
    $options = [
      'cost' => 12,
    ];

    $hashedPassword = password_hash($password,
      PASSWORD_DEFAULT, $options);

    return $hashedPassword;
  }

  public function viewAccountInfo($account_id) {
    $this->db->from('accounts');
    $this->db->where('Account_ID', $account_id);

    $result = $this->db->get();

    return $result->row();
  }

  public function logMyActivity($admin_id, $activity_type, $proposal_id) {
    
    $date_time = date("Y-m-d h:i:sa");

    if ($activity_type == 0) {
      $activity = "User $admin_id logged out";

    } else if ($activity_type == 1) {
      $activity = "User $admin_id logged in";

    } else if ($activity_type == 2) {
      $activity = "User $admin_id viewed the proposal $proposal_id";

    } else if ($activity_type == 3) {
      $activity = "User $admin_id approved the proposal $proposal_id";

    } else if ($activity_type == 4) {
      $activity = "User $admin_id asked for revision for the proposal $proposal_id";

    } else if ($activity_type == 5) {
      $activity = "User $admin_id rejected the proposal $proposal_id";

    } else if ($activity_type == 6) {
      $activity = "User $admin_id revised the proposal $proposal_id";

    } else if ($activity_type == 7) {
      $activity = "User $admin_id saved a proposal draft";

    } else if ($activity_type == 8) {
      $activity = "User $admin_id created the proposal $proposal_id";

    } else if ($activity_type == 9) {
      $activity = "User $admin_id submitted the proposal $proposal_id";

    } else if ($activity_type == 10) {
      $activity = "User $admin_id edited a proposal";

    } else if ($activity_type == 11) {
      $activity = "User $admin_id deleted a draft proposal";

    }
    
    $data = array(

      'Activity' => $activity,
      'ActivityType' => $activity_type,
      'DateTime' => $date_time
    );

    $result = $this->db->insert('log', $data);

    if (!$result) {
      return false;
    } else {
      return true;
    }
  }

  public function selectPro($account_id) {
    $this->db->where('Account_ID', $account_id);
    $this->db->from('accounts');

    $result = $this->db->get();

    $row = $result->row();

    $type = $row->Type;

    if ($type == 'Pro') {
      return 'selected="selected"';
    }
  }

  public function selectNonPro($account_id) {
    $this->db->where('Account_ID', $account_id);
    $this->db->from('accounts');

    $result = $this->db->get();

    $row = $result->row();

    $type = $row->Type;

    if ($type == 'NonPro') {
      return 'selected="selected"';
    }
  }

  public function selectNA($account_id) {
    $this->db->where('Account_ID', $account_id);
    $this->db->from('accounts');

    $result = $this->db->get();

    $row = $result->row();

    $type = $row->Type;

    if ($type == 'N/A') {
      return 'selected="selected"';
    }
  }
}

?>