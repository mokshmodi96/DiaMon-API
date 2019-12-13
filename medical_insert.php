<?php
session_start();
if (!isset($_SESSION["username"])) {
    header('location:index.php');
}
include_once 'header.php';
include_once 'sidebar.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>Medical Insert</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Novus Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
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
    <link rel="stylesheet" type="text/css"
          href="http://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.css">
    <link href="css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->
    <script type="text/javascript"
            src="http://weareoutman.github.io/clockpicker/dist/bootstrap-clockpicker.min.js"></script>
</head>
<body class="cbp-spmenu-push">
<div class="main-content">
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            <h3 class="title1">Medical Store Insert</h3>
            <div class="blank-page widget-shadow scroll" id="style-2 div1">
                <form class="form-horizontal" method="post" id="dform" onsubmit="return ajaxfunction();">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Start Time</label>
                        <div class="input-group clockpicker col-md-offset-2">
                            <div class="col-sm-8 ">
                                <input type="text" class="form-control" value="09:30" id="starttime">
                            </div>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">End Time</label>
                        <div class="input-group clockpicker col-md-offset-2">
                            <div class="col-sm-8 ">
                                <input type="text" class="form-control" value="09:30" id="endtime">
                            </div>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-time"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control1" id="email" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8">
                            <textarea name="txtarea1" id="address" cols="50" rows="10" class="form-control1">

                            </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="number" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">City</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="city" placeholder="City">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Pincode</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="pincode" placeholder="Pincode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Reg No.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="reg_no" placeholder="Reg No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <!--                <label for="txtarea1" class="col-sm-2 control-label"></label>-->
                        <div class="col-sm-8 col-sm-offset-2 ">
                            <button type="submit" class="btn btn-default ">Insert Data</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <div class="footer">
        <?php include_once 'footer.php'; ?>
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
<script type="text/javascript">
    function ajaxfunction() {
        // alert('sas');
        var name = $("#name").val();
        var address = $("#address").val();
        var phone = $("#number").val();
        var city = $("#city").val();
        var pinode = $("#pincode").val();
        var regno = $("#reg_no").val();
        var starttime = $("#starttime").val();
        var endtime = $("#endtime").val();
        var email = $("#email").val();
        if (name != "" && address != "" && phone != "" && city != "" && pinode != "" && regno != "" && starttime != ""&& endtime != "" && email != "") {
            $.ajax({
                type: 'post',
                url: 'DB_Conn/function.php',
                data: {
                    functionname: "medical_store_insert",
                    ajaxfunction: "ajaxfunction",
                    medical_store_name: name,
                    medical_store_address: address,
                    medical_store_phoneno: phone,
                    medical_store_city: city,
                    medical_store_pincode: pinode,
                    medical_store_regno: regno,
                    medical_store_starttime:starttime,
                    medical_store_endtime:endtime,
                    medical_store_email:email
                },
                success: function (response) {
                    console.log(response);
                    if (response == 1) {
                        alert("Medical Store Entered Successfully");
                        $("#dform")[0].reset();
                        window.location.href="medical_list.php";
                    }else if(response==2){
                        alert("Medical Store Is Already Registered");
                        $("#dform")[0].reset();
                    }
                    else {
                        alert("Cannot Enter Data");
                        $("#dform")[0].reset();
                    }
                }
            });
        } else {
            alert("Please Fill All The Details");
        }

        return false;
    }
</script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();
</script>
</body>
</html>