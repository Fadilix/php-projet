const username = document.querySelector(".username");
const password = document.querySelector(".password");
const msg = document.querySelector(".msg");
const submit = document.querySelector(".submit");

submit.disabled = true;

function isUsernameValid() {
  const usernameRegex = /^[a-zA-Z0-9_]+$/;
  return !username.value.includes(" ") || usernameRegex.test(username.value);
}

function isPasswordValid() {
  return password.value.length >= 8;
}

function updateButtonState() {
  if (isUsernameValid() && isPasswordValid()) {
    submit.disabled = false;
    msg.textContent = "";
  } else if (!isUsernameValid()) {
    submit.disabled = true;
    msg.textContent = "Le nom d'utilisateur ne doit pas contenir d'espaces ni de caractères spéciaux.";
  } else if (!isPasswordValid()) {
    submit.disabled = true;
    msg.textContent = "Le nombre de caractères du mot de passe doit être supérieur ou égal à 8.";
  }
}

username.addEventListener("keyup", updateButtonState);
password.addEventListener("keyup", updateButtonState);