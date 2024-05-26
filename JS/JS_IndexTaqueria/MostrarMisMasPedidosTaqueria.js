
function mostrarMisMasPedidos() {

    var divLoMasPedido = document.getElementById("divLoMasPedido");

    if (divLoMasPedido !== null) {
        divLoMasPedido.addEventListener("click", function () {

            const CategoriaTexto = document.getElementById("categoria_maspedido");
            if(CategoriaTexto !== null){
                const CategoriaText = document.getElementById("categoria_maspedido").textContent;
                const Categoria = CategoriaText.replace("Categoría: ", "");
                const href = "#" +  Categoria;
                window.location.href = href;
            }
        });
    }

    var divMasPopular = document.getElementById("MasPopular");

    if (divMasPopular !== null) {
        divMasPopular.addEventListener("click", function () {

            const CategoriaTexto = document.getElementById("categoria_maspopular");
            if(CategoriaTexto !== null){
                const CategoriaText = document.getElementById("categoria_maspopular").textContent;
                const Categoria = CategoriaText.replace("Categoría: ", "");
                const href = "#" +  Categoria;
                window.location.href = href;
            }
        });
    }
}