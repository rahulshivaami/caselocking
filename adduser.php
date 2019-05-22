<?php

require_once 'connect.php';

if (isset($_POST['signup_user'])) {
    $data = $_POST;
    $name = trim($data['name']);
    $contact = trim($data['contact']);
    $email = trim($data['email']);
    $password = md5($data['password']);
    $company = trim($data['company']);
    $business = trim($data['business']);
    //echo 'one';
    $check = "select * from reseller_user where email='".$email."' or contact='".$contact."'";
    $che = mysqli_query($conn, $check);
    print_r($che);
    if (mysqli_num_rows($che) == 0) {
        //echo 'two';
        $sql = "INSERT INTO `reseller_user`(`name`, `contact`, `email`, `company`, `business`, `password`, `created_date`,`created_by`,`updated_date`,`updated_by`) "
                . "VALUES ('" . $name . "','" . $contact . "','" . $email . "','" . $company . "','" . $business . "','" . $password . "',NOW(),'1',NOW(),'1')";

        $insert = mysqli_query($conn, $sql);
        if (isset($insert)) {
            //echo 'three';exit;
            echo "User added successfully!";
            header('Location: index.php?msg=signupsuccess');
        } else {
            //echo 'four';exit;
            echo "Try again!";
            header('Location: signup.php?msg=try');
        }
    }else{
        //echo 'five';exit;
        echo "Already Exists";
        header('Location: signup.php?msg=exists');
    }
}
if (isset($_POST['login'])) {
    $data = $_POST;
    $username = $data['username'];
    $password = md5($data['password']);

    $sql = "SELECT * FROM `reseller_user` WHERE (`email`='" . $username . "' OR contact='" . $username . "') AND `password`='" . $password . "'";
    $res = mysqli_query($conn, $sql);

    $start = time();
    if (mysqli_num_rows($res) == 1) {
        $row = mysqli_fetch_assoc($res);
        session_start();

        $_SESSION['user_id'] = $row['ru_id'];
        $_SESSION['role_id'] = $row['role_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['start'] = time();
        $_SESSION['expire_seconds'] = 30 * 60;
        $_SESSION['last_action'] = time();

        header("Location: home.php");
    } else {
        header("Location: index.php?msg=error");
    }
    exit;
}