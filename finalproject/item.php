<?php
  include 'includes/config.php';
  include 'classes/Product.php';
  if (isset($_GET['id'])) {
    $item = new Product($conn);
    $item->getProduct($_GET['id']);
  }
  include 'includes/header.php';
 ?>

<div class="container-fluid item mt-5">
  <div class="row">
    <div class="col-md-7">
      <img src="<?php echo $item->product['product_img'] ?>" alt="">
    </div>
    <div class="col-md-5">
      <h2><?php echo $item->product['product_name'] ?></h2>
      <h5><?php echo $item->product['product_company'] ?></h5>
      <p class="lead"><i class="fas fa-dollar-sign"></i> <?php echo number_format($item->product['product_price']) ?></p>
      <button type="button" id="<?php echo $_GET['id']; ?>" class="btn btn-lg add-cart btn-primary mx-auto">Add to cart</button>
    </div>
  </div>
</div>

 <?php
   include 'includes/footer.php';
  ?>
