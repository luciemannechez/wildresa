$(document).ready(function() {

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title'
        },
        defaultView: 'agendaWeek',
        timeFormat: 'H:mm',

        dayClick: function(date) {
           //alert('Clicked on: ' + date.format());
            window.location = Routing.generate('events') + date.format() + '/new';
        }
    });

});