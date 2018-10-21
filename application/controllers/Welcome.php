<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *     http://example.com/index.php/welcome
   *  - or -
   *     http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see https://codeigniter.com/user_guide/general/urls.html
   */
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

      $record = $this->proposals_model->viewAPRecord($proposal_id);

      $data['records'] = null;

      if ($record) {
        $data['records'] = $record;
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

}
