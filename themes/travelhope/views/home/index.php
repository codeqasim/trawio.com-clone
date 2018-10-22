<?php require $themeurl.'views/home/slider.php';?>
<section class="container infotabs">
    <h2 class="text-center"><?php echo trans('003'); ?></h2>
    <br>
    <div class="tab col-md-3 col-xs-12">
        <img src="<?php echo $theme_url; ?>assets/img/icons/air.png" class="center-block img-responsive" alt="" />
        <h4 class="bold"><?php echo trans('004'); ?></h4>
        <p class="text-muted"><?php echo trans('005'); ?></p>
    </div>
    <div class="tab col-md-3 col-xs-12">
        <img src="<?php echo $theme_url; ?>assets/img/icons/hotels.png" class="center-block img-responsive" alt="" />
        <h4 class="bold"><?php echo trans('006'); ?></h4>
        <p class="text-muted"><?php echo trans('007'); ?></p>
    </div>
    <div class="tab col-md-3 col-xs-12">
        <img src="<?php echo $theme_url; ?>assets/img/icons/tours.png" class="center-block img-responsive" alt="" />
        <h4 class="bold"><?php echo trans('008'); ?></h4>
        <p class="text-muted"><?php echo trans('009'); ?></p>
    </div>
    <div class="tab col-md-3 col-xs-12">
        <img src="<?php echo $theme_url; ?>assets/img/icons/cars.png" class="center-block img-responsive" alt="" />
        <h4 class="bold"><?php echo trans('0010'); ?></h4>
        <p class="text-muted"><?php echo trans('0011'); ?></p>
    </div>
</section>
<br><br><br>
<section class="container">
    <div class="text-center">
        <h2><?php echo trans('0012'); ?></h2>
        <p><?php echo trans('0013'); ?></p>
    </div>
    <div class="col-md-6 col-xs-12 pull-right">
        <img src="<?php echo $theme_url; ?>assets/img/icons/business-register.png" class="center-block img-responsive" alt="<?php echo trans('0014'); ?>" />
        <div class="col-md-2"></div>
        <div class="col-md-8"><a href="#" class="btn btn-default btn-block strong"><?php echo trans('0014'); ?></a></div>
        <div class="col-md-2"></div>
    </div>
    <div class="col-md-6 col-xs-12 pull-left">
        <img src="<?php echo $theme_url; ?>assets/img/icons/business-login.png" class="center-block img-responsive" alt="<?php echo trans('0015'); ?>" />
        <div class="col-md-2"></div>
        <div class="col-md-8"><a href="#" class="btn btn-default btn-block strong"><?php echo trans('0015'); ?></a></div>
        <div class="col-md-2"></div>
    </div>
</section>
<div style="background-color:#f7f7f7;margin-top:30px">
    <div class="container">
        <div class="form-group"></div>
        <br>
        <div class="row">
            <!-- Expedia Hotels -->
            <?php if(pt_main_module_available('ean')){ ?>
            <div class="col-md-12 row5">
                <div class="form-group">
                    <h2 class="main-title go-right"><?php echo trans('017');?></h2>
                    <div class="clearfix"></div>
                    <i class="tiltle-line go-right"></i>
                </div>
            </div>
            <?php foreach($featuredHotelsEan->hotels as $item){ ?>
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
                            <div class="row" style="padding: 7px;">
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