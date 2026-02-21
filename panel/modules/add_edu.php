<?php
ob_start();

require('../controler/conection.php');

$isEditPage = false;
$id = postParam('id');

if($id != null){
    $isEditPage = true;
}

$select = mysqli_query($con, "SELECT * FROM `education` where `id`='$id' limit 1");
$general_info_data = mysqli_fetch_array($select);

function checkValue($index, $isEditPage, $data){
    if($isEditPage){
        if (!empty($data[$index])){
            return ($data[$index]);
        }
    }
}


function addEduTable($id){
    if (isset($_POST['submitAddEguForm'])){

        $title = $_POST['title'];
        $sub_Title = $_POST['subTitle'];
        $from_Date = $_POST['FromDate'];
        $To_Date = $_POST['ToDate'];
        $GPA = $_POST['GPA'];
        $content = $_POST['content'];

        $con = $GLOBALS['con'];

        if (!empty($title) &&!empty($sub_Title) &&!empty($content)){
                $select = mysqli_query($con, "INSERT into `education` (`title`, `subTitle`, `FromDate`, `ToDate`, `gpa`, `content`) 
            VALUES ('$title', '$sub_Title', '$from_Date', '$To_Date', '$GPA', '$content') ");


            if($select){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 3;
        }
    }else if (isset($_POST['submitEditEguForm'])){

        $title = $_POST['title'];
        $sub_Title = $_POST['subTitle'];
        $from_Date = $_POST['FromDate'];
        $To_Date = $_POST['ToDate'];
        $GPA = $_POST['GPA'];
        $content = $_POST['content'];

        $con = $GLOBALS['con'];

        if (!empty($title) &&!empty($sub_Title) &&!empty($content)){
            $select = mysqli_query($con, "UPDATE `education` SET `title`='$title', `subTitle`='$sub_Title', 
            `FromDate`='$from_Date', `ToDate`='$To_Date', `gpa`='$GPA', `content`='$content' WHERE `id` = '$id' ");


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
    <h1 class="h3 mb-4 text-gray-800">Edit Education</h1>
    <?php else:?>
    <h1 class="h3 mb-4 text-gray-800">Add Education</h1>
    <?php endif;?>


    <form method="post">
        <div class="row">   
            <div class="col-lg-5 mb-6">
                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" class="form-control form-control-user" name="title" id="title" 
                    placeholder="Enter Title ..." value="<?=checkValue('title', $isEditPage, $general_info_data)?>">
                </div>
            </div>
            <div class="col-lg-4 mb-6">
                <div class="form-group">
                    <label for="subTitle">subTitle:</label>
                    <input type="text" class="form-control form-control-user" name="subTitle" id="subTitle" 
                    placeholder="Enter Sub Title ..." value="<?=checkValue('subTitle', $isEditPage, $general_info_data)?>">
                </div>
            </div> 
        </div>

        <div class="row">   
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="title">From Date:</label>
                    <input type="text" class="form-control form-control-user" name="FromDate" id="FromDate" 
                    placeholder="Enter From Date ..." value="<?=checkValue('fromDate', $isEditPage, $general_info_data)?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="subTitle">To Date:</label>
                    <input type="text" class="form-control form-control-user" name="ToDate" id="ToDate" 
                    placeholder="Enter Sub To Date ..." value="<?=checkValue('toDate', $isEditPage, $general_info_data)?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="subTitle">GPA:</label>
                    <input type="text" class="form-control form-control-user" name="GPA" id="GPA" 
                    placeholder="Enter Sub To Date ..." value="<?=checkValue('gpa', $isEditPage, $general_info_data)?>">
                </div>
            </div> 
        </div>

        <div class="row">   
            <div class="col-lg-9 mb-6">
                <div class="form-group">
                    <label for="title">content:</label>
                    <textarea type="text" class="form-control form-control-user" name="content" id="content" 
                    rows="5" placeholder="Enter content ..."><?=checkValue('content', $isEditPage, $general_info_data)?></textarea>
                </div>
            </div>
        </div>
        <div class="row" >
            <?php if($isEditPage):?>
                <div class="col-lg-9 mb-6" >
                <input  type="submit" name="submitEditEguForm" class="btn btn-primary btn-user btn-block" value="Edit Education"> 
                </div>
            <?php else:?>
                <div class="col-lg-9 mb-6" >
                <input  type="submit" name="submitAddEguForm" class="btn btn-primary btn-user btn-block" value="Add Education"> 
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
