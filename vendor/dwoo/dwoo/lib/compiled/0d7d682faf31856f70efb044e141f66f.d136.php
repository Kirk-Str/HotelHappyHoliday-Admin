<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?>﻿<div>
    <h3>SELECTED DATE &amp; OCCUPANTS</h3>
</div>

<div class="row block">
    <div class="col-md-4 text-center clear-padding">
        <div class="header">
            <h4>Check In</h4>
        </div>
        <div class="body">
            <p class="lead"><?php echo $this->scope["checkIn"];?></p>
        </div>
    </div>
    <div class="col-md-4 text-center clear-padding">
        <div class="header">
            <h4>Check Out</h4>
        </div>
        <div class="body">
            <p class="lead"><?php echo $this->scope["checkOut"];?></p>
        </div>
    </div>
    <div class="col-md-4 text-center clear-padding">
        <div class="header">
            <h4>Guests</h4>
        </div>
        <div class="body">
            <p class="lead"><?php echo $this->scope["guests"];?></p>
        </div>
    </div>
</div>

<div>
    <h3>CHOOSE YOUR ROOM</h3>
</div>

<div class="row block">
    <div class="col-md-12 clear-padding">
        <div class="body">
            <?php 
$_fh0_data = (isset($this->scope["suitesList"]) ? $this->scope["suitesList"] : null);
$this->globals["foreach"]['default'] = array
(
	"iteration"		=> 1,
	"last"		=> null,
	"total"		=> $this->count($_fh0_data),
);
$_fh0_glob =& $this->globals["foreach"]['default'];
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['val'])
	{
		$_fh0_glob["last"] = (string) ($_fh0_glob["iteration"] === $_fh0_glob["total"]);
/* -- foreach start output */
?>

            <form action="./confirmation.php" method="POST">

                <input type="hidden" name="check_in" value="<?php echo $this->scope["checkIn"];?>" />
                <input type="hidden" name="check_out" value="<?php echo $this->scope["checkOut"];?>" />
                <input type="hidden" name="adults" value="<?php echo $this->scope["adults"];?>" />
                <input type="hidden" name="children" value="<?php echo $this->scope["children"];?>" />
                <input type="hidden" name="room_id" value="<?php echo $this->scope["val"]["room_id"];?>" />

                <section class="row featurette">
                    <div class="col-md-8 col-md-push-4">
                        <h2 class="featurette-heading"><?php echo $this->scope["val"]["room_name"];?>
                            <span class="text-muted"><?php echo $this->scope["val"]["caption"];?></span>
                        </h2>
                        <div class="col-md-6">
                            <table class="margin-offset-4" style="border-spacing:6px">
                                <tr >
                                    <td style="padding-bottom: 10px; width: 160px" class="label-1">Occupancy: </td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub"><?php echo $this->scope["val"]["occupancy"];?></td>
                                </tr>
                                <tr>
                                    <td  style="padding-bottom: 10px" class="label-1">Size: </td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub"><?php echo $this->scope["val"]["size"];?></td>
                                </tr>
                                <tr>
                                    <td  style="padding-bottom: 10px" class="label-1">Rate Per Night:</td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub"><?php echo sprintf("%.2f",(isset($this->scope["val"]["rate"]) ? $this->scope["val"]["rate"]:null));?></td>
                                </tr>
                                <tr>
                                    <td  style="padding-bottom: 10px" class="label-1">View:</td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub"><?php echo $this->scope["val"]["view"];?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="margin-offset-4">
                                <!-- <tr>
                                    <td colspan="2">
                                        <input type="checkbox" id="breakfast-included" class="css-checkbox lrg" checked="unchecked" />
                                        <label for="breakfast-included" name="breakfast-included_lbl" class="css-label lrg web-two-style">Breakfast Included</label>
                                    </td>
                                </tr> -->

                                <?php if ((isset($this->scope["val"]["available_room"]) ? $this->scope["val"]["available_room"]:null) == 0) {
?>

                                   <tr>
                                        <td colspan="2">
                                            <label name="warning-label" class="text-danger">No rooms available!</label>
                                        </td>
                                    </tr>

                                <?php 
}
elseif ((isset($this->scope["val"]["available_room"]) ? $this->scope["val"]["available_room"]:null) <= 2) {
?>

                                    <tr>
                                        <td colspan="2">
                                            <label name="warning-label" class="text-danger">Only <?php echo $this->scope["val"]["available_room"];?>(s) Room left!</label>
                                        </td>
                                    </tr>

                                <?php 
}?> 

                                <!-- <tr>
                                    <td class="label-1">Rooms:</td>
                                    <td>
                                        <div class="form-group">
                                            <select id="rooms" class="form-control" name="room" required>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr> -->
                            </table>
                        </div>

                        <?php if ((isset($this->scope["val"]["available_room"]) ? $this->scope["val"]["available_room"]:null) != 0) {
?>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-block btn-lg btn-submit pull-right" style="width: 200px;">Select</button>
                            </div>

                        <?php 
}?>

                    </div>
                    <div class="col-md-4 col-md-pull-8">
                        <?php if ((isset($this->scope["val"]["thumbnail"]) ? $this->scope["val"]["thumbnail"]:null) != "") {
?><img class="featurette-image img-responsive center-block" src="data:image;base64,<?php echo $this->scope["val"]["thumbnail"];?>" data-holder-rendered="true"/><?php 
}?>
                    </div>
                </section>

            </form>
            <?php 
/* -- implode */
if (!$_fh0_glob["last"]) {
	echo '
            <hr class="featurette-divider margin-offset-4">';
}
/* -- foreach end output */
		$_fh0_glob["iteration"]+=1;
	}
}?>
        </div>
    </div>
</div><?php  /* end template body */
return $this->buffer . ob_get_clean();
?>