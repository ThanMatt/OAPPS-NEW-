<!DOCTYPE html>
<html> 
<head>
  <?php 
  $proposal_id = $ap_record->Proposal_ID; 
  $prefix = $this->session->userdata('prefix');
  ?>
  <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
  <?php redirect('home')?>
  <?php endif ?>
  
  <?php if ($this->session->userdata('account_id') != $ap_record->Account_ID): ?>
  <?php redirect('home')?>
  <?php endif ?>
  <?php if ($this->session->userdata('logged_in')): ?>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Proposal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>
</head>

<body>

  <!-- MAIN HEADER START -->

  <div class="container-fluid linear-gradient header-height">
    <div class="row" style="width: 100%;">
      <div class="col-xl-4 col-md-4 col-xs-4">          
        <div class="javanese-header">
          OAPPS
        </div>
      </div>
      <div class="col-xl-8 col-md-8 col-xs-8">
        <div class="display-picture-holder">
          <div class="display-picture">
            <img class="dropbtn" src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.png">
          </div>
        </div>
      </div>
      <div class="row col-md-12 col-xs-12 calibri-sub-header">
        Online Activity Proposal Processing System
      </div>
    </div>
  </div>

  <!-- MAIN HEADER END -->
  <!-- SECOND HEADER START -->

  <div class="container-fluid">
    <div class="row second-header-color second-header-height align-items-center">
      <div style="width: 1% !important;">
      </div>
      <div class="col-md col-xs">
        <a href="<?=base_url()?>submit">
          <div class="second-header-text">Make New Proposal</div>
        </a>
      </div>     
      <div class="col-md col-xs">
        <div class="second-header-text">Reports</div>
      </div>   
      <div class="col-md col-xs">
        <div class="second-header-text">Downloadable Forms</div>
      </div> 
      <div class="col-md-7"></div>   
    </div>
  </div>

  <!-- SECOND HEADER END -->

    <!-- NEW FORM START -->

    <!-- HEADER-TABLE GAP START -->

    <div class="container-fluid">
      <div class="row no-gutters">
        <div class="col-md-12 header-table-gap"></div>
      </div>
    </div>

    <!-- HEADER-TABLE GAP END -->

  <div class="container-fluid">
  <div class="row no-gutters">

  <!-- AP form -->


  <div class="col-md-2 main-form-buttons"style="margin-left: 3vw !important; margin-bottom: 15vw; border: 0px;">
  <div class="table-header button" id="btn_ap" href="ap">
      Activity Proposal
    </div>
    <div class="table-header button" id="btn_far" href="far">
      Fixed Asset Req.
    </div>
    <div class="table-header button" id="btn_oe" href="oe">
      Operating Expenses
    </div>
  </div>  
  <div class="col-md-8 main-form" id="#ap"> 
    <div class="table-header linear-gradient main-header-text">Proposal Overview</div>
    <div id="table-container" class="main-text" style="overflow-y: scroll;">

      <!-- This serves as a buffer. Do not delete this. It's hidden anyway -->
      <input type="text" class="field_ap" name="proposal_id" id="proposal_id" value="<?=$ap_record->Proposal_ID?>" hidden readonly>
                
      <hr id="proposal_hr">Activity Name: 
      <input type="text" class="field_ap" name="activity_name" id="activity_name" value="<?=$ap_record->ActivityName?>" required>
      <br>Date:
      <input type="date" class="field_ap" name="date_activity" id="date_activity" value="<?=$ap_record->DateActivity?>" required>

      <br> Time:
      <input type="time" class="field_ap" name="start_time_activity" id="start_time_activity" value="<?=$ap_record->StartTime?>" required> to
      <input type="time" class="field_ap" name="end_time_activity" id="end_time_activity" value="<?=$ap_record->EndTime?>" required>
      <br>

      <label>Nature of the Activity</label>
      <br>
      <textarea rows="5" class="field_ap" cols="40" id="nature_textarea" name="nature" placeholder="What is the activity all about?" required><?=$ap_record->Nature?></textarea>
      <br>


      <label>Rationale</label>
      <textarea rows="5" class="field_ap" cols="40" id="rationale_textarea" name="rationale" placeholder="Goal or Aim in doing this activity in number form" required><?=$ap_record->Rationale?></textarea>

      <br> Activity Chair:
      <input type="text" class="field_ap" name="activity_chair" id="activity_chair" value="<?=$ap_record->ActivityChair?>" required>
      <br>
      
      Contact Number:
      <input type="text" class="field_ap" name="contact_number" id="contact_number" value="<?=$ap_record->ChairContactNumber?>" required>
      <br>

      <label>Participants</label>
      <textarea rows="5" class="field_ap" cols="40" id="participants_textarea" name="participants" required><?=$ap_record->Participants?></textarea>
      <br> Venue:
      <input type="text" class="field_ap" name="activity_venue" id="activity_venue" value="<?=$ap_record->ActivityVenue?>" required>
      <br>

      <div class="radio-container-proposal">
        <div class="radio-subcontainer-proposal-1">
          <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_ind" value="Independent" <?=$this->proposals_model->checkIndependent($proposal_id)?> required>
          <label id="label_radiobutton">INDEPENDENT</label>
          <br>
          <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_col" value="Collaborative" <?=$this->proposals_model->checkCollaborative($proposal_id)?> required>
          <label id="label_radiobutton">COLLABORATIVE</label>
          
          <div id="collab-container" hidden>
            Partner/s: <input type="text" class="field_ap" name="specified_co_curric" id="partner_collab" value="<?=$ap_record->Partners?>" disabled>
          </div>
        </div>

        <div class="radio-subcontainer-proposal-2">
          <input type="radio" name="radio_activity_type_2" class="rd_proposal_type2" id="rd_acad" value="Academic" <?=$this->proposals_model->checkAcademic($proposal_id)?> required>
          <label id="label_radiobutton">ACADEMIC</label>
          <br>
          <input type="radio" name="radio_activity_type_2" class="rd_proposal_type2" id="rd_nacad" value="Non-Academic" <?=$this->proposals_model->checkNonAcademic($proposal_id)?> required>
          <label id="label_radiobutton">NON-ACADEMIC</label>
          <div class="rd-non-academic-container" hidden>

            <input type="radio" name="non_academic_rd" class="non_acad_rd" id="rd_comm" value="Community Involvement" <?=$this->proposals_model->checkCommunity($proposal_id)?> disabled>Community Involvement
            <br>
            
            <input type="radio" name="non_academic_rd" class="non_acad_rd" id="rd_cocur" value="Co-Curricular" <?=$this->proposals_model->checkCoCurricular($proposal_id)?> disabled>Co-Curricular
            <br>
            <div id="co-curricular" hidden>
              Specified: <input type="text" name="specified_co_curric" class="non_acad" id="specified_co" value="<?=$ap_record->Specified?>" disabled>
            </div>
            
            <input type="radio" name="non_academic_rd" class="non_acad_rd" id="rd_excur" value="Extra-Curricular"  <?=$this->proposals_model->checkExtraCurricular($proposal_id)?> disabled>Extra-Curricular

            <div id="extra-curricular" hidden>
              Specified: <input type="text" name="specified_ex_curric" class="non_acad" id="specified_ex" value="<?=$ap_record->Specified?>" disabled>
            </div>
          
          </div>
          <input type="reset" class="button" name="clear" id="btn_reset" value="Clear">
          <input type="button" class="button" name="save_btn" id="btn_save_ap" value="Save">

        </div>
      </div>
    </div>
  </div>


  <!-- FAR form -->
  <div class="col-md-2 main-form-buttons" style="margin-left: 3vw !important; margin-bottom: 15vw; border: 0px;">
    <div class="table-header button" id="btn_ap" href="ap">
      Activity Proposal
    </div>
    <div class="table-header button" id="btn_far" href="far">
      Fixed Asset Req.
    </div>
    <div class="table-header button" id="btn_oe" href="oe">
      Operating Expenses
    </div>
  </div>  
  <div class="col-md-8 main-form" id="#ap"> 
    <div class="table-header linear-gradient main-header-text">Proposal Overview</div>
    <div id="table-container" class="main-text" style="overflow-y: scroll;">

      <?php if($this->proposals_model->checkIfFARExists($proposal_id)): ?>
        <div class="container-far">

          <div class="header-proposal">
            <h1>Fixed Assets Requirements</h1>
          </div>
          <hr id="proposal_hr">
          <table id="fields_far">
            <th>#</th>
            <th>Item</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Amount</th>
            <th>Source of Fund</th>
            <tr>

              <td>1</td>
              <td>
                <input type="text" class="field_far" name="far_item1" id="far_txt_item1" value="<?=$far_record->Item?>" />
              </td>
              <td>
                <input type="number" class="field_far" name="far_quantity1" id="far_txt_quantity1" oninput="calculate(this.id)" min=0 value="<?=$far_record->Quantity?>"
                />
              </td>
              <td>
                <input type="number" class="field_far" name="far_unit_price1" id="far_txt_unit1" oninput="calculate(this.id)" step="any"
                  min=0 value="<?=$far_record->Unit_Price?>" />
              </td>
              <td>
                <input type="number" class="field_far" name="far_total_amount1" id="far_txt_total1" value="<?=$far_record->Total_Amount?>" readonly />
              </td>
              <td>
                <select name="far_source_of_fund1" id="far_source_of_fund1" value="what">
                  <option>Student Activity Fund</option>
                  <option>Cultural Fund</option>
                  <option>Organizational Fund</option>
                  <option>Batch Fund</option>
                  <option>Publication Fund</option>
                  <option>Athletics Fund</option>
                </select>
              </td>
              <td>
                <input type="text" class="field_far" name="far_id1" id="far_txt_id1" value="<?=$far_record->Far_ID?>" required readonly />
              </td>
            </tr>
          </table>

          <p>
            Total:
            <input type="number" id="far_overall_amount" value=0 readonly> (not currently working)
          </p>

          <input type="button" class="button" name="btn_add_far" id="button" onClick="addField()" value="ADD">
          <input type="button" class="button" name="btn_delete_far" id="button" onClick="deleteField()" value="DELETE">
          <input type="reset" class="button" id="button" value="CLEAR">
          <input type="button" class="button" name="save_btn" id="btn_save_far" value="Save">
        </div>
      <?php endif ?>    
    </div>
  </div>


  <!-- OE form -->


  <div class="col-md-2 main-form-buttons" style="margin-left: 3vw !important; margin-bottom: 15vw; border: 0px;">
    <a href="ap">
      <div class="table-header button" id="btn_ap">
        Activity Proposal
      </div>
    </a>
    <a href="far">
      <div class="table-header button" id="btn_far">
        Fixed Asset Req.
      </div>
    </a>
    <a href="oe">
      <div class="table-header button" id="btn_oe">
        Operating Expenses
      </div>    
    </a>

  </div>  
  <a id="#oe">
    <div class="col-md-8 main-form">
      <div class="table-header linear-gradient main-header-text">Proposal Overview</div>
      <div id="table-container" class="main-text" style="overflow-y: scroll;">
        <?php if($this->proposals_model->checkIfOEExists($proposal_id)): ?>
          <div class="container-oe">

            <div class="header-proposal">
              <h1>Operating Expenses</h1>
            </div>
            <hr id="proposal_hr">
            <table id="fields_oe">
              <th>#</th>
              <th>Item</th>
              <th>Quantity</th>
              <th>Unit Price</th>
              <th>Total Amount</th>
              <th>Source of Fund</th>
              <tr>

                <td>1</td>
                <td>
                  <input type="text" class="field_oe" name="oe_item1" id="oe_txt_item1" value="<?=$oe_record->Item?>"  />
                </td>
                <td>
                  <input type="number" class="field_oe" name="oe_quantity1" id="oe_txt_quantity1" oninput="calculate2(this.id)" min=0 value="<?=$oe_record->Quantity?>"
                  />
                </td>
                <td>
                  <input type="number" class="field_oe" name="oe_unit_price1" id="oe_txt_unit1" oninput="calculate2(this.id)" step="any" min=0
                    value="<?=$oe_record->Unit_Price?>" />
                </td>
                <td>
                  <input type="number" class="field_oe" name="oe_total_amount1" id="oe_txt_total1" value="<?=$oe_record->Total_Amount?>" readonly />
                </td>
                <td>
                  <select name="oe_source_of_fund1" id="oe_source_of_fund1">
                    <option>Student Activity Fund</option>
                    <option>Cultural Fund</option>
                    <option>Organizational Fund</option>
                    <option>Batch Fund</option>
                    <option>Publication Fund</option>
                    <option>Athletics Fund</option>
                  </select>
                </td>
                <td>
                  <input type="text" class="field_oe" name="oe_id1" id="oe_txt_id1" value="<?=$oe_record->OE_ID?>" required readonly />
                </td>
              </tr>
            </table>

            <p>
              Total:
              <input type="number" id="oe_overall_amount" value=0 readonly> (not currently working)
            </p>
            <input type="button" class="button" name="btn_add_oe" id="button" onClick="addField2()" value="ADD">
            <input type="button" class="button" name="btn_delete_oe" id="button" onClick="deleteField2()" value="DELETE">
            <input type="reset" class="button" id="button" value="CLEAR">
            <input type="button" class="button" name="save_btn" id="btn_save_oe" value="Save">
          </div>
        <?php endif ?>
      </div>
    </div>
  </a>
  </div>

  <!-- NEW FORM END -->

  <!-- OLD FORM START -->

  <form id="ajax_form_activity">

    <div class="container-proposal">
      <div class="container-proposal-activity">
        <div class="header-proposal">
          <h1>Proposal</h1>
        </div>
        <div class="content-container-proposal-activity">
          
        </div>
      </div>
    </div>
    

    

      <div class="button-container-proposal">
        <a href="<?=base_url()?>home">
          <input type="button" class="button" name="next" id="button" value="Go Back">
        </a>
          <input type="submit" class="button" name="submit" id="submit_btn" value="Submit">

        <a href="delete/<?=$ap_record->Proposal_ID?>">
          <input type="button" class="button" name="delete_btn" id="btn_delete" value="Delete Proposal">
        </a>
      </div>

  </form>

  <!-- OLD FORM END -->

  <!-- MAIN END -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
    </script>
    <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>
  <script src="<?= base_url();?>assets/js/progress.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>

</html>