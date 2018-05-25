<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><?php

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

<?php 
$_fh0_data = (isset($this->scope["reservationList"]) ? $this->scope["reservationList"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>

    <tr>

        <td id="<?php echo $this->scope["row"]["reservation_id"];?>"><a href="./confirmation.php?requestId=<?php echo $this->scope["row"]["reservation_id"];?>"><?php echo $this->scope["row"]["reservation_id"];?></a></td>
        <td><?php echo $this->scope["row"]["firstname"];?> <?php echo $this->scope["row"]["lastname"];?></td>
        <td><?php echo $this->scope["row"]["room_name"];?></td>
        <td><?php echo $this->scope["row"]["adults"];?></td>
        <td><?php echo $this->scope["row"]["children"];?></td>
        <td><?php echo $this->scope["row"]["check_in"];?></td>
        <td><?php echo $this->scope["row"]["check_out"];?></td>
        <td><?php echo $this->scope["row"]["nightstays"];?></td>

    </tr>

<?php 
/* -- foreach end output */
	}
}?>

</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>