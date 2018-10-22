<?php  if(pt_main_module_available('cartrawler')){ ?>
<style>
   .autosuggest {
    margin-left: -1px;
    position: absolute;
    z-index: 10003;
    cursor: pointer;
    color: rgba(99, 99, 99, 0.83);
    width: 92.5%;
    margin-top: -1px;
    padding-right: 0px !important;
    padding-left: 0px !important;
    border-radius: 0px 0px 4px 4px;
   }
   .autosuggest ul {
   list-style: none;
   padding: 0;
   margin-bottom: 0;
       background-color: #3D51B4;
    color: #fff;
   }
   .autosuggest ul li {
   padding: 5px 10px;
   border-bottom: 1px solid;
   }
   .autosuggest ul li:hover {
   color: #fff;
   background: #3875d7;
   }
   .autosuggest ul li:last-child {
   border-bottom: none;
   }
   .highlight {
   background: white;
   color: #595959;
   }
</style>
<form style="margin-top:-20px" action="<?php echo base_url();?>car/" method="GET" target="_self">
   <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      <div class="form-group">
            <label class="control-label go-right"><i class="icon_set_1_icon-21"></i> <?php echo trans('0210');?></label>
         <input required id="ct1" name="startlocation" type="text" class="form-control input-lg RTL search-location form-control-icon ctlocation" placeholder="<?php echo trans('0210');?>" autocomplete="off" required />
         <div id="ct1resp" class="autosuggest col-md-11 col-sm-11"></div>
      </div>
   </div>
   <div class="col-md-6 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
         <div class="clearfix"></div>
         <label class="control-label go-right"><i class="icon-calendar-7"></i> <?php echo trans('0472');?></label>
         <input type="text" class="form-control-icon form-control checkinsearch RTL icon-calendar dpcd1" name="pickupdate" value="" placeholder="<?php echo trans('08');?>" required />
      </div>
   </div>

    <div class="col-md-6 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
         <div class="clearfix"></div>
         <label class="control-label go-right"><i class="icon_set_1_icon-38"></i> <?php echo trans('0259');?></label>
         <select class="form-control" name="timeDepart">
        <?php foreach($timing as $time){ ?>
        <option value="<?php echo $time; ?>" <?php makeSelected('10:00',$time); ?> ><?php echo $time; ?></option>
        <?php } ?>
        </select>
      </div>

   </div>

   <div class="clearfix"></div>

   <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      <div class="form-group">
            <label class="control-label go-right"><i class="icon_set_1_icon-21"></i> <?php echo trans('0211');?></label>
         <input id="ct2" name="endlocation" type="text" class="form-control input-lg RTL search-location form-control-icon ctlocation" placeholder="<?php echo trans('0211');?>" autocomplete="off" />
         <div id="ct2resp" class="autosuggest col-md-11 col-sm-11"></div>
      </div>
   </div>

   <div class="col-md-6 col-sm-6 col-xs-6 go-right">
      <div class="form-group">
         <div class="clearfix"></div>
         <label class="control-label go-right"><i class="icon-calendar-7"></i> <?php echo trans('0473');?></label>
         <input type="text" class="form-control-icon form-control checkinsearch RTL icon-calendar dpcd2" name="dropoffdate" value="" placeholder="<?php echo trans('08');?>" required />
      </div>

   </div>

     <div class="col-md-6 col-sm-6 col-xs-6 go-right">
      <div class="form-group" >
         <div class="clearfix"></div>
         <label class="control-label go-right"><i class="icon_set_1_icon-38"></i> <?php echo trans('0259');?></label>
        <select class="form-control" name="timeReturn">
        <?php foreach($timing as $time){ ?>
        <option value="<?php echo $time; ?>" <?php makeSelected('10:00',$time); ?> ><?php echo $time; ?></option>
        <?php } ?>
        </select>
      </div>

   </div>

      <div class="clearfix"></div>

     <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12">
      <div class="clearfix"></div>
      <input type="hidden" id="pickuplocation" name="pickupLocationId" value="">
      <input type="hidden" id="returnlocation" name="returnLocationId" value="">
      <input type="hidden" name="clientId" value="<?php echo $cartrawlerid;?>">
      <input type="hidden" name="residencyId" value="PK">
      <input type="submit" value="<?php echo trans('012');?>" style="color:#fff" class="btn btn-lg btn-primary green btn-block">
  </div>
</form>
<div class="clearfix"></div>
<?php } ?>