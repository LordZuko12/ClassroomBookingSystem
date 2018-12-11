<?php

require('../model/connect.php') ;
require('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $course = htmlentities(trim($_POST['coursename']));

    if(addCourse($course)){

        header('Location:../requestSuccessful.php');

    }else{

        header('Location:../unsuccessfulRequest.php');

    }
}

?>