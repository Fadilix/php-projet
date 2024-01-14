const apiKey = "tGZaJokj1ePV7LfPKeuA4f3B1dYndNDsnpdp8UCV";

// rechercher les données des pays depuis l'api
const fetchAllCountries = async () => {
    try {
        const response = await fetch(`https://countryapi.io/api/all?apikey=${apiKey}`);
        const countriesData = await response.json();

        if (!countriesData) {
            console.log("Format de données incorrect");
            return;
        }

        const countriesNames = Object.keys(countriesData).map((countryCode) => countriesData[countryCode].name);
        return countriesNames.sort();

    } catch (e) {
        console.log("Erreur lors de la recherche de données:", e.message);
        return [];
    }
}


// Récupérer nationalite depuis la page html
const nationalite = document.querySelector(".nationalite");

// Inserer les données récupérés
(async () => {

    const countries = await fetchAllCountries();
    console.log(countries);


    for (let country of countries) {
        const option = document.createElement("option");
        option.value = country;
        option.tagName = "nationalite";
        option.text = country;
        nationalite.appendChild(option);
    }

})();