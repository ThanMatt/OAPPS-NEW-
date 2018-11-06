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
  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
  

</head>
<body>
  
  <!-- MAIN START -->
  <div class="container-fluid" style="height: 100vh; width: 100%;">
    <?php 
    $this->load->view('layouts/header');
    ?>
    <div class="row m-5 oapps-mh"> <!-- FIRST ROW START -->

      <div class="col-lg-3 oapps-rh mb-5" style="border: 1px solid black"> <!-- ADMIN LOG COL START -->
        <div class="row oapps-bg-head "> <!-- ADMIN LOG HEAD ROW START -->
          <div class="oapps-hh col-12 oapps-head-text-1 text-white">
            <p class="text-center oapps-bmb">Admin logs</p>
          </div> 
        </div> <!-- ADMIN LOG HEAD ROW END -->
        <div class="oapps-ch" style="overflow-y: auto; width: 100%; margin-left: .95rem !important">
          <!-- ADMIN LOG CONTENT START -->
          <hr class="mr-5">
          <p class="text-monospace">Log 1: This is how logs will look like</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 2: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 3: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 4: This is another log but really really really really long</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 5: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 6: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 7: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 8: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 9: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 10: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 11: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 12: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 13: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 14: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 15: This is yet another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 16: This is another log</p>
          <hr class="mr-5">
          <p class="text-monospace">Log 17: This is yet another log</p>
          <hr>
          <!-- ADMIN LOG CONTENT START -->
        </div>
      </div> <!-- ADMIN LOG COL END -->
      <div class="col-lg-8 offset-lg-1 oapps-rh" style="border: 1px solid black"> <!-- EDIT/ADD COL START -->
        <div class="row oapps-bg-head "> <!-- EDIT/ADD HEAD ROW START -->
          <div class="oapps-hh col-12 oapps-head-text-1 text-white">
              <p class="text-center oapps-bmb">User Info</p>
          </div> 
        </div> <!-- EDIT/ADD HEAD ROW END -->
        <div class="oapps-ch" style="overflow-y: auto; width: 100%; margin-left: .95rem !important">
          <!-- ADD/EDIT FORM START -->
          <div class="form-group mt-4 ml-5" style="width: 70%;">
            <form>
              <hr>
              <fieldset>
                <div class="row">
                  <div class="col-lg-2 col-md-3">
                    <input type="radio" id="add" name="add" value="add">
                    <label for="add" class="lead">Add</label>
                  </div>
                  <div class="col-lg-2 col-md-8">
                    <input type="radio" id="edit" name="edit" value="edit">
                    <label for="edit" class="lead">Edit</label>
                  </div>
                </div>
              </fieldset>
              <hr>
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
  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
    </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?= base_url();?>assets/js/admin-core.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  
  
  <?php else: ?>
  <?php 
  $this->load->view('users/admin_login');
  ?>
  <?php endif ?>

</body>
</html>