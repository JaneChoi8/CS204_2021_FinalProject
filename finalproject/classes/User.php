<?php
class User {
  public $user_id;
  public $user_name;
  public $user_email;
  public $user_hash;
  public $conn;
  public $user = [];
  public $errors = [];

  public function __construct($conn) {
    $this->conn = $conn;
  }

  public function getUsername() {
    $sql = "SELECT * FROM users WHERE user_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $this->user_name);
    $stmt->execute();
    $results = $stmt->get_result();
    if($results->num_rows == 1) {
      $this->user = $results->fetch_assoc();
    }
  }

  public function checkLogin($user_name, $password) {
    $this->user_name = $user_name;
    $this->user_password = $password;
    $this->getUsername();
    if(!empty($this->user)) {
      if(password_verify($this->user_password, $this->user['user_hash'])) {
        $this->login();
      } else {
        $this->errors['login_password'] = "Password incorrect!";
      }
    } else {
      $this->errors['login_username'] = "This username does not exist!";
    }
  }

  public function login() {
    $_SESSION['user_id'] = $this->user['ID'];
    $_SESSION['user_name'] = $this->user['user_name'];
    $_SESSION['user_role'] = $this->user['user_role'];
    $_SESSION['loggedin'] = true;
    header("Location: index.php?login=true");
  }

  public function checkNewUser($user_name, $password, $email) {
    $this->user_name = $user_name;
    $this->getUsername();
    if (!empty($this->user)) {
      $this->errors['create_username'] = "This username has already existed!";
    } else{
      $this->createAccount($user_name, $password, $email);
    }
  }

  public function createAccount($user_name, $password, $email) {
    $this->user_name = $user_name;
    $this->user_hash = password_hash($password, PASSWORD_DEFAULT);
    $this->user_email = $email;
    $stmt = $this->conn->prepare("INSERT into users (user_name, user_hash, user_email) values (?, ?, ?)");
    $stmt->bind_param("sss", $this->user_name, $this->user_hash, $this->user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($stmt->affected_rows == 1) $this->checkLogin($this->user_name, $password);
    else $this->errors['create_error'] = "Error, please try again!";;
  }

  public function updateAccount($password, $email){
    $this->user_hash = password_hash($password, PASSWORD_DEFAULT);
    $this->user_email = $email;
    $stmt = $this->conn->prepare("UPDATE users set user_hash = ?, user_email = ? where ID = ?");
    $stmt->bind_param("ssi", $this->user_hash, $this->user_email, $this->user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if($stmt->affected_rows == 1) return true;
    else $this->errors['update_error'] = "Error, please try again!";
  }

  public static function logout() {
    $_SESSION = [];
    session_destroy();
    header("Location: index.php?logout=true");
  }
}
?>
