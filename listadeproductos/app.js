const header = document.querySelector("#header");
const contenedor = document.querySelector("#contenedor");
const body = document.querySelector("body");
<<<<<<< HEAD
=======
const contador = document.querySelector("contador");


>>>>>>> 512ba96e70f5fc9f0f6586efcca73340a766ba78


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
<<<<<<< HEAD
=======

let numero = 0;
contador.onclick = () => {
    contador.value = numero;
}
>>>>>>> 512ba96e70f5fc9f0f6586efcca73340a766ba78
