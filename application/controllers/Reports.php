<?php 

class Reports extends CI_Controller {
  public function index() {
    $records['orgs'] = $this->accounts_model->getOrgs();
    $this->load->view('stats', $records);
  }
}

?>