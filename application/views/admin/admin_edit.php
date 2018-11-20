<!doctype html>
<html lang="en">
<head>
  <?php if ($this->session->userdata('admin_log')): ?>
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
  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
  

</head>
<body>
  
  <!-- MAIN START -->
  <div class="container-fluid" style="height: 100vh; width: 100%;">
    <?php 
    $this->load->view('layouts/adminheader');
    ?>
    <div class="row m-5 oapps-mh"> <!-- FIRST ROW START -->

      <div class="col-lg-3 mt-3 oapps-rh h-100" style="border: 1px black solid"> <!-- PROPOSAL LIST COL START -->
          <div class="row oapps-bg-head"> <!-- PROPOSAL LIST HEAD ROW START -->
            <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Org List</p>
            </div>
          </div> <!-- PROPOSAL LIST HEAD ROW END -->
          <div class="d-flex flex-column justify-content-start row oapps-ch" style="overflow-x: auto;"> <!-- PROPOSAL LIST ROW START -->
          <?php if(is_object($accounts) || is_array($accounts)):?>
            <?php foreach($accounts as $account): ?>
              <div class="oapps-btn proposal-view" id="view_btn/<?=$account->Account_ID?>"><p class="text-center oapps-bmb"><?=$account->Account_ID?></p></div> <!-- LOOP THIS FOR EACH ORG -->
            <?php endforeach ?>
          <?php endif ?>
          </div> <!-- PROPOSAL LIST ROW END -->
        </div> <!-- PROPOSAL LIST COL END -->
      <div class="col-lg-8 mt-3 offset-lg-1 oapps-rh" style="border: 1px solid black"> <!-- EDIT/ADD COL START -->
        <div class="row oapps-bg-head "> <!-- EDIT/ADD HEAD ROW START -->
          <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Org Info</p>
          </div> 
        </div> <!-- EDIT/ADD HEAD ROW END -->
        <div class="oapps-ch" style="overflow-y: auto; width: 100%; margin-left: .95rem !important">
          <!-- ADD/EDIT FORM START -->
          <div class="form-group mt-4 ml-5" id="account-container" style="width: 70%;">
            
          </div>
            <!-- ADD/EDIT FORM END -->
        </div>
      </div> <!-- EDIT/ADD COL START -->
    </div> <!-- FIRST ROW END -->
  </div> <!-- CONTAINER END -->

  <!-- MAIN END -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
    crossorigin="anonymous">
  </script>
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