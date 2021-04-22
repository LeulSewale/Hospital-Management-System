
$( document ).ready(function() {

  $('#calendar').fullCalendar('renderEvent',event,true);
  $('#calendar').fullCalendar({
    // put your options and callbacks here
    selectable: true,
    weekends: false,
    heightL: 700,
    aspectRatio: 2,   
    defaultTimedEventDuration: '01:00:00',
    slotDuration: '01:00:00',
    slotLabelInterval: 60,
    header: {
      left:'prev, next, today',
      center: 'title',
      right: 'addEvent, month, agendaWeek, agendaDay'
    },
    themeSystem: 'bootstrap4',
    nowIndicator: true, 

    // Call script to colour each day
    // based on availability from database

    // Clicking a date pulls up form to book appt
   

    
  })
 getAppointments("d")
});
function getAppointments(mehh){
  $.ajax({
        type:"POST",
        url: '../Scripts/getappointments.php',
         dataType: 'JSON',
         data:{'meh':"test"},
        success:function(data) { 
          
              
               var events = data.events;
            console.log(data);
            $('#calendar').fullCalendar('removeEvents');
            $('#calendar').fullCalendar('addEventSource', events );
            $('#calendar').fullCalendar('rerenderEvents'); 
            $('#calendar').fullCalendar('refetchEvents');
            }      
 
    });    
}