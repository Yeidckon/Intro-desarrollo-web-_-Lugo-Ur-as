const btnGenerar = document.getElementById("btnGenerar");
const contenedor = document.getElementById("contenedor");

btnGenerar.addEventListener("click", function () {

  // Limpiar contenido previo
  contenedor.innerHTML = "";

  // Ciclo externo: recorre cada tabla del 1 al 10
  for (let tabla = 1; tabla <= 10; tabla++) {

    // Crear tarjeta
    const card = document.createElement("div");
    card.classList.add("tabla-card");

    // Encabezado
    const header = document.createElement("div");
    header.classList.add("tabla-header");
    header.innerHTML = `
      <span class="numero">${tabla}</span>
      <span class="titulo">Tabla del ${tabla}</span>
    `;

    // Cuerpo
    const body = document.createElement("div");
    body.classList.add("tabla-body");

    // Ciclo interno: genera cada fila del 1 al 10
    for (let multiplicador = 1; multiplicador <= 10; multiplicador++) {
      const resultado = tabla * multiplicador;

      const fila = document.createElement("div");
      fila.classList.add("fila");
      fila.innerHTML = `
        <span class="op">${tabla}</span>
        <span class="signo">×</span>
        <span class="op">${multiplicador}</span>
        <span class="signo">=</span>
        <span class="result">${resultado}</span>
      `;

      body.appendChild(fila);
    }

    card.appendChild(header);
    card.appendChild(body);
    contenedor.appendChild(card);
  }
});
