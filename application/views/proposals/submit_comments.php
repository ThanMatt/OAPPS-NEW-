<!DOCTYPE html>
<html>
<head>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $account_id = $this->session->userdata('account_id');
  $position = $this->session->userdata('position');
  $org_type = $this->session->userdata('org_type');
  $prefix = $this->session->userdata('prefix');
  $proposal_id = $records_ap->Proposal_ID;
  $org = $this->accounts_model->getOrgInfo($records_ap->Account_ID);

  if ($proposal_id == "") {
    redirect("home");
  }
  $non_academic_type = $records_ap->NonAcademicType;
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
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>

  <div class="container-fluid" style="height: 100vh; max-width: 100%;"><!-- CONTAINER START -->
    <?php 
      $this->load->view('layouts/header');
    ?>
    <div class="row no-gutters d-flex justify-content-center mt-5"> <!-- ROW HEADER START -->
      <div class="card w-75" style="min-height: 100px;">
        <div class="card-header">
          <h4>Proposed by the <?=$records_ap->Organization?></h4>
        </div>
        <div class="card-body">
          <p>Organization Representative: <?=$org->FullName?> </p>
          <p>Contact Number: <?=$org->ContactNumber?></p>
          <p>Date Submitted: <?=$this->proposals_model->getSubmitDate($proposal_id)?> </p>
        </div>
      </div>
    </div> <!-- ROW HEADER END -->  
    <?=form_open("submit/comments/" . $proposal_id);?>
    <div class="row w-100 no-gutters"> <!-- LEFT ROW START --> 
      <div class="col-lg-6 col-md-12 d-flex flex-column justify-content-center"> <!-- LEFT SIDE COL START -->
        <div class="card mt-5 mx-4 w-100"> <!-- AP CARD START -->  
          <div class="card-header">
            Activity Proposal
          </div>
          <div class="card-body">
            <input type="text" class="field_ap" name="proposal_id" id="proposal_id" value="<?=$records_ap->Proposal_ID?>" hidden readonly>
            <label id="proposal_hr"> Name of the Activity: <?=$records_ap->ActivityName?>
            <br> Date: <?=$records_ap->DateActivity?>
            <br> Time: <?=$records_ap->StartTime . " to " . $records_ap->EndTime ?>
            <br>
  
            <label>Nature of the Activity: </label>
            <br>
            <p><?=$records_ap->Nature?></p>
            <br>
  
            <label>Rationale:</label>
            <p><?=$records_ap->Rationale?></p>
  
            <br> Activity Chair: <?=$records_ap->ActivityChair?>
            <br> Contact Number: <?=$records_ap->ChairContactNumber?>
  
            <br>
            <label>Participants: </label>
            <p><?=$records_ap->Participants?></p>
  
            <br> Venue: <?=$records_ap->ActivityVenue?>
            <br>
  
            <div class="radio-container-proposal">
              <div class="radio-subcontainer-proposal-1">
                <label id="label_radiobutton"><?=$records_ap->ProposalType1?></label>
              
              <?php if ($records_ap->ProposalType1 == 'Collaborative'):?>
                <div id="collab-container">
                  Partner/s: <label><?=$records_ap->Partners?></label>
                </div>
              <?php endif ?>
  
              </div>
  
              <div class="radio-subcontainer-proposal-2">
                <label id="label_radiobutton"><?=$records_ap->ProposalType2?></label>
                <br>
                <div class="rd-non-academic-container">
  
                  <?php if ($records_ap->ProposalType2 == 'Non-Academic'): ?>
                    <label><?=$records_ap->NonAcademicType?></label>
  
                    <?php if ($records_ap->NonAcademicType != 'Community Involvement'):?>
                      <br>
                      Specified: <label><?=$records_ap->Specified?></label>
                    <?php endif ?>
  
                  <?php endif ?>
                
                </div>
  
              </div>
            </div>
          </div>
        </div> <!-- AP CARD END --> 
  
        <div class="card mt-5 mx-4 w-100"> <!-- FAR CARD START -->  
          <div class="card-header">
            Fixed Asset Requirements
          </div>
          <div class="card-body">
            
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Items</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Amount</th>
                  <th>Source of Fund</th>
                </tr>
              </thead>
              <tbody>
              <?php if (is_array($records_far) || is_object($records_far)): ?>
              <?php 
              $counter = 0;
              $sum_far = 0;
              ?>
              <?php foreach($records_far as $record_far): ?>
              <?php $counter++?>
                <tr>
                  <td><?=$counter?></td>
                  <td><?=$record_far->Item?></td>
                  <td><?=$record_far->Quantity?></td>
                  <td><?=$record_far->Unit_Price?></td>
                  <td><?=$record_far->Total_Amount?></td>
                  <td><?=$record_far->Source?></td>
                  <?php $sum_far += $record_far->Total_Amount?>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
              <p>No records</p>
              <?php endif ?>
              </tbody>
              
            </table>
            <p>Total: PHP <?=number_format($sum_far)?></p>
          </div>
        </div> <!-- FAR CARD END -->
  
        <div class="card mt-5 mx-4 w-100"> <!-- OE CARD START -->  
          <div class="card-header">
            Operating Expenses
          </div>
          <div class="card-body">
            
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Items</th>
                  <th>Quantity</th>
                  <th>Unit Price</th>
                  <th>Total Amount</th>
                  <th>Source of Fund</th>
                </tr>
              </thead>
              <?php if (is_array($records_oe) || is_object($records_oe)): ?>
              <?php 
              $counter = 0;
              $sum_oe = 0;
              ?>
              <?php foreach($records_oe as $record_oe): ?>
              <?php $counter++?>
                <tr>
                  <td><?=$counter?></td>
                  <td><?=$record_oe->Item?></td>
                  <td><?=$record_oe->Quantity?></td>
                  <td><?=$record_oe->Unit_Price?></td>
                  <td><?=$record_oe->Total_Amount?></td>
                  <td><?=$record_oe->Source?></td>
                  <?php $sum_oe += $record_oe->Total_Amount?>
                </tr>
              <?php endforeach ?>
              <?php else: ?>
              <p>No records</p>
              <?php endif ?>
              </tbody>
              
            </table>
            <p>Total: PHP <?=number_format($sum_oe)?></p>
          </div>
        </div> <!-- OE CARD END -->
      </div> <!-- LEFT SIDE COL END -->
      <div class="col-lg-6 col-md-12 d-flex flex-column"> <!-- RIGHT SIDE COL START -->
        <label class="mt-5 mx-5">Comments</label>
        <textarea rows="3" class="form-control form-control-sm mx-5" id="objectives_textarea" name="comment" placeholder="Put your comments regarding the proposal here. You can give them instructions on what to change and they will be prompted to resubmit based on these comments."
         style="width: 90%; height: 400px;" required></textarea>
  
        <div class="row">
          <div class="col-2">
            <a href="<?=base_url()?>proposal/view/<?=$proposal_id?>">
              <input class="btn btn-light mt-5 mx-5" type="button" value="Go Back">
            </a>
          </div>
          <div class="col-2">
            <a href="">
              <input class="btn btn-light mt-5 mx-5" type="submit" value="Submit">
            </a>
          </div>
        </div>
      </div> <!-- RIGHT SIDE COL END -->

        
    <?=form_close()?>

    <?php else: ?>
    <?php 
    $this->load->view('users/login_view');
    ?>
    <?php endif ?>
  </div> <!-- CONTAINER END --> 


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