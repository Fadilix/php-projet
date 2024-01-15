const menuAnnee = document.querySelector(".menu_annee");

document.addEventListener("DOMContentLoaded", () => {
    const currentYear = new Date().getFullYear();
    let yearsArray = [];

    for (let i = currentYear; i >= 2020; i--) {
        yearsArray.push(i);
    }

    // console.log(currentYear);
    // console.log(yearsArray);

    for (year of yearsArray) {
        menuAnnee.innerHTML += `<option value=${year} name="annee_bac">${year}</option>`;
    }
});
