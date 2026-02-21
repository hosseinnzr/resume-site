<?php
ob_start();

require('../controler/conection.php');

$isEditPage = false;
$id = postParam('id');

if($id != null){
    $isEditPage = true;
}

$select = mysqli_query($con, "SELECT * FROM `awards` where `id`='$id' limit 1");
$general_info_data = mysqli_fetch_array($select);

function checkValue($index, $isEditPage, $data){
    if($isEditPage){
        if (!empty($data[$index])){
            return ($data[$index]);
        }
    }
}


function addAwardsTable($id){
    if (isset($_POST['submitAddAwardsForm'])){

        $title = $_POST['title'];
        $link = $_POST['link'];
        $type = $_POST['type'];

        $con = $GLOBALS['con'];

        if (!empty($title)){
                $select = mysqli_query($con, "INSERT into `awards` (`title`, `link`, `type`) VALUES ('$title', '$link', '$type') ");


            if($select){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 3;
        }
    }else if (isset($_POST['submitEditAwardsForm'])){

        $title = $_POST['title'];
        $link = $_POST['link'];
        $type = $_POST['type'];

        $con = $GLOBALS['con'];

        if (!empty($title)){
            $select = mysqli_query($con, "UPDATE `awards` SET `title`='$title', `link`='$link', `type`='$type' WHERE `id` = '$id' ");

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
    <h1 class="h3 mb-4 text-gray-800">Edit Awards</h1>
    <?php else:?>
    <h1 class="h3 mb-4 text-gray-800">Add Awards</h1>
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

        <div class="row">   
            <div class="col-lg-4 mb-6">
                <div class="form-group">
                    <label for="link">link:</label>
                    <input type="text" class="form-control form-control-user" name="link" id="linkId" 
                    placeholder="Enter Link ..." value="<?=checkValue('link', $isEditPage, $general_info_data)?>">
                </div>
            </div>
            <div class="col-lg-4 mb-6">
                <div class="form-group">
                    <label for="typeId">type:</label>
                    <select class="form-control form-control-user" name="type" id="typeId">
                        <option <?php if(checkValue('type', $isEditPage, $general_info_data) == "awards") echo 'selected'?>
                         value = "awards">awards</option>
                        <option <?php if(checkValue('type', $isEditPage, $general_info_data) == "certification") echo 'selected'?>
                            value = "certification">certification</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row" >
            <?php if($isEditPage):?>
                <div class="col-lg-8 mb-6" >
                <input  type="submit" name="submitEditAwardsForm" class="btn btn-primary btn-user btn-block" value="Edit Awards"> 
                </div>
            <?php else:?>
                <div class="col-lg-8 mb-6" >
                <input  type="submit" name="submitAddAwardsForm" class="btn btn-primary btn-user btn-block" value="Add Awards"> 
                </div>
            <?php endif;?>
        </div>
    </form>
    <br>
    <div id='result'>
        <?php $status = addAwardsTable($id);?>
        <?php if($status == 2 ):?> 
            <?php  if($isEditPage):?>
                <div class="alert alert-success">Awards edited Successfully. Updating...</div>
                <?php header("refresh: 0;");?>
            <?php else:?>
                <div class="alert alert-success">Awards Added Successfully. Updating...</div>
                <?php header("refresh: 0;");?>
            <?php endif;?>
        <?php elseif($status == 1 ): ?>
            <?php  if($isEditPage):?>
                <div class="alert alert-danger">edited Awards Failed!</div> 
            <?php else:?>
                <div class="alert alert-danger">Added Awards Failed!</div> 
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
