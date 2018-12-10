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

function getFacultyBooking($username){

    $user = getUserInfo($username);

    $userId = $user['id'];

    $bookList = getFacultyBookingInfo($userId);

    return $bookList;

}

function getClassRoomNum($classId){

    $roomName = getClassRoomName($classId);

    return $roomName;
}

function getNameCourse($courseId){

    $courseName = getCourseName($courseId);

    return $courseName;
}

function getBook($bookId){

    $bookDetails = getBookingDetails($bookId);

    return $bookDetails;
}
?>