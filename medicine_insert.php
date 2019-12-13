<!DOCTYPE HTML>
<html lang="en">
<head>
    <?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header('location:index.php');
    }
    include_once 'header.php';
    include_once 'sidebar.php';
    ?>
    <title>Medicine Insert</title>
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
    <!-- main content start-->
    <div id="page-wrapper">
        <div class="main-page">
            <h3 class="title1">Medicine Insert</h3>
            <div class="blank-page widget-shadow scroll" id="style-2 div1">
                <form class="form-horizontal" action="#" method="post" id="dform" onsubmit="return ajaxfunction();">
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Medicine Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="mediname" placeholder="Medicine Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Manufacturing Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="comname" placeholder="Manufacturing Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Medicine Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="mediprice" placeholder="Medicine Price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Drug Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="drugname" placeholder="Drug Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Drug Type</label>
                        <div class="col-sm-8">
                            <select name="drug_type" id="drug_type">
                                <option value="Fever">Fever</option>
                                <option value="Diabetes">Diabetes</option>
                                <option value="Vaccination">Vaccination</option>
                                <option value="Nursing">Nursing</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2 ">
                            <button type="submit" class="btn btn-default ">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!--footer-->
    <div class="footer">
        <?php include_once 'footer.php';?>
    </div>
    <!--//footer-->
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


<script type="text/javascript">
    function ajaxfunction() {
        var name = $("#mediname").val();
        var cname = $("#comname").val();
        var price = $("#mediprice").val();
        var drugname = $("#drugname").val();
        var drug_type = $("#drug_type").val();
        if (name != ""&&cname != ""&&price != "" && drugname != "" && drug_type!= "") {
            $.ajax({
                type: 'post',
                url: 'DB_Conn/function.php',
                data: {
                    functionname: "insert_medicine",
                    ajaxfunction: "ajaxfunction",
                    m_name: name,
                    m_company: cname,
                    m_price: price,
                    m_drug: drugname,
                    m_drug_type: drug_type
                },
                success: function (response) {
                    console.log(response);
                    if (response == 1) {
                        alert("Medicine Entered Sucessfully");
                        $("#dform")[0].reset();
                        window.location.href="medicine_list.php";
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
</body>
</html>