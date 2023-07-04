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
//obtener elemento donde se va a renderizar el calendario 
var calendarEl = document.getElementById('calendar');
//configuracion inical para el despliegue del calendario 
var calendar = new FullCalendar.Calendar(calendarEl, {
  
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
          var elements = modal.querySelectorAll('input, select, textarea, button:not(#close,)');
          alert(info.event.textColor)
          
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
//rederizar calendario calendario
document.addEventListener('DOMContentLoaded', function() {
    calendar.render();
    
});

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

//busqueda global dropdown clientes
$("#selectClientes").select2();

//Evento click filtrar cita por usuario tabla
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

//evento change filtrar sitas por clientes
$("#selectClientes").on("change", function () {
  var id = $(this).val();
  console.log("ID: " + id);
  calendar.setOption('events', `http://127.0.0.1:8000/trainingsessions/member/${id}`);
  calendar.refetchEvents();
});

//evento click habilitar inputs y botones modal cerrar header
$(".btn-close").on("click", function () {

  var modal = document.getElementById('exampleModal');
  var elements = modal.querySelectorAll('input, select, textarea, button');

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = false;
    }
  
  });
});

//Evento click habilitar inputs y botnes modal al cerrar con boton footer
$("#btn-close").on("click", function () {

  var modal = document.getElementById('exampleModal');
  var elements = modal.querySelectorAll('input, select, textarea, button');

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = false;
    }
  
  });
});
//Obtener elementos del DOM con id start y end (datetime-local)
let datetime1 = document.getElementById('start')
let datetime2 = document.getElementById('end')
//evento input limitar end segun datetime-local start
datetime1.addEventListener('input', function() {
  var datetime1Value = new Date(datetime1.value);
  var datetime2Value = new Date(datetime2.value);
  
  if(datetime1Value>datetime2Value && datetime2Value!=null){
    datetime2.value = datetime1.value;
  }
});
//Evento input limitar datetime-local y mostrar alert de fecha invalida 
datetime2.addEventListener('input', function() {
  var datetime1Value = new Date(datetime1.value);
  var datetime2Value = new Date(datetime2.value);
  
  if (datetime1Value > datetime2Value) {
    alert('la hora de termino no puede ser menor a la hora de inicio')
    datetime2.value = datetime1.value;
  }
});
