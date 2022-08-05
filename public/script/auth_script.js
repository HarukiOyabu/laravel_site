const auth_btn = document.querySelector(".auth_header_btn");
const auth_menu = document.querySelector(".auth_device_menu");


auth_btn.addEventListener("click", () => {
		auth_menu.classList.toggle("open");
		auth_btn.classList.toggle("open");
		
});

auth_menu.addEventListener("click", () => {
	auth_menu.classList.toggle("open");
	auth_btn.classList.toggle("open");
	
});
