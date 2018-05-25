<form class="form form-inline" method="POST" action="." >
    <h3 class="inline-block">USERS</h3>
    <div class="form-group pull-right" style="margin-top:30px;">
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-all'; ?>" name="opt-filter" id="opt-filter-all" <?php if (($_GET['type']) == "opt-filter-all") { echo 'checked=checked'; } ?>>All Users   
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-admin-user'; ?>" name="opt-filter" id="opt-filter-admin-user" <?php if (($_GET['type']) == "opt-filter-admin-user") { echo 'checked=checked'; } ?>>Admin Users   
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-registered-user'; ?>"  name="opt-filter" id="opt-filter-registered-user" <?php if (($_GET['type']) == "opt-filter-registered-user") { echo 'checked=checked'; } ?>>Registered Users  
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-non-registered-user'; ?>"  name="opt-filter" id="opt-filter-non-registered-user" <?php if (($_GET['type']) == "opt-filter-non-registered-user") { echo 'checked=checked'; } ?>>Non-Registered Users   
        </label>
        <label class="radio-inline" style="margin-right:20px;">
            <input type="radio" onclick=location.href="<?php echo $_SERVER['PHP_SELF'] . '?type=opt-filter-deactivated-user'; ?>"  name="opt-filter" id="opt-filter-deactivated-user" <?php if (($_GET['type']) == "opt-filter-deactivated-user") { echo 'checked=checked'; } ?>>Deactivated Users   
        </label>
    </div>
</form>
<hr>
<div class="form-group">
    <form action="userDetail.php?type=add" method="POST">
        <input type="submit" value="Add New"  class="btn btn-info" />
    </form>
</div>

<table id="user-list" class="table table-hover">

    <thead>
        <tr>
            <th>Email Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Address 1</th>
            <th>Address 2</th>
            <th>Contact Not</th>
            <th>User Type</th>
        </tr>
    </thead>

{foreach $usersList row}

    <tr>

        <td id="{$row.user_id}"><a href="./userDetail.php?type=edit&userId={$row.user_id}">{$row.email_id}</a></td>
        <td>{$row.firstname}</td>
        <td>{$row.lastname}</td>
        <td>{$row.address_line_one}</td>
        <td>{$row.address_line_two}</td>
        <td>{$row.contact_no}</td>
        <td>{$row.user_role}</td>

    </tr>

{/foreach}

</table>