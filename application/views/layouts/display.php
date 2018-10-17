<body id="display_proposal"> 
  <input type="text" id="proposal_id" value="<?=$records->Proposal_ID?>" hidden>
  <div class="main-text">
    <div class="container-content-body">
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

      <!-- Progress tracker -->
      <!-- Don't add spaces or newlines between the li elements! -->
        <div class="progress-container">
          <ol class="progress-meter">
            <li class="progress-point todo">Treasurer</li><li class="progress-point todo">Secretary-General</li><li class="progress-point todo">President</li><li class="progress-point todo">Assistant Prefect</li><li class="progress-point todo">Prefect</li><li class="progress-point todo">Dean</li>
          </ol>
      </div>

        <!-- For Drafts -->
        <?php if(($records->ProposalStatus) == 'DRAFT'):  ?>
          
          <a href="proposal/edit/<?=$records->Proposal_ID?>">
            <input type="button" value="Edit Proposal">
          </a>

          <a href="proposal/delete/<?=$records->Proposal_ID?>">
            <input type="button" value="Delete Proposal">
          </a>

        <!-- For Pending/Approved/Revisions -->
        <?php else: ?>
          <a href="proposal/view/<?=$records->Proposal_ID?>">
            <input type="button" value="View Proposal">
          </a>
        <?php endif ?>
      </div>
    </div>
  </div>
</body>