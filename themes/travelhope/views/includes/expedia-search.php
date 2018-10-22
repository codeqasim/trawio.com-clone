<form autocomplete="off" action="<?php echo base_url().EANSLUG; ?>search" method="GET" role="search">
    <div class="col-xs-12 form-group go-right col-xs-12">
        <div class="row">
            <label class="go-right"><?php echo trans('08'); ?></label>
            <div class="clearfix"></div>
            <input required id="citiesInput" name="city" type="text" class="input-lg form-control RTL" placeholder="<?php echo trans('09'); ?>" value="<?php if(empty($_GET['city'])){ echo @ $searchingTxt; }else{ echo $_GET['city']; } ?>" required />
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row form-group">
        <div class="col-md-6">
            <label class="go-right"><?php echo trans('010'); ?></label>
            <div class="ui calendar" id="rangestart">
                <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input name="checkin" type="text" placeholder="<?php echo trans('010'); ?>" value="<?php echo $eancheckin;  ?>">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="go-right"><?php echo trans('011'); ?></label>
            <div class="ui calendar" id="rangeend">
                <div class="ui input left icon">
                    <i class="calendar icon"></i>
                    <input name="checkout" type="text" placeholder="<?php echo trans('011'); ?>" value="<?php echo $eancheckout; ?>">
                </div>
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
    <div class="row form-group">
        <div class="form-group go-right col-xs-4 col-sm-4">
            <label class="go-right"><?php echo trans('012'); ?></label>
            <div class="clearfix"></div>
            <div class="ui selection dropdown">
                <input type="hidden" name="rooms" value="1">
                <i class="dropdown icon"></i>
                <div class="default text"><?php echo trans('012'); ?></div>
                <div class="menu">
                    <div class="item" data-value="1">1</div>
                    <div class="item" data-value="2">2</div>
                    <div class="item" data-value="3">3</div>
                    <div class="item" data-value="4">4</div>
                    <div class="item" data-value="5">5</div>
                </div>
            </div>
        </div>
        <div class="form-group go-right col-xs-4">
            <label class="go-right"><?php echo trans('013'); ?></label>
            <div class="clearfix"></div>
            <div class="ui selection dropdown">
                <input type="hidden" name="adults" value="<?php echo $adults; ?>">
                <i class="dropdown icon"></i>
                <div class="default text"><?php echo trans('013'); ?></div>
                <div class="menu">
                    <div class="item" data-value="1">1</div>
                    <div class="item" data-value="2">2</div>
                    <div class="item" data-value="3">3</div>
                    <div class="item" data-value="4">4</div>
                    <div class="item" data-value="5">5</div>
                </div>

            </div>
        </div>
        <div class="form-group go-right col-xs-4">
            <label class="go-right"><?php echo trans('014'); ?></label>
            <div class="clearfix"></div>
            <select class="ui dropdown childcount" name="child" id="child">
              <option value=""><?php echo trans('014'); ?></option>
              <?php for($c = 1;$c <=5;$c++){ ?>
              <option value="<?php echo $c;?>" <?php if($c == $child){ echo "selected"; } ?> > <?php echo $c;?> </option>
              <?php  } ?>
            </select>
            <!-- <div class="ui selection dropdown">
                <input type="hidden" name="child" value="0">
                <i class="dropdown icon"></i>
                <div class="default text"><?php echo trans('014'); ?></div>
                <div class="menu">
                    <div class="item" data-value="0">0</div>
                    <div class="item" data-value="1">1</div>
                    <div class="item" data-value="2">2</div>
                    <div class="item" data-value="3">3</div>
                    <div class="item" data-value="4">4</div>
                    <div class="item" data-value="5">5</div>
                </div>
            </div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="clearfix"></div>
            <input type="hidden" name="childages" id="childages" value="">
            <input type="hidden" name="search" value="search">
            <button type="submit" class="search btn-success btn btn-lg btn-block"><?php echo trans('015'); ?></button>
        </div>
        <div class="clearfix"></div>
    </div>
</form>

<script type="text/javascript"> $(function(){ $(".childcount").on("change",function(){ $("#ages").modal("show");
var count = $(this).val(); var ages = []; if(count > 0){ for(i = 1; i <= count; i++){ ages.push('0'); } $("#childages").val(ages);
$(".ageselect").empty(); addChildsAgeField(count);
$("#ages").modal('show'); }else{ $("#childages").val(""); } }) });
function addChildsAgeField(children) { var childagestxt = '';
 for (child = 1; child <= children; child++) { var StringChildAge = ''; StringChildAge = '\ <label for="form-input-popover" class="col-sm-4 control-label">'+child+' Age</label><div class="col-sm-8">\n\ <select class="room-child-age form-control" onchange="updateChildAges();">\n\ <option value="0"> Under 1 </option>\n\ <option value="1">1</option>\n\ <option value="2">2</option>\n\ <option value="3">3</option>\n\ <option value="4">4</option>\n\ <option value="5">5</option>\n\ <option value="6">6</option>\n\ <option value="7">7</option>\n\ <option value="8">8</option>\n\ <option value="9">9</option>\n\ <option value="10">10</option>\n\ <option value="11">11</option>\n\ <option value="12">12</option>\n\ <option value="13">13</option>\n\ <option value="14">14</option>\n\ <option value="15">15</option>\n\ <option value="16">16</option>\n\ <option value="17">17</option>\n\ </select></div>';
 $(".ageselect").append(StringChildAge); }
} function updateChildAges(){ var selectedAges = []; $('.room-child-age option:selected').each(function () { selectedAges.push($(this).val()); });
$("#childages").val(selectedAges); }
</script>


<!-- Start Modal child ages -->

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
