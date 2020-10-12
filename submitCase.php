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

    echo "INSERT INTO `reseller_case`(`company_name`, `domain`, `contact_name`, `contact_number`, `email`, `user`, `current_email_solution`, "
            . "`employee_range`, `address`, `plan`, `designation`, `budget`, `need`, `timeline`, `created_by`) "
            . "VALUES ('" . $company . "','" . $domain . "','" . $contact_name . "','" . $contact_number . "','" . $email . "','" . $users . "','" . $current_email_solution . "',"
            . "'" . $employee_range . "','" . $address . "','" . $plan . "','" . $designation . "','" . $budget . "','" . $need . "','" . $timeline . "','" . $user_id . "'";
    exit;
    $insert = "INSERT INTO `reseller_case`(`company_name`, `domain`, `contact_name`, `contact_number`, `email`, `user`, `current_email_solution`, "
            . "`employee_range`, `address`, `plan`, `designation`, `budget`, `need`, `timeline`, `created_by`) "
            . "VALUES ('" . $company . "','" . $domain . "','" . $contact_name . "','" . $contact_number . "','" . $email . "','" . $users . "','" . $current_email_solution . "',"
            . "'" . $employee_range . "','" . $address . "','" . $plan . "','" . $designation . "','" . $budget . "','" . $need . "','" . $timeline . "','" . $user_id . "')";

    $query = mysqli_query($conn, $insert);
    if (isset($query)) {
        

        $tmp_sub = "New Case Created - ". $domain;
        $submsg = '';
        $data = $_POST;

        $message = "<p>Thank you for submitting the case. Our team will get back you shortly with the case update.</p>".
                   "<p>Lets work as a team and grow together !!</p>".
                "<br>";
        //$tmp_arr_to = array("rahul.b@shivaami.com  ");
        //$tmp_cc_array = array("rahul.b@shivaami.com");
        $user_email = $_SESSION['email'];
        $tmp_arr_to = array($user_email);
        $tmp_cc_array = array("rahul.vinod.bhalekar@gmail.com"); //cc email ids
        //$tmp_cc_array = array("punit@shivaami.com", "priyanka@shivaami.com", "maaz@shivaami.com", "darshan@shivaami.com", "vishwajit@shivaami.com", "haresh@shivaami.com", "pratima@shivaami.com", "madhuram@shivaami.com");
        $adminemail = 'Resellers@shivaami.com';
        $adminname = 'Shivaami Reseller';
        $tmp_arr_file = array();

        $tmp_str_ret = sendmsg_function($tmp_arr_to, $tmp_sub, $message, $adminemail, $adminname, $tmp_cc_array, $tmp_arr_file);
        
    }

    header("Location: home.php");
}

        

