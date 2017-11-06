<form class="form form-inline" method="POST" action="." >
    <h3 class="inline-block">My Reservations</h3>
    <div class="form-group pull-right" style="margin-top:30px;">
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-new'; ?>" name="opt-filter" id="opt-filter-new" <?php if (($_GET['type']) == "opt-filter-new") { echo 'checked=checked'; } ?>>New Bookings    
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-history'; ?>"  name="opt-filter" id="opt-filter-occupied" <?php if (($_GET['type']) == "opt-filter-history") { echo 'checked=checked'; } ?>>All History    
        </label>
    </div>
</form>

<table id="my-reservation-list" class="table table-hover">

    <thead>
        <tr>
            <th>Reservation Id</th>
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

        <td id="{$row.id}"><a href="./myReservationDetail.php?requestId={$row.id}">{$row.id}</a></td>
        <td>{$row.room_name}</td>
        <td>{$row.adults}</td>
        <td>{$row.children}</td>
        <td>{$row.check_in}</td>
        <td>{$row.check_out}</td>
        <td>{$row.nightstays}</td>

    </tr>

{/foreach}

</table>