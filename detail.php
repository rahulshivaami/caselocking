<?php
require 'menu.php';
require 'connect.php';
//session_start();
//print_r($_SESSION);exit
$logged_in = $_SESSION['user_id'];
$role_id = $_SESSION['role_id'];
$id = $_GET['id'];

if($role_id==1){
    $query = "select * from `reseller_case` where `case_id`='" . $id . "'";
    $result = mysqli_query($conn, $query);
}else{
    $query = "select * from `reseller_case` where `case_id`='" . $id . "' and created_by='". $logged_in ."'";
    $result = mysqli_query($conn, $query);
}

$row = mysqli_fetch_assoc($result);

$result2 = mysqli_query($conn, "select * from `reseller_user` where `ru_id`='" . $row['created_by'] . "'");

$row2 = mysqli_fetch_assoc($result2);
//print_r($row);
?>
<style>
    .form-group{
        padding-top:10px;
        /*border:2px solid;*/
        margin-top:10px;
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
<div class="container"><center><h3>Case Detail</h3></center>

    <div class="row">
        <table class="table table-bordered table-striped">
            <tr>
                <td width="34%">Company Name: <?php echo $row['company_name']; ?></td>
                <td width="33%">Domain Name: <?php echo $row['domain']; ?></td>
                <td width="33%">Contact Name: <?php echo $row['contact_name']; ?></td>
            </tr>
            <tr>
                <td>Contact Phone: <?php echo $row['contact_number']; ?></td>
                <td>Contact Email: <?php echo $row['email']; ?></td>
                <td>No of user: <?php echo $row['user']; ?></td>
            </tr>
            <tr>
                <td>Current email solution: <?php echo $row['current_email_solution']; ?></td>
                <td>Employee range: <?php echo $row['employee_range']; ?></td>
                <td>Address: <?php echo $row['address']; ?></td>
            </tr>
            <tr>
                <td>Plan: <?php echo $row['plan']; ?></td>
                <td>Designation: <?php echo $row['designation']; ?></td>
                <td>Budget: <?php echo $row['budget']; ?></td>
            </tr>
            <tr>
                <td>Need: <?php echo $row['need']; ?></td>
                <td>Timeline: <?php echo $row['timeline']; ?></td>
                <td>Added By: <?php echo $row2['name']; ?></td>
            </tr>
            <tr>
                <?php
                if($role_id==1){
                ?>
                <td>Status: <?php echo $row['status']; ?></td>
                <td colspan="2"><form action="changestatus.php" method="POST">
                        <div class="col-lg-9 form-group">

                            <label>Accept/Reject<span class="required-mark"> * </span>:</label>
                            <select required name="status" class="form form-control">
                                <option value="">Select action</option>
                                <option value="Accepted">Accept</option>
                                <option value="Rejected">Reject</option>
                            </select>

                            <input type="hidden" name="case_id" value="<?php echo $id; ?>">
                            <input type="hidden" name="reseller_email" value="<?php echo $row2['email']; ?>">
                            <input type="hidden" name="domain" value="<?php echo $row['domain']; ?>">

                        </div>
                        <div class="col-lg-3">
                            <input style="border-radius:5px;margin-top:20px;padding:5px;" type="submit" class="btb btn-primary" name="submit">
                        </div>
                    </form>
                </td>
                <?php
                }
                ?>
            </tr>
        </table>
    </div>
    <div>
        <form action="submitcomment.php" method="POST">
            <div class="col-lg-8">
                <input type="text" class="form-control" name="comment" placeholder="enter comment here">
                <input type="hidden" name="case_id" value="<?php echo $id;?>">
                <input type="hidden" name="user_id" value="<?php echo $logged_in;?>">
            </div>
            <div class="col-lg-4">
                <input type="submit" class="form-control btn btn-primary" name="submit" value="add comment">
            </div>
            <div style="background-image: url('whatsapp-bg.jpg');width:100%;height:300px;overflow-y: scroll;">
                <?php 
                $comments_res = mysqli_query($conn, "select * from `case_comments` where case_id='$id' order by `comment_id` DESC");
                while($row=  mysqli_fetch_assoc($comments_res)){
                    //print_r($row);
                    $getuser_q = mysqli_query($conn, "select * from reseller_user where `ru_id`='".$row['created_by']."'");
                    $getuser = mysqli_fetch_assoc($getuser_q);
                    if($logged_in==$row['created_by']){
                        $class="col-lg-offset-3 col-lg-9";
                        $style="background-color:#DCF8C6;margin-top:5px;margin-bottom:5px;border-radius:5px;padding:10px;";
                        $span_style = "font-size:10 !important;";
                    }else{
                        $class="col-lg-9";
                        $style="background-color:white;margin-top:5px;margin-bottom:5px;border-radius:5px;padding:10px;";
                        $span_style = "font-size:10 !important;";
                    }
                ?>    
                <div class="<?php echo $class; ?>" style="<?php echo $style; ?>"><?php echo $row['comment']; ?><br><span style="<?php echo $span_style; ?>"><?php echo date("d-m-Y H:i:s",  strtotime($row['created_date'])); ?> by <?php echo $getuser['name']; ?></span></div>
                 
                <?php
                }
                ?>
            </div>
        </form>
    </div>
</div>