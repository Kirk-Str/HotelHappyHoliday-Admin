<?php
/* template head */
/* end template head */ ob_start(); /* template body */ ?><div class="banner-wrapper">

    <div id="mycarousal" class="carousel slide" data-ride="carousel" data-interval="6000">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="assets/images/home/coolbeach.jpg" class="img-responsive" />
            </div>
            <div class="item">
                <img src="assets/images/home/celeb.jpg" class="img-responsive" />
            </div>
            <div class="item">
                <img src="assets/images/home/restaurant.jpg" class="img-responsive" />
            </div>
        </div>
    </div>

 
    <form class="reservation-form" method="POST" action="./actions/availability.php">

        <h2 class="wow fadeInDown">Enjoy your tailor made holiday and other special events at Holiday&trade;</h2>
        <h3 class="wow fadeInDown">Seal the deal & Explore the your world, Today</h3>

        <div class="reservation-bar wow fadeInDown res-page">
            <div class="form-group">
                <label for="check_in">Check In</label>
                <input name="daterange" class="form-control" id="check_in" type="text" required />
                <input type="hidden" name="check_in_h" id="check_in_h"  value="" />
            </div>
            <div class="form-group">
                <label for="check_out">Check Out</label>
                <input name="daterange" class="form-control" id="check_out" type="text" required />
                <input type="hidden" name="check_out_h" id="check_out_h" value="" />
            </div>
            <div class="form-group">
                <label for="adults">Adults</label>
                <select id="adults" class="form-control" name="adults" required>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>
            <div class="form-group">
                <label for="children">Children</label>
                <select id="children" class="form-control" name="children">
                    <option>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>

            <div class="form-group">
                <label for="promotion">Promotion Code</label>
                <input id="promotionCode" class="form-control" type="text" name="promotioncode" />
            </div>

            <input type="submit" class="btn btn-submit" value="Check Availability" />

        </div>

    </form>
    
</div>
<div class="golden-banner">
    <h3>
        The word is out. Join Hotel Happy Holiday Loyality for access to exclusive offers, complimentary WiFi and other perks
        - just for booking directly with us. Not a member? Join today.
    </h3>
</div>
<div class="row">

<?php 
$_fh0_data = (isset($this->scope["offersList"]) ? $this->scope["offersList"] : null);
if ($this->isTraversable($_fh0_data) == true)
{
	foreach ($_fh0_data as $this->scope['row'])
	{
/* -- foreach start output */
?>

    <div class="col-md-4 col-sm-1">
        <section class="card">
            <img class="featurette-image img-responsive card-img-top center-block" src="data:image;base64,<?php echo $this->scope["row"]["thumbnail"];?>" data-holder-rendered="true">
            <h3><?php echo $this->scope["row"]["caption"];?></h3>
            <p class="lead"><?php echo $this->scope["row"]["description"];?></p>
            <p>
            <?php if ((isset($this->scope["userType"]) ? $this->scope["userType"] : null) == 2) {
?>
                <a href="./offerRequest.php?type=add&offerId=<?php echo $this->scope["row"]["offer_id"];?>" class="btn btn-submit">Book Now</a>
            <?php 
}
else {
?>
                <a href="#" class="btn btn-submit" data-toggle="modal" data-target=".bs-example-modal-lg">Book Now</a>
            <?php 
}?>

            </p>
            <hr class="goldenbreak-5px" />
        </section>
    </div>

<?php 
/* -- foreach end output */
	}
}?>
</div>

<div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="400ms">
    <div class="col-md-8 col-md-push-4">
        <h2 class="featurette-heading">Unparalleled Suites options. <span class="text-muted">Enjoy the luxury!</span></h2>
        <p class="lead">
            With 42 rooms and suites in total, each offering a unique and memorable experience. All rooms are air conditioned and equipped with
            a Widescreen 58" TV mounted on the wall and Wi-Fi. Each unit also has a work desk and a private bathroom with hairdryer.
            Complimentary mineral water is available in each room. Enjoy the comfort and luxury that Holiday&trade; offers.
        </p>
    </div>
    <div class="col-md-4 col-md-pull-8">
        <img class="featurette-image img-responsive center-block" src="assets/images/home/suite.jpg" data-holder-rendered="true">
    </div>
</div>
<hr class="featurette-divider">
<div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="400ms">
    <div class="col-md-8">
        <h2 class="featurette-heading">Mouthwatering Foods. <span class="text-muted">It's delicious!</span></h2>
        <p class="lead">
            Holiday&trade; provides Five-Star/Five-Diamond catering from our acclaimed chef, Gordon Ramsay. Mouthwatering foods with gourmet quality and extra caring in catering. Enjoy the Holiday&trade;'s multi cuisine foods such as Italian, French, American, Chinese.
        </p>
    </div>
    <div class="col-md-4">
        <img class="featurette-image img-responsive center-block" src="assets/images/home/res.jpg" data-holder-rendered="true">
    </div>
</div>
<hr class="featurette-divider">
<div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="200ms">
    <div class="col-md-8  col-md-push-4">
        <h2 class="featurette-heading">Awe Inspiring Natural Attractions. <span class="text-muted">It'll blow your mind.</span></h2>
        <p class="lead">Holiday&trade; is surrounded by sevreral important places like National Zoo, Botanical Garden, Museum, Palm Beaches that you cannot ignore visting!</p>
    </div>
    <div class="col-md-4 col-md-pull-8">
        <img class="featurette-image img-responsive center-block" src="assets/images/home/featureattactions.jpg" data-holder-rendered="true">
    </div>
</div>
<!-- Server Side script required for dynamic validation for this functionality-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h3 class="modal-title" id="myLargeModalLabel">Registration Required</h3>
            </div>
            <p class="modal-body lead">You need to be a registered member of Holiday&trade; to have access this facility. </p>
        </div>
    </div>
</div>
<?php echo $this->scope["explore"];
 /* end template body */
return $this->buffer . ob_get_clean();
?>