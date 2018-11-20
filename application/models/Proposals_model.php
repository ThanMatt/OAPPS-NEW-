<?php

class Proposals_Model extends CI_Model {

  public function getPendingRecords($account_id, $type) {
    $response = array();

    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->join('proposal_tracker', 'proposal_tracker.Proposal_ID = activity_proposal.Proposal_ID');

    //:: Show pending records for orgs
    if ($type != 'N/A') {

      $this->db->where('ProposalStatus', 'PENDING');
      $this->db->where('activity_proposal.Account_ID', $account_id);

      //:: Show pending records for OFFICES
    } else {
      $this->db->where($account_id, 'PENDING');
    }

    $this->db->order_by('DateProposed', 'asc');
    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function getApprovedRecords($account_id, $type) {
    $response = array();

    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->join('proposal_tracker', 'proposal_tracker.Proposal_ID = activity_proposal.Proposal_ID');

    if ($type != 'N/A') {

      $this->db->where('ProposalStatus', 'APPROVED');
      $this->db->where('activity_proposal.Account_ID', $account_id);

    } else {
      $this->db->where($account_id, 'APPROVED');
    }

    $this->db->order_by('DateProposed', 'asc');
    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function getDraftRecords($account_id) {
    $response = array();

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

  public function getRevisionRecords($account_id, $type, $position) {
    $response = array();

    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->join('proposal_tracker', 'proposal_tracker.Proposal_ID = activity_proposal.Proposal_ID');

    if ($type != 'N/A') {

      $this->db->where('ProposalStatus', 'UNDER REVISION');
      $this->db->where('activity_proposal.Account_ID', $account_id);

    } else {
      $this->db->where($account_id, 'UNDER REVISION');
    }

    $this->db->order_by('DateProposed', 'asc');
    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function showPendingRecords($org_id) {
    $this->db->from('activity_proposal');
    $this->db->where('Account_ID', $org_id);
    $this->db->where('ProposalStatus', 'PENDING');


    $result = $this->db->get();
    $rows = $result->num_rows();

    if ($rows >= 1) {
      $row = $result->row();
      return $row->ActivityName;
    } else {
      return 'No Records';
    }

  }

  public function pendingCount($org_id) {
    $this->db->from('activity_proposal');
    $this->db->where('Account_ID', $org_id);
    $this->db->where('ProposalStatus', 'PENDING');

    $result = $this->db->get();
    
    return $result->num_rows();

  }

  public function checkDuplicationTitle($activity_name) {
    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->join('proposal_tracker', 'proposal_tracker.Proposal_ID = activity_proposal.Proposal_ID');
    $this->db->where('ActivityName', $activity_name);
    $result = $this->db->get();

    $row = $result->num_rows();

    if ($row > 1) {
      return true;
    } else {
      return false;
    }
  }

  public function getApprovedDate($proposal_id, $account_id, $org_type) {

    if ($org_type != 'N/A') {

      $this->db->from('activity_proposal');
      $this->db->join('timestamp', 'timestamp.Proposal_ID = activity_proposal.Proposal_ID');
      $this->db->where('activity_proposal.Proposal_ID', $proposal_id);

      $result = $this->db->get();
      $row = $result->row();

      return strstr($row->TimeApproved, " ", true);

    } else {
      $timein = $account_id . '_TimeIn';
      $this->db->from('activity_proposal');
      $this->db->join('timestamp', 'timestamp.Proposal_ID = activity_proposal.Proposal_ID');
      $this->db->where('activity_proposal.Proposal_ID', $proposal_id);

      $result = $this->db->get();
      $row = $result->row();

      return strstr($row->$timein, " ", true);
    }

  }

  public function getSubmitDate($proposal_id) {
    $this->db->from('activity_proposal');
    $this->db->join('timestamp', 'timestamp.Proposal_ID = activity_proposal.Proposal_ID');
    $this->db->where('activity_proposal.Proposal_ID', $proposal_id);

    $result = $this->db->get();

    $row = $result->row();

    return $row->DateProposed;

  }

  
  public function shadeCollaborative($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->ProposalType1;

    if ($proposal_type1 == "Collaborative") {
      return 1;
    } else {
      return 0;
    }
  }

  public function shadeIndependent($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->ProposalType1;

    if ($proposal_type1 == "Independent") {
      return 1;
    } else {
      return 0;
    }

  }

  public function shadeAcademic($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->ProposalType2;

    if ($proposal_type1 == "Academic") {
      return 1;
    } else {
      return 0;
    }

  }

  public function shadeNonAcademic($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->ProposalType2;

    if ($proposal_type1 == "Non-Academic") {
      return 1;
    } else {
      return 0;
    }

  }

  public function shadeCommunity($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->NonAcademicType;

    if ($proposal_type1 == "Community Involvement") {
      return ' X ';
    } else {
      return '   ';
    }

  }

  public function shadeCoCurricular($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->NonAcademicType;

    if ($proposal_type1 == "Co-Curricular") {
      return ' X ';
    } else {
      return '   ';
    }

  }

  public function shadeExtraCurricular($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->NonAcademicType;

    if ($proposal_type1 == "Extra-Curricular") {
      return ' X ';
    } else {
      return '   ';
    }

  }
  

  public function checkCollaborative($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->ProposalType1;

    if ($proposal_type1 == "Collaborative") {
      return "checked";
    }
  }


  public function checkIndependent($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type1 = $row->ProposalType1;

    if ($proposal_type1 == "Independent") {
      return "checked";
    }

  }

  public function checkAcademic($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type2 = $row->ProposalType2;

    if ($proposal_type2 == "Academic") {
      return "checked";
    }

  }

  public function checkNonAcademic($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $proposal_type2 = $row->ProposalType2;

    if ($proposal_type2 == "Non-Academic") {
      return "checked";
    }

  }

  public function checkCommunity($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $non_academic_type = $row->NonAcademicType;

    if ($non_academic_type == "Community Involvement") {
      return "checked";
    }

  }

  public function checkCoCurricular($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $non_academic_type = $row->NonAcademicType;

    if ($non_academic_type == "Co-Curricular") {
      return "checked";
    }

  }

  public function checkExtraCurricular($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    $non_academic_type = $row->NonAcademicType;

    if ($non_academic_type == "Extra-Curricular") {
      return "checked";
    }

  }

  public function whoseProposal($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->row();

    return $row->Account_ID;
  }

  //:: Fetches activity proposal details
  public function viewAPRecord($proposal_id) {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');
    $position = $this->session->userdata('position');

    $this->db->from('activity_proposal');
    $this->db->join('accounts', 'activity_proposal.Account_ID = accounts.Account_ID');
    $this->db->join('timestamp', 'timestamp.Proposal_ID = activity_proposal.Proposal_ID');
    $this->db->where('activity_proposal.Proposal_ID', $proposal_id);

    if ($type != 'N/A') {
      $this->db->where('activity_proposal.Account_ID', $account_id);
    } else {
      //:: For offices
    }

    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->row();
    }

  }

  //:: Fetches FAR detais
  public function viewFARRecord($proposal_id) {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');
    $position = $this->session->userdata('position');

    $this->db->from('fixed_assets_requirements');
    $this->db->join('accounts', 'fixed_assets_requirements.Account_ID = accounts.Account_ID');
    $this->db->join('timestamp', 'timestamp.Proposal_ID = fixed_assets_requirements.Proposal_ID');
    $this->db->where('fixed_assets_requirements.Proposal_ID', $proposal_id);

    if ($type != 'N/A') {
      $this->db->where('fixed_assets_requirements.Account_ID', $account_id);
    } else {
      //:: For offices
    }

    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  //:: Fetches FAR detais
  public function viewOERecord($proposal_id) {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');
    $position = $this->session->userdata('position');

    $this->db->from('operating_expenses');
    $this->db->join('accounts', 'operating_expenses.Account_ID = accounts.Account_ID');
    $this->db->join('timestamp', 'timestamp.Proposal_ID = operating_expenses.Proposal_ID');
    $this->db->where('operating_expenses.Proposal_ID', $proposal_id);

    if ($type != 'N/A') {
      $this->db->where('operating_expenses.Account_ID', $account_id);
    } else {
      //:: For offices
    }

    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }

  }

  public function viewComments($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('comments');
    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->result();
    }
  }

  public function getTheirOfficeInfo($office_id) {
    $this->db->where('Account_ID', $office_id);
    $this->db->from('Accounts');

    $result = $this->db->get();

    return $result->row();

  }

  public function checkIfFARExists($proposal_id, $account_id) {

    $this->db->from('fixed_assets_requirements');
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('Account_ID', $account_id);
    $result = $this->db->get();

    if (!$result) {
      return false;
    }

    $row = $result->num_rows();

    if ($row != 0) {
      return false;
    }

    return true;
  }

  public function checkIfOEExists($proposal_id, $account_id) {

    $this->db->from('operating_expenses');
    $this->db->where('Account_ID', $account_id);
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    if (!$result) {
      return false;
    }

    $row = $result->num_rows();

    if ($row != 0) {
      return false;
    }

    return true;
  }

  public function checkIfBPExists($proposal_id) {
    $response = array();

    $account_id = $this->session->userdata('account_id');
    $type = $this->session->userdata('org_type');
    $position = $this->session->userdata('position');

    $this->db->from('fixed_assets_requirements');
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

    $row = $result->num_rows();

    if ($row != 0) {
      return true;
    } else {
      $this->db->from('operating_expenses');
      $this->db->where('Proposal_ID', $proposal_id);
      $result = $this->db->get();

      $row = $result->num_rows();

      if ($row != 0) {
        return true;
      }
    }

    return false;
  }

  public function createActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
    $start_time, $end_time, $nature, $objectives, $rationale, $activity_chair, $participants,
    $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
    $collab_partner, $specified) {

    $office_proposal = "N/A";
    $proposal_status = "DRAFT";

    if ($activity_name == '') {
      $activity_name = 'untitled';
    }

    $data = array(
      'Proposal_ID' => $proposal_id,
      'Account_ID' => $account_id,
      'ActivityName' => $activity_name,
      'DateActivity' => $date_activity,
      'StartTime' => $start_time,
      'EndTime' => $end_time,
      'Nature' => $nature,
      'Objectives' => $objectives,
      'Rationale' => $rationale,
      'ActivityChair' => $activity_chair,
      'ChairContactNumber' => $contact_number,
      'Participants' => $participants,
      'ActivityVenue' => $activity_venue,
      'ProposalType1' => $proposal_type1,
      'Partners' => $collab_partner,
      'ProposalType2' => $proposal_type2,
      'NonAcademicType' => $non_academic_type,
      'Specified' => $specified,
      'ProposalStatus' => 'DRAFT',
      'OfficeProposal' => 'N/A',
    );

    $result = $this->db->insert('activity_proposal', $data);

    if (!$result) {
      return false;
    } else {
      $this->createDate($proposal_id);
      return true;
    }
  }

  public function showTracker($proposal_id) {
    $response = array();
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->get();

  }
  public function saveActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
    $start_time, $end_time, $nature, $objectives, $rationale, $activity_chair, $participants,
    $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
    $collab_partner, $specified) {

    $data = array(
      'Account_ID' => $account_id,
      'ActivityName' => $activity_name,
      'DateActivity' => $date_activity,
      'StartTime' => $start_time,
      'EndTime' => $end_time,
      'Nature' => $nature,
      'Objectives' => $objectives,
      'Rationale' => $rationale,
      'ActivityChair' => $activity_chair,
      'ChairContactNumber' => $contact_number,
      'Participants' => $participants,
      'ActivityVenue' => $activity_venue,
      'ProposalType1' => $proposal_type1,
      'Partners' => $collab_partner,
      'ProposalType2' => $proposal_type2,
      'NonAcademicType' => $non_academic_type,
      'Specified' => $specified,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('activity_proposal', $data);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);
    } else {
      $this->updateDate($proposal_id);
      $response['success'] = true;
      echo json_encode($response);
    }
  }

  public function newFAR($account_id, $proposal_id, $far_item,
    $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id) {
    $data = array(
      'Far_ID' => $far_id,
      'Proposal_ID' => $proposal_id,
      'Account_ID' => $account_id,
      'Item' => $far_item,
      'Quantity' => $far_quantity,
      'Unit_Price' => $far_unit,
      'Total_Amount' => $far_total_amount,
      'Source' => $far_source,
      'ProposalStatus' => 'DRAFT',
      'OfficeProposal' => 'N/A',
    );

    $result = $this->db->insert('fixed_assets_requirements', $data);

  }

  public function checkFAR($far_id) {
    $this->db->where('Far_ID', $far_id);
    $this->db->from('fixed_assets_requirements');
    $result = $this->db->get();

    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }

  }

  public function saveFAR($account_id, $proposal_id, $far_item,
    $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id) {

    $proposal_status = "DRAFT";
    $office_proposal = "N/A";

    $data = array(
      'Account_ID' => $account_id,
      'Item' => $far_item,
      'Quantity' => $far_quantity,
      'Unit_Price' => $far_unit,
      'Total_Amount' => $far_total_amount,
      'Source' => $far_source,
      'ProposalStatus' => $proposal_status,
      'OfficeProposal' => $office_proposal,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('Far_ID', $far_id);
    $result = $this->db->update('fixed_assets_requirements', $data);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);

    } else {
      $this->updateDate($proposal_id);
    }
  }

  public function submitFAR($account_id, $proposal_id, $far_item,
    $far_quantity, $far_unit, $far_total_amount, $far_source, $far_id) {

    $proposal_status = "PENDING";
    $office_proposal = "SC_TR";

    $data = array(
      'Far_ID' => $far_id,
      'Proposal_ID' => $proposal_id,
      'Account_ID' => $account_id,
      'Item' => $far_item,
      'Quantity' => $far_quantity,
      'Unit_Price' => $far_unit,
      'Total_Amount' => $far_total_amount,
      'Source' => $far_source,
      'ProposalStatus' => $proposal_status,
      'OfficeProposal' => $office_proposal,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('Far_ID', $far_id);
    $this->db->from('fixed_assets_requirements');
    $result = $this->db->get();

    $rows = $result->num_rows();

    if ($rows == 1) {
      $this->db->where('Far_ID', $far_id);
      $result = $this->db->update('fixed_assets_requirements', $data);
    } else {
      $result = $this->db->insert('fixed_assets_requirements', $data);
    }

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);

    } else {
      $this->updateDate($proposal_id);
    }
  }

  public function saveOE($account_id, $proposal_id, $oe_item,
    $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id) {

    $proposal_status = "DRAFT";
    $office_proposal = "N/A";

    $data = array(
      'Account_ID' => $account_id,
      'Item' => $oe_item,
      'Quantity' => $oe_quantity,
      'Unit_Price' => $oe_unit,
      'Total_Amount' => $oe_total_amount,
      'Source' => $oe_source,
      'ProposalStatus' => $proposal_status,
      'OfficeProposal' => $office_proposal,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('OE_ID', $oe_id);
    $result = $this->db->update('operating_expenses', $data);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);

    } else {
      $this->updateDate($proposal_id);
    }
  }

  public function submitOE($account_id, $proposal_id, $oe_item,
    $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id) {

    $proposal_status = "PENDING";
    $office_proposal = "SC_TR";

    $data = array(
      'OE_ID' => $oe_id,
      'Proposal_ID' => $proposal_id,
      'Account_ID' => $account_id,
      'Item' => $oe_item,
      'Quantity' => $oe_quantity,
      'Unit_Price' => $oe_unit,
      'Total_Amount' => $oe_total_amount,
      'Source' => $oe_source,
      'ProposalStatus' => $proposal_status,
      'OfficeProposal' => $office_proposal,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('OE_ID', $oe_id);
    $this->db->from('operating_expenses');
    $result = $this->db->get();

    $rows = $result->num_rows();

    if ($rows == 1) {
      $this->db->where('OE_ID', $oe_id);
      $result = $this->db->update('operating_expenses', $data);
    } else {
      $result = $this->db->insert('operating_expenses', $data);
    }

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);

    } else {
      $this->updateDate($proposal_id);
    }
  }

  public function newOE($account_id, $proposal_id, $oe_item,
    $oe_quantity, $oe_unit, $oe_total_amount, $oe_source, $oe_id) {
    $data = array(
      'OE_ID' => $oe_id,
      'Proposal_ID' => $proposal_id,
      'Account_ID' => $account_id,
      'Item' => $oe_item,
      'Quantity' => $oe_quantity,
      'Unit_Price' => $oe_unit,
      'Total_Amount' => $oe_total_amount,
      'Source' => $oe_source,
      'ProposalStatus' => 'DRAFT',
      'OfficeProposal' => 'N/A',
    );

    $result = $this->db->insert('operating_expenses', $data);

  }

  public function checkOE($oe_id) {
    $this->db->where('OE_ID', $oe_id);
    $this->db->from('operating_expenses');
    $result = $this->db->get();

    $row = $result->num_rows();

    if ($row >= 1) {
      return true;
    } else {
      return false;
    }

  }


  public function submitActivityProposal($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
    $start_time, $end_time, $nature, $objectives, $rationale, $activity_chair, $participants,
    $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
    $collab_partner, $specified) {

    $office_proposal = "SC_SG";
    $proposal_status = "PENDING";

    $data = array(
      'Account_ID' => $account_id,
      'ActivityName' => $activity_name,
      'DateActivity' => $date_activity,
      'StartTime' => $start_time,
      'EndTime' => $end_time,
      'Nature' => $nature,
      'Objectives' => $objectives,
      'Rationale' => $rationale,
      'ActivityChair' => $activity_chair,
      'ChairContactNumber' => $contact_number,
      'Participants' => $participants,
      'ActivityVenue' => $activity_venue,
      'ProposalType1' => $proposal_type1,
      'Partners' => $collab_partner,
      'ProposalType2' => $proposal_type2,
      'NonAcademicType' => $non_academic_type,
      'Specified' => $specified,
      'OfficeProposal' => $office_proposal,
      'ProposalStatus' => $proposal_status,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('activity_proposal', $data);

    if (!$result) {
      return false;
    } else {
      $this->updateDate($proposal_id);
      return true;
    }

  }

  public function insertTracker($account_id, $proposal_id) {

    $prefix = $this->session->userdata('prefix');

    if ($prefix != 'SC') {

      if ($this->checkIfBPExists($proposal_id)) {
        $data = array(
          'Proposal_ID' => $proposal_id,
          'Account_ID' => $account_id,
          'SC_TR' => "PENDING",
          'SC_SG' => "PENDING",
        );

      } else {
        $data = array(
          'Proposal_ID' => $proposal_id,
          'Account_ID' => $account_id,
          'SC_SG' => "PENDING",
        );
      }

    } else {
      $data = array(
        'Proposal_ID' => $proposal_id,
        'Account_ID' => $account_id,
        'OPSA_APP' => "PENDING",
      );

    }

    $result = $this->db->insert('proposal_tracker', $data);

    if (!$result) {
      return false;
    }
    return true;
  }

  public function getDateTime($account_id, $proposal_id) {
    $date_time = date("Y-m-d h:i:sa");

    if ($this->session->userdata('org_type') == 'N/A') {
      $time_in = $account_id . "_TimeIn";

      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->set($time_in, $date_time);
      $result = $this->db->update('timestamp');

      if (!$result) {
        return false;
      } else {
        return true;
      }
    }

  }

  public function nextOffice($account_id, $proposal_id) {

    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->from('activity_proposal');
    $query = $this->db->get();

    $result = $query->row();

    $org_type = $result->Type;

    $offices = array(
      'SC_SG',
      'SC_TR',
      'SC_P',
      'OPSA_APP',
      'OPSA_APN',
      'OPSA_P',
      'OD',
    );

    if ($account_id == 'SC_TR') {
      unset($offices[0]);
    } else if ($account_id == 'SC_SG') {
      unset($offices[1]);
    } else if ($account_id == 'OPSA_APP') {
      unset($offices[4]);
    } else if ($account_id == 'OPSA_APN') {
      unset($offices[3]);
    } else if ($account_id == 'SC_P' && $org_type == 'Pro') {
      unset($offices[4]);
    } else if ($account_id == 'SC_P' && $org_type == 'NonPro') {
      unset($offices[3]);
    }

    $new_offices = array_values(array_filter($offices));

    while ($office = current($offices)) {
      if ($office == $account_id) {
        $office = next($offices);
        break;
      } else {
        next($offices);
        continue;
      }
    }

    return $office;
  }

  public function nextOfficePosition($next_office, $proposal_id) {

    $this->db->where('Account_ID', $next_office);
    $this->db->from('accounts');
    $query = $this->db->get();

    $result = $query->row();

    $position = $result->Position;

    return $position;
  }

  public function deleteRowFAR($far_id) {
    $response = array();

    $this->db->where('Far_ID', $far_id);
    $result = $this->db->delete('fixed_assets_requirements');

    return $result;
  }

  public function deleteRowOE($oe_id) {
    $response = array();

    $this->db->where('OE_ID', $oe_id);
    $result = $this->db->delete('operating_expenses');

    return $result;
  }

  public function deleteThis($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->delete('activity_proposal');

    if (!$result) {
      return false;
    }

    return true;
  }

  public function deleteComments($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->delete('comments');

    if (!$result) {
      return false;
    }

    return true;
  }

  public function submitRevision($account_id, $proposal_id, $contact_number, $activity_name, $date_activity,
    $start_time, $end_time, $nature, $rationale, $activity_chair, $participants,
    $activity_venue, $proposal_type1, $proposal_type2, $non_academic_type,
    $collab_partner, $specified) {

    $proposal_status = "PENDING";

    $data = array(
      'Account_ID' => $account_id,
      'ActivityName' => $activity_name,
      'DateActivity' => $date_activity,
      'StartTime' => $start_time,
      'EndTime' => $end_time,
      'Nature' => $nature,
      'Rationale' => $rationale,
      'ActivityChair' => $activity_chair,
      'ChairContactNumber' => $contact_number,
      'Participants' => $participants,
      'ActivityVenue' => $activity_venue,
      'ProposalType1' => $proposal_type1,
      'Partners' => $collab_partner,
      'ProposalType2' => $proposal_type2,
      'NonAcademicType' => $non_academic_type,
      'Specified' => $specified,
      'ProposalStatus' => $proposal_status,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('activity_proposal', $data);

    if (!$result) {
      return false;
    } else {
      $this->updateDate($proposal_id);
      return true;
    }

  }

  public function updateTracker($office_id, $proposal_id) {

    $data = array(
      $office_id => 'PENDING',
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('proposal_tracker', $data);
  }

  public function getMyTimeStamp() {
    $date_time = date("Y-m-d h:i:sa");

    return $date_time;
  }

  public function submitComments($field_name, $values, $proposal_id) {
    $counter = 0;
    $account_id = $this->session->userdata('account_id');
    while ($counter < count($values)) {
      $comment_id = rand(1000, 9999);
      $data = array(
        "CommentID" => $comment_id,
        "Proposal_ID" => $proposal_id,
        "Account_ID" => $account_id,
        "Field" => $field_name[$counter],
        "Comment" => $values[$counter],
      );

      $result = $this->db->insert('comments', $data);
      if (!$result) {
        return false;
      }
      $counter++;

    }
    return true;
  }

  public function forwardProposal($next_office, $next_position, $proposal_id, $account_id, $far, $oe) {

    if ($account_id != 'OD') {

      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->set('OfficeProposal', $next_office);
      $result = $this->db->update('activity_proposal');

      if ($account_id != 'SC_SG') {

        if ($oe) {
          
          $this->db->where('Proposal_ID', $proposal_id);
          $this->db->set('OfficeProposal', $next_office);
          $this->db->update('operating_expenses');
        }
        
        if ($far) {
          
          $this->db->where('Proposal_ID', $proposal_id);
          $this->db->set('OfficeProposal', $next_office);
          $this->db->update('fixed_assets_requirements');
        }
      }

      if (!$result) {
        return false;
      }

      $blank_time = "00-00-0000 00:00:00am";
      $time_in = $next_office . "_TimeIn";

      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->set($time_in, $blank_time);
      $result = $this->db->update('timestamp');

      if (!$result) {
        return false;
      }

      return true;
    } else {

      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->set('ProposalStatus', "APPROVED");
      $result = $this->db->update('activity_proposal');

      $time_approved = $this->getMyTimeStamp();

      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->set('TimeApproved', $time_approved);
      $result = $this->db->update('timestamp');

      if (!$result) {
        return false;
      }
      return true;
    }

  }

  public function isThisMine($account_id, $proposal_id) {
    $account_id = $this->session->userdata('account_id');
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where('Account_ID', $account_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

    $row = $result->num_rows();

    if ($row != 0) {
      return true;
    } else {
      return false;
    }
  }

  public function didIApproveThis($account_id, $proposal_id) {

    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->where($account_id, 'APPROVED');
    $this->db->from('proposal_tracker');
    $query = $this->db->get();

    $row = $query->num_rows();

    if ($row == 0) {
      return true;
    }

    return false;
  }

  public function createDate($proposal_id) {
    $date = date("Y-m-d");

    $data = array(
      'Proposal_ID' => $proposal_id,
      'DateProposed' => $date,
    );

    $result = $this->db->insert('timestamp', $data);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);
    }
  }

  public function checkApprovals($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');
    $result = $this->db->get();

    $treasurer_status = $result->row(2)->SC_TR;
    $secgen_status = $result->row(3)->SC_SG;

    if ($treasurer_status == 'APPROVED' || $secgen_status == 'APPROVED') {
      return true;
    } else {
      return false;
    }
  }

  public function checkOfficerApproval($proposal_id, $account_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');
    $result = $this->db->get();

    if ($account_id == 'SC_SG') {
      $treasurer = $result->row(2)->SC_TR;

      if ($treasurer == 'APPROVED') {
        return true;
      } else {
        return false;
      }

    }

    if ($account_id == 'SC_TR') {
      $secgen = $result->row(3)->SC_SG;

      if ($secgen == 'APPROVED') {
        return true;
      } else {
        return false;
      }
    }
  }

  public function approveTracker($account_id, $proposal_id) {

    if ($account_id != 'OD') {

      $this->db->where('Proposal_ID', $proposal_id);
      $this->db->from('proposal_tracker');
      $result = $this->db->get();

      //:: IF BP EXISTS
      if ($this->checkIfBPExists($proposal_id)) {
        if ($account_id == 'SC_SG' || $account_id == 'SC_TR') {
          if ($this->checkApprovals($proposal_id)) {
            $next_office = $this->nextOffice($account_id, $proposal_id);
            $data = array(
              $account_id => "APPROVED",
              $next_office => "PENDING",
            );

          } else {
            $data = array(
              $account_id => "APPROVED",
            );
          }

        } else {
          $next_office = $this->nextOffice($account_id, $proposal_id);
          $data = array(
            $account_id => "APPROVED",
            $next_office => "PENDING",
          );
        }

        //:: IF NOT, only activity proposal
      } else {
        $next_office = $this->nextOffice($account_id, $proposal_id);
        $data = array(
          $account_id => "APPROVED",
          $next_office => "PENDING",
        );
      }

    } else {
      $data = array(
        $account_id => "APPROVED",
      );
    }

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('proposal_tracker', $data);

  }

  public function getProposalStatus($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');
    $result = $this->db->get();

  }

  public function reviseTracker($account_id, $proposal_id) {
    $data = array(
      $account_id => "UNDER REVISION",
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('proposal_tracker', $data);

    $data = array(
      "ProposalStatus" => "UNDER REVISION",
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('activity_proposal', $data);

  }

  public function updateDate($proposal_id) {
    $date = date("Y-m-d");

    $data = array(
      'DateProposed' => $date,
    );

    $this->db->where('Proposal_ID', $proposal_id);
    $result = $this->db->update('timestamp', $data);

    if (!$result) {
      $response['success'] = false;
      echo json_encode($response);
    }
  }

  public function countApprovedProposals($account_id, $type) {

    $this->db->from('activity_proposal');
    $this->db->join('`TimeStamp`', 'activity_proposal.Proposal_ID = `TimeStamp`.Proposal_ID');
    $this->db->join('accounts', 'accounts.Account_ID = activity_proposal.Account_ID');
    $this->db->join('proposal_tracker', 'proposal_tracker.Proposal_ID = activity_proposal.Proposal_ID');

    if ($type != 'N/A') {

      $this->db->where('ProposalStatus', 'APPROVED');
      $this->db->where('activity_proposal.Account_ID', $account_id);

    } else {
      $this->db->where($account_id, 'APPROVED');
    }

    $this->db->order_by('DateProposed', 'asc');
    $result = $this->db->get();

    if (!$result) {
      return false;
    } else {
      return $result->num_rows();
    }
  }

  public function selectSAF($far_id, $oe_id) {
    if ($far_id != 0) {
      $this->db->where('Far_ID', $far_id);
      $this->db->from('fixed_assets_requirements');
    } else if ($oe_id != 0) {
      $this->db->where('OE_ID', $oe_id);
      $this->db->from('operating_expenses');
    }

    $result = $this->db->get();

    $row = $result->row();

    $source = $row->Source;

    if ($source == 'Student Activity Fund') {
      return 'selected="selected"';
    }
  }

  public function selectCF($far_id, $oe_id) {
    if ($far_id != 0) {
      $this->db->where('Far_ID', $far_id);
      $this->db->from('fixed_assets_requirements');
    } else if ($oe_id != 0) {
      $this->db->where('OE_ID', $oe_id);
      $this->db->from('operating_expenses');
    }

    $result = $this->db->get();

    $row = $result->row();

    $source = $row->Source;

    if ($source == 'Cultural Fund') {
      return 'selected="selected"';
    }
  }

  public function selectOF($far_id, $oe_id) {
    if ($far_id != 0) {
      $this->db->where('Far_ID', $far_id);
      $this->db->from('fixed_assets_requirements');
    } else if ($oe_id != 0) {
      $this->db->where('OE_ID', $oe_id);
      $this->db->from('operating_expenses');
    }

    $result = $this->db->get();

    $row = $result->row();

    $source = $row->Source;

    if ($source == 'Organizational Fund') {
      return 'selected="selected"';
    }
  }

  public function selectBF($far_id, $oe_id) {
    if ($far_id != 0) {
      $this->db->where('Far_ID', $far_id);
      $this->db->from('fixed_assets_requirements');

    } else if ($oe_id != 0) {
      $this->db->where('OE_ID', $oe_id);
      $this->db->from('operating_expenses');
    }

    $result = $this->db->get();

    $row = $result->row();

    $source = $row->Source;

    if ($source == 'Batch Fund') {
      return 'selected="selected"';
    }
  }

  public function selectPF($far_id, $oe_id) {
    if ($far_id != 0) {
      $this->db->where('Far_ID', $far_id);
      $this->db->from('fixed_assets_requirements');
    } else if ($oe_id != 0) {
      $this->db->where('OE_ID', $oe_id);
      $this->db->from('operating_expenses');
    }

    $result = $this->db->get();

    $row = $result->row();

    $source = $row->Source;

    if ($source == 'Publication Fund') {
      return 'selected="selected"';
    }
  }

  public function selectAF($far_id, $oe_id) {
    if ($far_id != 0) {
      $this->db->where('Far_ID', $far_id);
      $this->db->from('fixed_assets_requirements');
    } else if ($oe_id != 0) {
      $this->db->where('OE_ID', $oe_id);
      $this->db->from('operating_expenses');
    }

    $result = $this->db->get();

    $row = $result->row();

    $source = $row->Source;

    if ($source == 'Athletics Fund') {
      return 'selected="selected"';
    }
  }

  public function checkCoCurricularSpec($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->NonAcademicType == 'Co-Curricular') {
      return $row->Specified;
    } else {
      return ' ';
    }

  }

  public function checkExCurricularSpec($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('activity_proposal');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->NonAcademicType == 'Extra-Curricular') {
      return $row->Specified;
    } else {
      return ' ';
    }

  }

  public function checkApprovalPresident($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->SC_P == 'APPROVED') {
      return true;
    } else {
      return false;
    }
  }

  public function checkApprovalPrefect($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->OPSA_P == 'APPROVED') {
      return true;
    } else {
      return false;
    }
  }

  public function checkApprovalDean($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->OD == 'APPROVED') {
      return true;
    } else {
      return false;
    }
  }
  public function getSignaturePresident($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->SC_P == 'APPROVED') {
      $this->db->where('Account_ID', 'SC_P');
      $this->db->from('accounts');
      $result = $this->db->get();

      $row = $result->row();
      return $row->Signature;
    }
  }

  public function getSignaturePrefect($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->OPSA_P == 'APPROVED') {
      $this->db->where('Account_ID', 'OPSA_P');
      $this->db->from('accounts');
      $result = $this->db->get();

      $row = $result->row();
      return $row->Signature;
    } 
  }

  public function getSignatureDean($proposal_id) {
    $this->db->where('Proposal_ID', $proposal_id);
    $this->db->from('proposal_tracker');

    $result = $this->db->get();

    $row = $result->row();

    if ($row->OD == 'APPROVED') {
      $this->db->where('Account_ID', 'OD');
      $this->db->from('accounts');
      $result = $this->db->get();

      $row = $result->row();
      return $row->Signature;
    } 
  }
}

?>