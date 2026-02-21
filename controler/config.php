<?php 


function hashPass($password){
    return md5($password.'1234');
}

?>