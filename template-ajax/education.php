<?php
    session_start();
    if(isset($_SESSION['secret'])){
        
       $bachelor=["degree"=>"Bachelor","time"=>"2013-2016","location"=>"Queensland, Australia"];
       $master=["degree"=>"Master","time"=>"2017-Now","location"=>"Queensland, Australia"];
       $array=array();
       array_push($array,$bachelor);
       array_push($array,$master);
       $json= json_encode($array);
       return $json;

    }else{
        header('Location: login.php');
    }

?>