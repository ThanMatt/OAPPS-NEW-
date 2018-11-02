<?php

class Notifications_model extends CI_Model {

  public function createNotifications($proposal_id, $account_id, $bp) {

    $counter = 0;

    if (!$bp) {
      $account_ids = array(
        $account_id,
        'SC_SG',
      );
    } else {
      $account_ids = array(
        $account_id,
        'SC_SG',
        'SC_TR',
      );
    }

    while ($counter < count($account_ids)) {
      $data = array(
        'Proposal_ID' => $proposal_id,
        'Account_ID' => $account_ids[$counter],
        'NotificationType' => 0,
        'Notification' => 1,
      );

      $this->db->insert('notifications', $data);
      $counter++;
    }

  }

  public function sendNotification($proposal_id, $org_id, $notification_type, $office_id) {

    if ($notification_type == 0) {
      $data = array(
        'Proposal_ID' => $proposal_id,
        'Account_ID' => $office_id,
        'NotificationType' => $notification_type,
        'Notification' => 1,
      );

      $this->db->insert('notifications', $data);

      $data = array(
        'NotificationType' => 0,
        'Notification' => 1,
      );

      $this->db->where('Account_ID', $org_id);
      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->update('notifications', $data);

    } else if ($notification_type == 2) {

      $data = array(
        'NotificationType' => 0,
        'Notification' => 1,
      );

      $this->db->where('Account_ID', $office_id);
      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->update('notifications', $data);

      $data = array(
        'NotificationType' => 0,
        'Notification' => 1,
      );

      $this->db->where('Account_ID', $org_id);
      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->update('notifications', $data);

    } else if ($notification_type == 1) {

      $data = array(
        'NotificationType' => 1,
        'Notification' => 1,
      );

      $this->db->where('Account_ID', $org_id);
      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->update('notifications', $data);

    }
  }

  //:: Used for offices
  public function sendRevisionNotification($proposal_id, $org_id, $office_id) {
    $data = array(
      'NotificationType' => 2,
      'Notification' => 1,
    );

    $this->db->where('Account_ID', $org_id);
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->update('notifications', $data);
  }

  //:: Used for offices
  public function checkNotifications($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->from('notifications');

    $result = $this->db->get();
    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }
  }

  //:: Used for offices
  public function countNotifs($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->from('notifications');

    $result = $this->db->get();
    return $result->num_rows();

  }

  public function countPendingNotifs($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->where('NotificationType', 0);
    $this->db->from('notifications');

    $result = $this->db->get();
    return $result->num_rows();

  }

  public function countApprovedNotifs($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->where('NotificationType', 1);
    $this->db->from('notifications');

    $result = $this->db->get();
    return $result->num_rows();

  }

  public function countUnderRevNotifs($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->where('NotificationType', 2);
    $this->db->from('notifications');

    $result = $this->db->get();
    return $result->num_rows();

  }

  public function checkPendingNotifications($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->where('NotificationType', 0);
    $this->db->from('notifications');

    $result = $this->db->get();
    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }
  }

  public function checkApprovedNotifications($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->where('NotificationType', 1);
    $this->db->from('notifications');

    $result = $this->db->get();
    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }
  }

  public function checkUnderRevNotifications($account_id) {

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);
    $this->db->where('NotificationType', 2);
    $this->db->from('notifications');

    $result = $this->db->get();
    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }

  }

  public function readNotification($proposal_id, $account_id) {
    $data = array(
      'Notification' => 0,
    );

    $this->db->where('Account_ID', $account_id);
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->update('notifications', $data);
  }

  public function unreadNotification($proposal_id, $account_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('Account_ID', $account_id);
    $this->db->where('Notification', 1);

    $this->db->from('notifications');

    $result = $this->db->get();

    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }

  }

}

?>