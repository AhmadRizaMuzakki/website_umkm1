<?php
require_once('Controllers/Page.php');

session_start();

if ($_SESSION['username'] == true) {
    if (isset($_GET['url'])) {
        $file = $_GET['url'];
    } else {
        header("Location: ?url=home");
        exit();
    }
}else{
    header("Location: ?url=login");
}

$title = strtoupper($file);
$home = new Page("$title", "$file");
$home->call();
