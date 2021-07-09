<?php
  include 'includes/header.php';
  include 'classes/Product.php';


 ?>

  <div class="container mt-5">
    <p>Earrings, Bracelets, Necklaces and Rings</p>
  </div>
  <h3 id="swarovski">SWAROVSKI</h3>
  <div class="container product">
    <div class="row">
      <?php
        $products = new Product($conn);
        $products->getProductsCom('SWAROVSKI');
      ?>
      <?php foreach ($products->products as $product ): ?>
        <div class="col-md-3">
          <a href="item.php?id=<?php echo $product['ID'] ?>"><img src="<?php echo $product['product_img'] ?>" alt="" data-toggle="modal" data-target="#myModal" class="<?php echo $product['product_company'] ?>" data-product-id = <?php echo $product['ID'] ?>></a>
          <h4><?php echo $product['product_name'] ?></h4>
          <p><?php echo $product['product_price'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <h3 id="cartier">CARTIER</h3>
  <div class="container product">
    <div class="row">
      <?php
        $products = new Product($conn);
        $products->getProductsCom('CARTIER');
      ?>
      <?php foreach ($products->products as $product ): ?>
        <div class="col-md-3">
          <a href="item.php?id=<?php echo $product['ID'] ?>"><img src="<?php echo $product['product_img'] ?>" alt="" data-toggle="modal" data-target="#myModal" class="<?php echo $product['product_company'] ?>" data-product-id = <?php echo $product['ID'] ?>></a>
          <h4><?php echo $product['product_name'] ?></h4>
          <p><?php echo $product['product_price'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <h3 id="pandora">PANDORA</h3>
  <div class="container product">
    <div class="row">
      <?php
        $products = new Product($conn);
        $products->getProductsCom('PANDORA');
      ?>
      <?php foreach ($products->products as $product ): ?>
        <div class="col-md-3">
          <a href="item.php?id=<?php echo $product['ID'] ?>"><img src="<?php echo $product['product_img'] ?>" alt="" data-toggle="modal" data-target="#myModal" class="<?php echo $product['product_company'] ?>" data-product-id = <?php echo $product['ID'] ?>></a>
          <h4><?php echo $product['product_name'] ?></h4>
          <p><?php echo $product['product_price'] ?></p>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  
 <?php
   include 'includes/footer.php';
  ?>
