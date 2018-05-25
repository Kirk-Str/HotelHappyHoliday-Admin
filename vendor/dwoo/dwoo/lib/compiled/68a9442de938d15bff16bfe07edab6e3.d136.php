<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><form class="form form-inline" method="POST" action="." >
    <h3 class="inline-block">Offer Requests</h3>
    <div class="form-group pull-right" style="margin-top:30px;">
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-new'; ?>" name="opt-filter" id="opt-filter-new" <?php if (($_GET['type']) == "opt-filter-new") { echo 'checked=checked'; } ?>>New
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-all'; ?>"  name="opt-filter" id="opt-filter-all" <?php if (($_GET['type']) == "opt-filter-all") { echo 'checked=checked'; } ?>>All
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-accepted'; ?>"  name="opt-filter" id="opt-filter-accepted" <?php if (($_GET['type']) == "opt-filter-accepted") { echo 'checked=checked'; } ?>>Accepted
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-declined'; ?>"  name="opt-filter" id="opt-filter-declined" <?php if (($_GET['type']) == "opt-filter-declined") { echo 'checked=checked'; } ?>>Declined
        </label>
    </div>
</form>

<table id="request-list" class="table table-hover">

    <thead>
        <tr>
            <th>Request Id</th>
            <th>Guest's Fullname</th>
            <th>Offer</th>
            <th>Start At</th>
            <th>End At</th>
            <th>Guests</th>
            <th>Approval Status</th>
        </tr>
    </thead>

<?php 
$_fh0_data = (isset($this->scope["offerList"]) ? $this->scope["offerList"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>

    <tr>

        <td id="<?php echo $this->scope["row"]["id"];?>"><a href="./request.php?requestId=<?php echo $this->scope["row"]["id"];?>"><?php echo $this->scope["row"]["id"];?></a></td>
        <td><?php echo $this->scope["row"]["firstname"];?> <?php echo $this->scope["row"]["lastname"];?></td>
        <td><?php echo $this->scope["row"]["offer_name"];?></td>
        <td><?php echo $this->scope["row"]["event_start_date"];?></td>
        <td><?php echo $this->scope["row"]["event_end_date"];?></td>
        <td><?php echo $this->scope["row"]["guests"];?></td>
        <td><?php if ((isset($this->scope["row"]["approval_status"]) ? $this->scope["row"]["approval_status"]:null) == null) {
?>New Request<?php 
}
elseif ((isset($this->scope["row"]["approval_status"]) ? $this->scope["row"]["approval_status"]:null) == 1) {
?>Accepted<?php 
}
else {
?>Declined<?php 
}?></td>

    </tr>

<?php 
/* -- foreach end output */
	}
}?>

</table><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>