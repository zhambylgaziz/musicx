var  time = 1000;
var slideInterval = setInterval(changeImg, time);
function changeImg(){
	document.slide.src = images[i];
		
		if(i < images.length -1){
			i++;
		} else {
			i = 0;
		}
}
window.onload = changeImg;

function next(){
	clearInterval(slideInterval);
	if(i < images.length - 1){
		i++;
	}
	else {
		i = 0;
	}
	document.slide.src = images[i];
}

function prev(){
	clearInterval(slideInterval);
	if(i == images.length - 1){
		i--;
	}
	else {
		i = images.length - 1;
	}
	document.slide.src = images[i];
}
function sliderStop() {
    clearInterval(slideInterval);
}
function sliderAuto(){
	slideInterval = setInterval(changeImg, time);
}