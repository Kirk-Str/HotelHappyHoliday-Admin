<h2 class="wow fadeInDown">
    HOLIDAY'S SUITES&trade;
</h2>
<p class="para-b wow fadeInDown">
    With 42 rooms and suites in total, each offering a unique and memorable experience. All rooms are air conditioned and equipped with a Widescreen 58" TV mounted on the wall and Wi-Fi. Each unit also has a work desk and a private bathroom with hairdryer. Complimentary mineral water is available in each room. Enjoy the comfort and luxury that Holiday™ offers.
</p>
<div class="jumbotron jstyle j-suites wow fadeInDown">
</div>


<h2 class="text-center row-offset-1">Feel the Luxury in everything!</h2>

<h3 class="text-center">
    
</h3>

<div class="row row-offset-1">
    <div class="col-md-3 col-sm-1 text-center">
        <img src="assets/images/home/chef.png" width="128" height="128" />
        <h4>Star Rating Chef</h4>
    </div>
    <div class="col-md-3 col-sm-1 text-center">
        <img src="assets/images/home/check-in.png" width="128" height="128" />
        <h4>24h Services</h4>
    </div>
    <div class="col-md-3 col-sm-1 text-center">
        <img src="assets/images/home/shirt.png" width="128" height="128" />
        <h4>Free Laundry</h4>
    </div>
    <div class="col-md-3 col-sm-1 text-center">
        <img src="assets/images/home/taxi.png" width="128" height="128" />
        <h4>24h Taxi Service</h4>
    </div>

</div>

<hr class="goldenbreak-2px">
<div class="row-offset-1"></div>
{foreach $suitesList val implode='<hr class="featurette-divider">'}

    {if $dwoo.foreach.default.index % 2 == 0}
        <div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="400ms">
            <div class="col-md-8 col-md-push-4">
                <h2 class="featurette-heading">{$val.room_name} <span class="text-muted">{$val.caption}</span></h2>
                <p class="lead">{$val.description}</p>
            </div>
            <div class="col-md-4 col-md-pull-8">
                <img class="featurette-image img-responsive center-block" src="data:image;base64,{$val.thumbnail}" data-holder-rendered="true">
            </div>
        </div>
    {else}
        <div class="row featurette wow fadeInRight" data-wow-duration="500ms" data-wow-delay="400ms">
        <div class="col-md-8">
            <h2 class="featurette-heading">{$val.room_name} <span class="text-muted">{$val.caption}</span></h2>
            <p class="lead">{$val.description}</p>
        </div>
        <div class="col-md-4">
            <img class="featurette-image img-responsive center-block" src="data:image;base64,{$val.thumbnail}" data-holder-rendered="true">
        </div>
        </div>
    {/if}

{/foreach}


{$explore}