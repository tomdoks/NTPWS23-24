<?php
require '../dbconn.php';

$stmt = $dbh->prepare("SELECT * FROM news");
$stmt->execute();
$news = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html>

<head>
  <title>News</title>
</head>

<body>
  <h1>News</h1>
  <a href="news-create.php">Create News</a>
  <table>
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($news as $new) {?>
      <tr>
        <td><?php echo $new['title']; ?></td>
        <td><?php echo $new['description']; ?></td>
        <td>
          <a href="news-update.php?id=<?php echo $new['id']; ?>">Edit</a>
          <a href="news-delete.php?id=<?php echo $new['id']; ?>">Delete</a>
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
</body>

</html>