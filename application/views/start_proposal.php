<!DOCTYPE html>
<html>
<head>
  <?php if ($this->session->userdata('logged_in')): ?>
  
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Layout</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>
</head>
<body>


 <div id="myModal" class="modal">

  <!-- Modal content or the popup -->
  <form id="ajax_form" method="POST">
    <div class="modal-content">
      <p>Are you going to submit a budget proposal?</p>
      <div class="radio_group">
        <input type="radio" id="rd_yes" class="radio_input" name="bp_radio" value="yes_bp">Yes
          <div class="check_group" hidden>
            <input type='checkbox' id='chk_far' class="check_bp" name='check_bp' value='w_far' disabled checked>Fixed Assets Requirements
            <br>
            <input type='checkbox' id='chk_oe' class="check_bp" name='check_bp' value='w_oe' disabled checked>Operating Expenses
          </div>
          <br>
        <input type="radio" id="rd_no" class="radio_input" name="bp_radio" value="no_bp" checked>No
        <br>

      </div>
      <input type="submit" name="device_submit" id="modal_submit" value="Log In">
    </div>
  </form>

 </div>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>

</html>