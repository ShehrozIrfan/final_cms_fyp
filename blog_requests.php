<?php include 'session.php' ?>
<?php
if(!isset($_SESSION['login_user']))
{
  header("location: index.php");
}
?>
<?php 
$query = "SELECT * FROM blog_articles WHERE status = 'pending' ORDER BY id DESC";
$result_pen = mysqli_query($connection,  $query);

if(!$result_pen) {
    die("Query failed..." . mysqli_error($connection));
}

?>
<?php 
$query_ap = "SELECT * FROM blog_articles WHERE status = 'approved' ORDER BY id DESC";
$result_ap = mysqli_query($connection,  $query_ap);

if(!$result_ap) {
    die("Query failed..." . mysqli_error($connection));
}

?>
<?php 
$query_dc = "SELECT * FROM blog_articles WHERE status = 'declined' ORDER BY id DESC";
$result_dc = mysqli_query($connection,  $query_dc);

if(!$result_dc) {
    die("Query failed..." . mysqli_error($connection));
}

?>
<?php 
$msg = '';
$msgClass = '';
if(isset($_GET['ap_id'])) {
    $approve_id = $_GET['ap_id'];
    $user_id = $_GET['user_id'];
    $query = "UPDATE blog_articles SET ";
    $query .= "status = 'approved' ";
    $query .= "WHERE id = $approve_id";

    $result_approved = mysqli_query($connection, $query);
    if(!$result_approved) {
        die("Query failed...!" . mysqli_error($connection));
    } else {
        $query = "SELECT email FROM login_blog WHERE id = '$user_id'";
        $result_user = mysqli_query($connection, $query);
        if(!$result_user) {
            die("Query failed...!" . mysqli_error($connection));
        } else {
            //send email
            $row = mysqli_fetch_array($result_user);
            $username = "GIGCCL";
            $toEmail = $row['email'];
            $subject = "Article published!";
            $body = '<h2>Hi there!</h2>
                    <p>Your article has been approved by the admin!</p>
                    <p>You can now see your article on Blogs page of GIGCCL.</p>
                    <p>Thanks.</p>
                    <p>For any queries feel free to contact us at:</p>
                    <p>giccllahore@gmail.com</p>
            ';
            //Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
            //Additional headers
            $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
            if(mail($toEmail, $subject, $body, $headers)) {
                $msg = 'Article published successfully and email has been sent!';
                $msgClass = 'success';
                header("Refresh:1; url=blog_requests.php");
            } else {
                $msg = "Sorry something went wrong! Please try again.";
                $msgClass = "danger";
            }
        }
        
    }
}

?>

<?php 

if(isset($_GET['dc_id'])) {
    $decline_id = $_GET['dc_id'];
    $user_id = $_GET['user_id'];
    $query = "UPDATE blog_articles SET ";
    $query .= "status = 'declined' ";
    $query .= "WHERE id = $decline_id";

    $result_dc = mysqli_query($connection, $query);
    if(!$result_dc) {
        die("Query failed...!" . mysqli_error($connection));
    }  else{
        $query = "SELECT email FROM login_blog WHERE id = '$user_id'";
        $result_user = mysqli_query($connection, $query);
        if(!$result_user) {
            die("Query failed...!" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_array($result_user);
            //send email
            $username = "GIGCCL";
            $toEmail = $row['email'];
            $subject = "Article not approved!";
            $body = '<h2>Hi there!</h2>
                    <p>We are sorry to say that, the article that you posted on Blog(GIGCCL), is not approved by the admin.</p>
                    <p>For any queries feel free to contact us at:</p>
                    <p>giccllahore@gmail.com</p>
            ';
            //Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
            //Additional headers
            $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
            if(mail($toEmail, $subject, $body, $headers)) {
                $msg = 'Article declined successfully and email has been sent!';
                $msgClass = 'success';
                header("Refresh:1; url=blog_requests.php");
            } else {
                $msg = "Sorry something went wrong! Please try again.";
                $msgClass = "danger";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Requests</title>
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
        @media(max-width: 600px) {
            .img-show-news {
                max-width: 100%;
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
                <h2 class="text-center font-weight-bold mt-3 mb-3">Blog Requests</h2>
                <div class="row justify-content-center">
                    <div class="col-md-10 col-sm-12 col-xs-12">
                        <?php if($msg != '') { ?>
                            <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible mt-2">
                            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                ×
                            </button>
                            <?php echo $msg ?>
                            </div>
                        <?php } ?>
                        <h4 class="text-center"><u>Pending Blog Requests</u></h4>
                        <?php if(mysqli_num_rows($result_pen) == 0){ ?>
                            <div class="alert alert-warning text-center mt-3 mb-3">No pending blog requests found!</div>
                        <?php } else { ?>
                            <?php
                                while ($row = mysqli_fetch_array($result_pen)) { ?>
                                <?php 
                                $posted_by_id = $row['posted_by_id'];
                                $query = "SELECT * FROM login_blog WHERE id = '$posted_by_id'";
                                $result_q = mysqli_query($connection, $query);
                                $row_user = mysqli_fetch_array($result_q);
                                ?>
                                    <table class="table table-bordered">
                                    <tr class="thead-dark">
                                        <th><span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span></th>
                                    </tr>
                                    <tr class="">
                                        <th><span class="font-weight-bold">Posted by: </span><span class="small"><?php echo $row_user['username']; ?>, <?php echo $row_user['status']; ?> of <?php echo $row_user['department']; ?> department, at GIGCCL.</span></th>
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
                                    <tr>
                                        <td><a href="blog_requests.php?ap_id=<?php echo $row['id']; ?>&user_id=<?php echo $row['posted_by_id']; ?> " class="btn btn-warning btn-sm btn-block" ><i class="fa fa-check pr-2"></i>Approve Article</a></td>
                                    </tr>
                                    <tr>
                                        <td><a href="blog_requests.php?dc_id=<?php echo $row['id']; ?>&user_id=<?php echo $row['posted_by_id']; ?> " class="btn btn-danger btn-sm btn-block" ><i class="fa fa-times pr-2"></i>Decline Article</a></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        <?php } ?>
                        <h4 class="text-center"><u>Approved Blog Requests</u></h4>
                        <?php if(mysqli_num_rows($result_ap) == 0){ ?>
                            <div class="alert alert-warning text-center mt-3 mb-3">No approved blog requests found!</div>
                        <?php } else { ?>
                            <?php
                                while ($row = mysqli_fetch_array($result_ap)) { ?>
                                    <?php 
                                    $posted_by_id = $row['posted_by_id'];
                                    $query = "SELECT * FROM login_blog WHERE id = '$posted_by_id'";
                                    $result_q = mysqli_query($connection, $query);
                                    $row_user = mysqli_fetch_array($result_q);
                                    ?>
                                    <table class="table table-bordered">
                                    <tr class="thead-dark">
                                        <th><span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span></th>
                                    </tr>
                                    <tr class="">
                                        <th><span class="font-weight-bold">Posted by: </span><span class="small"><?php echo $row_user['username']; ?>, <?php echo $row_user['status']; ?> of <?php echo $row_user['department']; ?> department, at GIGCCL.</span></th>
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
                                    <tr>
                                        <td><a href="blog_requests.php?dc_id=<?php echo $row['id']; ?>&user_id=<?php echo $row['posted_by_id']; ?> " class="btn btn-danger btn-sm btn-block" ><i class="fa fa-times pr-2"></i>Decline Article</a></td>
                                    </tr>
                                </table>
                            <?php } ?>
                        <?php } ?>
                        <h4 class="text-center"><u>Declined Blog Requests</u></h4>
                        <?php if(mysqli_num_rows($result_dc) == 0){ ?>
                            <div class="alert alert-warning text-center mt-3 mb-3">No declined blog requests found!</div>
                        <?php } else { ?>
                            <?php
                                while ($row = mysqli_fetch_array($result_dc)) { ?>
                                    <?php 
                                    $posted_by_id = $row['posted_by_id'];
                                    $query = "SELECT * FROM login_blog WHERE id = '$posted_by_id'";
                                    $result_q = mysqli_query($connection, $query);
                                    $row_user = mysqli_fetch_array($result_q);
                                    ?>
                                    <table class="table table-bordered">
                                    <tr class="thead-dark">
                                        <th><span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span></th>
                                    </tr>
                                    <tr class="">
                                        <th><span class="font-weight-bold">Posted by: </span><span class="small"><?php echo $row_user['username']; ?>, <?php echo $row_user['status']; ?> of <?php echo $row_user['department']; ?> department, at GIGCCL.</span></th>
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
                                    <tr>
                                        <td><a href="blog_requests.php?ap_id=<?php echo $row['id']; ?>&user_id=<?php echo $row['posted_by_id']; ?> " class="btn btn-warning btn-sm btn-block" ><i class="fa fa-check pr-2"></i>Approve Article</a></td>
                                    </tr>
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
