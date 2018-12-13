<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <style >
        a{text-decoration: none;
        }
    </style>
    <script>
        function showResult(str) {
            if (str.length==0) {
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("livesearch").innerHTML=this.responseText;
                    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
                }
            }
            xmlhttp.open("GET","livesearch.php?q="+str,true);
            xmlhttp.send();
        }
    </script>
    <meta charset="utf-8">
    <title>CBS</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/base.css">
    <script src="_js/modernizr.js"></script>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <?php include ("controller/fetchList.php");?>
</head>
<body id="top">
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("location:index.html");
}

?>

<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="facultyhome.php">
            <img src="images/logo.svg" alt="Homepage">
        </a>
    </div>



    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="facultyhome.php" title="">Home</a></li>
            <li class="has-children">
                <a href="#0" title="">Bookings</a>
                <ul class="sub-menu">
                    <li><a href="facultynewbookings.php">New Booking</a></li>
                    <li><a href="facultyCancelBookings.php">Cancel Booking</a></li>
                </ul>
            </li>
            <li><a href="facultybookinglog.php" title="">Booking Log</a></li>
            <li><a href="facultyprofile.php" title="">Profile</a></li>
            <li><a href="controller/logout.php" title="">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>



<section class="s-content s-content--top-padding s-content--narrow" style="background-image: url('images/bg-01.jpg');">

    <div class="login101-form col-block">
        <p>SORT BY: </p>

        <select class="input102">
            <option value="month">Month</option>
            <option value="week">Week</option>
        </select>
    </div>
    <div class="login103-form ">
        <input type="text" name="search" placeholder="Search" onkeyup="showResult(this.value)">
        <div id="livesearch" style="border-bottom-left-radius: 4px;border-bottom-right-radius: 4px;"></div>


    </div>
    <div class="login104-form ">
        <p><h2>Booking Log</h2></p>
    </div>
    <br>
    <div class="login104-form ">
        <table class="login100-form validate-form p-b-33 p-t-5">
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Room</th>
                <th>Course Name</th>
                <th>Booked By</th>
                <th>Status</th>
            </tr>
            <?php
                $bookList = getFacultyBooking($_SESSION['username']);

                foreach ($bookList as $b){

                    $roomName = getClassRoomNum($b['classid']);
                    $courseName = getNameCourse($b['courseid']); ?>
                    <tr>
                        <td><?php echo $b['date'];?></td>
                        <td><?php echo $b['starttime']." - ".$b['endtime'];?></td>
                        <td><?php echo $roomName['roomname'];?></td>
                        <td><?php echo $courseName['coursename'];?></td>
                        <td><?php echo $b['addedby'];?></td>
                        <td>
                            <?php if($b['status']==1){
                                echo "Confirmed.";
                            }else{
                                echo "Cancelled by ";?>
                        </td>
                        <td><?php echo$b['cancelledby'];}?></td>
                    </tr>
                <?php }?>
        </table>
    </div>
</section>
<footer class="s-footer">

    <div class="row">
        <div class="col-six tab-full s-footer__about">

            <h4>ABOUT CBS</h4>

            <p style="color: #58905f">It is a class booking system</p>

        </div>
        <div class="col-six tab-full s-footer__subscribe ">

            <h4>DEVOLOPED BY</h4>

            <p ><h5 style="color: #58905f">TANJIMA NASREEN JENIA(16-31237-1)</h5></p>
            <p><h5 style="color: #58905f">MD. TAREQ(16-31181-1)<h5> </p>
        </div>
    </div>
</footer>
<script src="_js/jquery-3.2.1.min.js"></script>
<script src="_js/main.js"></script>

</body>

</html>