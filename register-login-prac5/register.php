<?php
    include ("db.php");
    
    $username=$_POST['username'];
    $name = $_POST['name'];
    $password=$_POST['password'];
    $cistrong = true;
    $salt = bin2hex(openssl_random_pseudo_bytes(40,$cistrong));
    $conn = connect();
    $options = [
        'cost'=>12,
        'salt'=> $salt
    ];
    $hashed = password_hash($password,PASSWORD_BCRYPT,$options);
       
    //use prepare statement for avoiding SQL Injection
    $sql = "INSERT INTO users (username, password, name, salt)
VALUES (?,?,?,?)";

    if($stmt=$conn->prepare($sql)){
        $stmt->bind_param('ssss',$username,$hashed,$name,$salt);
        $stmt->execute();
        $conn->close();
        return true;
    }else{
        $conn->close();
        return false;
    }