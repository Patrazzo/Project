// Добавяме event listener scroll на нашата страница
window.addEventListener('scroll', function() {

    var elements = document.querySelectorAll('.my-fade');
  
    // Използваме цикъл, за да добави класа active към всички елементи с клас my-text.

    for (var i = 0; i < elements.length; i++) {
      var position = elements[i].getBoundingClientRect();
  
      // Ако елемента е във видимата част на прозореца се му се добавя active.
      if (position.top < window.innerHeight && position.bottom >= 0) {
        elements[i].classList.add('active');
      }
    }
  });

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

function scrollDown() {
  window.scrollTo({
      top: 800,
      behavior: "smooth"
  });
}