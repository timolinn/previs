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
            <div class="row">
  <div class="col-md-6">
<div class="box box-primary">
    <div class="box-header">
      <h3 class="box-title">items List and Details</h3>
      <a href="<?= "/items" ?>" class="pull-right btn label-primary">All items</a>
      <span class="pull-right" style="padding:5px;">  </span>
      <a href="/items/create" class="pull-right btn label-success">+ New item</a>
    </div>

    <!-- /.box-header -->
    <div class="box-body no-padding">
      <table class="table table-condensed">
        <tr>
          <th>Details</th>
          <th>Values</th>
        </tr>
          <tr>
              <td>item Name</td>
              <td><?= $item->get('item_name')  ?></td>
          </tr>

          <tr>
              <td>item Price</td>
              <td><?= $item->get('item_price')  ?></td>
          </tr>

          <tr>
              <td>item Category</td>
              <td><?= $item->get('item_category')  ?></td>
          </tr>

          <tr>
              <td>item Description</td>
              <td><?= $item->get('description')  ?></td>
          </tr>
      </table>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
  </div>
  <!-- .col-md-6 -->
  </div>
  <div class="col-md-6">
      <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title"><?= $item->get('item_name')  ?></h3>
          <!-- /.box-header -->
          </div>

          <div class="box-body no-padding text-center">
            <!-- QRCDOE HERE!!!  -->
            <?php if ($item->get('image_path') ) { ?>
              <img src="<?= $item->get('image_path')  ?>" alt="<?= $item->get('item_name')  ?>">
            <?php } else { ?>
             <h3> No Image yet</h3>
              <a href="/items/<?=$item->get('id')?>/edit" class="btn label bg-maroon">Upload</a>
              <br><br><br>
            <?php } ?>
          </div>
  </div>
  <!-- .row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       <?= include realpath(__DIR__ . '/../partials/footer.view.php') ?>
