document.addEventListener("DOMContentLoaded", function () {
    var mySwiper = new Swiper(".mySwiper-1", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    // Initialize Swiper for the first product carousel
    var mySwiper1 = new Swiper(".swiper-2#swiper1", {
        slidesPerView: 2,
        spaceBetween: 50,
        loop: true,
        pagination:{
            el: ".swiper-pagination",
            clickable:true,
        },
        navigation:{
            nextEl: "swiper-button-next",
            prevEl: "swiper-button-prev",
        },
    });

    // Opciones de configuración del segundo carrusel de productos
    var mySwiper2 = new Swiper(".swiper-2#swiper2", {
        slidesPerView: 2,
        spaceBetween: 50,
        loop: true,
        // Otras opciones de configuración específicas para este carrusel
    });

    // Opciones de configuración del tercer carrusel de productos
    var mySwiper3 = new Swiper(".swiper-2#swiper3", {
        slidesPerView: 2,
        spaceBetween: 50,
        loop: true,
    });
    // Get all elements with the class "tabInput"
    let tabInputs = document.querySelectorAll(".tabInput");

    // Add a change event listener to each "tabInput"
    tabInputs.forEach(function (input) {
        input.addEventListener("change", function () {
            // Extract the value of the "ariaValueMax" attribute from the input element
            let id = input.ariaValueMax;

            // Create the ID of the corresponding Swiper element
            let thisSwiper = document.getElementById("swiper" + id);

            // Update the Swiper instance associated with the selected input
            thisSwiper.swiper.update();
        });
    });
});
// Variables globales 
let contentBack = null;

let contentPrimerImg = null;

let contentDescription = null;

let contentSegundaImg = null;

let contentNext = null;


window.onload = function () {
    
    contentBack = document.getElementById("contentBack");
    contentPrimerImg = document.getElementById("contentPrimerImg");
    contentDescription = document.getElementById("contentDescription");
    contentSegundaImg = document.getElementById("contentSegundaImg");
    contentNext = document.getElementById("contentNext");

    ArticulosLoad("http://localhost/Obtener.php");

}

function ArticulosLoad(endpoint) {
    fetch(endpoint)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            renderaArticulos(data);
        })
        .catch(error => console.log(error));
}

function renderaArticulos(data) {

    contentBack.innerHTML = `
    <div class="col-2">
        <button type="button" class="btn btn-primary"">Back</button>
    </div>`;

    contentPrimerImg.innerHTML = `
    <div class="col-3">
        <img src="${data.img}" alt="" class="img-fluid">
    </div>`;

    contentDescription.innerHTML = `
    <div class="col-2">
        <h2>${data.name}</h2>
        <p>${data.description}</p>
        <p>${data.precio}</p>
    </div>`;
}