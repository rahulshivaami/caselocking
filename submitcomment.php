<?php

require_once 'connect.php';
include("phpmailer/smtp.php");
session_start();
//print_r($_POST);EXIT;
if (isset($_POST['submit'])) {
    $data = $_POST;
    //print_r($data); exit;
    $comment = mysqli_real_escape_string($conn, $data['comment']);
    $case_id = mysqli_real_escape_string($conn, $data['case_id']);
    $user_id = mysqli_real_escape_string($conn, $data['user_id']);

    $insert = "INSERT INTO `case_comments`(`case_id`, `comment`, `created_date`, `created_by`) "
            . "VALUES ('".$case_id."','".$comment."',NOW(),'".$user_id."')";
    //echo $insert;
    $query = mysqli_query($conn, $insert);
    //exit;

    header("Location: detail.php?id=".$case_id);
}

        

