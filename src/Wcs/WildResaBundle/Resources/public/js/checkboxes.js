$( document ).ready(function() {
    var $checkboxes = $('input[type=checkbox]'),
        $endDate = $('#wcs_wildresabundle_events_end_time_hour'),
        $val = $endDate.val(),
        $option = $endDate.find('option'),
        isAdded;

    var $ok = $('input[type=checkbox]:checked').length;

    if ( $ok == 0 ) {
        isAdded = false;
    }
    else {
        isAdded = true;
    }

    $checkboxes.change(function() {

        if(this.checked) {
            $ok ++;
        }
        else {
            $ok --;
        }

        if ( $ok == 2 && !isAdded) {
            isAdded = true;
            changeHour(+2);

        }else if ($ok == 1 && isAdded) {
            isAdded = false;
            changeHour(-2);
        }
    });

    function changeHour($nbHour) {
        $option.removeAttr('selected');

        var value = parseInt($val) + $nbHour;
        $val = value.toString();

        $endDate.find('option[value='+value+']').attr('selected', 'selected');
    }
});