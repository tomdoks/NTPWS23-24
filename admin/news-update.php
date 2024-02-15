<?php
require '../dbconn.php';

if (isset($_GET['id'])) {
    $stmt = $dbh->prepare("SELECT * FROM news WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
    $new = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $stmt = $dbh->prepare("UPDATE news SET title = :title, description = :description, archive = :archive WHERE id = :id");
  $stmt->execute([
    ':title'       => $_POST['title'],
    ':description' => $_POST['description'],
    ':archive'     => $_POST['archive'],
    ':id'          => $_POST['id'],
  ]);
  header("Location: ../admin/index.php?menu=news");
  exit;
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Update News</title>
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
  textarea {
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
  <h1>Update News</h1>
  <form method="POST">
    <input type="hidden" name="id" value="<?php echo $new['id']; ?>">
    <label>Title: <input type="text" name="title" value="<?php echo $new['title']; ?>"></label>
    <label>Description: <textarea name="description"><?php echo $new['description']; ?></textarea></label>
    <label>Archive:
      <select name="archive">
        <option value="Y" <?php echo $new['archive'] == 'Y' ? 'selected' : ''; ?>>Y</option>
        <option value="N" <?php echo $new['archive'] == 'N' ? 'selected' : ''; ?>>N</option>
      </select>
    </label>
    <input type="submit" value="Update News">
  </form>
  <a href="../admin/index.php?menu=news">Back to news</a>

</body>

</html>