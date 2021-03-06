<?php include 'session.php' ?>
<?php 
if(isset($_SESSION['login_user'])) {
    header("location: show_notice.php");
}

if(isset($_SESSION['login_blog_user'])) {
    header("location: dashboard.php");
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

<?php 
$msg = '';
$msgClass = '';
if(isset($_GET['subscribe'])) {
    $email = $_GET['email'];
    $date = date('Y-m-d');

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "INSERT INTO subscribe_notice (email, date) ";
        $query .= "VALUES('$email', '$date')";
        $result_s = mysqli_query($connection, $query);

        if(!$result_s) {
            if(mysqli_errno($connection) == 1062) {
                $msg = "Entered email is already subscribed to notice board!";
                $msgClass = "warning";
                header("Refresh:1; url=notice.php");
            } else {
                die("Query failed" . '<br/>' . mysqli_error($connection) . '<br/>' . mysqli_errno($connection));
            }
        } else {
            //send email
            $username = "GIGCCL";
            $toEmail = $email;
            $subject = "Subscription Notice Board Success";
            $body = '<h2>Hi there!</h2>
                     <p>You are successfully subscribed to notice board GIGCCL!</p>
                     <p>You will be notified whenever a new notice will be posted.</p>
                     <p>If you want to unsubscribe, please visit the contact us page!</p>
                     <p>Thanks.</p>
                     <p>Stay tuned.</p>
                     <p>For any queries feel free to contact us at:</p>
                     <p>giccllahore@gmail.com</p>
            ';
            //Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
            //Additional headers
            $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
            if(mail($toEmail, $subject, $body, $headers)) {
                $msg = "Successfully subscribed to notice board!";
                $msgClass = "success";
                header("Refresh:1; url=notice.php");
            } else {
                $msg = "Sorry something went wrong, please try again!";
                $msgClass = "danger";
            }
        }
    } else {
        $msg = "Please enter a valid email address";
        $msgClass = "danger";
    }
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
    <link rel="stylesheet" href="./backToTop/backToTop.css">
    
    <style>
        #show_news {
            margin-top: 150px;
        }
        .img-show-notice {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        .subscribe-notice {
            display: flex;
            justify-content: center;
        }
        .w-100 {
            width: 100%;
        }
        .btn-subscribe {
            background: #ff9000;
            color: white;
        }
        .btn-login {
        display: inline-block;
        border-radius: 30px;
        background-color: #ff9000;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 15px;
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
            content: '??';
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
                    <div class="col-md-8 col-sm-12 col-xs-12 text-center">
                        <?php if($msg != '') { ?>
                            <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                ??
                            </button>
                            <?php echo $msg ?>
                            </div>
                        <?php } ?>
                    </div>
                </diV>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <?php if(mysqli_num_rows($result) == 0) { ?>
                            <div class="text-center alert alert-warning">No notice available!</div>
                        <?php } else { ?>
                            <?php while($row = mysqli_fetch_array($result)) { ?>
                            <div class="mb-5">
                                <div>
                                    <div><img  src="images/notice-images/<?php echo $row['filename']; ?>" class="img-show-notice"></div>
                                </div>
                                <div class="parent-posted-on">
                                    <span class="font-weight-bold">Posted on: </span><span class="small"><?php echo $row['date']; ?></span>
                                </div>
                                <div class="mt-3">
                                    <a href="images/notice-images/<?php echo $row['filename']; ?>" title="click to download the notice" download class="btn-login"><span>Download</span></a>
                                </div>
                                <hr>
                            </div>
                            <?php } ?>
                        <?php } ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-sm-12 col-xs-12">
                <form method="get">
                            <div class="subscribe-notice">
                                <div class="form-group w-100"><input type="email" placeholder="Enter email to subscribe" class="form-control" name="email" required></div>
                                <div class=""><button onClick="javascript: return confirm('Subscribe to notice board means that whenever the new notice will be posted you will be get notified. Do you want to subscribe to notice board?')" type="submit" class="btn btn-subscribe" name="subscribe">Subscribe</button></div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </section><!-- section create news ends -->

    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <?php include 'footer.php'; ?>
    <script src="./backToTop/backToTop.js"></script>
</body>
</html>



