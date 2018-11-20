<?php

class Accounts_Model extends CI_Model {

  public function login_user($account_id, $password) {
    $this->db->where('Account_ID', $account_id);
    $result = $this->db->get('accounts');
    
    $db_password = $result->row(1)->Pass;

    return password_verify($password, $db_password);
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

  public function getOfficeInfo($account_id) {
    $this->db->where('Account_ID', $account_id);
    $this->db->from('accounts');
    $result = $this->db->get();

    $row = $result->row();

    return $row->FullName;
  }

  public function getMyInfo($account_id) {
    $this->db->where('Account_ID', $account_id);
    $result = $this->db->get('accounts');

    return $result->row();
  }


  public function orgApprovedProposals($account_id) {

    $this->db->from('activity_proposal');
    $this->db->where('Account_ID', $account_id);
    $this->db->where('ProposalStatus', 'APPROVED');
    $result = $this->db->get();

    if (!$result) {
      return false;
    }

    return $result->num_rows();
  }

  public function getOrgInfo($account_id) {
    $this->db->from('accounts');
    $this->db->where('Account_ID', $account_id);

    $result = $this->db->get();

    return $result->row();
  }

  public function getOrgs() {
    $this->db->from('accounts');
    $this->db->where('Type !=', 'N/A');

    $result = $this->db->get();

    return $result->result();

  }

  public function getAllAccounts() {
    $this->db->from('accounts');
    $result = $this->db->get();

    return $result->result();
  }


  public function getMyLogo($account_id) {
    $this->db->where('Account_ID', $account_id);
    $this->db->from('accounts');

    $result = $this->db->get();

    $row = $result->row();

    return $row->Logo;
  }
  

  public function logMyActivity($account_id, $activity_type, $proposal_id) {
    
    $date_time = date("Y-m-d h:i:sa");

    if ($activity_type == 0) {
      $activity = "User $account_id logged out";

    } else if ($activity_type == 1) {
      $activity = "User $account_id logged in";

    } else if ($activity_type == 2) {
      $activity = "User $account_id viewed the proposal $proposal_id";

    } else if ($activity_type == 3) {
      $activity = "User $account_id approved the proposal $proposal_id";

    } else if ($activity_type == 4) {
      $activity = "User $account_id asked for revision for the proposal $proposal_id";

    } else if ($activity_type == 5) {
      $activity = "User $account_id rejected the proposal $proposal_id";

    } else if ($activity_type == 6) {
      $activity = "User $account_id revised the proposal $proposal_id";

    } else if ($activity_type == 7) {
      $activity = "User $account_id saved a proposal draft";

    } else if ($activity_type == 8) {
      $activity = "User $account_id created the proposal $proposal_id";

    } else if ($activity_type == 9) {
      $activity = "User $account_id submitted the proposal $proposal_id";

    } else if ($activity_type == 10) {
      $activity = "User $account_id edited a proposal";

    } else if ($activity_type == 11) {
      $activity = "User $account_id deleted a draft proposal";

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