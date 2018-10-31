<!DOCTYPE html>
<html>

<head>
  <?php
    $proposal_id = $ap_record->Proposal_ID;
    $prefix = $this->session->userdata('prefix');
    $account_id = $this->session->userdata('account_id');
    $organization = $this->session->userdata('organization');
    $full_name = $this->session->userdata('full_name');
    $position = $this->session->userdata('position');
  ?>
  <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
  <?php redirect('home')?>
  <?php endif?>

    <?php if ($this->session->userdata('account_id') != $ap_record->Account_ID): ?>
  <?php redirect('home')?>
  <?php endif?>
  <?php if ($this->session->userdata('logged_in')): ?>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proposal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/boot_styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
</head>

<body>

  <?php
    $this->load->view('layouts/header');
  ?>

  <form id="ajax_form_activity">
    <div class="container-fluid">
      <div class="row no-gutters">

        <!-- AP form -->



        <div class="col-md-2 main-form-buttons" style="margin-left: 3vw !important; margin-bottom: 15vw; border: 0px;">
          <div class="table-header button" id="btn_ap" href="ap">
            Activity Proposal
          </div>
          <a href="#far">
            <div class="table-header button" id="btn_far" href="far">
              Fixed Asset Req.
            </div>
          </a>
          <div class="table-header button" id="btn_oe" href="oe">
            Operating Expenses
          </div>
        </div>

        <div class="col-md-8 main-form">
          <div class="table-header linear-gradient main-header-text">Activity Proposal</div>
          <div id="table-container" class="row no-gutters main-form-text" style="overflow-y: scroll;">
            <!-- row start -->

            <!-- This serves as a buffer. Do not delete this. It's hidden anyway -->
            <input type="text" class="" name="proposal_id" id="proposal_id" value="<?=$ap_record->Proposal_ID?>" hidden
              readonly>

            <div class="ap-text form-group col-xs-5">

              Activity Name:
              <input type="text" class="form-control form-control-sm" name="activity_name" id="activity_name" value="<?=$ap_record->ActivityName?>"
                required>

              <br>

              Activity Chair:
              <input type="text" class="form-control form-control-sm" name="activity_chair" id="activity_chair" value="<?=$ap_record->ActivityChair?>"
                required>

              <br>

              Contact Number:
              <input type="text" class="form-control form-control-sm" name="contact_number" id="contact_number" value="<?=$ap_record->ChairContactNumber?>"
                required>

              <br>


              Activity Date:
              <input type="date" class="form-control form-control-sm" name="date_activity" id="date_activity" value="<?=$ap_record->DateActivity?>"
                required>

              <br>

              Activity Time:
              <input type="time" class="form-control form-control-sm" name="start_time_activity" id="start_time_activity"
                value="<?=$ap_record->StartTime?>" required> <br> To <br>
              <input type="time" class="form-control form-control-sm" name="end_time_activity" id="end_time_activity"
                value="<?=$ap_record->EndTime?>" required>

              <br>

              Activity Venue:
              <input type="text" class="form-control form-control-sm" name="activity_venue" id="activity_venue" value="<?=$ap_record->ActivityVenue?>"
                required>

            </div>

            <div class="ap-activitytype form-group col-xs-5">
              <div class="form-check row no-gutters">
                <label>Activity Type</label>

                <hr>

                <input type="radio" name="radio_activity_type_2" class="form-check-input rd_proposal_type2" id="rd_acad"
                  value="Academic" <?=$this->proposals_model->checkAcademic($proposal_id)?> required>
                <label id="label_radiobutton">ACADEMIC</label>
                <br>
                <input type="radio" name="radio_activity_type_2" class="form-check-input rd_proposal_type2" id="rd_nacad"
                  value="Non-Academic" <?=$this->proposals_model->checkNonAcademic($proposal_id)?> required>
                <label id="label_radiobutton">NON-ACADEMIC</label>
                <div class="rd-non-academic-container">

                  <div style="position: relative; left: 30px">

                    <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_comm" value="Community Involvement"
                      <?=$this->proposals_model->checkCommunity($proposal_id)?> disabled>Community Involvement
                    <br>

                    <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_cocur" value="Co-Curricular"
                      <?=$this->proposals_model->checkCoCurricular($proposal_id)?> disabled>Co-Curricular
                    <br>
                    <div id="co-curricular">
                      Specified: <input type="text" name="specified_co_curric" class="form-control" id="specified_co"
                        value="<?=$ap_record->Specified?>" disabled>
                    </div>

                    <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_excur" value="Extra-Curricular"
                      <?=$this->proposals_model->checkExtraCurricular($proposal_id)?> disabled>Extra-Curricular
                    <br>
                    <div id="extra-curricular">
                      Specified: <input type="text" name="specified_ex_curric" class="form-control" id="specified_ex"
                        value="<?=$ap_record->Specified?>" disabled>
                    </div>

                    <hr>
                  </div>

                  <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_ind" value="Independent"
                    <?=$this->proposals_model->checkIndependent($proposal_id)?> required>
                  <label id="label_radiobutton">INDEPENDENT</label>
                  <br>
                  <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_col" value="Collaborative"
                    <?=$this->proposals_model->checkCollaborative($proposal_id)?> required>
                  <label id="label_radiobutton">COLLABORATIVE</label>

                  <div id="collab-container">
                    Partner/s: <input type="text" class="field_ap form-control" name="specified_co_curric" id="partner_collab"
                      value="<?=$ap_record->Partners?>" disabled>
                  </div>
                </div>
              </div>


            </div> <!-- row end -->
            <div class="ap-longtext col-sm-12">

              <label>Nature of the Activity</label>
              <textarea rows="3" class="form-control form-control-sm" id="nature_textarea" name="nature" placeholder="What is the activity all about?"
                required><?=$ap_record->Nature?></textarea>

              <br>

              <label>Rationale</label>
              <textarea rows="3" class="form-control form-control-sm" id="rationale_textarea" name="rationale"
                placeholder="Goal or Aim in doing this activity in number form" required><?=$ap_record->Rationale?></textarea>

              <br>


              <label>Participants</label>
              <textarea rows="3" class="form-control form-control-sm" id="participants_textarea" name="participants"
                required><?=$ap_record->Participants?></textarea>

              <br>

              <input type="reset" class="table-header button button-ap" id="button" value="Clear">
              <input type="button" class="table-header button button-ap" name="save_btn" id="btn_save_ap" value="Save">
            </div>
          </div>
        </div>

        <!-- FAR form -->
        <div class="col-md-2 main-form-buttons" style="margin-left: 3vw !important; margin-bottom: 15vw; border: 0px;">

        </div>
        <div class="col-md-8 main-form" id="#ap">
          <div class="table-header linear-gradient main-header-text">Fixed Asset Requirements</div>
          <div id='table-container-far' class="main-text" style="overflow-y: scroll;">


            <div class="container-far">
              <hr id="proposal_hr">
              <table id="fields_far">
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Amount</th>
                <th>Source of Fund</th>

                <?php if (is_array($far_records) || is_object($far_records)): ?>
                <?php $far_counter = 1;?>
                <?php foreach ($far_records as $far_record): ?>
                <?php $far_id = $far_record->Far_ID ?>
                <tr id="far-row<?=$far_counter?>" value="<?=$far_counter?>">
                  <td>
                    <?=$far_counter?>
                  </td>
                  <td>
                    <input type="text" class="form-control form-control-sm medium-text-box far-item" name="far_item[]"
                      id="far_txt_item<?=$far_counter?>" value="<?=$far_record->Item?>" />
                  </td>
                  <td>
                    <input type="number" class="form-control form-control-sm small-text-box far-quantity" name="far_quantity[]"
                      id="far_txt_quantity<?=$far_counter?>" oninput="calculate(this.id)" min=0 value="<?=$far_record->Quantity?>" />
                  </td>
                  <td>
                    <input type="number" class="form-control form-control-sm small-text-box far-unit" name="far_unit_price[]"
                      id="far_txt_unit<?=$far_counter?>" oninput="calculate(this.id)" step="any" min=0 value="<?=$far_record->Unit_Price?>" />
                  </td>
                  <td>
                    <input type="number" class="form-control form-control-sm small-text-box far-total" name="far_total_amount[]"
                      id="far_txt_total<?=$far_counter?>" value="<?=$far_record->Total_Amount?>" readonly />
                  </td>
                  <td>
                    <select class="form-control medium-text-box far-source" name="far_source[]" id="far_source_of_fund<?=$far_counter?>">
                      <option <?=$this->proposals_model->selectSAF($far_id, 0)?> >Student Activity Fund</option>
                      <option <?=$this->proposals_model->selectCF($far_id, 0)?> >Cultural Fund</option>
                      <option <?=$this->proposals_model->selectOF($far_id, 0)?> >Organizational Fund</option>
                      <option <?=$this->proposals_model->selectBF($far_id, 0)?> >Batch Fund</option>
                      <option <?=$this->proposals_model->selectPF($far_id, 0)?> >Publication Fund</option>
                      <option <?=$this->proposals_model->selectAF($far_id, 0)?> >Athletics Fund</option>
                    </select>
                  </td>
                  <td>
                    <input type='button' class='table-header button-delete-far' name='btn_delete_far' id='button-delete-far-<?=$far_counter?>' value='Delete'>

                    <input type="text" class="form-control form-control-sm far-id" name="far_id[]" id="far_txt_id<?=$far_counter?>"
                      value="<?=$far_id?>" hidden required readonly />
                    <input type="text" class="form-control form-control-sm far-proposal-id" name="proposal_id" id="far_txt_proposal_id<?=$far_counter?>"
                      value="<?=$far_record->Proposal_ID?>" hidden required readonly />

                  </td>
                </tr>
                <?php $far_counter++;?>
                <?php endforeach?>
                <?php endif?>
              </table>

              Total:
              <input class="form-control form-control-sm medium-text-box" type="number" id="far_overall_amount" value=0
                readonly> (not currently working)

              <input type="button" class="table-header button button-ap" name="btn_add_far" id="button-add-far" value="Add">
              <!-- <input type="button" class="table-header button button-ap" name="btn_delete_far" id="button-delete-far" value="Delete"> -->
              <input type="reset" class="table-header button button-ap" id="button" value="Clear">
              <input type="button" class="table-header button button-ap" name="save_btn" id="btn_save_far" value="Save">
            </div>
          </div>
        </div>
        


        <!-- OE form -->

        <div class="col-md-2 main-form-buttons" style="margin-left: 3vw !important; margin-bottom: 15vw; border: 0px;">
        </div>
        
        <div class="col-md-8 main-form">
          <div class="table-header linear-gradient main-header-text">Operating Expenses</div>
          <div id="table-container-oe" class="main-text" style="overflow-y: scroll;">

            <div class="container-oe">
              <hr id="proposal_hr">
              <table id="fields_oe">
                <th>#</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Amount</th>
                <th>Source of Fund</th>
                <?php if (is_array($oe_records) || is_object($oe_records)): ?>
                <?php $oe_counter = 1;?>
                <?php foreach ($oe_records as $oe_record): ?>
                <?php $oe_id = $oe_record->OE_ID ?>
                <tr id="oe-row<?=$oe_counter?>">
                  <td>
                    <?=$oe_counter?>
                  </td>
                  <td>
                    <input type="text" class="form-control form-control-sm medium-text-box" name="oe_item[]" id="oe_txt_item<?=$oe_counter?>"
                      value="<?=$oe_record->Item?>" />
                  </td>
                  <td>
                    <input type="number" class="form-control form-control-sm small-text-box" name="oe_quantity[]" id="oe_txt_quantity<?=$oe_counter?>"
                      oninput="calculate2(this.id)" min=0 value="<?=$oe_record->Quantity?>" />
                  </td>
                  <td>
                    <input type="number" class="form-control form-control-sm small-text-box" name="oe_unit_price[]" id="oe_txt_unit<?=$oe_counter?>"
                      oninput="calculate2(this.id)" step="any" min=0 value="<?=$oe_record->Unit_Price?>" />
                  </td>
                  <td>
                    <input type="number" class="form-control form-control-sm small-text-box" name="oe_total_amount[]" id="oe_txt_total<?=$oe_counter?>"
                      value="<?=$oe_record->Total_Amount?>" readonly />
                  </td>
                  <td>
                    <select class="form-control medium-text-box" name="oe_source[]" id="oe_source_of_fund<?=$oe_counter?>">
                      <option <?=$this->proposals_model->selectSAF(0, $oe_id)?> >Student Activity Fund</option>
                      <option <?=$this->proposals_model->selectCF(0, $oe_id)?> >Cultural Fund</option>
                      <option <?=$this->proposals_model->selectOF(0, $oe_id)?> >Organizational Fund</option>
                      <option <?=$this->proposals_model->selectBF(0, $oe_id)?> >Batch Fund</option>
                      <option <?=$this->proposals_model->selectPF(0, $oe_id)?> >Publication Fund</option>
                      <option <?=$this->proposals_model->selectAF(0, $oe_id)?> >Athletics Fund</option>
                    </select>
                  </td>
                  <td>
                    <input type='button' class='table-header button-delete-oe' name='btn_delete_oe' 
                      id='button-delete-oe-<?=$oe_counter?>' value='Delete'>

                    <input type="text" class="form-control form-control-sm" hidden name="oe_id[]" id="oe_txt_id<?=$oe_counter?>"
                     value="<?=$oe_id?>" hidden required readonly />
                    <input type="text" class="form-control form-control-sm oe-proposal-id" name="proposal_id" id="oe_txt_proposal_id<?=$oe_counter?>"
                      value="<?=$oe_record->Proposal_ID?>" hidden required readonly />
                  </td>
                </tr>
                <?php $oe_counter++;?>
                <?php endforeach?>
                <?php endif?>
              </table>

              Total:
              <input type="number" class="form-control form-control-sm medium-text-box" id="oe_overall_amount" value=0
                readonly> (not currently working)

              <input type="button" class="table-header button button-ap" name="btn_add_oe" id="button-add-oe" value="Add">
              <!-- <input type="button" class="table-header button button-ap" name="btn_delete_oe" id="button-delete-oe" value="Delete"> -->
              <input type="reset" class="table-header button button-ap" id="button" value="Clear">
              <input type="button" class="table-header button button-ap" name="save_btn" id="btn_save_oe" value="Save">

            </div>
          </div>
        </div>
      </div>


      require submission of scanned documents (necessary forms for submission)

      <div class="button-container-proposal">
        <a href="<?=base_url()?>home">
          <input type="button" class="table-header button" name="back" id="button" value="Go Back">
        </a>
        <?php if (!$this->proposals_model->checkIfOEExists($proposal_id) || !$this->proposals_model->checkIfFARExists($proposal_id)): ?>
        <input type="submit" class="table-header button" name="submit" id="submit_btn" value="Submit">
        <?php endif?>
        <a href="delete/<?=$ap_record->Proposal_ID?>">
          <input type="button" class="table-header button" name="delete_btn" id="btn_delete" value="Delete Proposal">
        </a>
      </div>

      <!-- NEW FORM END -->

  </form>

  <!-- MAIN END -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js">
  </script>
  <script src="<?=base_url();?>assets/js/dropdown.js">
  </script>
  <script src="<?=base_url();?>assets/js/plugin.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous">
  </script>


  <?php else: ?>
<?php
  $this->load->view('users/login_view');
?>
<?php endif?>
</body>

</html>