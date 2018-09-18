<!DOCTYPE html>
<html> 
<head>
  
  <?php if ($this->session->userdata('logged_in')): ?>
  
  <?php 
  $account_id = $this->session->userdata('account_id');
  $position = $this->session->userdata('position');
  $org_type = $this->session->userdata('org_type');
  $proposal_id = $record->Proposal_ID;

  if ($proposal_id == "") {
    redirect("home");
  }
  $non_academic_type = $record->NonAcademicType;
  ?>

  <?php if ($org_type != 'N/A' && $account_id != $record->Account_ID): ?>
    <?php redirect("home"); ?>
  <?php endif ?>
  
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

  <!-- Don't add spaces or newlines between the li elements! -->
  <div class="progress-container">
    <ol class="progress-meter">
      </li><li class="progress-point done">Treasurer</li><li class="progress-point done">Secretary-General</li><li class="progress-point pending">President</li><li class="progress-point todo">Assistant Prefect</li><li class="progress-point todo">Prefect</li><li class="progress-point todo">Dean</li>
    </ol>
  </div>

  <form id="ajax_form_activity">
    <div class="main-container-proposal">
      <div class="container-proposal">
        <div class="container-proposal-activity">
          <div class="header-proposal">
            <h3>
              Proposed by the <?=$record->Organization?>
            </h3>
          </div>
          <div class="content-container-proposal-activity">
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


            <a href="<?=base_url()?>home">
              <input type="button" value="Go Back">
            </a>

            <a href="#">
              <input type="button" value="View Time Log">
            </a>

            <!-- Office has these buttons -->
            <?php if($this->session->userdata('org_type') == 'N/A'): ?>

              <?php if($this->proposals_model->didIApproveThis($account_id, $proposal_id)): ?>
                <a href="<?=base_url()?>proposal/approve/<?=$proposal_id?>">
                  <input type="button" value="Approve">
                </a>
                
                <a href="#">
                  <input type="button" value="Ask for Revision">
                </a>

                <a href="#">
                  <input type="button" value="Decline">
                </a>
              <?php endif ?>

            <?php endif ?>
          </div>
        </div>
      </div>

    </div>
  </form>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>
</html>