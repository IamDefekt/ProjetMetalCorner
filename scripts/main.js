'use strict';

// -------------- NAVBAR --------------

// MENU BURGER MOBILE

const burger = document.getElementById('menuBurger');
const menu = document.getElementById('menu');

burger.addEventListener('click', () => {
  menu.classList.toggle('open'); 
  burger.classList.toggle('open'); 
});


// const heart = document.querySelector("#heart path");

// heart.addEventListener('click', () => {
//   heart.classList.toggle('liked');
// });


//  -------------- INDEX (HOME) --------------

// CAROUSEL

const buttons = document.querySelectorAll('.btn');
const slides = document.querySelectorAll('.slide');

let autoSlideInterval;

function changeSlide(direction) {
  const activeSlide = document.querySelector('.slide.active');
  const currentIndex = [...slides].indexOf(activeSlide);

  let newIndex = currentIndex + direction;

  if (newIndex < 0) newIndex = slides.length - 1;
  if (newIndex >= slides.length) newIndex = 0;

  activeSlide.classList.remove('active');
  slides[newIndex].classList.add('active');
}

function startAutoSlide() {
  autoSlideInterval = setInterval(() => {
    changeSlide(1);
  }, 2500);
}

function resetAutoSlide() {
  clearInterval(autoSlideInterval);
  startAutoSlide();
}

buttons.forEach(button => {
  button.addEventListener('click', (e) => {
    const direction = e.target.id === 'next' ? 1 : -1;
    changeSlide(direction);
    resetAutoSlide();
  });
});

startAutoSlide();



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
