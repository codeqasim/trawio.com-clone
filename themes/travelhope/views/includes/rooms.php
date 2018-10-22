<section id="ROOMS">
<div class="panel panel-default">
                            <div class="panel-heading panel-inverse"><span class="go-right"><?php echo trans('0155'); ?></span>
                            <?php if(!empty($rooms)){ ?>
                            <span class="pull-right go-left"><strong><i class="icon_set_1_icon-83"></i> <?php echo trans('0122');?></strong> <?php echo $modulelib->stay; ?> </span>
                            <?php } ?>
                            <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                              <form class="row" action="" method="GET">
                            <div class="col-xs-6 col-md-3 col-sm-3 go-right">
                    <div class="form-group">
                        <label class="size12 RTL go-right"><i class="icon-calendar-7"></i> <?php echo trans('07');?></label>
                        <input type="text" placeholder="<?php echo trans('07');?>" name="checkin" class="form-control dpd1rooms" value="<?php echo $checkin;?>" required>
                    </div>
                </div>
                <div class="col-xs-6 col-md-3 col-sm-3 go-right">
                    <div class="form-group">
                        <label class="size12 RTL go-right"><i class="icon-calendar-7"></i> <?php echo trans('09');?></label>
                        <input type="text" placeholder="<?php echo trans('09');?>" name="checkout" class="form-control dpd2rooms" value="<?php echo $checkout;?>" required>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-2 col-md-2 col-sm-2 go-right">
                    <div class="form-group">
                        <label class="size12 RTL go-right"><i class="icon-user-7"></i> <?php echo trans('010');?></label>
                        <select class="mySelectBoxClass form-control" name="adults" id="adults" value="<?php echo $modulelib->adults;?>">
                            <?php for($Selectadults = 1; $Selectadults < 11;$Selectadults++){ ?>
                            <option value="<?php echo $Selectadults;?>" <?php if($Selectadults == $modulelib->adults){ echo "selected"; } ?> > <?php echo $Selectadults;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-2 col-md-2 col-sm-2 go-right">
                    <div class="form-group">
                        <label class="size12 RTL go-right"><i class="icon-user-7"></i> <?php echo trans('011');?></label>
                        <select class="mySelectBoxClass form-control" name="child" id="child" value="<?php echo $modulelib->children;?>">
                            <?php for($Selectchild = 0; $Selectchild < 6;$Selectchild++){ ?>
                            <option value="<?php echo $Selectchild;?>" <?php if($Selectchild == $modulelib->children){ echo "selected"; } ?> > <?php echo $Selectchild;?> </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-2 col-lg-2 col-sm-2 go-right">
                    <label>&nbsp;</label>
                    <button class="btn btn-block btn-success-small textupper"><?php echo trans('0106');?></button>
                    <input type="hidden" id="loggedin" value="<?php echo $usersession;?>" />
                    <input type="hidden" id="itemid" value="<?php echo $module->id; ?>" />
                    <input type="hidden" id="module" value="<?php echo $appModule;?>" />
                    <input type="hidden" id="addtxt" value="<?php echo trans('029');?>" />
                    <input type="hidden" id="removetxt" value="<?php echo trans('028');?>" />
                </div>
                     </form>
                            </div>
                        </div>

        <?php if(!empty($modulelib->stayerror)){ ?>
        <div class="panel-body">
            <div class="alert alert-danger go-text-right">
                <?php echo trans("0420"); ?>
            </div>
        </div>
        <?php } ?>
        <?php if(!empty($rooms)){ ?>
        <?php foreach($rooms as $r){ if($r->maxQuantity > 0){ ?>
        <form class="panel" action="<?php echo base_url().$appModule;?>/book/<?php echo $module->bookingSlug;?>" method="GET">
            <input type="hidden" name="adults" value="<?php  echo $modulelib->adults; ?>" />
            <input type="hidden" name="child" value="<?php  echo $modulelib->children; ?>" />
            <input type="hidden" name="checkin" value="<?php  echo $modulelib->checkin; ?>" />
            <input type="hidden" name="checkout" value="<?php  echo $modulelib->checkout; ?>" />
            <input type="hidden" name="roomid" value="<?php echo $r->id; ?>" />
            <div class="rooms-update" style="margin-top:0px;margin-bottom:0px">
                <div class="col-lg-4 col-md-4 col-sm-4 offset-0 go-right">
                    <div class="zoom-gallery<?php echo $r->id; ?>">
                        <a href="<?php echo $r->thumbnail;?>" data-source="<?php echo $r->thumbnail;?>" title="<?php echo $r->title;?>">
                        <img class="img-responsive" src="<?php echo $r->thumbnail;?>">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 offset-0">
                    <div class="labelright go-left" style="min-width:180px;margin-left:5px">
                        <?php  if($r->price > 0){ ?>
                        <button style="margin-bottom:5px" type="submit" class="btn btn-action btn-block chk"><?php echo trans('0142');?></button>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="fs12"><?php echo trans('0374');?></h5>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="labelleft2 rtl_title_home go-text-right RTL">
                        <h4 class="mtb0 RTL go-text-right">
                            <b><?php echo $r->title;?></b>
                            <span class="pull-right">
                                <span class="green size18">
                                <?php  if($r->price > 0){ ?>
                                <b>
                                <small><?php echo $r->currCode;?>  </small> <?php echo $r->currSymbol; ?><?php echo $r->price; ?>
                                </b></span><br/>
                                <span class="fs12"><?php echo trans('070');?> <?php echo $modulelib->stay; ?> <?php echo trans('0122');?></strong> </span>
                                <div class="clearfix"></div>
                                <?php } ?>
                            </span>
                        </h4>
                        <h5 style="color:#8A8A8A"><?php echo trans('010');?> <?php echo $r->Info['maxAdults'];?> <?php echo trans('011');?> <?php echo $r->Info['maxChild'];?></h5>
                        <div class="col-md-6 visible-lg visible-md go-right" id="accordion" style="margin-top: 0px;">
                            <div class="row">
                                <button data-toggle="collapse" data-parent="#accordion" class="hidden-xs btn btn-danger btn-sm"  href="#details<?php echo $r->id;?>"><?php echo trans('052');?></button>
                                <button data-toggle="collapse" data-parent="#accordion" href="#availability<?php echo $r->id;?>" class="hidden-xs btn btn-info btn-sm"><?php echo trans('0251');?></button>
                            </div>
                        </div>
                        <br><br><br>
                        <!--<p class="grey RTL"><?php echo character_limiter($r->desc, 280);?></p>-->
                        <br/>
                        <ul class="hotelpreferences go-right hidden-xs">
                            <?php $cnt = 0; foreach($item->amenities as $amt){ $cnt++; if($cnt <= 10){ if(!empty($amt->name)){ ?>
                            <img title="<?php echo $amt->name;?>" data-toggle="tooltip" data-placement="top" style="height:25px;" src="<?php echo $amt->icon;?>" alt="<?php echo $amt->name;?>" />
                            <?php } } } ?>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </form>
        <div class="clearfix"></div>
        <div id="availability<?php echo $r->id;?>" class="alert alert-info panel-collapse collapse">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-12 col-lg-5">
                        <div class="form-group">
                            <select id="<?php echo $r->id;?>" class="form-control showcalendar">
                                <option value="0"><?php echo trans('0232');?></option>
                                <option value="<?php echo $first;?>"> <?php echo $from1;?> - <?php echo $to1;?></option>
                                <option value="<?php echo $second;?>"> <?php echo $from2;?> - <?php echo $to2;?></option>
                                <option value="<?php echo $third;?>"> <?php echo $from3;?> - <?php echo $to3;?></option>
                                <option value="<?php echo $fourth;?>"> <?php echo $from4;?> - <?php echo $to4;?></option>
                            </select>
                        </div>
                    </div>
                    <div id="roomcalendar<?php echo $r->id;?>"></div>
                </div>
            </div>
        </div>
        <div id="details<?php echo $r->id;?>" class="alert alert-danger panel-collapse collapse">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="magnific-gallery row">
                        <?php foreach($r->Images as $Img){ if($r->thumbnail != $Img['thumbImage']){ ?>
                        <div class="col-md-3">
                            <div class="zoom-gallery<?php echo $r->id; ?>">
                                <a href="<?php echo $Img['thumbImage'];?>" data-source="<?php echo $Img['thumbImage'];?>" title="<?php echo $r->title;?>">
                                <img class="img-responsive" src="<?php echo $Img['thumbImage'];?>">
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
                    <div class="clearfix"></div>
                    <br>
                    <?php if(!empty($r->desc)){ ?>
                    <p><strong><?php echo trans('046');?> : </strong> <?php echo $r->desc;?></p>
                    <?php } ?>
                    <hr>
                    <?php if(!empty($r->Amenities)){ ?>
                    <p><strong><?php echo trans('055');?> : </strong></p>
                    <?php foreach($r->Amenities as $roomAmenity){ if(!empty($roomAmenity->name)){ ?>
                    <div class="col-md-4">
                        <ul class="list_ok">
                            <li><?php echo $roomAmenity->name;?></li>
                        </ul>
                    </div>
                    <?php } } } ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="offset-2">
        </div>
        <?php } ?>
        <?php } }else{ echo trans("066"); }?>
</section>
