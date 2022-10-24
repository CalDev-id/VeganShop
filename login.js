const daftarYuk = document.querySelector("#goDaftar");
const loginYuk = document.querySelector("#goLogin");
const boxRegist = document.querySelector("#boxRegist");
const boxLogin = document.querySelector("#boxLogin");

const iconRegLog = document.querySelector("#iconRegLog img");

function showBoxLogin() {
	boxRegist.style.opacity = "0";
	iconRegLog.style.opacity = "0";
	setTimeout(() => {
		boxRegist.style.display = "none";
		boxLogin.style.display = "flex";
	}, 500);

	setTimeout(() => {
		boxLogin.style.opacity = "1";
		iconRegLog.src = "img/chef.png";
		iconRegLog.style.opacity = "1";
	}, 500);
}

function showBoxRegister() {
	boxLogin.style.opacity = "0";
	iconRegLog.style.opacity = "0";
	setTimeout(() => {
		boxLogin.style.display = "none";
		boxRegist.style.display = "flex";
	}, 500);

	setTimeout(() => {
		boxRegist.style.opacity = "1";
		iconRegLog.src = "img/vegan1.png";
		iconRegLog.style.opacity = "1";
	}, 500);
}

daftarYuk.addEventListener("click", () => {
	showBoxRegister();
});

loginYuk.addEventListener("click", () => {
	showBoxLogin();
});