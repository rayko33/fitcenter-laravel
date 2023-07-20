import axios, { Axios }  from "axios";
let baseUrl =`http://127.0.0.1:8000/`

//evento input buscar cliente en la tabla 
$("#searchInput").on("input", function () {
    var div = document.getElementById('d');
    var ancho = div.offsetWidth;
    var altura = div.offsetHeight;

    var searchTerm = $(this).val().toLowerCase();

    $("#tableBody tr").each(function () {
        var rowText = $(this).text().toLowerCase();

        if (rowText.includes(searchTerm)) {
            $(this).show();
        } else {
            $(this).hide();
        }
    });
});