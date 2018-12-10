<?php

require_once('../model/connect.php') ;
require_once('../model/query.php');


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $reason = htmlentities(trim($_POST['reason']));
    $bookingId = $_POST['booking'];

    if(cancelBookingStatus($bookingId, $reason)){

        echo "Here";
        header('Location:../requestSuccessful.php');

    }else {

        header("Location:../unsuccessfulRequest.php");
    }

}

?>