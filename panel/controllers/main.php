<?php
$PANEL_ROUT_MAIN_ADR = 'index.php?modules=';
$HOST_ADR = '/';
$PANEL_PANEL_ADR = $HOST_ADR.'panel/';
$PANEL_PANEL_UPLOAD_ADR = $PANEL_PANEL_ADR.'uploads/';
function getParam($param_name){
    if (!empty($_GET[$param_name])){
        $value = $_GET[$param_name];
        return $value;
    }else{
        null;
    }
}
function postParam($param_name){
    if (!empty($_POST[$param_name])){
        $value = $_POST[$param_name];
        return $value;
    } else {
        return null;
    }
}

function getCurrentModule(){
    $module = getParam('modules');
    if (!empty($module)) {
        return $module;
    }else{
        return null;
    }
}
function checkModuleInSidebar($index = ''){
    if (getCurrentModule() == $index){
        return 'active';
    }
}
function includeByCheck($path, $path404=''){
    if (file_exists($path)){
        include $path;
    }else{
        if ($path404 != ""){
            if (file_exists($path404)){
                header("Location: $path404");
            }
        }
    }
}
function getPanelUserInfo(){
    $select = mysqli_query($GLOBALS['con'] , "SELECT * FROM `genaral_info` where `id` = '1' limit 1");

    $row = mysqli_fetch_array($select);
    return $row;
}

function isUserLoggedIn(){
    if(!empty($_SESSION['userLogin']))
    {
        $value = $_SESSION['userLogin'];
        if($value)
        {
            return true;
        }else
        {
            return false;
        }
    }else{
        return false;
    }
}
?>