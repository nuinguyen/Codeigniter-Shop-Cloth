<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/amaze-html-template/layout-1/red/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2015 16:19:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title> <?= $title ?> </title>
<!-- Favicons Icon -->
<link rel="icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="http://demo.magikthemes.com/skin/frontend/base/default/favicon.ico" type="image/x-icon" />
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->

<base href="<?= base_url() ?>">

<link rel="stylesheet" href="assets/user/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="assets/user/css/slider.css" type="text/css">
<link rel="stylesheet" href="assets/user/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/user/css/owl.theme.css" type="text/css">
<link rel="stylesheet" href="assets/user/css/font-awesome.css" type="text/css">
<link rel="stylesheet" href="assets/user/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/user/css/lightsider.css" type="text/css">
<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="page"> 
  <!-- Header -->
    <?= $header ?>
  <!-- end header -->
  <!-- Navbar -->
    <?= $navbar ?>
  <!-- end nav -->
    <!--    MAIN-->
    <?= $content ?>
    <!--    END MAIN-->
  <!-- Footer -->
    <?= $footer ?>
    <!-- End Footer -->
</div>
<!--    Help-->
    <?= $help ?>
<!--    End Help-->

<!-- JavaScript --> 
<script type="text/javascript" src="assets/user/js/jquery.min.js"></script> 
<script type="text/javascript" src="assets/user/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/user/js/common.js"></script> 
<script type="text/javascript" src="assets/user/js/slider.js"></script> 
<script type="text/javascript" src="assets/user/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="assets/user/js/event.js"></script>
<script type="text/javascript" src="assets/user/js/cart.js"></script>
<script type="text/javascript" src="assets/user/js/lightsider.js"></script>
<script type="text/javascript">
    //<![CDATA[
	jQuery(function() {
		jQuery(".slideshow").cycle({
			fx: 'scrollHorz', easing: 'easeInOutCubic', timeout: 10000, speedOut: 800, speedIn: 800, sync: 1, pause: 1, fit: 0, 			pager: '#home-slides-pager',
			prev: '#home-slides-prev',
			next: '#home-slides-next'
		});
	});
    //]]>
    </script> 
<script>
			new UISearch( document.getElementById( 'form-search' ) );
		</script>


</body>

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/amaze-html-template/layout-1/red/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 07 Aug 2015 16:22:09 GMT -->
</html>
