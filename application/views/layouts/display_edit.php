<?php if (is_array($records) || is_object($records)):?>

<form method="POST" action="<?=base_url()?>admin/modify" id="admin-edit" enctype="multipart/form-data">
  <img class="oapps-profile-img" src="<?=base_url()?>uploads/logos/<?=$records->Logo?>" alt="<?=$records->Account_ID?> logo">   
  <img class="oapps-signature" src="<?=base_url()?>uploads/signatures/<?=$records->Signature?>" alt="<?=$records->Account_ID?> signature">   
  <p class="lead">
    Account ID: 
    <!-- (BITS and other orgs. Can also be used to change office names if they change name) -->
  </p>

  <input type="text" class="form-control form-control-sm" id="account-id-orig" name="account_id" value="<?=$records->Account_ID?>" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" readonly hidden>  
  <input type="text" class="form-control form-control-sm" id="account-id" name="account_id2" value="<?=$records->Account_ID?>" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

  <br>

  <p class="lead">
    Organization Name: 
    <!-- (If orgs or offices decide to change their name.)  -->
  </p>
  <input type="text" class="form-control form-control-sm" name="organization" id="org-id" value="<?=$records->Organization?>">

  <br>

  <p class="lead">
    Password: 
  </p>
  <input type="password" autocomplete="new-password" class="form-control form-control-sm" name="password" id="pass-id" value="">

  <br>

  <p class="lead">
    Representative Name: 
    <!-- (When the representative changes.) -->
  </p>
  <input type="text" class="form-control form-control-sm" name="full_name" id="rep-id" value="<?=$records->FullName?>">

  <br> 

  <p class="lead">
    Email Address: 
    <!-- (When the representative changes.) -->
  </p>
  <input type="email" class="form-control form-control-sm" name="email" id="email-id" value="<?=$records->EmailAddress?>">

  <br>       

  <p class="lead">
    Contact Number: 
    <!-- (When the representative changes.) -->
  </p>
  <input type="text" class="form-control form-control-sm" name="contact_number" id="contact-id" value="<?=$records->ContactNumber?>">

  <br>    

  <p class="lead">
    Batch: 
    <!-- (When the representative changes.) -->
  </p>
  <input type="text" class="form-control form-control-sm" name="batch" id="batch-id" value="<?=$records->Batch?>">

  <br>    

  <p class="lead">
    Type: 
    <!-- (When the representative changes.) -->
  </p>
  <select class="form-control" name="type">
    <option value="Pro" <?=$selectPro?> >Professional</option>
    <option value="NonPro" <?=$selectNonPro?> >Non-Professional</option>
    <option value="N/A" <?=$selectNA?> >N/A</option>
  </select>

  <br>    

  <p class="lead">
    Logo: 
  </p>
  <br>
  <input type="file" class="form-control form-control-sm" name="logo" id="logo-id">

  <br>
  <br>

  <p class="lead">
    Signature: 
  </p>
  <input type="file" class="form-control form-control-sm" name="signature" id="signature-id">
  <br>

  <br>      
  <br>
  <input type="submit" class="mt-5 btn btn-light btn-lg" name="submit" id="submit_btn" value="Submit">
</form>

<?php endif?>

