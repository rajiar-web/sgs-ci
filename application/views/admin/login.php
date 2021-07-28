<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=admin();?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=admin();?>dist//css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=admin();?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=admin();?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <link rel="stylesheet" href="<?=admin();?>plugins/alertifyjs/css/alertify.min.css"/>
   <link rel="stylesheet" href="<?=admin_custom_css();?>custome.css"/>
   
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>dashboard"><img src="<?=front_images();?>/logo.png" width="100%"></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?=form_open('',array("id"=>"lform","onsubmit"=>"return login()"));?>
      <div class="row">
          <div class="col-12">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Email" id="login_username" name="login_username">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <span id="login_username_error" class="validation-error"></span>
          </div>
           <div class="col-12">
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" id="login_password" name="login_password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <span id="login_password_error" class="validation-error"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <span id="spinner"><i class="fa fa-spin fa-spinner"></i></span>
            <button type="submit" class=" log-btn btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<input type="hidden" id="base" value="<?=base_url();?>">
<script src="<?=admin();?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=admin();?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=admin();?>dist/js/adminlte.min.js"></script>
<script type="text/javascript" src="<?=admin();?>plugins/alertifyjs/alertify.min.js"></script>
<script src="<?=admin_custom_js();?>login.js"></script>
<script src="<?=admin_custom_js();?>common.js"></script>


</body>

</html>