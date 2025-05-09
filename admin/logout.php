<?php
session_start();

if($_POST['delete'] == 'delete'){
    session_destroy();
    header('Location: ../index.php');
}