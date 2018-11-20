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
          <div class="d-flex flex-column oapps-ch" style="overflow-y: auto; overflow-x: hidden;"> <!-- PROPOSAL LIST ROW START -->
            <div class="oapps-btn proposal-view" id=""><p class="text-center oapps-bmb">BITS</p></div> <!-- LOOP THIS FOR EACH ORG -->
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
          <div class="form-group mt-4 ml-5" style="width: 70%;">
            <form>
              <p class="lead">
                Username: 
                <!-- (BITS and other orgs. Can also be used to change office names if they change name) -->
              </p>
                
              <input type="text" class="form-control form-control-sm" name="" id="" value="" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

              <br>

              <p class="lead">
                Organization Name: 
                <!-- (If orgs or offices decide to change their name.)  -->
              </p>
              <input type="text" class="form-control form-control-sm" name="" id="" value="">

              <br>

              <p class="lead">
                Password: 
              </p>
              <input type="text" class="form-control form-control-sm" name="" id="" value="">

              <br>

              <p class="lead">
                Representative Name: 
                <!-- (When the representative changes.) -->
              </p>
              <input type="text" class="form-control form-control-sm" name="" id="" value="">

              <br>    
              <p class="lead">
                Logo: 
              </p>
              <br>
              Upload Box Here

              <br>
              <br>

              <p class="lead">
                Signature: 
              </p>
              <br>
              Upload Box Here

              <br>      
              <br>
              <input type="submit" class="mt-5 btn btn-light btn-lg" name="submit" id="submit_btn" value="Submit">
            </form>
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
  
  <?php else: ?>
  <?php 
  $this->load->view('users/admin_login');
  ?>
  <?php endif ?>

</body>
</html>