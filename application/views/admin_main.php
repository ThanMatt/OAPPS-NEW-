<!doctype html>
<html lang="en">
<head>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $admin_id = $this->session->userdata('admin_id'); 
  $full_name = $this->session->userdata('full_name');
  ?>
  <title>Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">
  

</head>
<body>
  
  <?php 
  $this->load->view('layouts/header');
  ?>
  <!-- MAIN START -->

  <div class="container-fluid">
    <div class="row no-gutters h-100">
     
      <div class="col-md-2 main" style="margin-left: 3vw !important; border: 0px;">
        <div class="table-header button" id="btn_revisions">
          Add New Org
        </div>
        <div class="table-header button" id="btn_approved">
          Edit User Info.
        </div>
        <div class="activity-log">
          <div class="table-header linear-gradient main-header-text">Activity Logs</div>
          <div class="activity-log-text">
            dump activity logs here
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-6 main" style="margin-left: 3vw;"> 
        <div class="table-header linear-gradient main-header-text">Add New Org/Edit User Info</div>
        <div id="table-container" class="main-text" style="overflow-y: scroll;">
          <div class="ap-text form-group col-xs-5">

            Username: (BITS and other orgs. Can also be used to change office names if they change name)
            <input type="text" class="form-control form-control-sm" name="" id="" value="">

            <br>

            Organization Name: (If orgs or offices decide to change their name.) 
            <input type="text" class="form-control form-control-sm" name="" id="" value="">

            <br>

            Password: 
            <input type="text" class="form-control form-control-sm" name="" id="" value="">

            <br>

            Representative Name: (When the representative changes.)
            <input type="text" class="form-control form-control-sm" name="" id="" value="">

            <br>    
            
            Logo: <br>
            Upload Box Here

            <br>
            <br>

            Signature: <br>
            Upload Box Here

            <br>      
            <br>
            <input type="submit" class="table-header button" name="submit" id="submit_btn" value="Submit">

          </div>
        </div>
      </div>
    </div>  
  </div>

  <!-- MAIN END -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  

  <script type="text/javascript">
  var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/admin-core.js"></script>
  
  <?php else: ?>
  <?php 
  $this->load->view('users/admin_login');
  ?>
  <?php endif ?>

  

</body>
</html>