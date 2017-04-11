function sendRequest() {
    var username = document.getElementById("username").value;
    var password= document.getElementById("password").value;

    document.getElementById("form-login").addEventListener("submit",function(event){
        event.preventDefault();
    });
   
    if (username.length == 0 || password.length==0) { 
        document.getElementById("warning-message").innerHTML = "Username and password shouldn't be empty";
        
    } else {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 401) {
                
                var response= JSON.parse(this.responseText);
                document.getElementById("warning-message").innerHTML = response.message;
                
            }
            else if(this.readyState==4 && this.status==200){
                window.open("index.php","_self");
            }
        };
        var data={"username":username,"password":password};

        xmlhttp.open("POST", "authenticate.php", true);
        xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
        xmlhttp.send(JSON.stringify(data));
    }
}