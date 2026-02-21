<?php
ob_start();

require('../controler/conection.php');


function updateProfile($con){
    if (isset($_POST['submitUpdateProfileForm'])){
        $rand = rand(1000,99999);
        $filename = 'profile_'.$rand.'.jpg';
        $profileImage = 'uploads/'.$filename;
        $uploaded_file = move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.$filename);
        $select =  mysqli_query($con, "UPDATE `genaral_info` SET `profilePic` = '$profileImage' ");
        if($uploaded_file == $select){
            return 2; //success
        }else{
            return 1; //failed
        } 
    }
}



?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>

    <form method="post" enctype="multipart/form-data">
        <dic class="row">
            <div class="col-4">
                <div class="form-group">
                    <img src="<?=$GLOBALS['USER_PANEL_INFO']['profilePic']?>" width="150px" High="150px" style="border-radius: 75px; 
                    display: block; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </dic>
        <div class="row">   
            <div class="col-4">
                <div class="form-group">
                    <input type="file" required class="form-control form-control-user" name="image" id="imageId" >
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-4" >
                <input  type="submit" name="submitUpdateProfileForm" class="btn btn-primary btn-user btn-block" value="Update Profile"> 
            </div>
        </div>
    </form>
    <br>
    <div id='result'>
        <?php $status = updateProfile($con);?>
        <?php if($status == 2 ):?> 
            <div class="alert alert-success">Update Profile Successfully. Updating...</div>
            <?php header("refresh: 1;");?>
        <?php elseif($status == 1 ): ?>
            <div class="alert alert-danger">Update Profile Failed!</div> 
        <?php elseif($status == 3 ): ?>
            <div class="alert alert-warning">No file chosen!</div>     
        <?php endif;?>
    </div>
</div>  
