<?php

    include ("crud.php");
    $method= $_SERVER['REQUEST_METHOD'];

    // session_start();
    // if(isset($_SESSION['secret'])){
    
        if($method=="GET"){
            $json= json_encode(select());
            echo $json;
        }else if($method=="POST"){
            $data=json_decode(file_get_contents("php://input"),true);
            $query= create($data['degree'],$data['time'],$data['location']);
            if($query){
                $message=array("message"=>"Created");

                echo (json_encode($message));
            }else{
                $message=array("message"=>"Invalid Argument");
                http_response_code(403);
                echo (json_encode($message));
            }
        }else if($method=="PUT"){
            $data=json_decode(file_get_contents("php://input"),true);
            $query= update($data['id'],$data['degree'],$data['time'],$data['location']);
            if($query){
                $message=array("message"=>"Created");

                echo (json_encode($message));
            }else{
                $message=array("message"=>"Invalid Argument");
                http_response_code(403);
                echo (json_encode($message));
            }
        }else if($method=="DELETE"){
            $data=json_decode(file_get_contents("php://input"),true);
            $query= delete($data['id']);
            if($query){
                $message=array("message"=>"Created");

                 echo (json_encode($message));
            }else{
                $message=array("message"=>"Invalid Argument");
                http_response_code(403);
                echo (json_encode($message));
            }
        }
        
       
       

    // }else{
    //    http_response_code(401);
    // }

?>