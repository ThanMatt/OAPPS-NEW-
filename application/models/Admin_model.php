<?php

class Admin_Model extends CI_Model {

  public function login_user($admin_id, $password) {
    $this->db->where('Admin_ID', $admin_id);
    $result = $this->db->get('admin');
    
    $db_password = $result->row(2)->Pass;

    return password_verify($password, $db_password);
  }

  public function getMyRecords($admin_id) {
    $this->db->where('Admin_ID', $admin_id);
    $result = $this->db->get('admin');

    $full_name = $result->row(5)->FullName;

    return array(
      'Full_Name' => $full_name,
    );

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
}

?>