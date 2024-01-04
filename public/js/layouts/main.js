document.querySelector('.menu_btn').addEventListener('click',toggleMenu);

function toggleMenu(e){
    subheader = document.querySelector(".sub_header");
    subheader.classList.toggle("hidden");
}
