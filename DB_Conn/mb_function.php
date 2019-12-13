<?php
include 'conn.php';
if (isset($_REQUEST["diamon"])) {
    $functionname = $_REQUEST["diamon"];
    switch ($functionname) {
        case 'doc_login':
            global $conn;
            $email = mysqli_escape_string($conn, $_REQUEST['email']);
            $password = mysqli_escape_string($conn, $_REQUEST['password']);
            $password = base64_encode(strrev(md5($password)));
            doc_login($email, $password);
            break;

        case 'doc_reg':
            $email = mysqli_escape_string($conn, $_REQUEST['email']);
            $password = mysqli_escape_string($conn, $_REQUEST['password']);
            $d_firstname = mysqli_escape_string($conn, $_REQUEST['d_firstname']);
            $d_lastname = mysqli_escape_string($conn, $_REQUEST['d_lastname']);
            $d_gender = mysqli_escape_string($conn, $_REQUEST['d_gender']);
            $d_contact_info = mysqli_escape_string($conn, $_REQUEST['d_contact_info']);
            $d_address = mysqli_escape_string($conn, $_REQUEST['d_address']);
            $d_city = mysqli_escape_string($conn, $_REQUEST['d_city']);
            $d_pincode = mysqli_escape_string($conn, $_REQUEST['d_pincode']);
            $d_reg = mysqli_escape_string($conn, $_REQUEST['d_reg']);
            $d_degree = mysqli_escape_string($conn, $_REQUEST['d_degree']);
            $password = base64_encode(strrev(md5($password)));
            doc_reg($email, $password, $d_firstname, $d_lastname, $d_gender, $d_contact_info, $d_address, $d_city, $d_pincode, $d_reg, $d_degree);
            break;
        case 'c_login':
            global $conn;
            $email = mysqli_escape_string($conn, $_REQUEST['email']);
            $password = mysqli_escape_string($conn, $_REQUEST['password']);
            $password = base64_encode(strrev(md5($password)));
            c_login($email, $password);
            break;

        case 'c_reg':
            global $conn;
            $u_fname = mysqli_escape_string($conn, $_REQUEST['u_fname']);
            $u_lname = mysqli_escape_string($conn, $_REQUEST['u_lname']);
            $u_email = mysqli_escape_string($conn, $_REQUEST['email']);
            $u_phone_no = mysqli_escape_string($conn, $_REQUEST['u_phone_no']);
            $u_gender = mysqli_escape_string($conn, $_REQUEST['u_gender']);
            $u_password = mysqli_escape_string($conn, $_REQUEST['password']);
            $u_password = base64_encode(strrev(md5($u_password)));
            c_reg($u_fname, $u_lname, $u_email, $u_phone_no, $u_gender, $u_password);

            break;
        case 'u_change_password':
            global $conn;
            $u_id = mysqli_escape_string($conn, $_REQUEST['u_id']);
            $u_password = mysqli_escape_string($conn, $_REQUEST['u_password']);
            $u_password = base64_encode(strrev(md5($u_password)));
            u_change_password($u_id, $u_password);
            break;
        case 'd_change_password':
            global $conn;
            $d_id = mysqli_escape_string($conn, $_REQUEST['d_id']);
            $d_password = mysqli_escape_string($conn, $_REQUEST['d_password']);
            $d_password = base64_encode(strrev(md5($d_password)));
            d_change_password($d_id, $d_password);
            break;
        case 'u_change_pic':
            global $conn;
            $u_id = mysqli_escape_string($conn, $_REQUEST['u_id']);
            $u_pic = mysqli_escape_string($conn, $_REQUEST['u_pic']);
            u_change_pic($u_id, $u_pic);
            break;

        case 'd_change_pic':
            global $conn;
            $d_id = mysqli_escape_string($conn, $_REQUEST['d_id']);
            $d_pic = mysqli_escape_string($conn, $_REQUEST['d_pic']);
            d_change_pic($d_id, $d_pic);
            break;
        case 'medical_store_list':
            medical_store_list();
            break;
        case 'medicine_list':
            medicine_list();
            break;
        case 'doc_list':
            $c_id=$_REQUEST['c_id'];
            doc_list($c_id);
            # code...
            break;
        case 'fdoc_list':
            $c_id=$_REQUEST['c_id'];
            fdoc_list($c_id);
            # code...
            break;
        case 'UsreuestDoc':
            $u_id=$_REQUEST['u_id'];
            $d_id=$_REQUEST['d_id'];
            UsreuestDoc($u_id,$d_id);
            break;

        case 'user_list_doc':
            $d_id=$_REQUEST['d_id'];
            user_list_doc($d_id);
                break;
        case 'auser_list_doc':
            $d_id=$_REQUEST['d_id'];
            auser_list_doc($d_id);
            break;

        case 'Doctouser':
            $u_id=$_REQUEST['u_id'];
            $d_id=$_REQUEST['d_id'];

            Doctouser($u_id,$d_id);
            break;
        case 'sendappionment':
            $u_id=$_REQUEST['u_id'];
            $d_id=$_REQUEST['d_id'];
            $adate=$_REQUEST['adate'];
            $atime=$_REQUEST['atime'];
            sendappionment($u_id,$d_id,$adate,$atime);
            break;
        case 'getappionmentuser':
            $u_id=$_REQUEST['u_id'];
            getappionmentuser($u_id);
            break;

        case 'getappionmentdoc':
            $d_id=$_REQUEST['d_id'];
            getappionmentdoc($d_id);
            break;

        case 'upappionmentdoc':
            $a_d_id=$_REQUEST['a_d_id'];
            upappionmentdoc($a_d_id);
                break;

        case 'caappionmentdoc':
            $a_d_id=$_REQUEST['a_d_id'];
            caappionmentdoc($a_d_id);
            break;
        case 'add_sucription':
            $d_id=$_REQUEST['d_id'];
            $c_id=$_REQUEST['c_id'];
            $pre_detail=$_REQUEST['pre_detail'];
            $pre_pic=$_REQUEST['pre_pic'];
            $r_id=$_REQUEST['r_id'];
            add_sucription($d_id,$c_id,$pre_detail,$pre_pic,$r_id);
                break;

        case 'add_report':
            $d_id=$_REQUEST['d_id'];
            $c_id=$_REQUEST['c_id'];
            $pre_detail=$_REQUEST['pre_detail'];
            $pre_pic=$_REQUEST['pre_pic'];
            add_report($d_id,$c_id,$pre_detail,$pre_pic);
            break;
            case 'doc_subcir':
            $d_id=$_REQUEST['d_id'];
            $c_id=$_REQUEST['c_id'];
            doc_subcir($c_id,$d_id);
            break;

        case 'user_subcir':
            $c_id=$_REQUEST['c_id'];
            user_subcir($c_id);
            break;

    }

}


function doc_login($username, $password)
{
    $doc_info = array();
    global $conn;

    $sql = <<<SQL
SELECT * FROM doctor_login where d_email='$username' and d_password='$password'
SQL;
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        if ($row['d_status'] == 1) {
            $d_id = $row['d_id'];

            $sql1 = <<<SQL
select * from doctor_info where d_id='$d_id'
SQL;

            $res1 = $conn->query($sql1);
            $row1 = $res1->fetch_assoc();


            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Doctor is login successfully';
            $row_doctor_array['d_id'] = $row['d_id'];
            $row_doctor_array['d_email'] = $row['d_email'];
            $row_doctor_array['d_password'] = $row['d_password'];
            $row_doctor_array['d_status'] = $row['d_status'];
            $row_doctor_array['d_firstname'] = $row1['d_firstname'];

            $row_doctor_array['d_lastname'] = $row1['d_lastname'];
            $row_doctor_array['d_gender'] = $row1['d_gender'];

            $row_doctor_array['d_contact_info'] = $row1['d_contact_info'];
            $row_doctor_array['d_pic'] = $row1['d_pic'];
            $row_doctor_array['d_address'] = $row1['d_address'];
            $row_doctor_array['d_city'] = $row1['d_city'];
            $row_doctor_array['d_pincode'] = $row1['d_pincode'];
            $row_doctor_array['d_reg'] = $row1['d_reg'];
            $row_doctor_array['d_degree'] = $row1['d_degree'];


            array_push($doc_info, $row_doctor_array);


        } else {

            $row_doctor_array['status'] = '2';
            $row_doctor_array['msg'] = 'Doctor is not verify by the admin';
            array_push($doc_info, $row_doctor_array);
        }

    } else {
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'Doctor username and password is wrong';
        array_push($doc_info, $row_doctor_array);

    }
    echo json_encode($doc_info);


}

function add_sucription($d_id,$c_id,$pre_detail,$pre_pic,$r_id)
{

    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');
    $imagename = random_string(20);
    $path = "upload/sub_$imagename.jpg";
    $sql="INSERT INTO `doc_pre`( `d_id`, `u_id`, `pre_detail`, `pre_pic`, `pre_date`, `c_r_id`) VALUES ('$d_id','$c_id','$pre_detail','$path','$now','$r_id')";


    if($conn->query($sql)===TRUE)
    {        file_put_contents($path, base64_decode($pre_pic));

        $row_doctor_array['status'] = '1';
        $row_doctor_array['msg'] = 'Doctor Subcription addedd successfully';
        array_push($doc_info, $row_doctor_array);
    }
    else{
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'Error In adding Subcription';
        array_push($doc_info, $row_doctor_array);
    }

    echo json_encode($doc_info);

}

function add_report($d_id,$c_id,$pre_detail,$pre_pic)
{

    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');
    $imagename = random_string(20);
    $path = "upload/rep_$imagename.jpg";
    $sql="INSERT INTO `ci_re_detail`( `d_id`, `c_id`, `c_pic`, `c_desc`, `c_date`) VALUES ('$d_id','$c_id','$path','$pre_detail','$now')";

    if($conn->query($sql)===TRUE)
    {        file_put_contents($path, base64_decode($pre_pic));

        $row_doctor_array['status'] = '1';
        $row_doctor_array['msg'] = 'Doctor Report addedd successfully';
        array_push($doc_info, $row_doctor_array);
    }
    else{
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'Error In adding Report';
        array_push($doc_info, $row_doctor_array);
    }

    echo json_encode($doc_info);

}
function user_subcir($c_id)
{
    $doc_info = array();
    global $conn;
    $sql="SELECT * FROM `doc_pre` ,doctor_info where doctor_info.d_id=doc_pre.d_id and doc_pre.u_id='$c_id'";
    $res=$conn->query($sql);
    if($res->num_rows >0)
    {
        while ($row = $res->fetch_assoc())
        {

            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Subcription List Found';
            $row_doctor_array['d_id'] = $row['d_id'];
            $row_doctor_array['u_id'] = $row['u_id'];
            $row_doctor_array['pre_detail'] = $row['pre_detail'];
            $row_doctor_array['pre_pic'] = $row['pre_pic'];
            $row_doctor_array['pre_date'] = $row['pre_date'];
            $row_doctor_array['u_fname'] = $row['d_firstname'];
            $row_doctor_array['u_phone_no'] = $row['d_contact_info'];
            $row_doctor_array['c_r_id'] = $row['c_r_id'];


            array_push($doc_info, $row_doctor_array);

        }

    }
    else{

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'No Subcription List Found';
        array_push($doc_info, $row_doctor_array);

    }
    echo json_encode($doc_info);

}
function doc_subcir($c_id,$d_id)
{
    $doc_info = array();
    global $conn;
     $sql="SELECT * FROM `doc_pre` ,user_login where user_login.u_id=doc_pre.u_id and doc_pre.u_id='$c_id' and doc_pre.d_id='$d_id'";
    $res=$conn->query($sql);
    if($res->num_rows >0)
    {
        while ($row = $res->fetch_assoc())
        {

            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Subcription List Found';
            $row_doctor_array['d_id'] = $row['d_id'];
            $row_doctor_array['u_id'] = $row['u_id'];
            $row_doctor_array['pre_detail'] = $row['pre_detail'];
            $row_doctor_array['pre_pic'] = $row['pre_pic'];
            $row_doctor_array['pre_date'] = $row['pre_date'];
            $row_doctor_array['u_fname'] = $row['u_fname'];
            $row_doctor_array['u_phone_no'] = $row['u_phone_no'];
            $row_doctor_array['c_r_id'] = $row['c_r_id'];


            array_push($doc_info, $row_doctor_array);

        }

    }
    else{

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'No Subcription List Found';
        array_push($doc_info, $row_doctor_array);

    }

    echo json_encode($doc_info);

}

function doc_reg($email, $password, $d_firstname, $d_lastname, $d_gender, $d_contact_info, $d_address, $d_city, $d_pincode, $d_reg, $d_degree)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');
    $sql = <<<SQL
SELECT * FROM doctor_login ,doctor_info where d_email='$email' or d_reg='$d_reg'
SQL;
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {

        $row_doctor_array['status'] = '2';
        $row_doctor_array['msg'] = 'Doctor is already register with us';
        array_push($doc_info, $row_doctor_array);
    } else {


        $sql1 = <<<SQL
INSERT INTO doctor_login(d_email, d_password,d_status, d_created_time, d_modify_date) VALUES ('$email','$password','0','$now','$now')
SQL;
        if ($conn->query($sql1) === TRUE) {
            $last_id = $conn->insert_id;


            $sql2 = <<<SQL
INSERT INTO doctor_info(`d_id`, `d_firstname`, `d_lastname`, `d_contact_info`, `d_gender`, `d_address`, `d_city`, `d_pincode`, `d_reg`, `d_degree`, `d_createddate`, `d_modifydate`) VALUES ('$last_id','$d_firstname','$d_lastname','$d_contact_info','$d_gender','$d_address','$d_city','$d_pincode','$d_reg','$d_degree','$now','$now')
SQL;

            if ($conn->query($sql2) === TRUE) {

                $row_doctor_array['status'] = '1';
                $row_doctor_array['msg'] = 'Doctor is  register successfully';
                array_push($doc_info, $row_doctor_array);
            } else {

                $row_doctor_array['status'] = '0';
                $row_doctor_array['msg'] = 'Doctor is  register error';
                array_push($doc_info, $row_doctor_array);
            }

        } else {
            $row_doctor_array['status'] = '0';
            $row_doctor_array['msg'] = 'Doctor is  register error';
            array_push($doc_info, $row_doctor_array);

        }


    }

    echo json_encode($doc_info);


}


function c_login($email, $password)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');
    $sql = <<<SQL
SELECT * FROM user_login where u_email='$email' and  u_password='$password'
SQL;
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();

        if ($row['u_status'] == 1) {
            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'User Login successfully';
            $row_doctor_array['u_id'] = $row['u_id'];
            $row_doctor_array['u_fname'] = $row['u_fname'];
            $row_doctor_array['u_lname'] = $row['u_lname'];
            $row_doctor_array['u_email'] = $row['u_email'];

            $row_doctor_array['u_phone_no'] = $row['u_phone_no'];
            $row_doctor_array['u_gender'] = $row['u_gender'];
            $row_doctor_array['u_pic'] = $row['u_pic'];
            $row_doctor_array['u_status'] = $row['u_status'];


            array_push($doc_info, $row_doctor_array);

        } else {

            $row_doctor_array['status'] = '2';
            $row_doctor_array['msg'] = 'User is not verify by the admin';
            array_push($doc_info, $row_doctor_array);
        }

    } else {

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'User Login error';
        array_push($doc_info, $row_doctor_array);


    }

    echo json_encode($doc_info);


}

function c_reg($u_fname, $u_lname, $u_email, $u_phone_no, $u_gender, $u_password)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');
    $sql = <<<SQL
SELECT * FROM user_login where u_email='$u_email'
SQL;
    $res = $conn->query($sql);
    if ($res->num_rows > 0) {

        $row_doctor_array['status'] = '2';
        $row_doctor_array['msg'] = 'User is already register with us';
        array_push($doc_info, $row_doctor_array);
    } else {

        $sql1 = <<<SQL
INSERT INTO user_login(`u_fname`, `u_lname`, `u_email`, `u_password`, `u_phone_no`, `u_gender`,  `u_status`, `createdate`, `modifydate`) VALUES ('$u_fname','$u_lname','$u_email','$u_password','$u_phone_no','$u_gender','0','$now','$now')
SQL;


        if ($conn->query($sql1) === TRUE) {
            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'User Register successfully';
            array_push($doc_info, $row_doctor_array);
        } else {
            $row_doctor_array['status'] = '0';
            $row_doctor_array['msg'] = 'User Register error';
            array_push($doc_info, $row_doctor_array);

        }


    }


    echo json_encode($doc_info);


}

function u_change_password($u_id, $u_password)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');

    $sql = <<<SQL
UPDATE `user_login` SET u_password='$u_password',`modifydate`='$now' WHERE u_id='$u_id'
SQL;

    if ($conn->query($sql) === TRUE) {

        $row_doctor_array['status'] = '1';
        $row_doctor_array['msg'] = 'User Pasword chnage successfully';
        array_push($doc_info, $row_doctor_array);
    } else {

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'User Pasword chnage error';
        array_push($doc_info, $row_doctor_array);
    }

    echo json_encode($doc_info);

}

function u_change_pic($u_id, $u_pic)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');
    $imagename = random_string(20);
    $path = "upload/ui_$imagename.jpg";
    $sql = <<<SQL
UPDATE user_login SET u_pic='$path',modifydate='$now' WHERE u_id='$u_id'
SQL;
    if ($conn->query($sql) === TRUE) {
        file_put_contents($path, base64_decode($u_pic));

        $row_doctor_array['status'] = '1';
        $row_doctor_array['msg'] = 'User Image Upload Successfully';
        $row_doctor_array['p_image_path'] = $path;
        array_push($doc_info, $row_doctor_array);

    } else {

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'Client Image Upload Error';

        array_push($doc_info, $row_doctor_array);

    }

    echo json_encode($doc_info);
}

function d_change_password($d_id, $d_password)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/calcutta');
    $now = date('Y-m-d');

    $sql = <<<SQL
UPDATE `doctor_login` SET d_password='$d_password',`d_modify_date`='$now' WHERE d_id='$d_id'
SQL;

    if ($conn->query($sql) === TRUE) {

        $row_doctor_array['status'] = '1';
        $row_doctor_array['msg'] = 'Doctor Pasword chnage successfully';
        array_push($doc_info, $row_doctor_array);
    } else {

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'Doctor Pasword chnage error';
        array_push($doc_info, $row_doctor_array);
    }

    echo json_encode($doc_info);

}

function d_change_pic($d_id, $d_pic)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');
    $imagename = random_string(20);
    $path = "upload/di_$imagename.jpg";
    $sql = <<<SQL
UPDATE doctor_info SET d_pic='$path',d_modifydate='$now' WHERE d_id='$d_id'
SQL;
    if ($conn->query($sql) === TRUE) {
        file_put_contents($path, base64_decode($d_pic));

        $row_doctor_array['status'] = '1';
        $row_doctor_array['msg'] = 'Doctor Image Upload Successfully';
        $row_doctor_array['p_image_path'] = $path;
        array_push($doc_info, $row_doctor_array);

    } else {

        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'Doctor Image Upload Error';

        array_push($doc_info, $row_doctor_array);

    }

    echo json_encode($doc_info);
}


function random_string($length)
{
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}


function medical_store_list()
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');


    $sql = <<<SQL
SELECT * FROM medical_store
SQL;

    $res = $conn->query($sql);
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {
            # code...

            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Medical Store Found';

            $row_doctor_array['m_s_name'] = $row['m_s_name'];
            $row_doctor_array['m_s_email'] = $row['m_s_email'];
            $row_doctor_array['m_s_address'] = $row['m_s_address'];
            $row_doctor_array['m_s_phone_no'] = $row['m_s_phone_no'];
            $row_doctor_array['m_s_city'] = $row['m_s_city'];
            $row_doctor_array['m_s_pincode'] = $row['m_s_pincode'];
            $row_doctor_array['m_s_regno'] = $row['m_s_regno'];
            $row_doctor_array['m_s_starttime'] = $row['m_s_starttime'];
            $row_doctor_array['m_s_endtime'] = $row['m_s_endtime'];
            $row_doctor_array['m_s_status'] = $row['m_s_status'];


            array_push($doc_info, $row_doctor_array);
        }
    } else {
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'No Medical Store Found';

        array_push($doc_info, $row_doctor_array);


    }
    echo json_encode($doc_info);


}

function medicine_list()
{


    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');


    $sql = <<<SQL
SELECT * FROM medicine_data
SQL;

    $res = $conn->query($sql);
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {

            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Medicine  Found';

            $row_doctor_array['m_name'] = $row['m_name'];
            $row_doctor_array['m_company'] = $row['m_company'];
            $row_doctor_array['m_price'] = $row['m_price'];
            $row_doctor_array['m_drug'] = $row['m_drug'];
            $row_doctor_array['m_drug_type'] = $row['m_drug_type'];


            array_push($doc_info, $row_doctor_array);
        }
    } else {
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'No Medicine Found';

        array_push($doc_info, $row_doctor_array);


    }
    echo json_encode($doc_info);


}

function doc_list($u_id)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');
    $sql = <<<SQL
SELECT * FROM doctor_info,doctor_login where doctor_info.d_id=doctor_login.d_id
SQL;

    $res = $conn->query($sql);
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {


            $d_id=$row['d_id'];


            $sql2="select * from p_request where d_id='$d_id' and c_id='$u_id' ";
            $res1=$conn->query($sql2);
            $row1=$res1->fetch_assoc();
            if($res1->num_rows > 0)
            {
                $row_doctor_array['p_r_status'] = $row1['p_r_status'];
            }
            else{
                $row_doctor_array['p_r_status'] = '-1';
            }

            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Doctor  Found';

            $row_doctor_array['d_id'] = $row['d_id'];
            $row_doctor_array['d_email'] = $row['d_email'];
            $row_doctor_array['d_password'] = $row['d_password'];
            $row_doctor_array['d_status'] = $row['d_status'];
            $row_doctor_array['d_firstname'] = $row['d_firstname'];

            $row_doctor_array['d_lastname'] = $row['d_lastname'];
            $row_doctor_array['d_gender'] = $row['d_gender'];

            $row_doctor_array['d_contact_info'] = $row['d_contact_info'];
            $row_doctor_array['d_pic'] = $row['d_pic'];
            $row_doctor_array['d_address'] = $row['d_address'];
            $row_doctor_array['d_city'] = $row['d_city'];
            $row_doctor_array['d_pincode'] = $row['d_pincode'];
            $row_doctor_array['d_reg'] = $row['d_reg'];
            $row_doctor_array['d_degree'] = $row['d_degree'];


if($row1['p_r_status']!=1)
{
    array_push($doc_info, $row_doctor_array);

}
        }
    } else {
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'No Doctor Found';

        array_push($doc_info, $row_doctor_array);


    }
    echo json_encode($doc_info);


}
function fdoc_list($u_id)
{
    $doc_info = array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');
    $sql ="SELECT * FROM doctor_info,doctor_login,p_request where doctor_info.d_id=doctor_login.d_id and doctor_login.d_id=p_request.d_id and p_request.c_id='$u_id' and p_request.p_r_status='1' ";

    $res = $conn->query($sql);
    if ($res->num_rows > 0) {

        while ($row = $res->fetch_assoc()) {


//            $d_id=$row['d_id'];
//
//
//            $sql2="select * from p_request where d_id='$d_id' and c_id='$u_id' and p_r_status!='1' ";
//            $res1=$conn->query($sql2);
//            $row1=$res1->fetch_assoc();
//            if($res1->num_rows > 0)
//            {
//                $row_doctor_array['p_r_status'] = $row1['p_r_status'];
//            }
//            else{
//                $row_doctor_array['p_r_status'] = '-1';
//            }
            $row_doctor_array['p_r_status'] = $row['p_r_status'];

            $row_doctor_array['status'] = '1';
            $row_doctor_array['msg'] = 'Doctor  Found';

            $row_doctor_array['d_id'] = $row['d_id'];
            $row_doctor_array['d_email'] = $row['d_email'];
            $row_doctor_array['d_password'] = $row['d_password'];
            $row_doctor_array['d_status'] = $row['d_status'];
            $row_doctor_array['d_firstname'] = $row['d_firstname'];

            $row_doctor_array['d_lastname'] = $row['d_lastname'];
            $row_doctor_array['d_gender'] = $row['d_gender'];

            $row_doctor_array['d_contact_info'] = $row['d_contact_info'];
            $row_doctor_array['d_pic'] = $row['d_pic'];
            $row_doctor_array['d_address'] = $row['d_address'];
            $row_doctor_array['d_city'] = $row['d_city'];
            $row_doctor_array['d_pincode'] = $row['d_pincode'];
            $row_doctor_array['d_reg'] = $row['d_reg'];
            $row_doctor_array['d_degree'] = $row['d_degree'];



                array_push($doc_info, $row_doctor_array);

           
        }
    } else {
        $row_doctor_array['status'] = '0';
        $row_doctor_array['msg'] = 'No Doctor Found';

        array_push($doc_info, $row_doctor_array);


    }
    echo json_encode($doc_info);


}

function UsreuestDoc($u_id,$d_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

    $sql="INSERT INTO p_request(d_id, c_id, p_r_status) VALUES ('$d_id','$u_id','0')";

    if($conn->query($sql)===TRUE)
    {
        $row_client_array['status'] ='1';
        $row_client_array['msg'] ='Request  Successfully';

        array_push($client_info,$row_client_array);

    }
    else
    {

        $row_client_array['status'] ='0';
        $row_client_array['msg'] ='Request  Error';

        array_push($client_info,$row_client_array);

    }
    echo json_encode($client_info);



}

function user_list_doc($d_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

     $sql="select * from p_request,user_login where user_login.u_id=p_request.c_id and  p_request.d_id='$d_id' and p_request.p_r_status='0'";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {

        while ($row=$result->fetch_assoc()) {


            $row_client_array['p_r_status'] = $row['p_r_status'];
            $row_client_array['msg'] = 'Client List Fetch Success';
            $row_client_array['status'] = '1';
            $row_client_array['u_id'] = $row['u_id'];
            $row_client_array['u_fname'] = $row['u_fname'];
            $row_client_array['u_lname'] = $row['u_lname'];
            $row_client_array['u_email'] = $row['u_email'];
            $row_client_array['u_phone_no'] = $row['u_phone_no'];
            $row_client_array['u_gender'] = $row['u_gender'];
            $row_client_array['u_pic'] = $row['u_pic'];
            $row_client_array['u_status'] = $row['u_status'];

            array_push($client_info,$row_client_array);
        }

    }
    else{

        $row_client_array['status'] = '0';
        $row_client_array['msg'] = 'Client List Empty';
        array_push($client_info,$row_client_array);


    }
    echo json_encode($client_info);

}

function auser_list_doc($d_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

    $sql="select * from p_request,user_login where user_login.u_id=p_request.c_id and  p_request.d_id='$d_id' and p_request.p_r_status='1'";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {

        while ($row=$result->fetch_assoc()) {


            $row_client_array['p_r_status'] = $row['p_r_status'];
            $row_client_array['msg'] = 'Client List Fetch Success';
            $row_client_array['status'] = '1';
            $row_client_array['u_id'] = $row['u_id'];
            $row_client_array['u_fname'] = $row['u_fname'];
            $row_client_array['u_lname'] = $row['u_lname'];
            $row_client_array['u_email'] = $row['u_email'];
            $row_client_array['u_phone_no'] = $row['u_phone_no'];
            $row_client_array['u_gender'] = $row['u_gender'];
            $row_client_array['u_pic'] = $row['u_pic'];
            $row_client_array['u_status'] = $row['u_status'];

            array_push($client_info,$row_client_array);
        }

    }
    else{

        $row_client_array['status'] = '0';
        $row_client_array['msg'] = 'Client List Empty';
        array_push($client_info,$row_client_array);


    }
    echo json_encode($client_info);

}

function Doctouser($u_id,$d_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

    $sql="UPDATE p_request SET p_r_status='1' WHERE d_id='$d_id' and c_id='$u_id'";

    if($conn->query($sql)===TRUE)
    {
        $row_client_array['status'] ='1';
        $row_client_array['msg'] ='Request  Successfully';

        array_push($client_info,$row_client_array);

    }
    else
    {

        $row_client_array['status'] ='0';
        $row_client_array['msg'] ='Request  Error';

        array_push($client_info,$row_client_array);

    }
    echo json_encode($client_info);



}
function sendappionment($u_id,$d_id,$adate,$atime)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');
    $sql="INSERT INTO `d_appionment`(`d_id`, `c_id`, `a_status`, `a_date`, `a_time`, `a_cdate`) VALUES ('$d_id','$u_id','0','$adate','$atime','$now')";
if($conn->query($sql)===TRUE)
{
    $row_client_array['status'] ='1';
    $row_client_array['msg'] ='Appionment Request  Successfully';

    array_push($client_info,$row_client_array);
}
else{

    $row_client_array['status'] ='0';
    $row_client_array['msg'] ='Appionment Request  Error';

    array_push($client_info,$row_client_array);
}
    echo json_encode($client_info);

}

function  getappionmentuser($u_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

    $sql="SELECT * FROM d_appionment,doctor_info where doctor_info.d_id=d_appionment.d_id and  d_appionment.c_id='$u_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {

        while ($row=$result->fetch_assoc()) {


            $row_client_array['a_status'] = $row['a_status'];
            $row_client_array['msg'] = 'Appionment List Fetch Success';
            $row_client_array['status'] = '1';
            $row_client_array['a_date'] = $row['a_date'];
            $row_client_array['a_time'] = $row['a_time'];
            $row_client_array['a_cdate'] = $row['a_cdate'];
            $row_client_array['a_status'] = $row['a_status'];

            $row_client_array['d_firstname'] = $row['d_firstname'];
            $row_client_array['d_contact_info'] = $row['d_contact_info'];
            $row_client_array['d_id'] = $row['d_id'];
            $row_client_array['c_id'] = $row['c_id'];
            $row_client_array['d_a_id'] = $row['d_a_id'];


            array_push($client_info,$row_client_array);
        }

    }
    else{

        $row_client_array['status'] = '0';
        $row_client_array['msg'] = 'Appionment List Empty';
        array_push($client_info,$row_client_array);


    }
    echo json_encode($client_info);

}

function  getappionmentdoc($d_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

    $sql="SELECT * FROM d_appionment,user_login where user_login.u_id=d_appionment.c_id and  d_appionment.d_id='$d_id'";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {

        while ($row=$result->fetch_assoc()) {


            $row_client_array['a_status'] = $row['a_status'];
            $row_client_array['msg'] = 'Appionment List Fetch Success';
            $row_client_array['status'] = '1';
            $row_client_array['a_date'] = $row['a_date'];
            $row_client_array['a_time'] = $row['a_time'];
            $row_client_array['a_cdate'] = $row['a_cdate'];
            $row_client_array['a_status'] = $row['a_status'];

            $row_client_array['u_fname'] = $row['u_fname'];
            $row_client_array['u_phone_no'] = $row['u_phone_no'];
            $row_client_array['d_id'] = $row['d_id'];
            $row_client_array['c_id'] = $row['c_id'];
            $row_client_array['d_a_id'] = $row['d_a_id'];


            array_push($client_info,$row_client_array);
        }

    }
    else{

        $row_client_array['status'] = '0';
        $row_client_array['msg'] = 'Appionment List Empty';
        array_push($client_info,$row_client_array);


    }
    echo json_encode($client_info);

}
function  upappionmentdoc($a_d_id)
{
    $client_info=array();
    global $conn;
    date_default_timezone_set('Asia/Calcutta');
    $now = date('Y-m-d');

    $sql="UPDATE d_appionment SET a_status='1' WHERE d_a_id='$a_d_id'";
    if($conn->query($sql) === TRUE)
    {



            $row_client_array['msg'] = 'Appionment Status Updated';
            $row_client_array['status'] = '1';



            array_push($client_info,$row_client_array);


    }
    else{

        $row_client_array['status'] = '0';
        $row_client_array['msg'] = 'Appionment Status Updated Error';
        array_push($client_info,$row_client_array);


    }
    echo json_encode($client_info);

}
function  caappionmentdoc($a_d_id)
{
    $client_info=array();
    global $conn;

    $sql="UPDATE d_appionment SET a_status='-1' WHERE d_a_id='$a_d_id'";
    if($conn->query($sql) === TRUE)
    {



        $row_client_array['msg'] = 'Appionment Status Updated';
        $row_client_array['status'] = '1';



        array_push($client_info,$row_client_array);


    }
    else{

        $row_client_array['status'] = '0';
        $row_client_array['msg'] = 'Appionment Status Updated Error';
        array_push($client_info,$row_client_array);


    }
    echo json_encode($client_info);

}