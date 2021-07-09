<?php
  include 'includes/header.php';
  include 'func/filemanager.php';
  include 'classes/Blog.php';
  $errors = [];
  if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $img_path = checkFile($_FILES, "image", $errors); // return F when error, return image path when no error
    if (empty($errors) && $img_path != '') Blog::createBlog($conn, $title, $body, $img_path, $_SESSION['user_id']);
    elseif ($_FILES['img']['error'] == 4) Blog::createBlog($conn, $title, $body, false, $_SESSION['user_id']);
  }
?>
<div class="container">
  <div class="row">
    <?php if (!$_SESSION['loggedin']): ?>
      <div class="col-md-6 offset-md-3 mt-3">
        <h2 class="display-4">Please Login to Post!</h2>
        <p>Create an account or login to post the website.</p>
        <button type="button" name="button" class="btn btn-block btn-primary">
        <a href="login.php" style="color:white;"><i class="fas fa-sign-in-alt"></i> Create/Login Account</button></a>
      </div>
    <?php else: ?>
      <div class="col-md-6 mt-5 offset-md-3">
        <h2 class="display-5">Create a Post</h2>
        <form action="create.php" method="POST" enctype="multipart/form-data">
          <label for="title">Post Title</label>
          <input type="text" name="title" value="" class="form-control" placeholder="Post Title..." required>
          <label for="body">Post Content</label>
          <textarea name="body" class="form-control" rows="10" cols="80" required></textarea>
          <label for="img" class="mt-1">Choose an image (Optional)</label>
          <input type="file" name="img" class="form-control mt-1 mb-1">
          <button type="submit" name="submit" class="btn btn-outline-dark btn-block"><i class="fas fa-edit"></i>Create Post</button>
        </form>
      </div>
    <?php endif; ?>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
