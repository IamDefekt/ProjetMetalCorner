'use strict';

document.querySelectorAll('input').forEach(input => {
    const original = input.placeholder;

    input.addEventListener('focus', () => {
        input.placeholder = '';
    });

    input.addEventListener('blur', () => {
        if (input.value.trim() === "") {
            input.placeholder = original;
        }
    });
});


document.getElementById("btn").addEventListener("click", function(event) {
    event.preventDefault();
    let valid = true; 

    document.querySelectorAll("span[id^=error]").forEach(span => span.textContent = "");

    let form = document.getElementById('createAccount');
    let username = document.getElementById('username').value.trim();
    let emailAdress = document.getElementById('emailAdress').value.trim();
    let userpw = document.getElementById('userPw').value;
    let confirmPassword = document.getElementById('confirmPW').value;
    let cgu = document.getElementById('cgu');

    if (!username) {
        document.getElementById('errorUsername').textContent = "Veuillez saisir un nom d'utilisateur."
    }

    if (!emailAdress.includes("@")) {
        document.getElementById("errorMail").textContent = "Email invalide";
        valid = false;
    }

    if (userpw.length < 8 ) {
        document.getElementById("errorPw").textContent = "Le mot de passe doit avoir 8 caractères min.";
        valid = false;
    }

    if (userpw != confirmPassword) {
        document.getElementById("errorPw2").textContent = "Les mots de passe ne correspond pas.";
        valid = false;
    }

    if (!cgu.checked) {
        document.getElementById("errorCgu").textContent = "Vous devez accepter les conditions générales d'utilisation.";
        valid = false;
    }

    if (!valid) {
        return;
    }

    form.reset();

});