<form class="form form-inline" method="POST" action="." >
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

{foreach $offerList row}

    <tr>

        <td id="{$row.id}"><a href="./request.php?requestId={$row.id}">{$row.id}</a></td>
        <td>{$row.firstname} {$row.lastname}</td>
        <td>{$row.offer_name}</td>
        <td>{$row.event_start_date}</td>
        <td>{$row.event_end_date}</td>
        <td>{$row.guests}</td>
        <td>{if $row.approval_status == null}New Request{elseif $row.approval_status == 1}Accepted{else}Declined{/if}</td>

    </tr>

{/foreach}

</table>