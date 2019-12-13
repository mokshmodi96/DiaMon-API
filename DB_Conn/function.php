<?php
include 'conn.php';
if (isset($_POST["functionname"])) {
    $functionname = $_POST["functionname"];
    switch ($functionname) {
        case "admin_login":
            session_start();
            global $conn;
            $username = mysqli_escape_string($conn, $_POST['username']);
            $password = mysqli_escape_string($conn, $_POST['password']);
            $password = base64_encode(strrev(md5($password)));
            admin_login($username, $password);
            break;
        case "medical_store_insert":
            global $conn;
            $m_s_name = mysqli_escape_string($conn, $_POST["medical_store_name"]);
            $m_s_email = mysqli_escape_string($conn, $_POST["medical_store_email"]);
            $m_s_address = mysqli_escape_string($conn, $_POST["medical_store_address"]);
            $m_s_phoneno = mysqli_escape_string($conn, $_POST["medical_store_phoneno"]);
            $m_s_city = mysqli_escape_string($conn, $_POST["medical_store_city"]);
            $m_s_pincode = mysqli_escape_string($conn, $_POST["medical_store_pincode"]);
            $m_s_regno = mysqli_escape_string($conn, $_POST["medical_store_regno"]);
            $m_s_starttime = mysqli_escape_string($conn, $_POST["medical_store_starttime"]);
            $m_s_endtime = mysqli_escape_string($conn, $_POST["medical_store_endtime"]);
//            $m_s_alltime = $_POST["medical_store_alltime"]);
            medical_store_insert($m_s_name, $m_s_email, $m_s_address, $m_s_phoneno, $m_s_city, $m_s_pincode, $m_s_regno, $m_s_starttime, $m_s_endtime);
            break;
        case "doctor_insert":
            global $conn;
            $doctor_email = mysqli_escape_string($conn, $_POST["doctor_email"]);
            $doctor_fname = mysqli_escape_string($conn, $_POST["doctor_fname"]);
            $doctor_lname = mysqli_escape_string($conn, $_POST["doctor_lname"]);
            $doctor_address = mysqli_escape_string($conn, $_POST["doctor_address"]);
            $doctor_phoneno = mysqli_escape_string($conn, $_POST["doctor_phoneno"]);
            $doctor_city = mysqli_escape_string($conn, $_POST["doctor_city"]);
            $doctor_pincode = mysqli_escape_string($conn, $_POST["doctor_pincode"]);
            $doctor_regno = mysqli_escape_string($conn, $_POST["doctor_regno"]);
            $doctor_degree = mysqli_escape_string($conn, $_POST["doctor_degree"]);
            $doctor_gender = mysqli_escape_string($conn, $_POST["doctor_gender"]);
            $doctor_password = mysqli_escape_string($conn, $_POST["doctor_password"]);
            $doctor_password = base64_encode(strrev(md5($doctor_password)));
            doctor_insert($doctor_email, $doctor_password, $doctor_fname, $doctor_lname, $doctor_address, $doctor_city, $doctor_phoneno, $doctor_pincode, $doctor_regno, $doctor_degree, $doctor_gender);
            break;
        case "insert_medicine":
            global $conn;
            $m_name = mysqli_escape_string($conn, $_POST["m_name"]);
            $m_company = mysqli_escape_string($conn, $_POST["m_company"]);
            $m_price = mysqli_escape_string($conn, $_POST["m_price"]);
            $m_drug = mysqli_escape_string($conn, $_POST["m_drug"]);
            $m_drug_type = mysqli_escape_string($conn, $_POST["m_drug_type"]);
            insert_medicine($m_name, $m_company, $m_price, $m_drug, $m_drug_type);
            break;
        case "update_admin":
            global $conn;
            $password = mysqli_escape_string($conn,$_POST["password"]);
            $username=mysqli_escape_string($conn,$_POST["username"]);
            $password = base64_encode(strrev(md5($password)));
            update_admin_profile($password,$username);
            break;
        case "update_user":
            global $conn;
            $password = mysqli_escape_string($conn,$_POST["password"]);
            $email=mysqli_escape_string($conn,$_POST["email"]);
            $fname=mysqli_escape_string($conn,$_POST["fname"]);
            $lname=mysqli_escape_string($conn,$_POST["lname"]);
            $password = base64_encode(strrev(md5($password)));
            update_user_profile($password,$fname,$lname,$email);
            break;
    }
}
function medical_store_insert($m_s_name, $m_s_email, $m_s_address, $m_s_phoneno, $m_s_city, $m_s_pincode, $m_s_regno, $m_s_starttime, $m_s_endtime)
{
    global $conn;
    if (isset($_POST['ajaxfunction'])) {
        date_default_timezone_set("Asia/calcutta");
        $now = date("Y-m-d");
        $sql = <<<SQL
SELECT * FROM medical_store WHERE m_s_regno='$m_s_regno' AND m_s_email='$m_s_email'
SQL;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo $flag = 2;
        } else {
            $sql1 = <<<SQL
INSERT INTO medical_store(m_s_name,m_s_email, m_s_address, m_s_phone_no, m_s_city, m_s_pincode, m_s_regno, m_s_starttime, m_s_endtime,m_s_status, m_s_createdate, m_s_modifydate)
 VALUES ('$m_s_name','$m_s_email','$m_s_address','$m_s_phoneno','$m_s_city','$m_s_pincode','$m_s_regno','$m_s_starttime','$m_s_endtime',0,'$now','$now')
SQL;
            $result = mysqli_query($conn, $sql1) or die(mysqli_error($conn));
            if ($result) {
                echo $flag = 1;
            } else {
                echo $flag = 0;
            }
        }
    }
    exit();
}

function admin_login($username, $password)
{
    global $conn;
    if (isset($_POST['ajaxfunction'])) {
        $sql = $conn->query(<<<SQL
SELECT * FROM admin_login WHERE username='$username' AND password='$password'
SQL

        );
        if ($sql->num_rows > 0) {
            $_SESSION["username"] = $username;
            echo 1;
        } else {
            echo 0;
        }
    }
    exit();
}

function doctor_list()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT doctor_login.d_status,doctor_info.d_i_id,doctor_info.d_firstname,doctor_info.d_lastname,doctor_info.d_contact_info,doctor_info.d_address,doctor_info.d_city,doctor_info.d_pincode, doctor_info.d_reg FROM `dia-mon_db`.doctor_info INNER JOIN doctor_login ON doctor_info.d_id=doctor_login.d_id
SQL
    );
    return $sql;
}

function medical_list()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT m_s_id,m_s_name,m_s_email,m_s_phone_no,m_s_address,m_s_city,m_s_pincode,m_s_regno,m_s_starttime,m_s_endtime,m_s_status FROM medical_store
SQL
    );
    return $sql;
}

function user_list()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM user_login
SQL
    );
    return $sql;
}

function selectMedicalProfile($pid)
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM medical_store WHERE m_s_id='$pid'
SQL
    );
    return $sql;
}

function selectAdminProfile($username)
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM admin_login WHERE username='$username'
SQL
    );
    return $sql;
}

function selectDoctorProfile($pid)
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM doctor_info INNER JOIN doctor_login ON doctor_login.d_id=doctor_info.d_id WHERE d_i_id='$pid'
SQL
    );
    return $sql;
}

function selectUserProfile($pid)
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM user_login WHERE u_id='$pid'
SQL
    );
    return $sql;
}

function medicine_list()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM medicine_data
SQL
    );
    return $sql;
}

function doctor_insert($doctor_email, $doctor_password, $doctor_fname, $doctor_lname, $doctor_address, $doctor_city, $doctor_phoneno, $doctor_pincode, $doctor_regno, $doctor_degree, $doctor_gender)
{
    global $conn;
    if (isset($_POST['ajaxfunction'])) {
        date_default_timezone_set('Asia/calcutta');
        $now = date('Y-m-d');
        $sql = <<<SQL
SELECT * FROM doctor_login ,doctor_info where d_email='$doctor_email' or d_reg='$doctor_regno'
SQL;
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            echo $flag = 2;
        } else {
            $sql1 = <<<SQL
INSERT INTO doctor_login(d_email, d_password,d_status, d_created_time, d_modify_date) VALUES ('$doctor_email','$doctor_password','0','$now','$now')
SQL;
            if ($conn->query($sql1) === TRUE) {
                $last_id = $conn->insert_id;
                $sql2 = <<<SQL
INSERT INTO doctor_info(`d_id`, `d_firstname`, `d_lastname`, `d_contact_info`, `d_gender`, `d_address`, `d_city`, `d_pincode`, `d_reg`, `d_degree`, `d_createddate`, `d_modifydate`) VALUES ('$last_id','$doctor_fname','$doctor_lname','$doctor_phoneno','$doctor_gender','$doctor_address','$doctor_city','$doctor_pincode','$doctor_regno','$doctor_degree','$now','$now')
SQL;
                if ($conn->query($sql2) === TRUE) {
                    echo $flag = 1;
                } else {
                    echo $flag = 0;
                }

            } else {
                echo $flag = 0;
            }
        }
    }
    exit();
}

function insert_medicine($m_name, $m_company, $m_price, $m_drug, $m_drug_type)
{
    global $conn;
    if (isset($_POST["ajaxfunction"])) {
        date_default_timezone_set("Asia/calcutta");
        $now = date("Y-m-d");
        $sql = <<<SQL
INSERT INTO medicine_data(m_name, m_company, m_price, m_drug, m_drug_type, createdate, modifydate) VALUES ('$m_name','$m_company',$m_price,'$m_drug','$m_drug_type','$now','$now')
SQL;
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        if ($result) {
            echo $flag = 1;
        } else {
            echo $flag = 0;
        }
    }
    exit();
}

function delete_medicine($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
DELETE FROM medicine_data WHERE m_id='$id'
SQL
    );
    return $sql;
}

function delete_medical($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
DELETE FROM medical_store WHERE m_s_id='$id'
SQL
    );
    return $sql;
}

function delete_user($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
DELETE FROM user_login WHERE u_id='$id'
SQL
    );
    return $sql;
}

function delete_doctor($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
DELETE doctor_info,doctor_login FROM doctor_info INNER JOIN doctor_login ON doctor_login.d_id=doctor_info.d_id WHERE d_i_id='$id'
SQL

    );
    return $sql;
}

function verify_doctor($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
UPDATE doctor_login SET d_status=1 WHERE d_id='$id'
SQL
    );
    return $sql;
}

function verify_medical($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
UPDATE medical_store SET m_s_status=1 WHERE m_s_id='$id'
SQL
    );
    return $sql;
}

function verify_user($id)
{
    global $conn;
    $id = mysqli_escape_string($conn, $id);
    $sql = $conn->query(<<<SQL
UPDATE user_login SET u_status=1 WHERE u_id='$id'
SQL
    );
    return $sql;
}

function user_verify_list()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM user_login  WHERE u_status=0
SQL
    );
    return $sql;
}

function selectUserNotify()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM user_login WHERE u_status=0
SQL
    );
    return $sql;
}

function selectDoctorNotify()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM doctor_login WHERE d_status=0
SQL
    );
    return $sql;
}

function selectMedicalNotify()
{
    global $conn;
    $sql = $conn->query(<<<SQL
SELECT * FROM medical_store WHERE m_s_status=0
SQL
    );
    return $sql;
}

function update_admin_profile($password,$username){
    global $conn;
    if(isset($_POST["ajaxfunction"])) {
        $sql = <<<SQL
UPDATE admin_login SET password='$password' WHERE username='$username'
SQL;
        $result=mysqli_query($conn,$sql);
        if($result){
            echo $flag=1;
        }else{
            echo $flag=0;
        }
    }else{
        return "Invalid Request";
    }
}
function update_user_profile($password,$uname,$lname,$email){
    global $conn;
    if(isset($_POST["ajaxfunction"])) {
        $sql = <<<SQL
UPDATE user_login SET u_password='$password',u_fname='$uname',u_lname='$lname' WHERE u_email='$email'
SQL;
        $result=mysqli_query($conn,$sql);
        if($result){
            echo $flag=1;
        }else{
            echo $flag=0;
        }
    }else{
        return "Invalid Request";
    }
}