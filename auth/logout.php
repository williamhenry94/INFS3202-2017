<?php
    session_start();

    if(isset($_SESSION['username'])&& isset($_SESSION['password'])){
        session_destroy();
        header('Location: login.php');
    }else{
        header('Location: login.php');
    }
?>