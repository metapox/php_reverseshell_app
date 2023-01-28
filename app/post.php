<?php
  $uploads_dir = '/var/www/app/uploads/';
  if(empty($_FILES)){
    exit('アップロードが失敗しました');
  }
  $tmp_name = $_FILES["image"]["tmp_name"];

  if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    exit('アップロードが失敗しました');
  }

  if($_FILES['image']['type'] !== "image/jpeg") {
    exit('タイプが適切ではありません。');
  }

  $name = basename($_FILES["image"]["name"]);
  $tmp_name = $_FILES["image"]["tmp_name"];
  $result = move_uploaded_file($tmp_name, $uploads_dir.$name);
  header('Location: http://localhost/uploads/'.$name);
?>
