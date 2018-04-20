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
<div class="col-md-10 col-md-offset-1">
        <div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">You are Editing <strong><?= $item->item_name ?></strong></h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form action="/items/update" method="POST" role="form">
  <input type="hidden" name="i_id" value="<?= $item->id; ?>">
    <div class="box-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Name of Item</label>
        <input type="text" class="form-control" value="<?= $item->item_name ?>" name="name" id="" placeholder="Enter item name">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">sku.</label> <em>Optional</em>
        <input type="text" class="form-control" value="<?= $item->sku ?>" name="sku" placeholder="Short Product Description">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Price per item (in naira)</label>
        <input type="number" class="form-control" value="<?= $item->item_price ?>" name="price" placeholder="Enter price of product">
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Item Categories.</label> <em>Optional</em>
        <input type="text" class="form-control" value="<?= $item->item_category ?>" name="category" id="" placeholder="Enter Category">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Number of items in stock</label>
        <input type="number" class="form-control" value="<?= $item->number_in_stock ?>" name="number_in_stock" placeholder="Enter number of products available">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Description.</label>
        <input type="text" class="form-control" value="<?= $item->description ?>" name="description" placeholder="Short Product Description">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Percent Discount.</label>
        <input type="text" class="form-control" value="<?= $item->discount ?>" name="discount" placeholder="Short Product Description">
      </div>

      <div class="form-group">
        <label for="exampleInputFile">Product Image</label>
        <input type="file" name="image" value="<?= $item->image_path ?>" id="exampleInputFile">

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
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
</div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
       <?= include realpath(__DIR__ . '/../partials/footer.view.php') ?>
