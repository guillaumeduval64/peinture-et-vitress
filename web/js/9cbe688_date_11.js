$(document).ready($(function() {
    $( ".date").datepicker({
                        autoSize: true,
                        changeMonth: true,
                        changeYear: true,
                    dateFormat: 'dd MM yy'
                });


        $(".timepicker").timepicker();

    }));
