const password = document.querySelector(".password");
const msg = document.querySelector(".msg");

const username = document.querySelector(".username");
const submit = document.querySelector(".submit");

submit.disabled = true;

function isUsernameValid() {
    let motifRegex = /^[a-zA-Z0-9]+$/;
    return motifRegex.test(username.value) && !/\s/.test(username.value);
}

function isPasswordValid() {
    return password.value.length >= 8;
}

function updateSubmitButton() {
    submit.disabled = !(isUsernameValid() && isPasswordValid());
}

username.addEventListener("keyup", () => {
    updateSubmitButton();
});

password.addEventListener("keyup", () => {
    if (password.value.length < 8) {
        msg.innerHTML = "Le nombre minimal pour un mot de passe est de 8 caractères";
        msg.style.color = "red";
    } else {
        msg.innerHTML = "";
    }

    updateSubmitButton();
});