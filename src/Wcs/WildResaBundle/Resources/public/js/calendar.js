$(document).ready(function() {

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title'
        },
        defaultView: 'agendaWeek',
        timeFormat: 'H:mm',
        allDaySlot: false,
        slotEventOverlap: false,
        firstDay: 1,
        aspectRatio: 2,
        eventOverlap: false,

        events: Routing.generate('eventsjson'),

        dayClick: function(date) {
            //alert('Clicked on: ' + date.format());
            window.location = Routing.generate('events') + date.format() + '/new';
        },

        eventClick: function(calEvent, jsEvent, view) {
            window.location = Routing.generate('events') + calEvent.id + '/edit';
        }
    });

});