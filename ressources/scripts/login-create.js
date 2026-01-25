'use strict';

    document.querySelectorAll('input').forEach(input => {
        const original = input.placeholder;
        input.addEventListener('focus', () => input.placeholder = '');
        input.addEventListener('blur', () => {
            if (input.value.trim() === "") input.placeholder = original;
        });
    });

// Creation de compte

    const signupForm = document.getElementById('createAccount');

    if (signupForm) {
        signupForm.addEventListener("submit", async function(event) {
            event.preventDefault();

            document.querySelectorAll("span[id^=error]").forEach(span => span.textContent = "");

            const username = document.getElementById('createUser').value.trim();
            const email = document.getElementById('createEmail').value.trim();
            const mdp = document.getElementById('createPW').value;
            const confirmMdp = document.getElementById('confirmPW').value;
            const cgu = document.getElementById('cgu');
            let valid = true;

            if (!username || !mdp || !confirmMdp || !email) {
                document.getElementById('errorForm').textContent = "Tous les champs sont requis";
                valid = false;
            }

            if (!username) {
                document.getElementById('errorUsername').textContent = "Veuillez saisir un nom d'utilisateur.";
                valid = false;
            }

            if (!email.includes("@")) {
                document.getElementById("errorMail").textContent = "Email invalide";
                valid = false;
            }

            if (mdp.length < 8) { 
                document.getElementById("errorPw").textContent = "Le mot de passe doit avoir 8 caractères min.";
                valid = false;
            }

            if (mdp !== confirmMdp) { 
                document.getElementById("errorPw2").textContent = "Les mots de passe ne correspondent pas.";
                valid = false;
            }

            if (!cgu.checked) {
                document.getElementById("errorCgu").textContent = "Vous devez accepter les CGU.";
                valid = false;
            }

            if (!valid) return;

            // PHP
            const formData = new FormData(signupForm);
            formData.append('action', 'signup');
            formData.append('email', email);
            formData.append('password', password);


            try {
                const response = await fetch('/ressources/php/requete.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (!data.success && data.errors) {
                    if (data.errors.username) document.getElementById('errorUsername').textContent = data.errors.username;
                    if (data.errors.email)    document.getElementById('errorMail').textContent = data.errors.email;
                    if (data.errors.password) document.getElementById('errorPw').textContent = data.errors.password;
                    if (data.errors.password2) document.getElementById('errorPw2').textContent = data.errors.password2;
                    if (data.errors.cgu)      document.getElementById('errorCgu').textContent = data.errors.cgu;
                    if (data.errors.global)   document.getElementById('errorForm').textContent = data.errors.global;
                    return;
                }

                if (data.success && data.redirect) {
                    window.location.href = data.redirect;
                }

            } catch (error) {
                console.error("Erreur réseau :", error);
            }
        });
    }    

// Connexion

    const loginForm  = document.getElementById('login');

    if (loginForm) {
        loginForm.addEventListener("submit", async function(event) {
            event.preventDefault();

            document.querySelectorAll("span[id^=error]").forEach(span => span.textContent = "");

            const email = document.getElementById('loginEmail').value.trim();
            const mdp    = document.getElementById('loginPw').value;

            if (!email || !mdp) {
                document.getElementById('errorLogin').textContent = "L'adresse email et le mot de passe sont requis.";
                return;
            }

            const formData = new FormData(loginForm);
            formData.append('action', 'login');
            formData.append('email', email);
            formData.append('password', password);


            try {
                const response = await fetch('/ressources/php/requete.php', {
                    method: 'POST',
                    body: formData
                });

                const data = await response.json();

                if (!data.success && data.errors) {
                    if (data.errors.global) document.getElementById('errorLogin').textContent = data.errors.global;
                    return;
                }

                if (data.success && data.redirect) {
                    window.location.href = data.redirect;
                }

            } catch (error) {
                console.error("Erreur réseau :", error);
            }
        });
    }
