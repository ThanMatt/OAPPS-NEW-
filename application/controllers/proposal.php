<?php

class Proposal extends CI_Controller {

  public function view($proposal_id) {
    $data['record'] = $this->proposals_model->viewAPRecord($proposal_id);
    $this->load->view('layouts/view_ap', $data);
  }

}

?>