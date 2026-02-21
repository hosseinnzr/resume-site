<?php
ob_start();

require('../controler/conection.php');

$isEditPage = false;
$id = postParam('id');

if($id != null){
    $isEditPage = true;
}

$select = mysqli_query($con, "SELECT * FROM `skills` where `id`='$id' limit 1");
$general_info_data = mysqli_fetch_array($select);

function checkValue($index, $isEditPage, $data){
    if($isEditPage){
        if (!empty($data[$index])){
            return ($data[$index]);
        }
    }
}


function addEduTable($id){
    if (isset($_POST['submitAddSkillForm'])){

        $title = $_POST['title'];

        $con = $GLOBALS['con'];

        if (!empty($title)){
                $select = mysqli_query($con, "INSERT into `skills` (`title`) VALUES ('$title') ");


            if($select){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 3;
        }
    }else if (isset($_POST['submitEditSkillForm'])){

        $title = $_POST['title'];

        $con = $GLOBALS['con'];

        if (!empty($title)){
            $select = mysqli_query($con, "UPDATE `skills` SET `title`='$title'  WHERE `id` = '$id' ");

            if($select){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 0;
        }
    }
}



?>
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if($isEditPage):?>
    <h1 class="h3 mb-4 text-gray-800">Edit skills</h1>
    <?php else:?>
    <h1 class="h3 mb-4 text-gray-800">Add skills</h1>
    <?php endif;?>


    <form method="post">
        <div class="row">   
            <div class="col-lg-8 mb-6">
                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" class="form-control form-control-user" name="title" id="titleId" 
                    placeholder="Enter Title ..." value="<?=checkValue('title', $isEditPage, $general_info_data)?>">
                </div>
            </div>
        </div>
        <div class="row" >
            <?php if($isEditPage):?>
                <div class="col-lg-8 mb-6" >
                <input  type="submit" name="submitEditSkillForm" class="btn btn-primary btn-user btn-block" value="Edit Skills"> 
                </div>
            <?php else:?>
                <div class="col-lg-8 mb-6" >
                <input  type="submit" name="submitAddSkillForm" class="btn btn-primary btn-user btn-block" value="Add Skills"> 
                </div>
            <?php endif;?>
        </div>
    </form>
    <br>
    <div id='result'>
        <?php $status = addEduTable($id);?>
        <?php if($status == 2 ):?> 
            <?php  if($isEditPage):?>
                <div class="alert alert-success">Education edited Successfully. Updating...</div>
                <?php header("refresh: 0;");?>
            <?php else:?>
                <div class="alert alert-success">Education Added Successfully. Updating...</div>
                <?php header("refresh: 0;");?>
            <?php endif;?>
        <?php elseif($status == 1 ): ?>
            <?php  if($isEditPage):?>
                <div class="alert alert-danger">edited Education Failed!</div> 
            <?php else:?>
                <div class="alert alert-danger">Added Education Failed!</div> 
            <?php endif;?>
        <?php elseif($status == 3 ): ?>
            <?php  if($isEditPage):?>
                <div class="alert alert-warning">Please Enter Required Filed!</div>     
            <?php else:?>
                <div class="alert alert-warning">Please Enter Required Filed!</div>     
            <?php endif;?>
        <?php endif;?>
    </div>
</div>  
