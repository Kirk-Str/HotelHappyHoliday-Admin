// Write your Javascript code.
$(function () {

    new WOW().init();

    $('input[name="daterange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('#checkIn').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
    });

    $('#checkOut').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.endDate.format('YYYY-MM-DD'));
    });


    $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {

        $('#checkOIn').val(picker.endDate.format('YYYY-MM-DD'));
        $('#checkOut').val(picker.endDate.format('YYYY-MM-DD'));
        console.log(picker.endDate.format('YYYY-MM-DD'));
    });

});