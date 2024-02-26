const header = document.querySelector("#header");
const contenedor = document.querySelector("#contenedor");
const body = document.querySelector("body");
let amountProduct = document.querySelector('.count-product');


window.addEventListener("scroll", function(){
    if(contenedor.getBoundingClientRect().top<10){
        header.classList.add("scroll")
    }
    else{
        header.classList.remove("scroll")
    }
})

const btnAbrirModal = document.querySelector("#btn-abrir-modal");
const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
const modal = document.querySelector("#modal");

btnAbrirModal.addEventListener("click",()=>{
    modal.showModal();
})

btnCerrarModal.addEventListener("click",()=>{
    modal.close();
})


  // Event listeners para el segundo conjunto de botón y modal (Eliminar)
  const btnAbrirModalEliminar = document.querySelector("#btn-abrir-modal-eliminar");
  const btnCerrarModalEliminar = document.querySelector("#btn-cerrar-modal-eliminar");
  const modalEliminar = document.querySelector("#modal-eliminar");

  btnAbrirModalEliminar.addEventListener("click", () => {
      modalEliminar.showModal();
  });

  btnCerrarModalEliminar.addEventListener("click", () => {
      modalEliminar.close();
  });


function carritoComprar(id) {
    // Realizar una solicitud AJAX para dirigir a una función en PHP
    fetch('carrito_comprar.php?id=' + id)
    .then(response => response.text())
    .then(data => {
        // Manejar la respuesta del servidor si es necesario
        console.log(data);
    })
    .catch(error => {
        // Manejar errores si los hay
        console.error('Error:', error);
    });
}