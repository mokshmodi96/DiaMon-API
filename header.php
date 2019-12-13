<div class="sticky-header header-section ">
    <div class="header-left">
        <!--toggle button start-->
        <button id="showLeftPush"><i class="fa fa-bars"></i></button>
        <!--toggle button end-->
        <!--logo -->
        <div class="logo">
            <a href="dashboard.php">
                <h1>DIA-MON</h1>
                <span>Dashboard</span>
            </a>
        </div>
        <!--//logo-->
        <div class="clearfix"></div>
    </div>
    <div class="header-right">
        <!--        notifications of menu start -->
        <div class="profile_details_left">
            <ul class="nofitications-dropdown">
                <li class="dropdown head-dpdn">
                    <?php
                    include_once "DB_Conn/function.php";
                    $sql = selectUserNotify();
                    $sql1 = selectMedicalNotify();
                    $sql2 = selectDoctorNotify();
                    if ($sql->num_rows > 0 or $sql1->num_rows > 0 or $sql2->num_rows > 0) {
                        echo <<<TAG
<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                class="fa fa-bell"></i><span class="badge blue">*</span></a>
                    <ul class="dropdown-menu">
TAG;
                        echo "<li>
                    <div class=\"notification_header\">
                        <h3>Notifications</h3>
                    </div>
                </li>";
                        if ($sql->num_rows > 0) {
                            $row = $sql->fetch_assoc();
                            echo "<li><a href=\"user_verify_list.php\">
                        <div class=\"notification_desc\">
                            <p>" . $sql->num_rows . " Users To Verify</p>                         
                        </div>
                        <div class=\"clearfix\"></div>
                    </a></li>";
                        }
                        if ($sql2->num_rows > 0) {
                            $row = $sql2->fetch_assoc();
                            echo "
                <li class=\"odd\"><a href=\"doctor_list.php\">
                            <div class=\"notification_desc\">
                            <p>" . $sql2->num_rows . " Doctors To Verify</p>
                        </div>
                        <div class=\"clearfix\"></div>
                    </a></li>";
                        }
                        if ($sql1->num_rows > 0) {
                            $row = $sql1->fetch_assoc();
                            echo "
                <li><a href=\"medical_list.php\">
                        <div class=\"notification_desc\">
                            <p>" . $sql1->num_rows. " Medical Stores To Verify</p>
                        </div>
                        <div class=\"clearfix\"></div>
                    </a></li>";
                        }
                    } else {
                        echo "<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" aria-expanded=\"false\"><i
                                class=\"fa fa-bell\"></i></a>
                    <ul class=\"dropdown-menu\">";
                        echo "<li><div class='notification_header'><h3>No Notifications</h3></div></li>";
                    }
                    ?>
            </ul>
            </li>
            <!--                <li class="dropdown head-dpdn">-->
            <!--                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i-->
            <!--                                class="fa fa-tasks"></i><span class="badge blue1">15</span></a>-->
            <!--                    <ul class="dropdown-menu">-->
            <!--                        <li>-->
            <!--                            <div class="notification_header">-->
            <!--                                <h3>You have 8 pending task</h3>-->
            <!--                            </div>-->
            <!--                        </li>-->
            <!--                        <li><a href="#">-->
            <!--                                <div class="task-info">-->
            <!--                                    <span class="task-desc">Database update</span><span class="percentage">40%</span>-->
            <!--                                    <div class="clearfix"></div>-->
            <!--                                </div>-->
            <!--                                <div class="progress progress-striped active">-->
            <!--                                    <div class="bar yellow" style="width:40%;"></div>-->
            <!--                                </div>-->
            <!--                            </a></li>-->
            <!--                        <li><a href="#">-->
            <!--                                <div class="task-info">-->
            <!--                                    <span class="task-desc">Dashboard done</span><span class="percentage">90%</span>-->
            <!--                                    <div class="clearfix"></div>-->
            <!--                                </div>-->
            <!--                                <div class="progress progress-striped active">-->
            <!--                                    <div class="bar green" style="width:90%;"></div>-->
            <!--                                </div>-->
            <!--                            </a></li>-->
            <!--                        <li><a href="#">-->
            <!--                                <div class="task-info">-->
            <!--                                    <span class="task-desc">Mobile App</span><span class="percentage">33%</span>-->
            <!--                                    <div class="clearfix"></div>-->
            <!--                                </div>-->
            <!--                                <div class="progress progress-striped active">-->
            <!--                                    <div class="bar red" style="width: 33%;"></div>-->
            <!--                                </div>-->
            <!--                            </a></li>-->
            <!--                        <li><a href="#">-->
            <!--                                <div class="task-info">-->
            <!--                                    <span class="task-desc">Issues fixed</span><span class="percentage">80%</span>-->
            <!--                                    <div class="clearfix"></div>-->
            <!--                                </div>-->
            <!--                                <div class="progress progress-striped active">-->
            <!--                                    <div class="bar  blue" style="width: 80%;"></div>-->
            <!--                                </div>-->
            <!--                            </a></li>-->
            <!--                        <li>-->
            <!--                            <div class="notification_bottom">-->
            <!--                                <a href="#">See all pending tasks</a>-->
            <!--                            </div>-->
            <!--                        </li>-->
            <!--                    </ul>-->
            <!--                </li>-->
            </ul>
            <div class="clearfix"></div>
        </div>
        <!--        notification menu end-->
        <div class="profile_details">
            <ul>
                <li class="dropdown profile_details_drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div class="profile_img">
                            <span class="prfil-img"><img src="images/profile.png" alt="" height="50" width="50"> </span>
                            <div class="user-name">
                                <p><?php echo $_SESSION["username"] ?></p>
                                <span>Administrator</span>
                            </div>
                            <i class="fa fa-angle-down lnr"></i>
                            <i class="fa fa-angle-up lnr"></i>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <ul class="dropdown-menu drp-mnu">
                        <!--                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>-->
                        <li><a href="profile.php"><i class="fa fa-user"></i> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div>