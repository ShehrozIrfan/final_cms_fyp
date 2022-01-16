<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>

<?php 
 $id = $_GET['id'];
 $query = "SELECT * FROM blog_articles WHERE id = '$id'";
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
    <title>Article | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        #show_news {
            margin-top: 20px;
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
        @media(max-width: 767px) {
            .img-gallery {
                margin-bottom: 30px;
            }
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
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <?php $row = mysqli_fetch_array($result) ?>
                <div class="parent-news">
                    <div>
                        <div>
                            <h2 class="title-show-news"><?php echo $row['title']; ?></h2>
                        </div>
                        <div><img  src="images/article-images/<?php echo $row['filename']; ?>" class="img-show-news"></div>
                    </div>
                    <div class="parent-posted-on">
                        <?php
                            $id = $row['posted_by_id'];
                            $query = "SELECT * FROM login_blog WHERE id = '$id'";
                            $result_q = mysqli_query($connection, $query);
                            if($result_q) {
                                $row_q = mysqli_fetch_array($result_q);
                        ?>
                        <h5>By: <?php echo $row_q['username']; ?>, <?php echo $row_q['status']; ?> of <?php echo $row_q['department']; ?> department, at GIGCCL. </h5>
                        <?php } ?>  
                        <span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span>
                    </div>
                    <div>
                        <p class="description-show-news"><?php echo $row['description']; ?></p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- section create news ends -->
    <?php include 'footer.php'; ?>

    <script src="./assets/js/img_gallery.js"></script>
</body>
</html>
