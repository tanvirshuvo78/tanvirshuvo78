<?php
error_reporting(0);
require "dbConnect.php";
$gameId = $_GET["id"];

$sql = "SELECT * FROM `games` WHERE sno=$gameId";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$gameName = $row["game_name"];
$gamePublisher = $row["game_publisher"];
$gamePoster = $row["game_poster"];
$gameDate = $row["game_date"];
$gameGenre = $row['game_genre'];
$gamePlatforms = $row['game_platforms'];
$gameSynopsis = $row['game_synopsis'];
$gameGallery = $row['game_gallery'];

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
    <link rel="stylesheet" href="css/game.css">
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/tooplate-gymso-style.css">
    <title><?php echo $gameName?> | Game Bench</title>
</head>

<body>

   
    <!-- MENU BAR -->
    <?php

    include "navbar.php";

    $ip = $_SERVER['REMOTE_ADDR'];
    $verify = "SELECT * FROM `ratings` WHERE ip_address=INET_ATON('$ip') AND game_id='$gameId'";
    $result = mysqli_query($conn, $verify);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $exRating = $row['rate'];
   



    ?>
    <!-- CLASS -->
    <input type="hidden" value="<?php echo $gameId;?>" id="game_id">
    <input type="hidden" value="<?php echo $ip;?>" id="user_ip">
    <input type="hidden" value="<?php echo $exRating;?>" id="ex_rating">

    <section class="upContainer">
        <div class="posterArea">
            <img class="poster" src="<?php echo $gamePoster; ?>">
            <h5>Rate this Game?</h5>
            <div class="rateStars">
                <span class="iconify rate1" id="rate1" data-icon="clarity:star-solid"></span>
                <span class="iconify rate2" id="rate2" data-icon="clarity:star-solid"></span>
                <span class="iconify rate3" id="rate3" data-icon="clarity:star-solid"></span>
                <span class="iconify rate4" id="rate4" data-icon="clarity:star-solid"></span>
                <span class="iconify rate5" id="rate5" data-icon="clarity:star-solid"></span>
            </div>
            <div class="circle" id="circle">
                <p class="shot">None</p>
                <p>Your Rating</p>
            </div>
            <p class="remark"></p>

            <button class="read-btn"><a href="s-review.php"> Read GameBench Review >></a></button>
        </div>

        <div class="midContainer">
            <h2><?php echo $gameName; ?></h2>
            <h5>Activision</h5>
            <div class="addInfo">
                <p><strong>Release Date:</strong> <?php echo $gameDate; ?></p>
                <p><strong>Genre:</strong> <?php echo $gameGenre; ?></p>
                <p><strong>Platforms:</strong> <?php echo $gamePlatforms; ?></p>
                <p><strong>Synopsis:</strong> <?php echo $gameSynopsis; ?></p>
            </div>
        </div>
        <div class="rightContainer">
</div>
  
    </section>


    <section class="gallery">


        <h2>Gallery</h2>
        <div class="imgContain">
           <?php echo $gameGallery;?>
        </div>


    </section>
    <section class="reviewBar">

        <div id="commentBox">

            <?php

            $sql = "SELECT * FROM `reviews` WHERE game_id='$gameId'";
            $result = mysqli_query($conn, $sql);
            $rvwAmt = mysqli_num_rows($result);

            ?>
            <h2>Reviews (<?php echo $rvwAmt; ?>)</h2>

            <form id="addForm" method="post">
                <input type="text" class="email" placeholder="Name" required>
                <textarea name="single_news_comment" placeholder="Add a Comment..." id="message" cols="56" rows="6"></textarea>
                <input type="submit" value="Post" name="post2" id="post2">
            </form>


            <div class="allComments">

            </div>

        </div>
    </section>

    <script src="JS/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            // rating js logic 

            $(".rate1").on('mouseenter',  function(){
                $(this).css("color", "lime");
                $(".rate2").css("color", "#cacaca");
                $(".rate3").css("color", "#cacaca");
                $(".rate4").css("color", "#cacaca");
                $(".rate5").css("color", "#cacaca");
                $(".remark").html("Very Bad!!!");
                
            })

    

            $(".rate2").on("mouseenter", function(){
                $(this).css("color", "lime");
                $(".rate1").css("color", "lime");
                $(".rate3").css("color", "#cacaca");
                $(".rate4").css("color", "#cacaca");
                $(".rate5").css("color", "#cacaca");

                $(".remark").html("Disappointing..");
                
            })

            
            $(".rate3").on("mouseenter", function(){
                $(this).css("color", "lime");
                $(".rate1").css("color", "lime");
                $(".rate2").css("color", "lime");
                $(".rate4").css("color", "#cacaca");
                $(".rate5").css("color", "#cacaca");
                $(".remark").html("Mediocre..");
                
            })


            $(".rate4").on("mouseenter", function(){
                $(this).css("color", "lime");
                $(".rate1").css("color", "lime");
                $(".rate2").css("color", "lime");
                $(".rate3").css("color", "lime");
                $(".rate5").css("color", "#cacaca");
                $(".remark").html("Excellent!");
                
            })

           
            $(".rate5").on("mouseenter", function(){
                $(this).css("color", "lime");
                $(".rate1").css("color", "lime");
                $(".rate2").css("color", "lime");
                $(".rate3").css("color", "lime");
                $(".rate4").css("color", "lime");
                $(".remark").html("Masterpiece!!!");
                
            })
            
            $(".rateStars").on("mouseleave", function(){
                $(".rate5").css("color", "#cacaca");
                $(".rate4").css("color", "#cacaca");
                $(".rate3").css("color", "#cacaca");
                $(".rate2").css("color", "#cacaca");
                $(".rate1").css("color", "#cacaca");
                $(".remark").html("");

            })
          

            
            let exRating = $("#ex_rating").val();
            if (exRating === '') {
                console.log("bhai");
            } else if (exRating === '1'){
                console.log("1");
                $("#rate1").addClass('rateClicked');
            } else if (exRating === '2') {
                $("#rate1").addClass('rateClicked');
                $("#rate2").addClass('rateClicked');
            } else if (exRating === '3') {
                $("#rate1").addClass('rateClicked');
                $("#rate2").addClass('rateClicked');
                $("#rate3").addClass('rateClicked');
            } else if (exRating === '4') {
                $("#rate1").addClass('rateClicked');
                $("#rate2").addClass('rateClicked');
                $("#rate3").addClass('rateClicked');
                $("#rate4").addClass('rateClicked');
            } else if (exRating === '5') {
                $("#rate1").addClass('rateClicked');
                $("#rate2").addClass('rateClicked');
                $("#rate3").addClass('rateClicked');
                $("#rate4").addClass('rateClicked');
                $("#rate5").addClass('rateClicked');
            }
            // console.log(exRating);
            $("#rate1").on("click", function(){
                $(this).addClass('rateClicked');
                $(this).removeClass('rate1');
                $("#rate2").addClass('rate2');
                $("#rate2").removeClass('rateClicked');
                $("#rate3").addClass('rate3');
                $("#rate3").removeClass('rateClicked');
                $("#rate4").addClass('rate4');
                $("#rate4").removeClass('rateClicked');
                $("#rate5").addClass('rate5');
                $("#rate5").removeClass('rateClicked');
                addRating(1);
                showAvg();
                
            })

            $("#rate2").on("click", function(){
                $(this).addClass('rateClicked');
                $(this).removeClass('rate2');
                $("#rate1").addClass('rateClicked');
                $("#rate1").removeClass('rate1');
                $("#rate3").addClass('rate3');
                $("#rate3").removeClass('rateClicked');
                $("#rate4").addClass('rate4');
                $("#rate4").removeClass('rateClicked');
                $("#rate5").addClass('rate5');
                $("#rate5").removeClass('rateClicked');
                addRating(2);
                showAvg();
                
            })

            $("#rate3").on("click", function(){
                $(this).addClass('rateClicked');
                $(this).removeClass('rate3');
                $("#rate1").addClass('rateClicked');
                $("#rate1").removeClass('rate1');
                $("#rate2").addClass('rateClicked');
                $("#rate2").removeClass('rate2');
                $("#rate4").addClass('rate4');
                $("#rate4").removeClass('rateClicked');
                $("#rate5").addClass('rate5');
                $("#rate5").removeClass('rateClicked');
                addRating(3);
                showAvg();
                
            })

            $("#rate4").on("click", function(){
                $(this).addClass('rateClicked');
                $(this).removeClass('rate4');
                $("#rate1").addClass('rateClicked');
                $("#rate1").removeClass('rate1');
                $("#rate2").addClass('rateClicked');
                $("#rate2").removeClass('rate2');
                $("#rate3").addClass('rateClicked');
                $("#rate3").removeClass('rate3');
                $("#rate5").addClass('rate5');
                $("#rate5").removeClass('rateClicked');
                addRating(4);
                showAvg();
                
            })
            $("#rate5").on("click", function(){
                $(this).addClass('rateClicked');
                $(this).removeClass('rate5');
                $("#rate1").addClass('rateClicked');
                $("#rate1").removeClass('rate1');
                $("#rate2").addClass('rateClicked');
                $("#rate2").removeClass('rate2');
                $("#rate3").addClass('rateClicked');
                $("#rate3").removeClass('rate3');
                $("#rate4").addClass('rateClicked');
                $("#rate4").removeClass('rate4');
                addRating(5);
                showAvg();
                
            })

            function addRating(rateNum) {
                let data = {
                    rating: rateNum,
                    ip: $("#user_ip").val(),
                    verify: $("#ex_rating").val(),
                    rid: $("#game_id").val()
                }
                console.log(data.rating);
                $.ajax({
                    url: "ajax/addRating.php",
                    method: "POST",
                    data: data,
                    success: function(data, status) {
                        $("#ex_rating").val(rateNum);
                       
                       addColor(rateNum);
                       
                    }
                })
            }

            addColor(exRating);
            showAvg();

            function addColor(x) {
                $(".shot").html(x);
                if (x > 3) {
                            $("#circle").css("border-color", "lime");
                            $("#circle p").css("color", "black");
                        }
                        else if (x === 3) {
                            $("#circle").css("border-color", "yellow");
                            $("#circle p").css("color", "black");
                        } else if ( 0 > x < 3) {
                            $("#circle").css("border-color", "red");
                            $("#circle p").css("color", "black");
                        } 
            }

            function showAvg() {
                let data = {
                    rid: $("#game_id").val()
                };
                $.ajax({
                    url: "ajax/loadAvg.php",
                    method: "POST",
                    data: data,
                    success: function(data) {
                        $('.rightContainer').html(data);
                    }
                })
            }
            // adding review js logic 
            $("#addForm").submit(function(event) {
                event.preventDefault();

                let data = {
                    rid: $("#game_id").val(),
                    email: $(".email").val(),
                    content: $("#message").val()
                };
                $.ajax({
                    url: "ajax/addReview.php",
                    method: "POST",
                    data: data,
                    success: function(data, status) {
                        $("#message").val("");
                        load_comment();
                    }
                })

            })

            load_comment();

            function load_comment() {
                let data = {
                    rid: $("#game_id").val()
                };
                $.ajax({
                    url: "ajax/loadReview.php",
                    method: "POST",
                    data: data,
                    success: function(data) {
                        $('.allComments').html(data);
                    }
                })
            }
        })
    </script>

</body>

</html>