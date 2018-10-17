<!doctype html>
<html lang="en">
<head>
  <?php $counter = 0 ?>
  <?php if ($this->session->userdata('logged_in')): ?>
  <?php 
  $prefix = $this->session->userdata('prefix'); 
  $account_id = $this->session->userdata('account_id'); 
  $organization = $this->session->userdata('organization');
  $full_name = $this->session->userdata('full_name');
  $position = $this->session->userdata('position');
  ?>
  <title><?= strtoupper($prefix) . " - Index" ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">
  

</head>
<body>
    
  <!-- MAIN HEADER START -->

  <div class="container-fluid linear-gradient header-height">
    <div class="row" style="width: 100%;">
      <div class="col-xl-4 col-md-4 col-xs-4">          
        <div class="javanese-header">
          OAPPS
        </div>
      </div>
      <div class="col-xl-8 col-md-8 col-xs-8">
        <div class="display-picture-holder">
          <div class="display-picture">
            <img class="dropbtn" src="<?=base_url()?>assets/img/logo/<?=$prefix?>_logo.png">
          </div>
        </div>
      </div>
      <div class="row col-md-12 col-xs-12 calibri-sub-header">
        Online Activity Proposal Processing System
      </div>
    </div>
  </div>

  <!-- MAIN HEADER END -->
  <!-- SECOND HEADER START -->

  <div class="container-fluid">
    <div class="row second-header-color second-header-height align-items-center" >
      <div style="width: 1% !important;">
      </div>
      <div class="col-md col-xs">
        <a href="<?=base_url()?>submit">
          <div class="second-header-text">Make New Proposal</div>
        </a>
      </div>     
      <div class="col-md col-xs">
        <div class="second-header-text">Reports</div>
      </div>   
      <div class="col-md col-xs">
        <div class="second-header-text">Downloadable Forms</div>
      </div> 
      <a href="<?=base_url()?>layouts/profile.php">profile</a>
      <div class="col-md-7"></div>   
    </div>
  </div>

  <!-- SECOND HEADER END -->
  <!-- HEADER-TABLE GAP START -->

  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-12 header-table-gap"></div>
    </div>
  </div>

  <!-- HEADER-TABLE GAP END -->
  <!-- MAIN START -->

  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-md-2 main" style="margin-left: 3vw !important; border: 0px;">
        <?php if ($this->session->userdata('org_type') == 'N/A'): ?>

          <div class="table-header button" id="btn_pending">
            Pending
          </div>
          <div class="table-header button" id="btn_approved">
            Approved
          </div>
          <div class="table-header button" id="btn_revisions">
            Revisions
          </div>

        <?php else: ?>

          <div class="table-header button" id="btn_pending">
            Pending
          </div>
          <div class="table-header button" id="btn_approved">
            Approved
          </div>
          <div class="table-header button" id="btn_revisions">
            Revisions
          </div>
          <div class="table-header button" id="btn_drafts">
            Drafts
          </div>
      <?php endif ?>
      </div>
      <div class="col-md-2 main">
        <div class="table-header linear-gradient main-header-text">Proposal List</div>
        <?php if (is_array($records) || is_object($records)): ?>
          <?php
            foreach($records as $record) {
              $counter++;
              echo '<div class="table-tae proposal-list-item" id="view_btn/'.$record->Proposal_ID.'">'. $record->ActivityName . '</div>';
            } 
          ?>
        <?php else: ?>
          <h1 id="nav-left-container-no-records" class="proposal-list-empty">No Records</h1>
        <?php endif ?>
      </div>
      <div class="col-md-6 main"> 
        <div class="table-header linear-gradient main-header-text">Proposal Overview</div>
        <div id="table-container" class="main-text" style="overflow-y: scroll;">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi minima, voluptatum, et veritatis molestiae eum nesciunt blanditiis amet repudiandae odit harum illum accusantium aspernatur unde asperiores necessitatibus eius ipsa rem doloribus aliquid atque. Laboriosam alias aut ipsam maxime recusandae quibusdam, magnam facere harum maiores quia quam blanditiis, consectetur dignissimos esse. Iure vel, rem incidunt eos accusamus excepturi dignissimos repellendus veritatis, recusandae perspiciatis deserunt commodi numquam tempora et repudiandae qui accusantium animi at error laboriosam sit ullam quasi? Obcaecati minus ad excepturi aperiam dolore, corrupti suscipit similique ipsam consequuntur eaque nesciunt rem pariatur. Quisquam commodi saepe, fugiat atque labore error dolor aliquid reprehenderit sit ducimus similique consectetur fuga reiciendis rerum magni animi modi placeat aut. Laboriosam, fuga modi? Maiores eius autem nobis laudantium pariatur, quasi molestias quas, mollitia vitae consequatur modi expedita optio necessitatibus quis earum sunt. Omnis sequi, a nihil provident dolorum doloremque totam veritatis animi, unde et numquam quam architecto optio perspiciatis eveniet? Id repellendus ad tenetur omnis, dicta atque. Dolores ducimus voluptatibus illo eveniet dolor quas facilis labore placeat possimus illum distinctio itaque animi natus ab earum sit sint ex, odit aliquid assumenda aperiam pariatur delectus. Saepe temporibus nobis iste deleniti quas et provident repudiandae, est numquam libero quaerat laudantium aliquid ipsa dolores quidem quae qui id nemo animi aperiam! Non dolor vitae deleniti debitis doloremque eveniet consequatur, vel magni modi natus est quo, beatae quaerat provident et saepe, dolore quam? Veritatis deserunt laudantium impedit quidem. Debitis, ratione ipsum totam quis maxime voluptates mollitia, itaque quibusdam, quasi corporis repellat aliquam sapiente. Quas voluptatum dignissimos neque sed architecto odio perspiciatis aut quidem reprehenderit iusto? Possimus ipsam dolor cumque explicabo impedit, omnis quas animi maxime, alias qui aliquid nam blanditiis ad nulla perspiciatis sint. Officia tempore architecto voluptates praesentium omnis consequuntur veritatis repellat quasi incidunt. Fugiat voluptatum optio molestias, repellendus alias error nisi sunt unde tempora laudantium consequuntur iusto dolorem labore minima libero obcaecati saepe blanditiis doloremque aliquam et! Voluptas, mollitia voluptatibus nemo nam nobis veritatis quis, vero culpa dignissimos delectus amet sunt. Sed debitis est minima blanditiis corrupti distinctio maxime molestiae fugiat vel. Mollitia sed consequuntur beatae hic accusamus facere minima quibusdam. Laboriosam ipsam impedit, nostrum ad similique illum temporibus eligendi assumenda rerum praesentium est facilis voluptatem quasi quaerat enim esse nam odit a placeat minus. Molestiae consequuntur ut blanditiis dolore debitis quisquam commodi? Corrupti adipisci eos voluptas ea placeat fugit error odio nemo eum ad cum animi fuga provident, saepe asperiores veniam quae sunt? Perspiciatis, tempore. Aperiam neque, repellendus magnam quia doloremque error exercitationem vel accusantium unde excepturi nam, esse porro magni a quasi maxime pariatur suscipit nesciunt mollitia officia totam. Inventore nihil nostrum recusandae dolorum dolores quo! Id molestiae nulla, alias accusantium doloremque consequatur beatae. Eligendi qui, earum praesentium tempora aut laborum magni fugiat impedit sed sapiente fugit expedita cupiditate ratione officia suscipit necessitatibus. Cum pariatur dolor, vero rem minus ipsa quo eligendi, perferendis harum ad assumenda, eius voluptatum aspernatur dicta porro nulla. Maxime quisquam rem fugit accusantium iste, perspiciatis, numquam enim sed, officiis quam eveniet id.
        </div>
      </div>
    </div>
  </div>

  <!-- MAIN END -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript">
    var BASE_URL = "<?= base_url();?>";
    </script>
    <script src="<?= base_url();?>assets/js/jquery-3.3.1.js"></script>
  <script src="<?= base_url();?>assets/js/core.js"></script>
  <script src="<?= base_url();?>assets/js/progress.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
  
  
  <?php else: ?>
  <?php 
  $this->load->view('users/login_view');
  ?>
  <?php endif ?>

</body>
</html>