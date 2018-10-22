<?php 
$account_id = $this->session->userdata('account_id'); 
if ($account_id == 'TS_BITS') {
  $prefix = 'BITS';
} else {
  $prefix = $this->session->userdata('prefix'); 
}
$organization = $this->session->userdata('organization');
$full_name = $this->session->userdata('full_name');
$position = $this->session->userdata('position');
$org_type = $this->session->userdata('org_type');
?>  

<!-- MAIN HEADER START -->
<div class="container-fluid linear-gradient header-height">
  <div class="row" style="width: 100%;">
    <div class="col-xl-4 col-md-4 col-xs-4">          
      <div class="javanese-header">
        <a href="<?=base_url()?>home">
          OAPPS
        </a>
      </div>
    </div>
    <div class="col-xl-8 col-md-8 col-xs-8">
      <div class="dropdown">
        <div class="img">
          <div class="display-picture-holder">
            <div class="display-picture">
              <img class="dropbtn" src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.jpg" alt="<?=$prefix?> logo">
            </div>
          </div>
        </div>
        <div id="myDropdown" class="dropdown-content">
          <?php if ($org_type != 'N/A'): ?>
            <div class="dropdown-details">
              Organization: <?=strtoupper($prefix)?>
            </div>
          <?php else: ?>
            <div class="dropdown-details">
              Office: 
              <?php if ($account_id != 'OD'):?>
                <?=strtoupper($prefix)?>
              <?php else: ?>
                <?='Dean'?>
              <?php endif ?>
            </div>
          <?php endif ?>
          
          <div class="dropdown-details">
            <?=$position . ': ' . $full_name?>
          </div>
          <div>
            <a href="<?=base_url()?>home/profile">
              <div class="table-header button" id="profile_btn" style="border:0px;">
                Profile
              </div>
            </a>
            <?php if ($this->session->userdata('user_type') == 0):?>
              <a href="<?=base_url()?>accounts/logout">
            <?php else: ?>
            
              <a href="<?=base_url()?>accounts_admin/logout">
            <?php endif ?>
              <div class="table-header button" id="logout_btn" style="border:0px;">
                Log Out
              </div>
            </a>
            
          </div>
        </div> 
      </div>
    </div>
    <div class="row col-md-12 col-xs-12 calibri-sub-header">
      <a href="<?=base_url()?>home">
        Online Activity Proposal Processing System
      </a>
    </div>
  </div>
</div>

<!-- MAIN HEADER END -->
<!-- SECOND HEADER START -->

<div class="container-fluid">
  <div class="row second-header-color second-header-height align-items-center" >
    <div style="width: 1% !important;">
    </div>

    <?php if ($org_type != 'N/A'): ?>
      <div class="col-md col-xs">
        <a href="<?=base_url()?>submit">
          <div class="second-header-text">Make New Proposal</div>
        </a>
      </div>     
    <?php endif ?>

    <div class="col-md col-xs">
      <div class="second-header-text">Reports</div>
    </div>   
    <div class="col-md col-xs">
      <div class="second-header-text">Downloadable Forms</div>
    </div> 
    
    <div class="col-md-7"></div>   
  </div>
</div>

<!-- SECOND HEADER END -->
<!-- HEADER-TABLE GAP START -->

<div class="container-fluid">
  <div class="row no-gutters">
    <div class="col-md-12 header-table-gap"></div>
  </div>
</div>

<!-- HEADER-TABLE GAP END -->