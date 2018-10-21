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