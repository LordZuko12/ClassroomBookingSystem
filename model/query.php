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

    $sql = "SELECT type FROM user WHERE username ='$id' AND password = '$password'";
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



?>