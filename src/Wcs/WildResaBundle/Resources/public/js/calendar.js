$(document).ready(function() {

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },

        dayClick: function(date) {
           // alert('Clicked on: ' + date.format());
            window.location = Routing.generate('events') + date.format() + '%2000:00:00' + '/new';
        }
    });

});