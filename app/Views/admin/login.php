<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:56 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>Đang nhập</title>

    <base href="<?= base_url() ?>">

    <!-- Bootstrap core CSS -->
    <link href="assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="assets/admin/css/style.css" rel="stylesheet">
    <link href="assets/admin/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/admin/js/html5shiv.js"></script>
    <script src="assets/admin/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="admin-login" method="post">
        <h2 class="form-signin-heading">sign in now</h2>
        <div class="login-wrap">
            <?= view('message/message') ?>
            <input type="text" name="admin_email" class="form-control" placeholder="User Email" autofocus>
            <input type="password" name="admin_password" class="form-control" placeholder="Password">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>
                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
            <p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="fa fa-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>
        </div>
    </form>

</div>
<!-- js placed at the end of the document so the pages load faster -->
<script src="assets/admin/js/jquery.js"></script>
<script src="assets/admin/js/bootstrap.min.js"></script>


</body>

<!-- Mirrored from thevectorlab.net/flatlab/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:57 GMT -->
</html>
