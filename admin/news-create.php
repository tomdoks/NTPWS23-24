<?php
  require '../dbconn.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $target_dir   = "../news/";
      $picture_name = basename($_FILES["picture"]["name"]);
      $target_file  = $target_dir . $picture_name;
      move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);

      $stmt = $dbh->prepare("INSERT INTO news (title, description, picture, archive) VALUES (:title, :description, :picture, :archive)");
      $stmt->execute([
          ':title'       => $_POST['title'],
          ':description' => $_POST['description'],
          ':picture'     => $picture_name,
          ':archive'     => 'N',
      ]);
      header("Location: ../admin/index.php?menu=news");
      exit;
  }

  print '
  <!DOCTYPE html>
  <html>

  <head>
    <title>Create News</title>
    <style>
      body {
        font-family: Arial, sans-serif;
      }

      form {
        width: 300px;
        margin: 0 auto;
      }

      label {
        display: block;
        margin: 10px 0;
      }

      input[type="text"],
      textarea,
      input[type="file"] {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
      }

      input[type="submit"] {
        margin-top: 10px;
        padding: 10px;
        width: 100%;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
      }

      input[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
  </head>
  <body>
    <h1>Create News</h1>
    <form method="POST" enctype="multipart/form-data">
      <label>Title: <input type="text" name="title"></label>
      <label>Description: <textarea name="description"></textarea></label>
      <label>Picture: <input type="file" name="picture"></label>
      <input type="submit" value="Create News">
    </form>
    <a href="../admin/index.php?menu=news">Back to news</a>
  </body>
  </html>';
?>

