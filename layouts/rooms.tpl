<?php

    require '..\vendor\autoload.php';

?>

<div>
    <h3>ROOMS</h3>
</div>
<hr> 
<div class="form-group">
    <form action="roomdetail.php?type=add" method="POST">
        <input type="submit" value="Add New"  class="btn btn-info" />
    </form>
</div>

<table id="room-list" class="table table-hover">

    <thead>
        <tr>
            <th>Id</th>
            <th>Room Name</th>
            <th>Thumbnail</th>
            <th>Total Rooms</th>
            <th>Occupancy</th>
            <th>Size</th>
            <th>Rate</th>
            <th>Caption</th>
            <th>Desciption</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    

    {foreach $roomList row}

        <tr>
    
            <td id="{$row.room_id}"><a href="./roomdetail.php?type=edit&roomId={$row.room_id}">{$row.room_id}</a></td>
            <td>{$row.room_name}</td>
            <td>{if $row.thumbnail != ""}<img height="80" width="80" src="data:image;base64,{$row.thumbnail}" />{/if}</td>
            <td>{$row.total_room}</td>
            <td>{$row.occupancy}</td>
            <td>{$row.size}</td>
            <td>{$row.rate}</td>
            <td>{$row.caption}</td>
            <td>{$row.description}</td>
            <td><a href="./roomdetail.php?type=delete&roomId={$row.room_id}">Delete</a></td>

        </tr>
    
    {/foreach}
       

</table>
