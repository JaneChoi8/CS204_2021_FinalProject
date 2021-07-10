<?php
  class Cart{
    private $conn;
    private $cartID;
    private $userID;

    public function __construct($conn, $userID){
      $this->conn = $conn;
      $this->userID = $userID;
      $stmt = $this->conn->prepare("SELECT * from cart WHERE user_id = ?");
      $stmt->bind_param("i", $userID);
      $stmt->execute();
      $result = $stmt->get_result();
      $row = $result->fetch_assoc();
      $this->cartID = $row["ID"];
    }

    public function addItemToCart($itemID){
      $stmt1 = $this->conn->prepare("SELECT * from cart where user_id = ? and product_id = ?");
      $stmt1->bind_param("ii", $this->userID, $itemID);
      $stmt1->execute();
      $result1 = $stmt1->get_result();
      if ($result1->num_rows == 0) {
        $quantity = 1;
        $stmt2 = $this->conn->prepare("INSERT into cart (user_id, product_id, quantity) values (?, ?, ?)");
        $stmt2->bind_param("iii", $this->userID, $itemID, $quantity);
        $stmt2->execute();
        if ($stmt2->affected_rows == 1) return true;
        else return false;
      }
      else return $this->increaseQuantity($itemID);
    }

    public function getCartList(){
      $stmt = $this->conn->prepare
        ("SELECT p.ID, p.product_img, p.product_name, p.product_price, p.product_company, c.quantity
        from cart c, products p
        where c.product_id = p.ID and c.user_id = ?");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function printCartList(){
      $output = '';
      $cardList = $this->getCartList();
      foreach ($cardList as $item) {
        $output .=
        "<div class='product-wrapper container card shadow p-2 m-3 d-flex align-items-center justify-content-center' href='item.php?id={$item['ID']}'>
          <div class='product d-flex h-100'>
            <div class='product-img-wrapper'>
              <img class='product-img' src='". $item['product_img'] ."' alt='product-img'>
            </div>
            <div class='product-info ml-2 d-flex align-items-center'>
              <div class='product-info-wrapper'>
                <div class='product-name-wrapper'>
                  <p class='product-name'>". $item['product_name'] ."</p>
                </div>
              </div>
            </div>
            <div class='quantity-price-wrapper d-flex align-items-center'>
              <div class='quantity-price w-100'>
                <!-- k dc xoa -->
                <div class='quantity-control rounded'>
                  <button class='quantity-btn quantity-btn-minus' data-id='". $item['ID'] ."' data-toggle='tooltip' data-placement='right' title='Decrease Quantity'>
                    <i class='bi bi-dash'></i>
                  </button>
                  <input type='number' class='quantity-input' data-id='". $item['ID'] ."' value='". $item['quantity'] ."' step='1' min='1'  name='quantity' readonly>
                  <button class='quantity-btn quantity-btn-plus' data-id='". $item['ID'] ."' data-toggle='tooltip' data-placement='right' title='Increase Quantity'>
                    <i class='bi bi-plus'></i>
                  </button>
                </div>
                <!-- k dc xoa -->
                <div class='product-price-wrapper d-flex align-items-center'>
                  <p class='product-price m-0'>". number_format($item['product_price']) ."$</p>
                </div>
              </div>
            </div>
            <!-- k dc xoa -->
            <button type='button' class='btn btn-light remove-btn' data-id='". $item['ID'] ."' data-toggle='tooltip' data-placement='right' title='Remove Item'>
              <i class='bi bi-x fa-lg'></i>
            </button>
            <!-- k dc xoa -->
          </div>
        </div>";
       }
       return $output;
    }

    public function increaseQuantity($itemID){
      $quantity = $this->getQuantity($itemID) + 1;
      $stmt = $this->conn->prepare("UPDATE cart
                                  set quantity = ?
                                  where user_id = ? and product_id = ?");
      $stmt->bind_param("iii", $quantity, $this->userID, $itemID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function decreaseQuantity($itemID){
      if ($this->getQuantity($itemID) == 1) return false;
      $quantity = $this->getQuantity($itemID) - 1;
      $stmt = $this->conn->prepare("UPDATE cart
                                  set quantity = ?
                                  where user_id = ? and product_id = ?");
      $stmt->bind_param("iii", $quantity, $this->userID, $itemID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function getQuantity($itemID){
      $stmt = $this->conn->prepare("SELECT *
                                  from cart
                                  where user_id = ? and product_id = ?");
      $stmt->bind_param("ii", $this->userID, $itemID);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_assoc();
      return $result['quantity'];
    }

    public function removeItem($itemID){
      $stmt = $this->conn->prepare
        ("DELETE
        from cart
        where user_id = ? and product_id = ?");
      $stmt->bind_param("ii", $this->userID, $itemID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function removeAll(){
      $stmt = $this->conn->prepare
        ("DELETE
        from cart
        where user_id = ?");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      if ($stmt->affected_rows == 1) return true;
      else return false;
    }

    public function getTotalQuantity(){
      $stmt = $this->conn->prepare
        ("SELECT sum(quantity) as 'totalQuantity'
        from cart
        where user_id = ?");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_assoc();

      $total = $result['totalQuantity'];
      if ($total == NULL) $total = 0;
      return $total;
    }

    public function getTotalPrice(){
      $stmt = $this->conn->prepare
        ("SELECT SUM(p.product_price*c.quantity) as 'totalPrice'
        from cart c, products p
        where c.user_id = ? and c.product_id = p.ID");
      $stmt->bind_param("i", $this->userID);
      $stmt->execute();
      $result = $stmt->get_result();
      $result = $result->fetch_assoc();
      return (number_format($result['totalPrice']) . '$');
    }
  }
?>
