const hamburger = document.querySelector('#hamburger');

const nav = document.querySelector('#nav-menu');

hamburger.addEventListener("click", function(){
    nav.classList.toggle('hidden')
    hamburger.classList.toggle('hamburger-active')
});

// navbar fixed

window.onscroll = function(){
    const header = document.querySelector('header');
    const fixnav = header.offsetTop;

    if (window.pageYOffset > fixnav) {
        header.classList.add('navbar-fixed');
    } else {
        header.classList.remove('navbar-fixed');
    }
};

const close = document.querySelector('#close');
const tambahMenu = document.querySelector('#tambahMenu');

close.addEventListener("click", function(){
    tambahMenu.classList.toggle('hidden')
});

const edit = document.querySelector('#edit');
const closeEdit = document.querySelector('#closeEdit');

edit.addEventListener("click", function(){
    tambahMenu.classList.toggle('hidden')
})

$(document).ready(function () {
    $('#keyword').on('keyup', function(){
        $('#tableMenu').load('ajaxMenu.php?keyword=' + $('#keyword').val());
    });
});

// const logout = document.querySelector('#logout');
// const login = document.querySelector('#login');

// var hasLogin = 0;

// if(hasLogin === 1){
//     logout.classList.toggle('hidden');
//     login.classList.toggle('hidden');
// };

