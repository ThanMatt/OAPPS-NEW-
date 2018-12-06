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
    <div class="col-lg-8 offset-lg-2 oapps-rh mb-5" style="border: 1px solid black"> <!-- ADMIN LOG COL START -->
        <div class="row oapps-bg-head "> <!-- EDIT/ADD HEAD ROW START -->
          <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">Register a new organization</p>
          </div> 
        </div> <!-- EDIT/ADD HEAD ROW END -->
        <div class="oapps-ch" style="overflow-y: auto; width: 100%; margin-left: .95rem !important">
          <!-- ADD/EDIT FORM START -->
          <div class="form-group mt-4 ml-5" style="width: 70%;">
            <form id="admin-new">
            <p class="lead">
              Account ID: 
              <!-- (BITS and other orgs. Can also be used to change office names if they change name) -->
            </p>

            <input type="text" class="form-control form-control-sm" id="account-id" name="account_id" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" required>

            <br>

            <p class="lead">
              Organization Name: 
              <!-- (If orgs or offices decide to change their name.)  -->
            </p>
            <input type="text" class="form-control form-control-sm" name="organization" id="org-id" required>

            <br>

            <p class="lead">
              Password: 
            </p>
            <input type="password" autocomplete="new-password" class="form-control form-control-sm" name="password" id="pass-id" value="" required>

            <br>

            <p class="lead">
              Representative Name: 
              <!-- (When the representative changes.) -->
            </p>
            <input type="text" class="form-control form-control-sm" name="full_name" id="rep-id" required>

            <br> 

            <p class="lead">
              Email Address: 
              <!-- (When the representative changes.) -->
            </p>
            <input type="email" class="form-control form-control-sm" name="email" id="email-id" required>

            <br>       

            <p class="lead">
              Contact Number: 
              <!-- (When the representative changes.) -->
            </p>
            <input type="text" class="form-control form-control-sm" name="contact_number" id="contact-id" required>

            <br>    

            <p class="lead">
              Position: 
            </p>
            <input type="text" class="form-control form-control-sm" name="position" id="position-id" required>

            <br>  

            <p class="lead">
              Batch: 
              <!-- (When the representative changes.) -->
            </p>
            <input type="text" class="form-control form-control-sm" name="batch" id="batch-id" required>

            <br>    

            <p class="lead">
              Type: 
              <!-- (When the representative changes.) -->
            </p>
            <select class="form-control" name="type" required>
              <option value="Pro">Professional</option>
              <option value="NonPro">Non-Professional</option>
              <option value="N/A">N/A</option>
            </select>

            <br>    

            <p class="lead">
              Logo: 
            </p>
            <input type="file" class="form-control form-control-sm" name="logo" id="logo-id" required>
            <p class="text-muted oapps-text-small">
              Maximum size: 3 MB or 3072 KB | File Format: jpg/jpeg/png
            </p>
            <br>

            <p class="lead">
              Signature: 
            </p>
            <input type="file" class="form-control form-control-sm" name="signature" id="signature-id" required>
            <p class="text-muted oapps-text-small">
              Maximum size: 1 MB or 1024 KB | File Format: jpg/jpeg/png
            </p>

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
  <script src="<?=base_url();?>assets/js/admin-core.js"></script>
  <?php else: ?>
  <?php 
  $this->load->view('users/admin_login');
  ?>
  <?php endif ?>

</body>
</html>