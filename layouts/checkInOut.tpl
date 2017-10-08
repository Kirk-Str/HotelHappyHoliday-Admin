<div>
    <h3>CONFIRM RESERVATION</h3>
</div>

<div class="row block col-md-7">
    <div class="col-md-12  text-center clear-padding">
        <div class="header"><h4>CHECK-IN CHECK-OUT DETAILS</h4></div>
        <div class="body">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="./registerReservation.php" novalidate="novalidate">
                        <input type="hidden" name="check_in" value="{$checkIn}" />
                        <input type="hidden" name="check_out" value="{$checkOut}" />
                        <input type="hidden" name="adults" value="{$adults}" />
                        <input type="hidden" name="children" value="{$children}" />
                        <input type="hidden" name="room_id" value="{$roomId}" />
                        <input type="hidden" name="user_id" value="{$userId}" />
                        <div class="form-horizontal">
                            <div class="text-danger validation-summary-valid" data-valmsg-summary="true">
                                <ul>
                                    <li style="display:none"></li>
                                </ul>
                            </div>
                            <div class="form-group">
                                <label for="email_id" class="col-md-3 control-label">Reservation Id</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$reservationId}" id="reservation_id" name="reservation_id" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="col-md-3 control-label">Firstname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$firstname}" id="firstname" name="firstname" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">

                                <label for="lastname" class="col-md-3 control-label">Lastname</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" value="{$lastname}" id="lastname" name="lastname" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-3 control-label">Check In</label>
                                <div class="col-md-6">
                                        <input name="daterange" class="form-control" id="check_in" type="text" value="{$checkIn}" required />
                                        <input type="hidden" name="check_in_h" id="check_in_h"  value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-3 control-label">Check Out</label>
                                <div class="col-md-6">
                                        <input name="daterange" class="form-control" id="check_out" type="text" value="{$checkOut}" required />
                                        <input type="hidden" name="check_in_h" id="check_in_h"  value="" />
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="lastname" class="col-md-3 control-label">Actual Night Stay</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" id="actualStayNights" name="actualStayNights" {$disabled}>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-md-3 control-label">Balance To Be Paid</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="number" value="{$balanceToBePaid}" data-val="false" data-val-required="The Check Out field is required." id="check_out" name="check_out" {$disabled}>
                                    <span class="text-danger field-validation-valid" data-valmsg-for="check_out" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-3">
                                    <input type="submit" class="btn btn-block btn-submit" value="{$checkActionButton}" />
                                </div>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row block col-md-4" style="margin-left:20px">
    <div class="col-md-12 text-center clear-padding">
        <div class="header"><h4>BOOKING SUMMARY</h4></div>
        <div class="body">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Check In: </td>
                    <td class="label-1-sub">{$checkIn}</td>
                </tr>
                <tr>
                    <td class="label-1">Check Out: </td>
                    <td class="label-1-sub">{$checkOut}</td>
                </tr>
                <tr>
                    <td class="label-1">Night Stay(s):</td>
                    <td class="label-1-sub">{$nightStay}</td>
                </tr>
                <tr>
                    <td class="label-1">Adults:</td>
                    <td class="label-1-sub">{$adults}</td>
                </tr>
                <tr>
                    <td class="label-1">Children:</td>
                    <td class="label-1-sub">{$children}</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1" style="width: 200px">Room Selected: </td>
                    <td class="label-1-sub">{$roomSelected}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Rate per Night: </td>
                    <td class="label-1-sub">{$roomRate}</td>
                </tr>
            </table>
            <hr class="featurette-divider">
            <table class="margin-offset-1 text-left">
                <tr>
                    <td class="label-1 font-weight-bold" style="width: 200px">Total Amount: </td>
                    <td class="label-1-sub font-weight-bold">{$totalAmount}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Amount To Pay Now: </td>
                    <td class="label-1-sub">{$minPayable}</td>
                </tr>
                <tr>
                    <td class="label-1" style="width: 200px">Balance To be Paid: </td>
                    <td class="label-1-sub">{$balanceToBePaid}</td>
                </tr>
            </table>

        </div>
    </div>
    <div class="col-md-8">

    </div>
</div>



