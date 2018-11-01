<?php

class Progress_model extends CI_Model {

  public function progressSecGen($proposal_id) {
    $this->db->from('proposal_tracker');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->row();

    $status = $row->SC_SG;

    if ($status == 'APPROVED') {
      return 'class="approved"';
    } else if ($status == 'PENDING') {
      return 'class="pending"';
    } else if ($status == 'UNDER REVISION') {
      return 'class="under-revision"';
    }
  }

  public function progressTreasurer($proposal_id) {
    $this->db->from('proposal_tracker');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->row();

    $status = $row->SC_TR;

    if ($status == 'APPROVED') {
      return 'class="approved"';
    } else if ($status == 'PENDING') {
      return 'class="pending"';
    } else if ($status == 'UNDER REVISION') {
      return 'class="under-revision"';
    }
  }
  
  public function progressPresident($proposal_id) {
    $this->db->from('proposal_tracker');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->row();

    $status = $row->SC_P;

    if ($status == 'APPROVED') {
      return 'class="approved"';
    } else if ($status == 'PENDING') {
      return 'class="pending"';
    } else if ($status == 'UNDER REVISION') {
      return 'class="under-revision"';
    }
  }
  
  public function progressAsstPrefect($proposal_id) {
    $this->db->from('proposal_tracker');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->row();

    $status = $row->OPSA_APP;
    
    if ($status == '') {
      $status = $row->OPSA_APN;
    }

    if ($status == 'APPROVED') {
      return 'class="approved"';
    } else if ($status == 'PENDING') {
      return 'class="pending"';
    } else if ($status == 'UNDER REVISION') {
      return 'class="under-revision"';
    }
  }
  
  public function progressPrefect($proposal_id) {
    $this->db->from('proposal_tracker');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->row();

    $status = $row->OPSA_P;

    if ($status == 'APPROVED') {
      return 'class="approved"';
    } else if ($status == 'PENDING') {
      return 'class="pending"';
    } else if ($status == 'UNDER REVISION') {
      return 'class="under-revision"';
    }
  }
  
  public function progressDean($proposal_id) {
    $this->db->from('proposal_tracker');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->row();

    $status = $row->OD;

    if ($status == 'APPROVED') {
      return 'class="approved"';
    } else if ($status == 'PENDING') {
      return 'class="pending"';
    } else if ($status == 'UNDER REVISION') {
      return 'class="under-revision"';
    }
  }
  

}

?>