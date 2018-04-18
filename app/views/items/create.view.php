<?php $page_title = "Dashboard"; ?>
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

        <!-- Main Header -->
        <?php include realpath(__DIR__ . '/../partials/header.view.php') ?>
        <!-- Left side column. contains the logo and sidebar -->
       <?php include realpath(__DIR__ . '/../partials/sidebar.view.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $page_title ?>
                    <small>Hello timolinn!</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <!-- <li class="active"><?//= $page_title ?></li> -->
                </ol>
            </section>

            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
        | Your Page Content Here |
        -------------------------->
        <div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">New Product.</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/orders/create" method="POST" role="form">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name of Product</label>
        <input type="text" class="form-control" name="product_name" id="" placeholder="Enter product name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Price per product(in naira)</label>
        <input type="number" class="form-control" name="product_price" id="exampleInputPassword1" placeholder="Enter price of product">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product Categories.</label> <em>(seperate multiple categories with a comma)</em>
        <input type="text" class="form-control" name="product_category" id="" placeholder="Enter Categories">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Number of Products in stock</label>
        <input type="number" class="form-control" name="number_in_stock" id="exampleInputPassword1" placeholder="Enter number of products available">
      </div>
      <div class="form-group">
        <label>Website.</label>
        <select class="form-control select2" name="website_id" style="width: 100%;">
          <option value="1" selected="selected">lorem.com</option>
          <option value="2">anotherlorem.com</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description.</label>
        <input type="text" class="form-control" name="description" id="exampleInputPassword1" placeholder="Short Product Description">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Product Image</label>
        <input type="file" name="image" id="exampleInputFile">

        <p class="help-block">Image size not more than <strong>1mb.</strong></p>
      <!-- </div>
      <div class="checkbox">
        <label>
          <input name="send_copy_email" type="checkbox"> Send me a copy
        .</label>
      </div> -->
    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       <?= include realpath(__DIR__ . '/../partials/footer.view.php') ?>

        <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="<?= assetload('vendor/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= assetload('vendor/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= assetload('vendor/dist/js/adminlte.min.js') ?>"></script>

    <script src="<?= assetload('assets/js/custom.js') ?>"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>

</html>