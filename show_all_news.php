<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
    $query = "SELECT * FROM news ORDER BY id DESC";
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
    <title>All News | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <style>
        #show_news {
            margin-top: 95px;
        }
        body {
          font-family: 'Poppins', sans-serif;
          font-size: 16px;
        }
        .heading-all-news {
            text-decoration: underline;
        }
        .parent-news {
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 15%);
            padding: 20px;
        }
        .parent-posted-on {
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .img-show-news {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .title-show-news {
            font-size: 25px;
            font-weight: bold;
            line-height: 2.5rem;
        }
        .description-show-news {
            font-size: 18px;
            text-align: justify;
            margin-top: 40px;
        }
        .img-gallery {
            cursor: pointer;
        }
        .every-top-bg {
          background: url('assets/images/every-page-top-bg.jpg');
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
          min-height: 200px;
          display: flex;
          align-items: center;
          justify-content: center;
      }
      .every-top-heading {
          font-size: 35px;
          font-weight: bold;
          color: white;
      }
        @media(max-width: 767px) {
            .img-gallery {
                margin-bottom: 30px;
            }
        }
        @media(max-width: 600px) {
         .every-top-bg {
             min-height: 120px;
         }
         .every-top-heading {
             font-size: 22px;
         }
      }
        </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section create news -->
    <section id="show_news" class="pd_top mb-5">
        <div class="every-top-bg">
            <h2 class="every-top-heading">All News</h2>
        </div>
    <div class="container mt-3 mb-3">
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-12 col-xs-12">
                <?php if(mysqli_num_rows($result) == 0) { ?>
                    <div class="text-center alert alert-warning">No news available!</div>
                <?php } else { ?>
                <?php while($row = mysqli_fetch_array($result)){ ?>
                <div class="parent-news mb-5">
                    <div>
                        <div><img  src="images/news-images/<?php echo $row['filename']; ?>" class="img-show-news"></div>
                    </div>
                    <div class="parent-posted-on">
                        <span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span>
                    </div>
                    <div>
                        <h2 class="title-show-news"><?php echo $row['title']; ?></h2>
                    </div>
                    <div>
                        <p class="description-show-news"><?php echo $row['description']; ?></p>
                    </div>
                    <div class="row parent-gallery">
                        <div class="col-md-4 col-sm-12 col-xs-12" id="imgOne"><img  src="images/news-images/<?php echo $row['sub_img_one']; ?>" class="img-show-news img-gallery" id="galleryImgOne"></div>
                        <div class="col-md-4 col-sm-12 col-xs-12" id="imgTwo"><img  src="images/news-images/<?php echo $row['sub_img_two']; ?>" class="img-show-news img-gallery" id="galleryImgTwo"></div>
                        <div class="col-md-4 col-sm-12 col-xs-12" id="imgThree"><img  src="images/news-images/<?php echo $row['sub_img_three']; ?>" class="img-show-news img-gallery" id="galleryImgThree"></div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </section><!-- section create news ends -->
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <?php include 'footer.php'; ?>
    <script src="./backToTop/backToTop.js"></script>
    <script src="./assets/js/img_gallery_show.js"></script>
</body>
</html>


<!-- Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Gallery</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="galleryModalInner" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <!-- The slideshow -->
            <div class="carousel-inner">
                <div class="carousel-item active" id="carouselSlideOne">  
                </div>
                <div class="carousel-item" id="carouselSlideTwo"> 
                </div>
                <div class="carousel-item" id="carouselSlideThree">
                </div>
            </div>
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#galleryModalInner" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#galleryModalInner" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
      </div>
    </div>
  </div>
</div>