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

const form = document.getElementById('createAccount');

form.addEventListener("submit", async function(event) {
    event.preventDefault();
    let valid = true; 

    document.querySelectorAll("span[id^=error]").forEach(span => span.textContent = "");
    
    let username = document.getElementById('username').value.trim();
    let emailAdress = document.getElementById('emailAdress').value.trim();
    let userpw = document.getElementById('userPw').value;
    let confirmPassword = document.getElementById('confirmPW').value;
    let cgu = document.getElementById('cgu');

    if (!username || !userpw || !confirmPassword || !emailAdress || !cgu) { document.getElementById('errorForm').textContent = "Tous les champs sont requis"; valid = false; }
    if (!username) { document.getElementById('errorUsername').textContent = "Veuillez saisir un nom d'utilisateur."; valid = false; }
    if (!emailAdress.includes("@")) { document.getElementById("errorMail").textContent = "Email invalide"; valid = false; }
    if (userpw.length < 8 ) { document.getElementById("errorPw").textContent = "Le mot de passe doit avoir 8 caractères min."; valid = false; }
    if (userpw != confirmPassword) { document.getElementById("errorPw2").textContent = "Les mots de passe ne correspondent pas."; valid = false; }
    if (!cgu.checked) { document.getElementById("errorCgu").textContent = "Vous devez accepter les CGU."; valid = false; }
    if (!valid) return;


    /* Partie PHP */

    const formData = new FormData(form);

    try {
        const response = await fetch('/ressources/php/requete.php', {
            method: 'POST',
            body: formData
    });

        const data = await response.json();

        if (!data.success && data.errors) {

            if (data.errors.username) errorUsername.textContent = data.errors.username;
            if (data.errors.email) errorMail.textContent = data.errors.email;
            if (data.errors.password) errorPw.textContent = data.errors.password;
            if (data.errors.password2) errorPw2.textContent = data.errors.password2;
            if (data.errors.cgu) errorCgu.textContent = data.errors.cgu;
            if (data.errors.global) errorForm.textContent = data.errors.global;

            return;
        }

        if (data.success && data.redirect) { window.location.href = data.redirect;
        }

    } catch (error) { console.error("Erreur réseau :", error); }
    
});