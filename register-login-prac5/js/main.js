var r=255,g=255,b=255;
function randomBackgroundColour() {
	if(r>100 || g<200 || b>100){
		r--;
		g++;
		b--;
	}else{
		randomColour();
	}
	document.querySelector('html').style.backgroundColor = 'rgb(' + r + ', ' + g + ', ' + b + ')';
	document.querySelector('html').style.color='rgb(' + g + ', ' + r + ', ' + g + ')';
}

function randomColour(){
	r=Math.round(Math.random() * 255);
	g=Math.round(Math.random() * 255);
	b=Math.round(Math.random() * 255);
}

document.getElementById('avator').addEventListener('click', randomColour);
setInterval(randomBackgroundColour, 100);
