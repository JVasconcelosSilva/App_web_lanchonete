function abreMenu(){
	document.getElementsByClassName("menu")[0].classList.remove("menuClosed")
	document.getElementsByClassName("menu")[0].classList.add("menuOpened");
	document.getElementsByClassName("mobile_btn")[0].setAttribute("onclick","fechaMenu();");
	document.getElementsByClassName("mobile_btn")[0].classList.add("active");
}

function fechaMenu(){
	document.getElementsByClassName("menu")[0].classList.remove("menuOpened")
	document.getElementsByClassName("menu")[0].classList.add("menuClosed");
	document.getElementsByClassName("mobile_btn")[0].setAttribute("onclick","abreMenu();");
	document.getElementsByClassName("mobile_btn")[0].classList.remove("active");
}