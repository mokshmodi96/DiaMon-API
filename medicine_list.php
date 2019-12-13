<!DOCTYPE HTML>
<html lang="en">
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
    <title>List Medicines</title>
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
                    <h4>List Of Medicines:</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr> <th>#</th><th>Medicine Name</th><th>Company Name</th> <th>Price</th> <th>Medicine Drug</th> <th>Medicine Drug Type</th><th>Delete Medicine</th></tr>
                        </thead>
                        <tbody>
                        <?php
                        $result = medicine_list();
                        $i=1;
                        if ($result->num_rows > 0) {
                            while ($row=$result->fetch_assoc()){
                                echo "<tr> <th scope='row'>$i</th> <td>".$row["m_name"]."</td><td>".$row["m_company"]."</td> <td>".$row["m_price"]."</td> <td>".$row["m_drug"]."</td><td>".$row["m_drug_type"]."</td><td><a href='delete_medicine.php?id=".$row['m_id']."'>Delete</a></td> </tr>";
                                $i++;
                            }
                        }else{
                            echo "No Record Found";
                        }
                        ?>
                        </tbody>
                    </table>
                    <a href="medicine_insert.php">Insert New Medicine</a>
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