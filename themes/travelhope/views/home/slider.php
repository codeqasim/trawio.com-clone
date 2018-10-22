<div class="jumbotron">
    <div class="container">
        <div class="col-md-6 go-right">
            <div class="">
                <ul class="nav nav-tabs nav-justified">
                    <!--<li role="presentation" class="active" data-title="HOTELS">
                        <a class="text-center" href="#HOTELS" data-toggle="tab" aria-expanded="true">
                        <i class="hotel icon"></i>
                            <div class="visible-xs clearfix"></div>
                           HOTELS
                        </a>
                    </li>
                    <li role="presentation" class="text-center" data-title="WEGOFLIGHTS">
                        <a href="#WEGOFLIGHTS" data-toggle="tab" aria-expanded="true">
                        <i class="hotel icon"></i>
                            <div class="visible-xs clearfix"></div>
                            Flights
                        </a>
                    </li>-->
                </ul>
            </div>
            <div class="searchground">
                <div class="">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="HOTELS">
                         <?php require $themeurl.'views/includes/expedia-search.php';?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade " id="WEGOFLIGHTS">
                          <?php include 'includes/flights.php' ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="hidden-xs col-md-6 go-left go-text-right">
            <h1 data-wow-duration="0.5s" data-wow-delay="1s" class="go-text-right wow fadeIn title cd-headline clip is-full-width">
                <span class="light">Travel</span>
                <span class="cd-words-wrapper">
                <b class="is-visible"><strong>the way you love</strong></b>
                <b class="is-hidden"><strong>to best destinations</strong></b>
                <b class="is-hidden"><strong>and book on the go</strong></b>
                <b class="is-hidden"><strong>to experience nature </strong></b>
                </span>
            </h1>
            <p data-wow-duration="0.5s" data-wow-delay="1.1s" class="wow fadeIn">Let's book your trip today.</p>
        </div>-->
    </div>
    <br><br>
    <div class="container">
    <div class="col-md-12 text-left hidden-sm hidden-xs">
<h2><?php echo trans('001'); ?></h2>
<h5><?php echo trans('002'); ?></h5>
<br>
</div>
</div>
</div>
