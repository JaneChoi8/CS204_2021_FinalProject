<?php
  include 'includes/header.php';
  include 'classes/Product.php';
  include 'func/filemanager.php';

  if (isset($_POST['create'])) {
    $error = [];
    $pro_name = $_POST['pro_name'];
    $price = $_POST['price'];
    $company = $_POST['company'];
    $quantities = $_POST['quantities'];
    $img_path = checkFile($_FILES, "image", $error);
    if (empty($error) && $img_path != false) {
      $product = new Product($conn);
      $product->createProduct($pro_name, $price, $company, $img_path, $quantities);
    }
  }
 ?>

 <div class="container mt-5">
   <div class="row">
     <div class="col-md-6 offset-3">
       <h2>Create new Product</h2>
       <form action="createpro.php" method="POST" enctype="multipart/form-data">
         <label for="pro_name">Product name</label>
         <input type="text" class="form-control" name="pro_name">
         <label for="price">Product price</label>
         <input type="number" step="0.01" min="0" class="form-control" name="price">
         <label for="company">Product company</label>
         <input type="text" class="form-control" name="company">
         <label for="quantities">Product quantities</label>
         <input type="number" class="form-control" name="quantities">
         <label for="image">Product image</label>
         <input type="file" name="image" class="form-control mt-1 mb-1" value="">
         <button type="submit" class="btn btn-outline-primary mt-3 mb-3" name="create" >Create </button>
       </form>
     </div>
   </div>
 </div>


 <?php
   include 'includes/footer.php';
  ?>
