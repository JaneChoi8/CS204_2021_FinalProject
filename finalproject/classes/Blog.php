<?php
  class Blog{
    private $conn;

    public function __construct($conn){
      $this->conn = $conn;
    }

    public static function createBlog($conn, $title, $body, $img_path, $userID) {
      $stmt = $conn->prepare("INSERT INTO blogs (blog_title, blog_body, blog_img, blog_user_id) VALUES (?, ?, ?, ?)");
      $path = '';
      if ($img_path != false) $path = $img_path;
      $stmt->bind_param("sssi", $title, $body, $path, $userID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) {
        $location = "Location: blog.php?id=" . $stmt->insert_id . "&created=true";
        header($location);
      }
    }

    public static function getBlog($conn, $id){
      $stmt = $conn->prepare("SELECT * from blogs where ID = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows == 1) return $result->fetch_assoc();
      elseif ($result->num_rows == 0) return false;
    }

    public static function getBlogs($conn, $limit) {
      $stmt = $conn->prepare("SELECT * from blogs order by date_created desc limit ?");
      $stmt->bind_param("i", $limit);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function deleteBlog($conn, $id){
      $sql = "DELETE FROM blogs WHERE ID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      if ($stmt->affected_rows == 1)
        header("Location: blog.php?delete");
      else
        header("Location: blog.php?error");
    }

    public static function outputBlogs($blogs) {
      $output = '';
      foreach ($blogs as $blog) {
        $title = $blog['blog_title'];
        $body = $blog['blog_body'];
        $date = $blog['date_created'];
        $id = $blog['ID'];
        $output .=
        '<div class="col-md-6">
          <a href="blog.php?id='. $id .'"><h4 class="display-4 font-weight-bold">'. $title .'</h4></a>
          <h5 class="display-5 font-weight-light">'. $date .'</h5>
          <p>'. $body .'</p>
        </div>';
      }
      return $output;
    }

    public static function getBlogAuthor($conn, $id){
      $stmt = $conn->prepare("SELECT * from users where ID = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows == 1) return $result->fetch_assoc()['user_name'];
    }
  }
?>
