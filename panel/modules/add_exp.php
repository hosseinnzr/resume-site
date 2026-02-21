<?php
$module_value = getParam("modules");
require('../controler/conection.php');

$isEditPage = false;
$id = postParam('id');

if($id != null){
    $isEditPage = true;
}

$select = mysqli_query($con, "SELECT * FROM `experiences` where `id`= '$id' limit 1");
$general_info_data = mysqli_fetch_array($select);

function checkValue($index, $isEditPage, $data){
    if($isEditPage){
        if (!empty($data[$index])){
            return $data[$index];
        }
    }
}

function addExpTable($id){
    if (isset($_POST['submitAddExpForm'])){

        $title = $_POST['title'];
        $sub_Title = $_POST['subTitle'];
        $from_Date = $_POST['FromDate'];
        $To_Date = $_POST['ToDate'];
        $content = $_POST['content'];

        $con = $GLOBALS['con'];

        if (!empty($title) &&!empty($sub_Title) &&!empty($content)){
                $select = mysqli_query($con, "INSERT into `experiences` (`title`, `subTitle`, `FromDate`, `ToDate`, `content`) 
            VALUES ('$title', '$sub_Title', '$from_Date', '$To_Date', '$content') ");


            if($select){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 3;
        }
    }else if(isset($_POST['submitEditEguForm'])){

        $title = $_POST['title'];
        $sub_Title = $_POST['subTitle'];
        $from_Date = $_POST['FromDate'];
        $To_Date = $_POST['ToDate'];
        $content = $_POST['content'];

        $con = $GLOBALS['con'];

        if (!empty($title) &&!empty($sub_Title) &&!empty($content)){
                $select = mysqli_query($con, "UPDATE  `experiences` SET 
                `title`='$title', `subTitle`='$sub_Title', `FromDate`='$from_Date', 
                `ToDate`='$To_Date', `content`='$content'  WHERE `id` = '$id' ");


            if($select){
                return 2;
            }else{
                return 1;
            }
        }else{
            return 3;
        }
    }else{
        return 0;
    }
}



?>
<div class="container-fluid">

    <!-- Page Heading -->
    <?php if($isEditPage):?>
    <h1 class="h3 mb-4 text-gray-800">Edit Experience</h1>
    <?php else:?>
    <h1 class="h3 mb-4 text-gray-800">Add Experience</h1>
    <?php endif;?>

    <form method="post">
        <div class="row">   
            <div class="col-lg-3 mb-6">
                <div class="form-group">
                    <label for="title">title:</label>
                    <input type="text" class="form-control form-control-user" name="title" id="title" 
                    placeholder="Enter Title ..." value="<?=checkValue('title', $isEditPage, $general_info_data)?>">
                </div>
            </div>
            <div class="col-lg-3 mb-6">
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
        </div>

        <div class="row">   
            <div class="col-lg-6 mb-6">
                <div class="form-group">
                    <label for="title">content:</label>
                    <textarea type="text" class="form-control form-control-user" name="content" id="content" 
                    rows="5" placeholder="Enter content ..."><?=checkValue('content', $isEditPage, $general_info_data)?></textarea>
                </div>
            </div>
        </div>
        <div class="row" >
            <?php if($isEditPage):?>
                <div class="col-lg-6 mb-6" >
                <input  type="submit" name="submitEditEguForm" class="btn btn-primary btn-user btn-block" value="Edit experiences"> 
                </div>
            <?php else:?>
                <div class="col-lg-6 mb-6" >
                <input  type="submit" name="submitAddExpForm" class="btn btn-primary btn-user btn-block" value="Add experiences"> 
                </div>
            <?php endif;?>
        </div>
    </form>
    <br>
    <div id='result'>
    <?php $status = addExpTable($id);?>
        <?php if($status == 2 ):?> 
            <?php  if($isEditPage):?>
                <div class="alert alert-success">Experience edited Successfully. Updating...</div>
                <?php header("refresh: 0");?>                

            <?php else:?>
                <div class="alert alert-success">Experience Added Successfully.</div>
            <?php endif;?>
        <?php elseif($status == 1 ): ?>
            <?php  if($isEditPage):?>
                <div class="alert alert-danger">edited Experience Failed!</div> 
            <?php else:?>
                <div class="alert alert-danger">Added Experience Failed!</div> 
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
