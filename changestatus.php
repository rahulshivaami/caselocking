<?php

require_once 'connect.php';
include("phpmailer/smtp.php");
session_start();
//print_r($_POST);EXIT;
if (isset($_POST['submit'])) {
    $data = $_POST;
    print_r($data);
    //exit;
    $status = mysqli_real_escape_string($conn, $data['status']);
    $id = $data['case_id'];
    $email = $data['reseller_email'];
    $domain = $data['domain'];
    
    $update = "UPDATE `reseller_case` SET `status`='" . $status . "' where `case_id`='$id'";
    
    $query = mysqli_query($conn, $update);
    if (isset($query)) {

        if ($status == 'Accepted') {
            $tmp_sub = "Case Approved - " . $domain;
            $submsg = '';
            $data = $_POST;

            $message = "<p>Your case has been approved and locked. Our team will share the
                    transfer price shortly. We recommend you to involve us in the case to
                    understand the client concerns and accordingly offer the right
                    solution.</p>" .
                    "<p>Feel free to contact us if you have any questions or concerns on below numbers:"
                    . "<br>Name: Sanket Likhar<br>
                    Email: sanket@shivaami.com<br>
                    Number: 9137979692<br><br>

                    Name : Rocky Williams<br>
                    Email: rocky@shivaami.com<br>
                    Number: 9326711729<br><br>

                    Name : Juned Kasmani ( Partner Manager )<br>
                    Email : juned@shivaami.com<br>
                    Number : 9322232786"
                    . "</p>" .
                    "<br>";
            //$tmp_arr_to = array("rahul.b@shivaami.com  ");
            //$tmp_cc_array = array("rahul.b@shivaami.com");
            $user_email = $email;
            $tmp_arr_to = array($user_email);
            $tmp_cc_array = array("rahul.vinod.bhalekar@gmail.com"); //cc email ids
            //$tmp_cc_array = array("punit@shivaami.com", "priyanka@shivaami.com", "maaz@shivaami.com", "darshan@shivaami.com", "vishwajit@shivaami.com", "haresh@shivaami.com", "pratima@shivaami.com", "madhuram@shivaami.com");
            $adminemail = 'Resellers@shivaami.com';
            $adminname = 'Shivaami Reseller';
            $tmp_arr_file = array();

            $tmp_str_ret = sendmsg_function($tmp_arr_to, $tmp_sub, $message, $adminemail, $adminname, $tmp_cc_array, $tmp_arr_file);
        } elseif ($status == 'Rejected') {
            $tmp_sub = "Case Rejected - " . $domain;
            $submsg = '';
            $data = $_POST;

            $message = "<p>We are sorry to update you that your case has been already locked
                    with another partner. We are happy to support you on other deals and
                    cannot transfer the best rate for this deal. In case the another
                    partner is unable to close the case , first preference will be given
                    to you.</p>" .
                    "<p>With best regards,"
                    . "<br><br>Juned Kasmani<br>
                    Senior Manager<br>
                    Email : juned@shivaami.com | Mob : +91-9322232786<br>"
                    . "</p>" .
                    "<br>";
            //$tmp_arr_to = array("rahul.b@shivaami.com  ");
            //$tmp_cc_array = array("rahul.b@shivaami.com");
            $user_email = $email;
            $tmp_arr_to = array($user_email);
            $tmp_cc_array = array("rahul.vinod.bhalekar@gmail.com"); //cc email ids
            //$tmp_cc_array = array("punit@shivaami.com", "priyanka@shivaami.com", "maaz@shivaami.com", "darshan@shivaami.com", "vishwajit@shivaami.com", "haresh@shivaami.com", "pratima@shivaami.com", "madhuram@shivaami.com");
            $adminemail = 'Resellers@shivaami.com';
            $adminname = 'Shivaami Reseller';
            $tmp_arr_file = array();

            $tmp_str_ret = sendmsg_function($tmp_arr_to, $tmp_sub, $message, $adminemail, $adminname, $tmp_cc_array, $tmp_arr_file);
        }
    }

    header("Location: detail.php?id=".$case_id);
}

        

