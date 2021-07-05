<?php include 'includes/header.php'; ?>

<div class="container mt-5">
   <?php if (isset($errors) && !empty($errors)): ?>
     <div class="alert alert-danger" role="alert">
       <?php foreach ($errors as $error): ?>
         <?php echo $error . "</br>"; ?>
       <?php endforeach; ?>
     </div>
   <?php endif; ?>
   <div class="col-md-4 offset-md-2">
       <h3><i class="fa fa-user"></i> Login</h3>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Enter your name..." required>
         <p class="error error-username"></p>
         <label for="password">Password</label>
         <input type="password" name="password" class="form-control" placeholder="..." required>
         <p class="error error-password"></p>
         <button type="submit" name="login" class="btn btn-block btn-success"><i class="fa fa-user"></i> Login</button>
       </form>
     </div>
 </div>
<?php include 'includes/footer.php'; ?>
