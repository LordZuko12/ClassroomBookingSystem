<?php

require_once('model/connect.php') ;
require_once('model/query.php');


if($_SERVER["REQUEST_METHOD"]=="POST"){

    $bookId = $_POST['bookId'];

    $bookDetails = getBookingDetails($bookId);

    echo $bookDetails['description'];
}

