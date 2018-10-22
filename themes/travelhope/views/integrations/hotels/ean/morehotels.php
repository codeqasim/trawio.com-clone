<div class="clearfix"></div>
<input type="hidden" name="moreResultsAvailable" id="moreResultsAvailable" value="<?php echo $moreResultsAvailable; ?>" />
<input type="hidden" name="cacheKey" id="cacheKey" value="<?php echo $cacheKey; ?>" />
<input type="hidden" name="cacheLocation" id="cacheLocation" value="<?php echo $cacheLocation; ?>" />
<input type="hidden" name="" id="agesappendurl" value="<?php echo $agesApendUrl; ?>" />
###
<?php foreach($module as $item){ ?>
      <!-- Add to whishlist -->
      <?php if($appModule != "ean" && $appModule != "offers"){ ?>
      <span>
        <?php echo wishListInfo($appModule, $item->id); ?>
      </span>
      <?php } ?>
      <!-- Add to whishlist -->
      <section class="resultbg">
        <div class="col-md-4 col-sm-12 col-xs-12 wow fadeIn">
          <div class="row">
            <a href="<?php echo $item->slug;?>">
                <div class="load">
                 <img class="img-responsive lazy" <?php echo $lazy; ?> data-lazy="<?php echo $item->thumbnail;?>" alt="<?php echo character_limiter($item->title,20);?>" />
               </div>
            </a>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 listing-results">
          <h3>
            <a href="<?php echo $item->slug;?>">
              <strong>
                <?php echo character_limiter($item->title,20);?>
              </strong>
            </a>
          </h3>
          <div class="clearfix">
          </div>
          <p class="text-muted">
            <i class="text-primary marker icon text-muted">
            </i>
            <?php echo character_limiter($item->location,10);?> &nbsp;
            <span class="stars">
              <?php echo $item->stars;?>
            </span>


          </p>
          <div class="clearfix">
          </div>
          <hr class="hr10">

       <p style="font-size:13px">
            <?php echo character_limiter($item->desc,220);?>
            <br>
            <?php  if($item->avgReviews->overall > 0){ ?>
            <strong>Reviews
            </strong>
            <?php echo $item->avgReviews->overall; ?> |
            <strong>Rate
            </strong>
            <?php echo $item->avgReviews->totalReviews; ?> / 10
            <?php } ?>
          </p>

        </div>
       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 listing-results">
           <h4 class="text-center">Very Good<br>
<small>80 Puntos</small></h4>
<h4 class="text-center">
<?php if($appModule == "ean"){ if($item->tripAdvisorRating > 0){ ?>
            <i class="thumbs outline up icon"></i>
            <?php echo $item->tripAdvisorRating;?>
            <?php } } ?>
            </h4>


           <?php  if($item->price > 0){ ?>
            <div class="pull-right price-info btn-block">
              <small>
                <?php echo $item->currCode;?>
              </small>
              <strong>
                <?php echo $item->currSymbol; ?>
                <?php echo $item->price;?>
              </strong>
            </div>
            <?php } ?>
            <a href="<?php echo $item->slug;?>" class="btn btn-primary pull-right btn-block" title="">Book Now
            </a>

       </div>






      </section>
      <div class="clearfix">
      </div>
      <?php } ?>
