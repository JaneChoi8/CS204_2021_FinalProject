<?php
  if (!isset($_SESSION)) {
    session_start();
    include '../db.php';
  };
  if (isset($_POST['comment'])) {
    $stmt = $conn->prepare("INSERT INTO comments (comment_text, comment_user, comment_product) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $_POST['comment'], $_SESSION['user_id'], $_POST['id']);
    $stmt->execute();
    if ($stmt->affected_rows == 1) {
      $id = $stmt->insert_id;
      $stmt = $conn->prepare("SELECT cm.ID, cm.comment_text, u.user_name, cm.date_created
              from comments cm, users u
              where cm.comment_user = u.ID and cm.ID = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      echo json_encode($result->fetch_assoc());
    }
  };

  function getComments($post_id, $conn){
    $stmt =  $conn->prepare("SELECT cm.comment_text, u.user_name, cm.date_created
                            from comments cm, users u
                            where cm.comment_user = u.ID and cm.comment_product = ?
                            order by cm.date_created desc");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
  }

  function outputComments($comments) {
    $output = '';
    foreach ($comments as $comment) {
      $username = $comment['user_name'];
      $comment_text = $comment['comment_text'];
      $date_created = $comment['date_created'];
      $output .=
      '<div class = "col-md-8 mt-3">
      <div class="card">
        <div class="card-header">' . $username . ' | ' . $date_created . '</div>
        <div class="card-body">
          <p class="card-text">' . $comment_text . '</p>
        </div>
      </div></div>';
    }
    return $output;
  }

?>
