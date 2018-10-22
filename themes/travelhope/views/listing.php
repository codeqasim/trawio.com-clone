<div class="results">
  <div class="container">
    <div class="hidden-xs">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <div class="availability availabilitySec">
            <h1 class="afterSearch" style="">
              <strong id="_totalProperty">
              <?php echo $totalResults; ?>
              </strong> <?php echo trans('021'); ?>
              <strong>
              <?php echo @$cityTxt; ?>
              </strong>
            </h1>
            <p><?php echo $adults; ?> <?php echo trans('022'); ?>, 1 <?php echo trans('023'); ?>,
              <?php echo $totalStay; ?> <?php echo trans('024'); ?>
              <?php echo $checkinStr; ?> -
              <?php echo $checkoutStr; ?>
            </p>
          </div>
        </div>
        <div class="col-md-2 col-sm-3">
          <a role="button" data-toggle="collapse" href="#MODIFY_SEARCH" aria-expanded="false" aria-controls="MODIFY_SEARCH" class="btn btn-default"><?php echo trans('025'); ?>
          <i class="angle down icon">
          </i>
          </a>
        </div>
      </div>
      <div class="clearfix">
      </div>
      <div class="collapse" id="MODIFY_SEARCH">
        <div class="well well-sm">
          <?php require $themeurl.'views/includes/expedia-search.php';?>
          <div class="clearfix">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="listing-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-3 filters go-right">
        <aside class="row">
          <a class="btn btn-block btn-success btn-lg" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap">
          <i class="icon_set_1_icon-41"></i> <?php echo trans('026'); ?>
          </a>
          <form  action="<?php echo $baseUrl;?>search" method="GET">
            <!-- TOP TIP -->
            <div style="padding:10px 10px 10px 10px">
              <div class="textline">
                <span class="filterstext">
                <span>
                <i class="icon_set_1_icon-95">
                </i><?php echo trans('027'); ?>
                </span>
                </span>
              </div>
            </div>
            <div class="clearfix">
            </div>
            <!-- Star ratings -->
            <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse1">
            <?php echo trans('028'); ?>
            <span class="collapsearrow">
            </span>
            </button>
            <div id="collapse1" class="collapse in">
              <div class="panel-body">
                <?php $star = '<i class="stars star icon"></i>'; ?>
                <?php $stars = '<i class="stars empty star icon"></i>'; ?>
                <div class="rating" style="font-size: 14px;">
                  <ul class="input-list">
                    <li>
                      <div class="pure-checkbox">
                        <input id="checkbox1" name="stars" type="radio" class="checkbox" value="1" <?php if(@$_GET['stars'] == "1"){echo "checked";}?>>
                        <label for="checkbox1">
                        <?php echo $star; ?>
                        <?php for($i=1;$i<=6;$i++){ ?>
                        <?php echo $stars; ?>
                        <?php } ?>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="pure-checkbox">
                        <input id="checkbox2" name="stars" type="radio" class="checkbox" value="2" <?php if(@$_GET['stars'] == "2"){echo "checked";}?>>
                        <label for="checkbox2">
                        <?php for($i=1;$i<=2;$i++){ ?>
                        <?php echo $star; ?>
                        <?php } ?>
                        <?php for($i=1;$i<=5;$i++){ ?>
                        <?php echo $stars; ?>
                        <?php } ?>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="pure-radiobutton">
                        <input id="checkbox3" name="stars" type="radio" class="checkbox" value="3" <?php if(@$_GET['stars'] == "3"){ echo "checked";}?>>
                        <label for="checkbox3">
                        <?php for($i=1;$i<=3;$i++){ ?>
                        <?php echo $star; ?>
                        <?php } ?>
                        <?php for($i=1;$i<=4;$i++){ ?>
                        <?php echo $stars; ?>
                        <?php } ?>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="pure-radiobutton">
                        <input id="checkbox4" name="stars" type="radio" class="checkbox" value="4" <?php if(@$_GET['stars'] == "4"){echo "checked";}?>>
                        <label for="checkbox4">
                        <?php for($i=1;$i<=4;$i++){ ?>
                        <?php echo $star; ?>
                        <?php } ?>
                        <?php for($i=1;$i<=3;$i++){ ?>
                        <?php echo $stars; ?>
                        <?php } ?>
                        </label>
                      </div>
                    </li>
                    <li>
                      <div class="pure-radiobutton">
                        <input id="checkbox5" name="stars" type="radio" class="checkbox" value="5" <?php if(@$_GET['stars'] == "5"){echo "checked";}?> >
                        <label for="checkbox5">
                        <?php for($i=1;$i<=5;$i++){ ?>
                        <?php echo $star; ?>
                        <?php } ?>
                        <?php for($i=1;$i<=2;$i++){ ?>
                        <?php echo $stars; ?>
                        <?php } ?>
                        </label>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="clearfix">
              </div>
            </div>
            <!-- End of Star ratings -->
            <!-- Price range -->
            <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse2">
            <?php echo trans('029'); ?>
            <span class="collapsearrow">
            </span>
            </button>
            <div id="collapse2" class="collapse in">
              <br>
              <div class="panel-body text-center">
                <?php if(!empty($_GET['price'])){
                  $selectedprice = $_GET['price'];
                  }else{
                  $selectedprice =  $minprice.",".$maxprice;
                  }?>
                <input type="text" class="col-md-12" value="" data-slider-min="<?php echo @$minprice;?>" data-slider-max="<?php echo @$maxprice;?> " data-slider-step="100" data-slider-value="[<?php echo $selectedprice;?>]" id="sl2" name="price">
              </div>
            </div>
            <!-- End of Price range -->
            <!-- Module types -->
            <button type="button" class="collapsebtn go-text-right" data-toggle="collapse" data-target="#collapse3">
            <?php echo trans('030'); ?>
            <span class="collapsearrow">
            </span>
            </button>
            <!----------------------->
            <div id="collapse3" class="collapse in">
              <div class="panel-body">
                <ul class="input-list">
                  <li>
                    <div class="pure-checkbox">
                      <input id="all" name="propertyCategory[]" value="6"  type="checkbox" <?php if(in_array("6", $propertyCategory)){ echo "checked"; } ?>>
                      <label for="all"> &nbsp;&nbsp;<?php echo trans('031');?> &nbsp;  </label>
                    </div>
                  </li>
                  <li>
                    <div class="pure-checkbox">
                      <input name="propertyCategory[]" value="1" id="hotel"  type="checkbox" <?php if(in_array("1", $propertyCategory)){ echo "checked"; } ?>>
                      <label for="hotel"> &nbsp;&nbsp;<?php echo trans('032');?> &nbsp;  </label>
                    </div>
                  </li>
                  <li>
                    <div class="pure-checkbox">
                      <input name="propertyCategory[]" value="2" id="suite"  type="checkbox" <?php if(in_array("2", $propertyCategory)){ echo "checked"; } ?>>
                      <label for="suite"> &nbsp;&nbsp;<?php echo trans('033');?> &nbsp;  </label>
                    </div>
                  </li>
                  <li>
                    <div class="pure-checkbox">
                      <input name="propertyCategory[]" value="3" id="resort"  type="checkbox" <?php if(in_array("3", $propertyCategory)){ echo "checked"; } ?>>
                      <label for="resort"> &nbsp;&nbsp;<?php echo trans('034');?> &nbsp;  </label>
                    </div>
                  </li>
                  <li>
                    <div class="pure-checkbox">
                      <input name="propertyCategory[]" value="4" id="vacation"  type="checkbox" <?php if(in_array("4", $propertyCategory)){ echo "checked"; } ?>>
                      <label for="vacation"> &nbsp;&nbsp; <?php echo trans('035');?> &nbsp;  </label>
                    </div>
                  </li>
                  <li>
                    <div class="pure-checkbox">
                      <input name="propertyCategory[]" value="5" id="bed"  type="checkbox" <?php if(in_array("5", $propertyCategory)){ echo "checked"; } ?>>
                      <label for="bed"> &nbsp;&nbsp; <?php echo trans('036');?>  &nbsp;  </label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <!-- End of Module Types -->
            <!-- Hotel Amenities -->
            <button type="button" class="collapsebtn last go-text-right" data-toggle="collapse" data-target="#collapse4">
            <?php echo trans('037'); ?>
            <span class="collapsearrow">
            </span>
            </button>
            <div class="panel-body">
              <div class="scroll-400">
                <ul class="input-list">
                  <?php foreach($propertyAmenities as $pa){ ?>
                  <li>
                    <div class="pure-checkbox">
                      <input id="pa<?php echo $pa->id;?>" name="amenities[]" value="<?php echo $ra->id;?>" type="checkbox">
                      <label for="pa<?php echo $pa->id;?>"><?php echo $pa->name; ?>
                      </label>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- End of Hotel Amenities -->
            <!-- Room Amenities -->
            <button type="button" class="collapsebtn last go-text-right" data-toggle="collapse" data-target="#collapse4">
            <?php echo trans('038'); ?>
            <span class="collapsearrow">
            </span>
            </button>
            <div class="panel-body">
              <div class="scroll-400">
                <ul class="input-list">
                  <?php foreach($roomAmenities as $ra){ ?>
                  <li>
                    <div class="pure-checkbox">
                      <input id="ra<?php echo $ra->id;?>" name="amenities[]" value="<?php echo $ra->id;?>" type="checkbox">
                      <label for="ra<?php echo $ra->id;?>"><?php echo $ra->name; ?>
                      </label>
                    </div>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- End of Room Amenities -->
            <input type="hidden" name="city" value="<?php if(!empty($_GET['city'])){ echo $_GET['city']; }else{ echo $selectedCity; } ?>">
            <input type="hidden" name="checkin" value="<?php echo $checkin; ?>">
            <input type="hidden" name="checkout" value="<?php echo $checkout; ?>">
            <input type="hidden" name="childages" value="<?php echo $childAges; ?>">
            <input type="hidden" name="adults" value="<?php echo $adults; ?>">
            <input type="hidden" name="search" value="1">
            <button style="border-radius:0px" type="submit" class="btn btn-primary btn-lg btn-block"><?php echo trans('015'); ?></button>
          </form>
        </aside>
      </div>
      <div class="col-sm-12 col-md-9">

      <div style="margin-top:15px" class="collapse" id="collapseMap">
<div id="map" class="map"></div>
<br>
</div>

        <div class="clearfix">
        </div>
        <div class="offset-3 offset-RTL">
          <?php if(!empty($module)){ ?>
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
                <small>80 Puntos</small>
              </h4>
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
        </div>
        <?php }else{  echo '<h1 class="text-center">' . trans("066") . '</h1>'; } ?>
        <!--This is for display cache Parameter-->
        <div id="latest_record_para">
          <input type="hidden" name="moreResultsAvailable" id="moreResultsAvailable" value="<?php echo $moreResultsAvailable; ?>" />
          <input type="hidden" name="cacheKey" id="cacheKey" value="<?php echo $cacheKey; ?>" />
          <input type="hidden" name="cacheLocation" id="cacheLocation" value="<?php echo $cacheLocation; ?>" />
          <input type="hidden" name="" id="agesappendurl" value="<?php echo $agesApendUrl; ?>" />
          <input type="hidden" name="" id="adultsCount" value="<?php echo $adults;?>" />
        </div>
        <!--This is for display content-->
        <div id="New_data_load"></div>
        <!--This is for display Loader Image-->
        <div id="loader_new"></div>
        <div id="message_noResult"></div>
        <!-- END OF LIST CONTENT-->
      </div>
    </div>
  </div>
</div>
<!-- END OF CONTENT -->
<br>
<br>
<br>
<!-- End container -->
<!-- Map -->
<!-- Map Modal -->
<div class="modal fade" id="mapModal" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="mapContent">
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<script>
  $('#collapseMap').on('shown.bs.collapse', function(e) {
    (function(A) {
      if (!Array.prototype.forEach)
        A.forEach = A.forEach || function(action, that) {
          for (var i = 0, l = this.length; i < l; i++)
            if (i in this)
              action.call(that, this[i], i, this);
        };
    }
    )(Array.prototype);
    var
    mapObject,
        markers = [],
        markersData = {
          'map-red': [
            <?php foreach($module as $item): ?> {
            name: 'hotel name',
            location_latitude: "<?php echo $item->latitude;?>",
            location_longitude: "<?php echo $item->longitude;?>",
            map_image_url: "<?php echo $item->thumbnail;?>",
            name_point: "<?php echo $item->title;?>",
            description_point: "<?php echo character_limiter(strip_tags(trim($item->desc)),75);?>",
            url_point: "<?php echo $item->slug;?>"
            }
            ,
            <?php endforeach;
    ?>
          ],
        };
    var mapOptions = {
      <?php if(empty($_GET)){
    ?>
      zoom: 10,
      <?php }
    else{
      ?>
        zoom: 12,
          <?php }
    ?>
      center: new google.maps.LatLng(<?php echo $item->latitude;?>, <?php echo $item->longitude;?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP,
          mapTypeControl: false,
            mapTypeControlOptions: {
              style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
                position: google.maps.ControlPosition.LEFT_CENTER
            }
    ,
      panControl: false,
        panControlOptions: {
          position: google.maps.ControlPosition.TOP_RIGHT
        }
    ,
      zoomControl: true,
        zoomControlOptions: {
          style: google.maps.ZoomControlStyle.LARGE,
            position: google.maps.ControlPosition.TOP_RIGHT
        }
    ,
      scrollwheel: false,
        scaleControl: false,
          scaleControlOptions: {
            position: google.maps.ControlPosition.TOP_LEFT
          }
    ,
      streetViewControl: true,
        streetViewControlOptions: {
          position: google.maps.ControlPosition.LEFT_TOP
        }
    ,
      styles: [ /*map styles*/ ]
  };
                       var
                       marker;
                       mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);
  for (var key in markersData)
    markersData[key].forEach(function(item) {
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(item.location_latitude, item.location_longitude),
        map: mapObject,
        icon: '<?php echo base_url(); ?>assets/img/' + key + '.png',
      }
                                     );
      if ('undefined' === typeof markers[key])
        markers[key] = [];
      markers[key].push(marker);
      google.maps.event.addListener(marker, 'click', (function() {
        closeInfoBox();
        getInfoBox(item).open(mapObject, this);
        mapObject.setCenter(new google.maps.LatLng(item.location_latitude, item.location_longitude));
      }
                                                     ));
    }
                            );
  function hideAllMarkers() {
    for (var key in markers)
      markers[key].forEach(function(marker) {
        marker.setMap(null);
      }
                          );
  };
  function closeInfoBox() {
    $('div.infoBox').remove();
  };
  function getInfoBox(item) {
    return new InfoBox({
      content: '<div class="marker_info" id="marker_info">' +
      '<img style="width:280px;height:140px" src="' + item.map_image_url + '" alt=""/>' +
      '<h3>' + item.name_point + '</h3>' +
      '<span>' + item.description_point + '</span>' +
      '<a href="' + item.url_point + '" class="btn btn-primary"><?php echo trans('
    0177 ');?></a>' +
      '</div>',
      disableAutoPan: true,
      maxWidth: 0,
      pixelOffset: new google.maps.Size(40, -190),
      closeBoxMargin: '0px -20px 2px 2px',
      closeBoxURL: "<?php echo $theme_url; ?>assets/img/close.png",
      isHidden: false,
      pane: 'floatPane',
      enableEventPropagation: true
    }
                      );
  };
  }
  );
</script>
