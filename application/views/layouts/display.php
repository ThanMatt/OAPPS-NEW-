  <div class="nav-container-header-index">
    <h2 id="table-title" class="header-texts">Proposal Overview</h2>
  </div>
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

      <!-- For Drafts -->
      <?php if(($records->ProposalStatus) == 'DRAFT'):  ?>
        
        <a href="submit/edit/<?=$records->Proposal_ID?>">
          <input type="button" value="Edit Proposal">
        </a>

        <a href="submit/delete/<?=$records->Proposal_ID?>">
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