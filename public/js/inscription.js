// const form = document.querySelector("form");
const password = document.querySelector(".password");
const msg = document.querySelector(".msg");

const username = document.querySelector(".username");
const submit = document.querySelector(".submit");

// form.addEventListener("submit", (e) => {
//     e.preventDefault();
// })
submit.disabled = true;


// pas d'espace, pas de caractère spéciaux
username.addEventListener("keyup", () => {
    let motifRegex = /^[a-zA-Z0-9]+$/;
    if (!motifRegex.test(username.value) || username.value === "") {
        submit.disabled = true;
    }


})


password.addEventListener("keyup", () => {
    if (password.value.length < 8) {
        msg.innerHTML = "Le nombre minimal pour un mot de passe est de 8 caractères";
        msg.style.color = "red";
        submit.disabled = true;
    } else {
        msg.innerHTML = "";
        submit.disabled = false;
    }

    if (password.value === "") {
        submit.disabled = true;
    }
})