<?php
  include 'includes/header.php';
  include 'classes/Blog.php';
  include 'func/commentmanager.php';

  if (isset($_GET['id'])){
    $blog = Blog::getBlog($conn, $_GET['id']);
    $blog_author = Blog::getBlogAuthor($conn, $blog['blog_user_id']);
  }
?>
<hr>
  <div class="container">
    <?php if (isset($_GET['created'])): ?>
      <div class="alert alert-success" role="alert">You have created post successfully !</div>
    <?php endif; ?>
    <div class="row">
      <?php if (!isset($_GET['id'])): ?>
        <div class="row">
          <?php
            $blogs = Blog::getBlogs($conn, 50);
            echo Blog::outputBlogs($blogs);
          ?>
        <hr>
      </div>
      <?php else: ?>
        <div class="col-md-8 offset-md-2">
          <div class="text-center">
            <h2 class="display-4 font-weight-blod">Blog uploaded by </h2>
            <h2 class="display-4 font-weight-blod" style="color: red;"><em><?php echo $blog_author; ?></em></h2>
          </div>
          <?php if ($blog['blog_img'] != ''): ?>
            <img src="<?php echo $blog['blog_img']; ?>" class="img-fluid">
          <?php endif; ?>
          <h3 class="display-4 font-weight-light"><?php echo htmlspecialchars($blog['blog_title']); ?></h3>
          <h4><em><?php echo htmlspecialchars($blog['date_created']); ?></em></h4>
          <p><?php echo htmlspecialchars($blog['blog_body']); ?></p>
        </div>
        <?php if (isset($_SESSION['user_id']) && (($_SESSION['user_role'] == 1) || ($_SESSION['user_id'] == $blog['blog_user_id']))): ?>
          <div class="col-md-2">
            <a href="delete.php?id=<?php echo $_GET['id']; ?>"><button type="button" class="btn btn-outline-danger">Delete</button></a>
          </div>
      <?php endif; ?>
      <hr>
      <h2 class="display-5">Comment</h2>
      <div class="col-md-8 form">
        <div class="row comments">
          <?php
            $comments = getComments($blog['ID'], $conn);
            echo (outputComments($comments));
          ?>
        </div>
      </div>
    </div>
    <?php if (isset($_SESSION['user_id'])): ?>
      <hr>
      <h2 class="display-5">Add a comment</h2>
      <div class="col-md-8 form">
        <div class="row add-comment">
          <form class="form-control comment-form" method="POST" action="func/commentmanager.php">
            <textarea style="resize: none;" name="comment" rows="4" cols="80" class="form-control" required></textarea>
            <input name="id" type="hidden" value="<?php echo htmlspecialchars($_SERVER['QUERY_STRING']); ?>">
            <button type="submit" name="comment-submit" class="btn btn-outline-success"><i class="far fa-comment"></i> Add a comment</button>
          </form>
        </div>
      </div>
    <?php endif; ?>
    <?php endif; ?>
  </div>
<hr>
<?php include 'includes/footer.php'; ?>
