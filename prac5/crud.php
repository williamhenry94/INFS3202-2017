<?php
    include('db.php');
    function create($degree,$time,$location){
        $conn=connect();
        $sql = "INSERT INTO education (degree, time, location)
VALUES ('".$degree."', '".$time."', '".$location."')";
        
        if($conn->query($sql)){
            $conn->close();
            return true;
        }else{
            $conn->close();
            return false;
        }
        
       

    }


    function select(){
        $conn = connect();
        $sql = "SELECT * FROM education";
        $result = $conn->query($sql);
        // var_dump(connect()->query($sql));

        if($result->num_rows>0){
            $temp=array();
           
            while($row=$result->fetch_assoc()){
                
                $edu=['id'=>$row['id'],'degree'=>$row['degree'],'location'=>$row['location'],'time'=>$row['time']];
                array_push($temp,$edu);
            }
            
            $conn->close();
            return $temp;
        }else{
            $conn->close();
            return null;
        }
       
        
    }

    function delete($id){
        $conn=connect();
        $sql = "DELETE FROM education WHERE id=?";
        // echo $sql;
        if($stmt=$conn->prepare($sql)){
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $conn->close();
            return true;
        }else{
            $conn->close();
            return false;
        }
        
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
        
        if($conn->query($sql)){
            $conn->close();
            return true;
        }else{
            $conn->close();
            return false;
        }
        
        
    }