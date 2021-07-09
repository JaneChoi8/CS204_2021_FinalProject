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
  <!-- <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" id="myModal">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="images/sw.png" alt=""><h5 class="modal-title" id="ModalCenterTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img class="img-responsive" src="" />
            </div>
            <div class="col-md-6">
              <?php
                if (isset($_POST['id'])) {
                  $product = new Product($conn);
                  $product->getProduct($_POST['id']);
                }
               ?>
              <h2><?php $productI->product['product_name'] ?></h2>
              <p><?php $productI->product['product_price'] ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="cart.php" type="button" class="btn btn-lg btn-primary mx-auto">Add to cart</a>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
$(document).ready(function () {
    $('img').on('click', function () {
        let image = $(this).attr('src');
        let com = $(this).attr('class');
        let id = $(this).attr('id');
        $('#myModal').on('show.bs.modal', function () {
            $(".img-responsive").attr("src", image);
            $('#ModalCenterTitle').text(com);
        });
    });
});

</script> -->
 <?php
   include 'includes/footer.php';
  ?>
