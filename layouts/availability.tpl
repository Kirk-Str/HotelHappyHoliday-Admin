<div>
    <h3>SELECTED DATE &amp; OCCUPANTS</h3>
</div>

<div class="row block">
    <div class="col-md-4 text-center clear-padding">
        <div class="header"><h4>Check In</h4></div>
        <div class="body"><p class="lead">{$checkIn}</p></div>
    </div>
    <div class="col-md-4 text-center clear-padding">
        <div class="header"><h4>Check Out</h4></div>
        <div class="body"><p class="lead">{$checkOut}</p></div>
    </div>
    <div class="col-md-4 text-center clear-padding">
        <div class="header"><h4>Guests</h4></div>
        <div class="body"><p class="lead">{$guests}</p></div>
    </div>
</div>

<div>
    <h3>CHOOSE YOUR ROOM</h3>
</div>

<div class="row block">
    <div class="col-md-12 clear-padding">
        <div class="body">
            {foreach $suitesList val implode='<hr class="featurette-divider margin-offset-4">'}

            <form action="./confirmation.php" method="POST">

            <input type="hidden" name="check_in" value="{$checkIn}" />
            <input type="hidden" name="check_out" value="{$checkOut}" />
            <input type="hidden" name="adults" value="{$adults}" />
            <input type="hidden" name="children" value="{$children}" />
            <input type="hidden" name="room_id" value="{$val.room_id}" />

                <section class="row featurette">
                    <div class="col-md-8 col-md-push-4">
                        <h2 class="featurette-heading">{$val.room_name} <span class="text-muted">{$val.caption}</span></h2>
                        <div class="col-md-6">
                            <table class="margin-offset-4">
                                <tr>
                                    <td class="label-1" style="width: 140px">Occupancy: </td>
                                    <td class="label-1-sub">{$val.occupancy}</td>
                                </tr>
                                <tr>
                                    <td class="label-1">Size: </td>
                                    <td class="label-1-sub">{$val.size}</td>
                                </tr>
                                <tr>
                                    <td class="label-1">View:</td>
                                    <td class="label-1-sub">{$val.view}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <table class="margin-offset-4">
                                <tr>
                                    <td colspan="2">
                                        <input type="checkbox" id="checkbox67" class="css-checkbox lrg" checked="checked" />
                                        <label for="checkbox67" name="checkbox67_lbl" class="css-label lrg web-two-style">Breakfast Included</label>
                                    </td>
                                </tr>
                                <tr>
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
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 row-offset-1">
                            <button type="submit" class="btn btn-block btn-lg btn-submit pull-right" style="width: 200px;">Select</button>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-8">
                        <img class="featurette-image img-responsive center-block" src="~/images/home/suite.jpg" data-holder-rendered="true">
                    </div>
                </section>

                </form>
            {/foreach}
        </div>
    </div>
</div>
