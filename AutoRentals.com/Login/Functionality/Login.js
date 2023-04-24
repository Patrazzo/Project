let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.Links');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}