const btn = document.querySelector(".header_btn");
const menu = document.querySelector(".device_menu");


btn.addEventListener("click", () => {
		menu.classList.toggle("open");
		btn.classList.toggle("open");
		
});

menu.addEventListener("click", () => {
	menu.classList.toggle("open");
	btn.classList.toggle("open");
	
});
