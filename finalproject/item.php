<?php
  include 'includes/header.php';
  include 'classes/Product.php';
  if (isset($_GET['id'])) {
    $item = new Product($conn);
    $item->getProduct($_GET['id']);
  }
 ?>

<div class="container-fluid item">
  <div class="row">
    <div class="col-md-7">
      <img src="<?php echo $item->product['product_img'] ?>" alt="">
    </div>
    <div class="col-md-5">
      <h2><?php echo $item->product['product_name'] ?></h2>
      <h5><?php echo $item->product['product_company'] ?></h5>
      <p class="lead"><?php echo $item->product['product_price'] ?></p>
      <a href="cart.php" type="button" class="btn btn-lg btn-primary mx-auto">Add to cart</a>
    </div>
  </div>
</div>

 <?php
   include 'includes/footer.php';
  ?>
