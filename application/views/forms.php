<!DOCTYPE html>
<html>
<head>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $account_id = $this->session->userdata('account_id');
  $position = $this->session->userdata('position');
  $org_type = $this->session->userdata('org_type');
  $prefix = $this->session->userdata('prefix');
  ?>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Downloadable Forms</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B"
    crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
</head>
<body>

  <div class="container-fluid" style="height: 100vh; max-width: 100%;"><!-- CONTAINER START -->
    <?php 
      $this->load->view('layouts/header');
    ?>
    <div class="row w-100 no-gutters"> <!-- LEFT ROW START --> 
      <div class="col-lg-6 col-md-12 d-flex flex-column justify-content-center"> <!-- LEFT SIDE COL START -->
        <div class="card mt-5 mx-4 w-100"> <!-- AP CARD START -->  
          <div class="card-header">
            Forms
          </div>
          <div class="card-body">
            <a href="<?=base_url()?>assets/forms/CASHREQ.docx">Cash Request Form</a>
            <a href="<?=base_url()?>assets/forms/FOODREQ.docx">Food Request Form</a>
            <a href="<?=base_url()?>assets/forms/MOA.docx">Memorandum of Agreement Form (MOA)</a>
          </div>
        </div> <!-- AP CARD END --> 
      </div>
    </div>

    <?php else: ?>
    <?php 
    $this->load->view('users/login_view');
    ?>
    <?php endif ?>
  </div> <!-- CONTAINER END --> 


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
    crossorigin="anonymous">
  </script>
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/dropdown.js">
  </script>
  <script src="<?=base_url();?>assets/js/plugin.js">
  </script>

</body>
</html>