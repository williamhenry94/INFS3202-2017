<?php
    $username=$_POST['username'];
    $password=$_POST['password'];
    session_start();
    // echo $username;
    // echo $password;
    
    if($username=="wil" && $password=='123'){
        $_SESSION["username"]=$username;
        $_SESSION["password"]=$password;
        header( 'Location: index.php' ) ;
    }else{
        $_SESSION["error"]="Authentication Failed! Check your username and password again!";
        header( 'Location: login.php' ) ;
        
    }

?>