<?php include 'session.php' ?>
<?php
if(!isset($_SESSION['login_blog_user']))
{
  header("location: index.php");
}
?>
<?php 
$posted_by_id = $_SESSION['login_blog_id'];
$query = "SELECT * FROM blog_articles WHERE status = 'approved' AND posted_by_id = '$posted_by_id' ORDER BY id DESC";
$result = mysqli_query($connection, $query);

if(!$result) {
    die("Query failed..." . mysqli_error($connection));
}

?>
<?php
//Delete news
$msg = '';
$msgClass = '';
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query_d = "DELETE FROM blog_articles WHERE id = $id";
    $result_d = mysqli_query($connection, $query_d);
    if(!$result_d) {
        die("Query Failed." . mysqli_error($connection));
    } else {
        $msg = "Article deleted successfully!";
        $msgClass = "success";
        header("Refresh:1; url=published_articles.php");
    }
}
?>
<?php
//Update news
$updated_article = false;
if(isset($_GET['edit'])) {
    $updated_article = true;
    $id = $_GET['edit'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Published Articles</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <style>
        #profile {
            margin-top: 100px;
        }
        .container-custom {
            width: 85%;
            margin-left: auto;
        }
        .container-inner {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        .img-show-news {
            width: 500px;
            height: auto;
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
        }
        @media(max-width: 992px) {
            .container-custom {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
            .container-inner {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    
    <section id="profile">
        <div class="container-custom">
            <div class="container-inner">
                <h2 class="text-center font-weight-bold mt-3 mb-3">Published Articles</h2>
                <div class="row justify-content-center">
                <div class="col-md-10 col-sm-12 col-xs-12">
                        <?php if($msg != '') { ?>
                            <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                ×
                            </button>
                            <?php echo $msg ?>
                            </div>
                        <?php } ?>
                        <?php if(mysqli_num_rows($result) == 0){ ?>
                        <div class="alert alert-warning">No approved articles found!</div>
                        <?php } else { ?>
                            <?php
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <table class="table table-bordered">
                                    <tr class="thead-dark">
                                        <th><span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div><img  src="images/article-images/<?php echo $row['filename']; ?>" class="img-show-news"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><h2 class="title-show-news"><?php echo $row['title']; ?></h2></td>
                                    </tr>
                                    <tr>
                                        <td><p class="description-show-news"><?php echo $row['description']; ?></p></td>
                                    </tr>
                                    <?php if(isset($_SESSION['login_blog_user'])): ?>
                                    <tr>
                                        <td>
                                            <a href="post_article.php?edit=<?php echo $row['id']; ?>" class="btn btn-warning btn-block"><i class="fa fa-pencil mr-2"></i>Edit</a>
                                            <a onClick="javascript: return confirm('Please confirm article deletion!');" href="published_articles.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger btn-block"><i class="fa fa-trash-o mr-2"></i>Delete</a>
                                        </td>
                                    </tr>
                                <?php endif ?>
                                </table>
                                <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <script src="./backToTop/backToTop.js"></script>
</body>
</html>
