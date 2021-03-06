<!DOCTYPE html>
<html>

<head>
  <?php
    $prefix = $this->session->userdata('prefix');
    $account_id = $this->session->userdata('account_id');
    $organization = $this->session->userdata('organization');
    $full_name = $this->session->userdata('full_name');
    $position = $this->session->userdata('position');
  ?>
  <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
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
    <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  </head>
  <body>
		<form id="ajax_form_review">
    <div class="container-fluid" style="height: 100vh; max-width: 100%;"> <!-- CONTAINER START -->
    <?php 
    $this->load->view('layouts/header');
    ?>
      <div class="row mx-5 oapps-mh oapps-proposal-m"> <!-- FIRST ROW START -->

        <!-- BUTTONS -->

        <div class="col-lg-2 mt-5 h-100"> <!-- BUTTONS COL START -->
          <div class="row align-items-center oapps-button-pos"> <!-- BUTTONS ROW START-->
            <!-- PENDING -->
            <div class="oapps-btn oapps-hh col-12" id="ap-btn" style="border: 1px black solid">
              <p class="text-center oapps-bmb">Activity Proposal</p>
            </div>
            <!-- APPROVED -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="far-btn" style="border: 1px black solid">
              <p class="text-center oapps-bmb">Fixed Asset Req.</p>
            </div>
            <!-- REVISIONS -->
            <div class="oapps-btn oapps-hh col-12 mt-4" id="oe-btn" style="border: 1px black solid">
              <p class="text-center oapps-bmb">Operating Expenses</p>
            </div>
          </div> <!-- BUTTONS ROW END   -->
        </div> <!-- BUTTON COL END -->
        
        <!-- ACTIVITY PROPOSAL START-->

        <div class="col-lg-8 offset-lg-1 mt-5 mb-2 oapps-rh h-100" style="border: 1px black solid;"> <!-- ACTIVITY PROPOSAL COL START -->
          <div class="row oapps-bg-head"> <!-- ACTIVITY PROPOSAL HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white" id="ap-content">
              <p class="text-center oapps-bmb">Activity Proposal</p>
            </div>
          </div> <!-- ACTIVITY PROPOSAL HEAD ROW END -->
          <div id="table-container" class="row oapps-ch" style="overflow-y: auto;"> <!-- ACTIVITY PROPOSAL START -->
            <p class="m-4">
              <!-- ACTIVITY PROPOSAL CONTENT START -->
              <div class="ap-text form-group col-md-5 mr-5 mt-5"><!-- ACTIVITY PROPOSAL FORM TEXT SECTION START-->
              <input type="text" name="proposal_id" id="proposal_id" value="" hidden
        readonly>      
                Activity Name:
                <input type="text" class="form-control form-control-sm" name="activity_name" id="activity_name"
                  required>

                <br>

                Activity Chair:
                <input type="text" class="form-control form-control-sm" name="activity_chair" id="activity_chair"
                  required>

                <br>

                Contact Number:
                <input type="text" class="form-control form-control-sm" name="contact_number" id="contact_number"
                  required>

                <br>


                Activity Date:
                <input type="date" class="form-control form-control-sm" name="date_activity" id="date_activity"
                  required>

                <br>

                Activity Time:
                <input type="time" class="form-control form-control-sm" name="start_time_activity" id="start_time_activity"
                 required> <br> To <br>
                <input type="time" class="form-control form-control-sm" name="end_time_activity" id="end_time_activity"
                 required>

                <br>

                Activity Venue:
                <input type="text" class="form-control form-control-sm" name="activity_venue" id="activity_venue"
                  required>

              </div><!-- ACTIVITY PROPOSAL FORM TEXT SECTION END-->


              <div class="ap-activitytype form-group col-md-5 ml-5 mt-5"><!-- ACTIVITY PROPOSAL FORM RADIO SECTION START-->
                <div class="form-check row no-gutters">
                  <label>Activity Type</label>

                  <hr>

                  <input type="radio" name="radio_activity_type_2" class="form-check-input rd_proposal_type2" id="rd_acad"
                    value="Academic" required>
                  <label id="label_radiobutton">ACADEMIC</label>
                  <br>
                  <input type="radio" name="radio_activity_type_2" class="form-check-input rd_proposal_type2" id="rd_nacad"
                    value="Non-Academic" required>
                  <label id="label_radiobutton">NON-ACADEMIC</label>
                  <div class="rd-non-academic-container">

                    <div style="position: relative; left: 30px">

                      <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_comm" value="Community Involvement" disabled>Community Involvement
                      <br>

                      <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_cocur" value="Co-Curricular" disabled>Co-Curricular
                      <br>
                      <div id="co-curricular">
                        Specified: <input type="text" name="specified_co_curric" class="form-control" id="specified_co" disabled>
                      </div>

                      <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_excur" value="Extra-Curricular" disabled>Extra-Curricular
                      <br>
                      <div id="extra-curricular">
                        Specified: <input type="text" name="specified_ex_curric" class="form-control" id="specified_ex" disabled>
                      </div>

                      <hr>
                    </div>

                    <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_ind" value="Independent"
                    required>
                    <label id="label_radiobutton">INDEPENDENT</label>
                    <br>
                    <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_col" value="Collaborative"
                    required>
                    <label id="label_radiobutton">COLLABORATIVE</label>

                    <div id="collab-container">
                      Partner/s: <input type="text" class="field_ap form-control" name="specified_co_curric" id="partner_collab"
                       disabled>
                    </div>
                  </div>
                </div>
              </div><!-- ACTIVITY PROPOSAL FORM RADIO SECTION END-->
              <div class="ap-longtext my-5 col-md-12"><!-- ACTIVITY PROPOSAL FORM LONG TEXT SECTION START-->
                <label>Nature of the Activity</label>
                <textarea rows="3" class="form-control form-control-sm" id="nature_textarea" name="nature" placeholder="What is the activity all about?"
                  maxlength="230" required></textarea>

                <br>

                <label>Objectives of the Activity</label>
                <textarea rows="3" class="form-control form-control-sm" id="objectives_textarea" name="objectives" placeholder="Goal or Aim in doing this activity in number form"
                  maxlength="230" required></textarea>


                <br>

                <label>Rationale</label>
                <textarea rows="3" class="form-control form-control-sm" id="rationale_textarea" name="rationale"
                  placeholder="Goal or Aim in doing this activity in number form" maxlength="350" required></textarea>

                <br>

                <label>Participants</label>
                <textarea rows="3" class="form-control form-control-sm" id="participants_textarea" name="participants"
                  required></textarea>

                <br>
                <input type="reset" class="table-header btn btn-light" id="button" value="Clear">
              </div><!-- ACTIVITY PROPOSAL FORM LONG TEXT SECTION END-->              
              <!-- ACTIVITY PROPOSAL CONTENT END -->
            </p>
          </div> <!-- ACTIVITY PROPOSAL END -->
        </div> <!-- ACTIVITY PROPOSAL COL END -->
      </div><!-- FIRST ROW END -->

      <!-- ACTIVITY PROPOSAL END -->

      <div class="row mx-5 oapps-mh oapps-proposal-m2"> <!-- SECOND ROW START -->
        <!-- FIXED ASSET REQ START-->

        <div class="col-lg-8 offset-lg-3 oapps-rh h-100" style="border: 1px black solid"> <!-- FIXED ASSET COL START -->
          <div class="row oapps-bg-head"> <!-- FIXED ASSET REQ HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white" id="far-content">
              <p class="text-center oapps-bmb">Fixed Asset Requirements</p>
            </div>
          </div> <!-- FIXED ASSET REQ HEAD ROW END -->
          <div class="row oapps-ch" style="overflow-y: auto;"> <!-- FIXED ASSET REQ START -->
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
                </table>

                <input type="button" class="table-header btn btn-light m-2" name="btn_add_far" id="button-add-far" value="Add">
                <!-- <input type="button" class="table-header btn btn-light m-2" name="btn_delete_far" id="button-delete-far" value="Delete"> -->
                <input type="reset" class="table-header btn btn-light m-2" id="button" value="Clear">
              </div>
              <!-- FIXED ASSET REQ CONTENT END -->
            </p>
          </div> <!-- FIXED ASSET REQ END -->
        </div> <!-- FIXED ASSET REQ COL END -->
      </div><!-- SECOND ROW END -->


      <div class="row mx-5 oapps-mh mb-5"> <!-- THIRD ROW START -->
        <!-- OPERATING EXPENSES START-->

        <div class="col-lg-8 offset-lg-3 oapps-rh h-100" style="border: 1px black solid"> <!-- ACTIVITY PROPOSAL COL START -->
          <div class="row oapps-bg-head"> <!-- OPERATING EXPENSES HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white" id="oe-content">
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
                </table>

                <input type="button" class="table-header btn btn-light m-2" name="btn_add_oe" id="button-add-oe" value="Add">
                <!-- <input type="button" class="table-header btn btn-light m-2" name="btn_delete_oe" id="button-delete-oe" value="Delete"> -->
                <input type="reset" class="table-header btn btn-light m-2" id="button" value="Clear">
                

              </div>
              <!-- OPERATING EXPENSES CONTENT END -->
            </p>
          </div> <!-- OPERATING EXPENSES END -->
        </div> <!-- OPERATING EXPENSES COL END -->
      </div><!-- THIRD ROW END -->

      <div class="row no-gutters mt-5"><!-- FOURTH ROW END -->
        <div class="col-lg-10 ml-5 mt-5"> <!-- INSERT DOCUMENT SUBMISSION HERE -->
          <input type="button" class="table-header btn btn-light btn-lg" data-toggle="modal" data-target="#uploadModal" name="" id="upload-btn-first" value="Upload Documents">
        </div>

      </div>

      <div class="row d-flex">
        <div class="col-lg-5 offset-lg-7 col-md-6 offset-md-6 col-sm-8 offset-sm-4 col-xs-8 offset-xs-4 my-5"> <!-- FINAL BUTTONS HERE -->
          <a href="<?=base_url()?>home">
            <input type="button" class="table-header btn btn-light btn-lg" name="back" id="button" value="Go Back">
          </a>

          

          <input type="button" class="table-header btn btn-light btn-lg save" name="submit" id="btn_save" value="Save">
          <input type="button" class="table-header btn btn-light btn-lg" name="submit" id="btn_review" value="Review">
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

