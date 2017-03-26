var r=255,g=255,b=255;
function randomBackgroundColour() {
	if(r>100 || g<200 || b>100){
		r--;
		g++;
		b--;
	}else{
		randomColour();
	}
	var colour = 'rgb(' + r + ', ' + g + ', ' + b + ')';

	document.body.style.backgroundColor = colour;
	document.querySelector('html').style.backgroundColor = colour;
}

function randomColour(){
	r=Math.round(Math.random() * 255);
	g=Math.round(Math.random() * 255);
	b=Math.round(Math.random() * 255);
}

document.getElementById('avator').addEventListener('click', randomColour);
setInterval(randomBackgroundColour, 100);
