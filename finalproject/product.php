<?php
  include 'includes/header.php';
  include 'classes/Product.php';

  if (isset($_GET['create'])) {
    $products = new Product($conn);
    $products->getProducts();
  }

 ?>

  <div class="container mt-5">
    <p>Earrings, Bracelets, Necklaces and Rings</p>
  </div>

  <div class="container product">
    <div class="row">
      <?php foreach ($products->products as $product ): ?>
        <div class="col-md-3">
          <img src="<?php echo $product['product_img'] ?>" alt="">
          <h4><?php echo $product['product_name'] ?></h4>
          <p><?php echo $product['product_price'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>




 <?php
   include 'includes/footer.php';
  ?>
