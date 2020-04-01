const popup = document.querySelector('.full-screen');
const info = document.getElementById("info");

document.addEventListener("click", function (event) {

    if (event.target === info) {
        popup.classList.toggle('hidden');
        info.classList.toggle('close');
        info.classList.toggle('open');
    }
})