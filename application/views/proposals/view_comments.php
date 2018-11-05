<!DOCTYPE html>
<html> 
<head>
  <?php $proposal_id = $record->Proposal_ID; ?>
  <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
  <?php redirect('home')?>
  <?php endif ?>
  
  <?php if ($this->session->userdata('account_id') != $record->Account_ID): ?>
  <?php redirect('home')?>
  <?php endif ?>
  <?php if ($this->session->userdata('logged_in')): ?>
  
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

  <?=form_open('submit/revision/' . $proposal_id)?>
    <div class="main-container-proposal">
      <div class="container-proposal">
        <div class="container-proposal-activity-revise">
          <div class="header-proposal">
            <h1>Activity Proposal</h1>
          </div>
          <div class="content-container-proposal-activity">
            <!-- This serves as a buffer. Do not delete this. It's hidden anyway -->
            <input type="text" class="field_ap" name="proposal_id" id="proposal_id" value="<?=$record->Proposal_ID?>" hidden readonly>
            
            <hr id="proposal_hr">Activity Name: 
            <input type="text" class="field_ap" name="activity_name" id="activity_name" value="<?=$record->ActivityName?>" required>
            <br>Date:
            <input type="date" class="field_ap" name="date_activity" id="date_activity" value="<?=$record->DateActivity?>" required>

            <br> Time:
            <input type="time" class="field_ap" name="start_time_activity" id="start_time_activity" value="<?=$record->StartTime?>" required> to
            <input type="time" class="field_ap" name="end_time_activity" id="end_time_activity" value="<?=$record->EndTime?>" required>
            <br>

            <label>Nature of the Activity</label>
            <br>
            <textarea rows="5" class="field_ap" cols="40" id="nature_textarea" name="nature" placeholder="What is the activity all about?" required><?=$record->Nature?></textarea>
            <br>


            <label>Rationale</label>
            <textarea rows="5" class="field_ap" cols="40" id="rationale_textarea" name="rationale" placeholder="Goal or Aim in doing this activity in number form" required><?=$record->Rationale?></textarea>

            <br> Activity Chair:
            <input type="text" class="field_ap" name="activity_chair" id="activity_chair" value="<?=$record->ActivityChair?>" required>
            <br>
            
            Contact Number:
            <input type="text" class="field_ap" name="contact_number" id="contact_number" value="<?=$record->ChairContactNumber?>" required>
            <br>

            <label>Participants</label>
            <textarea rows="5" class="field_ap" cols="40" id="participants_textarea" name="participants" required><?=$record->Participants?></textarea>
            <br> Venue:
            <input type="text" class="field_ap" name="activity_venue" id="activity_venue" value="<?=$record->ActivityVenue?>" required>
            <br>

            <div class="radio-container-proposal">
              <div class="radio-subcontainer-proposal-1">
                <input type="radio" name="proposal_type1" class="rd_proposal_type1" id="rd_ind" value="Independent" <?=$this->proposals_model->checkIndependent($proposal_id)?> required>
                <label id="label_radiobutton">INDEPENDENT</label>
                <br>
                <input type="radio" name="proposal_type1" class="rd_proposal_type1" id="rd_col" value="Collaborative" <?=$this->proposals_model->checkCollaborative($proposal_id)?> required>
                <label id="label_radiobutton">COLLABORATIVE</label>
                
                <div id="collab-container" hidden>
                  Partner/s: <input type="text" class="field_ap" name="collab_partner" id="partner_collab" value="<?=$record->Partners?>" disabled>
                </div>
              </div>

              <div class="radio-subcontainer-proposal-2">
                <input type="radio" name="proposal_type2" class="rd_proposal_type2" id="rd_acad" value="Academic" <?=$this->proposals_model->checkAcademic($proposal_id)?> required>
                <label id="label_radiobutton">ACADEMIC</label>
                <br>
                <input type="radio" name="proposal_type2" class="rd_proposal_type2" id="rd_nacad" value="Non-Academic" <?=$this->proposals_model->checkNonAcademic($proposal_id)?> required>
                <label id="label_radiobutton">NON-ACADEMIC</label>
                <div class="rd-non-academic-container" hidden>

                  <input type="radio" name="non_academic_type" class="non_acad_rd" id="rd_comm" value="Community Involvement" <?=$this->proposals_model->checkCommunity($proposal_id)?> disabled>Community Involvement
                  <br>
                  
                  <input type="radio" name="non_academic_type" class="non_acad_rd" id="rd_cocur" value="Co-Curricular" <?=$this->proposals_model->checkCoCurricular($proposal_id)?> disabled>Co-Curricular
                  <br>
                  <div id="co-curricular" hidden>
                    Specified: <input type="text" name="specified_co" class="non_acad" id="specified_co" value="<?=$record->Specified?>" disabled>
                  </div>
                  
                  <input type="radio" name="non_academic_type" class="non_acad_rd" id="rd_excur" value="Extra-Curricular"  <?=$this->proposals_model->checkExtraCurricular($proposal_id)?> disabled>Extra-Curricular

                  <div id="extra-curricular" hidden>
                    Specified: <input type="text" name="specified_ex" class="non_acad" id="specified_ex" value="<?=$record->Specified?>" disabled>
                  </div>
                
                </div>

              </div>
            </div>

            <div class="button-container-proposal">
              <a href="<?=base_url()?>home">
                <input type="button" class="button" name="next" id="button" value="Go Back">
              </a>

              <!-- Hides next button if the user selects no BP to be submitted -->
              <!-- true = there is BP; false = no BP -->
              <?php if ($this->proposals_model->checkIfBPExists($record->Proposal_ID)): ?>
              <a href="#">
                <input type="button" class="button" name="next" id="next_btn_ap" value="Budget Proposal">
              </a>

              <?php else: ?>
                <input type="submit" class="button" name="submit" id="submit_btn" value="Submit Revision">
              <?php endif ?>

              <input type="reset" class="button" name="clear" id="btn_reset" value="Clear">
              <!-- <input type="submit" class="button" id="button" name="btn_proposal" value="SUBMIT"> -->
            </div>
            
          </div>
          
        </div>
        <div class="comments-container">
          <div class="header-proposal">
            <h1>Comments</h1>
          </div>
          <div class="content-container-proposal-revision">
            <label>Asked by: <?=$office->Position?> - <?=$office->FullName?> </label>
            <table>
              <tr>
                <th>Field</th>
                <th>Comment</th>
              </tr>
              <?php 
              foreach($comments as $comment) {
                echo "<tr>";
                echo "<td>" . $comment->Field . "</td>";
                echo "<td>" . $comment->Comment . "</td>";
                echo "</tr>";
              }
              ?>
            </table>
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