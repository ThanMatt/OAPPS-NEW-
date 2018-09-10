<?php

class Proposals_Model extends CI_Model {

  public function getPendingRecords() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');

    $this->db->select('activity_proposal.Proposal_ID, ActivityName, OfficeProposal,
    `TimeStamp`.DateProposed, activity_proposal.Account_ID');
    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');

    //:: Show pending records for orgs
    if ($type != 'N/A') {

      $this->db->where('ProposalStatus', 'PENDING');
      $this->db->where('activity_proposal.Account_ID', $account_id);
      $this->db->order_by('DateProposed', 'asc');
      $result = $this->db->get();

      //:: Show pending records for OFFICES
    } else {

      //:: Show pending records for SC President
      if ($account_id == 'SC_P') {

        $this->db->where('OfficeProposal', 'President');
        $this->db->where('ProposalStatus', 'PENDING');
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show pending records for SC Secretary General or Treasurer
      } else if ($account_id == 'SC_SG' || $account_id == 'SC_TR') {

        $this->db->where('ProposalStatus', 'PENDING');
        $this->db->where('OfficeProposal', 'Secretary-General');
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show pending records for OPSA Assistant Prefect (Professional)
      } else if ($account_id == 'OPSA_APP') {

        $this->db->where('ProposalStatus', 'PENDING');
        $this->db->where('OfficeProposal', 'Assistant Prefect (Professional)');
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show pending records for OPSA Assistant Prefect (Non-Professional)
      } else if ($account_id == 'OPSA_APN') {

        $this->db->where('ProposalStatus', 'PENDING');
        $this->db->where('OfficeProposal', 'Assistant Prefect (Non-Professional)');
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show pending records for OPSA Prefect
      } else if ($account_id == 'OPSA_P') {

        $this->db->where('ProposalStatus', 'PENDING');
        $this->db->where('OfficeProposal', 'Prefect');
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show pending records for Office of the Dean
      } else if ($account_id == 'OD') {

        $this->db->where('ProposalStatus', 'PENDING');
        $this->db->where('OfficeProposal', 'Dean');
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();
      }

    }

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function getApprovedRecords() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');

    $this->db->select('activity_proposal.Proposal_ID, ActivityName, OfficeProposal,
      `TimeStamp`.DateProposed, activity_proposal.Account_ID');
    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');

    if ($type != 'N/A') {

      $this->db->where('ProposalStatus', 'APPROVED');
      $this->db->where('activity_proposal.Account_ID', $account_id);
      $this->db->order_by('DateProposed', 'asc');
      $result = $this->db->get();

    } else {

      //:: Show approved records for SC President
      if ($account_id == 'SC_P') {

        $this->db->where("(OPSA_APP_TimeIn != '' OR OPSA_APN_TimeIn != '')");
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show approved records for SC Secretary General
      } else if ($account_id == 'SC_SG') {

        $this->db->where("SC_P_TimeIn != ''");
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

        //:: Show approved records for SC Treasurer (not yet fixed)
      } else if ($account_id == 'SC_TR') {

        $this->db->where("SC_P_TimeIn != ''");
        $this->db->order_by('DateProposed', 'asc');
        $result = $this->db->get();

      }

    }

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function getDraftRecords() {
    $response = array();

    $account_id = $this->session->userdata('account_id');

    $this->db->select('activity_proposal.Proposal_ID, ActivityName, OfficeProposal,
    `TimeStamp`.DateProposed, activity_proposal.Account_ID');
    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->where('ProposalStatus', 'DRAFT');
    $this->db->where('activity_proposal.Account_ID', $account_id);
    $this->db->order_by('DateProposed', 'asc');
    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function getRevisionRecords() {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');

    if ($type != 'N/A') {

      $this->db->select('activity_proposal.Proposal_ID, ActivityName, OfficeProposal,
      `TimeStamp`.DateProposed, activity_proposal.Account_ID');
      $this->db->from('activity_proposal');
      $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
      $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
      $this->db->where('ProposalStatus', 'REVISION');
      $this->db->where('activity_proposal.Account_ID', $account_id);
      $this->db->order_by('DateProposed', 'asc');
      $result = $this->db->get();

      if (!$result) {
        return false;
      } else {
        return $result->result();
      }

    } else {

    }

  }

}

?>