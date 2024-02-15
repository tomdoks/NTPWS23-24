<?php
  require '../dbconn.php';

  if (isset($_GET['id'])) {
      $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id");
      $stmt->execute([':id' => $_GET['id']]);
      $user = $stmt->fetch();
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $stmt = $dbh->prepare("UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, country = :country, is_admin = :is_admin WHERE id = :id");
      $stmt->execute([
          ':firstname' => $_POST['firstname'],
          ':lastname'  => $_POST['lastname'],
          ':email'     => $_POST['email'],
          ':country'   => $_POST['country'],
          ':is_admin'  => isset($_POST['is_admin']) ? 1 : 0,
          ':id' => $_POST['id'],
      ]);
      header("Location: ../admin/index.php?menu=users");
      exit;
  }

?>

<!DOCTYPE html>
  <html>

  <head>
    <title>Edit User</title>
  </head>

  <body>
    <h1>Edit User</h1>
    <a href="/admin/index.php?menu=users">Back to Users</a><br><br>
    <form method="POST">
      <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
      <label>First Name: <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>"></label><br>
      <label>Last Name: <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>"></label><br>
      <label>Email: <input type="email" name="email" value="<?php echo $user['email']; ?>"></label><br>
      <label>Country: <input type="text" name="country" value="<?php echo $user['country']; ?>"></label><br>
      <label>Is Admin: <input type="checkbox" name="is_admin" <?php echo $user['is_admin'] ? 'checked' : ''; ?>></label><br>
      <input type="submit" value="Update User">
    </form>
  </body>

</html>