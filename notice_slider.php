<?php include 'session.php' ?>
<?php 
if(isset($_SESSION['login_user'])) {
    header("location: show_notice.php");
}
?>
<?php
    //Showing all news
    $msg = '';
    $msgClass = '';
    $query = "SELECT * FROM notices ORDER BY id DESC LIMIT 5";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Notices | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #show_news {
            margin-top: 150px;
        }
        .img-show-notice {
            width: 600px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .carousel-inner img {
            margin-top: 20px;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section create news -->
    <section id="show_news" class="pd_top mb-5">
        <div class="container">
            <div class="">
                <h3 class="text-center font-weight-bold mt-3 mb-3">Notice Board</h2>
                <div class="row justify-content-center">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if(mysqli_num_rows($result) == 0) { ?>
                            <div class="text-center alert alert-warning">No notice available!</div>
                        <?php } else { ?>
                            <div id="noticeCarousel" class="carousel slide" data-ride="carousel">
                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                    <li data-target="#noticeCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#noticeCarousel" data-slide-to="1"></li>
                                    <li data-target="#noticeCarousel" data-slide-to="2"></li>
                                    <li data-target="#noticeCarousel" data-slide-to="3"></li>
                                    <li data-target="#noticeCarousel" data-slide-to="4"></li>
                                </ul>
                                <!-- The slideshow -->
                                <div class="carousel-inner">
                                    <?php
                                    $count = 0;
                                        while ($row = mysqli_fetch_array($result)) { ?>
                                        <?php if($count == 0){ ?>
                                            <div class="carousel-item active">
                                        <?php } else { ?>
                                            <div class="carousel-item">
                                        <?php } ?>
                                            <a href="images/notice-images/<?php echo $row['filename']; ?>" title="click to download the notice" download><img  src="images/notice-images/<?php echo $row['filename']; ?>" class="img-show-notice"></a>
                                            <div class="carousel-caption d-none">
                                                <a href="images/notice-images/<?php echo $row['filename']; ?>" title="click to download the notice" class="btn btn-warning " download>Download</a>
                                            </div>
                                        </div>
                                        <?php $count = $count + 1; ?>
                                    <?php } ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#noticeCarousel" data-slide="prev">
                                    <span class="fa fa-chevron-circle-left" style="color: black;"></span>
                                </a>
                                <a class="carousel-control-next" href="#noticeCarousel" data-slide="next">
                                    <span class="fa fa-chevron-circle-right" style="color: black;"></span>
                                </a>
                                </div>
                            
                            </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section><!-- section create news ends -->

    <?php include 'footer.php'; ?>
</body>
</html>



