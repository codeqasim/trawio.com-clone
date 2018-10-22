<div class="mob-bg">
    <div class="container">
        <div class="col-sm-8 col-md-8 mt35 go-right wow fadeIn textarea">
            <h3 class="go-text-right strong"><?php echo trans('0016'); ?></h3>
            <p class="go-text-right"><?php echo trans('0017'); ?></p>
            <div class="row">
                <?php if(!empty($mSettings->iosUrl)){ ?>
                <div class="col-sm-4 col-md-4 col-xs-6 go-right wow"><a href="<?php echo $mSettings->iosUrl; ?>" target="_blank"><img src="<?php echo $theme_url; ?>assets/img/ios.png" class="img-responsive" alt="ios" /></a></div>
                <?php } ?>
                <?php if(!empty($mSettings->androidUrl)){ ?>
                <div class="col-sm-4 col-md-4 col-xs-6 go-right wow"><a href="<?php echo $mSettings->androidUrl; ?>" target="_blank"><img src="<?php echo $theme_url; ?>assets/img/android.png" class="img-responsive" alt="android" /></a></div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-4 col-md-4 go-left wow fadeIn">
            <img src="<?php echo $theme_url; ?>assets/img/apps.png" class="img-responsive pull-right go-left" alt="apps" />
        </div>
    </div>
</div>
<nav class="foot-nav newsletter hidden-xs hidden-sm navbar navbar-inverse navbar-static<?php echo @$hidden; ?>" style="margin-bottom:0px;">
    <div class="container">
        <div class="news-panel">
            <div class="col-md-6">
                <div class="row">
                    <div class="textwhite">
                        <h3 class="strong newstext"><?php echo trans('0018'); ?></h3>
                        <p><?php echo trans('0019'); ?></p>
                    </div>
                </div>
            </div>
            <?php if(pt_is_module_enabled('newsletter')){ ?>
            <form role="search" onsubmit="return false;"></form>
            <div id="message-newsletter_2"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-5"><input type="text" class="form-control" placeholder="<?php echo trans('018'); ?>"/></div>
                    <div class="col-md-5"><input type="email" class="form-control sub_email" id="exampleInputEmail1" placeholder="<?php echo trans('019');?>" required></div>
                    <div class="col-md-2">
                        <div class="row"><button class="btn btn-block btn-warning subscribe"><?php echo trans('020'); ?></button></div>
                    </div>
                </div>
                <div class="subscriberesponse"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php } ?>
    </div>
</nav>
<footer id="footer" class="<?php echo @$hidden; ?>">
    <!--<?php echo trans('023');?>-->
    <div class="container">
        <div class="panel-body">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo $base_url; ?>assets/img/logo.png" class="foot-brand center-block img-responsive"/></a>
            <div class="text-center">
                <p class="text-center">&copy; <?php echo $app_settings[0]->copyright;?></p>
            </div>
        </div>
    </div>
    <!-- tripadvisors block -->
    <?php if($tripmodule){ ?>
    <div class="footerbg text-center hidden-xs">
        <a class="btn-block" target="_blank" href="//www.tripadvisor.com/pages/terms.html"><img width="200" lass="block-center" src="<?php echo PT_GLOBAL_IMAGES_FOLDER . 'tripadvisor.png';?>" alt="TripAdvisor" /></a>
        <p>Ratings and Reviews Powered by TripAdvisor</p>
    </div>
    <?php } ?>
    <!-- tripadvisors block -->
</footer>
<div class="footerbg hidden-xs">
    <div class="container text-center">
        <a href="javascript:void" class="gotop scroll wow fadeInUp btn btn-default"><i class="angle up icon"></i></a>
    </div>
</div>
<?php include 'scripts.php'; ?>
<?php echo $app_settings[0]->google; ?>
<script>
var loading=!1;function loadNewContent(){var moreResultsAvailable=$("#moreResultsAvailable").val();var cacheKey=$("#cacheKey").val();var cacheLocation=$("#cacheLocation").val();var cachePaging=$("#cachePaging").val();var checkin=$("input[name='checkin']").val();var checkout=$("input[name='checkout']").val();var agesappend=$("#agesappendurl").val();var adultsCount=$("#adultsCount").val();$('#loader_new').html("<div id='rotatingDiv'></div>");var url_to_new_content='<?php echo base_url().EANSLUG; ?>loadMore';$.ajax({type:'POST',data:{'moreResultsAvailable':moreResultsAvailable,'cacheKey':cacheKey,'cacheLocation':cacheLocation,'checkin':checkin,'checkout':checkout,'agesappendurl':agesappend,'adultsCount':adultsCount},url:url_to_new_content,success:function(data){if(data!=""&&data!="404"){$('#loader_new').html('');loading=!1;var newData=data.split("###");$("#latest_record_para").html(newData[0]);$("#New_data_load").append(newData[1])}
else{$('#loader_new').html('');$("#message_noResult").html('')}}})}
var winTop=$(window).scrollTop();var docHeight=$(document).height();var winHeight=$(window).height();$(window).scroll(function(){var moreResultsAvailable=$("#moreResultsAvailable").val();var foot=$("#footer").offset().top-3000;if(moreResultsAvailable!=''&&moreResultsAvailable==1){if($(window).scrollTop()>foot){if(!loading){loading=!0;loadNewContent()}}}})
</script>
</body>
</html>
