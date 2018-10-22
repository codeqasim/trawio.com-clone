<?php
    //Wish list global function for all modules
    if (!function_exists('wishListInfo')) {
            function wishListInfo($module, $id) {
                    $inwishlist = pt_isInWishList($module, $id);
                    if ($inwishlist) {
                            $html = '<div title="' . trans('028') . '" data-toggle="tooltip" data-placement="left" id="' . $id . '" data-module="' . $module . '" class="wishlist wishlistcheck ' . $module . 'wishtext' . $id . ' fav"><a  class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span class="' . $module . 'wishsign' . $id . ' fav">-</span></a></div>';
                    }
                    else {
                            $html = '<div  title="' . trans('029') . '" data-toggle="tooltip" data-placement="left" id="' . $id . '" data-module="' . $module . '" class="wishlist wishlistcheck ' . $module . 'wishtext' . $id . '"><a class="tooltip_flip tooltip-effect-1" href="javascript:void(0);"><span class="' . $module . 'wishsign' . $id . '">+</span></a></div>';
                    }
                    return $html;
            }
    }
    //Tours locations part on home page
    if (!function_exists('toursWithLocations')) {
            function toursWithLocations() {
                    $appObj = appObj();
                    $toursLib = $appObj->load->library('Tours/Tours_lib');
                    $totalLocations = 7;
                    $locationData = $toursLib->toursByLocations($totalLocations);
                    return $locationData;
            }
    }
    //Show Lazy Loading icon
    if (!function_exists('lazy')) {
            function lazy() {
                    $appObj = appObj();
                    $themeData = (object) $appObj->theme->_data;
                    return  "src='".$themeData->theme_url.LOADING_ICON;
            }
    }

    //Tours locations part on home page
    if (!function_exists('searchForm')) {
            function searchForm($module = "hotels") {
                    $appObj = appObj();
                    $themeData = (object) $appObj->theme->_data;
    //$themeData->checkin = date($themeData->app_settings[0]->date_f,strtotime('+'.CHECKIN_SPAN.' day', time()));
                    $themeData->checkinMonth = strtoupper(date("F", convert_to_unix($themeData->checkin)));
                    $themeData->checkinDay = date("d", convert_to_unix($themeData->checkin));
    //$themeData->checkout = date($themeData->app_settings[0]->date_f, strtotime('+'.CHECKOUT_SPAN.' day', time()));
                    $themeData->checkoutMonth = strtoupper(date("F", convert_to_unix($themeData->checkout)));
                    $themeData->checkoutDay = date("d", convert_to_unix($themeData->checkout));
                    $themeData->eancheckin = date("m/d/Y", convert_to_unix($themeData->eancheckin, "m/d/Y"));
                    $themeData->eancheckout = date("m/d/Y", convert_to_unix($themeData->eancheckout, "m/d/Y"));
                    $themeData->eancheckinMonth = strtoupper(date("F", convert_to_unix($themeData->eancheckin, "m/d/Y")));
                    $themeData->eancheckinDay = date("d", convert_to_unix($themeData->eancheckin, "m/d/Y"));
                    $themeData->eancheckoutMonth = strtoupper(date("F", convert_to_unix($themeData->eancheckout, "m/d/Y")));
                    $themeData->eancheckoutDay = date("d", convert_to_unix($themeData->eancheckout, "m/d/Y"));
                    $themeData->ctcheckin = date("m/d/Y", strtotime("+1 days"));
                    $themeData->ctcheckout = date("m/d/Y", strtotime("+2 days"));
                    $tourType = @ $_GET['type'];
                    ?>
<?php $col4 ="col-md-4 form-group go-right col-xs-12 xl"; ?>
<?php $col3 ="col-md-3 form-group go-right col-xs-12 xl"; ?>
<?php $col2 ="col-md-2 form-group go-right col-xs-6 l"; ?>
<?php $col1 ="col-md-1 form-group go-right col-xs-6 col-sm-6 l"; ?>
<?php $button ="col-md-2 col-xs-12 xl"; ?>
<?php $button ="col-md-2 col-xs-12 xl"; ?>
<?php $lazy ="src='".$theme_url."assets/img/loader.gif'"; ?>

<div ng-controller="autoSuggestCtrl">
    <?php
        if (pt_main_module_available($module)) {
                if ($module == "flightsdohop") {
                        ?>
    <!-- Dohop Flights Search -->
    <form action="//whitelabel.dohop.com/w/<?php echo $themeData->dohopusername; ?>/" method="GET" target="_blank">
        <div class="<?php echo $col2; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0119');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg icon_set_1_icon-41"></i>
                <input placeholder="<?php echo trans('0119'); ?>" required id="a1" name="a1" type="text" class="form input-lg RTL search-location sterm" placeholder="<?php echo trans('0273'); ?>" autocomplete="off" required />
                <div id="a1resp" class="autosuggest"></div>
            </div>
        </div>
        <div class="<?php echo $col2; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0120');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg icon_set_1_icon-41"></i>
                <input placeholder="<?php echo trans('0120'); ?>" required id="a2" name="a2" type="text" class="form input-lg RTL search-location sterm" placeholder="<?php echo trans('0120'); ?>" autocomplete="off" required />
                <div id="a2resp" class="autosuggest"></div>
            </div>
        </div>
        <div class="<?php echo $col2; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0472');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg icon_set_1_icon-53"></i>
                <input type="text" class="form input-lg go-text-left checkinsearch RTL dpfd1" name="d1" value="" placeholder="<?php echo trans('08'); ?>" required />
            </div>
        </div>
        <div class="<?php echo $col2; ?>" >
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0473');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg icon_set_1_icon-53"></i>
                <input type="text" class="form input-lg returnDate mySelectCalendar checkinsearch RTL dpfd2 go-text-left" name="d2" value="" placeholder="<?php echo trans('08'); ?>"  />
            </div>
        </div>
        <div class="<?php echo $col2; ?>" style="margin-bottom: -10px">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0473');?></label>
                <div class="clearfix"></div>
              <!--  <i class="iconspane-lg icon_set_1_icon-53"></i> -->
                <select name="" id="trip" class="input-lg form selectx">
                    <option value="2"><?php echo trans('0385'); ?></option>
                    <option value="1"><?php echo trans('0384'); ?></option>
                </select>
            </div>
        </div>
        <div class="col-md-2 col-xs-12">
            <div class="row">
                <label>&nbsp;</label>
                <div class="clearfix"></div>
                <button type="submit" value="<?php echo trans('012'); ?>"  class="btn-warning btn btn-lg btn-block"><?php echo trans('012'); ?></button>
            </div>
        </div>
    </form>
    <script type="text/javascript"> $(function(){ $("#trip").on("change",function(){ var tripVal = $(this).val(); if(tripVal == "1"){ $(".selectReturn").hide(); $(".returnDate").prop("disabled","disabled"); }else{ $(".returnDate").prop("disabled",""); $(".selectReturn").show(); } }) }) </script>
    <!-- End Dohop Flights Search -->
    <?php } elseif ($module == "cartrawler") { ?>
    <!-- Start Cartrawler Form -->
    <form action="<?php echo base_url(); ?>car/" method="GET" target="_self">
        <div class="<?php echo $col2; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0210');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg icon_set_1_icon-41"></i>
                <input required id="ct1" name="startlocation" type="text" class="form input-lg RTL ctlocation" placeholder="<?php echo trans('0210'); ?>" autocomplete="off" required />
                <div id="ct1resp" class="autosuggest col-md-11 col-sm-11"></div>
            </div>
        </div>
        <div class="<?php echo $col2; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0211');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg icon_set_1_icon-41"></i>
                <input id="ct2" name="endlocation" type="text" class="searchInput form input-lg RTL ctlocation" placeholder="<?php echo trans('0211'); ?>" autocomplete="off" />
                <div id="ct2resp" class="autosuggest col-md-11 col-sm-11"></div>
            </div>
        </div>
        <div class="<?php echo $col2; ?> chkin">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0210');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg iconspane-lg icon_set_1_icon-53"></i>
                <input type="text" class="form input-lg checkinsearch RTL icon-calendar dpcd1" name="pickupdate" value="<?php echo $themeData->ctcheckin; ?>" placeholder="<?php echo trans('08'); ?>" required />
            </div>
        </div>
        <div class="<?php echo $col1; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0259'); ?></label>
                <div class="clearfix"></div>
                <select style="padding-left:10px;" class="text-center input-lg form selectx" name="timeDepart">
                    <?php foreach ($themeData->timing as $time) { ?>
                    <option value="<?php echo $time; ?>" <?php makeSelected('10:00', $time); ?> ><?php echo $time; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="<?php echo $col2; ?> chkout" style="margin-bottom: -10px">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0211');?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg iconspane-lg icon_set_1_icon-53"></i>
                <input type="text" class="form input-lg checkinsearch RTL icon-calendar dpcd2" name="dropoffdate" value="<?php echo $ctcheckout; ?>" placeholder="<?php echo trans('08'); ?>" required />
            </div>
        </div>
        <div class="<?php echo $col1; ?>" style="margin-bottom: -10px">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0259'); ?></label>
                <div class="clearfix"></div>
                <!--<i class="iconspane-lg iconspane-lg icon_set_1_icon-53"></i>-->
                <select style="padding-left:10px;" class="text-center input-lg form selectx" name="timeReturn">
                    <?php foreach ($themeData->timing as $time) { ?>
                    <option value="<?php echo $time; ?>" <?php makeSelected('10:00', $time); ?> ><?php echo $time; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <input type="hidden" id="pickuplocation" name="pickupLocationId" value="">
        <input type="hidden" id="returnlocation" name="returnLocationId" value="">
        <input type="hidden" name="clientId" value="<?php echo $themeData->cartrawlerid; ?>">
        <input type="hidden" name="residencyId" value="PK">
        <div class="col-md-2 col-xs-12">
            <div class="row">
                <label>&nbsp;</label>
                <div class="clearfix"></div>
                <input type="submit" value="<?php echo trans('012'); ?>" class="btn-warning btn btn-lg btn-block">
            </div>
        </div>
    </form>
    <!-- End Cartrawler Form -->
    <?php } else { if ($module == "ean") { ?>

        <?php } else { ?>
    <form autocomplete="off" action="<?php echo base_url() . $module; ?>/search" method="GET" role="search">
        <?php } ?>
        <?php if ($module == "cars") { ?>
        <!-- Cars search form -->

        <div class="<?php echo $col2; ?> xxl">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0210');?></label>
                <select name="pickupLocation" class="carsearch chosen-select RTL" id="carlocations" required >
                    <option><?php echo trans('0210'); ?> <?php echo trans('032'); ?></option>
                    <?php foreach ($themeData->carspickuplocationsList as $locations) : ?>
                    <option value="<?php echo $locations->id; ?>" <?php makeSelected($themeData->selectedpickupLocation, $locations->id); ?> ><?php echo $locations->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="<?php echo $col2; ?> xxl">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0211');?></label>
                <select name="dropoffLocation" class="carsearch chosen-select RTL" id="carlocations2" required >
                    <option><?php echo trans('0211'); ?> <?php echo trans('032'); ?></option>
                    <?php foreach ($themeData->carsdropofflocationsList as $locations) : ?>
                    <option value="<?php echo $locations->id; ?>" <?php makeSelected($themeData->selecteddropoffLocation, $locations->id); ?> ><?php echo $locations->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="<?php echo $col2; ?> chkin">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0210');?> <?php echo trans('08'); ?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg iconspane-lg icon_set_1_icon-53"></i>
                <input type="text" class="form input-lg RTL" id="departcar" name="pickupDate" placeholder="<?php echo trans('08'); ?>" value="<?php echo $themeData->checkin; ?>" required>
            </div>
        </div>
        <div class="<?php echo $col1; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0259'); ?></label>
                <div class="clearfix"></div>
                <select style="padding-left:10px;" class="text-center input-lg form selectx car_tab" name="pickupTime">
                    <?php foreach ($themeData->carModTiming as $time) { ?>
                    <option value="<?php echo $time; ?>" <?php makeSelected($themeData->pickupTime, $time); ?> ><?php echo $time; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="<?php echo $col2; ?> chkout">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0211');?> <?php echo trans('08'); ?></label>
                <div class="clearfix"></div>
                <i class="iconspane-lg iconspane-lg icon_set_1_icon-53"></i>
                <input type="text" class="form input-lg RTL" id="returncar" name="dropoffDate" placeholder="<?php echo trans('08'); ?>" value="<?php echo $themeData->checkout; ?>" required>
            </div>
        </div>
        <div class="<?php echo $col1; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0259'); ?></label>
                <div class="clearfix"></div>
                <select style="padding-left:10px;" class="text-center input-lg form selectx car_tab" name="dropoffTime">
                    <?php foreach ($themeData->carModTiming as $time) { ?>
                    <option value="<?php echo $time; ?>" <?php makeSelected($themeData->dropoffTime, $time); ?> ><?php echo $time; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <!-- End Cars search form -->
        <?php } else { ?>
        <div class="go-text-right">
            <?php if ($module == "ean") { ?>
            <!-- Child Ages Modal -->
            <style> .modal-backdrop { z-index: 99; } </style>
            <script> $(function() { google.maps.event.addDomListener(window,"load",function(){new google.maps.places.Autocomplete(document.getElementById("HotelsPlacesEan"))}); }); var loading = false;//to prevent duplicate
  function loadNewContent() {

      // get the current cache location and key..
      var moreResultsAvailable = $("#moreResultsAvailable").val();
      var cacheKey = $("#cacheKey").val();
      var cacheLocation = $("#cacheLocation").val();
      var cachePaging = $("#cachePaging").val();
      var checkin = $(".dpean1").val();
      var checkout = $(".dpean2").val();
      var agesappend = $("#agesappendurl").val();
      var adultsCount = $("#adultsCount").val();


      $('#loader_new').html("<div id='rotatingDiv'></div>");
      var url_to_new_content = '<?php echo base_url(); ?>ean/loadMore';

      $.ajax({
          type: 'POST',
          data: {'moreResultsAvailable': moreResultsAvailable, 'cacheKey': cacheKey, 'cacheLocation': cacheLocation, 'checkin': checkin, 'checkout': checkout,'agesappendurl': agesappend,'adultsCount': adultsCount },
          url: url_to_new_content,
          success: function (data) {

              // document.getElementById('loadNewdata').value = 1;

              if (data != "" && data != "404") {

                  $('#loader_new').html('');
                  loading = false;


                 // $("#latest_record_para").html(data);

                         var newData = data.split("###");

                    $("#latest_record_para").html(newData[0]);

                    $("#New_data_load").append(newData[1]);


              }
              else
              {
                  $('#loader_new').html('');
                  $("#message_noResult").html('');

              }
              //console.log(data);

          }
      });
  }

  //scroll to PAGE's bottom
  var winTop = $(window).scrollTop();
  var docHeight = $(document).height();
  var winHeight = $(window).height();




  $(window).scroll(function () {

      var moreResultsAvailable = $("#moreResultsAvailable").val();
      var foot = $("#footer").offset().top - 500;
      // console.log($(window).scrollTop()+" == "+foot);

      if (moreResultsAvailable != '' && moreResultsAvailable == 1) {

          if ($(window).scrollTop() > foot) {

              if (!loading) {
                  loading = true;
                  loadNewContent();



              }
          }
      }
  }); </script>
            <script type="text/javascript"> $(function(){ $(".childcount").on("change",function(){ var count = $(this).val(); var ages = []; if(count > 0){ for(i = 1; i <= count; i++){ ages.push('0'); } $("#childages").val(ages); $(".ageselect").empty(); addChildsAgeField(count); $("#ages").modal('show'); }else{ $("#childages").val(""); } }) }); function addChildsAgeField(children) { var childagestxt = ''; for (child = 1; child <= children; child++) { var StringChildAge = ''; StringChildAge = '\ <label for="form-input-popover" class="col-sm-4 control-label">'+child+' Age</label><div class="col-sm-8">\n\ <select class="room-child-age form-control" onchange="updateChildAges();">\n\ <option value="0"> Under 1 </option>\n\ <option value="1">1</option>\n\ <option value="2">2</option>\n\ <option value="3">3</option>\n\ <option value="4">4</option>\n\ <option value="5">5</option>\n\ <option value="6">6</option>\n\ <option value="7">7</option>\n\ <option value="8">8</option>\n\ <option value="9">9</option>\n\ <option value="10">10</option>\n\ <option value="11">11</option>\n\ <option value="12">12</option>\n\ <option value="13">13</option>\n\ <option value="14">14</option>\n\ <option value="15">15</option>\n\ <option value="16">16</option>\n\ <option value="17">17</option>\n\ </select></div>'; $(".ageselect").append(StringChildAge); } } function updateChildAges(){ var selectedAges = []; $('.room-child-age option:selected').each(function () { selectedAges.push($(this).val()); }); $("#childages").val(selectedAges); } </script>
            <!-- End Child Ages Modal -->


            <!-- End EAN search input -->
            <!-- Start Modal child ages -->
            <div style="color:black" class="modal fade" id="ages" tabindex="1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm" style="z-index: 9999;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo trans('011'); ?></h4>
                        </div>
                        <div class="modal-body">
                         <div class="form-horizontal ageselect"></div>
                        </div>
                        <div class="clearfix"></div>
                        <br><br>
                        <div class="clearfix"></div>
                        <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo trans('0233'); ?></button> </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ages" tabindex="1" role="dialog" aria-hidden="true" style="margin-top:-70px">
                <div class="modal-dialog modal-sm" style="z-index: 9999;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo trans('011'); ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group form-horizontal ageselect"> </div>
                        </div>
                        <div class="modal-footer"> <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo trans('0233'); ?></button> </div>
                    </div>
                </div>
            </div>
            <!-- End Modal child ages -->
            <?php } else { ?>
            <!-- Start Autosuggest textbox for hotels/tours -->
            <div class="<?php echo $col4; ?>">
                <div class="row">
                  <label class="hidden-xs go-right"><?php echo trans('0254');?></label>
                  <div class="clearfix"></div>
                  <i class="iconspane-lg icon_set_1_icon-41"></i>
                    <input type="text" data-module="<?php echo $module;?>" class="hotelsearch locationlist<?php echo $module;?>" placeholder="<?php if ($module == 'hotels') { echo trans('026'); } elseif ($module == 'tours') { echo trans('0526'); } ?>" value="<?php echo $_GET['txtSearch']; ?>">
                    <input type="hidden" id="txtsearch" name="txtSearch" value="<?php echo $_GET['txtSearch']; ?>">
                </div>
            </div>
            <!-- End Autosuggest textbox for hotels/tours -->
            <?php } ?>
        </div>
        



     <?php if ($module == "hotels" || $module == "ean") { ?>
        <div class="<?php echo $col1; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('011'); ?></label>

                <?php if ($module == "hotels") { ?>
                <div class="clearfix"></div>
                <!--<i class="iconspane-lg icon_set_2_icon-105"></i>-->
                <select name="child" id="child" class="input-lg form selectx">
                    <option selected>0</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>

            <?php } else { ?>
              <div class="clearfix"></div>
                <!--<i class="iconspane-lg icon_set_2_icon-105"></i>-->

                <select class="form selectx childcount" placeholder="<?php echo trans('011'); ?>" name="child" id="child">
                <?php for ($i = 0; $i <= 4; $i++) { ?>
                <option value="<?php echo $i; ?>" <?php makeSelected($themeData->child, $i); ?> > <?php echo $i; ?></option>
                <?php } } ?>
            </select>
        </div>
        </div>

        <?php } ?>



        <?php if ($module == "tours") { ?>
        <div class="<?php echo $col3; ?>">
            <div class="row">
                <label class="hidden-xs go-right"><?php echo trans('0222'); ?></label>
                <div class="clearfix"></div>
                <!--<i class="iconspane-lg icon_set_2_icon-105"></i>-->
                <select class="input-lg form selectx RTL" name="type" id="tourtype" >
                    <option value=""> <?php echo trans('0158'); ?></option>
                    <?php foreach ($themeData->moduleTypes as $ttype) { ?>
                    <option value="<?php echo $ttype->id; ?>" <?php makeSelected($tourType, $ttype->id); ?> ><?php echo $ttype->name; ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php } if ($module == "ean") { ?>
        <input type="hidden" name="childages" id="childages" value="<?php echo $themeData->childages; ?>">
        <input type="hidden" name="search" value="search" >
        <?php } else { ?>
        <input type="hidden" name="searching" class="searching" value="<?php echo $_GET['searching']; ?>"> <input type="hidden" class="modType" name="modType" value="<?php echo $_GET['modType']; ?>">
        <?php } } ?>
        <div class="<?php echo $button; ?>">
            <div class="row">
                <label class="lab hidden-xs hidden-sm">&nbsp;</label>
                <div class="clearfix"></div>
                <button type="submit"  class="btn-warning btn btn-lg btn-block"><?php echo trans('012'); ?></button>
            </div>
        </div>
    </form>
    <?php } } ?>
</div>
<script>
$(function(){
  /** Select2 Autocomplete **/

  $(".locationlist<?php echo $module;?>").select2(
    {
            placeholder: "<?php if(empty($_GET['txtSearch'])){ echo "Enter Location"; }else{ echo @$_GET['txtSearch']; } ?>",
            minimumInputLength: 3,
            width:'100%', maximumSelectionSize: 1,
            initSelection: function (element, callback) {
                    var data = {id: "1", text: "<?php echo @$_GET['txtSearch']; ?>"};
                    callback(data);
                },
            ajax: {
                url: "<?php echo base_url(); ?>home/suggestions/<?php echo $module;?>",
                dataType: 'json',
                data: function (term, page) {
                    return {
                        q: term, // search term

                    };
                },
                results: function (data, page) {
                    return {results: data};
                }
            }
        }
   );

   $(".locationlist<?php echo $module;?>").on("select2-selecting", function(e) {
     $(".modType").val(e.object.module);
     $(".searching").val(e.object.id);
     $("#txtsearch").val(e.object.text);
     console.log(e.object);
  });

  /** End Select2 Autocomplete **/
})
</script>
<?php
}
} //end searchForm function
