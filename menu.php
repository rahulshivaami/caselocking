<?php
require 'header.php';
?>
<style>
    /* Add a black background color to the top navigation */
    .topnav {
        background-color: #2cace3;
        overflow: hidden;
        
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 10px 36px;
        text-decoration: none;
        font-size: 17px;
        margin-left:5px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: #fff;
        color: #2cace3;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #fff;
        color: #2cace3;
    }

    /* Right-aligned section inside the top navigation */
    .topnav-right {
        float: right;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="topnav">
            <img style="float:left;height: 45px;padding-right:15px;" src="images/shivaamiLogo.png" />
            <a class="active" href="home.php">Home</a>
            <a class="" href="#">Detail</a>
            <div class="topnav-right">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>