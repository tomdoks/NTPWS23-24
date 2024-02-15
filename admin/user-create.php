<?php
  require '../dbconn.php';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $stmt = $dbh->prepare("INSERT INTO users (firstname, lastname, email, country, password, is_admin) VALUES (:firstname, :lastname, :email, :country, :password, :is_admin)");
      $stmt->execute([
          ':firstname' => $_POST['firstname'],
          ':lastname'  => $_POST['lastname'],
          ':email'     => $_POST['email'],
          ':country'   => $_POST['country'],
          ':password'  => password_hash($_POST['password'], PASSWORD_DEFAULT), 
          ':is_admin' => isset($_POST['is_admin']) ? 1 : 0, 
      ]);
      header("Location: ../admin/index.php?menu=users");
      exit;
  }

?>

<!DOCTYPE html>
  <html>

    <head>
      <title>Create User</title>
    </head>

    <body>
      <h1>Create User</h1>
      <a href="../admin/index.php?menu=users">Back to Users</a><br><br>

      <form method="POST">
        <label>First Name: <input type="text" name="firstname"></label><br>
        <label>Last Name: <input type="text" name="lastname"></label><br>
        <label>Email: <input type="email" name="email"></label><br>
        <label>Country: <input type="text" name="country"></label><br>
        <label>Password: <input type="password" name="password"></label><br>
        <label>Is Admin: <input type="checkbox" name="is_admin"></label><br>
        <input type="submit" value="Create User">

      </form>
    </body>

  </html>
