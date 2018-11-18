<!DOCTYPE html>
<html>
<head>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $account_id = $this->session->userdata('account_id');
  $position = $this->session->userdata('position');
  $org_type = $this->session->userdata('org_type');
  $prefix = $this->session->userdata('prefix');
  $proposal_id = $record->Proposal_ID;

  if ($proposal_id == "") {
    redirect("home");
  }
  $non_academic_type = $record->NonAcademicType;
  ?>

  <?php if ($org_type != 'N/A') : ?>
    <?php redirect("home"); ?>
  <?php endif ?>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Revise</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>

</head>
<body>
  <div class="main-container-proposal">
    <div class="container-proposal">
      <div class="container-proposal-activity-revise">
        <div class="header-proposal">
          <h3>
            Proposed by the <?=$record->Organization?>
          </h3>
        </div>
        <div class="content-container-proposal-activity">
          <input type="text" class="field_ap" name="proposal_id" id="proposal_id" value="<?=$record->Proposal_ID?>" hidden readonly>
          <hr id="proposal_hr"> Name of the Activity: <?=$record->ActivityName?>
          <br>Date: <?=$record->DateActivity?>
          <br> Time: <?=$record->StartTime . " to " . $record->EndTime ?>
          <br>

          <label>Nature of the Activity: </label>
          <br>
          <p><?=$record->Nature?></p>
          <br>

          <label>Rationale:</label>
          <p><?=$record->Rationale?></p>

          <br> Activity Chair: <?=$record->ActivityChair?>
          <br> Contact Number: <?=$record->ChairContactNumber?>

          <br>
          <label>Participants: </label>
          <p><?=$record->Participants?></p>

          <br> Venue: <?=$record->ActivityVenue?>
          <br>

          <div class="radio-container-proposal">
            <div class="radio-subcontainer-proposal-1">
              <label id="label_radiobutton"><?=$record->ProposalType1?></label>
            
            <?php if ($record->ProposalType1 == 'Collaborative'):?>
              <div id="collab-container">
                Partner/s: <label><?=$record->Partners?></label>
              </div>
            <?php endif ?>

            </div>

            <div class="radio-subcontainer-proposal-2">
              <label id="label_radiobutton"><?=$record->ProposalType2?></label>
              <br>
              <div class="rd-non-academic-container">

                <?php if ($record->ProposalType2 == 'Non-Academic'): ?>
                  <label><?=$record->NonAcademicType?></label>

                  <?php if ($record->NonAcademicType != 'Community Involvement'):?>
                    <br>
                    Specified: <label><?=$record->Specified?></label>
                  <?php endif ?>

                <?php endif ?>
              
              </div>

            </div>
          </div>
          <a href="<?=base_url()?>proposal/view/<?=$proposal_id?>">
            <input type="button" value="Go Back">
          </a>
        </div>
      </div>
      <?=form_open("submit/comments/" . $proposal_id);?>
        <div class="comments-container">
          <div class="header-proposal">
            <h1>Comments</h1>
          </div>
          <div class="content-container-proposal-activity">
            <hr id="proposal_hr"> Name of the Activity:
            <input type="text" name="activity_name" id="activity_name">

            <br> Date:
            <input type="text" name="date_activity" id="date_activity">

            <br> Time:
            <input type="text" name="time_activity" id="time_activity">
            <br>
        
            <label>Nature of the Activity</label>
            <br>
            <textarea rows="5" cols="40" id="nature_textarea" name="nature"></textarea>
            <br>

            <label>Rationale</label>
            <textarea rows="5" cols="40" id="rationale_textarea" name="rationale"></textarea>

            <br> Activity Chair:
            <input type="text" name="activity_chair" id="activity_chair">
            <br>

            Contact Number:
            <input type="text" name="contact_number" id="contact_number">
            <br>

            <label>Participants</label>
            <textarea rows="5" cols="40" id="participants_textarea" name="participants"></textarea>

            <br> Venue:
            <input type="text" name="activity_venue" id="activity_venue">
            <br>
            Proposal Type 1:
            <input type="text" name="proposal_type1" id="proposal_type1">
            <br>
            Proposal Type 2:
            <input type="text" name="proposal_type2" id="proposal_type2">
            <br>
            <div class="button-container-proposal">
              <input type="reset" name="clear" id="button" value="Clear">
              <input type="submit" name="btn_comment" id="button_submit" value="Submit Revision">
            </div>
          </div>
        </div>
        <?=form_close()?>
    </div>
  </div>
  

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>

</body>
</html>