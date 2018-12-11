<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');

$course = " ";
if(isset($_REQUEST['coursename'])) $course = htmlentities(trim($_REQUEST['coursename']), ENT_QUOTES);


if(!empty($course))
{
    if(!isUniqueCourse($course)){

        echo "Course Exists!";
    }

}
