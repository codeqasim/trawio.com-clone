<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo @$metadescription; ?>">
    <meta name="keywords" content="<?php echo @$metakeywords; ?>">
    <meta name="author" content="Travelhope">
    <title><?php echo @$pageTitle; ?></title>
    <meta name="google-site-verification" content="EaM4Z1tJSMVCkQJWDfevYQC0OWSoMVV1YmXUy_PUkVE" />
    <link rel="shortcut icon" href="<?php echo PT_GLOBAL_IMAGES_FOLDER.'favicon.png';?>">
    <link href="<?php echo $theme_url; ?>style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/core.css" />
    <link rel="stylesheet" href="<?php echo $theme_url; ?>assets/css/semantic.css" />
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/semantic.min.js"></script>
    <script type="text/javascript" src="<?php echo $theme_url; ?>assets/js/script.js"></script>
    <!-- facebook -->
    <meta property="og:title" content="<?php echo @$pageTitle; ?>"/>
    <meta property="og:site_name" content="<?php echo $app_settings[0]->site_title;?>"/>
    <meta property="og:description" content="<?php if($app_settings[0]->seo_status == "1"){echo $metadescription;}?>"/>
    <meta property="og:image" content="<?php echo base_url(); ?>uploads/global/favicon.png"/>
    <meta property="og:url" content="<?php echo $app_settings[0]->site_url;?>/"/>
    <meta property="og:publisher" content="https://www.facebook.com/<?php echo $app_settings[0]->site_title;?>"/>
    <script type="application/ld+json">{"@context":"http://schema.org/","@type":"Organization","name":"<?php echo $app_settings[0]->site_title;?>","url":"<?php echo $app_settings[0]->site_url;?>/","logo":"<?php echo base_url(); ?>uploads/global/favicon.png","sameAs":"https://www.facebook.com/<?php echo $app_settings[0]->site_title;?>","sameAs":"https://twitter.com/<?php echo $app_settings[0]->site_title;?>","sameAs":"https://www.pinterest.com/<?php echo $app_settings[0]->site_title;?>/","sameAs":"https://plus.google.com/u/0/<?php echo $app_settings[0]->site_title;?>/posts","contactPoint":{"@type":"ContactPoint","telephone":"<?php echo $phone; ?>","contactType":"Customer Service"}}{"@context":"http://schema.org","@type":"WebSite","name":"<?php echo $app_settings[0]->site_title;?>","url":"<?php echo $app_settings[0]->site_url;?>"}  </script>
    <!-- Google Maps --> <?php if (pt_main_module_available('ean') || $loadMap) { ?> <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=<?php echo $app_settings[0]->mapApi; ?>&libraries=places"></script> <script src="<?php echo $theme_url; ?>assets/js/infobox.js"></script><?php } ?>
    <!-- RTL CSS --> <?php if($isRTL == "RTL"){ ?><link href="<?php echo $theme_url; ?>RTL.css" rel="stylesheet"><?php } ?>
    <!-- Mobile Redirect --> <?php if($mSettings->mobileRedirectStatus == "Yes"){ if($ishome != "invoice"){ ?> <script>if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)){ window.location ="<?php echo $app_settings[0]->mobile_redirect_url ?>";}</script> <?php } } ?>
    <!--[if lt IE 7] > <link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>assets/css/font-awesome-ie7.css" media="screen" /> <![endif]-->
    <!-- Autocomplete CSS files-->
    <link href="<?php echo $theme_url; ?>assets/js/autocomplete/easy-autocomplete.min.css" rel="stylesheet" type="text/css">
    <!-- Autocomplete JS files-->
    <script src="<?php echo $theme_url; ?>assets/js/autocomplete/jquery.easy-autocomplete.min.js" type="text/javascript" ></script>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header go-right">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          </button>
          <a href="<?php echo base_url(); ?>" class="navbar-brand" target=""><img class="img-responsive" src="<?php echo $base_url; ?>assets/img/logo.png" alt="" /></a>
        </div>
        <div class="collapse navbar-collapse" id="collapse">
          <ul class="nav navbar-nav go-right">
            <li class="active"><a href="#"><?php echo trans('01'); ?></a></li>
            <li><a href="<?php echo base_url().EANSLUG; ?>"><?php echo trans('02'); ?></a></li>
          </ul>
          <div style="margin-top: 13px;" class="nav navbar-nav navbar-right go-left">
            <?php if(empty($langname)){ $langname = languageName($lang_set); }else{ $langname = $langname; } if (strpos($currenturl,'book') !== false || !empty($hideLang)) { }else{
              if($app_settings[0]->multi_lang == '1') { $default_lang = $app_settings[0]->default_lang; if(!empty($lang_set)){ $default_lang = $lang_set; } ?>
            <div class="ui language fluid search selection dropdown">
              <input type="hidden" name="country" value="<?php echo $langname;?>">
              <i class="dropdown icon"></i>
              <div class="default text"></div>
              <div class="menu">
                <?php foreach($languageList as $ldir => $lname){ $selectedlang = '';  if(!empty($lang_set) && $lang_set == $ldir){ $selectedlang = 'active selected'; }elseif(empty($lang_set) && $default_lang == $ldir){ $selectedlang = 'active selected'; } ?>
                <div class="item  <?php echo $selectedlang; ?>" data-value="<?php echo $lname['name'];?>"><a href="<?php echo pt_set_langurl($langurl,$ldir);?>"> <i class="<?php echo $lname['country'];?> flag"></i> <?php echo $lname['name']; ?> </a> </div>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <?php } ?>
          </div>
          <div style="margin-top: 13px;" class="nav navbar-nav navbar-right go-left">
            <?php if(strpos($currenturl,'book') == false && $app_settings[0]->multi_curr == 1 && empty($hideCurr)){ $currencies = ptCurrencies(); ?>
            <div class="ui currency selection dropdown">
              <i class="dropdown icon"></i>
              <div class="default text"><?php echo $currency; ?></div>
              <div class="menu">
                <?php foreach($currencies as $c){ ?>
                <div class="item <?php if($currency == $c->code){ echo "active selected"; } ?>" data-value="<?php echo $c->code; ?>" onclick="change_currency('<?php echo $c->id; ?>')"><?php echo $c->name;?></div>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
          <ul class="nav navbar-nav navbar-right go-left">
            <?php  if(!empty($customerloggedin)){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $firstname; ?> <i class="angle down icon"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>account/">  <?php echo trans('06');?></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url()?>account/logout/">  <?php echo trans('07');?></a></li>
              </ul>
            </li>
            <?php }else{ if (strpos($currenturl,'book') !== false) { }else{ if($allowreg == "1"){ ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo trans('03');?> <i class="angle down icon"></i></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url(); ?>login">  <?php echo trans('04');?></a></li>
                <li role="separator" class="divider"></li>
                <li><a href="<?php echo base_url(); ?>register">  <?php echo trans('05');?></a></li>
              </ul>
            </li>
            <?php } } } ?>
          </ul>
        </div>
      </div>
    </nav>
