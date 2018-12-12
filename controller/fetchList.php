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

function getFaculty(){

    $faculty = getAllFaculty();

    return $faculty;
}

function getALLCourseName(){

    $course = getAllCourse();

    return $course;
}

function getUserRequest(){

    $user = getAllUserRequest();

    return $user;
}

function getDept($deptId){

    $dept = getFacultyDept($deptId);

    return $dept;
}

function getAllBookingDetails(){

    $bookList = getALLBooking();
    return $bookList;
}

function getUsername($userId){

    $userName = getUsersName($userId);
    return $userName;
}

function getAllRoomList(){

    $roomList = getAllRoom();

    return $roomList;
}

function roomType($typeId){

    $type = getRoomType($typeId);
    return $type;
}

function roomLocation($annexId){

    $location = getRoomLocation($annexId);
    return $location;
}

function allRoomType()
{
    $typeList = getAllRoomType();

    return $typeList;
}

function allRoomLocation(){

    $locationList = getAllRoomLocation();

    return $locationList;

}

function allCourseList()
{

    $courseList = getAllCourse();

    return $courseList;
}

function deptIdForCourse($dept){

    $deptname =getFacultyDept($dept);

    return $deptname;
}
?>