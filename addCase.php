<?php

require 'menu.php';
?>
<style>
    .form-group{
        padding:10px;
        //border:2px solid;
        margin:10px;
    }
    .form-group>label{
        position:absolute;
        top:-1px;
        left:20px;
        background-color:white;
        color:#c0c0c0;
    }

    .form-group>input{
        border:1px solid #e0e0e0;
        color:#696969;
    }

    .form-group>select{
        border:1px solid #e0e0e0;
        color:#696969;
    }
    h1{
        color:#87ceeb;
        padding-right: 115px;
    }
    .font-white{
        color:#ffffff !important;
    }
    .required-mark{
        color:#ff7f7f !important;
    }
</style>
<div class="container" style="padding-top:50px;">
    <form action="submitCase.php" method="POST">

        <div class="col-xs-12">
            <div class="row">
                <center>
                    <h1>ENTER DETAIL</h1>
                </center>
            </div><br>
            <div class="row">
                <div class="col-xs-5 form-group">
                    <label>Company Name<span class="required-mark"> * </span>:</label>
                    <input type="text" name="company" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Domain<span class="required-mark"> * </span>:</label>
                    <input type="text" name="domain" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Contact Name<span class="required-mark"> * </span>:</label>
                    <input type="text" name="contact_name" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Contact Number<span class="required-mark"> * </span>:</label>
                    <input type="text" name="contact_number" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Email<span class="required-mark"> * </span>:</label>
                    <input type="text" name="email" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Users<span class="required-mark"> * </span>:</label>
                    <input type="text" name="users" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Current Email Solution<span class="required-mark"> * </span>:</label>
                    <input type="text" name="current_email_solution" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Employee Range<span class="required-mark"> * </span>:</label>
                    <input type="text" name="employee_range" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Address<span class="required-mark"> * </span>:</label>
                    <input type="text" name="address" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Plan<span class="required-mark"> * </span>:</label>
                    <select name="plan" class="form form-control">
                        <option>--Select Plan--</option>
                        <option>G-Suite Basic</option>
                        <option>G-Suite Business</option>
                        <option>G-Suite Enterprise</option>
                        <option>Chrome book</option>
                        <option>Chrome HMK</option>
                        <option>Chrome Bit</option>
                        <option>Chrome Enterprise License</option>
                    </select>
                </div>
                <div class="col-xs-5 form-group">
                    <label>Authority/ Designation<span class="required-mark"> * </span>:</label>
                    <input name="designation" type="text" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Budget<span class="required-mark"> * </span>:</label>
                    <input name="budget" type="text" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Need<span class="required-mark"> * </span>:</label>
                    <input name="need" type="text" class="form form-control">
                </div>
                <div class="col-xs-5 form-group">
                    <label>Timeline<span class="required-mark"> * </span>:</label>
                    <select name="timeline" class="form form-control">
                        <option>--Select Timeline--</option>
                        <option>within a week</option>
                        <option>within a month</option>
                        <option>within 2 months</option>
                        <option>within 3 months</option>
                        <option>later</option>
                    </select>
                </div>
                <div class="col-xs-5 form-group">
                    <a href="home.php" class="form form-control btn btn-danger font-white">Cancel</a>
                </div>
                <div class="col-xs-5 form-group">
                    <input type="submit" name="submit" class="form form-control btn btn-primary font-white">
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </form>
</div>
<?php

require 'footer.php';
?>