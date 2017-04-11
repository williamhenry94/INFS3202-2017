$(document).ready(function(){

    var getData=function(){
        $.get("education.php",function(data){
            $("#education-history").empty();
            console.log(JSON.parse(data));
            var json= JSON.parse(data);
            for(var i=0;i<json.length;i++){
                var obj=json[i];
                $("#education-history").append(
                    "<tr>"+
                    "<td>"+obj.id+"</td>"+
                    "<td id='degree-"+obj.id+"'>"+obj.degree+"</td>"+
                    "<td id='time-"+obj.id+"'>"+obj.time+"</td>"+
                    "<td id='location-"+obj.id+"'>"+obj.location+"</td>"+
                    "<td><button class='delete' id='delete-"+obj.id+"'>delete</button><button class='edit' id='edit-"+obj.id+"'>edit</button></td>"+
                    "</tr>"
                );
            }
        });
    }
    getData();
    $("#reset").click(function(){
        console.log("reset clicked");
        $("#degree").val("");
        $("#location").val("");
        $("#time").val("");
    });

    $("#send").click(function(){
        console.log("send clicked");
        var degree=$("#degree").val();
        var time=$("#time").val();
        var location=$("#location").val();
        if(degree.length>0 && time.length>0 && location.length>0){
            
            var data={"degree":degree,"location":location,"time":time};
            $.ajax({
                url:"education.php",
                data: JSON.stringify(data),
                method:"POST",
                dataType:"json",
                success:function(){
                    getData();
                },
                complete:function(data,status){
                    if(status=="error"){
                        console.error(data.responseJSON.message);
                    }
                }
            })
           
        }
  
    });
    $(document).on('click',".delete",function(){
       console.log("delete pressed");
     
        var id=this.id.split("-");
        var obj={"id":id[1]};

        $.ajax({
            url:"education.php",
            data: JSON.stringify(obj),
            dataType:'json',
            method:"DELETE",
            contentType:"application/json;charset=UTF-8",
            complete:function(data,status){
                console.log(data);
                console.log(status);
                if(status=="success"){ 
                    getData();
                }else{
                    console.error(data.responseJSON.message);
                }

            }
        });
    });

    $(document).on('click',".edit",function(){
       console.log("edit pressed");
       
        var id=this.id.split("-");
        var degree=$("#degree-"+id[1]).html();
        var time=$("#time-"+id[1]).html();
        var location=$("#location-"+id[1]).html();
        console.log(degree);
        console.log(time);
        console.log(location);
        $("#degree-"+id[1]).html("<input name='degree' type='text' id='update-degree-"+id[1]+"' value='"+degree+"'>");
        $("#time-"+id[1]).html("<input name='time' type='text' id='update-time-"+id[1]+"' value='"+time+"'>");
        $("#location-"+id[1]).html("<input name='location' type='text' id='update-location-"+id[1]+"' value='"+location+"'>");

        $("#edit-"+id[1]).html("update");
        $("#edit-"+id[1]).attr("id","update-"+id[1]);
        $("#update-"+id[1]).click(function(){
            var degree=$("#update-degree-"+id[1]).val();
            var time=$("#update-time-"+id[1]).val();
            var location=$("#update-location-"+id[1]).val();
            console.log(degree);
            console.log(time);
            console.log(location);
            var obj={"id":id[1],"degree":degree,"time":time,"location":location};

            $.ajax({
                url:"education.php",
                data: JSON.stringify(obj),
                dataType:'json',
                method:"PUT",
                contentType:"application/json;charset=UTF-8",
                complete:function(data,status){
                    console.log(data);
                    console.log(status);
                    if(status=="success"){ 
                        getData();
                    }else{
                        console.error(data.responseJSON.message);
                    }

                }
            });
        });
        

    });


});