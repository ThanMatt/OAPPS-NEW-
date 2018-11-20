<?php if (is_array($records) || is_object($records)):?>

<p class="lead">
  Username: 
  <!-- (BITS and other orgs. Can also be used to change office names if they change name) -->
</p>
  
<input type="text" class="form-control form-control-sm" name="" id="account-id" value="<?=$records->Account_ID?>" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">

<br>

<p class="lead">
  Organization Name: 
  <!-- (If orgs or offices decide to change their name.)  -->
</p>
<input type="text" class="form-control form-control-sm" name="" id="org-id" value="<?=$records->Organization?>">

<br>

<p class="lead">
  Password: 
</p>
<input type="text" class="form-control form-control-sm" name="" id="pass-id" value="">

<br>

<p class="lead">
  Representative Name: 
  <!-- (When the representative changes.) -->
</p>
<input type="text" class="form-control form-control-sm" name="" id="rep-id" value="<?=$records->FullName?>">

<br>    
<p class="lead">
  Logo: 
</p>
<br>
Upload Box Here

<br>
<br>

<p class="lead">
  Signature: 
</p>
<br>
Upload Box Here

<br>      
<br>
<input type="submit" class="mt-5 btn btn-light btn-lg" name="submit" id="submit_btn" value="Submit">

<?php endif?>
