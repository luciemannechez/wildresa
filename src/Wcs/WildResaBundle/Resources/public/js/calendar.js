$(document).ready(function() {

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title'
        },
        defaultView: 'agendaWeek',
        timeFormat: 'H:mm',
        allDaySlot: false,

        events: Routing.generate('eventsjson'),

        dayClick: function(date) {
           //alert('Clicked on: ' + date.format());
            window.location = Routing.generate('events') + date.format() + '/new';
        }
    });

});