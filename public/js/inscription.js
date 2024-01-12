const form = document.querySelector("form");
const password = document.querySelector(".password");
const msg = document.querySelector(".msg");

// form.addEventListener("submit", (e) => {
//     e.preventDefault();
// } )

password.addEventListener("keyup", () => {
    if (password.value.length < 8) {
        msg.innerHTML = "Le nombre minimal pour un mot de passe est de 8 caractères";
        msg.style.color = "red";
    } else{
        msg.innerHTML = "";
    }
})