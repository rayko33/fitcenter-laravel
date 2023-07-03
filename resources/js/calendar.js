import { GetAllEvents } from "./CalendarData";
import axios, { Axios }  from "axios";
function showLoader() {
  // Mostrar loader
  var loader = document.getElementById("loader");
  loader.style.display = "block";
}

function hideLoader() {
  // Ocultar loader
  var loader = document.getElementById("loader");
  loader.style.display = "none";
}

var calendarEl = document.getElementById('calendar');
var calendar = new FullCalendar.Calendar(calendarEl, {
  themeSystem: 'bootstrap5',
  locale:'es',  
  initialView: 'dayGridMonth',
  height: 'auto',
  headerToolbar: {
    left: 'dayGridMonth,timeGridWeek,timeGridDay',
    center: 'title',
    right: 'prev,next' 
  },
  events: `http://127.0.0.1:8000/trainingsessions/`,
  dateClick: function(info) {
    var day = info.date.getDay();
    
    // Verifica si el día no está permitido (por ejemplo, domingo)
    if (day === 0) {
      // No permite la selección
      return false;
    }
    
    // Permite la selección para los demás días
    return true;
  },
  eventClick: function(info) {
      if(info.event.extendedProps.status=='finalizada'||info.event.extendedProps.status=='cancelada'){
          var modal = document.getElementById('exampleModal');

        // Obtener todos los elementos dentro del modal que se pueden deshabilitar
          var elements = modal.querySelectorAll('input, select, textarea, button:not(#close)');
          
        // Deshabilitar todos los elementos dentro del modal
          elements.forEach(function (element) {
            if (!element.classList.contains('btn-close')) {
              element.disabled = true;
            }
          
          });
        $('#exampleModal').modal('show')
      }
      
      // Obtener el modal por su ID
      $('#exampleModal').modal('show')
    // change the border color just for fun
    info.el.style.borderColor = 'red';
  },
  dateClick: function(info) {
    
    $('#exampleModal').modal('show')
    
  }

});

document.addEventListener('DOMContentLoaded', function() {
    calendar.render();
    
});

  
 /* $('.card').click(function() {
    var cardId = $(this).attr('value');
    //calendar.setOption('events', `http://127.0.0.1:8000/trainingsessions/${cardId}`)
    //calendar.refetchEvents();
    console.log('ID de la tarjeta:', cardId);
  });*/

  $("#searchInput").on("input", function () {
    var div = document.getElementById('d');
    var ancho = div.offsetWidth;
    var altura = div.offsetHeight;

    console.log("Ancho: " + ancho + "px");
    console.log("Altura: " + altura + "px");
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

$("#selectClientes").select2();

$("#tableBody").on("click", "tr", function () {

  var id = $(this).find("td:eq(0)").text();
  console.log("ID: " + id);
  //showLoader()
  axios.get(`http://127.0.0.1:8000/trainingsessions/member/${id}`)
                .then(function (response) {
                    // Manipular los datos recibidos
                    
                    console.log("Datos recibidos:", response.data);
                    calendar.setOption('events', response.data);
                    calendar.refetchEvents();
                })
                .catch(function (error) {
                    // Manejar errores si corresponde
                    console.log("Error:", error);
                })
                .finally(function () {
                    // Ocultar loader al completar la solicitud
                    //hideLoader();
                });

  //calendar.setOption('events', `http://127.0.0.1:8000/trainingsessions/member/${id}`)
  //calendar.refetchEvents();

});


$("#selectClientes").on("change", function () {
  var id = $(this).val();
  console.log("ID: " + id);
  calendar.setOption('events', `http://127.0.0.1:8000/trainingsessions/member/${id}`);
  calendar.refetchEvents();
});


$(".btn-close").on("click", function () {

  var modal = document.getElementById('exampleModal');
  var elements = modal.querySelectorAll('input, select, textarea, button');

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = true;
    }
  
  });
});

$("#btn-close").on("click", function () {

  var modal = document.getElementById('exampleModal');
  var elements = modal.querySelectorAll('input, select, textarea, button');

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = true;
    }
  
  });
});