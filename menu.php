<?php
require 'header.php';
?>
<style>
    /* Add a black background color to the top navigation */
    .topnav {
        background-color: #333;
        overflow: hidden;
    }

    /* Style the links inside the navigation bar */
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 10px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    /* Change the color of links on hover */
    .topnav a:hover {
        background-color: #4CAF50;
        color: #fff;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
        background-color: #4CAF50;
        color: white;
    }

    /* Right-aligned section inside the top navigation */
    .topnav-right {
        float: right;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="topnav">
            <a class="active" href="home.php">Home</a>
            <div class="topnav-right">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>