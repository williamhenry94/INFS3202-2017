var r=255;
var g=255;
var b=255;

function generateRandomBackgroud(){
    if(r>50 || g<50|| b>100){
        g++;
        r--;
        b--;
    }else{
        randomColor();
    }
    var rgb = 'rgb('+r+','+g+','+b+')';
    document.body.style.backgroundColor = rgb;



}

function randomColor(){
    r= Math.floor(Math.random()*255);
    g= Math.floor(Math.random()*255);
    b= Math.floor(Math.random()*255);
}

document.getElementById('avator').addEventListener('click',randomColor);
setInterval(generateRandomBackgroud,100);



