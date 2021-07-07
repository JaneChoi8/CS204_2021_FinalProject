<?php
  include 'includes/header.php';
  include 'classes/User.php';
  if(isset($_POST['login'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user = new User($conn);
    $user->checkLogin($user_name, $user_password);
    $errors = $user->errors;
  }

  if(isset($_POST['create'])) {
    $user_name = $_POST['username'];
    $user_password = $_POST['password'];
    $user_email = $_POST['email'];
    $user = new User($conn);
    $user->checkNewUser($user_name, $user_password, $user_email);
    $errors = $user->errors;
  }
?>

 <div class="container mt-5">
   <?php if (isset($errors) && !empty($errors)): ?>
     <div class="alert alert-danger" role="alert">
       <?php foreach ($errors as $error): ?>
         <?php echo $error . "</br>"; ?>
       <?php endforeach; ?>
     </div>
   <?php endif; ?>
   <div class="row mb-5">
     <div class="col-md-6">
       <h3><i class="fa fa-plus"></i> Create Account</h3>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Enter your name..." required>
         <p class="error error-username"></p>
         <label for="password">Password</label>
         <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
         <p class="error error-password"></p>
         <label for="email">Email</label>
         <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
         <p class="error error-email"></p>
         <button type="submit" name="create" class="btn btn-block btn-success mt-3"><i class="fa fa-user"></i> Create Account</button>
       </form>
     </div>
     <div class="col-md-6">
       <h3><i class="fa fa-user"></i> Login</h3>
       <form class="" action="login.php" method="post">
         <label for="username">Username</label>
         <input type="text" name="username" class="form-control" placeholder="Enter your name..." required>
         <p class="error error-username"></p>
         <label for="password">Password</label>
         <input type="password" name="password" class="form-control" placeholder="..." required>
         <p class="error error-password"></p>
         <button type="submit" name="login" class="btn btn-block btn-success mt-3"><i class="fa fa-user"></i> Login</button>
       </form>
     </div>
   </div>
 </div>

 <?php include 'includes/footer.php'; ?>
