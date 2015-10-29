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

        eventRender: function(event, element) {
            element.each(function() {
                element.append(event.user + '<br/>');

                var machines = event.machines;

                for ( var i=0; i < machines.length; i ++ ) {
                    element.append(machines[i] + '<br/>');
                }
            })
        },

        dayClick: function(date) {
            //alert('Clicked on: ' + date.format());
            window.location = Routing.generate('events') + date.format() + '/new';
        },

        eventClick: function(calEvent) {
            window.location = Routing.generate('events') + calEvent.id + '/edit';
        }
    });

});