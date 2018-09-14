<!DOCTYPE html>
<html> 
<head>
  <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
  <?php redirect('home')?>
  <?php endif ?>
  <?php if ($this->session->userdata('logged_in')): ?>
  
  <?php 
  $proposal_id = rand(1000,9999);

  $proposal_data = array (
    'proposal_id' => $proposal_id
  );

  $this->session->set_fetchdata($proposal_data);
  
  ?>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Activity Proposal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>
</head>

<body>

  <?php if (!$foo): ?>
  <form id="ajax_form_modal">
    <div id="myModal" class="modal">

    <!-- Modal content or the popup -->
      <div class="modal-content">
        <p>Are you going to submit a budget proposal?</p>
        <div class="radio_group">
          <input type="radio" id="rd_yes" class="radio_input" name="bp_radio" value="yes_bp">Yes
            <div class="check_group" hidden>
              <input type='checkbox' id='chk_far' class="check_bp" name='check_bp' value='w_far' disabled checked>Fixed Assets Requirements
              <br>
              <input type='checkbox' id='chk_oe' class="check_bp" name='check_bp' value='w_oe' disabled checked>Operating Expenses
            </div>
            <br>
          <input type="radio" id="rd_no" class="radio_input" name="bp_radio" value="no_bp" checked>No
          <br>

        </div>
        <input type="submit" value="Submit">
        <a href="<?=base_url()?>home">
          <input type="button" value="Go Back">
        </a>
      </div>
    </div>
  </form>

  <?php endif ?>
  <form id="ajax_form_activity">
    <div class="container-proposal">
      <div class="container-proposal-activity">
        <div class="header-proposal">
          <h1>Activity Proposal</h1>
        </div>
        <div class="content-container-proposal-activity">
          <hr id="proposal_hr"> Name of the Activity:
          <input type="text" class="field_ap" name="activity_name" id="activity_name" required>

          <br> Date:
          <input type="date" class="field_ap" name="date_activity" id="date_activity">

          <br> Time:
          <input type="time" class="field_ap" name="start_time_activity" id="start_time_activity"> to
          <input type="time" class="field_ap" name="end_time_activity" id="end_time_activity">
          <br>

          <label>Nature of the Activity</label>
          <br>
          <textarea rows="5" class="field_ap" cols="40" id="nature_textarea" name="nature" placeholder="What is the activity all about?"></textarea>
          <br>

          <label>Rationale</label>
          <textarea rows="5" class="field_ap" cols="40" id="rationale_textarea" name="rationale" placeholder="Goal or Aim in doing this activity in number form"></textarea>

          <br> Activity Chair:
          <input type="text" class="field_ap" name="activity_chair" id="activity_chair">
          <br>

          <label>Participants</label>
          <textarea rows="5" class="field_ap" cols="40" id="participants_textarea" name="participants"></textarea>

          <br> Venue:
          <input type="text" class="field_ap" name="activity_venue" id="activity_venue">
          <br>

          <!-- <div class="radio-container-proposal">
              <div class="radio-subcontainer-proposal-1">
                <input type="radio" name="radio_activity_type_1" id="radio_activity" value="Independent" required>
                <label id="label_radiobutton">INDEPENDENT</label>
                <br>
                <input type="radio" name="radio_activity_type_1" id="radio_activity" value="Collaborative" required>
                <label id="label_radiobutton">COLLABORATIVE</label>
              </div>

              <div class="radio-subcontainer-proposal-2">
                <input type="radio" name="radio_activity_type_2" id="radio_activity" value="Academic" required>
                <label id="label_radiobutton">ACADEMIC</label>
                <br>
                <input type="radio" name="radio_activity_type_2" id="radio_activity" value="Non-Academic" required>
                <label id="label_radiobutton">NON-ACADEMIC</label>
              </div>
            </div> -->

          <div class="button-container-proposal">
            <a href="<?=base_url()?>home">
              <input type="button" class="button" name="next" id="button" value="Go Back">
            </a>

            <!-- Hides next button if the user selects no BP to be submitted -->
            <!-- true = there is BP; false = no BP -->
            <?php if ($check): ?>
            <a href="#">
              <input type="button" class="button" name="next" id="next_btn_ap" value="Next">
            </a>
            <?php endif ?>

            <input type="reset" class="button" name="clear" id="btn_reset" value="Clear">
            <input type="submit" class="button" name="save_btn" id="btn_save" value="Save">
            <!-- <input type="submit" class="button" id="button" name="btn_proposal" value="SUBMIT"> -->
          </div>
        </div>
      </div>

      <!-- <div class="container-proposal-budget">

          <div class="header-proposal">
            <h1>Budget Proposal</h1>
          </div>

          <div class="content-container-proposal-budget">
            <hr id="proposal_hr">
            lorem 

          </div>
        </div> -->
    </div>
  </form>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>

</html>