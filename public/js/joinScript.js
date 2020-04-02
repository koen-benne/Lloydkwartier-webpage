const popup = document.querySelector('.full-screen');
const info = document.getElementById("info");

document.addEventListener("click", function (event) {
    if (event.target === info) {
            popup.classList.toggle('hidden');
            info.classList.toggle("info-open");
            info.classList.toggle("info-close");
    }
});