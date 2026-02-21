<?php
ob_start();

require('../controler/conection.php');


$select = mysqli_query($con, "SELECT * FROM `genaral_info` where `id`='1' limit 1");

$general_info_data = mysqli_fetch_array($select);

function updatePublicSettingTable($connection){
    if (isset($_POST['saveChange'])){

        $web_title = $_POST['WebTitle'];
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        $email = $_POST['EmailAddress'];
        $mobile = $_POST['telNumber'];
        
        $instagram = $_POST['instagramLink'];
        $linkdin = $_POST['linkdinLink'];
        $twitter = $_POST['twitterLink'];
        $facebook = $_POST['facebookLink'];
        
        $address = $_POST['postalAdr'];
        $about = $_POST['about'];
        $interest = $_POST['interest'];



        $select = mysqli_query($connection, "UPDATE `genaral_info` SET 
        `webTitle`='$web_title',
        `firstName`='$first_name',
        `lastName` = '$last_name',
        `mail`='$email',
        `tel`='$mobile',
        `instagram`='$instagram',
        `linkedin`='$linkdin',
        `twitter`='$twitter',
        `facebook`='$facebook',
        `address`='$address',
        `about`='$about',
        `interest`='$interest'");


        if($select){
            return 2;
        }else{
            return 1;
        }
    }else{
        return 0;
    }
}
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Public Settings</h1>

    <form method="post">
        <div class="row">
            <div class="col-lg-2 mb-6">
                <div class="form-group">
                    <label for="WebTitle">Website Title:</label>
                    <input type="text" class="form-control form-control-user" name="WebTitle" id="WebTitle" 
                    placeholder="Enter Website Title ..."  value="<?=$general_info_data['webTitle']?>">
                </div>
            </div>
            <div class="col-lg-2 mb-6">
                <div class="form-group">
                <label for="FullName">first Name:</label>
                    <input type="text" class="form-control form-control-user" name="firstName" id="firstName" 
                    placeholder="Enter firstName ..." value="<?=$general_info_data['firstName']?>">
                </div>
            </div>
            <div class="col-lg-2 mb-6">
                <div class="form-group">
                <label for="FullName">Full Name:</label>
                    <input type="text" class="form-control form-control-user" name="lastName" id="lastName" 
                    placeholder="Enter lastName ..." value="<?=$general_info_data['lastName']?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                <label for="Email">mil:</label>
                    <input type="text" class="form-control form-control-user" name="EmailAddress" id="EmailAddress" 
                    placeholder="Enter Email Address ..." value="<?=$general_info_data['mail']?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="telNumber">telNumber:</label>
                    <input type="text" class="form-control form-control-user" name="telNumber" id="telNumber" 
                    placeholder="Enter Tel Number ..." value="<?=$general_info_data['tel']?>">
                </div>
            </div>
        </div>

        
        <div class="row">   
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="instagramLink">instagramLink:</label>
                    <input type="text" class="form-control form-control-user" name="instagramLink" id="instagramLink" 
                    placeholder="Enter Instagram Link ..." value="<?=$general_info_data['instagram']?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="linkdinLink">linkdinLink:</label>
                    <input type="text" class="form-control form-control-user" name="linkdinLink" id="linkdinLink" 
                    placeholder="Enter Linkdin Link ..." value="<?=$general_info_data['linkedin']?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="twitterLink">twitterLink:</label>
                    <input type="text" class="form-control form-control-user" name="twitterLink" id="twitterLink" 
                    placeholder="Enter Twitter Link ..." value="<?=$general_info_data['twitter']?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="facebookLink">facebookLink:</label>
                    <input type="text" class="form-control form-control-user" name="facebookLink" id="facebookLink" 
                    placeholder="Enter Facebook Link ..." value="<?=$general_info_data['facebook']?>">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 mb-6">
                <label for="postalAdr">postalAdr:</label>
                <textarea class="form-control form-control-user" name="postalAdr" id="postalAdr" rows="5"
                placeholder="Enter Postal Address ..."><?=$general_info_data['address']?></textarea>
            </div>

            <div class="col-lg-4 mb-6">
                <label for="about">about:</label>
                <textarea class="form-control form-control-user" name="about" id="about" rows="5"
                placeholder="Enter About Text ..."><?=$general_info_data['about']?></textarea>
            </div>

            <div class="col-lg-4 mb-6">
                <label for="interest">interest:</label>
                <textarea class="form-control form-control-user" name="interest" id="interest" rows="5"
                placeholder="Enter Interest Text ..."><?=$general_info_data['interest']?></textarea>
            </div>
        </div>
        <br>
        <div class="row" >
            <div class="col-lg-4 mb-6" >
                <input  type="submit" name="saveChange" class="btn btn-primary btn-user btn-block"> 
            </div>
        </div>
    </form>
    <br>
    <div id='result'>
        <?php $status = updatePublicSettingTable($con);?>
        <?php if($status == 2 ): header('Location: index.php?modules=setting')?> 
            <div class="alert alert-success">Public Setting Updated Successfully.</div>
        <?php elseif($status == 1 ): ?>
            <div class="alert alert-danger">Public Setting Updated Failed!</div> 
        <?php endif;?>
    </div>
</div>  
