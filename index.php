<?php
(isset($_GET['msg']))?$msg = $_GET['msg']:$msg="";

?>
<html>
    <head>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css" />
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/npm.js"></script>

    </head>
    <body>
        <form action="adduser.php" method="POST">
            <div class="container-fluid" style="background-color: #f5f5f5;width:500px;">
                <div class="row"><center><div class="col-lg-12"><h3>Welcome to login page</h3></div></center></div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">Email:</div>
                    <div class="col-lg-8"><input type="text" required name="username" autocomplete="off" size="30"></div>

                </div><br>
                <div class="row">
                    <div class="col-lg-4">Password:</div>
                    <div class="col-lg-8"><input type="password" required name="password" autocomplete="off" size="30"></div>
                </div><br>
                <div class="row">
                    <center>
                        <div class="col-lg-12"><input type="submit" name="login"></div>
                    </center>
                </div><br>
                <div class="row"><center><div class="col-lg-12">Not Signed in yet? <a href="signup.php">Signup</a></div></center></div><br>
                <?php if($msg=='error'){ ?><div class="row"><center><div class="col-lg-12"><span style="color:red;">Invalid Credentials</span></div></center></div><br><?php } ?>
                <?php if($msg=='signupsuccess'){ ?><div class="row"><center><div class="col-lg-12"><span style="color:green;">Signup Successful. Please Login</span></div></center></div><br><?php } ?>
            </div>
        </form>
    </body>
</html>