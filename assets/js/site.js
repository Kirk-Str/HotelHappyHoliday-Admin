// Write your Javascript code.
$(function () {

    new WOW().init();

    $('input[name="daterange"]').daterangepicker({
        autoUpdateInput: false,
        locale: {
            cancelLabel: 'Clear'
        }
    });

    $('#daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
    });

    $('#daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.endDate.format('YYYY-MM-DD'));
    });

    $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {

       
        $('#check_in').val(picker.startDate.format('YYYY-MM-DD'));
        $('#check_in_h').val(picker.startDate.format('YYYY-MM-DD'));
        
        $('#check_out').val(picker.endDate.format('YYYY-MM-DD'));
        $('#check_out_h').val(picker.endDate.format('YYYY-MM-DD'));

    });

});