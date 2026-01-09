'use strict';

document.querySelectorAll("input").forEach(input => {
    const original = input.placeholder;

    input.addEventListener("focus", () => {
        input.placeholder = "";
    });

    input.addEventListener("blur", () => {
        if (input.value.trim() === "") {
            input.placeholder = original;
        }
    });
});

document.getElementById("btn").addEventListener("click", function(event) {
    event.preventDefault();
    let valid = true;

    document.querySelectorAll("span[id^=error]").forEach(span => span.textContent = "");
    
    let form = document.getElementById("contactForm");
    let artist = document.getElementById("artistName").value.trim();
    let date = document.getElementById("dateConcert").value.trim();
    let place = document.getElementById("LieuConcert").value.trim();

    if (!artist || !date || !place) {
        document.getElementById("message").textContent = "Veuillez remplir tous les champs obligatoires.";
        valid = false;
    }

    if (!artist) document.getElementById('errorArtist').textContent = 'Champ Obligatoire';

    if (!date) document.getElementById('errorDate').textContent = 'Champ Obligatoire';

    if (!place) document.getElementById('errorPlace').textContent = 'Champ Obligatoire';


    if (!valid) {
        return;
    }

    document.getElementById("message").textContent = "Formulaire Envoyé.";
    
    form.reset();
})






