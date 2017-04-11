<?php
    include('db.php');
    function create($degree,$time,$location){
        $conn=connect();
        $sql = "INSERT INTO education (degree, time, location)
VALUES ('".$degree."', '".$time."', '".$location."')";
        
        // execute a query to the database for insert
        
       

    }


    function select(){
        $conn = connect();
        $sql = "SELECT * FROM education";
        // execute a query to the database for select and return the result
        
        
    }

    function delete($id){
        $conn=connect();
        $sql = "DELETE FROM education WHERE id='".$id."'";
        // echo $sql;
        // execute a query to the database for delete
        
    }

    function update($id,$degree=null,$time=null,$location=null){
        // echo($degree);
        // echo($time);
        // echo($location);
        $conn=connect();
        $sql = "UPDATE education";
        $set=array('SET');
        if($degree!=null){
            if(count($set)>0){
                array_pop($set);
                $sql=$sql." SET degree='".$degree."'";
            }else{
                $sql=$sql.", degree='".$degree."'";
            }
            
        }

        if($time!=null){
            if(count($set)>0){
                array_pop($set);
                $sql=$sql." SET time='".$time."'";
            }else{
                $sql=$sql.", time='".$time."'";
            }
        }

        if($location!=null){
            if(count($set)>0){
                array_pop($set);
                $sql=$sql." SET location='".$location."'";
            }else{
                $sql=$sql.", location='".$location."'";
            }
        }
       
        $sql=$sql." WHERE id='".$id."'";
        // echo ($sql);
        // execute a query to the database for update
        
    }