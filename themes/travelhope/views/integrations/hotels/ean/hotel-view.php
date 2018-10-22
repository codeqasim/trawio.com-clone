<?php
  $multiplelocations =  $result['HotelListResponse']['LocationInfos']['@size'];
  $locations = $result['HotelListResponse']['LocationInfos']['LocationInfo'];
  //  echo $eanlib->apistr;
   $totalcounts = $result['HotelListResponse']['HotelList']['@size'];

   if(empty($result['HotelListResponse']['EanWsError'])){
   if(!empty($result)){

  if($totalcounts > 1){
   $resultarray = $result['HotelListResponse']['HotelList']['HotelSummary'];
  }else{
  $resultarray[] = $result['HotelListResponse']['HotelList']['HotelSummary'];
  }


    @$search = $checkin;

  foreach($resultarray as $res){
     //  print_r($res);
    ?>
<div class="offset-2">
  <div class="col-lg-4 col-md-4 col-sm-4 offset-0 go-right">
    <!--<span  ><?php echo wishListInfo("hotels", $item->id); ?></span>-->
    <div class="img_list">
      <a href="<?php echo $baseUrl;?>hotel/<?php echo $res['hotelId']; ?>/<?php echo $result['HotelListResponse']['customerSessionId']; ?>?adults=<?php echo $adults;?>&checkin=<?php echo $checkin;?>&checkout=<?php echo $checkout.$agesApendUrl;?>">
        <img src="https://images.travelnow.com<?php echo str_replace("_t","_b",$res['thumbNailUrl']);?>" alt="<?php echo character_limiter($res['name'],15);?>">
        <div class="short_info"></div>
      </a>
    </div>
  </div>
  <div class="col-md-8 offset-0">
    <div class="itemlabel3">
      <div class="labelright go-left" style="min-width:105px;margin-left:5px">
        <br/>
        <span class="green size18">
        <?php  if($res['lowRate'] > 0){ ?>
        <small>
        <?php echo $res['rateCurrencyCode']; ?>
        </small>
        <?php echo $res['lowRate'];?><br>
        <span class="size11 grey"><?php echo trans('0299');?></span>
        <?php } ?>
        </span>
        <?php if($res['hotelRating'] < 1){ $hrating = 1; }else{ $hrating = $res['hotelRating']; }  if(pt_is_module_enabled('reviews')){ ?>
        <hr>
        <div class="review text-center size18"><i class="icon-thumbs-up-4"></i><?php echo  $res['tripAdvisorReviewCount']; ?><span><?php echo $hrating; ?></span></div>
        <div class="clearfix"></div>
        <hr>
        <?php } ?>
        <a href="<?php echo $baseUrl;?>hotel/<?php echo $res['hotelId']; ?>/<?php echo $result['HotelListResponse']['customerSessionId']; ?>?adults=<?php echo $adults;?>&checkin=<?php echo $checkin;?>&checkout=<?php echo $checkout.$agesApendUrl;?>">
        <button type="submit" class="bookbtn mt1"><?php echo trans('0177');?></button>
        </a>
      </div>
      <div class="labelleft2 rtl_title_home">
        <h4 class="mtb0 RTL go-text-right"><a href="<?php echo $baseUrl;?>hotel/<?php echo $res['hotelId']; ?>/<?php echo $result['HotelListResponse']['customerSessionId']; ?>?adults=<?php echo $adults;?>&checkin=<?php echo $checkin;?>&checkout=<?php echo $checkout.$agesApendUrl;?>"><b><?php echo character_limiter($res['name'],20);?></b></a></h4>
        <a class="go-right" href="javascript:void(0);" onclick="showMap('<?php echo base_url();?>ean/maps/<?php echo $res['latitude']; ?>/<?php echo $res['longitude']; ?>/<?php echo character_limiter($res['name'],18); ?>','modal');" title="<?php echo character_limiter($res['city'],35);?>"><i style="margin-left: -3px;" class="icon-location-6 go-right"></i><?php echo character_limiter($res['city'],35);?></a> <span class="go-right"><?php echo pt_create_stars(intval($hrating)); ?></span>
        <br><br>
        <p class="grey RTL"><?php echo substr($res['shortDescription'],58)."..."; ?></p>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<div class="offset-2">
  <hr style="margin-top: 10px; margin-bottom: 10px;">
</div>
<?php } } }elseif($multiplelocations > 1){ $getvars = $_GET;    ?>
<br>
<h1 class="text-center"><?php echo trans("0302");?></h1>
<?php foreach($locations as $loc){
  $getvars['city'] = $loc['city'];
  $getvars['destinationId'] = $loc['destinationId'];

  $link = $baseUrl.'search?'.http_build_query($getvars);
  echo "<a href=$link>".$loc['city']." - ".$loc['countryName']."</a> <br>";
  //  echo 'destinationid - '.$loc['destinationId'].'<br> city - '.$loc['city'].'<br><hr>';

  }


  }else{ echo '<h1 class="text-center">' . trans("066") . '</h1>'; } ?>