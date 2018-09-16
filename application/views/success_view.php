<!DOCTYPE html>
<html>
<head>
<?php if ($this->session->userdata('logged_in')): ?>
<?php 
$account_id = $this->session->userdata('account_id');
$proposal_id = $proposal->Proposal_ID;
?>

<?php if (!$this->proposals_model->isThisMine($account_id, $proposal_id)):?>
  <?php redirect(base_url() . "home")?>
<?php endif ?>

  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Activity Proposal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url();?>assets/css/styles.css">
  <script type="text/javascript">
    var BASE_URL = "<?=base_url();?>";
  </script>
  <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?=base_url();?>assets/js/plugin.js"></script>
</head>

<body>
  <div class="container-sent">
    <div class="margin-sent">

      <div class="header-container-sent">
        <h1>Your proposal has been submitted!</h1>
        <hr>
      </div>

      <div class="body-container-sent">
        <p>Your proposal, <?=$proposal->ActivityName?>, has been submitted
        to the Student Council! Lorem ipsum dolor sit amet, 
        consectetur adipiscing elit, sed do eiusmod tempor incididunt 
        ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
        quis nostrud exercitation ullamco laboris nisi ut aliquip 
        ex ea commodo consequat. Duis aute irure dolor in reprehenderit 
        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa 
        qui officia deserunt mollit anim id est laborum.</p>
      </div>

      <div class="button-container-sent">
      <a href="<?=base_url()?>home">
        <button type="button" id="button">CONTINUE</button>
      </a>
      </div>

    </div>
  </div>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>
</body>
</html>