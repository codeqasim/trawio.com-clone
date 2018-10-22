<!DOCTYPE html>

<!--
Product:        PHPTRAVELS
Copyright:      2016 @ phptravels.com
License:        http://phptravels.com/licenses
Purchase:       http://phptravels.com/order
-->

<!-- Pace -->
<script src="<?php echo base_url(); ?>assets/include/pace/pace.min.js"></script>
<link href="<?php echo base_url(); ?>assets/include/pace/dataurl.css" rel="stylesheet" />
<!-- Pace -->

<head>
<meta charset="utf-8">
<title><?php echo $page_title; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="PHPTRAVELS">
<base href="<?php echo base_url(); ?>" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/global/favicon.png">
<link href="<?php echo base_url(); ?>assets/include/loading/loading.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/fa.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet">
<?php if(empty($dontload)){ ?>
<script src="<?php echo base_url(); ?>assets/include/ckeditor/ckeditor.js"></script><?php } ?>
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.2.js"></script>
<link href="<?php echo base_url(); ?>assets/include/alert/css/alert.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/include/alert/themes/default/theme.css" rel="stylesheet" />
<script src="<?php echo base_url(); ?>assets/include/alert/js/alert.js"></script>

<!---Jquery Form--->
<script src="<?php echo base_url();?>assets/include/jquery-form/jquery.form.min.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries-->
<!--[if lte IE 8]>
<script src="<?php echo base_url(); ?>assets/js/html5shiv.js"></script>
<script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
<![endif]-->

<!-- select2 -->
<link href="<?php echo base_url(); ?>assets/include/select2/select2.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/include/select2/select2-default.css" rel="stylesheet">
<script src="<?php echo base_url();?>assets/include/select2/select2.min.js"></script>
<!-- end select2 -->

<style>
.wrapper .main { margin-top: 55px; } @media screen and (max-width: 480px) { .wrapper .main { margin-top: 100px;  }  }
</style>
</head>
  <body>
    <div class="wrapper">
      <?php include 'sidebar.php'; ?>
      <?php include 'headbar.php'; ?>
     <div class="main">
     <div class="container" id="content">
