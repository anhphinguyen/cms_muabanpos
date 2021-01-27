<?php
$user_data = get_user_by_id($_SESSION['id_account']);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InQ - A Responsive Bootstrap 3 Admin Dashboard Template</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Toastr style -->
    <link href="public/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="public/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <!-- morris -->
    <link href="public/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="public/css/animate.css" rel="stylesheet">
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/forms/kforms.css" rel="stylesheet">
</head>
<style>
    @media (min-width: 768px) {
        .navbar-static-side {
            z-index: 2001;
            position: absolute;
            width: 230px;
        }
    }
</style>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side fixed-menu" role="navigation">
            <div class="sidebar-collapse">
                <div id="hover-menu"></div>
                <ul class="nav metismenu" id="side-menu">
                    <li>
                        <div class="logopanel" style="margin-left: 0px; z-index: 99999">
                            <div class="profile-element">
                                <h2><a href="index.html">InQ Admin</a></h2>
                            </div>
                            <div class="logo-element">
                                InQ
                            </div>
                        </div>
                    </li>
                    <li>
                        <?php
                        if (isset($user_data) && !empty($user_data)) {
                        ?>
                            <div class="leftpanel-profile">
                                <div class="media-left">
                                    <a href="#">
                                        <img src="../images/Capture.PNG" alt="" class="media-object img-circle">
                                    </a>
                                </div>
                                <div class="media-body profile-name" style="white-space: nowrap;">
                                    <h4 class="media-heading"><?php echo $user_data['account_fullname'] ?> <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i class="fa fa-angle-down"></i></a></h4>
                                    <span><?php echo $user_data['type_account'] ?></span>
                                </div>
                            </div>
                            <div class="leftpanel-userinfo collapse" id="loguserinfo" style="position: absolute; background: #3b4354!important">
                                <h5 class="sidebar-title">Contact</h5>
                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <label class="pull-left">Email</label>
                                        <span class="pull-right"><?php echo $user_data['account_email'] ?></span>
                                    </li>

                                    <li class="list-group-item">
                                        <label class="pull-left">Mobile</label>
                                        <span class="pull-right"><?php echo $user_data['account_phone'] ?></span>
                                    </li>


                                </ul>
                            </div>
                        <?php
                        }
                        ?>
                    </li>
                    <li>