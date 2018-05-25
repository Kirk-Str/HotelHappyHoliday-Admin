<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><?php

    //require '..\vendor\autoload.php';

?>

<div>
    <h3>ROOM TYPES</h3>
</div>
<hr> 
<div class="form-group">
    <form action="roomTypeDetail.php?type=add" method="POST">
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
    

    <?php 
$_fh0_data = (isset($this->scope["roomList"]) ? $this->scope["roomList"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>

        <tr>
    
            <td id="<?php echo $this->scope["row"]["room_id"];?>"><a href="./roomTypeDetail.php?type=edit&roomId=<?php echo $this->scope["row"]["room_id"];?>"><?php echo $this->scope["row"]["room_id"];?></a></td>
            <td><?php echo $this->scope["row"]["room_name"];?></td>
            <td><?php if ((isset($this->scope["row"]["thumbnail"]) ? $this->scope["row"]["thumbnail"]:null) != "") {
?><img height="80" width="80" src="data:image;base64,<?php echo $this->scope["row"]["thumbnail"];?>" /><?php 
}?></td>
            <td><?php echo $this->scope["row"]["total_room"];?></td>
            <td><?php echo $this->scope["row"]["occupancy"];?></td>
            <td><?php echo $this->scope["row"]["size"];?></td>
            <td><?php echo $this->scope["row"]["rate"];?></td>
            <td><?php echo $this->scope["row"]["caption"];?></td>
            <td><?php echo $this->scope["row"]["description"];?></td>
            <td><a href="./roomTypeDetail.php?type=delete&roomId=<?php echo $this->scope["row"]["room_id"];?>">Delete</a></td>

        </tr>
    
    <?php 
/* -- foreach end output */
	}
}?>
       

</table>
<?php  /* end template body */
return $this->buffer . ob_get_clean();
?>