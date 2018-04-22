<?php $user = \App\Models\Auth::user(); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= env('APP_NAME') ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?= assetload('vendor/bower_components/bootstrap/dist/css/bootstrap.min.css')  ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?= assetload('vendor/bower_components/font-awesome/css/font-awesome.min.css')  ?>">
    <!-- Ionicons -->
    <!-- <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" /> -->
    <link rel="stylesheet" href="<?= assetload('vendor/bower_components/Ionicons/css/ionicons.min.css') ?>">
    <!-- Theme style -->
    <link href="<?= assetload('vendor/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
    <link href="<?= assetload('vendor/dist/css/skins/skin-black.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

<header class="main-header">

  <!-- Logo -->
  <a href="/dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>PDC</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Previs</b></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">nav</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-opencart"></i>
              <span class="label label-success">0</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Your Cart</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="<?= assetload("vendor/dist/img/boxed-bg.jpg") ?>" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

              <!-- Notifications Menu -->
              <li class="dropdown notifications-menu">
                  <!-- Menu toggle button -->
                  <a href="#" class="dropdown-toggle" title="Notifications" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">10</span>
                  </a>
                  <ul class="dropdown-menu">
                      <li class="header">You have 10 notifications</li>
                      <li>
                          <!-- Inner Menu: contains the notifications -->
                          <ul class="menu">
                              <li>
                                  <!-- start notification -->
                                  <a href="#">
                                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                  </a>
                              </li>
                              <!-- end notification -->
                          </ul>
                      </li>
                      <li class="footer"><a href="#">View all</a></li>
                  </ul>
              </li>
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- The user image in the navbar-->
                      <img src="<?= assetload('vendor/dist/img/avatar.png') ?>" class="user-image" alt="User Image">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span class="hidden-xs"><?= $user->fullname() ?></span>
                  </a>
                  <ul class="dropdown-menu">
                      <!-- The user image in the menu -->
                      <li class="user-header">
                          <img src="<?= assetload('vendor/dist/img/avatar.png') ?>" class="img-circle" alt="User Image">

                          <p>
                          <?= $user->fullname() ?>
                              <small>Member since <?= $user->created_at->diffForHumans() ?></small>
                          </p>
                      </li>

                      <!-- Menu Footer-->
                      <li class="user-footer">
                          <div class="pull-left">
                              <a href="/users/<?= \App\Models\Auth::username() ?>" class="btn btn-default btn-flat">Profile</a>
                          </div>
                          <div class="pull-right">
                              <form action="/logout" method="post">
                                    <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                              </form>
                          </div>
                      </li>
                  </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <!-- <li> -->
                  <!-- <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a> -->
                  <!-- <a href="/login" class="login-menu">Login <i class="fa fa-sign-in"></i></a>
              </li>
              <li>
                <a href="/register" class="login-menu">Create Account <i class="fa fa-user-plus"></i></a>
              </li> -->
          </ul>
      </div>
  </nav>
</header>