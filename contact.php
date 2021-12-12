<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
$msg = '';
$msgClass = '';
if(isset($_POST['contact'])) {
    //getting values
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    if(!empty(trim($name)) && !empty(trim($email)) && !empty(trim($message))) {
        //checking for valid email
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "Please use a valid email";
            $msgClass = "alert-danger";
        } else {
            //send email
            $toEmail = "ubaidulhassan020@gmail.com";
            $subject = "Contact request from " . $name;
            $body = '<h2>Contact Request</h2>
                     <h4>Name: </h4><p>' . $name . '</p>
                     <h4>Email: </h4><p>' . $email . '</p>
                     <h4>Message: </h4><p>' . $message . '</p>
            ';
            //Email headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
            //Additional headers
            $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

            if(mail($toEmail, $subject, $body, $headers)) {
                $msg = "Your message has been sent";
                $msgClass = "success";
            } else {
                $msg = "Sorry! something went wrong. Please try again.";
                $msgClass = "danger";
                $name = '';
                $email = '';
                $message = '';
            }
        }
    } else {
        //Failed
        $msg = "Please fill in all fields";
        $msgClass = "danger";
    }

}
?>
<?php 
$msg_unsub = '';
$msgClass_unsub = '';
if(isset($_GET['unsubscribe'])) {
    $email = $_GET['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = "SELECT email FROM subscribe_notice WHERE email = '$email'";
        $result_find = mysqli_query($connection, $query);

        if(!$result_find) {
            die("Query failed" . mysqli_error($connection) . mysqli_errno($connection));
        } else {
            $row = mysqli_fetch_array($result_find);
            if($row == '') {
                $msg_unsub = "No subscription found against the given email!";
                $msgClass_unsub = "warning";
                header("Refresh:1; url=contact.php");
            } else {
                $query = "DELETE FROM subscribe_notice WHERE email = '$email' ";
                $result_unsub = mysqli_query($connection, $query);

                if(!$result_unsub) {
                    die("Query failed" . '<br/>' . mysqli_error($connection) . '<br/>' . mysqli_errno($connection));
                } else {
                    //send email
                    $username = "GIGCCL";
                    $toEmail = $email;
                    $subject = "Notice Board Unsubscribed";
                    $body = '<h2>Hi there!</h2>
                            <p>You are successfully unsubscribed from notice board GIGCCL!</p>
                            <p>You will not be able to receive any updates whenever a new notice is posted.</p>
                            <p>To subscribe again, please visit notice board page on GIGCCL website.</p>
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
                        $msg_unsub = "Successfully unsubscribed from notice board!";
                        $msgClass_unsub = "success";
                        header("Refresh:1; url=contact.php");
                    } else {
                        $msg_unsub = "Sorry something went wrong, please try again!";
                        $msgClass_unsub = "danger";
                    }
                }
            }
        }
    } else {
        $msg_unsub = "Please enter a valid email address";
        $msgClass_unsub = "danger";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | GICCL</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        /* Global */
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
        .pd_top {
            padding-top: 100px;
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
        /* ================ Contact PAGE ========================= */
        #contact {
            padding-top: 150px;
            background: #F0F9FC;
        }
        .contact_text {
            margin-top: 30px;
            font-size: 15px;
        }
        .mail-field {
            color: black;
        }

        .bg-contact-info {
            background: #F0F9FC;
            padding-bottom: 50px;
        }
        .btn-send {
            display: inline-block;
            border-radius: 30px;
            background-color: #ff9000;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 17px;
            padding: 16px 40px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            outline: none;
        }
        
        .btn-send span {
            cursor: pointer;
            display: inline-block;
            position: relative;
            transition: 0.5s;
        }

        .btn-send span:after {
            content: '»';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -15px;
            transition: 0.5s;
        }

        .btn-send:hover span {
            padding-right: 15px;
        }

        .btn-send:hover span:after {
            opacity: 1;
            right: 0;
        }
        .bg-get-in-touch {
            background: url('./assets/images/bg-get-in-touch.png');
            background-size:cover;
            background-repeat: no-repeat;
            min-height: 500px;
            padding-top: 100px;
            padding-bottom: 30px;
        }
        /* Media Queries - for mobile responsive */
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

        }

        @media (max-width: 560px) {
            .header_parallax {
                height: 450px;
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

    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->
    <!-- contact section -->
    <section id="contact" class="">
    <div class="container pb-4">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <?php if($msg_unsub != '') { ?>
                        <div class="alert alert-<?php echo $msgClass_unsub ?> text-center alert-dismissible">
                        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                            ×
                        </button>
                        <?php echo $msg_unsub ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="bg-contact-info">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><h3 class="text-center font-weight-bold">Contact Us</h3></li>
                            <li class="list-group-item">
                                <i class="fa fa-map-marker pr-2" aria-hidden="true"></i>Govt. Islamia College, Civil Lines Lahore, Pakistan</li>
                            <li class="list-group-item">
                                <i class="fa fa-phone pr-2" aria-hidden="true"></i>042-99210676-7</li>
                            <li class="list-group-item"><i class="fa fa-envelope pr-2" aria-hidden="true"></i><a href="mailto:giccllahore@gmail.com" class="mail-field">giccllahore@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-get-in-touch">
            <div class="container">
                <h2 class="text-center font-weight-bold mt-3 mb-3">Get In Touch</h2>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                    <?php if($msg != '') { ?>
                        <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                            ×
                        </button>
                        <?php echo $msg ?>
                        </div>
                    <?php } ?>
                        <form action="./contact.php" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="<?php echo isset($_POST['name'])? $name : ''; ?>" required>
                            </div>
                            <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="<?php echo isset($_POST['email'])? $email : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your message" required><?php echo isset($_POST['message'])? $message : ''; ?></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="contact" class=" btn-send"><span>Send Message</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-3">
                    <h3 class="text-center font-weight-bold mt-3 mb-3">Unsubscribe Notice Board</h3>
                    <form method="get">
                        <div class="subscribe-notice">
                            <div class="form-group w-100"><input type="email" placeholder="Enter email to unsubscribe" class="form-control" name="email" required></div>
                            <div class=""><button onClick="javascript: return confirm('UnSubscribe to notice board means that you will not get an update whenever a new notice is posted. Do you want to unsubscribe from notice board?')" type="submit" class="btn btn-subscribe" name="unsubscribe">Unsubscribe</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- contact section ends -->

    <?php include 'footer.php' ?>
</body>
</html>
