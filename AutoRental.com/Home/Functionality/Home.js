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
var slideIndex = 0;
showSlide(slideIndex);

function changeSlide(n) {
  showSlide(slideIndex += n);
}

function showSlide(n) {
  var slides = document.getElementsByClassName("slide");
  
  if (n >= slides.length) {
    slideIndex = 0;
  } else if (n < 0) {
    slideIndex = slides.length - 1;
  }
  
  for (var i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  
  slides[slideIndex].style.display = "block";
}