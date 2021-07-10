<?php
  include "includes/config.php";
  include 'includes/header.php';
?>
<?php if (!isset($cart) || $cart->getCartList() == []): ?>
  <div class="cart-container mt-5" style="min-height: 70vh;">
    <div class="cart-empty">
      <div class="empty-img-wrapper text-center">
        <img src="images/m.watches.jpg" alt="">
      </div>
      <div class="btn-continue-wrapper text-center">
        <a href="index.php"><button type="button" class="btn" style="font-size: 0.9rem;">Continue shopping</button></a>
      </div>
    </div>
  </div>

<?php else: ?>
  <div class="mt-5 cart-available cart-container">
    <div class="cart-title-wrapper mt-4 pr-4">
      <div class="row">
        <div class="col-md-8 d-flex">
          <h3 class="cart-title ml-3 mt-3 mb-0" style="font-size: 1.4rem;">MY CART</h3>
          <!-- k dc xoa -->
          <button type="button" class="btn btn-link remove-all mt-3" data-toggle="modal"
            data-target="#exampleModal">Remove all</button>
          <!-- k dc xoa -->
        </div>
      </div>
    </div>
    <div class="row">
      <ul class="card-list col-md-8 pr-5">
        <!-- output cardList here -->
        <?php echo $cart->printCartList();?>
      </ul>
      <div class="summary-wrapper col-md-3">
        <div class="summary card shadow-sm mt-3" style="height: 200px;">
          <h5 class="text-center mt-2 summary-title ">Order Summary</h5>
          <div class="tax d-flex mt-4">
            <h5 class="mr-auto" style="font-weight: 100;">Tax</h5>
            <p class="mb-0" style="font-size: 0.8rem; font-weight: bold">0$</p>
          </div>
          <hr>
          <div class="total d-flex">
            <h5 class="mr-auto" style="font-weight: 100;">Total</h5>
            <!-- k dc xoa -->
            <p class="mb-0 total-price"><?php echo $cart->getTotalPrice(); ?></p>
            <!-- k dc xoa -->
          </div>
        </div>
      </div>
    </div>

  </div>
<?php endif; ?>
<?php include 'includes/footer.php'; ?>
