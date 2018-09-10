<!DOCTYPE html>
<html lang="en">
<head>

  <?php if ($this->session->userdata('logged_in')): ?>
  <?php $account_id = $this->session->userdata('prefix'); ?>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $account_id . " - Index" ?></title>

  <link rel="stylesheet" href="<?= base_url();?>assets/css/styles.css">

  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
  </script>
  <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>

</head>
<body>
  <div class="header-container">
    <header>
      <div class="header-margin">
        <div class="left-header-text">
          <div class="img-box">
            <img src="<?= base_url(); ?>assets/img/logo/<?= $account_id; ?>_logo.png">
          </div>

            <?php 
            $organization = $this->session->userdata('organization');
            $full_name = $this->session->userdata('full_name');
            $position = $this->session->userdata('position');

            echo "<h2 class='heady'>";
            echo "<label>" . $organization . "</label>";
            echo "<label>Logged in as " . $full_name . "</label>";
            echo "<label>" . strtoupper($position) . "</label>";
            echo "</h2>";

            echo form_open('accounts/logout');

            $data_logout = array(
              'name' => 'submit',
              'class' => 'nav-button-left',
              'value' => 'Log Out'
            );

            echo form_submit($data_logout);

            echo form_close();
            ?>
        </div>
      </div>
    </header>
  </div>
  <div class="nav-left-container-index">
    <div class="nav-left-container-margin-index">
    <!-- N/A means Not An org -->
    <?php if ($this->session->userdata('org_type') == 'N/A'): ?>
      
      <input type="button" id="btn_pending" class="nav-button-left" value="Pending">
      <input type="button" id="btn_approved" class="nav-button-left" value="Approved">
      <input type="button" id="btn_revisions" class="nav-button-left" value="Revisions">
  
    <?php else: ?>

      <input type="button" id="btn_pending" class="nav-button-left" value="Pending">
      <input type="button" id="btn_approved" class="nav-button-left" value="Approved">
      <input type="button" id="btn_revisions" class="nav-button-left" value="Revisions">
      <input type="button" id="btn_new" class="nav-button-left" value="Submit">
      <input type="button" id="btn_drafts" class="nav-button-left" value="Drafts">  
    
    <?php endif ?>
    
    </div>
  </div>
  <!-- Table -->
  <div class="container-index" id="table-container">
    <div class="table-container-index">
      <div class="table-container-margin-index">
        <h2 id="table-title"><?php echo $title ?></h2>
        <?php if (is_array($records) || is_object($records)): ?>
        <table id="proposal-table">
          <tr>
          <?php if ($this->session->userdata('org_type') != 'N/A'): ?>
            <th>#</th>
            <th>Proposal Title</th>
            <th>Date Submitted</th>
            <th>Office</th>
            <?php
            foreach($records as $record) {
              $counter = 1;
              echo "<tr>";
              echo "<td>" . $counter++ . "</td>";
              echo "<td>" . $record->ActivityName . "</td>";
              echo "<td>" . $record->DateProposed . "</td>";
              echo "<td>" . $record->OfficeProposal . "</td>";
              echo "<td><input type='button' class='button' id='btn_view' value='VIEW'></td>";
              echo "</tr>";
            } 
            ?>
          <?php else: ?>
            <th>#</th>
            <th>Proposal Title</th>
            <th>Date Submitted</th>
            <?php
            foreach($records as $record) {
              $counter = 1;
              echo "<tr>";
              echo "<td>" . $counter++ . "</td>";
              echo "<td>" . $record->ActivityName . "</td>";
              echo "<td>" . $record->DateProposed . "</td>";
              echo "<td><input type='button' class='button' id='btn_view' value='VIEW'></td>";
              echo "</tr>";
            } 
            ?>

          <?php endif ?>
          
          </tr>
        </table>
      </div>
    <?php else: ?>
    <h1>No records </h1>
    <?php endif ?>
    </div>
  </div>

  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>



</body>
</html>


