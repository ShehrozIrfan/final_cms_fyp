<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
    //Getting all news
    $msg = '';
    $msgClass = '';
    $row;
    $query = "SELECT * FROM news ORDER BY id DESC";
    $result = mysqli_query($connection, $query);
    //storing news for popup notifications
    $result_popup = mysqli_query($connection, $query);
    if(!$result || !$result_popup) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>
<?php
    //Getting all blog articles
    $query_blog = "SELECT * FROM blog_articles WHERE status= 'approved' ORDER BY id DESC";
    $result_blog = mysqli_query($connection, $query_blog);
    $result_blog_popup = mysqli_query($connection, $query_blog);
    if(!$result_blog || !$result_blog_popup) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>
<?php
    //Getting top 3 notices
    $query_notices = "SELECT * FROM notices ORDER BY id DESC LIMIT 3";
    $result_notices = mysqli_query($connection, $query_notices);
    $result_notices_popup = mysqli_query($connection, $query_notices);
    if(!$result_notices || !$result_notices_popup) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>
<?php
    //Getting top 3 careers
    $query_careers = "SELECT * FROM careers WHERE status='Open' ORDER BY id DESC LIMIT 3";
    $result_careers = mysqli_query($connection, $query_careers);
    if(!$result_careers) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GIGCCL</title>
    <!-- animate on scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <link rel="stylesheet" href="./assets/styles/animations.css">
    <style>
        /* Global */
        * {
        margin: 0px;
        padding: 0px;
        }
        #index {
            margin-top: 95px;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .pd_top {
            padding-top: 50px;
        }
        .clear {
            clear: both;
        }
        .parallax {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }
        /* ===================================================== */
        /* ================ INDEX FILE ========================= */
        /* Nav-bar */

        /* Section Parallax */


        .header_parallax {
            /* background-image: url('./assets/images/bg_parallax.png'); */
            min-height: 350px;
            display: flex;
            align-items: center;
        }
        .header_parallax h2 {
            font-size: 35px;
            line-height: 1.5em;
            font-weight: bold;
            color: black;
        }
        .header_parallax a {
            margin-top: 20px;
            padding: 10px 30px 10px 30px;
            border-radius: 10px;
        }

        /* Special button effect */
        .cta {
            position: relative;
            margin: auto;
            padding: 12px 18px;
            transition: all 0.2s ease;
            border: none;
            background: none;
        }

        .cta:before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            border-radius: 50px;
            background: #ff9000;
            width: 45px;
            height: 45px;
            transition: all 0.3s ease;
        }

        .cta span {
            position: relative;
            font-family: "Ubuntu", sans-serif;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 0.05em;
            color: black;
        }

        .cta svg {
            position: relative;
            top: 0;
            margin-left: 10px;
            fill: none;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke: black;
            stroke-width: 2;
            transform: translateX(-5px);
            transition: all 0.3s ease;
        }

        .cta:hover:before {
            width: 100%;
            background: #ff9000;
        }

        .cta:hover svg {
            transform: translateX(0);
        }

        .cta:active {
            transform: scale(0.95);
        }
        /* Section MS */

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            width: 100%;
            opacity: 0;
            transition: .5s ease-in;
            background-color: #343a40; /* #b05857  */
        }

        .b_1:hover .overlay {
            opacity: 1;
            border-radius: 10px;
        }
        .overlay h4  a {
            text-decoration: none;
            color: white;
        }

        .text {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }
        .parent-welcome-text {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        #ms_boxes {
            background: #f9f9f9;
            background-attachment: fixed;
        }
        #ms_boxes h2 {
            padding-top: 30px;
            padding-bottom: 20px;
            font-weight: bold;
        }
        .ms_img_1 {
            background-image: url('../images/accounts.png');
        }
        .ms_img_2 {
            background-image: url('../images/admission.png');
        }
        .ms_img_3 {
            background-image: url('../images/attendance.png');
        }
        .ms_img_4 {
            background-image: url('../images/exam.png');
        }
        .ms_img_5 {
            background-image: url('../images/hostel.png');
        }
        .ms_img_1:hover,.ms_img_2:hover,.ms_img_3:hover,.ms_img_4:hover,.ms_img_5:hover {
            opacity: 0.5;
        }
        .row_ms .box_ms {
            /* border: 2px solid coral; */
            max-height: 250px;
            margin-bottom: 30px;
        }
        .ms_img_div {
            height: 200px;
            background-position: center;
            background-repeat: no-repeat;
            border-radius: 10px;
        }
        .box_ms h4 {
            font-size: 18px;
            padding-top: 5px;
        }
        .box_ms a {
            color: black;
            text-decoration: none;
        }

        /* Section News */
        #s_news {
            padding-top: 30px;
            padding-bottom: 30px;
            /* background: #F0F9FC; */
            color: black;
        }
        .dummy {
            height: 1000px;
            border: 2px solid green;
        }
        #s_news h2 {
            font-weight: bold;
        }
        #s_news .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .news {
            padding: 5px;
            border: 1px solid grey;
            border-radius: 10px;
        }
        .news_date {
            padding: 10px;
            font-size: 12px;
            display: block;
        }
        .news_title {
            padding: 10px;
            font-size: 14px;
            display: block;
        }
        .index-news-inner {
            /* box-shadow: 0 .5rem 1rem rgba(0,0,0,.15); */
            background: white;
            color: black;
            /* min-height: 400px; */
            height: 550px;
            padding: 20px;
            border-radius: 10px;
        }
        .index-news-inner:hover {
            background: black;
            color: white;
            transition: background 2s;
        }
        .img-index-news {
            width: 100%;
            height: 350px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            border-radius: 10px;
        }
        .title-index-news {
            font-size: 18px;
            font-weight: bold;
            line-height: 1.5rem;
            padding-top: 20px;
        }
        .date-index-news {
            font-size: 15px;
        }
        .btn-index-news {
            margin-top: 10px;
        }
        .title-news {
            margin-top: 30px;
        }
        .description-news {
            margin-top: 30px;
        }

        .btn-login {
            display: inline-block;
            border-radius: 30px;
            background-color: #ff9000;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 12px;
            padding: 5px 20px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            outline: none;
        }

        .btn-login span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
            color: white;
        }

        .btn-login span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -15px;
            transition: 0.5s;
        }

        .btn-login:hover span {
            padding-right: 15px;
        }

        .btn-login:hover span:after {
            opacity: 1;
            right: 0;
        }
        .principal-img {
            width: 300px;
            height: 300px;
            border-radius: 5%;
        }
        .section-principal-message {
            background: #F0F9FC;
        }
        .principal-message {
            padding-top: 50px;
            padding-bottom: 50px;
        }
        .principal-message-text {
            display: flex;
            align-items: center;
            text-align: justify;
        }
        .btn-principal-message {
            padding: 10px 30px;
        }
        .btn-download-career {
            padding: 10px 15px;
            margin-top: 20px;
        }
        .index-news-inner-career {
            min-height: 200px;
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
            background: white;
            color: black;
            padding: 20px;
            border-radius: 10px;
        }
        .popup-fixed-notifications {
            position: fixed;
            bottom: 0px;
            z-index: 1;
        }
        .popup-fixed-news {
            position: fixed;
            bottom: 0px;
            z-index: 1;
            right: 0px;
        }
        #news-and-blogs {
            background: #F0F9FC;
        }
        /* Media Queries - for mobile responsive */
        @media(max-width: 1200px) {
            .navbar-toggler {
                /* margin-left: auto; */
            }
        }
        @media (max-width: 768px) {
            .box_ms h4 {
                font-size: 18px;
            }
            #ms_boxes h2, #s_news h2, #about h2, #contact h2 {
                font-size: 22px;
            }
            #about h3 {
                font-size: 20px;
            }

            #main_footer .row div {
                margin: 5px;
            }
            .news {
                margin: 5px;
            }
            .img-index-news {
                max-width: 100%;
                height: auto;
            }
            .index-news {
                margin: 20px;
            }
            .popup-notifications {
                margin-top: 50px;
            }
            .carousel-item-img {
                height: 45vh!important;
            }
            .popup-fixed-news {
                display: none;
            }
            .index-news-inner {
                min-height: 400px;
                height: auto;
            }
        }
        @media(max-width: 600px) {
            .popup-fixed-notifications {
                width: 80%;
            }
            .counter {
                font-size: 32px;
            }
        }
        @media (max-width: 560px) {
            .header_parallax {
                min-height: 450px;
            }
            .header_parallax h2 {
                font-size: 25px;
            }
            .header_parallax a {
                margin-top: 10px;
                font-size: 12px;
                padding: 5px 15px 5px 15px;
            }
            .ms_box {
                width: 80%;
                margin-left: auto;
                margin-right: auto;
            }
            .ms_box_container .ms_box{
                float: none;
            }

            .simple_footer,.f_icons {
                float: none;
            }
            .f_icons {
                margin-top: 0px;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
                margin-bottom: 15px;
            }
            .heading-news-and-updates {
                font-size: 22px;
            }
            .principal-img {
                width: 200px;
                height: 200px;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            .principal-message-heading {
                font-size: 22px;
            }
            .principal-message-text {
                margin-top: 25px;
                text-align: justify;
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->

    <div style="overflow-x:hidden;">
    <!-- notices pop up -->
    <div class="container popup-fixed-notifications">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="">
                    <?php if(mysqli_num_rows($result_notices_popup) != 0){ ?>
                        <?php while($row = mysqli_fetch_array($result_notices_popup)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="images/notice-images/<?php echo $row['filename']; ?>" style="text-decoration: none; color: black; font-size: 14px;" class="small" download>
                                    <?php echo $row['title'] ?><span class="pl-2" style="color: red; font-weight: bold;">(Notice)</span>
                                </a>
                                <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                        ×
                                </button>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div><!-- notices pop up ends -->
    <!-- news pop up -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12 popup-fixed-news">
                <?php if(mysqli_num_rows($result_popup) != 0){ ?>
                    <?php $popupNewsCount = 0; ?>
                    <?php while($row = mysqli_fetch_array($result_popup)) { ?>
                        <?php if($popupNewsCount == 3) { break; } ?>
                        <div class="alert alert-warning alert-dismissible">
                            <a href="news.php?id=<?php echo $row['id'] ?>" style="text-decoration: none; color: black; font-size: 14px; padding-left: 30px;" class="small" target="_blank">
                                <?php echo $row['title'] ?><span class="pl-2" style="color: black; font-weight: bold;">(News)</span>
                            </a>
                            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true" style="left: 0px;">
                                    ×
                            </button>
                        </div>
                        <?php $popupNewsCount = $popupNewsCount + 1; ?>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div><!-- news pop up ends -->

    <!-- Slider section -->
    <section id="index">
        <div id="topSlider" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#topSlider" data-slide-to="0" class="active"></li>
                <li data-target="#topSlider" data-slide-to="1"></li>
                <li data-target="#topSlider" data-slide-to="2"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="width:100%; height: 90vh;" src="assets/images/slider-img.jpg" class="carousel-item-img">
                </div>
                <div class="carousel-item">
                    <img style="width:100%; height: 90vh;" src="assets/images/slider-img-sports.jpeg" class="carousel-item-img">
                </div>
                <div class="carousel-item">
                    <img style="width:100%; height: 90vh;" src="assets/images/slider-img-mosque.jpeg" class="carousel-item-img">
                </div>
            </div>
            <!-- Left and right controls -->
            <!-- Use: filter: invert(1); to make icons color black -->
            <a class="carousel-control-prev" href="#topSlider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#topSlider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </section><!-- slider-section ends -->

    <!-- section parallax -->
    <section id="section-welcome-to-giccl">
        <div class="header_parallax parallax">
        <div class="container" data-aos="fade-right">
                <div class="row header_parallax_text">
                  <div class="col-md-6 col-sm-12 col-xs-12 parent-welcome-text">
                        <div>
                            <h2 class="">Welcome to GIGCCL</h2>
                            <p>GOVERNMENT ISLAMIA GRADUATE COLLEGE, CIVIL LINES, LAHORE is one of the first ranked institutions of the Punjab.</p>
                            <?php if(!isset($_SESSION['login_user'])): ?>
                            <a href="history.php" class="cta" style="text-decoration: none;">
                            <span>Brief History</span>
                            <svg width="15px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                            </a>
                            <?php endif ?>
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </section><!-- section parallax ends-->

    <!-- section principal message -->
    <section class="section-principal-message">
        <div class="container">
            <div class="principal-message">
                <h2 class="text-center font-weight-bold mb-5 principal-message-heading">Message of The Principal</h2>
                <div class="row">
                    <div class="col-md-4 col-sm-12 col-xs-12" data-aos="fade-right">
                        <img class="principal-img" src="assets/images/principal.jpeg">
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12" data-aos="fade-left" data-aos-delay="500">
                        <div class="principal-message-text">
                            <div>
                                <p>Dear Students,</p>
                                <p>Education is an epithet which distinguishes man from the rest of the creatures of Allah. The significance of learning cannot be overlooked as it helps man to explore new vistas and dimensions of life. It enables him to excel over his fellow beings and secure a place of distinction. As the human civilization is making great strides forward, it is offering man a highly competitive environment in which survival and well-being is for those who can move ahead at the required pace.</p>
                                <p>
                                    <a href="principal_message.php" class="btn-login mt-3 mb-3 btn-principal-message" style="text-decoration: none;">
                                        <span>Read More</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- section principal message ends -->

    <!-- section why giccl -->
    <?php include 'counter.php'; ?><!-- section why giccl ends -->

    <!-- section news and blogs -->
    <section id="news-and-blogs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- section news-->
                    <section id="s_news">
                        <div data-aos="fade-right">
                            <h3 class="text-center font-weight-bold mt-3 mb-5 heading-news-and-updates">News &amp; Updates</h3>
                            <div class="container">
                                <?php if(mysqli_num_rows($result)== 0){ ?>
                                    <div class="col-md-12 text-center alert alert-warning">No news found!</div>
                                <?php } else { ?>
                                <div id="newsSlider" class="carousel slide mt-4 mb-2" data-ride="carousel">
                                    <?php $countNews = 0; ?>
                                    <div class="carousel-inner">
                                        <?php while($row = mysqli_fetch_array($result)) { ?>
                                                <?php $countNews = $countNews + 1 ?>
                                                <div class="carousel-item<?php if($countNews == 1){ ?> active <?php } ?>">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="index-news-inner">
                                                            <div>
                                                                <div><img  src="images/news-images/<?php echo $row['filename']; ?>" class="img-index-news"></div>
                                                                <h3 class="title-index-news"><?php echo $row['title']; ?></h3>
                                                                <span class="date-index-news"><strong>Posted on:</strong> <?php echo $row['date']; ?></span>
                                                            </div>
                                                                <a href="news.php?id=<?php echo $row['id'] ?>" class="btn-login" style="text-decoration: none;">
                                                                <span>Read</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="text-center mt-3 mb-3">
                                    <a class="" href="#newsSlider" role="button" data-slide="prev">
                                        <img src='assets/images/slider-prev-icon.png' >
                                    </a>
                                    <a class="" href="#newsSlider" role="button" data-slide="next">
                                        <img src='assets/images/slider-next-icon.png' >
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="row justify-content-center mt-5">
                                <div class="col-md-12">
                                    <div class="text-center mt-3 mb-3">
                                        <a href="show_all_news.php" class="cta" style="text-decoration: none;">
                                            <span>Click Here To View All</span>
                                            <svg width="15px" height="10px" viewBox="0 0 13 10">
                                            <path d="M1,5 L11,5"></path>
                                            <polyline points="8 1 12 5 8 9"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- section news ends -->
                </div>
                <div class="col-md-6">
                    <!-- section news-->
                    <section id="s_news">
                        <div data-aos="fade-left">
                            <h3 class="text-center font-weight-bold mt-3 mb-5 heading-news-and-updates">Blog Articles</h3>
                            <div class="container" data-aos="fade-left">
                                <?php if(mysqli_num_rows($result_blog)== 0){ ?>
                                    <div class="col-md-12 text-center alert alert-warning">No blog articles found!</div>
                                <?php } else { ?>
                                <div id="blogSlider" class="carousel slide mt-4 mb-2" data-ride="carousel">
                                    <?php $countBlog = 0; ?>
                                    <div class="carousel-inner">
                                        <?php while($row = mysqli_fetch_array($result_blog)) { ?>
                                                <?php $countBlog = $countBlog + 1 ?>
                                                <div class="carousel-item<?php if($countBlog == 1){ ?> active <?php } ?>">
                                                    <div class="row d-flex justify-content-center">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="index-news-inner">
                                                            <div>
                                                                <div><img  src="images/article-images/<?php echo $row['filename']; ?>" class="img-index-news"></div>
                                                                <h3 class="title-index-news"><?php echo $row['title']; ?></h3>
                                                                <span class="date-index-news"><strong>Posted on:</strong> <?php echo $row['date']; ?></span>
                                                            </div>
                                                                <a href="blog_specific.php?id=<?php echo $row['id'] ?>" class="btn-login" style="text-decoration: none;">
                                                                    <span>Read</span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="text-center mt-3 mb-3">
                                    <a class="" href="#blogSlider" role="button" data-slide="prev">
                                        <img src='assets/images/slider-prev-icon.png' >
                                    </a>
                                    <a class="" href="#blogSlider" role="button" data-slide="next">
                                        <img src='assets/images/slider-next-icon.png' >
                                    </a>
                                </div>
                                <?php } ?>
                                <div class="row justify-content-center mt-5">
                                <div class="col-md-12">
                                    <div class="text-center mt-3 mb-3">
                                        <a href="show_all_news.php" class="cta" style="text-decoration: none;">
                                            <span>Click Here To Read All</span>
                                            <svg width="15px" height="10px" viewBox="0 0 13 10">
                                            <path d="M1,5 L11,5"></path>
                                            <polyline points="8 1 12 5 8 9"></polyline>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </section><!-- section news ends -->
                </div>
            </div>
        </div>
    </section><!-- section news and blogs ends -->

    <!-- section careers-->
    <section id="s_news">
      <h3 class="text-center font-weight-bold mt-3 mb-5 heading-news-and-updates">Careers</h3>
      <div class="container" data-aos="fade-left">
          <div class="row justify-content-center">
            <?php if(mysqli_num_rows($result_careers)== 0){ ?>
                <div class="col-md-6 text-center alert alert-warning">No news found!</div>
            <?php } else { ?>
            <?php while($row = mysqli_fetch_array($result_careers)) { ?>
              <div class="col-md-4 col-sm-12 col-xs-12 index-news" >
                <div class="index-news-inner-career">
                  <div>
                    <h3 class="title-index-news"><?php echo $row['title']; ?></h3>
                    <span class="date-index-news d-block"><strong>Posted on:</strong> <?php echo $row['date']; ?></span>
                    <span class="date-index-news d-block"><strong>Last date:</strong> <?php echo $row['last_date']; ?></span>
                    <span class="date-index-news d-block"><strong>Status:</strong> <?php echo $row['status']; ?></span>
                    <div><a class="btn-login btn-download-career" style="text-decoration: none;" href="images/career-images/<?php echo $row['filename']; ?>" class="img-index-news" download><span>Download Details</span></a></div>
                  </div>
                </div>
              </div>
            <?php } ?>
            <?php } ?>
          </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-6">
            <div class="text-center mt-3 mb-3">
                <a href="careers.php" class="cta" style="text-decoration: none;">
                    <span>Click Here To View All</span>
                    <svg width="15px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- section careers ends -->

    </div>
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>
    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <!-- animate on scroll -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>

    <script src="./backToTop/backToTop.js"></script>
    <script src="./assets/js/counter.js"></script>
</body>
</html>
