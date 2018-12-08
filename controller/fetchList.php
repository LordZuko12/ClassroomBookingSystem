<?php

require('./model/connect.php') ;
require('./model/query.php');

function getDeptName(){

    $dept = getDeptList();
    var_dump($dept);
    return $dept;
}

?>
