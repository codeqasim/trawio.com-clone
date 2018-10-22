<style>body { background-color: #f4f4f4; }</style>

<!-- fotorama.css & fotorama.js. -->
<link  href="//cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<!-- Map Section -->
<div class="collapse" id="collapseMap">
<div id="map" class="map"></div>
<br>
<script>
$('#collapseMap').on('shown.bs.collapse',function(e){(function(A){if(!Array.prototype.forEach)
  A.forEach=A.forEach||function(action,that){for(var i=0,l=this.length;i<l;i++)
  if(i in this) action.call(that,this[i],i,this);}})(Array.prototype);var mapObject,markers=[],markersData={'marker':[{name:'<?php echo character_limiter($module->title, 80);?>',location_latitude:<?php echo $module->latitude;?>,location_longitude:<?php echo $module->longitude;?>,map_image_url:'<?php echo $module->thumbnail;?>',name_point:'<?php echo character_limiter($module->title, 80);?>',description_point:'<?php echo character_limiter(strip_tags(trim($module->desc)),100);?>',url_point:'<?php echo $module->slug;?>'},<?php foreach($module->relatedItems as $item):?>{name:'hotel name',location_latitude:"<?php echo $item->latitude;?>",location_longitude:"<?php echo $item->longitude;?>",map_image_url:"<?php echo $item->thumbnail;?>",name_point:"<?php echo $item->title;?>",description_point:'<?php echo character_limiter(strip_tags(trim($item->desc)),100);?>',url_point:"<?php echo $item->slug;?>"},<?php endforeach;?>]};var mapOptions={zoom:14,center:new google.maps.LatLng(<?php echo $module->latitude;?>,<?php echo $module->longitude;?>),mapTypeId:google.maps.MapTypeId.ROADMAP,mapTypeControl:!1,mapTypeControlOptions:{style:google.maps.MapTypeControlStyle.DROPDOWN_MENU,position:google.maps.ControlPosition.LEFT_CENTER},panControl:!1,panControlOptions:{position:google.maps.ControlPosition.TOP_RIGHT},zoomControl:!0,zoomControlOptions:{style:google.maps.ZoomControlStyle.LARGE,position:google.maps.ControlPosition.TOP_RIGHT},scrollwheel:!1,scaleControl:!1,scaleControlOptions:{position:google.maps.ControlPosition.TOP_LEFT},streetViewControl:!0,streetViewControlOptions:{position:google.maps.ControlPosition.LEFT_TOP},styles:[]};var marker;mapObject=new google.maps.Map(document.getElementById('map'),mapOptions);for(var key in markersData)
  markersData[key].forEach(function(item){marker=new google.maps.Marker({position:new google.maps.LatLng(item.location_latitude,item.location_longitude),map:mapObject,icon:'<?php echo base_url(); ?>uploads/global/default/'+key+'.png',});if('undefined'===typeof markers[key])
  markers[key]=[];markers[key].push(marker);google.maps.event.addListener(marker,'click',(function(){closeInfoBox();getInfoBox(item).open(mapObject,this);mapObject.setCenter(new google.maps.LatLng(item.location_latitude,item.location_longitude))}))});function hideAllMarkers(){for(var key in markers)
  markers[key].forEach(function(marker){marker.setMap(null)})};function closeInfoBox(){$('div.infoBox').remove()};function getInfoBox(item){return new InfoBox({content:'<div class="marker_info" id="marker_info">'+'<img style="width:280px;height:140px" src="'+item.map_image_url+'" alt="<?php echo character_limiter($module->title, 80);?>"/>'+'<h3>'+item.name_point+'</h3>'+'<span>'+item.description_point+'</span>'+'<a href="'+item.url_point+'" class="btn btn-primary"><?php echo trans('0177');?></a>'+'</div>',disableAutoPan:!0,maxWidth:0,pixelOffset:new google.maps.Size(40,-190),closeBoxMargin:'0px -20px 2px 2px',closeBoxURL:"<?php echo $theme_url; ?>assets/img/close.png",isHidden:!1,pane:'floatPane',enableEventPropagation:!0})}});
</script>
</div>
<!-- End Map Section -->
<div id="OVERVIEW" class="container">
  <div class="row">
    <div class="col-xs-12 col-md-4 go-right">
      <!--<div class="panel panel-default">
        <div class="bgwhite panel-heading">Map</div>

        <iframe src="https://maps.google.com/maps?q=<?php echo character_limiter($module->title, 80);?>&loc:<?php echo $module->latitude;?>+<?php echo $module->longitude;?>&z=15&output=embed" width="100%" height="200" frameborder="0" style="border:0"></iframe>

        </div>-->
      <div class="panel panel-default">
        <div class="panel-heading go-text-right panel-purple">
          <?php echo trans('046');?>
        </div>
        <div class="panel-body">
          <div class="scroll-400">
            <?php echo $module->desc; ?>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading go-text-right panel-blue">
          <?php echo trans('048');?>
        </div>
        <div class="panel-body">
          <div class="scroll-400">
            <div class="go-text-right">
              <?php foreach($module->amenities as $amt){ if(!empty($amt->name)){ ?>
              <div style="margin-top:6px;margin-left:0px" class="col-xs-12 col-md-12 col-sm-12">
                <div class="row">
                  <i class="checkmark icon text-primary">
                  </i>
                  <span class="text-left go-text-right size14">
                  <?php echo $amt->name; ?>
                  </span>
                </div>
              </div>
              <?php } } ?>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <?php if(!empty($module->checkInInstructions)){ ?>
        <div class="panel-heading go-text-right panel-green">
          <?php echo trans('039'); ?>
        </div>
        <?php }  if(!empty($module->checkInInstructions)){ ?>
        <div class="panel-body">
          <span class="RTL">
            <p>
              <?php echo $module->checkInInstructions; ?>
            </p>
          </span>
        </div>
      </div>
      <?php } ?>
      <div class="panel panel-default">
        <?php if(!empty($module->speicalCheckInInstructions)){ ?>
        <div class="panel-heading go-text-right panel-green">
          <?php echo trans('040'); ?>
        </div>
        <?php }  if(!empty($module->speicalCheckInInstructions)){ ?>
        <div class="panel-body">
          <span class="RTL">
            <p>
              <?php echo $module->speicalCheckInInstructions; ?>
            </p>
          </span>
        </div>
        <?php } ?>
        <!-- slider -->
      </div>
    </div>
    <div class="col-xs-12 col-md-8 go-right">
      <div  class="panel panel-default">
        <div style="margin-top:10px">
          <div class="col-md-6">
            <div style="margin-top: 6px">
              <strong class="go-right" style="font-size: 16px">
              <?php echo character_limiter($module->title, 28);?>
              </strong>
              <div class="clearfix"></div>
              <span class="go-right RTL">
              <i style="margin-left:-5px; margin-right: -4px;" class="text-primary marker icon text-muted">
              </i>
              <?php echo $module->location; ?>
              <?php if(!empty($module->mapAddress)){ ?>
              <small class="hidden-xs">,
              <?php echo character_limiter($module->mapAddress, 50);?>
              </small>
              </span>
              <?php } ?>
              <small class="go-right stars">
              <?php echo $module->stars;?>
              </small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="pull-right go-left">
              <?php if($hasRooms){ ?>
              <a class="btn btn-action pull-right btn-block" data-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap"><i style="color:white" class="text-primary marker icon text-muted"></i> <?php echo trans('026');?></a>
              <?php } ?>
            </div>
          </div>
          <div class="visible-xs visible-sm">
            <div class="form-group">
            </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div style="margin-top:10px">
          <!-- slider -->
          <div data-nav="thumbs" class="fotorama">
            <?php foreach($module->sliderImages as $img){ ?>
            <img style="width:100%" src="<?php echo $img['fullImage']; ?>" />
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- rooms -->
      <?php if($hasRooms > 0){ if($appModule == "hotels"){ include 'includes/rooms.php'; }else if($appModule == "ean"){ include 'includes/expedia_rooms.php'; include 'integrations/ean/ages.php'; } }  ?>
      <!-- rooms -->
      <!-- aside -->
      <div class="col-md-3 go-left searchbox-padding">
        <div class="clearfix">
        </div>
        <!-- Start Review Total -->
        <?php include 'includes/tripadvisor.php';?>
        <!-- End Review Total -->
        <!-- Start Hotel Reviews bars -->
        <input type="hidden" id="loggedin" value="<?php echo $usersession;?>" />
        <input type="hidden" id="itemid" value="<?php echo $module->id; ?>" />
        <input type="hidden" id="module" value="<?php echo $appModule;?>" />
        <input type="hidden" id="addtxt" value="<?php echo trans('029');?>" />
        <input type="hidden" id="removetxt" value="<?php echo trans('028');?>" />
        <!-- Start Add/Remove Wish list Review Section -->
        <!-- End Add/Remove Wish list Review Section -->
      </div>
      <!-- aside -->
    </div>
  </div>
</div>
<!------------------------  Related Listings   ------------------------------>
<?php if(!empty($module->relatedItems)){ ?>
<div style="margin-top:30px">
  <div class="container">
    <div class="form-group"></div>
    <br>
    <div class="row">
      <!-- Expedia Hotels -->
      <div class="col-md-12 row5">
        <div class="form-group">
          <h2 class="main-title go-right"><?php if($appModule == "hotels" || $appModule == "ean"){ echo trans('0290'); }else if($appModule == "tours"){ echo trans('0453'); }else if($appModule == "cars"){ echo trans('0493'); } ?></h2>
          <div class="clearfix"></div>
          <i class="tiltle-line go-right"></i>
        </div>
      </div>
      <?php foreach($module->relatedItems as $item){ ?>
      <div class="col-md-3">
        <div class="featured">
          <a href="<?php echo $item->slug;?>">
            <?php if($item->price > 0){ ?>
            <div class="text-center featured-price">
              <div class="text-center">
                <small><?php echo $item->currCode;?></small> <?php echo $item->currSymbol; ?><?php echo $item->price;?>
              </div>
            </div>
            <?php } ?>
            <div class="col-xs-12 go-right wow fadeIn">
              <div class="row">
                <div class="load">
                  <img class="img-responsive lazy" <?php echo $lazy; ?> data-lazy="<?php echo $item->thumbnail;?>" />
                </div>
              </div>
            </div>
            <div class="col-xs-12 go-right wow fadeIn bgwhite">
              <div style="padding: 7px;">
                <div class="strong"><?php echo character_limiter($item->title,20);?></div>
                <div class=""><i class="text-primary marker icon text-muted go-right"></i><?php echo character_limiter($item->location,20);?> <span class="stars home-stars"><?php echo $item->stars;?></span></div>
              </div>
            </div>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <?php } ?>
      <?php } ?>
      <!-- Expedia Hotels -->
    </div>
  </div>
</div>
<!------------------------  Related Listings   ------------------------------>
<script>
  //------------------------------
  // Add to Wishlist
  //------------------------------
  $(function(){$(".wish").on('click',function(){var loggedin=$("#loggedin").val();var removelisttxt=$("#removetxt").val();var addlisttxt=$("#addtxt").val();var title=$("#itemid").val();var module=$("#module").val();if(loggedin>0){if($(this).hasClass('addwishlist')){var confirm1=confirm("<?php echo trans('0437');?>");if(confirm1){$(".wish").removeClass('addwishlist btn-primary');$(".wish").addClass('removewishlist btn-warning');$(".wishtext").html(removelisttxt);$.post("<?php echo base_url();?>account/wishlist/add",{loggedin:loggedin,itemid:title,module:module},function(theResponse){})}
  return!1}
  else if($(this).hasClass('removewishlist')){var confirm2=confirm("<?php echo trans('0436');?>");if(confirm2){$(".wish").addClass('addwishlist btn-primary');$(".wish").removeClass('removewishlist btn-warning');$(".wishtext").html(addlisttxt);$.post("<?php echo base_url();?>account/wishlist/remove",{loggedin:loggedin,itemid:title,module:module},function(theResponse){})}
  return!1}}
  else{alert("<?php echo trans('0482');?>")}})
    // End Add/remove wishlist

    $('.collapse').on('show.bs.collapse', function () {
    $('.collapse.in').collapse('hide');  });
  }
   );
</script>
