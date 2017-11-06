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
        console.debug(picker.endDate.format('YYYY-MM-DD'));
    });

    $('#daterange').on('apply.daterangepicker', function (ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD'));
        console.debug(picker.endDate.format('YYYY-MM-DD'));
    });

    $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {

        console.debug(picker.endDate.format('YYYY-MM-DD'));

        $('#check_in').val(picker.startDate.format('YYYY-MM-DD'));
        $('#check_in_h').val(picker.startDate.format('YYYY-MM-DD'));
        
        $('#check_out').val(picker.endDate.format('YYYY-MM-DD'));
        $('#check_out_h').val(picker.endDate.format('YYYY-MM-DD'));

    });
    
    ////////////////////////////////////////////////////////////////

    $('#check_in_single').daterangepicker({
        "singleDatePicker": true,
        "autoUpdateInput": false,
        "locale": {
            "cancelLabel": 'Clear'
        }
    }, function(start, end, label) {
        $('#check_in_single').val(start.format('YYYY-MM-DD'));
    });

    $('#check_out_single').daterangepicker({
        "singleDatePicker": true,
        "autoUpdateInput": false,
        "locale": {
            "cancelLabel": 'Clear'
        }
    }, function(start, end, label) {
        
        // var roomRent = $('#roomRate').text();
        // var nightsStay  =  end-start;
        // var totalRent = nightsStay * totalRent;

        $('#check_out_single').val(end.format('YYYY-MM-DD'));
        //$('#actualStayNights').val(nightsStay);
        //$('#actualStayNights').val(nightsStay);
    });


    //////////////////////////////////////////////////////////////////

    $('#reservation-list tbody').on( 'click', 'tr', function () {
      
        var id = this.cells[0].id;
        location.href="./confirmation.php?requestId=" + id;

    } );

    $('#my-reservation-list tbody').on( 'click', 'tr', function () {
        
          var id = this.cells[0].id;
          location.href="./myReservationDetail.php?requestId=" + id;
  
      } );

    $('#room-list tbody').on( 'click', 'tr', function () {
        
          var id = this.cells[0].id;
          location.href="./roomdetail.php?type=edit&id=" + id;
  
      } );



});