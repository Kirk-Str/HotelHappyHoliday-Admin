<?php

    //require '..\vendor\autoload.php';

?>

<form class="form form-inline" method="POST" action="." >
    <h3 class="inline-block">Room Reservations</h3>
    <div class="form-group pull-right" style="margin-top:30px;">
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-new'; ?>" name="opt-filter" id="opt-filter-new" <?php if (($_GET['type']) == "opt-filter-new") { echo 'checked=checked'; } ?>>New Bookings    
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-occupied'; ?>"  name="opt-filter" id="opt-filter-occupied" <?php if (($_GET['type']) == "opt-filter-occupied") { echo 'checked=checked'; } ?>>Occupied    
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-left'; ?>"  name="opt-filter" id="opt-filter-left" <?php if (($_GET['type']) == "opt-filter-left") { echo 'checked=checked'; } ?>>Left
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-cancelled'; ?>"  name="opt-filter" id="opt-filter-cancelled" <?php if (($_GET['type']) == "opt-filter-cancelled") { echo 'checked=checked'; } ?>>Cancelled / Didn't show up   
        </label>
    </div>
</form>

<table id="reservation-list" class="table table-hover">

    <thead>
        <tr>
            <th>Reservation Id</th>
            <th>Guest's Fullname</th>
            <th>Room</th>
            <th>Adults</th>
            <th>Children</th>
            <th>Check In</th>
            <th>Check Out</th>
            <th>Night Stay(s)</th>
        </tr>
    </thead>

{foreach $reservationList row}

    <tr>

        <td id="{$row.reservation_id}"><a href="./confirmation.php?requestId={$row.reservation_id}">{$row.reservation_id}</a></td>
        <td>{$row.firstname} {$row.lastname}</td>
        <td>{$row.room_name}</td>
        <td>{$row.adults}</td>
        <td>{$row.children}</td>
        <td>{$row.check_in}</td>
        <td>{$row.check_out}</td>
        <td>{$row.nightstays}</td>

    </tr>

{/foreach}

</table>