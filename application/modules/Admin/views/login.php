<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo PT_GLOBAL_IMAGES_FOLDER.'favicon.png';?> ">
    <title><?php echo $pagetitle;?></title>
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/login.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/facebook.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/fa.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/include/login/ladda-themeless.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/include/login/spin.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/include/login/ladda.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
  </head>
  <style>
    body {
    width: 100%;
    height: 100%;
    background: rgb(90,113,155); /* Old browsers */
    background: -moz-linear-gradient(45deg,  rgba(90,113,155,1) 0%, rgba(83,109,155,1) 20%, rgba(57,92,160,1) 44%, rgba(1,37,114,1) 82%); /* FF3.6-15 */
    background: -webkit-linear-gradient(45deg,  rgba(90,113,155,1) 0%,rgba(83,109,155,1) 20%,rgba(57,92,160,1) 44%,rgba(1,37,114,1) 82%); /* Chrome10-25,Safari5.1-6 */
    background: linear-gradient(45deg,  rgba(90,113,155,1) 0%,rgba(83,109,155,1) 20%,rgba(57,92,160,1) 44%,rgba(1,37,114,1) 82%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#5a719b', endColorstr='#012572',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
    }
    #rotatingDiv {
    display: block;
    margin: 32px auto;
    height: 100px;
    width: 100px;
    -webkit-animation: rotation .9s infinite linear;
    -moz-animation: rotation .9s infinite linear;
    -o-animation: rotation .9s infinite linear;
    animation: rotation .9s infinite linear;
    border-left: 8px solid rgba(0,0,0,.20);
    border-right: 8px solid rgba(0,0,0,.20);
    border-bottom: 8px solid rgba(0,0,0,.20);
    border-top: 8px solid rgba(33,128,192,1);
    border-radius: 100%;
    }
    @keyframes rotation {
    from {
    transform: rotate(0deg);
    }
    to {
    transform: rotate(359deg);
    }
    }
    @-webkit-keyframes rotation {
    from {
    -webkit-transform: rotate(0deg);
    }
    to {
    -webkit-transform: rotate(359deg);
    }
    }
    @-moz-keyframes rotation {
    from {
    -moz-transform: rotate(0deg);
    }
    to {
    -moz-transform: rotate(359deg);
    }
    }
    @-o-keyframes rotation {
    from {
    -o-transform: rotate(0deg);
    }
    to {
    -o-transform: rotate(359deg);
    }
    }
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active {
    transition: background-color 5000s ease-in-out 5s;
    }
  </style>
  <script>
    $(function() {
      Login.init()
    });
  </script>
  <script type="text/javascript">
    $(function () {
       //login functionality
    $(".form-signin").on('submit',function(){
    $(".resultlogin").html("<div class='alert alert-info loading wow fadeOut animated'>Hold On...</div>");
    $.post("<?php echo base_url().$this->uri->segment(1);?>/login",$(".form-signin").serialize(), function(response){
     var resp = $.parseJSON(response);
      console.log(resp);
     if(!resp.status){
    $(".resultlogin").html("<div class='alert alert-danger loading wow fadeIn animated'>"+resp.msg+"</div>");
    }else{
    $(".resultlogin").html("<div class='alert alert-success login wow fadeIn animated'>Redirecting Please Wait...</div>");
    window.location.replace(resp.url);
     }

    }); });
    // end login functionality

    // start password reset functionality
    $(".resetbtn").on('click',function(){
    var resetemail = $("#resetemail").val();
    if(resetemail == ""){
      alert("Please Enter Email Address");
    }else{
     $(".resultreset").html("<div id='rotatingDiv'></div>");
    $.post("<?php echo base_url().$this->uri->segment(1);?>/resetpass",$("#passresetfrm").serialize(), function(response){

    if($.trim(response) == '1'){
    $(".resultreset").html("<div class='alert alert-success'>New Password sent to "+resetemail+", Kindly check email.</div>");

    }else{
    $(".resultreset").html("<div class='alert alert-danger'>Email Not Found</div>");

    } });
    }
     });
    // end password reset functionality

    });
  </script>
  <div class="container">
    <!-- BEGIN SIGNIN SECTION-->
    <img data-wow-duration="0.5s" data-wow-delay="0.5s" src="<?php echo base_url(); ?>assets/img/admin.png" class="wow fadeIn center-block" style="width:78px;height:60px;margin-top:100px;margin-bottom:20px" alt="" />
    <form method="POST" data-wow-duration="1s" data-wow-delay="1s" class="logpanel form-signin form-horizontal wow fadeIn animated" role="form" onsubmit="return false;">
      <div  >
        <h2 class="form-heading text-center">Login Panel</h2>
        <input type="text" name="email" placeholder="Email" required="" autofocus="" class="form-control">
        <input type="password" name="password" placeholder="Password" required="" class="form-control">
        <div class="row form-group">
          <div class="col-xs-6">
            <label class="checkbox">
            <input type="checkbox" name="remember" value="remember-me"> Remember me
            </label>
          </div>
          <div class="col-xs-6">
            <div class="forget-password">
              Forgot password?
              <div class="clearfix"></div>
              <a id="link-forgot" href="#"> <strong>Click Here</strong></a>
            </div>
          </div>
        </div>
      </div>
      <button data-wow-duration="2s" data-wow-delay="s" type="submit" class="btn-lg btn btn-primary btn-block ladda-button fadeIn animated" data-style="zoom-in">Login</button>
      <div style="margin-top:10px" class="resultlogin"></div>
    </form>
    <!-- END SIGNIN SECTION-->
    <!-- BEGIN SIGNUP SECTION-->
    <!-- BEGIN FORGOT PASSWORD SECTION-->
    <form role="form" class="logpanel form-forgot form-horizontal wow flipInY animated" style="display: none"  id="passresetfrm" onsubmit="return false;">
      <h2 class="form-heading text-center"> Forgot Password</h2>
      <div class="resultreset"></div>
      <div style="font-size: 12px;" class="text-center">Enter your email address to reset your password</div>
      <br>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i>
        </span>
        <input type="email" id="resetemail" name="email" placeholder="Email" class="form-control">
      </div>
      <br>
      <div class="form-actions">
        <button type="button" class="btn btn-primary btn-back"><i class="fa fa-angle-left"></i>&nbsp;Back</button>
        <button id="btn-forgot" type="button" class="btn btn-success pull-right resetbtn ladda-button">Reset My Password</button>
      </div>
    </form>
    <!-- END FORGOT PASSWORD SECTION-->
    <p data-wow-duration="2s" data-wow-delay="2s" class="text-center wow fadeInDown" style="color:#f4f4f4"> Powered by  <a target="_blank" style="color: #FCFCFC" href="http://phptravels.com"><b>PHPTRAVELS</b></a> <a href="http://phptravels.com/change-log/#<?php echo PT_VERSION; ?>"></a><?php echo PT_VERSION; ?></p>
  </div>
  <script>
    // Bind normal buttons
    Ladda.bind( 'div:not(.progress-demo) button', { timeout: 2000 } );

    // Bind progress buttons and simulate loading progress
    Ladda.bind( '.progress-demo button', {
    	callback: function( instance ) {
    		var progress = 0;
    		var interval = setInterval( function() {
    			progress = Math.min( progress + Math.random() * 0.1, 1 );
    			instance.setProgress( progress );
    			if( progress === 1 ) {
    				instance.stop();
    				clearInterval( interval );
    			}
    		}, 200 );
    	}
    } );
  </script>
  <script src="<?php echo base_url(); ?>assets/js/login.js"></script>
  <!-- icheck -->
  <script src="<?php echo base_url(); ?>assets/include/icheck/icheck.min.js"></script>
  <link href="<?php echo base_url(); ?>assets/include/icheck/square/grey.css" rel="stylesheet">
  <script>
    var cb, optionSet1;
        $(".checkbox").iCheck({
          checkboxClass: "icheckbox_square-grey",
          radioClass: "iradio_square-grey"
        });

        $(".radio").iCheck({
          checkboxClass: "icheckbox_square-grey",
          radioClass: "iradio_square-grey"
        });
  </script>

  <!-- WOWJs -->
  <script>
    new WOW().init();
  </script>
  <!-- WOWJs -->