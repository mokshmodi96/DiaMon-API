<!DOCTYPE HTML>
<html lang="eng">
<head>
    <?php
    session_start();
    if(!isset($_SESSION["username"])){
        header('location:index.php');
    }
    $msg='';
    if(isset($_GET['msg'])){
        $msg=$_GET['msg'];
    }
    include_once 'header.php';
    include_once 'sidebar.php';
    include_once 'DB_Conn/function.php';
    ?>
    <title>List Doctors</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
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
    <!--    Main Content Tag-->
    <div id="page-wrapper" style="min-height: 307px;">
        <div class="main-page">
            <div class="tables">
                <h5 style="color: red" ><?php echo $msg;?></h5>
                <div class="bs-example widget-shadow" data-example-id="bordered-table">
                    <h4>List Of Users To Verify:</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr> <th>#</th><th>First Name</th> <th>Last Name</th><th>E-mail</th> <th>Contact Number</th> <th>Verify</th><th>Profile</th><th>Delete</th> </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = user_verify_list();
                        $i=1;
                        if ($result->num_rows > 0) {
                            while ($row=$result->fetch_assoc()){
                                    echo "<tr> <th scope='row'>$i</th><td>" . $row["u_fname"] . "</td> <td>" . $row["u_lname"] . "</td> <td>" . $row["u_email"] . "</td><td>" . $row["u_phone_no"] . "</td><td><a href='verify_user.php?id=" . $row['u_id'] . "'>Verify</a></td><td><a href='profile_user.php?pid=" . $row["u_id"] . "'>View Profile</td><td><a href='delete_user.php?id=" . $row['u_id'] . "'>Delete</a></td></tr>";
                                $i++;
                            }
                        }else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Classie -->
<script src="js/classie.js"></script>
<script>
    var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
        showLeftPush = document.getElementById( 'showLeftPush' ),
        body = document.body;

    showLeftPush.onclick = function() {
        classie.toggle( this, 'active' );
        classie.toggle( body, 'cbp-spmenu-push-toright' );
        classie.toggle( menuLeft, 'cbp-spmenu-open' );
        disableOther( 'showLeftPush' );
    };

    function disableOther( button ) {
        if( button !== 'showLeftPush' ) {
            classie.toggle( showLeftPush, 'disabled' );
        }
    }
</script>
<!--scrolling js-->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.js"> </script>
<!--footer-->
<?php include_once 'footer.php'?>
<!--//footer-->
</body>
</html>