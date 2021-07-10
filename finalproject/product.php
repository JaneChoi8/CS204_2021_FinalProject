<?php
  include 'includes/header.php';
  include 'classes/Product.php';

  $companys = ['swarovski', 'cartier', 'pandora', 'harrywinston', 'chopard', 'tiffany&co'];
  if (isset($_POST['delete'])) {
    $pro_id = $_POST['pro-id'];
    $product = new Product($conn);
    $product->deleteProduct($pro_id);
  }
 ?>

  <div class="container mt-5">
    <p>Earrings, Bracelets, Necklaces and Rings</p>
  </div>
  <?php foreach ($companys as $company): ?>
    <h3 id="<?php echo $company ?>"><?php echo strtoupper($company) ?></h3>
    <div class="container product">
      <div class="row">
        <?php
          $products = new Product($conn);
          $products->getProductsCom($company);
        ?>
        <?php foreach ($products->products as $product ): ?>
          <div class="col-md-3">
            <a href="item.php?id=<?php echo $product['ID'] ?>"><img src="<?php echo $product['product_img'] ?>" alt="" data-toggle="modal" data-target="#myModal" class="<?php echo $product['product_company'] ?>" data-product-id = <?php echo $product['ID'] ?>></a>
            <h4><?php echo $product['product_name'] ?></h4>
            <p><i class="fas fa-dollar-sign"></i> <?php echo number_format($product['product_price']) ?></p>
            <?php if ($_SESSION['loggedin'] == true): ?>
              <?php if ($_SESSION['user_role'] == 1): ?>
                <form class="" action="product.php" method="post">
                  <input type="hidden" name="pro-id" value="<?php echo $product['ID']; ?>">
                  <button type="submit" name="delete" class="btn btn-sm btn-outline-danger mt-2 mb-2">Delete</button>
                </form>
              <?php endif; ?>
            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endforeach; ?>
 <?php
   include 'includes/footer.php';
  ?>
