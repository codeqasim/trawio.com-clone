<style>.mob-bg{display:none !important;}</style>
<div class="hidden-xs"><br></div>
<table class="table table-striped table-hover table-bordered table-responsive">
    <thead>
        <tr>
            <th style="width: 74px;"><?php echo trans('0376');?></th>
            <th><?php echo trans('046');?></th>
            <th><?php echo trans('0123');?></th>
            <th><?php echo trans('0150');?></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><img style="width:55px" src="<?php echo $invoice->thumbnail;?>" class="img-responsive"></td>
            <td>
                <strong><?php echo $invoice->title;?></strong>
                <div class="clearfix"></div>
                <a href="javascript:void(0);"><i style="margin-left: -5px;" class="icon-location-6"></i><?php echo $invoice->location;?> </a> <?php echo $invoice->stars;?>
                <div class="clearfix form-group"></div>
                <!-- Start Hotels Section -->
                <?php if($invoice->module == "hotels"){ ?>
                <strong><?php echo trans('07');?> : </strong> <?php echo $invoice->checkin; ?> <strong><?php echo trans('09');?> : </strong> <?php echo $invoice->checkout; ?><br>
                <span class="strong"> <?php echo trans('0435');?> </span> : <?php echo $invoice->subItem->title;?>
                <?php echo trans('060');?> : <?php echo $invoice->nights;?> / <?php echo $invoice->currSymbol;?><?php echo $invoice->subItem->price;?> <!--<span class="text-primary strong"><?php echo $invoice->currSymbol;?><?php echo $invoice->subItem->totalNightsPrice;?> </span>-->
                <?php } ?>
                <!-- End Hotels Section -->
                <!-- Start Tours Section -->
                <?php if($invoice->module == "tours"){ ?>
                <strong><?php echo trans('07');?> : </strong> <?php echo $invoice->checkin; ?>
                <?php } ?>
                <!-- Start Tours Section -->
                <!-- Start Cars Section -->
                <?php if($invoice->module == "cars"){ ?>
                <strong><?php echo trans('08');?> : </strong> <?php echo $invoice->date; ?><br>
                <strong><?php echo trans('0275');?> : </strong> <?php echo $invoice->nights; ?><br>
                <strong><?php echo trans('0210');?> : </strong> <?php echo $invoice->bookedItemInfo->pickupLocation; ?><br>
                <strong><?php echo trans('0211');?> : </strong> <?php echo $invoice->bookedItemInfo->dropoffLocation; ?><br>
                <strong><?php echo trans('0210');?> <?php echo trans('08'); ?> : </strong> <?php echo $invoice->bookedItemInfo->pickupDate; ?><br>
                <strong><?php echo trans('0210');?> <?php echo trans('0259'); ?> : </strong> <?php echo $invoice->bookedItemInfo->pickupTime; ?><br>
                <strong><?php echo trans('0211');?> <?php echo trans('08'); ?> : </strong> <?php echo $invoice->bookedItemInfo->dropoffDate; ?><br>
                <strong><?php echo trans('0211');?> <?php echo trans('0259'); ?> : </strong> <?php echo $invoice->bookedItemInfo->dropoffTime; ?><br>
                <?php } ?>
                <!-- End Cars Section -->
            </td>
            <td class="text-center"><?php echo $invoice->subItem->quantity;?></td>
            <td class="text-center"> <?php if(!empty($invoice->subItem->total)){ echo $invoice->currSymbol;?><?php echo $invoice->subItem->total; }?></td>
        </tr>
        <!-- Start Tours Section -->
        <?php if($invoice->module == "tours"){ ?>
        <tr>
            <td></td>
            <th scope="row"><?php echo trans('010');?> <span class="weak"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol;?><?php echo str_replace(".00",'',number_format($invoice->subItem->adults->price,2));?></span></th>
            <td class="text-center"><?php echo $invoice->subItem->adults->count;?></td>
            <td class="text-center adultPrice"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol;?><?php echo str_replace(".00",'',number_format($invoice->subItem->adults->price * $invoice->subItem->adults->count,2));?></td>
            </tr class="text-center"><?php if($invoice->subItem->child->count > 0){ ?>
        <tr>
            <td></td>
            <th scope="row"><?php echo trans('011');?> <span class="weak"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol;?><?php echo $invoice->subItem->child->price;?></span></th>
            <td class="text-center"><?php echo $invoice->subItem->child->count;?></td>
            <td class="text-center childPrice"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol;?><?php echo $invoice->subItem->child->price * $invoice->subItem->child->count;?></td>
        </tr>
        <?php } if($invoice->subItem->infant->count > 0){ ?>
        <tr>
            <td></td>
            <th scope="row"><?php echo trans('0282');?> <span class="weak"> <?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol;?><?php echo $invoice->subItem->infant->price;?></span></th>
            <td class="text-center"><?php echo $invoice->subItem->infant->count;?></td>
            <td class="text-center childPrice"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol;?><?php echo $invoice->subItem->infant->price * $invoice->subItem->infant->count;?></td>
        </tr>
        <?php } ?>
        <?php } ?>
        <!-- End Tours Section -->
        <?php if($invoice->extraBeds > 0){ ?>
        <tr>
            <td><img style="width:55px" src="<?php echo base_url(); ?>uploads/global/extrabed.jpg" class="img-responsive"></td>
            <td><?php echo trans('0428');?></td>
            <td class="text-center"><?php echo $invoice->extraBeds; ?></td>
            <td class="text-center"><?php echo $invoice->currSymbol; ?><?php echo $invoice->extraBedsCharges; ?></td>
        </tr>
        <?php } ?>
        <?php if(!empty($invoice->bookingExtras)){ ?>
        <?php foreach($invoice->bookingExtras as $extra){ ?>
        <tr>
            <td><img style="width:55px" src="<?php echo $extra->thumbnail;?>" class="img-responsive"></td>
            <td><?php echo $extra->title;?></td>
            <td class="text-center">1</td>
            <td class="text-center">
                <?php echo $invoice->currSymbol.$extra->price;?> <!-- <?php echo $invoice->currCode." ".$invoice->currSymbol.$extra->price;?> -->
            </td>
        </tr>
        <?php } } ?>
        <tr>
            <td></td>
            <td></td>
            <td class="text-right"><?php echo trans('0153');?></td>
            <td class="text-center"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol; ?><?php echo str_replace(".00",'',number_format($invoice->tax,2));?></td>
        </tr>
        <tr style="font-weight:bold;font-size:18px">
            <td></td>
            <td></td>
            <td class="text-right"><?php echo trans('0124');?></td>
            <td class="text-center"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol; ?><?php echo str_replace(".00",'',number_format($invoice->checkoutTotal,2));?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td class="text-right"><?php echo trans('0126');?></td>
            <td class="text-center"><?php echo $invoice->currCode; ?> <?php echo $invoice->currSymbol; ?><?php echo str_replace(".00",'',number_format($invoice->checkoutAmount,2)); ?></td>
        </tr>
        <?php if($invoice->couponRate > 0){ ?>
        <div style="margin-bottom:0px;padding: 5px;" class="alert alert-success"><i class="text-success fa fa-check"></i> <?php echo trans('0518');?> <?php echo $invoice->couponRate; ?>%</div>
        <?php } ?> <!-- discount alert -->
    </tbody>
</table>
<!-- Guest Info Table -->
<?php $chk = (array)$invoice->guestInfo; $chk1 = reset($chk); ?>
<?php if(!empty($chk1->name)){ ?>
<table class="table table-bordered hidden-xs">
    <thead>
        <tr>
            <th  style="line-height: 1.428571;"><?php echo trans('0350');?></th>
            <th style="line-height: 1.428571;"><?php echo trans('0523');?></th>
            <th  style="line-height: 1.428571;" class="text-center"><?php echo trans('0524');?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($invoice->guestInfo as $guest){ ?>
        <tr>
            <td><?php echo $guest->name;?></td>
            <td><?php echo $guest->passportnumber;?></td>
            <td><?php echo $guest->age;?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php } ?>
<!-- End Guest Info Table -->
<div class="clearfix"></div>
<?php if(!empty($invoice->additionaNotes)){ ?>
<div class="panel panel-default hidden-xs">
    <div class="panel-heading"><?php echo trans('0178');?></div>
    <div class="panel-body">
        <p><?php echo $invoice->additionaNotes;?></p>
    </div>
</div>
<?php } ?>
<div class="clearfix"></div>


