'use strict';


// MENU BURGER MOBILE

const burger = document.getElementById('menuBurger');
const menu = document.getElementById('menu');

burger.addEventListener('click', () => {
  menu.classList.toggle('open'); 
  burger.classList.toggle('open'); 
});


// SEARCH BAR

const loupe = document.getElementById('search');
const popupsearchbar = document.getElementById('search-container');

loupe.addEventListener('click', () => {
  popupsearchbar.classList.add('open');
})


// LIGHT/DARK MODE

const toggleBtn = document.getElementById("toggle-theme");
const body = document.body;

const savedTheme = localStorage.getItem("theme");

if (savedTheme === "dark") {
  document.body.classList.add("dark");

}

toggleBtn.addEventListener("click", () => {
  body.classList.toggle("dark");

  const theme = body.classList.contains("dark") ? "dark" : "light";
  localStorage.setItem("theme", theme);
});


//  -------------- INDEX (HOME) --------------

// const prev = document.getElementById('prev');
// const next = document.getElementById('next');
// const carousel = document.getElementById('carousel');
// const slide = document.querySelectorAll('.slide');

// let index = 0;
// let startX = 0;
// let currentX = 0;
// let isDragging = false;

// const gap = 50;
// const slideWidth = slides[0].offsetWidth + gap;
// const threshold = 50; 

// function updateCarousel() {
//     carousel.style.transition = 'transform 0.4s ease';
//     carousel.style.transform = `translateX(-${index * slideWidth}px)`;
// }

// next.addEventListener('click', () => {
//     index = (index + 1) % slides.length;
//     updateCarousel();
// });

// prev.addEventListener('click', () => {
//     index = (index - 1 + slides.length) % slides.length;
//     updateCarousel();
// });

// carousel.addEventListener('pointerdown', (e) => {
//     startX = e.clientX;
//     isDragging = true;
//     carousel.style.transition = 'none';
// });

// carousel.addEventListener('pointermove', (e) => {
//     if (!isDragging) return;

//     currentX = e.clientX;
//     const delta = currentX - startX;

//     carousel.style.transform =
//         `translateX(${-(index * slideWidth) + delta}px)`;
// });

// carousel.addEventListener('pointerup', () => {
//     if (!isDragging) return;

//     const delta = currentX - startX;

//     if (Math.abs(delta) > threshold) {
//         if (delta < 0) {
//             index = (index + 1) % slides.length;
//         } else {
//             index = (index - 1 + slides.length) % slides.length;
//         }
//     }

//     isDragging = false;
//     updateCarousel();
// });

// carousel.addEventListener('pointerleave', () => {
//     if (!isDragging) return;
//     isDragging = false;
//     updateCarousel();
// });

