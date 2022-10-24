const close = document.querySelector('#close2');
const tambahMenu = document.querySelector('#tambahMenu2');

close.addEventListener("click", function(){
    tambahMenu.style.display='none';
});

const tambah = document.querySelector('#tambah');

tambah.addEventListener("click", function(){
    tambahMenu.style.display='block';
});