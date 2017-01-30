let t= "test";

$('.datepicker').pickadate({selectYears: 20});


  $(document).ready(function() {
    $('select').material_select();
  });

 $('#calendar').fullCalendar({
        googleCalendarApiKey: 'AIzaSyCOz5Z77z9O4gDAvCmmC2ya1y-NUETMQ4w',
        events: {
            googleCalendarId: 'jonathan.lafreniere@gmail.com',
        }
    });