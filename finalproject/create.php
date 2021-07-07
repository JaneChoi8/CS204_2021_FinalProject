<?php
  include 'includes/header.php';
  include 'classes/Product.php';
  include 'func/filemanager.php';
  if (isset($_POST['create'])) {
    $error = [];
    $pro_name = $_POST['pro_name'];
    $price = $_POST['price'];
    $company = $_POST['company'];
    $quantites = $_POST['quantites'];
    $img_path = checkFile($_FILES, "image", $error);
    if (empty($error) && $img_path != false) {
      $product = new Product;
      $product->createProduct($name, $price, $company,$img, $quantities);
    }

  }
 ?>

 <div class="container mt-5">
   <div class="row">
     <div class="col-md-6 offset-3">
       <h2>Create new Product</h2>
       <form action="create.php" method="POST" enctype="multipart/form-data">
         <label for="pro_name">Product name</label>
         <input type="text" class="form-control" name="pro_name">
         <label for="price">Product price</label>
         <input type="number" class="form-control" name="price">
         <label for="company">Product company</label>
         <input type="text" class="form-control" name="company">
         <label for="quantites">Product quantites</label>
         <input type="number" class="form-control" name="quantites">
         <label for="image">Product image</label>
         <input type="file" name="image" class="form-control mt-1 mb-1" value="">
         <button type="submit" class="btn btn-outline-primary mt-3 mb-3" name="create">Create </button>
       </form>
     </div>
   </div>
 </div>


 <?php
   include 'includes/footer.php';
  ?>
