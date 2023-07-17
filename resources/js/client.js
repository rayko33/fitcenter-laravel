import axios, { Axios }  from "axios";

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

$("#clientsSelect").select2({
    width: '100%',
    language: {
        noResults: function() {
            return "Sin resultados";
        }
    }
});
$("#flushtable").on('click',function(){
    $('#client_table tbody').empty();
})

$("#tableBody").on("click", "tr", function () {

    var id = $(this).find("td:eq(0)").text();
    console.log("ID: " + id);
  
});

$('input[name="clientfilter"]').change(function() {
    // Obtener la opción seleccionada
    let status = $('input[name="clientfilter"]:checked').val();

    // Realizar una solicitud GET al backend de Laravel para obtener los nuevos datos según la opción seleccionada
    axios.get(`http://127.0.0.1:8000/clients/status/${status}`)
      .then(function(response) {
        // Una vez que se obtengan los datos con éxito, se eliminan los datos anteriores de la tabla y reemplazarlos con los nuevos datos
        var nuevosDatos = response.data;

        // Eliminar los datos anteriores de la tabla
        $('#client_table tbody').empty();

        // Recorrer los nuevos datos y agregar filas a la tabla
        $.each(nuevosDatos, function(index, dato) {
          var status=''
          if(dato.status=='active'){
            status='Activo'
          }
          if(dato.status=='inactive'){
            status='Inactivo'
          }
          let fila = `<tr>
                            <td>${dato.id}</td>
                            <td>${dato.name} ${dato.lastname}</td>
                            <td>${dato.rut}</td>
                            <td>${status}</td>
                      </tr>`;
          $('#client_table tbody').append(fila);
        });
      })
      .catch(function(error) {
        console.error('Error al obtener los datos:', error);
      });
  });

