<?php
require('./model/connect.php') ;
require('./model/query.php');

function getDeptName(){

    $dept = getDeptList();
    //var_dump($dept);
    return $dept;
}

function getUserInfo($username){

    $user = getUser($username);
    return $user;
}

function getCourse($username){

    $user = getUser($username);
    $deptId = $user['deptid'];

    $courseList = getCourseList($deptId);

    return $courseList;

}

?>