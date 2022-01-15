<?php
error_reporting(0);
session_start();
$veri = $_SESSION['verifty'];
function time_ago_in_php($timestamp)
{

    date_default_timezone_set("Asia/Dhaka");
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds  
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec  
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;  
    $weeks   = round($seconds / 604800); // 7*24*60*60;  
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60) {

        return "Just Now";
    } else if ($minutes <= 60) {

        if ($minutes == 1) {

            return "1 min ago";
        } else {

            return "$minutes mins ago";
        }
    } else if ($hours <= 24) {

        if ($hours == 1) {

            return "1 hour ago";
        } else {

            return "$hours hrs ago";
        }
    } else if ($days <= 7) {

        if ($days == 1) {

            return "Yesterday";
        } else {

            return "$days days ago";
        }
    } else if ($weeks <= 4.3) {

        if ($weeks == 1) {

            return "a week ago";
        } else {

            return "$weeks weeks ago";
        }
    } else if ($months <= 12) {

        if ($months == 1) {

            return "a month ago";
        } else {

            return "$months months ago";
        }
    } else {

        if ($years == 1) {

            return "1 year ago";
        } else {

            return "$years years ago";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
    <link rel="stylesheet" href="css/game.css">
    <title>User Reviews</title>
</head>

<style>
    #class {
        margin-top: 7rem;
        display: flex;
        justify-content: center;
    }

    .review {
        background: none;
    }

    .review img {
        border: 1px solid #201f1f;
        border-radius: 50%;
    }

    .rightSide {
        background: #ececec;
        border-radius: 2em;
        padding: .5em 2em;
    }

    #email-address {
        font-size: .8em;
        margin-top: -.7em;
        margin-bottom: 0;
        /* font-weight: bold; */
    }
    #timeStmp {
        font-size: .65em;
        margin-bottom: 0;
        /* font-weight: bold; */
    }

    #button  {
        margin: 0 auto;
        color: red;
        border: 1px solid red;
        border-radius: 1.5em;
        padding: .5em;
        
        background: white;
    }
    #button a {
        color: red;
    }
</style>

<body>

    <!-- MENU BAR -->
    <?php

    include "navbar.php";

    ?>
    <!-- CLASS -->
    <section class="class section" id="class">

        <?php
        
        if ($veri == 1) {
            require "dbConnect.php";
            $sql = "SELECT * FROM `contact` ORDER BY sno desc";
            $res = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($res)) {
                $email = $row["email"];
                $name = $row["name"];
                $msg = $row["message"];
                $time = time_ago_in_php($row['time']);
                echo '<div class="review">

                <img src="img/default-profile.png">
                <div class="rightSide">
                <p id= "timeStmp">• ' . $time . '</p>
                    <h5>' . $name . '</h5>
                    <p id= "email-address">' . $email . '</p>
                    <p>' . $msg . '</p>
                </div>
            </div>';
            }
        } else {
            echo "<p style='font-size: 2rem;
            margin: 18rem 0;
            color: #bbb7b7;'>You're not allowed to access this page<p>";
            header("location: index.php");
        }
        
        ?>


</section>
<button id="button"><a href="logout.php">Log Out</a></button>
</body>

</html>