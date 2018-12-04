<!DOCTYPE HTML>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>OAPPS</title>
  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body class="oapps-bg-head">

  <?php $form_attributes = array('id' => 'ajax_form'); ?>
  <?php echo form_open('users/login_view', $form_attributes);?>
    <div class="row d-flex justify-content-center align-items-center" style="width: 100vw; height: 100vh;">
      <div class="col-lg-3 col-md-6 col-sm-7 col-xs-8 m-5" style="border: 2px solid black; height: 500px; border-radius: 3%; background-color: white; box-shadow: 20px 20px 30px 0px rgba(0,0,0,0.2);">
        <div class="row d-flex justify-content-center mt-5">
          <img class="oapps-logos" src="<?= base_url();?>assets/img/SBU.png">
          <p class="oapps-login-text-1 text-center">Online Activity Proposal Processing System</p>
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


        <div class="row d-flex justify-content-center">
          <div class="input-group my-4" style="width:80% !important;">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <ion-icon name="contact"></ion-icon>
              </span>
            </div>
            <input class="form-control" type="text" id="account-id" name="account-id" spellcheck="false" placeholder="Username">
          </div>
          <div class="input-group" style="width:80% !important;">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <ion-icon name="key"></ion-icon>
              </span>
            </div>
            <input class="form-control" type="password" id="password" name="password" spellcheck="false" placeholder="Password">
          </div>
        </div>
        <div class="row d-flex justify-content-around mt-3">
          <input type="submit" id="button" name="submit" class="btn btn-light mt-3" value="Log-in"/>
        </div>
      </div>
    </div>
  <?php echo form_close(); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" 
    crossorigin="anonymous">
  </script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js" integrity="sha384-JPbtLYL10d/Z1crlc6GGGGM3PavCzzoUJ1UxH0bXHOfguWHQ6XAWrIzW+MBGGXe5" 
    crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/ionicons@4.4.6/dist/ionicons.js" integrity="sha384-c1U9jYOPrql0juBH2UEod5JI7LgyXZTK7anjLOpQVTZwDGuN+zoVge7d6qUXZhkq" crossorigin="anonymous"></script>

  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/core.js"></script>

</body>

</html>
