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