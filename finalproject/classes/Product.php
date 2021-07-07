<?php
  /**
   *
   */
  class Product
  {
    public $product_id;
    public $product_name;
    public $product_price;
    public $product_company;
    public $product_img;
    public $product_quantities;
    public $product = [];
    public $products = [];
    public $conn;

    function __construct($conn)
    {
      $this->conn = $conn;
    }

    public function getProduct($id)
    {
      $this->product_id = $id;
      $sql = "SELECT * FROM products WHERE ID = ?";
      $stmt = $this->conn->prepare();
      $stmt->bind_param("i", $this->product_id);
      $stmt->execute();
      $results = $stmt->get_result();
      if ($results->num_rows == 1) {
        $this->product = $results->fetch_assoc();
      }
    }

    public function getProducts()
    {
      $sql = "SELECT * FROM products";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
      $results = $stmt->get_result();
      $this->products = $results->fetch_all(MTSQLI_ASSOC);
    }

    public function updateProductQ($id, $quantities)
    {
      $this->product_id = $id;
      $this->product_quantities = $quantities;
      $sql = "UPDATE products SET quantities = ? WHERE ID = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("ii", $this->product_quantities, $this->product_id);
      $stmt->execute();
      if ($stmt->affected_rows == 1) {
        header("Location: product.php?id=".$stmt->insert_id);
      }
    }

    public function createProduct($product_name, $product_price, $product_company,$product_img, $product_quantities)
    {
      $this->product_name = $product_name;
      $this->product_price = $product_price;
      $this->product_company = $product_company;
      $this->product_quantities = $product_quantities;
      $this->product_img = $product_img;

      if ($_SESSION['user_role'] == 1) {
        $sql = "INSERT INTO products (product_name, product_price, product_company,product_img, quantities) VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdssi", $this->product_name, $this->product_price, $this->product_company,$this->product_img, $this->product_quantities);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
          header("Location: product.php?id=".$stmt->insert_id."&create=true");
        }
      }
    }

    public function deleteProducts($id)
    {
      $this->product_id = $id;
      if ($_SESSION['user_role'] == 1) {
        $sql = "DELETE FROM products WHERE ID = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $this->product_id);
        $stmt->execute();
        if ($stmt->affected_rows == 1) {
          header("Location: product.php?delete");
        }
      }
    }
  }

?>
