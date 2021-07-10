<?php
  if (file_exists("./classes/Cart.php"))
    include "./classes/Cart.php";
  else
    include "../classes/Cart.php";

  if (file_exists("./db.php"))
    include "./db.php";
  else
    include "../db.php";

  session_start();
  if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
  }elseif(isset($_SESSION['user_id'])){
    $cart = new Cart($conn, $_SESSION['user_id']);
  }
 ?>
