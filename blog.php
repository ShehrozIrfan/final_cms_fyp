<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
//getting the first latest article
$filename_latest = '';
$title_latest = '';
$description_latest = '';
$date_latest = '';
$posted_by_id_latest = '';
$query = "SELECT * FROM blog_articles WHERE status= 'approved' ORDER BY id DESC LIMIT 1";
$result_latest = mysqli_query($connection, $query);
if(!$result_latest) {
    die("Query failed..." . mysqli_error($connection));
} else {
    while($row = mysqli_fetch_array($result_latest)) {
        $id_latest = $row['id'];
        $filename_latest = $row['filename'];
        $title_latest = $row['title'];
        $description_latest = $row['description'];
        $date_latest = $row['date'];
        $posted_by_id_latest = $row['posted_by_id'];
    }
}
?>
<?php
//getting all the articles
$query = "SELECT * FROM blog_articles WHERE status= 'approved' ORDER BY id DESC";
$result_all = mysqli_query($connection, $query);
if(!$result_all) {
    die("Query failed..." . mysqli_error($connection));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <link rel="stylesheet" href="./assets/styles/animations.css">

    <style>
        #blog {
            margin-top: 95px;
        }
        body {
            font-family: 'Poppins', sans-serif;
        }
        .blog-headline-parent {
            /* padding-top: 150px; */
            padding-top: 50px;
            padding-bottom: 20px;
            background: #F0F9FC;
        }
        .heading-blog {
            text-decoration: underline;
        }
        .blog-headline {
            display: flex;
            justify-content: space-between;
            flex-wrap: nowrap;
        }
        .btn-login {
            display: inline-block;
            border-radius: 30px;
            background-color: #ff9000;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 12px;
            padding: 6px 30px;
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
        .login-input {
            background: #F4F4F4;
        }
        .modal-heading {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-top: 30px;
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
        .login-signup-btn {
            color: #ff9000;
        }
        .login-signup-btn:hover {
            text-decoration: none;
            color: #ff9000;
        }
        .blog-write-login {
            display: flex;
            justify-content: space-between;
        }
        .parent-img-latest {
            border: 2px solid black;
            background: black;
            color: white;
            border-top-right-radius: 10px;
            border-top-left-radius: 10px;
        }
        .img-latest {
            max-width: 100%;
            height: auto;
        }
        .parent-text-latest {
            height: auto;
            background: black;
            color: white;
            padding: 20px;
        }
        .latest-title {
            padding: 20px;
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
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
        background: white;
        min-height: 400px;
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
        height: 200px;
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
    .every-top-bg {
        /* background: url('assets/images/every-page-top-bg.jpg'); */
        /* background: #4169E1; */
        background: #FFEED8;
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
        color: black;
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
    <?php include 'header.php' ?> <!-- header ends -->
    <section id="blog">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Blog</h2>
        </div>
        <div class="blog-headline-parent">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="text-right d-none">
                            <a href="signup_blog.php" class="btn-login"><span>Write</span></a>
                            <span class="mt-2 pl-2"><a href="login_blog.php" class="login-signup-btn"><span>Login</span></a></span>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php if(mysqli_num_rows($result_latest) == 0) { ?>
                        <div class="alert alert-danger mt-3 mb-3">No blog articles found!</div>
                        <?php } else { ?>
                        <div class="mt-5 mb-5">
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="parent-img-latest">
                                        <h2 class="latest-title"><?php echo $title_latest; ?></h2>
                                        <img src="images/article-images/<?php echo $filename_latest ?>" class="img-latest">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="parent-text-latest">
                                        <?php
                                            $query = "SELECT * FROM login_blog WHERE id = '$posted_by_id_latest'";
                                            $result_q = mysqli_query($connection, $query);
                                            if($result_q) {
                                                $row = mysqli_fetch_array($result_q);
                                        ?>
                                        <h5>By: <?php echo $row['username']; ?>, <?php echo $row['status']; ?> of <?php echo $row['department']; ?> department, at GIGCCL. </h5>
                                        <?php } ?>
                                        <h6>Posted on: <?php echo $date_latest; ?></h6>
                                        <a href="blog_specific.php?id=<?php echo $id_latest; ?>" class="btn-login" style="text-decoration: none;">
                                            <span>Read</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <?php $count = 0; ?>
                                <?php while($row = mysqli_fetch_array($result_all)) { ?>
                                    <?php $count++; ?>
                                    <?php if($count == 1) { continue; } ?>
                                <div class="col-md-4 col-sm-12 col-xs-12 mt-5 mb-5 index-news" >
                                    <div class="index-news-inner">
                                    <div>
                                        <div><img  src="images/article-images/<?php echo $row['filename']; ?>" class="img-index-news"></div>
                                        <h3 class="title-index-news"><?php echo $row['title']; ?></h3>
                                        <span class="date-index-news">Posted on <?php echo $row['date']; ?></span>
                                    </div>
                                        <a href="blog_specific.php?id=<?php echo $row['id'] ?>" class="btn-login" style="text-decoration: none;">
                                        <span>Read</span>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>
    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <script src="./backToTop/backToTop.js"></script>
</body>
</html>
