<?php $page_title = "Dashboard"; ?>
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
        <!-- @yield('content') -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       <?= include realpath(__DIR__ . '/../partials/footer.view.php') ?>
