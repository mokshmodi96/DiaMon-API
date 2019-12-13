<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        include_once 'DB_Conn/function.php';
        $result = selectAdminProfile($_SESSION["username"]);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }
    } else {
        header("location:index.php");
    }
    include_once 'header.php';
    include_once 'sidebar.php';
    ?>
    <title><?php echo $row["username"] ?> Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- Metis Menu -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
    <style type="text/css">

        body {
            background: #ffffff;
        }

        /*nav css*/
        .navbar-inverse {
            background-color: #ffffff;
            border-radius: 0px;
            height: 80px;
            width: 100%;
            position: fixed;
            z-index: 999;
            border: 0px solid;
            -webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.75);
            transition: all ease 0.8s;
            -moz-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.75);
            box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.75);
        }

        .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
            color: rgb(0, 4, 51) !important;
            background-color: #0e364c;
        }

        .navbar-brand {
            padding: 0;
            margin-left: 0px !important;
        }

        .navbar-brand img {
            height: 50px;
            margin-left: 20px;
            margin-top: 9%;
            transition: all ease 0.8s;
        }

        .navbar-inverse .navbar-nav > li > a {
            color: rgb(255, 102, 0);
            font-family: 'Open Sans', sans-serif;
            line-height: 3;
            font-weight: bold;
        }

        .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
            color: rgb(0, 4, 51) !important;
        }

        .menu {
            display: none;
        }

        .search-box1 {
            padding: 20px 0px;
            z-index: 99999;
            width: 100%;
        }

        .search {
            padding: 30px 0px;
            float: left;
            width: 100%;
        }

        .serach-footer {
            left: 20px;
            position: absolute;
            top: 10px;
        }

        .search-wrap {
            display: block;
            width: 100%;
            height: 40px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #e2e2e2;
            border-radius: 20px;
            -webkit-box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
            box-shadow: inset 0 0px 0px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            width: 100% !important;
            padding-left: 45px;
        }

        .search-btn {
            background: rgb(0, 4, 51);
            width: 100%;
            border-radius: 0px 20px 20px 0px;
            color: #fff !important;
            height: 40px;
            border: 0px solid;
            font-weight: 600;
            font-size: 14px;
        }

        .search-btn:hover, .search-btn:focus {
            background: rgb(0, 4, 51);
            color: #fff !important;
        }

        .modal-dialog {
            width: 90% !important;
            margin: 20% auto;
        }

        .modal-content {
            background-color: rgb(255, 102, 0);
        }

        .modal-title {
            color: #ffffff !important;
        }


        /*nav css close*/


        .page-header {
            background: #ccc;
            margin: 0;
        }

        .profile-head {
            width: 100%;
            background-color: #6164C1;
            float: left;
            padding: 15px 5px;
        }

        .profile-head img {
            height: 150px;
            width: 150px;
            margin: 0 auto;
            border: 5px solid #fff;
            border-radius: 5px;
        }

        .profile-head h5 {
            width: 100%;
            padding: 5px 5px 0px 5px;
            text-align: justify;
            font-weight: bold;
            color: #fff;
            font-size: 25px;
            text-transform: capitalize;
            margin-bottom: 0;
        }

        .profile-head p {
            width: 100%;
            text-align: justify;
            padding: 0px 5px 5px 5px;
            color: #fff;
            font-size: 17px;
            text-transform: capitalize;
            margin: 0;
        }

        .profile-head a {
            width: 100%;
            text-align: center;
            padding: 10px 5px;
            color: #fff;
            font-size: 15px;
            text-transform: capitalize;
        }

        .profile-head ul {
            list-style: none;
            padding: 0;
        }

        .profile-head ul li {
            display: block;
            color: #ffffff;
            padding: 5px;
            font-weight: 400;
            font-size: 15px;
        }

        .profile-head ul li:hover span {
            color: rgb(0, 4, 51);
        }

        .profile-head ul li span {
            color: #ffffff;
            padding-right: 10px;
        }

        .profile-head ul li a {
            color: #ffffff;
        }

        .profile-head h6 {
            width: 100%;
            text-align: center;
            font-weight: 100;
            color: #fff;
            font-size: 15px;
            text-transform: uppercase;
            margin-bottom: 0;
        }


        .nav-tabs {
            margin: 0;
            padding: 0;
            border: 0;
        }

        .nav-tabs > li > a {
            background: #DADADA;
            border-radius: 0;
            box-shadow: inset 0 -8px 7px -9px rgba(0, 0, 0, .4), -2px -2px 5px -2px rgba(0, 0, 0, .4);
        }

        .nav-tabs > li.active > a,
        .nav-tabs > li.active > a:hover {
            background: #F5F5F5;
            box-shadow: inset 0 0 0 0 rgba(0, 0, 0, .4), -2px -3px 5px -2px rgba(0, 0, 0, .4);
        }

        .tab-pane {
            background: #ffffff;
            box-shadow: 0 0 4px rgba(0, 0, 0, .4);
            border-radius: 0;
            text-align: center;
            padding: 10px;
        }

        .tab-content > .active {
            margin-top: 50px; /*width:100% !important;*/
        }

        /* edit profile css*/

        .hve-pro {
            background-color: #6164C1;
            padding: 5px;
            width: 100%;
            height: auto;
            float: left;
        }

        .hve-pro p {
            float: left;
            color: #fff;
            font-size: 15px;
            text-transform: capitalize;
            padding: 5px 20px;
            font-family: 'Noto Sans', sans-serif;
        }

        h2.register {
            padding: 10px 25px;
            text-transform: capitalize;
            font-size: 25px;
            color: #6164C1;
        }

        .fom-main {
            overflow: hidden;
        }

        legend {
            font-family: 'Bitter', serif;
            color: #6164C1;
            border-bottom: 0px solid;
        }

        .main_form {
            background-color: #6164C1;
        }

        label.control-label {
            font-family: 'Noto Sans', sans-serif;
            font-weight: 100;
            margin-bottom: 5px !important;
            text-align: left !important;
            text-transform: uppercase;
            color: #798288;
        }

        .submit-button {
            color: #fff;
            background-color: #6164C1;
            width: 190px;
            border: 0px solid;
            border-radius: 0px;
            transition: all ease 0.3s;
            margin: 5px;
            float: left;
        }

        .submit-button:hover, .submit-button:focus {
            color: #fff;
            background-color: rgb(0, 4, 51);
        }

        .hint_icon {
            color: #6164C1;
        }

        .form-control:focus {
            border-color: #6164C1;
        }

        select.selectpicker {
            color: #99999c;
        }

        select.selectpicker option {
            color: #000 !important;
        }

        select.selectpicker option:first-child {
            color: #99999c;
        }

        .input-group {
            width: 100%;
        }

        .uplod-picture {
            width: 100%;
            background-color: #;
            color: #fff;
            padding: 20px 10px;
            margin-bottom: 10px;
        }

        .uplod-file {
            position: relative;
            overflow: hidden;
            color: #fff;
            background-color: rgb(0, 4, 51);
            border: 0px solid #a02e09;
            border-radius: 0px;
            transition: all ease 0.3s;
            margin: 5px;
        }

        .uplod-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            background: white;
            cursor: inherit;
            display: block;
        }

        .uplod-file:hover, .uplod-file:focus {
            color: #fff;
            background-color: #6164C1;
        }

        h4.pro-title {
            font-size: 24px;
            color: rgba(0, 4, 51, 0.96);
            text-transform: capitalize;
            text-align: justify;
            padding: 10px 15px;
            font-family: 'Bitter', serif;
        }

        .bio-table {
            width: 75%;
            border: 0px solid;
        }

        .bio-table td {
            text-transform: capitalize;
            text-align: left;
            font-size: 15px;
        }

        .bio-table > tbody > tr > td {
            border: 0px solid;
            text-transform: capitalize;
            color: rgb(0, 4, 51);
            font-size: 15px;
        }

        .responsiv-table {
            border: 0px solid;
        }

        .nav-menu li a {
            margin: 5px 5px 5px 5px;
            position: relative;
            display: block;
            padding: 10px 50px;
            border: 0px solid !important;
            box-shadow: none !important;
            background-color: rgb(0, 4, 51) !important;
            color: #fff !important;
            white-space: nowrap;
        }

        .nav-menu li.active a {
            background-color: #6164C1 !important;
        }

        /*.stick {*/
        /*position: fixed !important;*/
        /*top: 0;*/
        /*z-index: 999 !important;*/
        /*width: 100%;*/
        /*background: #ffffff !important;*/
        /*height: auto;*/
        /*transition: all ease 0.8s;*/
        /*-webkit-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.75);*/
        /*-moz-box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.75);*/
        /*box-shadow: 0px 2px 7px 0px rgba(0, 0, 0, 0.75);*/
        /*}*/

        .stick a {
            line-height: 20px !important;
        }

        .stick img {
            margin: 0 !important;
        }


        @media all and (max-width: 768px) {

            .navbar-inverse .drop_menu {
                display: block;
                visibility: visible;
                width: 110px;
                height: 1000px;
                padding: 0px 20px;
                position: absolute;
                right: -100px;
                transition: all ease 0.5s;
                border-top: 0px solid;
                cursor: pointer;
            }

            .navbar-brand {
                padding: 0;
                margin-left: 10px !important;
            }

            a.menu {
                display: block !important;
                margin: 9px 2px;
                float: right;
                color: #6164C1;
                border: 0px solid;
                background: none;
                font-size: 30px;
                width: 27px;
                position: relative;
                cursor: pointer;
            }

            a.menu:hover, a.menu:focus {
                color: rgb(0, 4, 51);
            }

            .drop_menu1 {
                display: block;
                visibility: visible;
                width: 250px;
                height: 1000px;
                padding: 5px 30px;
                position: absolute;
                right: 0 !important;
                background-color: #ffffff !important;
                transition: all ease 0.5s;
                border-top: 0px solid;
                cursor: pointer;
            }

        }

        @media all and (max-width: 430px) {
            .profile-head ul li {
                font-size: 12px !important;
            }

            .nav-menu li {
                width: 50%;
            }

            .bio-table > tbody > tr > td {
                font-size: 13px;
            }

        }
    </style>
</head>
<body class="cbp-spmenu-push">
<div class="main-content">
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">

            <div class="blank-page widget-shadow scroll" id="style-2 div1">
                <section>

                    <div class="container" style="margin-top: 30px;">
                        <div class="profile-head">
                            <div class="col-md- col-sm-4 col-xs-12">
                                <img src="http://www.newlifefamilychiropractic.net/wp-content/uploads/2014/07/300x300.gif"
                                     class="img-responsive"/>
                                <h6><?php echo $row["username"] ?></h6>
                            </div><!--col-md-4 col-sm-4 col-xs-12 close-->


                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <h5><?php echo $row["username"] ?></h5>
                                <p>Administrator</p>
                                <ul>
                                    <!--                                    <li><span class="glyphicon glyphicon-home"></span>--><?php //echo $row["m_s_address"] ?>
                                    <!--                                    </li>-->
                                    <!--                                    <li><span class="glyphicon glyphicon-phone"></span> <a href="#"-->
                                    <!--                                                                                           title="call">-->
                                    <?php //echo $row["m_s_phone_no"] ?><!--</a>-->
                                    <!--                                    </li>-->
                                    <li><span class="glyphicon glyphicon-envelope"></span><a href="#"
                                                                                             title="mail"><?php echo $row["username"] ?></a>
                                    </li>
                                </ul>


                            </div><!--col-md-8 col-sm-8 col-xs-12 close-->


                        </div><!--profile-head close-->
                    </div><!--container close-->


                    <div id="sticky" class="container">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-menu" role="tablist">
                            <li class="active">
                                <a href="#profile" role="tab" data-toggle="tab">
                                    <i class="fa fa-male"></i> Profile
                                </a>
                            </li>
                            <li><a href="#change" role="tab" data-toggle="tab">
                                    <i class="fa fa-key"></i> Edit Profile
                                </a>
                            </li>
                        </ul><!--nav-tabs close-->

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="profile">
                                <div class="container">
                                    <div class="col-sm-11" style="float:left;">
                                        <div class="hve-pro">
                                            <p><b>Address:</b><br>
                                                <?php echo $row["username"] ?>
                                            </p>
                                        </div><!--hve-pro close-->
                                    </div><!--col-sm-12 close-->
                                    <br clear="all"/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="pro-title">Details</h4>
                                        </div><!--col-md-12 close-->


                                        <div class="col-md-6">

                                            <div class="table-responsive responsiv-table">
                                                <table class="table bio-table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>: <?php echo $row["username"] ?></td>
                                                    </tr>
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>Address</td>-->
                                                    <!--                                                        <td>: -->
                                                    <?php //echo $row["m_s_address"] ?><!--</td>-->
                                                    <!--                                                    </tr>-->
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>City</td>-->
                                                    <!--                                                        <td>: -->
                                                    <?php //echo $row["m_s_city"] ?><!--</td>-->
                                                    <!--                                                    </tr>-->
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>Pincode</td>-->
                                                    <!--                                                        <td>: -->
                                                    <?php //echo $row["m_s_pincode"] ?><!--</td>-->
                                                    <!--                                                    </tr>-->

                                                    </tbody>
                                                </table>
                                            </div><!--table-responsive close-->
                                        </div><!--col-md-6 close-->

                                        <div class="col-md-6">

                                            <div class="table-responsive responsiv-table">
                                                <table class="table bio-table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Email Id</td>
                                                        <td>: <?php echo $row["username"] ?></td>
                                                    </tr>
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>Mobile</td>-->
                                                    <!--                                                        <td>: -->
                                                    <?php //echo $row["m_s_phone_no"] ?><!--</td>-->
                                                    <!--                                                    </tr>-->
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>Start Time</td>-->
                                                    <!--                                                        <td>: -->
                                                    <?php //echo $row["m_s_starttime"] ?><!--</td>-->
                                                    <!--                                                    </tr>-->
                                                    <!--                                                    <tr>-->
                                                    <!--                                                        <td>End Time</td>-->
                                                    <!--                                                        <td>: -->
                                                    <?php //echo $row["m_s_endtime"] ?><!--</td>-->
                                                    <!--                                                    </tr>-->
                                                    </tbody>
                                                </table>
                                            </div><!--table-responsive close-->
                                        </div><!--col-md-6 close-->

                                    </div><!--row close-->


                                </div><!--container close-->
                            </div><!--tab-pane close-->


                            <div class="tab-pane fade" id="change">
                                <div class="container fom-main">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2 class="register">Edit Your Profile</h2>
                                        </div><!--col-sm-12 close-->

                                    </div><!--row close-->
                                    <br/>
                                    <div class="row">

                                        <form class="form-horizontal main_form text-left"
                                              onsubmit="return ajaxfunction();" method="post"
                                              id="contact_form">
                                            <fieldset>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-10 control-label">Choose Password</label>
                                                    <div class="col-md-12 inputGroupContainer">
                                                        <div class="input-group">
                                                            <input name="first_name" placeholder="Choose Password"
                                                                   class="form-control" type="password"
                                                                   id="password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label class="col-md-10 control-label">Confirm Password</label>
                                                    <div class="col-md-12 inputGroupContainer">
                                                        <div class="input-group">
                                                            <input name="first_name" placeholder="Confirm Password"
                                                                   class="form-control" type="password"
                                                                   id="con_password">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- upload profile picture -->
                                                <div class="col-md-12 text-left">
                                                    <div class="upload-picture">
                                                        <span class="btn btn-default uplod-file">Upload Photo <input
                                                                    type="file"/></span>
                                                    </div><!--upload-picture close-->
                                                </div><!--col-md-12 close-->
                                                <!-- Button -->
                                                <div class="form-group col-md-10">
                                                    <div class="col-md-6">
                                                        <button type="submit" class="btn btn-warning submit-button">
                                                            Save
                                                        </button>
                                                        <button type="reset" class="btn btn-warning submit-button" onclick="reset_form();">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div><!--row close-->
                                </div><!--container close -->
                            </div><!--tab-pane close-->
                        </div><!--tab-content close-->
                    </div><!--container close-->

                </section><!--section close-->
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>
    <!--//footer-->
</div>
<!-- Classie -->
<script src="js/classie.js"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };

    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
<script type="application/javascript">
    //tab js//
    $(document).ready(function (e) {


        $('.form').find('input, textarea').on('keyup blur focus', function (e) {

            var $this = $(this),
                label = $this.prev('label');

            if (e.type === 'keyup') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.addClass('active highlight');
                }
            } else if (e.type === 'blur') {
                if ($this.val() === '') {
                    label.removeClass('active highlight');
                } else {
                    label.removeClass('highlight');
                }
            } else if (e.type === 'focus') {

                if ($this.val() === '') {
                    label.removeClass('highlight');
                } else if ($this.val() !== '') {
                    label.addClass('highlight');
                }
            }

        });

        $('.tab a').on('click', function (e) {

            e.preventDefault();

            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
            target = $(this).attr('href');

            $('.tab-content > div').not(target).hide();

            $(target).fadeIn(600);

        });
//canvas off js//
        $('#menu_icon').click(function () {
            if ($("#content_details").hasClass('drop_menu')) {
                $("#content_details").addClass('drop_menu1').removeClass('drop_menu');
            } else {
                $("#content_details").addClass('drop_menu').removeClass('drop_menu1');
            }


        });

//search box js//


        $("#flip").click(function () {
            $("#panel").slideToggle("5000");
        });

// sticky js//

        $(window).scroll(function () {
            if ($(window).scrollTop() >= 500) {
                $('nav').addClass('stick');
            } else {
                $('nav').removeClass('stick');
            }
        });
    });
</script>
<script type="application/javascript">
    function ajaxfunction() {
        var pass = $("#password").val();
        var con_pass = $("#con_password").val();
        if (pass != "" && con_pass != "") {
            if (pass == con_pass) {
                $.ajax({
                    type: 'post',
                    url: 'DB_Conn/function.php',
                    data: {
                        functionname: "update_admin",
                        ajaxfunction: "ajaxfunction",
                        password: pass,
                        username: "<?php echo $row["username"]?>"
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 1) {
                            alert("Password Changed Successfully");
                            $("#contact_form")[0].reset();
                            window.location.href = "dashboard.php";
                        } else {
                            alert("Password Cannot Be Changed");
                            $("#contact_form")[0].reset();
                        }
                    }
                });
            } else {
                alert("Both Passwords Should Be Same");
                $("#contact_form")[0].reset();
            }
        } else {
            alert("Wrong Details");
            $("#contact_form")[0].reset();
        }
        return false;
    }

    function reset_form() {
        document.location.reload();
    }
</script>
</body>
</html>