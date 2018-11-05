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
            <input type="text" class="" name="proposal_id" id="proposal_id" value="" hidden
              readonly>

            <div class="ap-text form-group col-xs-5">

              Activity Name:
              <input type="text" class="form-control form-control-sm" name="activity_name" id="activity_name" value=""
                required>

              <br>

              Activity Chair:
              <input type="text" class="form-control form-control-sm" name="activity_chair" id="activity_chair" value=""
                required>

              <br>

              Contact Number:
              <input type="text" class="form-control form-control-sm" name="contact_number" id="contact_number" value=""
                required>

              <br>


              Activity Date:
              <input type="date" class="form-control form-control-sm" name="date_activity" id="date_activity" value=""
                required>

              <br>

              Activity Time:
              <input type="time" class="form-control form-control-sm" name="start_time_activity" id="start_time_activity"
                value="" required> <br> To <br>
              <input type="time" class="form-control form-control-sm" name="end_time_activity" id="end_time_activity"
                value="" required>

              <br>

              Activity Venue:
              <input type="text" class="form-control form-control-sm" name="activity_venue" id="activity_venue" value=""
                required>

            </div>

            <div class="ap-activitytype form-group col-xs-5">
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
                      Specified: <input type="text" name="specified_co_curric" class="form-control" id="specified_co"
                        value="" disabled>
                    </div>

                    <input type="radio" name="non_academic_rd" class="form-check-input non_acad_rd" id="rd_excur" value="Extra-Curricular" disabled>Extra-Curricular
                    <br>
                    <div id="extra-curricular">
                      Specified: <input type="text" name="specified_ex_curric" class="form-control" id="specified_ex"
                        value="" disabled>
                    </div>

                    <hr>
                  </div>

                  <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_ind" value="Independent" required>
                  <label id="label_radiobutton">INDEPENDENT</label>
                  <br>
                  <input type="radio" name="radio_activity_type_1" class="rd_proposal_type1" id="rd_col" value="Collaborative" required>
                  <label id="label_radiobutton">COLLABORATIVE</label>

                  <div id="collab-container">
                    Partner/s: <input type="text" class="field_ap form-control" name="specified_co_curric" id="partner_collab" disabled>
                  </div>
                </div>
              </div>


            </div> <!-- row end -->
            <div class="ap-longtext col-sm-12">

              <label>Nature of the Activity</label>
              <textarea rows="3" class="form-control form-control-sm" id="nature_textarea" name="nature" placeholder="What is the activity all about?"
                required></textarea>

              <br>

              <label>Rationale</label>
              <textarea rows="3" class="form-control form-control-sm" id="rationale_textarea" name="rationale"
                placeholder="Goal or Aim in doing this activity in number form" required></textarea>

              <br>


              <label>Participants</label>
              <textarea rows="3" class="form-control form-control-sm" id="participants_textarea" name="participants"
                required></textarea>

              <br>

              <input type="reset" class="table-header button button-ap" id="button" value="Clear">
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

                <tr id="far-row1">
                </tr>
              </table>

              Total:
              <input class="form-control form-control-sm medium-text-box" type="number" id="far_overall_amount" value=0
                readonly> (not currently working)

              <input type="button" class="table-header button button-ap" name="btn_add_far" id="button-add-far" value="Add">
              <!-- <input type="button" class="table-header button button-ap" name="btn_delete_far" id="button-delete-far" value="Delete"> -->
              <input type="reset" class="table-header button button-ap" id="button" value="Clear">
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
                <tr id="oe-row1">
                </tr>
              </table>

              Total:
              <input type="number" class="form-control form-control-sm medium-text-box" id="oe_overall_amount" value=0
                readonly> (not currently working)

              <input type="button" class="table-header button button-ap" name="btn_add_oe" id="button-add-oe" value="Add">
              <!-- <input type="button" class="table-header button button-ap" name="btn_delete_oe" id="button-delete-oe" value="Delete"> -->
              <input type="reset" class="table-header button button-ap" id="button" value="Clear">
      
              
            </div>
          </div>
        </div>
      </div>


      require submission of scanned documents (necessary forms for submission)

      <div class="button-container-proposal">
        <a href="<?=base_url()?>home">
          <input type="button" class="table-header button" name="back" id="button" value="Go Back">
        </a>
        <input type="button" class="table-header button button-ap" name="save_btn" id="btn_save" value="Save">
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