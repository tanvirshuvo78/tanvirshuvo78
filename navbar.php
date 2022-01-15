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
    <title>Games Gallery</title>
</head>

<style>
    #navbarNav {
        transform: translateX(-104%);

    }

    .animate {
        transform: translateX(0) !important;
        transition: 5s;
    }
</style>

<body>

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">

            <a href="index.php"> <img src="img/Logo.png" alt="Logo" style="width:3rem;border-radius:50%;margin-left: -4rem;"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link smoothScroll">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="latestGames.php" class="nav-link smoothScroll">Latest Games</a>
                    </li>

                    <li class="nav-item">
                        <a href="gallery.php" class="nav-link smoothScroll">All Games</a>
                    </li>
                    <li class="nav-item review-items">
                        <a href="#" class="nav-link smoothScroll review1">Reviews</a>
                        <div id="dropdown1" style="display: none;">
                            <a href="gbReviews.php">Game-Bench Reviews</a>
                            <a href="reviews.php">User Reviews</a>
                        </div>
                    </li>


                    <li class="nav-item">
                        <a href="contact.php" class="nav-link smoothScroll">Contact</a>
                    </li>
                </ul>


            </div>

        </div>
    </nav>

    <script src="JS/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#navbarNav').addClass('animate');

            $(".review1").mouseenter(function() {
                $("#dropdown1").show();
            })

            $("#dropdown1").on('mouseleave', function() {
                $("#dropdown1").hide();
            })



        })
    </script>

</body>



</html>