<!DOCTYPE html>
<html class="no-js" lang="en"  >
<head>
    <style >
        a{text-decoration: none;
        }
    </style>
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
    <script type="text/javascript" src="js/selectBookingInfo.js"></script>

    <?php
        include('controller/fetchList.php');
    ?>
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
            <!--    <a class="logo" href="adminhome.html">-->
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
                    <li><a href="cancelbookings.html">Cancel Booking</a></li>
                </ul>
            </li>
            <li><a href="facultybookinglog.html" title="">Booking Log</a></li>
            <li><a href="facultyprofile.html" title="">Profile</a></li>
            <li><a href="controller/logout.php" title="">Log Out</a></li>
        </ul>

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav>

</header>
<section class="s-content s-content--top-padding s-content--narrow" style="background-image: url('images/bg-01.jpg');">

    <div class="limiter">
        <div class="container-login100" >
            <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					New Bookings
					<br><br>
				</span>
                <form class="login100-form validate-form p-b-33 p-t-5">
                    <div >
                        <input class="input100" type="text" name="id"
                               value="<?php
                               $user = getUserInfo($_SESSION['username']);
                               echo "Username: ".$user['username']?>" readonly>
                    </div>
                    <div  >
                        <select id="classType" class="input102" onchange="showTime(this)">
                            <option value="classType">Class Type</option>
                            <option value="lab">Lab (3 hrs)</option>
                            <option value="theory1">Theory (1.5hrs)</option>
                            <option value="theory2">Theory (2 hrs)</option>
                        </select>

                    </div>
                    <div class="input104">
                        <p style="font-size: 18px">Class Time</p>
                        <div id="th1" style="display: none">
                            <p>Theory (1.5 hrs)</p>
                            <input id = "" type="checkbox" value="8:00-9:30">8:00-9:30<br>
                            <input id = "" type="checkbox" value="9:30-11:00">9:30-11:00<br>
                            <input id = "" type="checkbox" value="11:00-12:30">11:00-12:30<br>
                            <input id = "" type="checkbox" value="12:30-2:00">12:30-2:00<br>
                            <input id = "" type="checkbox" value="2:00-3:30">2:00-3:30<br>
                            <input id = "" type="checkbox" value="3:30-5:00">3:30-5:00<br>
                            <br>
                        </div>
                        <div id="th2" style="display: none">
                            <p>Theory (2 hrs)</p>
                            <input id = "" type="checkbox" value="8:00-10:00">8:00-10:00<br>
                            <input id = "" type="checkbox" value="10:00-12:00">10:00-12:00<br>
                            <input id = "" type="checkbox" value="12:00-2:00">12:00-2:00<br>
                            <input id = "" type="checkbox" value="2:00-4:00">2:00-4:00<br>
                            <br>
                        </div>
                        <div id="lb" style="display: none">
                            <p>Lab (3 hrs)</p>
                            <input id = "" type="checkbox" value="8:00-11:00">8:00-11:00<br>
                            <input id = "" type="checkbox" value="11:00-2:00">11:00-2:00<br>
                            <input id = "" type="checkbox" value="2:00-5:00">2:00-5:00<br>
                            <br>
                        </div>
                    </div>
                    <div >
                        <select name="course" class="input102">
                            <option value="course">Course Name</option>
                            <?php
                                $course = getCourse($_SESSION['username']);
                                foreach ($course as $c){?>
                            <option value="<?php echo $c['coursename'];?>"><?php echo $c['coursename'];?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div >
                        <input class="input100" type="text" name="availableroom" placeholder="Available Room">
                    </div>

                </form>
                <br><br>
                <div class="container-login100-form-btn m-t-32" >
                    <button class="login100-form-btn">
                        <a href="newbookings.php">CONFIRM<a>
                    </button>
                </div>
            </div>
        </div>
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



</body>

</html>