<?php 
$account_id = $this->session->userdata('account_id');
$admin_id = $this->session->userdata('admin_id'); 
if ($admin_id == 'TS_BITS') {
  $prefix = 'BITS';
} else {
  $prefix = $this->session->userdata('prefix'); 
}
$organization = $this->session->userdata('organization');
$full_name = $this->session->userdata('full_name');
$position = $this->session->userdata('position');
$org_type = $this->session->userdata('org_type');
?>  

  <!-- primary header start -->
  <link rel="shortcut icon" href="<?=base_url()?>assets/img/favicon.ico" type="image/x-icon" />
  <div class="row oapps-h oapps-bg-head"> <!-- HEADER ROW START -->
    <div class="col-lg-10"> <!-- TEXT COL START -->
      <div class="row"> <!-- TEXT ROW START -->
        <div class="col-lg-12 bottom-align-text">
          <p class="oapps-primaryhead-text-1" style="position: relative; top: 30px;">
            <a href="<?=base_url()?>admin">
              OAPPS
            </a>
          </p>
        </div>
        <div class="col-lg-12">
          <a href="index.html">
            <p class="oapps-subhead-text-1">
              <a href="<?=base_url()?>admin">
                Online Activity Proposal Processing System
              </a>
            </p>
          </a>
        </div>
      </div> <!-- TEXT ROW START -->
    </div> <!-- TEXT COL END -->
    <div class="col-lg-2 d-flex justify-content-end p-4"> <!-- DISPLAY PIC COL START -->
      <!-- <a href="profile.html"> -->
  
      <div class="dropdown oapps-profile">
        <button class="oapps-profile-img-btn" data-toggle="dropdown">
          <img class="oapps-profile-img" src="<?=base_url()?>assets/img/<?=$prefix?>_Logo.png" alt="<?=$prefix?> logo">   
        </button>
        <div class="dropdown-menu dropdown-menu-right oapps-content" aria-labelledby="dropdownMenuButton">
          <?php if ($org_type != 'N/A'): ?>
            <div class="oapps-dropdown-details">
              <p>Organization: <?=strtoupper($prefix)?></p>
            </div>
            <?php else: ?>
            <div class="oapps-dropdown-details">
              Office: 
              <?php if ($account_id != 'OD'):?>
                <?=strtoupper($prefix)?>
              <?php else: ?>
                <?='Dean'?>
              <?php endif ?>
            </div>
          <?php endif ?>
          <div class="oapps-dropdown-details">
            <?=$full_name?>
          </div>
           <div>
            <?php if ($this->session->userdata('user_type') == 0):?>
              <a href="<?=base_url()?>accounts/logout">
            <?php else: ?>
            
              <a href="<?=base_url()?>accounts_admin/logout">
            <?php endif ?>
              <div class="oapps-btn-dropdown" id="logout_btn">
                Log Out
              </div>
            </a>
          </div>
        </div>
      </div>

    </div> <!-- DISPLAY PIC COL END -->
  </div> <!-- HEADER END START -->
  <!-- primary header end -->
  <!-- secondary header start -->
  <div class="row oapps-sh oapps-bg-nav">

    <?php if ($org_type != 'N/A'): ?>
      <div class="col-lg-2" style="margin-left: 2.08333%">
        <a href="<?=base_url()?>admin"><p class="oapps-nav-text-1">Logs</p></a>
      </div>
    <?php endif ?>

      <div class="col-lg-2" style="margin-left: 2.08333%">
        <a href="<?=base_url()?>admin/add"><p class="oapps-nav-text-1">Add New Organization</p></a>
      </div>
      <div class="col-lg-2" style="margin-left: 2.08333%">
      <a href="<?=base_url()?>admin/edit"><p class="oapps-nav-text-1">Edit Organization Data</p></a>
      </div>
    </div>
    <!-- secondary header end -->