<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php
    session_start();
    if (!isset($_SESSION["username"])) {
        header('location:index.php');
    }
    include_once 'header.php';
    include_once 'sidebar.php';
    ?>
    <title>Doctor Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
</head>
<body class="cbp-spmenu-push">
<div class="main-content">
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            <h3 class="title1">Doctor Insert</h3>
            <div class="blank-page widget-shadow scroll" id="style-2 div1">
                <form class="form-horizontal" method="post" onsubmit="return ajaxfunction();" id="dform">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control1" id="email" placeholder="E-mail" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control1" id="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control1" id="con_password"
                                   placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="fname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="lname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtarea1" class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-8"><textarea name="txtarea1" id="address" cols="50" rows="10"
                                                        class="form-control1"></textarea></div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" maxlength="10" class="form-control1" id="number"
                                   placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="radio-inline"><label><input type="radio" value="Male" id="gender"> Male</label>
                            </div>
                            <div class="radio-inline"><label><input type="radio" value="Female" id="gender">
                                    Female</label></div>
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
                            <input type="text" class="form-control1" id="pincode" maxlength="6" placeholder="Pincode">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Reg No.</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="reg_no" placeholder="Reg No.">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Doctor Degree</label>
                        <div class="col-sm-8">
                            <select name="degree" id="degree">
                                <option value="DNB">D.N.B</option>
                                <option value="BSC">B.Sc</option>
                                <option value="BPHARM">B.Pharm</option>
                                <option value="MD">M.D</option>
                                <option value="MDS">M.D.S</option>
                            </select>
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
<script type="text/javascript">
    function ajaxfunction() {
        var email = $("#email").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var address = $("#address").val();
        var phone = $("#number").val();
        var city = $("#city").val();
        var pinode = $("#pincode").val();
        var regno = $("#reg_no").val();
        var degree = $("#degree").val();
        var pass = $("#password").val();
        var con_pass = $("#con_password").val();
        var gender = $("#gender").val();
        if (email != "" && fname != "" && lname != "" && address != "" && phone != "" && city != "" && pinode != "" && regno != "" && degree != "" && pass != "" && con_pass != "" && gender != "") {
            if (con_pass == pass) {
                $.ajax({
                    type: 'post',
                    url: 'DB_Conn/function.php',
                    data: {
                        functionname: "doctor_insert",
                        ajaxfunction: "ajaxfunction",
                        doctor_email: email,
                        doctor_fname: fname,
                        doctor_lname: lname,
                        doctor_address: address,
                        doctor_phoneno: phone,
                        doctor_city: city,
                        doctor_pincode: pinode,
                        doctor_regno: regno,
                        doctor_password: pass,
                        doctor_gender: gender,
                        doctor_degree: degree
                    },
                    success: function (response) {
                        console.log(response);
                        if (response == 1) {
                            alert("Doctor Entered Sucessfully");
                            $("#dform")[0].reset();
                            window.location.href = "doctor_list.php";
                        } else if (response == 2) {
                            alert("Doctor Is Already Registered With Us");
                            $("#dform")[0].reset();
                        } else {
                            alert("Wrong Details");
                            $("#dform")[0].reset();
                        }
                    }
                });
            } else {
                alert("Both The Passwords Should Be Same");
            }
        } else {
            alert("Please Fill All The Details");
        }

        return false;
    }
</script>
</body>
</html>