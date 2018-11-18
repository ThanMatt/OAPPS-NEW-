<?php 

class Printing extends CI_Controller {
  public function budget_proposal($proposal_id) {
    $record = $this->proposals_model->viewOERecord($proposal_id);
    $data['records'] = $record;
    $this->load->view('print/proposal', $data);
  }
}

?>