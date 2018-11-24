<?php 

$account_id = $this->session->userdata('account_id');
$org_type = $this->session->userdata('org_type');

?>

<body id="display_proposal">
  <div class="row no-gutter">
    <div class="col-6">
      <input type="text" id="proposal_id" value="<?=$records->Proposal_ID?>" hidden>
      <div class="main-text">
        <div class="container-content-body m-5">
          <div id="proposal-name" class="container-content">
            <h4 class="container-content-labels">Proposal Name: </h4>
            <p><?=$records->ActivityName?></p>
          </div>
          <div id="org-name" class="container-content">
            <h4 class="container-content-labels">Organization Name: </h4>
            <p><?=$records->Organization?></p>
          </div>
          <div id="org-rep" class="container-content">
            <h4 class="container-content-labels">Organization Representative: </h4>
            <p><?=$records->FullName?></p>
          </div>
          <div id="nature" class="container-content">
            <h4 class="container-content-labels">Nature of the Activity: </h4>
            <p>
              <?=$records->Nature?>
            </p>
          </div>
          <div id="activity-date" class="container-content">
            <h4 class="container-content-labels">Date of Activity: </h4>
            <p><?=$records->DateActivity?></p>
          </div>
          <div id="submission-date" class="container-content">
            <h4 class="container-content-labels">Date of Submission: </h4>
            <p><?=$records->DateProposed?></p>
          </div>
          <div id="rep-contact" class="container-content">
            <h4 class="container-content-labels">Representative Contact Info: </h4>
            <p><?=$records->ContactNumber?></p>
          </div>
          
          <!-- Progress Tracker -->
          <div id="progress" class="container-content progress-tracker">
          <?php if(($records->ProposalStatus) != 'DRAFT'):  ?>
            <ul class="progressbar"> 
              <?php if ($records->Account_ID != 'SC'): ?>
                <li <?=$this->progress_model->progressSecGen($records->Proposal_ID)?> >Sec-Gen</li>

                <?php if($this->proposals_model->checkIfBPExists($records->Proposal_ID)):?>
                  <li <?=$this->progress_model->progressTreasurer($records->Proposal_ID)?> >Treasurer</li>
                <?php endif ?>

                <li <?=$this->progress_model->progressPresident($records->Proposal_ID)?> >President</li>
                <li <?=$this->progress_model->progressAsstPrefect($records->Proposal_ID)?> >Asst.Prefect</li>
                <li <?=$this->progress_model->progressPrefect($records->Proposal_ID)?> >Prefect</li>
                <li <?=$this->progress_model->progressDean($records->Proposal_ID)?> >Dean</li>
              <?php else: ?>
                <li <?=$this->progress_model->progressAsstPrefect($records->Proposal_ID)?> >Asst.Prefect</li>
                <li <?=$this->progress_model->progressPrefect($records->Proposal_ID)?> >Prefect</li>
                <li <?=$this->progress_model->progressDean($records->Proposal_ID)?> >Dean</li>
              <?php endif ?>
            </ul>
          <?php endif ?>
          </div> 
          <?php if ($records->ProposalStatus != 'DRAFT'):?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Date Proposed</th>
                  <?php if ($this->proposals_model->checkIfBPExists($records->Proposal_ID)): ?>
                    <th>Treasurer</th>
                  <?php endif ?>
                  <th>Sec-Gen</th>
                  <th>President</th>
                  <th>Asst. Prefect</th>
                  <th>Prefect</th>
                  <th>Dean</th>
                  <th>Time Approved</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?=$timetable->DateProposed?></td>
                  <?php if ($this->proposals_model->checkIfBPExists($records->Proposal_ID)):?>
                    <td><?=$timetable->SC_TR_TimeIn?></td>
                  <?php endif ?>
                  <td><?=$timetable->SC_SG_TimeIn?></td>
                  <td><?=$timetable->SC_P_TimeIn?></td>
                  <?php if ($org_info->Type == 'Pro'): ?>
                    <td><?=$timetable->OPSA_APP_TimeIn?></td>
                  <?php else: ?>
                    <td><?=$timetable->OPSA_APN_TimeIn?></td>
                  <?php endif ?>
                  <td><?=$timetable->OPSA_P_TimeIn?></td>
                  <td><?=$timetable->OD_TimeIn?></td>
                  <td><?=$timetable->TimeApproved?></td>
                </tr>
              </tbody>
            </table>
          <?php endif ?>
          <?php if(is_array($comments) || is_object($comments)):?>
            <?php foreach($comments as $comment): ?>  
              <div class="card" style="width: 40rem;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item font-weight-bold">

                    <?=$comment->Account_ID?> (<?=$comment->Status?>)
                    <span class="text-muted oapps-text-small">
                      <?=$this->proposals_model->timeElapsed($comment->DateTime)?>
                    </span>
                  </li>

                  <li class="list-group-item"><?=$comment->Comment?></li>
                </ul>
              </div>
            <?php endforeach ?>
          <?php endif ?>
        </div>
        
      </div>

    </div>
    
    
    <div class="col-3 mt-5">
      <!-- For Drafts -->
      <?php if(($records->ProposalStatus) == 'DRAFT'):  ?>
        
        <a href="proposal/edit/<?=$records->Proposal_ID?>">
          <input class="btn btn-light mb-3 mr-3" type="button" value="Edit Proposal">
        </a>

        <a href="proposal/delete/<?=$records->Proposal_ID?>">
          <input class="btn btn-light" type="button" value="Delete Proposal" id="delete_btn">
        </a>

      <!-- For Pending/Approved/Revisions -->
      <?php else: ?>
        <a href="proposal/summary/<?=$records->Proposal_ID?>" target="_blank">
          <input class="table-header btn btn-light mx-5 mt-2" type="button" value="View Proposal">
        </a>

        <?php if ($records->ProposalStatus == 'UNDER REVISION' && $this->session->userdata('org_type') != 'N/A'): ?>
          <a href="proposal/revise/<?=$records->Proposal_ID?>">
          <input class="table-header btn btn-light mx-5 mt-2" type="button" value="Revise">
          </a>
        <?php endif ?>

        <?php if($this->session->userdata('org_type') == 'N/A'): ?>
          <?php if ($this->proposals_model->didIAskThis($account_id, $records->Proposal_ID)): ?>
            <?php if($this->proposals_model->didIApproveThis($account_id, $records->Proposal_ID)): ?>
              <a href="<?=base_url()?>proposal/approve/<?=$records->Proposal_ID?>">
                <input class="table-header btn btn-light mx-5 mt-2" id="approve_btn" type="button" value="Approve">
              </a>
              
              <a href="<?=base_url()?>proposal/ask/<?=$records->Proposal_ID?>">
                <input class="table-header btn btn-light mx-5 mt-2" id="revise_btn" type="button" value="Ask for Revision">
              </a>

              <a href="#">
                <input class="table-header btn btn-light mx-5 mt-2" type="button" value="Decline">
              </a>
            <?php endif ?>
          <?php endif ?>

        <?php endif ?>
      <?php endif ?>
    </div>
    
  </div>    
  
</body>




