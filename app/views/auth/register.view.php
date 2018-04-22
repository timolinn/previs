<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= env('APP_NAME') ?> | Login </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?= assetload("vendor/bower_components/bootstrap/dist/css/bootstrap.min.css") ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?= assetload("vendor/bower_components/font-awesome/css/font-awesome.min.css") ?>">
    <!-- Ionicons -->
    <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?= assetload("vendor/bower_components/Ionicons/css/ionicons.min.css") ?>">
    <!-- Theme style -->
    <link href="<?= assetload("vendor/dist/css/AdminLTE.min.css")?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
    <link href="<?= assetload("vendor/dist/css/skins/skin-black.min.css")?>" rel="stylesheet" type="text/css" />

    <!-- iCheck -->
  <link rel="stylesheet" href="<?= assetload('vendor/plugins/iCheck/square/blue.css') ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="/"><b>Previs</b></a>
      </div>
      <?php if ($message = pdcsession('error')) { ?>
            <ul class="alert alert-danger" style="list-style-type: none">
                      <li><?= $message ?></li>
              </ul>
            <?php } ?>
            <?php if ($message = pdcsession('success')) { ?>
            <ul class="alert alert-success" style="list-style-type: none">
                      <li><?= $message ?></li>
              </ul>
            <?php } ?>
<div class="login-box-body">
  <p class="login-box-msg">Create Account</p>

  <form action="/auth/register" method="post">
    <div class="form-group has-feedback">
      <input type="text" class="form-control" name="username" placeholder="Username">
      <span class="glyphicon glyphicon-tag form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" name="firstname" placeholder="First Name">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" name="lastname" placeholder="Last Name">
      <span class="glyphicon glyphicon-user form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="email" class="form-control" name="email" placeholder="Email">
      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="text" class="form-control" name="phonenumber" placeholder="Phone Number">
      <span class="glyphicon glyphicon-phone form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="form-group has-feedback">
      <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
    </div>
    <div class="row">
      <div class="col-xs-4">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <!-- <div class="social-auth-links text-center">
    <p>- OR -</p>
    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
      Facebook</a>
    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
      Google+</a>
  </div> -->
  <!-- /.social-auth-links -->

  <br>Already Have an Account ?
  <a href="/auth/login" class="text-center"> Sign In</a>

</div>
<!-- /.login-box-body -->
</div>
<!-- jQuery 3 -->
<script src="<?= assetload('vendor/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= assetload('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- iCheck -->
<script src="<?= assetload('vendor/plugins/iCheck/icheck.min.js')?>"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>