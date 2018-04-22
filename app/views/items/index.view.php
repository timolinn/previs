<!-- Main Header -->
<?php include realpath(__DIR__ . '/../partials/header.view.php') ?>
        <!-- Left side column. contains the logo and sidebar -->
       <?php include realpath(__DIR__ . '/../partials/sidebar.view.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content container-fluid">
            <?php if (pdcsession('error') != null) { ?>
            <ul class="alert alert-danger" style="list-style-type: none">
                      <li><?php echo pdcsession('error') ?></li>
              </ul>
            <?php } ?>
            <?php if (pdcsession('error') != null) { ?>
            <ul class="alert alert-success" style="list-style-type: none">
                      <li><?php echo pdcsession('error') ?></li>
              </ul>
            <?php } ?>
            <div class="col-md-12">
                <a href="/items/create" class="btn btn-flat  btn-success" >+ New Item</a>
                </div>
                <br><br>

            <?php if (isset($items)) {
                foreach($items as $item) {
                    ?>
            <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('<?= assetload($item->image_path) ?>') center center;height:250px;">
              <!-- <h3 class="widget-user-username">Elizabeth Pierce</h3> -->
              <!-- <h5 class="widget-user-desc">Web Designer</h5> -->
            </div>
            <div class="widget-user-image">

            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li style="padding:3%;" ><?= $item->item_name ?></span></li>
                <li style="padding:3%;">Price <span class="pull-right badge bg-aqua">₦ <?= $item->item_price ?></span></li>
                <li style="padding:3%;"><?= $item->description ?></span></li>
                <li style="padding:2%;">
                    <a href="/items/<?= $item->id ?>/edit" class="btn pull-right label bg-aqua">Edit</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
            <?php
                }
            } ?>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       <?= include realpath(__DIR__ . '/../partials/footer.view.php') ?>
