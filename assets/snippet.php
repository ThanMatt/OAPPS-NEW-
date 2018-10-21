<!doctype html>
<html lang="en">
<head>

  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $prefix = $this->session->userdata('prefix'); 
  $account_id = $this->session->userdata('account_id'); 
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  ?>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">

  <title>OAPPS</title>
</head>
<body>
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
                <img class="dropbtn" src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.png">

              </div>
            </div>
          </div>
          <div id="myDropdown" class="dropdown-content">
            <div class="dropdown-details">
              Org: <?=strtoupper($prefix)?>
            </div>
            <div class="dropdown-details">
              <?=$position . ': ' . $full_name?>
            </div>
            <div>
              <a href="<?=base_url()?>home/profile">
                <div class="table-header button" id="profile_btn">
                  Profile
                </div>
              </a>
              <a href="<?=base_url()?>accounts/logout">
                <div class="table-header button" id="logout_btn">
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
      <div class="col-md col-xs">
        <a href="<?=base_url()?>submit">
          <div class="second-header-text">Make New Proposal</div>
        </a>
      </div>     
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

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript">
  var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>

</body>
</html>