<?php
  function checkFile($file, $type, &$errors,$maxsize = 5000000){
    $file = $file['img'];
    $fname = $file['name'];
    $ftype = explode("/", $file['type']);
    $tmp_name = $file['tmp_name'];
    $error = $file['error'];
    $fsize = $file['size'];
    $allowed_ext = fileExt($type);

    if ($error == 0) {
      if (!in_array(end($ftype), $allowed_ext) || $type != $ftype[0]) {
        $errors['fext'] = "Only {$type} file types allowed!";
      }
      if($fsize > $maxsize) {
        $errors['fsize'] = "The file is too large.";
      }
      if(empty($errors)) {
        $new_fname = uniqid('', false) . "." . end($ftype);
        $final_path = "images/" . $new_fname;
        if(move_uploaded_file($tmp_name, $final_path)) {
          return $final_path;
        } else {
          $errors['fmove'] = "There was a problem uploading the file.";
          return false;
        }
    }
  }else {
    $errors['ferror'] = "The was an error with the file.";
  }
}

  function fileExt($type){
    if ($type == "image") {
      return ['png', 'jpeg', 'jpg', 'gif', 'webp'];
    }else{
      return ['mp4', 'avi', 'mov'];
    }
  }
 ?>
