var xmlhttp= new XMLHttpRequest();
xmlhttp.onreadystatechange= function(){
    if(this.readyState==4 && this.status==200){
        var response= JSON.parse(this.responseText);
        console.log(response);
        for (var i=0; i<response.length;i++){
            var data=response[i];
            document.getElementById("education-"+(i+1)).innerHTML="<td>"+data.degree+"</td>"+
            "<td>"+data.time+"</td>"+"<td>"+data.location+"</td>";
        }
    }
};

xmlhttp.open("GET","education.php",true);
xmlhttp.send();