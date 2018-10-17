<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url();?>assets/css/boot_styles.css">
    <script type="text/javascript">
        var BASE_URL = "<?=base_url();?>";
    </script>
    <script src="<?=base_url();?>assets/js/jquery-3.3.1.js"></script>
    <script src="<?=base_url();?>assets/js/plugin.js"></script>
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
        <div class="col-md-7"></div>   
        </div>
    </div>

  <!-- SECOND HEADER END -->




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
</body>
</html>