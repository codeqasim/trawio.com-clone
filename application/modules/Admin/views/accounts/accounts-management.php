<?php
$validationerrors = validation_errors();
if(isset($errormsg) || !empty($validationerrors)){
?>
<div class="alert alert-danger">
<i class="fa fa-times-circle"></i>
<?php
echo @$errormsg;
echo $validationerrors; ?>
</div>
<?php
}
?>
<form action="" method="POST">
<div class="panel panel-default">
  <div class="panel-heading"><?php echo $headertitle;?></div>
  <div class="panel-body">
    <div class="panel-body">
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">First Name</label>
          <input class="form-control" type="text" placeholder="First name" name="fname" value="<?php echo setFrmVal(@$profile[0]->ai_first_name,set_value('fname')); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Last Name</label>
          <input class="form-control" type="text" placeholder="Last name" name="lname" value="<?php echo setFrmVal(@$profile[0]->ai_last_name,set_value('lname')); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Email</label>
          <input class="form-control" type="email" placeholder="Email address" name="email" value="<?php echo setFrmVal(@$profile[0]->accounts_email,set_value('email')); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Password</label>
          <input class="form-control" type="password" placeholder="Password" name="password">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Mobile Number</label>
          <input class="form-control" type="text" placeholder="Mobile Number" name="mobile" value="<?php echo setFrmVal(@$profile[0]->ai_mobile,set_value('mobile')); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Country</label>
          <select class="chosen-select" name="country" id="">
           <option value="">Please Select</option>
            <?php foreach($countries as $c){ ?>
            <option value="<?php echo $c->iso2;?>" <?php if(setFrmVal(@$profile[0]->ai_country,set_value('country')) == $c->iso2){ echo "selected"; }?> ><?php echo $c->short_name;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Address 1</label>
          <input class="form-control" type="text" placeholder="Full address" name="address1" value="<?php echo setFrmVal(@$profile[0]->ai_address_1,set_value('address1')); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group ">
          <label class="required">Address 2</label>
          <input class="form-control" type="text" placeholder="Full address" name="address2" value="<?php echo setFrmVal(@$profile[0]->ai_address_2,set_value('address2')); ?>">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-md-6">
        <div class="col-md-4">
        <div class="row">
       <div class="form-group ">
          <label class="required">Status</label>
          <select name="status" class="form-control">
          <option value="yes" <?php  makeSelected($profile[0]->accounts_status,"yes"); ?>>Enabled</option>
          <option value="no"  <?php  makeSelected($profile[0]->accounts_status,"no"); ?> >Disabled</option>
          </select>
        </div>

        </div>
        </div>

       

      </div>
     <?php if($profile[0]->accounts_verified == '0'){ ?>
      <div class="col-md-6">
      <div class="col-md-12">
        <div class="row">
         <span id="<?php echo $profile[0]->accounts_id;?>" class="btn btn-primary pull-right verify">Send Verification Details</span>
        </div>
      </div>
      </div>
      <?php } ?>
      <div class="clearfix"></div>
      <?php if($type == "supplier"){ ?>
       <div class="col-md-6">
    
        <div class="form-group">
          <label>Supplier For</label>
          <select name="applyfor" class="form-control">
          <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ $isenabled = $this->ptmodules->is_main_module_enabled($md); if($isenabled){ ?>
          <option value="<?php echo $md;?>" <?php makeSelected($md, strtolower($appliedFor)); ?> > <?php echo $md; ?> </option>
          <?php } } } ?>
          </select>
     
        
        </div>
        </div>
        
        
        <div class="col-md-6">

         <div class="form-group">
          <label>Name</label>
      <input class="form-control" type="text" placeholder="Name" name="itemname" value="<?php echo @$propertyName;?>">

        </div>
        </div>
        <?php } ?>



      <div class="col-md-6">
        <div class="col-md-12">
        <div class="row">
        <label>
              <input class="checkbox" type="checkbox" name="newssub" value="1" <?php if(setFrmVal(@$isSubscribed,set_value('newssub'))){ echo "checked"; }?> > <strong>Email Newsletter Subscriber</strong>
        </label>

        </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <hr>
      <div class="clearfix"></div>
     <?php if($type == "supplier"){  if(@$chkinghotels){ ?>

      <div class="col-md-12">
        <div class="form-group ">
          <label class="required">Assign Hotels</label>
          <select class="chosen-multi-select" name="hotels[]" id="" multiple>
            <?php foreach($hotels as $hotel){ ?>
            <option value="<?php echo $hotel->hotel_id;?>" <?php if(in_array($hotel->hotel_id,@$userhotels)){ echo "selected"; } ?> ><?php echo $hotel->hotel_title;?></option>
            <?php } ?>
          </select>
        </div>
      </div>

     <?php } if(@$chkingtours){ ?>

      <div class="col-md-12">
        <div class="form-group ">
          <label class="required">Assign Tours</label>
          <select class="chosen-multi-select" name="tours[]" id="" multiple>
            <?php foreach($tours as $tour){ ?>
            <option value="<?php echo $tour->tour_id;?>" <?php if(in_array($tour->tour_id,@$usertours)){ echo "selected"; } ?> ><?php echo $tour->tour_title;?></option>
            <?php } ?>
          </select>
        </div>
      </div>

     <?php } if(@$chkingcars){ ?>

      <div class="col-md-12">
        <div class="form-group ">
          <label class="required">Assign Cars</label>
          <select class="chosen-multi-select" name="cars[]" id="" multiple>
            <?php foreach($cars as $car){ ?>
            <option value="<?php echo $car->car_id;?>" <?php if(in_array($car->car_id,@$usercars)){ echo "selected"; } ?> ><?php echo $car->car_title;?></option>
            <?php } ?>
          </select>
        </div>
      </div>

     <?php } ?>

     <?php } ?>
      <div class="clearfix"></div>
      <?php if($type == "admin" || $type == "supplier"){   ?>
      <hr>

      <div class="row">
      <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Add</div>
        <div class="panel-body">
         <ul class="list-unstyled">
        <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ $isenabled = $this->ptmodules->is_main_module_enabled($md); if($isenabled){  ?>
      <li>
      <label>
          <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "add".$md;?>" <?php if(in_array("add".$md,$permitted) || set_value('permissions[]') == "add".$md){ echo "checked"; } ?>   > <?php echo ucfirst($md);?>
      </label>
      </li>
         <?php } } } ?>
            <li>
      <label>
          <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "addbooking";?>" <?php if(in_array("addbooking",$permitted) || set_value('permissions[]') == "addbooking"){ echo "checked"; } ?>   > Bookings
      </label>
      </li>   

      <li>
              <label>
                  <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "addlocations";?>" <?php if(in_array("addlocations",$permitted) || set_value('permissions[]') == "addlocations"){ echo "checked"; } ?>   > Locations
              </label>
      </li>


   <!--    <li>
   <label>
       <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "addextras";?>" <?php if(in_array("addextras",$permitted) || set_value('permissions[]') == "addextras"){ echo "checked"; } ?>   > Extras
   </label>
   </li> -->

         </ul>
        </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Edit </div>
        <div class="panel-body">
        <ul class="list-unstyled">
        <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ $isenabled = $this->ptmodules->is_main_module_enabled($md); if($isenabled){ ?>
        <li>
        <label><input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "edit".$md;?>" <?php if(in_array("edit".$md,$permitted) || set_value('permissions[]') == "edit".$md){ echo "checked"; } ?>  > <?php echo ucfirst($md);?></label>
        </li>
        <?php } } } ?>
     <li>
      <label>
          <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "editbooking";?>" <?php if(in_array("editbooking",$permitted) || set_value('permissions[]') == "editbooking"){ echo "checked"; } ?>   > Bookings
      </label>
      </li>

          <li>
              <label>
                  <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "editlocations";?>" <?php if(in_array("editlocations",$permitted) || set_value('permissions[]') == "editlocations"){ echo "checked"; } ?>   > Locations
              </label>
        </li>

    <!--   <li>
    <label>
        <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "editextras";?>" <?php if(in_array("editextras",$permitted) || set_value('permissions[]') == "editextras"){ echo "checked"; } ?>   > Extras
    </label>
    </li> -->


        </ul>
        </div>
      </div>
      </div>

      <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">Remove</div>
        <div class="panel-body">
        <ul class="list-unstyled">
        <?php foreach($mainmodules as $md) { if($md != "smsaddon"){ $isenabled = $this->ptmodules->is_main_module_enabled($md); if($isenabled){ ?>
        <li>
          <label><input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "delete".$md;?>" <?php if(in_array("delete".$md,$permitted) || set_value('permissions[]') == "delete".$md){ echo "checked"; } ?>  > <?php echo ucfirst($md);?></label>
        </li>
        <?php } } } ?>
         <li>
      <label>
          <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "deletebooking";?>" <?php if(in_array("deletebooking",$permitted) || set_value('permissions[]') == "deletebooking"){ echo "checked"; } ?>   > Bookings
      </label>
      </li>

      <li>
              <label>
                  <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "deletelocations";?>" <?php if(in_array("deletelocations",$permitted) || set_value('permissions[]') == "deletelocations"){ echo "checked"; } ?>   > Locations
              </label>
        </li>

      <!-- <li>
      <label>
          <input class="checkbox" type="checkbox" name="permissions[]" value="<?php echo "deleteextras";?>" <?php if(in_array("deleteextras",$permitted) || set_value('permissions[]') == "deleteextras"){ echo "checked"; } ?>   > Extras
      </label>
      </li> -->

        </ul>
        </div>
      </div>
      </div>
    </div>
   <?php } ?>
  </div>
  </div>
  <div class="panel-footer">
  <input type="hidden" name="<?php echo $viewtype;?>" value="1" />
  <input type="hidden" name="type" value="<?php echo $type;?>" />
  <input type="hidden" name="oldemail" value="<?php echo @$profile[0]->accounts_email;?>" />
    <button class="btn btn-primary">Submit</button>
  </div>
  </div>

</form>
<script type="text/javascript">
  $(function(){

    $(".verify").on("click",function(){ 
      var id = $(this).prop('id');
      var accType = "<?php echo $type;?>";
      var ask = confirm("Proceed to Verify this user.");
      if(ask){
        $.post("<?php echo base_url();?>admin/ajaxcalls/verifyAccount", {id: id, accType: accType}, function(resp){
          location.reload();
        });

      }else{
        return false;
      }

    })
  })
</script>




