<?php
session_start();

print '
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- End CSS -->
    <!-- meta elements -->
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="description" content="some description">
    <meta name="keywords" content="SAP, HOPP, businessman, 1972, Hoffenheim">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Hello Example">
    <meta itemprop="description" content="Some description">
    <meta itemprop="image" content="Your URL">

    <!-- Open Graph data -->
    <meta property="og:title" content="Hello Example">
    <meta property="og:type" content="article">
    <meta property="og:url" content="Your URL">
    <meta property="og:image" content="Your URL">
    <meta property="og:description" content="Some description">
    <meta property="article:tag" content="keyword 1, keyword 2, keyword 3, keyword 4, ...">

    <!-- Twitter Card data -->
    <meta name="twitter:title" content="Hello Example">
    <meta name="twitter:description" content="Some description">

    <meta name="author" content="tdokmanic@tvz.hr">
    <!-- favicon meta -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <!-- end favicon meta -->
    <!-- end meta elements -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <!-- End Google Fonts -->
    <title>SAP</title>
</head>

<body>
    <header>
        <div class="hero-image"></div>';
include 'menu.php';

print '
    </header>
    <main>';
if (isset($_SESSION['message'])) {
    print "<div style='color: green; border: 1px solid green; margin: 10px; padding: 10px;'>" . htmlspecialchars($_SESSION['message']) . "</div>";
    unset($_SESSION['message']); }

if (isset($_GET['menu'])) {
    $menu = basename($_GET['menu']);
    include $menu . '.php'; } else { include 'home.php';}

print '
    </main>
    <footer>
        <p>Copyright &copy; ' . date("Y") . ' Tomislav Dokmanić.<a href="https://github.com/tomdoks/NTPWS23-24.git"><img src="img/GitHub-Mark-Light-32px.png" title="Github"alt="Github"></a></p>
    </footer>
</body>

</html>';
?>
