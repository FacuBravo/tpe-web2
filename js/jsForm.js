let selectAutor = document.querySelector("#selectAutor").addEventListener("change", autor);

function autor() {
    let nombre = document.querySelector("#nombreAutor");
    let descripcion = document.querySelector("#descripcionAutor");
    if (document.querySelector("#selectAutor").value == "otro") {
        nombre.classList.remove("oculto");
        descripcion.classList.remove("oculto");
        nombre.required = true;
        descripcion.required = true;
    }

    else {
        nombre.classList.add("oculto");
        descripcion.classList.add("oculto");
        nombre.required = false;
        descripcion.required = false;
    }
}