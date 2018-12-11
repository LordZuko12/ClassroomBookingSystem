<?php

require('../model/connect.php') ;
require('../model/query.php');

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $deptname = htmlentities(trim($_POST['department']));

    if(addDepartment($deptname)){

        header('Location:../requestSuccessful.php');

    }else{

        header('Location:../unsuccessfulRequest.php');

    }
}

?>