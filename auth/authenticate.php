<?php

    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];

    if($username=='wil' && $password='123'){
        $_SESSION['secret']=uniqid($username,true);
        header('Location: index.php');
    }else{
        $_SESSION['error']='Authentication Failed! Check your username and password!';
        header('Location: login.php');
    }