<?php
  include 'includes/config.php';
  include 'includes/header.php';
 ?>

    <div class="view">
      <!-- Mask & flexbox options-->
      <div class="mask rgba-gradient align-items-center">
        <!-- Content -->
        <div class="container mt-5">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-md-6 white-text text-center text-md-left mt-xl-5 mb-5 wow fadeInLeft" data-wow-delay="0.3s">
              <h1 class="h1-responsive font-weight-bold mt-sm-5">Shopping never be that easy</h1>
              <hr class="hr-light">
              <h6 class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem repellendus quasi fuga nesciunt
              dolorum nulla magnam veniam sapiente, fugiat! Commodi sequi non animi ea dolor molestiae
              iste.</h6>
              <button type="button" name="button" class="btn btn-outline-primary"><a class="btn btn-white">Join us</a></button>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-6 col-xl-5 mt-xl-5 wow fadeInRight" data-wow-delay="0.3s">
              <img src="images/bg.png" alt="" class="img-fluid">
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Content -->
      </div>
      <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->

  <div class="container mt-3">
    <div class="row">
      <div class="col-md-6 text-center">
        <img src="images/m.watches.jpg" alt="" width="100%">
        <p class="lead">Watches for him</p>
        <a href="product.php">Shop the collection</a>
      </div>
      <div class="col-md-6 text-center">
        <img src="images/w.watches.jpg" alt="" width="100%">
        <p class="lead">Watches for her</p>
        <a href="product.php">Shop the collection</a>
      </div>
    </div>
  </div>

  <div class="container products">

  </div>

  <h2 class="mt-5">Our collaborate brands </h2>
  <div class="container mb-3">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-4">
              <a href="product.php?#pandora"><img src="images/pandora.jpg" alt=""></a>
            </div>
            <div class="col-md-4">
              <a href="product.php?#cartier"><img src="images/cartier.png" alt=""></a>
            </div>
            <div class="col-md-4">
              <a href="product.php?#harrywinston"><img src="images/harrywinston.jpg" alt=""></a>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row">
            <div class="col-md-4">
              <a href="product.php?#chopard"><img src="images/chopard.png" alt=""></a>
            </div>
            <div class="col-md-4">
              <a href="product.php?#tiffany&co"><img src="images/tiffany&co.png" alt=""></a>
            </div>
            <div class="col-md-4">
              <a href="product.php?#swarovski"><img src="images/swarovski.png" alt=""></a>
            </div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <h2 class="mt-5">OUR EXCLUSIVE E-BOUTIQUE SERVICES</h2>
  <div class="container mb-3">
    <div class="row">
      <div class="col-md-3">
        <p class="lead "> <i class="fas fa-truck-loading "></i> Delivery  <i class="fas fa-chevron-down" data-toggle="tooltip" data-html = "true" data-placement="bottom" title="Standard Delivery: 2 to 3 business days; complimentary with all orders
        Express delivery: 1 to 2 business days; complimentary with all cartier.com orders over $500 ($35 below $500)"></i></p>

      </div>
      <div class="col-md-3">
        <p class="lead"><i class="fas fa-box-open "></i> Free return & Exchanges</p>
      </div>
      <div class="col-md-3">
        <p class="lead"><i class="fas fa-map-marker-alt "></i> Buy online & Pick up in store</p>
      </div>
      <div class="col-md-3">
        <p class="lead"><i class="fas fa-gifts"></i> Free gift wrapping</p>
      </div>
    </div>
  </div>

<?php
  include 'includes/footer.php';
 ?>
