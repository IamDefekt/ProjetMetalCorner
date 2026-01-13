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

const toggleBtn = document.getElementById("btn-toggle");
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
