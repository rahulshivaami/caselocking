<?php

require_once 'connect.php';
include("phpmailer/smtp.php");
session_start();
//print_r($_POST);EXIT;
if (isset($_POST['submit'])) {
    $data = $_POST;
    print_r($data); //exit;
    $company = mysqli_real_escape_string($conn, $data['company']);
    $domain = mysqli_real_escape_string($conn, $data['domain']);
    $contact_name = mysqli_real_escape_string($conn, $data['contact_name']);
    $contact_number = mysqli_real_escape_string($conn, $data['contact_number']);
    $email = mysqli_real_escape_string($conn, $data['email']);
    $users = mysqli_real_escape_string($conn, $data['users']);
    $current_email_solution = mysqli_real_escape_string($conn, $data['current_email_solution']);
    $employee_range = mysqli_real_escape_string($conn, $data['employee_range']);
    $address = mysqli_real_escape_string($conn, $data['address']);
    $plan = mysqli_real_escape_string($conn, $data['plan']);
    $designation = mysqli_real_escape_string($conn, $data['designation']);
    $budget = mysqli_real_escape_string($conn, $data['budget']);
    $need = mysqli_real_escape_string($conn, $data['need']);
    $timeline = mysqli_real_escape_string($conn, $data['timeline']);
    $user_id = $_SESSION['user_id'];

    $insert = "INSERT INTO `reseller_case`(`company_name`, `domain`, `contact_name`, `contact_number`, `email`, `user`, `current_email_solution`, "
            . "`employee_range`, `address`, `plan`, `designation`, `budget`, `need`, `timeline`, `created_by`) "
            . "VALUES ('" . $company . "','" . $domain . "','" . $contact_name . "','" . $contact_number . "','" . $email . "','" . $users . "','" . $current_email_solution . "',"
            . "'" . $employee_range . "','" . $address . "','" . $plan . "','" . $designation . "','" . $budget . "','" . $need . "','" . $timeline . "','" . $user_id . "')";

    $query = mysqli_query($conn, $insert);
    if (isset($query)) {
        

        $tmp_sub = "Enquiry from SA PPC landing page - Header Form";
        $submsg = '';
        $data = $_POST;

        $message = "<p style='font-size: 16px; font-family:Verdana; font-weight: 500; margin: 0; padding: 7px; text-transform: uppercase;  background: #f0f0f0 none repeat scroll 0 0;
     margin-top: 10px; margin-top: 20px; width:100%; padding-left: 10px; padding-right: 10px;'><b>Enquiry from SA PPC landing page - Header Form</b></p>
     <div style='float:left; width:100%'><div style='font-size: 13px; width:100%; line-height:30px; color:#000; font-family:Verdana; padding:5 0 10px 0; margin:7px 0'><b>Name</b><br/>"
                . "<div face='Verdana' style='font-size: 12px; width:100%; color:#000; background-color:#F9F9F9; border-bottom:2px solid #D7D7D7'>" . $contact_name . "</font></div></div>"
                . "<div style='font-size: 13px; width:100%; line-height:30px; color:#000; font-family:Verdana; padding:5 0 10px 0; margin:7px 0'><b>Email</b><br/>"
                . "<div face='Verdana' style='font-size: 12px; width:100%; color:#000; background-color:#F9F9F9; border-bottom:2px solid #D7D7D7'>" . $email . "</font></div></div>"
                . "<div style='font-size: 13px; width:100%; line-height:30px; color:#000; font-family:Verdana; padding:5 0 10px 0; margin:7px 0'><b>Contact</b><br/>"
                . "<div face='Verdana' style='font-size: 12px; width:100%; color:#000; background-color:#F9F9F9; border-bottom:2px solid #D7D7D7'>" . $contact_number . "</font></div></div>"
                . "<div style='font-size: 13px; width:100%; line-height:30px; color:#000; font-family:Verdana; padding:5 0 10px 0; margin:7px 0'><b>Course</b><br/>"
                . "<div face='Verdana' style='font-size: 12px; width:100%; color:#000; background-color:#F9F9F9; border-bottom:2px solid #D7D7D7'>" . $course . "</font></div></div>"
                . "<div style='font-size: 13px; width:100%; line-height:30px; color:#000; font-family:Verdana; padding:5 0 10px 0; margin:7px 0'><b>Message</b><br/>"
                . "<div face='Verdana' style='font-size: 12px; width:100%; color:#000; background-color:#F9F9F9; border-bottom:2px solid #D7D7D7'>" . $plan . "</font></div></div>" .
                "<br>";
        //$tmp_arr_to = array("rahul.b@shivaami.com  ");
        //$tmp_cc_array = array("rahul.b@shivaami.com");

        $tmp_arr_to = array("rahul.b@shivaami.com");
        $tmp_cc_array = array("rahul.vinod.bhalekar@gmail.com");
        //$tmp_cc_array = array("punit@shivaami.com", "priyanka@shivaami.com", "maaz@shivaami.com", "darshan@shivaami.com", "vishwajit@shivaami.com", "haresh@shivaami.com", "pratima@shivaami.com", "madhuram@shivaami.com");
        $adminemail = 'Resellers@shivaami.com';
        $adminname = 'Shivaami Reseller';
        $tmp_arr_file = array();

        $tmp_str_ret = sendmsg_function($tmp_arr_to, $tmp_sub, $message, $adminemail, $adminname, $tmp_cc_array, $tmp_arr_file);
    }

    header("Location: home.php");
}

        

