<?php

require_once 'connect.php';
session_start();
if (isset($_SESSION['last_action'])) {
    $secondsInactive = time() - $_SESSION['last_action'];
    if ($secondsInactive >= $_SESSION['expire_seconds']) {
        header('Location: logout.php');
    }
}
$_SESSION['last_action'] = time();

?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/npm.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    </head>
    <body>
    