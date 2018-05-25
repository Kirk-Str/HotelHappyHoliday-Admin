<div class="banner-wrapper">
    <div id="mycarousal" class="carousel slide" data-ride="carousel" data-interval="6000">
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="assets/images/home/big-ben2.jpg" class="img-responsive" />
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
    <h3 class="text-center">
        Enjoy all what Holiday&trade; can offer! Get Holiday&trade; Loyality membership because there is something more to It ! - just for booking directly with us. Not a member? Join today.
    </h3>
</div>

<section>

    <div class="row row-offset-1">

        <div class="col-md-3 text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <img src="assets/images/home/money.png" width="128" height="128" />
            <h4>Afforable Rates</h4>
        </div>
        <div class="col-md-3 text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <img src="assets/images/home/wifi.png" width="128" height="128" />
            <h4>Free Wifi</h4>
        </div>
        <div class="col-md-3 text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
            <img src="assets/images/home/water.png" width="128" height="128" />
            <h4>Free Water Bottle</h4>
        </div>
        <div class="col-md-3 text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
            <img src="assets/images/home/text-lines.png" width="128" height="128" />
            <h4>Complementry Newspaper</h4>
        </div>

    </div>
</section>
<hr class="goldenbreak-2px">
<div class="row featurette wow fadeInRight row-offset-1" data-wow-duration="500ms" data-wow-delay="400ms">
    <div class="col-md-8 col-md-push-4">
        <h2 class="featurette-heading">Honeymoon Package. <span class="text-muted">Enjoy the luxury!</span></h2>
        <p class="lead">
            Holiday's Restaurant & Spa Resort promises you the most suitable environment for you to spend your special day just like a dream.
        </p>
    </div>
    <div class="col-md-4 col-md-pull-8">
        <img class="featurette-image img-responsive center-block" src="assets/images/home/honeymoon.jpg" data-holder-rendered="true">
    </div>
</div>
<hr class="featurette-divider">
<div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="400ms">
    <div class="col-md-8">
        <h2 class="featurette-heading">Birthday Offers. <span class="text-muted">Enjoy the luxury!</span></h2>
        <p class="lead">Make that day special and celebrate your birthday at Holiday&trade;</p>
    </div>
    <div class="col-md-4">
        <img class="featurette-image img-responsive center-block" src="assets/images/home/birthday.jpg" data-holder-rendered="true">
    </div>
</div>
<hr class="featurette-divider">
<div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="400ms">
    <div class="col-md-8 col-md-push-4">
        <h2 class="featurette-heading">Long Stay Package. <span class="text-muted">It's delicious!</span></h2>
        <p class="lead">The long stay package is suitable for those who prefer to stay at Holiday&trade; for minimum 14 nights.</p>
    </div>
    <div class="col-md-4 col-md-pull-8">
        <img class="featurette-image img-responsive center-block" src="assets/images/home/longstay.jpg" data-holder-rendered="true">
    </div>
</div>
{$explore}