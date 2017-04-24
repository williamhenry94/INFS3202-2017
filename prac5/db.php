<?php


function connect(){
    // Create connection
    // you can use new mysqli or mysqli_connect
    $conn= mysqli_connect('localhost','root','root','portfolio');
    if($conn->connect_error){
        die('Connection failed: '.$conn->connect_error);
    }

    return $conn;
}
?>