<?php

require_once("connect.php");

function isUniqueEmail($email){

    $sql = "SELECT * FROM user WHERE email = '$email'";

    $result=execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}

function isUniqueId($id){

    $sql = "SELECT * FROM user WHERE username = '$id'";
    $result = execute($sql);
    $res=mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);

    if($count!=0){
        return false;
    }else{
        return true;
    }
}

function getDepartmentId($dept){

    $sql = "SELECT id FROM department WHERE deptname = '$dept'";
    $result = execute($sql);
    $res= mysqli_fetch_array($result);

    return $res;
}

function addUser($id, $name, $email, $phone, $password, $deptid)
{
    $sql = "INSERT INTO user(username, fullname, email, password, phone, status, deptid) VALUES ('$id', '$name', '$email', '$password', '$phone', '0', '$deptid')";
    $result = execute($sql);

    if($result==true){
        return true;
    }else{

        return false;
    }
}

function checkUser($id, $password){

    $sql = "SELECT * FROM user WHERE username ='$id' AND password = '$password'";
    $result = execute($sql);
    $count = mysqli_num_rows($result);

    if($count===0){
        return false;
    }else{

        return true;
    }
}

function getUserType($id, $password){

    $sql = "SELECT * FROM user WHERE username ='$id' AND password = '$password'";
    $result = execute($sql);
    $res= mysqli_fetch_array($result);

    return $res;

}

function addDepartment($deptname){

    $sql = "INSERT INTO department(deptname) VALUES('$deptname')";
    $result = execute($sql);

    if($result==true){

        return true;
    }else{

        return false;
    }
}

function getDeptList(){

    $sql = "SELECT * From department";
    $result = execute($sql);

    $deptList = array();

    for($i =0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $deptList[$i] = $row;
    }
    //$res = mysqli_fetch_array($result);

    return $deptList;
}

function getUser($username){

    $sql = "SELECT * From user WHERE username = '$username'";
    $result = execute($sql);

    $user = mysqli_fetch_array($result);

    return $user;

}

function getCourseList($deptId){

    $sql = "SELECT coursename FROM course WHERE deptid = '$deptId'";

    $result = execute($sql);
    $courseList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $courseList[$i] = $row;
    }

    return $courseList;
}

function checkClassRoom($date, $startTime, $endTime){

    $sql = "SELECT classid FROM booking WHERE date ='$date' AND starttime = '$startTime' AND endtime = '$endTime'";

    $result = execute($sql);

    $classList = mysqli_fetch_array($result);

    return $classList;
}

function checkStartTime($date, $startTime){

    $sql = "SELECT * FROM booking WHERE date ='$date' AND starttime = '$startTime' AND status ='1'";

    $result = execute($sql);

    $classList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $classList[$i] = $row;
    }


    return $classList;
}

function getClassRoom($roomType){

    $sql = "SELECT * FROM classroom WHERE typeid = '$roomType'";

    $result = execute($sql);
    $roomList = array();

    for($i = 0; $row = mysqli_fetch_assoc($result); ++$i)
    {
        $roomList[$i] = $row;
    }

    return $roomList;

}

function getClassId($roomName){

    $sql = "SELECT * From classroom WHERE roomname = '$roomName'";
    $result = execute($sql);

    $room = mysqli_fetch_array($result);

    return $room;
}

function getCourseId($courseName){

    $sql = "SELECT * From course WHERE coursename = '$courseName'";
    $result = execute($sql);
    $course = mysqli_fetch_array($result);

    return $course;
}

function addNewBooking($userId, $courseId, $classId, $day, $startTime, $endTime){

    $sql = "INSERT INTO booking(userid, classid, courseid, status, date, description, starttime, endtime) VALUES ('$userId', '$classId', '$courseId', '1', '$day', 'Booked' ,'$startTime' ,'$endTime')";
    $result = execute($sql);

    if($result==true){

        return true;
    }else{

        return false;
    }

}

?>