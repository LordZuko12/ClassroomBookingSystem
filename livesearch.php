<?php
/**
 * Created by PhpStorm.
 * User: mdsae
 * Date: 19-Nov-18
 * Time: 07:27 AM
 */
$conn= mysqli_connect('localhost','root','','cbs');

///write new query here
$q=$_GET["q"];

$result=mysqli_query($conn,"SELECT coursename FROM course where coursename like  '%$q%' ");

$rows=mysqli_num_rows($result);
if ($rows> 0)
{
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<p><a href='#' class='leftborder'><b>".$row['coursename']."</b></a></p>";
    }

}
else
{
    echo "No news found according to this search term";
}