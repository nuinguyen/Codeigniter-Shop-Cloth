<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title><?= $title ?></title>

    <base href="<?= base_url() ?>">

    <!-- Bootstrap core CSS -->
    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/admin/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/admin/css/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="assets/admin/css/owl.carousel.css" type="text/css">



      <!--right slidebar-->
      <link href="assets/admin/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="assets/admin/css/style.css" rel="stylesheet">
    <link href="assets/admin/css/style-responsive.css" rel="stylesheet" />

<!--        select2-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="assets/admin/js/html5shiv.js"></script>
      <script src="assets/admin/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
       <!--header start-->
       <?= $header ?>
      <!--header end-->

      <!--sidebar start-->
        <?= $left_menu ?>
      <!--sidebar end-->

      <!--main content start-->
      <?= $content ?>
      <!--main content end-->

      <!--footer start-->
      <?= $footer ?>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/admin/js/jquery.js"></script>
    <script src="assets/admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/admin/js/jquery.scrollTo.min.js"></script>
    <script src="assets/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/admin/js/jquery.easy-pie-chart.js"></script>
    <script src="assets/admin/js/owl.carousel.js" ></script>
    <script src="assets/admin/js/jquery.customSelect.min.js" ></script>
    <script src="assets/admin/js/respond.min.js" ></script>
    <script src="assets/admin/js/event.js" ></script>

    <!--right slidebar-->
    <script src="assets/admin/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="assets/admin/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/admin/js/sparkline-chart.js"></script>
    <script src="assets/admin/js/easy-pie-chart.js"></script>
    <script src="assets/admin/js/count.js"></script>

  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  <script>
      $(document).ready(function(){
          $('.tags_select_choose').select2({
              tags: true,
              tokenSeparators: [',', ' ']
          });
      }) ;
  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
