let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.Links');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open');
}
function scrollToTop() {
    const scrollDuration = 2000; // задава времето в милисекунди за преминаване до началото на страницата
    const scrollStep = -window.scrollY / (scrollDuration / 100); // задава броя на превъртанията на страницата във всяка стъпка
    const scrollInterval = setInterval(() => {
        if (window.scrollY !== 0) {
            window.scrollBy(0, scrollStep);
        } else {
            clearInterval(scrollInterval);
        }
    }, 10);
}