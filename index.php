<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>DIA-MON :: Login</title>
    <?php
    session_start();
    if (isset($_SESSION["username"])) {
        header('location:dashboard.php');
    }
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <div class="main-page login-page ">
            <h3 class="title1">Login Page</h3>
            <div class="widget-shadow">
                <div class="login-top">
                    <h4>Welcome back to DIA-MON Admin Panel </h4>
                </div>
                <div class="login-body">
                    <form action="#" method="post" id="dform" onsubmit="return ajaxfunction();">
                        <input type="email" class="user" id="email" placeholder="Enter your email" required="">
                        <input type="password" id="password" class="lock" placeholder="password" required="">
                        <input type="submit" name="signup" value="Sign In">
                        <div class="forgot-grid">
<!--                            <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Remember me</label>-->
<!--                            <div class="forgot">-->
<!--                                <a href="#">forgot password?</a>-->
<!--                            </div>-->
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--footer-->
    <?php include_once "footer.php" ?>
    <!--//footer-->
</div>
<!-- Classie -->

<!--scrolling js-->
<script type="text/javascript">
    function ajaxfunction() {
        var username = $("#email").val();
        var password = $("#password").val();
        if (username !== "" && password !== "") {
            $.ajax({
                type: 'post',
                url: 'DB_Conn/function.php',
                data: {
                    functionname: "admin_login",
                    ajaxfunction: "ajaxfunction",
                    username: username,
                    password: password
                },
                success: function (response) {
                    console.log(response);
                    if (response == 1) {
                        window.location.href = "dashboard.php";
                    } else {
                        alert("Wrong Details");
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
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"></script>
</body>
</html>