<?php
  /**
   *
   */
  class Blog
  {
    public $blog_id;
    public $blog_title;
    public $blog_body;
    public $blog_img;
    public $blog_user_id;
    public $blog = [];
    public $blogs = [];
    public $conn;

    function __construct($conn)
    {
      $this->conn = $conn;
    }

    public function getBlog($id)
    {
      $this->blog_id = $id;
      $sql = "SELECT * FROM blogs WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->blog_id);
      $stmt->execute();
      $results = $stmt->get_result();
      if ($results->num_rows == 1) {
        $this->product = $results->fetch_assoc();
      }
    }

    public function getBlogs()
    {
      $sql = "SELECT * FROM blogs";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $results = $stmt->get_result();
      if ($results->num_rows >= 1) {
        $this->product = $results->fetch_all();
      }
    }

    public function createBlog($blog_title, $blog_body, $blog_img)
    {
      $this->blog_title = $blog_title;
      $this->blog_body = $blog_body;
      $this->blog_img = $blog_img;
      $sql = "INSERT INTO blogs (blog_title, blog_body, blog_img) VALUES (?,?,?)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("sss", $this->blog_title, $this->blog_body, $this->blog_img);
      $stmt->execute();
      if ($stmt->affected_rows == 1) {
        header("Location: blog.php?id=".$stmt->insert_id."&create=true");
      }
    }

    public function deleteBlog($id)
    {
      $this->blog_id = $id;
      $sql = "DELETE FROM blogs WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $this->blog_id);
      $stmt->execute();
      if ($stmt->affected_rows == 1) {
        header("Location: blog.php?delete");
      }else {
        header("Location: blog.php?error");
      }
    }

  }

 ?>
