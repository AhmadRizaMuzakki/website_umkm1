<?php

session_start();
require_once __DIR__ . '/admin/Config/DB.php';



$sql = "SELECT * FROM users";
$query = $pdo->prepare($sql);
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC); // Mengambil hasil query sebagai array asosiatif

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Pastikan data ditemukan dalam database
    if ($result && $email == $result['email'] && $password == $result['password']) {
        session_start(); // Pastikan sesi dimulai sebelum digunakan
        $_SESSION['username'] = $result['username'];
        $_SESSION['password'] = $password;

        header('Location: admin/index.php');
    } else {
        header('Location: login.php');
    }
    exit;
}
?>
