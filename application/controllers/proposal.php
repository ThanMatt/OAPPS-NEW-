<?php

class Proposal extends CI_Controller {

  public function view($proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->proposals_model->getDateTime($account_id, $proposal_id);

    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $this->load->view('layouts/view_ap', $data);
  }

  public function approve($proposal_id) {

    $account_id = $this->session->userdata('account_id');
    $org_type = $this->session->userdata('org_type');

    if ($org_type != 'N/A' || !$this->proposals_model->didIApproveThis($account_id, $proposal_id)) {
      redirect(base_url() . "home");
    }

    $next_office = $this->proposals_model->nextOffice($account_id, $proposal_id);
    $next_position = $this->proposals_model->nextOfficePosition($next_office, $proposal_id);

    $this->proposals_model->forwardAP($next_office, $next_position, $proposal_id);

    redirect(base_url() . "proposal/view/" . $proposal_id);
    
  }

}

?>