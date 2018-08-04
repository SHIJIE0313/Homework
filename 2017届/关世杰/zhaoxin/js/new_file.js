var text1 = document.getElementById("text");
var text2 = document.getElementById("text2");
var text3 = document.getElementById("text3");
var text4 = document.getElementById("text4");
var p = document.getElementsByTagName("p");
var join = document.getElementById("join");
var buttons = document.getElementById("button");
var jump = document.getElementById("jump");

buttons.disabled = true;

function donghua1() {
	text1.style.opacity = 0;
	text1.style.transition = "2s ease all";
}

function donghua2s() {
	text2.style.opacity = 0;
	text2.style.transition = "2s ease all";
}

function donghua3s() {
	text3.style.opacity = 0;
	text3.style.transition = "2s ease all ";
}

function donghua4s() {
	text4.style.opacity = 0;
	text4.style.transition = "2s ease all";
}

function lose() {
	p[0].style.display = "none";
	p[1].style.display = "none";
	p[2].style.display = "none";
	p[3].style.display = "none";
}

function donghua2() {
	text2.style.opacity = 1;
	text2.style.transition = "2s ease all";
}

function donghua3() {
	text3.style.opacity = 1;
	text3.style.transition = "2s ease all";
}

function donghua4() {
	text4.style.opacity = 1;
	text4.style.transition = "2s ease all";
}

function donghua5() {
	buttons.disabled = false;
	join.style.opacity = 1;
	join.style.transition = "2s ease all";
}
setTimeout("donghua1()", 1);
setTimeout("donghua2()", 2000);
setTimeout("donghua2s()", 4000);
setTimeout("donghua3()", 6000);
setTimeout("donghua3s()", 8000);
setTimeout("donghua4()", 10000);
setTimeout("donghua4s()", 12000);
setTimeout("lose()", 13999);
setTimeout("donghua5()", 14000);
buttons.onclick = function() {
	location.replace("sing_up.html");
}
