<?php
    include ("db.php");
    session_start();
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn = connect();
    
    $sql = "SELECT * FROM users where username='".$username."'";
    $result = $conn->query($sql);
       

    if($result->num_rows>0){
        $temp=array();
        
        while($row=$result->fetch_assoc()){
            
            $temp['user_id']=$row['user_id'];
            $temp['name']=$row['name'];
            $temp['username']=$row['username'];
            $temp['password']=$row['password'];
            $temp['salt']=$row['salt'];
            
        }
        $conn->close();

        $options = [
            'cost'=>12,
            'salt'=> $temp['salt']
        ];
        $hashed = password_hash($password,PASSWORD_BCRYPT,$options);
        if($hashed == $temp['password']){
            $_SESSION['secret']=uniqid($username,true);
            header('Location: index.php');
        }else{
            $_SESSION['error']='Authentication Failed! Check your username and password!';
            
            header('Location: login.php');
            // print_r($temp);
            // print_r($hashed);
        }
        
        
    }else{
        $conn->close();
        
    }
    