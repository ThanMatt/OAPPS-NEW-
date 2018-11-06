<body id="display_proposal">
  <div class="row no-gutter">
    <div class="col-xs-9">
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
              <li <?=$this->progress_model->progressSecGen($records->Proposal_ID)?> >Sec-Gen</li>

              <?php if($this->proposals_model->checkIfOEExists($records->Proposal_ID) || $this->proposals_model->checkIfFARExists($records->Proposal_ID)):?>
                <li <?=$this->progress_model->progressTreasurer($records->Proposal_ID)?> >Treasurer</li>
              <?php endif ?>

              <li <?=$this->progress_model->progressPresident($records->Proposal_ID)?> >President</li>
              <li <?=$this->progress_model->progressAsstPrefect($records->Proposal_ID)?> >Asst.Prefect</li>
              <li <?=$this->progress_model->progressPrefect($records->Proposal_ID)?> >Prefect</li>
              <li <?=$this->progress_model->progressDean($records->Proposal_ID)?> >Dean</li>
            </ul>
          <?php endif ?>
          </div> 
        </div>
      </div>
    </div>
    
    
    <div class="col-xs-3" style="padding-left: 15vw;">
      <!-- For Drafts -->
      <?php if(($records->ProposalStatus) == 'DRAFT'):  ?>
        
        <a href="proposal/edit/<?=$records->Proposal_ID?>">
          <input class="btn btn-light mr-3" type="button" value="Edit Proposal">
        </a>

        <a href="proposal/delete/<?=$records->Proposal_ID?>">
          <input class="btn btn-light" type="button" value="Delete Proposal" id="delete_btn">
        </a>

      <!-- For Pending/Approved/Revisions -->
      <?php else: ?>
        <a href="proposal/view/<?=$records->Proposal_ID?>">
          <input class="table-header btn btn-light mx-5 mt-2" type="button" value="View Proposal">
        </a>
      <?php endif ?>
    </div>
    
  </div>    
  
</body>




