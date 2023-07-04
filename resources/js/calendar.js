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
  eventClick: function(info) {
      if(info.event.extendedProps.status=='finalizada'||info.event.extendedProps.status=='cancelada'){
          var modal = document.getElementById('modaleventClick');

        // Obtener todos los elementos dentro del modal que se pueden deshabilitar
          var elements = modal.querySelectorAll('input, select, textarea, button:not(#close)');
          
          
        // Deshabilitar todos los elementos dentro del modal
          elements.forEach(function (element) {
            if (!element.classList.contains('btn-close')) {
              element.disabled = true;
            }
          
          });
        $('#modaleventClick').modal('show')
      }
      $('#titleEvent').text(info.event.title)
      $('#modaleventClick').modal('show')
      
    
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
$("#selectClientes").select2({
  width: '100%'
});

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

//evento change filtrar citas por clientes
$("#selectClientes").on("change", function () {
  var id = $(this).val()
  console.log("ID: " + id)
  calendar.setOption('events', `http://127.0.0.1:8000/trainingsessions/member/${id}`)
  calendar.refetchEvents()
});

//evento click habilitar inputs y botones modal cerrar header (modal agregar cita)
$(".btn-close").on("click", function () {

  var modal = document.getElementById('exampleModal')
  var elements = modal.querySelectorAll('input, select, textarea, button')

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = false
    }
  
  });
});

//Evento click habilitar inputs y botnes modal al cerrar con boton footer (Agregar citas)
$("#btn-close").on("click", function () {

  var modal = document.getElementById('exampleModal')
  var elements = modal.querySelectorAll('input, select, textarea, button')

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = false
    }
  
  });
});

//Habilidar botones al hacer click fuera del modal
$('#exampleModal').on('hidden.bs.modal', function () {
  // Habilitar los inputs aquí
  var modal = $('#exampleModal')
  var elements = modal.find('input, select, textarea, button').not('.btn-close')

  elements.prop('disabled', false)
});

//evento click habilitar inputs y botones modal cerrar header (Update citas)
$(".btn-close").on("click", function () {

  var modal = document.getElementById('modaleventClick')
  var elements = modal.querySelectorAll('input, select, textarea, button')

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = false
    }
  
  });
});
//evento click habilitar inputs y botones modal cerrar footer (Update citas)
$("#btn-close-update").on("click", function () {

  var modal = document.getElementById('modaleventClick')
  var elements = modal.querySelectorAll('input, select, textarea, button')

  elements.forEach(function (element) {
    if (!element.classList.contains('btn-close')) {
      element.disabled = false
    }
  
  });
});

//Habilidar botones al hacer click fuera del modal
$('#modaleventClick').on('hidden.bs.modal', function () {
  // Habilitar los inputs aquí
  var modal = $('#modaleventClick')
  var elements = modal.find('input, select, textarea, button').not('.btn-close')

  elements.prop('disabled', false)
});

//Obtener elementos del DOM con id start y end (datetime-local)
let startDate = document.getElementById('start')
let endDate = document.getElementById('end')
//evento input limitar end segun datetime-local start
startDate.addEventListener('input', function() {
  var startDateValue = new Date(startDate.value)
  var endDateValue = new Date(endDate.value)
  
  if(startDateValue>endDateValue && endDateValue!=null){
    endDate.value = startDate.value
  }
});
//Evento input limitar datetime-local y mostrar alert de fecha invalida 
endDate.addEventListener('input', function() {
  var startDateValue = new Date(startDate.value)
  var endDateValue = new Date(endDate.value)
  
  if (startDateValue > endDateValue) {
    alert('la hora de termino no puede ser menor a la hora de inicio')
    endDate.value = startDate.value
    return
  }
  if (startDateValue == endDateValue) {
    alert('la hora de termino no puede ser igual a la hora de inicio')
    endDate.value = startDate.value
    return
  }
});


// Obtén el elemento del radio check de opción grupal
let opcionGrupal = document.getElementById('radioGrupal');
// Obtén el elemento del grupo de cantidad de miembros
let cantidadMiembrosGroup = document.getElementById('membersContainer');
// Obtén el elemento del radio check de opción individual
let opcionIndividual = document.getElementById('radioIndividual');
// Agrega un evento change al radio check grupal
opcionGrupal.addEventListener('change', function() {
  // Si se selecciona la opción grupal, muestra el grupo de cantidad de miembros
  if (opcionGrupal.checked) {
    cantidadMiembrosGroup.style.display = 'block';
  } else {
    // Si se selecciona la opción individual, oculta el grupo de cantidad de miembros
    cantidadMiembrosGroup.style.display = 'none';
  }
});
// Agrega un evento change al radio check individual
opcionIndividual.addEventListener('change', function() {
  // Si se selecciona la opción individual, El elemento cantidad de miembros se oculta
  if (opcionIndividual.checked) {
    cantidadMiembrosGroup.style.display = 'none';
  }
});

$('#exampleModal').on('hidden.bs.modal', function () {
  // Restablecer los valores de los campos del formulario
  $(this).find(':input').val('');
});

// Obtén el elemento del radio check de opción grupal
let opcionGrupalUpdate = document.getElementById('radioGrupalUpdate');
// Obtén el elemento del grupo de cantidad de miembros
let cantidadMiembrosGroupUpdate = document.getElementById('membersContainerUpdate');
// Obtén el elemento del radio check de opción individual
let opcionIndividualUpdate = document.getElementById('radioIndividualUpdate');
// Agrega un evento change al radio check grupal
opcionGrupalUpdate.addEventListener('change', function() {
  // Si se selecciona la opción grupal, muestra el grupo de cantidad de miembros
  if (opcionGrupalUpdate.checked) {
    cantidadMiembrosGroupUpdate.style.display = 'block';
  } else {
    // Si se selecciona la opción individual, oculta el grupo de cantidad de miembros
    cantidadMiembrosGroupUpdate.style.display = 'none';
  }
});
// Agrega un evento change al radio check individual
opcionIndividualUpdate.addEventListener('change', function() {
  // Si se selecciona la opción individual, El elemento cantidad de miembros se oculta
  if (opcionIndividual.checked) {
    cantidadMiembrosGroupUpdate.style.display = 'none';
  }
});

$('#modaleventClick').on('hidden.bs.modal', function () {
  // Restablecer los valores de los campos del formulario
  $(this).find(':input').val('');
});

//Obtener elementos del DOM con id start y end (datetime-local)
let startUpdate = document.getElementById('start-update')
let endUpdate = document.getElementById('end-update')
//evento input limitar end segun datetime-local start
startUpdate.addEventListener('input', function() {
  var startDateValue = new Date(startUpdate.value)
  var endDateValue = new Date(endUpdate.value)
  
  if(startDateValue>endDateValue && endDateValue!=null){
    endUpdate.value = startUpdate.value
  }
});
//Evento input limitar datetime-local y mostrar alert de fecha invalida 
endUpdate.addEventListener('input', function() {
  var startDateValue = new Date(startUpdate.value)
  var endDateValue = new Date(endUpdate.value)
  
  if (startDateValue > endDateValue) {
    alert('la hora de termino no puede ser menor a la hora de inicio')
    endUpdate.value = startUpdate.value
    return
  }
  if (startDateValue.getTime()== endDateValue.getTime()) {
    alert('la hora de termino no puede ser igual a la hora de inicio')
    endUpdate.value = startUpdate.value
    return
  }
});

//busqueda global dropdown clientes
$("#selectClientesUpdate").select2({
  dropdownParent: $('#modaleventClick'),
  width: '100%'
});
