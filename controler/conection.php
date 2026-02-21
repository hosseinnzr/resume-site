<?php
ob_start();

$con = mysqli_connect('localhost', 'root', '', 'resumesite');

$select = mysqli_query($con, "SELECT * FROM `experiences` order by `id` DESC");
$select_edu = mysqli_query($con, "SELECT * FROM `education` order by `id` DESC");
$select_tools_skills = mysqli_query($con, "SELECT * FROM `skills_tools` order by `id` DESC");
$select_skills = mysqli_query($con, "SELECT * FROM `skills` order by `id` DESC");
$select_awards = mysqli_query($con, "SELECT * FROM `awards` order by `id` DESC");
$select_awards = mysqli_query($con, "SELECT * FROM `awards` order by `id` DESC");
$your_ip = mysqli_query($con, "SELECT * FROM `ip` order by `id` DESC LIMIT 10");



if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!function_exists('getGeneralInfo')) {
    function getGeneralInfo($conection) {
        $select = mysqli_query($conection, "SELECT * FROM `genaral_info` LIMIT 1");
        $data = mysqli_fetch_array($select);
        return $data;
    }
}
?>
