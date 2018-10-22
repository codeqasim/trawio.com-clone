<section  id="ROOMS">
  <div class="panel panel-defaul">
    <div class="panel-heading panel-inverse">
      <span class="go-right"><?php echo trans('0155'); ?></span>
      <div class="clearfix"></div>
    </div>
    <div class="panel-body">
      <form  action="" method="GET" role="search">
        <div class="col-md-3 col-sm-2 go-right">
          <label><?php echo trans('010');?></label>
          <div class="ui calendar" id="rangestart">
            <div class="ui input left icon">
              <i class="calendar icon"></i>
              <input name="checkin" type="text" placeholder="<?php echo trans('010');?>" value="<?php echo $eancheckin;?>" required>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-2 go-right">
          <label><?php echo trans('011');?></label>
          <div class="ui calendar" id="rangeend">
            <div class="ui input left icon">
              <i class="calendar icon"></i>
              <input name="checkout" type="text" placeholder="<?php echo trans('011');?>" value="<?php echo $eancheckout;?>" required>
            </div>
          </div>
        </div>

        <script>
          $('#rangestart').calendar({
                          type: 'date',
                          formatter: {
          date: function (date, settings) {
          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          return month + '/' + day + '/' + year;
          }
          },
                          endCalendar: $('#rangeend')
          });
          $('#rangeend').calendar({
                          type: 'date',
                          formatter: {
          date: function (date, settings) {
          if (!date) return '';
          var day = date.getDate();
          var month = date.getMonth() + 1;
          var year = date.getFullYear();
          return month + '/' + day + '/' + year;
          }
          },
                          startCalendar: $('#rangestart')
          });

        </script>

        <div class="col-md-2 col-sm-1 go-right">
          <label class="go-right"><?php echo trans('013');?></label>
          <div class="clearfix"></div>
          <div class="ui selection dropdown">
            <input type="hidden" name="adults" value="2">
            <i class="dropdown icon"></i>
            <div class="default text"><?php echo trans('013');?></div>
            <div class="menu">
              <?php for($i = 1; $i <= $maxAdults;$i++){ ?>
              <div class="item" <?php makeselected($i,$adultsCount); ?> data-value="<?php echo $i;?>"><?php echo $i;?></div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-2 col-sm-1 go-right">
          <label class="go-right"><?php echo trans('014');?></label>
          <div class="clearfix"></div>
          <div class="ui selection dropdown">
            <input type="hidden" name="child" value="<?php echo $childCount; ?>">
            <i class="dropdown icon"></i>
            <div class="default text">0</div>
            <div class="menu">
              <?php for($child = 0; $child <= 6;$child++){ ?>
              <div class="item" data-value="<?php echo $child;?>" <?php if($child == $childCount){ echo "selected"; } ?>><?php echo $child;?></div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-md-2 go-right">
          <label>&nbsp;</label>
          <button class="btn btn-block btn-success textupper"><?php echo trans('0106');?></button>
        </div>
      </form>
      <div class="clearfix"></div>
    </div>
  </div>
  <div class="alert alert-success">
    <h4><?php echo trans('0370');?></h4>
    <span class="size14">
    <?php echo trans('0378');?>
    </span>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading panel-inverse">Available Rooms</div>
    <?php if(empty($rooms)){ echo '<h1 class="text-center">' . trans("066") . '</h1>'; }else{ ?>
    <?php foreach($rooms as $room){ $roomImg = str_replace("_s","_z",$room['RoomImages']['RoomImage'][0]['url']); if(empty($roomImg)){ $roomImg = PT_BLANK; } ?>
    <form class="" action="" method="GET">
      <div class="rooms-update" style="margin-top:0px;margin-bottom:0px">
        <div class="col-lg-3 col-md-4 col-sm-4 offset-0 go-right">
          <div class="zoom-gallery<?php echo $room['rateCode']; ?>">
            <a href="<?php echo $roomImg; ?>" data-source="<?php echo $roomImg; ?>" title="<?php echo $room['rateDescription']; ?>">
            <img style="width:100%;padding-right: 12px; min-height: 115px;max-height: 116px;" class="img-responsive" src="<?php echo $roomImg; ?>">
            </a>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 offset-0">
          <div class="labelright go-left" style="min-width:180px;margin-left:5px">
            <h5 class="text-center">
              <span class="green size20">
              <?php
                $nightlyRate = $room['RateInfos']['RateInfo']['ConvertedRateInfo']['@maxNightlyRate'];
                $currency = $room['RateInfos']['RateInfo']['ConvertedRateInfo']['@currencyCode'];
                if(empty($nightlyRate)){
                $nightlyRate = $room['RateInfos']['RateInfo']['ChargeableRateInfo']['@maxNightlyRate'];
                $currency = $room['RateInfos']['RateInfo']['ChargeableRateInfo']['@currencyCode'];
                }
                $surchargesArray = (array)$room['RateInfos']['RateInfo']['ChargeableRateInfo']['Surcharges']['Surcharge'];


                foreach($surchargesArray as $key => $val){
                if($key == "@type"){
                $arrKeys[] = $val;
                }elseif($key == "@amount"){
                $arrVals[] = $val;
                }

                }

                $surchargeTypes = array_combine($arrKeys,$arrVals);
                $SalesTax = $surchargeTypes['SalesTax'];
                $HotelOccupancyTax = $surchargeTypes['HotelOccupancyTax'];
                $TaxAndServiceFee = $surchargeTypes['TaxAndServiceFee'];

                ?>
              <b>
              <small><?php echo $currency; ?>  </small> <?php echo $nightlyRate; ?>
              </b><span><?php echo trans('0245');?></span></span>
            </h5>
            <div class="clearfix"></div>
            <div class="book">
              <span <?php if(!empty($loggedin)){ ?> onclick="booknow()" <?php }else{ ?> data-toggle="modal" data-target="#book<?php echo $room['rateCode'];?>" <?php } ?> class="btn btn-action btn-block"><?php echo trans('0142');?></span>
            </div>
            <div class="clearfix"></div>
          </div>
          <div style="line-height: 13px" class="labelleft2 rtl_title_home go-text-right RTL">
            <h4 class="mtb0 RTL go-text-right"><b><?php echo $room['rateDescription']; ?></b></h4>
            <h5 style="color:#8A8A8A"><?php echo trans('010');?> <?php echo $room['rateOccupancyPerRoom'];?> </h5>
            <hr style="margin-top: 10px; margin-bottom: 10px;">
            <div class="col-md-6 visible-lg visible-md go-right" id="accordion" style="margin-top: 0px;">
              <div class="row">
                <?php if($room['RateInfos']['RateInfo']['nonRefundable']){ ?>
                <button data-toggle="collapse" data-parent="#accordion" class="hidden-xs btn-xs btn btn-danger"  href="#nonrefund<?php echo $room['rateCode'];?>"><?php echo trans('0309');?></button>
                <?php }else{ ?>
                <span class="hidden-xs btn-xs btn btn-success"><?php echo trans('0344');?></span>
                <?php } ?>
                <button data-toggle="collapse" data-parent="#accordion" class="hidden-xs btn btn-xs btn-info"  href="#details<?php echo $room['rateCode'];?>"><?php echo trans('052');?></button>
                <div class="clearfix"></div>
                <small><strong> <?php echo trans('0542'); ?></strong> </small>
                <small><strong>
                <?php if(!empty($SalesTax)){ ?> <br> Sales Tax: <?php echo $SalesTax; }  ?>
                <?php if(!empty($HotelOccupancyTax)){ ?> <br> Hotel Occupancy Tax: <?php echo $HotelOccupancyTax; }  ?>
                <?php if(!empty($TaxAndServiceFee)){ ?> <br> Tax & Service Fee: <?php echo $TaxAndServiceFee; }  ?>
                </strong></small>
              </div>
            </div>
            <p class="grey RTL"><?php echo character_limiter($r->desc, 280);?></p>
            <br/>
            <ul class="hotelpreferences go-right hidden-xs">
              <?php $cnt = 0; foreach($item->amenities as $amt){ $cnt++; if($cnt <= 10){ if(!empty($amt['name'])){ ?>
              <img title="<?php echo $amt['name'];?>" data-toggle="tooltip" data-placement="top" style="height:25px;" src="<?php echo $amt['icon'];?>" alt="<?php echo $amt['name'];?>" />
              <?php } } } ?>
            </ul>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </form>
    <div class="clearfix"></div>
    <!-- refund policy -->
    <div id="nonrefund<?php echo $room['rateCode'];?>" class="alert alert-danger panel-collapse collapse">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="clearfix"></div>
          <p><?php echo $room['RateInfos']['RateInfo']['cancellationPolicy']; ?></p>
        </div>
      </div>
    </div>
    <!-- refund policy -->
    <div id="details<?php echo $room['rateCode'];?>" class="alert alert-warning panel-collapse collapse">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="magnific-gallery row">
            <?php $imgCount = 0; foreach($room['RoomImages']['RoomImage'] as $Img){ $imgCount++; if($imgCount <= 4){ $imgurl = str_replace("_s","_z",$Img['url']); ?>
            <div class="col-md-3">
              <div class="zoom-gallery<?php echo $room['rateCode'];?>">
                <a href="<?php echo $imgurl;?>" data-source="<?php echo $imgurl;?>" title="<?php echo $room['rateDescription']; ?>">
                <img class="img-responsive" style="max-height:144px" src="<?php echo $imgurl;?>">
                </a>
              </div>
            </div>
            <script type="text/javascript">
              $('.zoom-gallery<?php echo $r->id; ?>').magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                  verticalFit: true,
                  titleSrc: function(item) {
                    return item.el.attr('title') + ' ';
                  }
                },
                gallery: {
                  enabled: true
                },
                zoom: {
                  enabled: true,
                  duration: 300, // don't foget to change the duration also in CSS
                  opener: function(element) {
                    return element.find('img');
                  }
                }

              });

            </script>
            <?php } } ?>
          </div>
          <p>
            <!--<strong><?php echo trans('046');?> : </strong>-->
          </p>
          <p><?php echo $room['RoomType']['descriptionLong']; ?></p>
          <p></p>
          <hr>
          <p><strong><?php echo trans('055');?> : </strong></p>
          <?php foreach($room['RoomType']['roomAmenities']['RoomAmenity'] as $roomAmenity){ ?>
          <div class="col-md-4">
            <ul class="checklist">
              <li><?php echo $roomAmenity['amenity'];?></li>
            </ul>
          </div>
          <?php } ?>
          <div class="clearfix"></div>
          <br>
          <?php echo @$checkInInstructions; ?>
          <br>
          <hr>
          <?php echo @$specialCheckInInstructions; ?>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      $(".zoom-gallery<?php echo $room['rateCode']; ?>").magnificPopup({
        delegate: 'a',
        type: 'image',
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: 'mfp-with-zoom mfp-img-mobile',
        image: {
          verticalFit: true,
          titleSrc: function(item) {
            return item.el.attr('title') + ' ';
          }
        },
        gallery: {
          enabled: true
        },
        zoom: {
          enabled: true,
          duration: 300, // don't foget to change the duration also in CSS
          opener: function(element) {
            return element.find('img');
          }
        }

      });

    </script>
    <script>
      $('.collapse').on('show.bs.collapse', function () {
          $('.collapse.in').collapse('hide');
      });
    </script>
    <!-- Modal -->
    <div class="modal fade" id="book<?php echo $room['rateCode'];?>" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><?php echo trans('0463');?></h4>
          </div>
          <div class="modal-body">
            <p><?php echo trans('0464');?></p>
            <img src="<?php echo base_url(); ?>assets/img/users.png" class="img-responsive"/>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <form id="bookloginform" action="<?php echo base_url().EANSLUG;?>reservation" method="GET">
                  <input type="hidden" name="adults" value="<?php  echo $adultsCount; ?>" />
                  <input type="hidden" name="ages" id="childagesdetails" value="<?php echo $childAges; ?>">
                  <input type="hidden" name="checkin" value="<?php  echo $eancheckin; ?>" />
                  <input type="hidden" name="checkout" value="<?php  echo $eancheckout; ?>" />
                  <input type="hidden" name="roomtype" value="<?php echo $room['RoomType']['@roomCode']; ?>" />
                  <input type="hidden" name="ratekey" value="<?php echo $room['RateInfos']['RateInfo']['RoomGroup']['Room']['rateKey']; ?>" />
                  <input type="hidden" name="ratecode" value="<?php echo $room['rateCode']; ?>" />
                  <input type="hidden" name="hotel" value="<?php echo $hotelid; ?>" />
                  <input type="hidden" name="sessionid" value="<?php echo $sessionid;?>" />
                  <button type="submit" class="btn btn-primary btn-block btn-lg"><?php echo trans('04');?></button>
                </form>
              </div>
              <div class="col-md-6">
                <form action="<?php echo base_url().EANSLUG;?>reservation" method="GET">
                  <input type="hidden" name="adults" value="<?php  echo $adultsCount; ?>" />
                  <input type="hidden" name="ages" id="childagesdetails" value="<?php echo $childAges; ?>">
                  <input type="hidden" name="checkin" value="<?php  echo $eancheckin; ?>" />
                  <input type="hidden" name="checkout" value="<?php  echo $eancheckout; ?>" />
                  <input type="hidden" name="roomtype" value="<?php echo $room['RoomType']['@roomCode']; ?>" />
                  <input type="hidden" name="ratekey" value="<?php echo $room['RateInfos']['RateInfo']['RoomGroup']['Room']['rateKey']; ?>" />
                  <input type="hidden" name="ratecode" value="<?php echo $room['rateCode']; ?>" />
                  <input type="hidden" name="hotel" value="<?php echo $hotelid; ?>" />
                  <input type="hidden" name="sessionid" value="<?php echo $sessionid;?>" />
                  <input type="hidden" name="user" value="guest" />
                  <button type="submit" class="btn btn-success btn-block btn-lg"><?php echo trans('0167');?></button>
                </form>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <?php if($app_settings[0]->allow_registration){ if($app_settings[0]->user_reg_approval == "Yes"){ ?>
            <form action="<?php echo base_url().EANSLUG;?>" method="GET">
              <input type="hidden" name="adults" value="<?php  echo $adultsCount; ?>" />
              <!-- <input type="hidden" name="child" value="" /> -->
              <input type="hidden" name="checkin" value="<?php  echo $eancheckin; ?>" />
              <input type="hidden" name="checkout" value="<?php  echo $eancheckout; ?>" />
              <input type="hidden" name="roomtype" value="<?php echo $room['RoomType']['@roomCode']; ?>" />
              <input type="hidden" name="ratekey" value="<?php echo $room['RateInfos']['RateInfo']['RoomGroup']['Room']['rateKey']; ?>" />
              <input type="hidden" name="ratecode" value="<?php echo $room['rateCode']; ?>" />
              <input type="hidden" name="hotel" value="<?php echo $hotelid; ?>" />
              <input type="hidden" name="sessionid" value="<?php echo $sessionid;?>" />
              <input type="hidden" name="user" value="register" />
              <button type="submit" class="btn btn-default"><?php echo trans('05');?></button>
            </form>
            <?php } } ?>
            <!--            <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo trans('0346');?></button>-->
          </div>
        </div>
      </div>
    </div>
    <hr style="margin-top: 2px; margin-bottom: 2px;">
    <?php } ?>
  </div>
  <?php } ?>
  <script>
    jQuery(document).ready(function($) {
    $('.showcalendar').on('change',function(){
       var roomid = $(this).prop('id');
       var monthdata = $(this).val();
      $("#roomcalendar"+roomid).html("<br><br><div id='rotatingDiv'></div>");
     $.post("<?php echo base_url();?>hotels/roomcalendar", { roomid: roomid, monthyear: monthdata}, function(theResponse){ console.log(theResponse);
     $("#roomcalendar"+roomid).html(theResponse);  }); }); });
  </script>
  <script>
    $('.collapse').on('show.bs.collapse', function () {
        $('.collapse.in').collapse('hide');
    });
  </script>
  <script type="text/javascript">
    function booknow(){
      $("#bookloginform").submit();
    }
  </script>
</section>
<script type="text/javascript">
  $(function(){
    $(".childcountDetailsPage").on("change",function(){
      var count = $(this).val();
      var ages = [];
      if(count > 0){

        // for(i = 1; i <= count; i++){
        //   ages.push('0');
        // }

        $("#childagesdetails").val(ages);


        $(".ageselect").empty();

        addChildsAgeFieldDetails(count);

       $("#agesModal").modal('show');
      }else{
        $("#childagesdetails").val("");
      }

    })



  })


  function addChildsAgeFieldDetails(children) {

        var childagestxt = '';
        for (child = 1; child <= children; child++) {

            var StringChildAge = '';
            StringChildAge = '\
                        <label for="form-input-popover" class="col-sm-4 control-label">'+child+' Age</label><div class="col-sm-8">\n\
                        <select class="room-child-ageDetails form-control" onchange="updateChildAgesDetails();">\n\
                            <option value="0"> Under 1 </option>\n\
                            <option value="1">1</option>\n\
                            <option value="2">2</option>\n\
                            <option value="3">3</option>\n\
                            <option value="4">4</option>\n\
                            <option value="5">5</option>\n\
                            <option value="6">6</option>\n\
                            <option value="7">7</option>\n\
                            <option value="8">8</option>\n\
                            <option value="9">9</option>\n\
                            <option value="10">10</option>\n\
                            <option value="11">11</option>\n\
                            <option value="12">12</option>\n\
                            <option value="13">13</option>\n\
                            <option value="14">14</option>\n\
                            <option value="15">15</option>\n\
                            <option value="16">16</option>\n\
                            <option value="17">17</option>\n\
            </select></div>';

            $(".ageselect").append(StringChildAge);
        }



  }

  function updateChildAgesDetails(){

       var selectedAges = [];
            $('.room-child-ageDetails option:selected').each(function () {
                if($(this).val() > 0){
                selectedAges.push($(this).val());
                }
            });

          $("#childagesdetails").val(selectedAges);
  }

</script>
<!-- Modal -->
<div class="modal fade" id="agesModal" tabindex="1" role="dialog" aria-hidden="true" style="margin-top:50px;color: #000;" >
  <div class="modal-dialog modal-sm" style="z-index: 9999;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo trans('011');?></h4>
      </div>
      <div class="modal-body">
        <div class="form-group form-horizontal ageselect" >
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo trans('0233');?></button>
      </div>
    </div>
  </div>
</div>
