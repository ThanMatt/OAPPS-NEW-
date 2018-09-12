<!DOCTYPE HTML>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Login Page</title>
  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>
</head>

<body>

  <?php $form_attributes = array('id' => 'ajax_form'); ?>
  <?php echo form_open('users/login_view', $form_attributes);?>
    <div class="container-login">
      <div class="sub-container-login">

        <div class="image-container-login">
          <img src="<?= base_url();?>assets/img/SBU.png">
          <h3>San Beda Online Activity Proposal Processing System</h3>
        </div>

        <?php 
        $data_account = array (
          'id' => 'account-id',
          'name' => 'account-id',
          'spellcheck' => 'false'
        );

        $data_pass = array (
          'id' => 'password',
          'name' => 'password',
          'spellcheck' => 'false'
        );

        $data_button = array (
          'id' => 'button',
          'class' => 'button',
          'name' => 'submit',
          'value' => 'LOG IN'
        );
        
        ?>

        <div class="input-container-login">
          <legend>Account ID</legend>
          <?= form_input($data_account); ?>

          <legend>Password</legend>
          <?= form_password($data_pass); ?>

          <a href="forgot.html">
            <p id="forgot">Forgot password?</a>
          </p>

          <div class="button-container-login">
            <?= form_submit($data_button); ?>
          </div>
        </div>
      </div>
    </div>
  <?php echo form_close(); ?>
</body>

</html>