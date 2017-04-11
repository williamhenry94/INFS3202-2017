<?php

    include ("crud.php");
    $method= $_SERVER['REQUEST_METHOD'];

    session_start();
    if(isset($_SESSION['secret'])){
    // TODO fill this up with a code that handles a request from a user based on the given
    // HTTP method
        
        
       
       

    }else{
        http_response_code(401);
    }

?>