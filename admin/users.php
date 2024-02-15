<?php
    require '../dbconn.php';

    $stmt = $dbh->prepare("SELECT * FROM users");
    $stmt->execute();
    $users = $stmt->fetchAll();

    echo '<h1>Users</h1>';

    echo '<a href="user-create.php">Create new user</a>';

    echo '<table>';
    
    echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Country</th><th>Actions</th></tr>';
    foreach ($users as $user) {
        echo '<tr>';
        echo '<td>' . $user['id'] . '</td>';
        echo '<td>' . $user['firstname'] . '</td>';
        echo '<td>' . $user['lastname'] . '</td>';
        echo '<td>' . $user['email'] . '</td>';
        echo '<td>' . $user['country'] . '</td>';
        echo '<td>';
        echo '<a href="user-edit.php?id=' . $user['id'] . '">Edit</a> | ';
        echo '<a href="user-delete.php?id=' . $user['id'] . '">Delete</a>';
        echo '</td>';
        echo '</tr>'; }

    echo '</table>';
?>