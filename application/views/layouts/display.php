<!DOCTYPE html>
<html lang="en">
<head>

  <?php if ($this->session->userdata('logged_in')): ?>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">

  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>

</head>

<?php else: ?>
<?php endif ?>