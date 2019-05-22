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
            <div class="container-fluid" style="background-color: #f5f5f5;width:800px;">
                <div class="row"><center><div class="col-lg-12"><h3>Welcome to Signup page</h3></div></center></div>
                <hr>
                <div class="row">
                    <div class="col-lg-4">Name:</div>
                    <div class="col-lg-8"><input type="text" required name="name" size="30"></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-4">Contact:</div>
                    <div class="col-lg-8"><input type="text" required name="contact" size="30"></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-4">Email:</div>
                    <div class="col-lg-8"><input type="email" required name="email" size="30"></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-4">Company:</div>
                    <div class="col-lg-8"><input type="text" required name="company" size="30"></div>
                </div><br>
                <div class="row">
                    <div class="col-lg-4">Business:</div>
                    <div class="col-lg-8">
                        <select id="business" name="business" required >
                            <option value="">Select Business</option>
                            <option value="reseller">Reseller business</option>
                            <option value="specializaion">Specialization</option>
                        </select>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-4">Password:</div>
                    <div class="col-lg-8"><input type="password" required  name="password" size="30"></div>

                </div><br>
                <div class="row">
                    <center>
                        <div class="col-lg-12"><input type="submit" name="signup_user"></div>
                    </center>
                </div><br>
                <div class="row"><center><div class="col-lg-12">Already a user? <a href="index.php">Signin</a></div></center></div><br>
                <?php if($msg=='try'){ ?><div class="row"><center><div class="col-lg-12"><span style="color:red;">Something went wrong try again</span></div></center></div><br><?php } ?>
                <?php if($msg=='exists'){ ?><div class="row"><center><div class="col-lg-12"><span style="color:red;">User already exists with same email/contact</span></div></center></div><br><?php } ?>
            </div>
        </form>
    </body>
</html>