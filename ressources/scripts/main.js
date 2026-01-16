'use strict';

// -------------- NAVBAR --------------

// MENU BURGER MOBILE

const burger = document.getElementById('menuBurger');
const menu = document.getElementById('menu');

burger.addEventListener('click', () => {
  menu.classList.toggle('open'); 
  burger.classList.toggle('open'); 
});


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


// const heart = document.querySelector("#heart path");

// heart.addEventListener('click', () => {
//   heart.classList.toggle('liked');
// });


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



// -------------- MON COMPTE --------------

// POPUP MODIF MDP 



// POPUP SUPPRESION

const popup = document.getElementById('popup-container');
const deletebtn = document.getElementById('btn2');
const confirmbtn = document.querySelector('.confirm');
const cancelbtn = document.querySelector('.cancel');

deletebtn.addEventListener('click', () => {
  popup.classList.add('open');
});

cancelbtn.addEventListener('click', () => {
  popup.classList.remove('open');
});

confirmbtn.addEventListener('click', () => {
  window.location.href = 'suppression.php';
})
