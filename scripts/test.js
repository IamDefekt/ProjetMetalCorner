// -------------- MON COMPTE --------------

// SWIPE MOBILE 

const container = document.querySelector('.swipe-content');
const sections = document.querySelectorAll('.swipe-section');
const title = document.querySelector('.carousel-title');
const prev = document.querySelector('.prev');
const next = document.querySelector('.next');

let index = 0;

function swipe() {
  container.style.transform = `translateX(-${index * 100}%)`;
  title.textContent = sections[index].dataset.title;
}

next.addEventListener('click', () => {
  if (index < sections.length - 1) {
    index++;
    swipe();
  }
});

prev.addEventListener('click', () => {
  if (index > 0) {
    index--;
    swipe();
  }
});

/* swipe tactile */
let startX = 0;

container.addEventListener('touchstart', e => {
  startX = e.touches[0].clientX;
});

container.addEventListener('touchend', e => {
  const delta = e.changedTouches[0].clientX - startX;

  if (Math.abs(delta) > 60) {
    if (delta < 0 && index < sections.length - 1) index++;
    if (delta > 0 && index > 0) index--;
    swipe();
  }
});