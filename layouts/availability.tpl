<div>
    <h3>SELECTED DATE &amp; OCCUPANTS</h3>
</div>

<div class="row block">
    <div class="col-md-4 text-center clear-padding">
        <div class="header">
            <h4>Check In</h4>
        </div>
        <div class="body">
            <p class="lead">{$checkIn}</p>
        </div>
    </div>
    <div class="col-md-4 text-center clear-padding">
        <div class="header">
            <h4>Check Out</h4>
        </div>
        <div class="body">
            <p class="lead">{$checkOut}</p>
        </div>
    </div>
    <div class="col-md-4 text-center clear-padding">
        <div class="header">
            <h4>Guests</h4>
        </div>
        <div class="body">
            <p class="lead">{$guests}</p>
        </div>
    </div>
</div>

<div>
    <h3>CHOOSE YOUR ROOM</h3>
</div>

<div class="row block">
    <div class="col-md-12 clear-padding">
        <div class="body">
            {foreach $suitesList val implode='
            <hr class="featurette-divider margin-offset-4">'}

            <form action="./confirmation.php" method="POST">

                <input type="hidden" name="check_in" value="{$checkIn}" />
                <input type="hidden" name="check_out" value="{$checkOut}" />
                <input type="hidden" name="adults" value="{$adults}" />
                <input type="hidden" name="children" value="{$children}" />
                <input type="hidden" name="room_id" value="{$val.room_id}" />

                <section class="row featurette">
                    <div class="col-md-8 col-md-push-4">
                        <h2 class="featurette-heading">{$val.room_name}
                            <span class="text-muted">{$val.caption}</span>
                        </h2>
                        <div class="col-md-6">
                            <table class="margin-offset-4" style="border-spacing:6px">
                                <tr >
                                    <td style="padding-bottom: 10px; width: 160px" class="label-1">Occupancy: </td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub">{$val.occupancy}</td>
                                </tr>
                                <tr>
                                    <td  style="padding-bottom: 10px" class="label-1">Size: </td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub">{$val.size}</td>
                                </tr>
                                <tr>
                                    <td  style="padding-bottom: 10px" class="label-1">Rate Per Night:</td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub">{$val.rate|string_format:"%.2f"}</td>
                                </tr>
                                <tr>
                                    <td  style="padding-bottom: 10px" class="label-1">View:</td>
                                    <td  style="padding-bottom: 10px" class="label-1-sub">{$val.view}</td>
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

                                {if $val.available <= 2}

                                    <tr>
                                        <td colspan="2">
                                            <label name="warning-label" class="text-danger">Only {$val.available}(s) left!</label>
                                        </td>
                                    </tr>

                                {/if} 

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
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-lg btn-submit pull-right" style="width: 200px;">Select</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-8">
                        {if $val.thumbnail != ""}<img class="featurette-image img-responsive center-block" src="data:image;base64,{$val.thumbnail}" data-holder-rendered="true"/>{/if}
                    </div>
                </section>

            </form>
            {/foreach}
        </div>
    </div>
</div>