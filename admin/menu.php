<?php
    print '
    <nav>
    <ul>
        <li><a href="index.php?menu=users">Users</a></li>
        <li><a href="index.php?menu=news">News</a></li>';

    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['logged_in'] == true) {
            if ($_SESSION['user']['is_admin'] == 1) {
                echo '<li><a href="../index.php">Front</a></li>';
            }
            echo '<li><a href="logout.php">Logout</a></li>';
            echo '<li style="float: right;"><a href="#">Bok, ' . htmlspecialchars($_SESSION['user']['firstname']) . ' ' . htmlspecialchars($_SESSION['user']['lastname']) . '</a></li>'; }} 
    else {
        echo '<li><a href="index.php?menu=login">Login</a></li>';
        echo '<li><a href="index.php?menu=register">Register</a></li>'; }

    print '
    </ul>
    </nav>';
?>
