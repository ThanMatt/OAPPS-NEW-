<?php

class Home extends CI_Controller {

  //:: sub-sites
  public function index() {
    $response = array();
    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');
    $position = $this->session->userdata('position');

    if (!isset($_POST['flag'])) {
      $flag = 'Pending';
    } else {
      $flag = $this->input->post('flag');
    }

    $record = false;

    if ($flag == 'View') {
      $proposal_id = $this->input->post('proposal_id');

      $this->notifications_model->readNotification($proposal_id, $account_id);
      $record = $this->proposals_model->viewAPRecord($proposal_id);
      $timetable = $this->proposals_model->getTimeTable($proposal_id);
      $org_info = $this->accounts_model->getOrgInfo($record->Account_ID);
      $comments = $this->proposals_model->getComments($proposal_id);
      $data['records'] = null;

      if ($record) {
        $data['records'] = $record;
        $data['timetable'] = $timetable;
        $data['org_info'] = $org_info;
        $data['comments'] = $comments;
        $response = $this->load->view('layouts/display', $data);
      }

    } else {

      if ($flag == 'Pending') {

        $record = $this->proposals_model->getPendingRecords($account_id, $type);
      } else if ($flag == 'Approved') {
        $record = $this->proposals_model->getApprovedRecords($account_id, $type);
      } else if ($flag == 'Revisions') {
        $record = $this->proposals_model->getRevisionRecords($account_id, $type, $position);
      } else if ($flag == 'Drafts') {
        $record = $this->proposals_model->getDraftRecords($account_id);
      }

      $data['records'] = null;
      $data['title'] = $flag;

      if ($record) {

        $data['records'] = $record;
        $response = $this->load->view('main', $data);

      } else {
        $this->load->view('main', $data);
      }

    }

  }

  public function profile() {
    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');

    $approved_records = $this->proposals_model->getApprovedRecords($account_id, $type);
    $pending_records = $this->proposals_model->getPendingRecords($account_id, $type);
    $total_expenditure = $this->proposals_model->totalExpenditure($account_id);
    $average_expenditure = $this->proposals_model->averageExpenditure($account_id);

    $data['approved_records'] = 'No Records';
    $data['pending_records'] = 'No Records';

    if ($approved_records || $pending_records) {

      $data['approved_records'] = $approved_records;
      $data['pending_records'] = $pending_records;

    }
    $data['total_expenditure'] = $total_expenditure;
    $data['average_expenditure'] = $average_expenditure;
    $this->load->view('users/profile', $data);

  }

  public function org_statistics() {

    $records['orgs'] = $this->accounts_model->getOrgs();

    $this->load->view('stats', $records);

  }

  public function forms() {
    $this->load->view('forms');
  }

}

?>
