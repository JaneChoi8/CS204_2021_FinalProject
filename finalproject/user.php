<?php
  include 'classes/User.php';
  include 'includes/header.php';
  $user = new User($conn);
  $user->user_name = $_SESSION['user_name'];
  $user->user_id = $_SESSION['user_id'];
  $user->getUsername();
  $errors = $user->errors;
  $email = $user->user['user_email'];
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    if (password_verify($password, $user->user['user_hash'])) {
      if ($password == $password1)
        $user->errors['password'] = "New password cannot match current one";
      elseif ($password1 != $password2)
        $user->errors['password'] = "Password doesnot match";
      else
        $user->updateAccount($password1, $email);
    }else
      $user->errors['password'] = "Wrong current password";
  }
?>
<div class="container">
  <?php if (isset($errors) && !empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
      <?php foreach ($errors as $error): ?>
        <?php echo $error . "</br>"; ?>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
  <div class="row">
    <?php if (!$_SESSION['loggedin']): ?>
      <div class="col-md-6 offset-md-3 mt-3">
        <h2 class="display-4">Please Login</h2>
        <button type="button" name="button" class="btn btn-block btn-primary">
        <a href="login.php" style="color:white;"><i class="fas fa-sign-in-alt"></i> Create/Login Account</button></a>
      </div>
    <?php else: ?>
      <div class="col-md-6 mt-5 offset-md-3">
        <h2 class="display-5">Hello, <?php echo $_SESSION['user_name']; ?></h2>
        <form action="user.php" method="POST" enctype="multipart/form-data">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
          <label for="password">Current Password</label>
          <input type="password" name="password" class="form-control" value="" rows="10" cols="80" required>
          <label for="password1">Password</label>
          <input type="password" name="password1" class="form-control" value="" rows="10" cols="80" required>
          <label for="password2">Confirm Password</label>
          <input type="password" name="password2" class="form-control" rows="10" cols="80" required>
          <button type="submit" name="submit" class="btn btn-outline-dark btn-block"><i class="fas fa-edit"></i>Edit account</button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
