const informations = document.querySelector(".informations");
const links = document.querySelector(".links");
const contestInfo = document.querySelector(".contest-info");
const h1 = document.querySelector(".graduation h1");
window.addEventListener("scroll", () => {
    informations.style.transform = `scale(${1 + window.scrollY / 2000})`;
    links.style.transform = `translateY(${-window.scrollY + 10}px)`;
    contestInfo.style.transform = `translateY(${-window.scrollY + 20}px)`;
});