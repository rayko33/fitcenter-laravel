import axios, { Axios }  from "axios";
let baseUrl =`http://127.0.0.1:8000/`

var calendarEl = document.getElementById('calendar');
//configuracion inical para el despliegue del calendario 
var calendar = new FullCalendar.Calendar(calendarEl, {
  
  locale:'es',  
  initialView: 'dayGridMonth',
  height: 'auto',
  headerToolbar: {
    left: 'dayGridMonth,timeGridWeek,timeGridDay,myCustomButton',
    center: 'title',
    right: 'prev,next' 
  },
  events:`${baseUrl}sessions/getall`,
  eventClick: function(info) {
      if(info.event.extendedProps.status=='finalizada'||info.event.extendedProps.status=='cancelada'){
          var modal = document.getElementById('sessionmodal');
      
        // Obtener todos los elementos dentro del modal que se pueden deshabilitar
          var elements = modal.querySelectorAll('button:not(#close)');
          
        // Deshabilitar todos los elementos dentro del modal
          elements.forEach(function (element) {
            if (!element.classList.contains('btn-close')) {
              element.disabled = true;
            }
          });
        $('#sessionmodal').modal('show')
      }
      console.log(JSON.stringify(info.event))   
      $('#title').text(info.event.title)
      //$('#start-update').val(info.event.start)
      $('#start').text(moment(info.event.start).format('DD-MM-YYYY HH:mm'));
      $('#end').text(moment(info.event.end).format('DD-MM-YYYY HH:mm'));
      $('#modo').text(info.event.extendedProps.mode)
      $('#idsession').text(info.event.id)
      $('#sessionmodal').modal('show')
      
    
  },
  dateClick: function(info) {
    
    $('#sessionmodal').modal('show')
    
  }

});
//rederizar calendario calendario
document.addEventListener('DOMContentLoaded', function() {
    calendar.render();
    
});

let btncancelar=document.getElementById('btn-cancelar')

btncancelar.addEventListener('click',()=>{
    let id = $('#idsession').text()

    axios.post(`${baseUrl}sessions/cancel/${id}`)
        .then((response)=>{
            console.log(JSON.stringify(response.data))
            calendar.setOption('events', `${baseUrl}sessions/getall`)
            calendar.refetchEvents()
            $('#sessionmodal').modal('hide')
        })
        .catch((error)=>{
            console.log(error)
        })

    
})