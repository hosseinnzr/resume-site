<?php 
include_once "../../controler/conection.php";

include_once "main.php";

$ACTION = $_POST['action'];
$recordId = $_POST['recordId'];
$mod = $_POST['mod'];

switch  ($ACTION)
{
    case "remove_from_table":
        $query = "";
        switch ($mod){
            case 'exp' :
                $query = "DELETE FROM `experiences` WHERE id = '$recordId'";
                break;
            
            case 'edu' :
                $query = "DELETE FROM `education` WHERE id = '$recordId'";
                break;
            
            case 'toolsSkills' :
                $query = "DELETE FROM `skills_tools` WHERE id = '$recordId'";
                break;
            case 'Skills' :
                $query = "DELETE FROM `skills` WHERE id = '$recordId'";
                break;
            case 'awards' :
                $query = "DELETE FROM `awards` WHERE id = '$recordId'";
                break;
        }//end mode switch
        
        $result = mysqli_query($con, $query);
        if($result){
            echo json_encode(['result' => true]);
        }else{
            echo json_encode(['result' => false]);
        }
        break;
}
?>