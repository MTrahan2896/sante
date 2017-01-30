let t= "test";
angular.module('myModule', ['scDateTime']);
$('.datepicker').pickadate({selectYears: 20});


  $(document).ready(function() {
    $('select').material_select();
  });

 $('#calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyCOz5Z77z9O4gDAvCmmC2ya1y-NUETMQ4w',
        events: {
            googleCalendarId: 'jonathan.lafreniere@gmail.com',
        },
     
    });

 var newEvent = new Object();

newEvent.title = "some text\n";
newEvent.start = new Date();
newEvent.allDay = true;
 var newEvent2 = new Object();

newEvent2.title = "some tesx2\n";
newEvent2.start = new Date();
newEvent2.allDay = true;
$('#calendar').fullCalendar( 'renderEvent', newEvent2 );

$("#calendar").fullCalendar({

viewRender: function(view, element){
        alert(t);
    }

    });
