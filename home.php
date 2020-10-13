<?php
require 'menu.php';
require 'connect.php';
//print_r($_SESSION);
(isset($_SESSION['role_id'])) ? $role_id = $_SESSION['role_id'] : $role_id = 0;
(isset($_SESSION['user_id'])) ? $user_id = $_SESSION['user_id'] : $user_id = 0;
if ($role_id == 1) {
    $filter = " ";
} else {
    $filter = " where `created_by`='".$user_id."' ";
}
$query = "select * from `reseller_case` $filter order by created_date DESC";
$result = mysqli_query($conn, $query);
?>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>

<div class="container" style="padding-top:100px;">
    <div class="row">
        <center><h3>List of Case</h3></center><span style="float:left;"><input class="form-control" id="myInput" type="text" placeholder="Search.."></span><span style="float:right;"><a href="addCase.php"><i class="fa fa-plus">Add New</i></a></span>
    </div><br>
    <div class="row">
        <table id="myTable" class="table table-bordered table-striped">
            <tr><th>Case Id</th><th>Company</th><th>Domain</th><th>Created Time</th><th>Status</th></tr>
            <?php
            if ($result->num_rows > 0) {
                while ($roe = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><a href="detail.php?id=<?php echo $roe['case_id']; ?>"><?php echo $roe['case_id']; ?></a></td>
                        <td><?php echo $roe['company_name']; ?></td>
                        <td><?php echo $roe['domain']; ?></td>
                        <td><?php echo date("d-m-Y H:i:s", strtotime($roe['created_date'])); ?></td>
                        <td><?php echo $roe['status']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">
                        <center>
                            No Record Found
                        </center>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div> 

<!-- Modal -->
<div id="myModal" class="modal" role="dialog" style="display:none;z-index: 9999;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="hide_modal();" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">What's Next!!!</h4>
            </div>
            <div class="modal-body">
                <p>You'll receive two DNS records in your email and instructions to update them in your Domain DNS panel. After the activity your website will be live on <?php echo $_SESSION['domain']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" onclick="hide_modal();" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<?php
require 'footer.php';
?>