<?php
  session_start();
  if (!isset($_SESSION['loggedin'])) {
    $_SESSION['loggedin'] = false;
  }
  include 'db.php';
 ?>
<!doctype html>
<html lang="en-us">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bright like a diamond</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header>
    <!-- fixed-top | sticky-top | fixed-bottom -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container ">
            <a class="navbar-brand " href="#"><i class="far fa-gem"></i>Jewellery</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <?php if ($_SESSION['loggedin'] == true): ?>
                      <?php if ($_SESSION['user_role'] == 1): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="createpro.php">Create Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="createbl.php">Create Blog</a>
                        </li>
                      <?php endif; ?>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav float-right">
                  <?php if (!$_SESSION['loggedin']): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log in</a>
                    </li>
                  <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="user.php"><?php echo $_SESSION['user_name']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log out</a>
                    </li>
                  <?php endif; ?>
                    <li class="nav_item">
                      <a class="nav-link" href="#"><i class="fas fa-cart-plus"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>
