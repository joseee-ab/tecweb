
document.addEventListener("DOMContentLoaded", () => {
  const formulario = document.getElementById("formulario");
  formulario.addEventListener("submit", event => {
    let formularioValido = true;
    const errores = document.getElementById("entradas").querySelectorAll(".error");
    errores.forEach(error => error.textContent = "");

    const data = new FormData(formulario);
    const nombre = (data.get("nombre") || "").trim();
    const marca = (data.get("marca") || "").trim();
    const modelo = (data.get("modelo") || "").trim();
    const precio = parseFloat(data.get("precio"));
    const detalles = (data.get("detalles") || "").trim();
    const unidades = parseInt(data.get("unidades"), 10);
    const imagen = (data.get("imagen") || "").trim();

    //VALIDACIONES
    if(nombre === "" || nombre.length > 100){
      errores[0].textContent = "Nombre invalido, requerido y no mayor a 100 caracteres)";
      formularioValido = false;
    }

    if(marca === ""){
      errores[1].textContent = "Debe eleccionar una marca";
      formularioValido = false;
    }

    const modeloRegex = /^[A-Za-z0-9]+$/;
    if(modelo === "" || !modeloRegex.test(modelo) || modelo.length > 25){
      errores[2].textContent = "Modelo inválido, debe usasrse letras o numeros";
      formularioValido = false;
    }

    if(!Number.isFinite(precio) || precio <= 99.99){
      errores[3].textContent = "Precio invalido, debe ser mayor a 99.99";
      formularioValido = false;
    }

    if(detalles.length > 250){
      errores[4].textContent = "Campo detalles demasiado largo, maximo 250 caracteres";
      formularioValido = false;
    }

    if(!Number.isFinite(unidades) || unidades < 0){
      errores[5].textContent = "Campo unidades inválido, debe ser 0 o mayor";
      formularioValido = false;
    }

    //Imagen opcional
    const imagenInput = formulario.querySelector('[name="imagen"]');
    const imagenDefecto = "img/default.png";
    imagenInput.value = imagen === "" ? imagenDefecto : imagen;

    //Si hay errores, se detiene el envío
    if(!formularioValido){
      event.preventDefault();
    }
  });
});
