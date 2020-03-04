<?php
session_start();
$session=$_SESSION;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Test Mail</title>

    <!-- Bootstrap core CSS -->
    <link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" >

    <!-- Favicons -->
    <!-- <link rel="apple-touch-icon" href="node_modules/bootstrap//assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="node_modules/bootstrap//assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="node_modules/bootstrap//assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="node_modules/bootstrap//assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="node_modules/bootstrap//assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="node_modules/bootstrap//assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="node_modules/bootstrap//assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c"> -->


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <h2><a href="../index.html"><img src="../cclogo.png" width="161" height="101" alt=""/></a></h2>
    <h2>Email Server Tester</h2>
  </div>
  <div class="row">
    <div class="col-md-8 offset-md-2 order-md-1">
      <form class="needs-validation" id="mail_form" method="post" action="sendmail.php" onsubmit="event.preventDefault()">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">SMTP Server</label>
            <input name="smtp_server" type="text" class="form-control" placeholder="" value="<?= @$session['smtp_server'];?>" required>
          </div>
          <!-- <div class="col-md-6 mb-3">
            <label for="lastName">SMTP Port</label>
            <select name="smtp_port" class="custom-select d-block w-100" required>
              <option <?= isset($session['smtp_port']) && $session['smtp_port']=='25'?'selected':'';?> value="25">25</option>
              <option <?= isset($session['smtp_port']) && $session['smtp_port']=='465'?'selected':'';?> value="465">465</option>
              <option <?= isset($session['smtp_port']) && $session['smtp_port']=='587'?'selected':'';?> value="587">587</option>
            </select>
          </div> -->
          <div class="col-md-6 mb-3">
            <label for="lastName">SMTP Port</label>
            <input name="smtp_port" type="port" class="form-control" value="<?= isset($session['smtp_port'])?$session['smtp_port']:'25';?>" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="country">Encryption</label>
            <select name="smtp_encryption" class="custom-select d-block w-100" id="country" >
              <option <?= isset($session['smtp_encryption']) && $session['smtp_encryption']==''?'selected':'';?> value="">Disabled</option>
              <option <?= isset($session['smtp_encryption']) && $session['smtp_encryption']=='tls'?'selected':'';?> value="tls">TLS</option>
              <option <?= isset($session['smtp_encryption']) && $session['smtp_encryption']=='ssl'?'selected':'';?> value="ssl">SSL</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="country">Authentication</label>
            <select name="smtp_authentication" class="custom-select d-block w-100" id="country" >
              <option <?= isset($session['smtp_authentication']) && $session['smtp_authentication']==''?'selected':'';?> value="">Disabled</option>
              <option <?= isset($session['smtp_authentication']) && $session['smtp_authentication']=='1'?'selected':'';?> value="1" selected>Enable</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">SMTP Username</label>
            <input name="smtp_username" type="text" class="form-control" placeholder="" value="<?= @$session['smtp_username']?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">SMTP Password</label>
            <input name="smtp_password" type="password" class="form-control" placeholder="" value="<?= @$session['smtp_password']?>" required>
          </div>
        </div>


        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">From Address</label>
            <input name="from" type="email" class="form-control" placeholder="" value="<?= @$session['from']?>" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">To</label>
            <input name="to" type="email" class="form-control" placeholder="" value="<?= @$session['to']?>" required>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="lastName">Subject</label>
            <input name="subject" type="text" class="form-control" placeholder="" value="<?= @$session['subject']?>" required>
          </div>
          <div class="col-md-12 mb-3">
            <label for="firstName">Body</label>
            <textarea name="body" class="form-control" placeholder="" required rows="5"><?= @$session['body']?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="firstName">Output</label>
            <textarea id="output" class="form-control" placeholder="" readonly rows="15"></textarea>
          </div>
        </div>

        <button class="btn btn-primary btn-lg btn-block" type="submit">Send Mail</button>
      </form>
    </div>
  </div>
  </div>
<script src="node_modules/jquery/dist/jquery.min.js" ></script>
<script src="node_modules/jquery-validation/dist/jquery.validate.min.js" ></script>
<script src="node_modules/sweetalert/dist/sweetalert.min.js" ></script>
<script>
    $("#mail_form").validate({
      submitHandler: function(form) {
        swal({
          title: "",
          text: "Sending...",
          icon: 'asset/image/loading.gif',
          button: false,
        });
        var $form=$(form);
        $.ajax({
          url:'sendmail.php',
          method:'post',
          data:$form.serialize(),
          success:function(response){
            $('#output').val(response);
            swal.close();
            if(response.match('Mail has been sent')){
              swal({
                title: "Success",
                text: 'Mail send successfully.',
                icon: 'success',
              });
            }else{
              swal({
                title: "Error",
                text: 'Sending Fail.',
                icon: 'error',
              });
            }
          },
          error:function(e){
            console.log(e);
            swal.close();
          }
        });
        return false;
      }
    });
</script>
</body>
</html>
