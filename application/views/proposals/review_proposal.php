<!doctype html>
<html lang="en">
  <head>
  <?php if ($this->session->userdata('logged_in')): ?>
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
    

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proposal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
      crossorigin="anonymous">
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  </head>
  <body>
		<form id="ajax_form_activity">
    <div class="container-fluid" style="height: 100vh; max-width: 100%;"> <!-- CONTAINER START -->
    <?php 
    $this->load->view('layouts/header');
    ?>
      
      <div class="row oapps-mh mb-5 oapps-proposal"> <!-- FIRST ROW START -->
        
        <!-- ACTIVITY PROPOSAL START-->

        <div class="col-lg-8 offset-lg-2 mt-5 mb-2 oapps-rh h-100" style="border: 1px black solid;"> <!-- ACTIVITY PROPOSAL COL START -->
          <div class="row oapps-bg-head"> <!-- ACTIVITY PROPOSAL HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Activity Proposal</p>
            </div>
          </div> <!-- ACTIVITY PROPOSAL HEAD ROW END -->
          <div id="table-container" class="row oapps-ch" style="overflow-y: auto;"> <!-- ACTIVITY PROPOSAL START -->
            <p class="m-4">
              <!-- This serves as a buffer. Do not delete this. It's hidden anyway -->
              <input type="text" class="" name="proposal_id" id="proposal_id" value="<?=$ap_record->Proposal_ID?>" hidden
              >
              <!-- ACTIVITY PROPOSAL CONTENT START -->
              <div class="ap-text form-group col-md-5 mr-5 mt-5"><!-- ACTIVITY PROPOSAL FORM TEXT SECTION START-->

                Activity Name:
                <input type="text" class="readonly form-control form-control-sm" name="activity_name" id="activity_name" value="<?=$ap_record->ActivityName?>"
                  oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" required >

                <br>

                Activity Chair:
                <input type="text" class="form-control form-control-sm readonly" name="activity_chair" id="activity_chair" value="<?=$ap_record->ActivityChair?>"
                 oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off"  required >

                <br>

                Contact Number:
                <input type="text" class="form-control form-control-sm readonly" name="contact_number" id="contact_number" value="<?=$ap_record->ChairContactNumber?>"
                oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" autocomplete="off" required >

                <br>


                Activity Date:
                <input type="date" class="form-control form-control-sm readonly" name="date_activity" id="date_activity" value="<?=$ap_record->DateActivity?>"
                 oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" disabled >

                <br>

                Activity Time:
                <input type="time" class="form-control form-control-sm readonly" name="start_time_activity" id="start_time_activity"
                  value="<?=$ap_record->StartTime?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" disabled required > <br> To <br>
                <input type="time" class="form-control form-control-sm readonly" name="end_time_activity" id="end_time_activity"
                  value="<?=$ap_record->EndTime?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" disabled required >

                <br>

                Activity Venue:
                <input type="text" class="form-control form-control-sm readonly" name="activity_venue" id="activity_venue" value="<?=$ap_record->ActivityVenue?>"
                 oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" required >

              </div><!-- ACTIVITY PROPOSAL FORM TEXT SECTION END-->


              <div class="ap-activitytype form-group col-md-5 ml-5 mt-5"><!-- ACTIVITY PROPOSAL FORM RADIO SECTION START-->
                <div class="form-check row no-gutters">
                  <label>Activity Type</label>

                  <hr>

                  <input type="radio" name="radio_activity_type_2" class="form-check-input rd_proposal_type2" id="rd_acad"
                    value="Academic" <?=$this->proposals_model->checkAcademic($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" required disabled>
                  <label id="label_radiobutton">ACADEMIC</label>
                  <br>
                  <input type="radio" name="radio_activity_type_2" class="form-check-input rd_proposal_type2 readonly" id="rd_nacad"
                    value="Non-Academic" <?=$this->proposals_model->checkNonAcademic($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" required disabled>
                  <label id="label_radiobutton">NON-ACADEMIC</label>
                  <div class="rd-non-academic-container">

                    <div style="position: relative; left: 30px">

                      <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd readonly" id="rd_comm" value="Community Involvement"
                        <?=$this->proposals_model->checkCommunity($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" disabled>Community Involvement
                      <br>

                      <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd readonly" id="rd_cocur" value="Co-Curricular"
                        <?=$this->proposals_model->checkCoCurricular($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" disabled>Co-Curricular
                      <br>
                      <div id="co-curricular">
                        Specified: <input type="text" name="specified_co_curric" class="form-control readonly" id="specified_co"
                          value="<?=$ap_record->Specified?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" disabled >
                      </div>

                      <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd readonly" id="rd_excur" value="Extra-Curricular"
                        <?=$this->proposals_model->checkExtraCurricular($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" disabled>Extra-Curricular
                      <br>
                      <div id="extra-curricular">
                        Specified: <input type="text" name="specified_ex_curric" class="form-control readonly" id="specified_ex"
                          value="<?=$ap_record->Specified?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" disabled >
                      </div>

                      <hr>
                    </div>

                    <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1 readonly" id="rd_ind" value="Independent"
                      <?=$this->proposals_model->checkIndependent($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" required disabled>
                    <label id="label_radiobutton">INDEPENDENT</label>
                    <br>
                    <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1 readonly" id="rd_col" value="Collaborative" 
                      <?=$this->proposals_model->checkCollaborative($proposal_id)?> oninvalid="this.setCustomValidity('Please go back to fill this up')" required disabled >
                    <label id="label_radiobutton">COLLABORATIVE</label>

                    <div id="collab-container">
                      Partner/s: <input type="text" class="field_ap form-control readonly" name="specified_co_curric" id="partner_collab"
                        value="<?=$ap_record->Partners?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" disabled>
                    </div>
                  </div>
                </div>
              </div><!-- ACTIVITY PROPOSAL FORM RADIO SECTION END-->
              <div class="ap-longtext my-5 col-md-12"><!-- ACTIVITY PROPOSAL FORM LONG TEXT SECTION START-->
                <label>Nature of the Activity</label>
                <textarea rows="3" class="form-control form-control-sm readonly" id="nature_textarea" name="nature" placeholder="What is the activity all about?"
                  maxlength="230" oninvalid="this.setCustomValidity('Please go back to fill this up')" required ><?=$ap_record->Nature?></textarea>

                <br>

                <label>Objectives of the Activity</label>
                <textarea rows="3" class="form-control form-control-sm readonly" id="objectives_textarea" name="objectives" placeholder="Goal or Aim in doing this activity in number form"
                  maxlength="230" oninvalid="this.setCustomValidity('Please go back to fill this up')" required ><?=$ap_record->Objectives?></textarea>

                <br>

                <label>Rationale</label>
                <textarea rows="3" class="form-control form-control-sm readonly" id="rationale_textarea" name="rationale"
                  placeholder="Goal or Aim in doing this activity in number form" maxlength="350" oninvalid="this.setCustomValidity('Please go back to fill this up')" required ><?=$ap_record->Rationale?></textarea>

                <br>


                <label>Participants</label>
                <textarea rows="3" class="form-control form-control-sm readonly" id="participants_textarea" name="participants"
                 oninvalid="this.setCustomValidity('Please go back to fill this up')" required ><?=$ap_record->Participants?></textarea>

                <br>
              </div><!-- ACTIVITY PROPOSAL FORM LONG TEXT SECTION END-->              
              <!-- ACTIVITY PROPOSAL CONTENT END -->
            </p>
          </div> <!-- ACTIVITY PROPOSAL END -->
        </div> <!-- ACTIVITY PROPOSAL COL END -->
      </div><!-- FIRST ROW END -->

      <!-- ACTIVITY PROPOSAL END -->

      <div class="row oapps-mh"> <!-- SECOND ROW START -->
        <!-- FIXED ASSET REQ START-->

        <div class="col-lg-8 offset-lg-2 oapps-rh h-100" style="border: 1px black solid"> <!-- FIXED ASSET COL START -->
          <div class="row oapps-bg-head"> <!-- FIXED ASSET REQ HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Fixed Asset Requirements</p>
            </div>
          </div> <!-- FIXED ASSET REQ HEAD ROW END -->
          <div class="row oapps-ch" style="overflow-y: auto;" > <!-- FIXED ASSET REQ START -->
            <p class="m-4">
              <!-- FIXED ASSET REQ CONTENT START -->
              <div class="container-far">
                <hr id="proposal_hr">
                <table id="fields_far">
                  <th class="lead">#</th>
                  <th class="lead">Items</th>
                  <th class="lead">Quantity</th>
                  <th class="lead">Unit Price</th>
                  <th class="lead">Total Amount</th>
                  <th class="lead">Source of Fund</th>

                  <?php if (is_array($far_records) || is_object($far_records)): ?>
                  <?php 
                  $far_counter = 1;
                  $far_total = 0;
                  ?>
                  <?php foreach ($far_records as $far_record): ?>
                  <?php $far_id = $far_record->Far_ID ?>
                  <tr id="far-row<?=$far_counter?>" value="<?=$far_counter?>">
                    <td>
                      <?=$far_counter?>
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm medium-text-box far-item readonly" name="far_item[]"
                        id="far_txt_item<?=$far_counter?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" value="<?=$far_record->Item?>" maxlength="15" />
                    </td>
                    <td>
                      <input type="number" class="form-control form-control-sm small-text-box far-quantity readonly" name="far_quantity[]"
                        id="far_txt_quantity<?=$far_counter?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" oninput="calculate(this.id)" min=0 value="<?=$far_record->Quantity?>" />
                    </td>
                    <td>
                      <input type="number" class="form-control form-control-sm small-text-box far-unit readonly" name="far_unit_price[]"
                        id="far_txt_unit<?=$far_counter?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" oninput="calculate(this.id)" step="any" min=0 value="<?=$far_record->Unit_Price?>" />
                    </td>
                    <td>
                      <input type="number" class="form-control form-control-sm small-text-box far-total readonly" name="far_total_amount[]"
                        id="far_txt_total<?=$far_counter?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" value="<?=$far_record->Total_Amount?>" />
                        <?php $far_total += $far_record->Total_Amount?>
                    </td>
                    <td>
                      <select class="form-control medium-text-box far-source readonly" oninvalid="this.setCustomValidity('Please go back to fill this up')" name="far_source[]" id="far_source_of_fund<?=$far_counter?>" >
                        <option <?=$this->proposals_model->selectSAF($far_id, 0)?> >Student Activity Fund</option>
                        <option <?=$this->proposals_model->selectCF($far_id, 0)?> >Cultural Fund</option>
                        <option <?=$this->proposals_model->selectOF($far_id, 0)?> >Organizational Fund</option>
                        <option <?=$this->proposals_model->selectBF($far_id, 0)?> >Batch Fund</option>
                        <option <?=$this->proposals_model->selectPF($far_id, 0)?> >Publication Fund</option>
                        <option <?=$this->proposals_model->selectAF($far_id, 0)?> >Athletics Fund</option>
                      </select>
                    </td>
                    <td>
                      

                      <input type="text" class="form-control form-control-sm far-id readonly" name="far_id[]" id="far_txt_id<?=$far_counter?>"
                        value="<?=$far_id?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" hidden required />
                      <input type="text" class="form-control form-control-sm far-proposal-id readonly" name="proposal_id" id="far_txt_proposal_id<?=$far_counter?>"
                        value="<?=$far_record->Proposal_ID?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" hidden required />

                    </td>
                  </tr>
                  <?php $far_counter++;?>
                  <?php endforeach?>
                  <?php endif?>
                </table>

                Total:
                <input class="form-control form-control-sm medium-text-box" type="text" id="far_overall_amount" value= 'PHP <?=number_format($far_total)?>'
                  readonly>

              </div>
              <!-- FIXED ASSET REQ CONTENT END -->
            </p>
          </div> <!-- FIXED ASSET REQ END -->
        </div> <!-- FIXED ASSET REQ COL END -->
      </div><!-- SECOND ROW END -->


      <div class="row oapps-mh mb-5"> <!-- THIRD ROW START -->
        <!-- OPERATING EXPENSES START-->

        <div class="col-lg-8 offset-lg-2 oapps-rh h-100" style="border: 1px black solid"> <!-- ACTIVITY PROPOSAL COL START -->
          <div class="row oapps-bg-head"> <!-- OPERATING EXPENSES HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Operating Expenses</p>
            </div>
          </div> <!-- OPERATING EXPENSES HEAD ROW END -->
          <div class="row oapps-ch" style="overflow-y: auto;"> <!-- OPERATING EXPENSES START -->
            <p class="m-4">
              <!-- OPERATING EXPENSES CONTENT START -->
              <div class="container-oe">
                <hr id="proposal_hr">
                <table id="fields_oe">
                  <th class="lead">#</th>
                  <th class="lead">Item</th>
                  <th class="lead">Quantity</th>
                  <th class="lead">Unit Price</th>
                  <th class="lead">Total Amount</th>
                  <th class="lead" class="lead">Source of Fund</th>
                  <?php if (is_array($oe_records) || is_object($oe_records)): ?>
                  <?php 
                  $oe_counter = 1;
                  $oe_total = 0;
                  ?>
                  <?php foreach ($oe_records as $oe_record): ?>
                  <?php $oe_id = $oe_record->OE_ID ?>
                  <tr id="oe-row<?=$oe_counter?>">
                    <td>
                      <?=$oe_counter?>
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm medium-text-box readonly" name="oe_item[]" id="oe_txt_item<?=$oe_counter?>"
                        value="<?=$oe_record->Item?>" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" maxlength="15" />
                    </td>
                    <td>
                      <input type="number" class="form-control form-control-sm small-text-box readonly" name="oe_quantity[]" id="oe_txt_quantity<?=$oe_counter?>"
                        oninput="calculate2(this.id)" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" min=0 value="<?=$oe_record->Quantity?>" />
                    </td>
                    <td>
                      <input type="number" class="form-control form-control-sm small-text-box readonly" name="oe_unit_price[]" id="oe_txt_unit<?=$oe_counter?>"
                        oninput="calculate2(this.id)" oninvalid="this.setCustomValidity('Please go back to fill this up')" autocomplete="off" step="any" min=0 value="<?=$oe_record->Unit_Price?>" />
                    </td>
                    <td>
                      <input type="number" class="form-control form-control-sm small-text-box readonly" name="oe_total_amount[]" id="oe_txt_total<?=$oe_counter?>"
                       oninvalid="this.setCustomValidity('Please go back to fill this up')" value="<?=$oe_record->Total_Amount?>" />
                       <?php $oe_total += $oe_record->Total_Amount?>
                    </td>
                    <td>
                      <select class="form-control medium-text-box readonly" oninvalid="this.setCustomValidity('Please go back to fill this up')" name="oe_source[]" id="oe_source_of_fund<?=$oe_counter?>" >
                        <option <?=$this->proposals_model->selectSAF(0, $oe_id)?> >Student Activity Fund</option>
                        <option <?=$this->proposals_model->selectCF(0, $oe_id)?> >Cultural Fund</option>
                        <option <?=$this->proposals_model->selectOF(0, $oe_id)?> >Organizational Fund</option>
                        <option <?=$this->proposals_model->selectBF(0, $oe_id)?> >Batch Fund</option>
                        <option <?=$this->proposals_model->selectPF(0, $oe_id)?> >Publication Fund</option>
                        <option <?=$this->proposals_model->selectAF(0, $oe_id)?> >Athletics Fund</option>
                      </select>
                    </td>
                    <td>
                      <input type="text" class="form-control form-control-sm readonly" hidden name="oe_id[]" id="oe_txt_id<?=$oe_counter?>"
                      value="<?=$oe_id?>" autocomplete="off" hidden required />
                      <input type="text" class="form-control form-control-sm oe-proposal-id" name="proposal_id" id="oe_txt_proposal_id<?=$oe_counter?>"
                        value="<?=$oe_record->Proposal_ID?>" autocomplete="off" hidden required />
                    </td>
                  </tr>
                  <?php $oe_counter++;?>
                  <?php endforeach?>
                  <?php endif?>
                </table>

                Total:
                <input type="text" class="form-control form-control-sm medium-text-box" id="oe_overall_amount" value= 'PHP <?=number_format($oe_total)?>'
                  readonly>

              </div>
              <!-- OPERATING EXPENSES CONTENT END -->
            </p>
          </div> <!-- OPERATING EXPENSES END -->
        </div> <!-- OPERATING EXPENSES COL END -->
      </div><!-- THIRD ROW END -->

      <div class="row no-gutters mt-5"><!-- FOURTH ROW END -->
        <div class="col-lg-10 ml-5 mt-5"> <!-- INSERT DOCUMENT SUBMISSION HERE -->
          <div class="card" style="width: 18rem;">
            <div class="card-header">
              Documents
            </div>
            <ul class="list-group list-group-flush">
              <?php if(is_array($documents) || is_object($documents)):?>
                <?php foreach($documents as $document): ?>
                  <li class="list-group-item"><a href="<?=base_url()?>uploads/files/<?=$document->Document?>"><?=$document->Document_Type?></a></li>
                <?php endforeach ?>
              <?php else: ?>
                <li class="list-group-item">No Documents</a></li>
              <?php endif ?>
            </ul>
          </div>
        </div>

      </div>
      <div class="row d-flex">
        <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6 col-sm-8 offset-sm-4 col-xs-8 offset-xs-4 my-5"> <!-- FINAL BUTTONS HERE -->
          <a href="<?=base_url()?>proposal/edit/<?=$ap_record->Proposal_ID?>">
            <input type="button" class="table-header btn btn-light btn-lg" name="back" id="button" value="Go Back">
          </a>
          <input type="submit" class="table-header btn btn-light btn-lg" name="submit" id="submit_btn" value="Confirm">
        </div>
      </div>


        <?php else: ?>
      <?php
        $this->load->view('users/login_view');
      ?>
      <?php endif?>

    </div> <!-- CONTAINER END -->
</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
      crossorigin="anonymous">
    </script>
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/dropdown.js">
  </script>
  <script src="<?=base_url();?>assets/js/plugin.js">
  </script>
  </body>
</html>

