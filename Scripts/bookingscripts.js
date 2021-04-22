/**
 * Return time duration between the first and second day as a floored number
 * @param first first day used for comparison
 * @param second second day used for comparison
 * @return the floor of the duration between first and second
 */
function daysBetween(first, second) {

    // Copy date parts of the timestamps, discarding the time parts.
    var one = new Date(first.getFullYear(), first.getMonth(), first.getDate());
    var two = new Date(second.getFullYear(), second.getMonth(), second.getDate());

    // Do the math.
    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    var millisBetween = two.getTime() - one.getTime();
    var days = millisBetween / millisecondsPerDay;

    // Round down.
    return Math.floor(days);
}
var events=[];
$(document).ready(function() {
 update_selections("doctors","`Doctor_ID`,`FullName`","sel_doc");

 update_selections_nurse("nurses","`Nurse_ID`,`FullName`","sel_nurse");
  update_pselections("Users","`UserId`,`Name`","patients_sel");

  var doc =new URLSearchParams(window.location.search);
  
  // page is now ready, initialize the calendar...
  //closeForm();        // jank but works
  var today= new Date;
  var hour =today.getHours();
  var event;
  var id = 0;
  event= {id, title: 'appointment'+id, start: new Date()};
  $('#calendar').fullCalendar('renderEvent',event,true);
  $('#calendar').fullCalendar({
    selectable: true,
   
    // put your options and callbacks here
    weekends: false,
    heightL: 700,
    aspectRatio: 2,   
     defaultTimedEventDuration: '01:00:00',
      slotDuration: '01:00:00',
    slotLabelInterval: 60,

    
    // customButtons: {
    //   addEvent: {
    //     text: 'Add Appointment',
    //     click: function() {
    //       var date = moment(dateStr);

    //       if (date.isValid()) {
    //         $('#calendar').fullCalendar('renderEvent', {
    //           title: 'dynamic event',
    //           start: date,
    //           allDay: true
    //         });
    //         alert('Great. Now, update your database...');
    //       } else {
    //         alert('Invalid date.');
    //       }
    //     }
    //   }
    // },
    header: {
      left:'prev, next, today',
      center: 'title',
      right: 'addEvent, month, agendaWeek, agendaDay'
    },
    themeSystem: 'bootstrap4',
    nowIndicator: true,
     
   agendaDay : function (date, cell) {
        cell.css("background-color", "red");
    },
    selectOverlap :false,
    select: function(start, end, jsEvent, view) {
       $('#calendar').fullCalendar('unselect');
      //console.log("hi")
      if(start.hasTime()){
        if (!IsDateHasEvent(start)) {
                var from= moment(start).format("YYYY-MM-DD HH:mm:ss");
                var end= moment(end).format("YYYY-MM-DD HH:mm:ss");
                var doc=document.getElementById("sel_doc");
                var did= doc.options[doc.selectedIndex].value;
                var nurse = document.getElementById("sel_nurse");
                var nurse_id= nurse.options[nurse.selectedIndex].value;
                if(did!="select"){
                    $("#appoinment").modal();
                    console.log(from);
                    $('form').off('submit');
                    $('form').on('submit', function (e) {
                          console.log(from);
                        e.preventDefault();
                       
                        var pat= document.getElementById("patients_sel");
                        var pname=  pat.options[pat.selectedIndex].text;
                        var dname= doc.options[doc.selectedIndex].text;
                       
                        var title= "Dr. " +dname+ "s appoinment with " +pname;
                       $("#appoinment").modal('hide');
                       var dat= $('form').serialize()+ "&from=" + from+"&till=" + end+"&title=" + title+"&doc_id=" + did;
                       $('form').trigger("reset");
                     //  console.log(dat)
                        $.ajax({
                          type: 'post',
                          url: '../Scripts/lookup.php',
                          data: dat,
                          success: function (data) {
                            $('#msg').empty();
                            $('#msg').append(data);
                            select_doc(doc);
                            $('#response_msg').addClass(' alert-success');
                            $('#response_msg').fadeTo(2000, 500).slideUp(500, function(){
                           $("#response_msg").slideUp(500);
                            }); 
                           
                            
                          }
                        });

                   });    $('#calendar').fullCalendar('refetchEvents');

                }

              else{
                $('#msg').empty();
                $('#msg').append("Please select a doctor");
                
                $('#response_msg').addClass('alert-warning');
                $('#response_msg').fadeTo(2000, 500).slideUp(500, function(){
               $("#response_msg").slideUp(500);
                });   
                
              }
              if(nurse_id!="select")
              {
                $("#nurse_schedule").modal();
                console.log("nurseselected"); 
                console.log(nurse_id);
                $('form').off('submit');
                    $('form').on('submit', function (e) {
                          console.log(from);
                        e.preventDefault();
                       
                        var pat= -1;
                        //var pname=  pat.options[pat.selectedIndex].text;
                        //var dname= doc.options[doc.selectedIndex].text;
                       
                        var title= "Shift from " + from + "to" + end;
                       $("#nurse_schedule").modal('hide');
                       var dat= $('form').serialize()+ "&from=" + from+"&till=" + end+"&title=" + title+"&nurse_id=" + nurse_id;
                       $('form').trigger("reset");
                     //  console.log(dat)
                        $.ajax({
                          type: 'post',
                          url: '../Scripts/lookup.php',
                          data: dat,
                          success: function (data) {
                            $('#msg').empty();
                            $('#msg').append(data);
                            console.log(data);
                            select_doc(doc);
                            $('#response_msg').addClass(' alert-success');
                            $('#response_msg').fadeTo(2000, 500).slideUp(500, function(){
                           $("#response_msg").slideUp(500);
                            }); 
                           
                            
                          }
                        });

                   });

              }
              else
              {
                console.log("nursenotselected");
              }
        }
      }
        $('#calendar').fullCalendar('unselect')


    },
   

    // Call script to colour each day
    // based on availability from database

    // Clicking a date pulls up form to book appt
    dayClick: function(date, jsEvent, view) {
      var current= new Date();
      var hour =current.getHours()+1;
      var time =hour+":00:00";

      defaultView: 'agendaWeek';
      var check =date.toJSON().slice(0,10);
      var today =current.toJSON().slice(0,10) ;
      console.log(today)
  
        if(today==check){
            $('#calendar').fullCalendar('option', { minTime: time })
        }
        if(check >= today){
          $('#calendar').fullCalendar('gotoDate',date);
          $('#calendar').fullCalendar('changeView','agendaDay');
            // change the day's background color just for fun
          // $(this).css('background-color', 'red');

            //$('#btnTrigger').click();
        } 
      

      

      
    },
    events: function(start, end, timezone, callback) {
         callback(events);
  },   eventMouseover:function(event,domEvent,view){
          
        $('[data-date="'+moment(event.eventend).format('YYYY-MM-DD')+'"]').addClass('highlightcell');
    },
    eventMouseout:function(event){
        $('[data-date="'+moment(event.eventend).format('YYYY-MM-DD')+'"]').removeClass('highlightcell');
    }


     
             
     

    
  })
});

/**
 * Hide the html element with id = 'close_alert
 */
function close_alert(){
  $('#close_alert').hide();
  return false;
} 

/**
 * Update the html select element with doctors from the database
 * @param tbname the table name
 * @param col_name the attribute name
 * @param id the html element id
 */
function update_selections(tbname,col_name,id){

  $.ajax({
        type:"POST",
        url: '../Scripts/lookup.php',
        data:{'table':tbname,'column_name':col_name},
        success:function(data) { 
            var docter= document.getElementById(id);
           
            var content = JSON.parse(data)
             console.log(content)
            for (i in content){
                var option=document.createElement("option");
                option.value=content[i]["Doctor_ID"];
                option.text=content[i]["FullName"];
                docter.add(option);
              
            
            }
              
     
              
            }
      
    });
}
function update_selections_nurse(tbname,col_name,id){

  $.ajax({
        type:"POST",
        url: '../Scripts/lookup.php',
        data:{'table':tbname,'column_name':col_name},
        success:function(data) { 
            var docter= document.getElementById(id);
           
            var content = JSON.parse(data)
             console.log(content)
            for (i in content){
                var option=document.createElement("option");
                option.value=content[i]["Nurse_ID"];
                option.text=content[i]["FullName"];
                docter.add(option);
              
            
            }
              
     
              
            }
      
    });
}

/**
 * Update the html select element with patients from the database
 * @param tbname table name
 * @param col_name attribute name
 * @param id the html element id 
 */
function update_pselections(tbname,col_name,id){

  $.ajax({
        type:"POST",
        url: '../Scripts/lookup.php',
        data:{'table':tbname,'column_name':col_name},
        success:function(data) { 
            var docter= document.getElementById(id);
           
            var content = JSON.parse(data)
             console.log(content)
            for (i in content){
                var option=document.createElement("option");
                option.value=content[i]["UserId"];
                option.text=content[i]["Name"];
                docter.add(option);
              
            
            }
              
     
              
            }
      
    });
}

/**
 * Show the html element with id = "myForm"
 */
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

/**
 * Hide the html element with id = "myForm"
 */
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

/**
 * 
 * @param doc 
 */
function select_doc(doc){
    var doc_id = doc.options[doc.selectedIndex].value;
    if(doc_id!="select"){
      $.ajax({
       type:"POST",
      url: '../Scripts/lookup.php',
      dataType: 'JSON',
      data: {
        // our hypothetical feed requires UNIX timestamps
        
          docid:doc_id
      },
      success: function(data) {
       console.log(data)
        var events = data.events;
        $('#calendar').fullCalendar('removeEvents');
        //  $('#calendar').fullCalendar('addEventSource', events);         
        //    setTimeout(function(){
        //             $("#calendar").fullCalendar("rerenderEvents");
        //         },50);
          $('#calendar').fullCalendar( 'addEventSource', events );
          $('#calendar').fullCalendar( 'rerenderEvents'); 
          $('#calendar').fullCalendar('refetchEvents');
      }
    });
   
    }
}
function select_nurse(nurse){
    var nurse_id = nurse.options[nurse.selectedIndex].value;
    if(nurse_id!="select"){
      $.ajax({
       type:"POST",
      url: '../Scripts/lookup.php',
      dataType: 'JSON',
      data: {
        // our hypothetical feed requires UNIX timestamps
        
          nurse_id_sched:nurse_id
      },
      success: function(data) {
       console.log(data)
        var events = data.events;
        console.log("nursedata"+data);
        $('#calendar').fullCalendar('removeEvents');
        //  $('#calendar').fullCalendar('addEventSource', events);         
        //    setTimeout(function(){
        //             $("#calendar").fullCalendar("rerenderEvents");
        //         },50);
          $('#calendar').fullCalendar( 'addEventSource', events );
          $('#calendar').fullCalendar( 'rerenderEvents'); 
          $('#calendar').fullCalendar('refetchEvents');
      }
    });
   
    }
} 

/**
 * Return boolean if the date has event
 * @param date the desired date 
 * @return boolean if the start
 */
function IsDateHasEvent(date) {
    var allEvents = [];
    // add your calendar events into the array. 
    allEvents = $('#calendar').fullCalendar('clientEvents');
    var event = $.grep(allEvents, function (v) {
        return +v.start === +date;
    });

    return event.length > 0;
}