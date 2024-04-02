sliderContainer = document.querySelector("#film-slider")
sliderChil = sliderContainer.querySelector(".filmSlide")
btnNext = document.querySelector(".nxt-droit");
btnGauche = document.querySelector('.nxt-gauche')

let currentLeft = 0; // La position actuelle à -87px

btnNext.addEventListener('click', function() {
    const scrollAmount = 10; // Montant de défilement en pixels
    const newValScroll = currentLeft - scrollAmount;
    if (newValScroll >= -156) {
        currentLeft = newValScroll; // Incrémente la position actuelle
        sliderChil.style.left = currentLeft + 'px';
    }
});
btnGauche.addEventListener('click', function() {
    const scrollAmount = 10;
    const newValScroll = currentLeft + scrollAmount;
    if (newValScroll <= 10) {
        currentLeft = newValScroll;
        sliderChil.style.left = currentLeft + 'px';
    }

})