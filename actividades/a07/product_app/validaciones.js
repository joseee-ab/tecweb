
function limpiarErrores() {
  document.querySelectorAll('.error').forEach(error => {
    error.textContent = '';
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const formulario = document.getElementById("product-form");

  //VALIDACIÓN INDIVIDUAL
  formulario.querySelectorAll("input, textarea").forEach((campo, index) => {
    campo.addEventListener("blur", () => validarCampo(index));
  });

  function validarCampo(index) {
    const errores = document.getElementById("entradas").querySelectorAll(".error");
    const data = new FormData(formulario);

    const nombre = (data.get("nombre") || "").trim();
    const marca = (data.get("marca") || "").trim();
    const modelo = (data.get("modelo") || "").trim();
    const precio = parseFloat(data.get("precio"));
    const detalles = (data.get("detalles") || "").trim();
    const unidades = parseInt(data.get("unidades"), 10);

    errores[index].textContent = "";

    switch (index) {
      case 0:
        if (nombre === "" || nombre.length > 100)
          errores[index].textContent = "Nombre inválido (requerido, máx. 100 caracteres)";
        break;
      case 1:
        if (marca === "")
          errores[index].textContent = "Debe seleccionar una marca";
        break;
      case 2:
        const modeloRegex = /^[A-Za-z0-9]+$/;
        if (modelo === "" || !modeloRegex.test(modelo) || modelo.length > 25)
          errores[index].textContent = "Modelo inválido (solo letras/números, máx. 25)";
        break;
      case 3:
        if (!Number.isFinite(precio) || precio <= 99.99)
          errores[index].textContent = "Precio inválido (mayor a 99.99)";
        break;
      case 4:
        if (detalles.length > 250)
          errores[index].textContent = "Detalles demasiado largos (máx. 250 caracteres)";
        break;
      case 5:
        if (!Number.isFinite(unidades) || unidades < 0)
          errores[index].textContent = "Unidades inválidas (0 o mayor)";
        break;
    }
  }

  //VALIDACIÓN GENERAL AL ENVIAR
  formulario.addEventListener("submit", event => {
    event.preventDefault();
    let valido = true;
    const errores = document.querySelectorAll(".error");
    errores.forEach(e => (e.textContent = ""));

    const data = new FormData(formulario);
    const nombre = (data.get("nombre") || "").trim();
    const marca = (data.get("marca") || "").trim();
    const modelo = (data.get("modelo") || "").trim();
    const precio = parseFloat(data.get("precio"));
    const detalles = (data.get("detalles") || "").trim();
    const unidades = parseInt(data.get("unidades"), 10);
    const imagen = (data.get("imagen") || "").trim();

    if (nombre === "" || nombre.length > 100) {
      errores[0].textContent = "Nombre inválido (requerido y máx. 100 caracteres)";
      valido = false;
    }
    if (marca === "") {
      errores[1].textContent = "Debe seleccionar una marca";
      valido = false;
    }
    const modeloRegex = /^[A-Za-z0-9]+$/;
    if (modelo === "" || !modeloRegex.test(modelo) || modelo.length > 25) {
      errores[2].textContent = "Modelo inválido (solo letras o números, máx. 25)";
      valido = false;
    }
    if (!Number.isFinite(precio) || precio <= 99.99) {
      errores[3].textContent = "Precio inválido (mayor a 99.99)";
      valido = false;
    }
    if (detalles.length > 250) {
      errores[4].textContent = "Detalles demasiado largos (máx. 250 caracteres)";
      valido = false;
    }
    if (!Number.isFinite(unidades) || unidades < 0) {
      errores[5].textContent = "Unidades inválidas (0 o mayor)";
      valido = false;
    }

    if (!valido) return;
  });
});