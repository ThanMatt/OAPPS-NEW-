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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
  crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/progress.css">
</head>
<body class="oapps-bg-head">
  <div class="container-fluid d-flex justify-content-center" style="height: 100vh; width: 100%;">
    <form id="ajax_form_activity">
      <div class="row mt-5" style="background-color: white; width: 70%;"><!-- PROPOSAL HEADER ROW START -->
        Proposed by the  <?=$record->Organization?>
      </div><!-- PROPOSAL HEADER ROW END -->
      <div class="row mt-5" class="progress-container" style="background-color: white; width: 70%;"><!-- PROGRESS BAR ROW START -->
        <!-- Don't add spaces or newlines between the li elements! -->
        <ol class="progress-meter">
          </li><li class="progress-point done">Treasurer</li><li class="progress-point done">Secretary-General</li><li class="progress-point pending">President</li><li class="progress-point todo">Assistant Prefect</li><li class="progress-point todo">Prefect</li><li class="progress-point todo">Dean</li>
        </ol>
      </div><!-- PROGRESS BAR ROW END -->
      <div class="row mt-5" style="background-color: white; width: 70%;"><!-- AP CONTENT ROW START -->
        <p id="proposal_hr"> Name of the Activity: <?=$record->ActivityName?> </p>
        <br>Date: <?=$record->DateActivity?>
        <br> Time: <?=$record->StartTime . " to " . $record->EndTime ?>
        <br>

        <p>Nature of the Activity: </p>
        <br>
        <p><?=$record->Nature?></p>
        <br>

        <p>Rationale:</p>
        <p><?=$record->Rationale?></p>

        <br> Activity Chair: <?=$record->ActivityChair?>
        <br> Contact Number: <?=$record->ChairContactNumber?>
        <br>
        <p>Participants: </p>
        <p><?=$record->Participants?></p>

        <br> Venue: <?=$record->ActivityVenue?>
        <br>

        <hr>

        <p id="label_radiobutton"><?=$record->ProposalType1?></p>
        <?php if ($record->ProposalType1 == 'Collaborative'):?>
          Partner/s: <p><?=$record->Partners?></p>
        <?php endif ?>

        <hr>

        <p id="label_radiobutton"><?=$record->ProposalType2?></p>
        <?php if ($record->ProposalType2 == 'Non-Academic'): ?>
          <p><?=$record->NonAcademicType?></p>

          <?php if ($record->NonAcademicType != 'Community Involvement'):?>
            <br>
            Specified: <p><?=$record->Specified?></p>
          <?php endif ?>

        <?php endif ?>

        <hr>

        <a href="<?=base_url()?>home">
          <input type="button" value="Go Back">
        </a>

        <a href="#">
          <input type="button" value="View Time Log">
        </a>

      </div><!-- AP CONTENT ROW END -->
      <div class="row mt-5" style="background-color: white; width: 70%;"><!-- FAR CONTENT ROW START -->
        insert far here what the heck
      </div><!-- FAR CONTENT ROW END -->
      <div class="row mt-5" style="background-color: white; width: 70%;"><!-- OE CONTENT ROW START -->
        insert oe here
      </div><!-- OE CONTENT ROW END -->

      <!-- Office has these buttons -->
      <?php if($this->session->userdata('org_type') == 'N/A'): ?>

      <?php if($this->proposals_model->didIApproveThis($account_id, $proposal_id)): ?>
        <a href="<?=base_url()?>proposal/approve/<?=$proposal_id?>">
          <input type="button" id="approve_btn" value="Approve">
        </a>
        
        <a href="<?=base_url()?>proposal/ask/<?=$record->Proposal_ID?>">
          <input type="button" value="Ask for Revision">
        </a>

        <a href="#">
          <input type="button" value="Decline">
        </a>
      <?php endif ?>

      <?php endif ?>
    </form>
    <?php else: ?>
    <?php 
    $this->load->view('users/login_view');
    ?>
    <?php endif ?>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
    crossorigin="anonymous">
  </script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em"
    crossorigin="anonymous">
  </script>

</body>
</html>