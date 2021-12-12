<?php include 'session.php'; ?>

<?php
if(!isset($_SESSION['login_user']))
{
  header("location: index.php");
  die();
}
?>
<?php
$msg = '';
$msgClass = '';
if(isset($_POST['create'])) {
    $filename = $_FILES["uploadImage"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $filename = time() . '_' . $filename;
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/notice-images/".$filename;
    $date = date('Y-m-d');

    $allowed_extensions = array('png', 'jpeg', 'jpg', 'gif');

    if($_FILES["uploadImage"]["name"] == '') {
        $msg = "Please select a file!";
        $msgClass = "danger";
    }
    else if(!in_array($ext, $allowed_extensions)) {
        $msg = "Invalid file. Only png, jpeg, jpg, gif are allowed.";
        $msgClass = "danger";
    } else {
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO notices (filename, date, created_by_id) VALUES('$filename', '$date', '$user_id')";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("Query Failed .. !" . mysqli_error($connection));
            // $msg = "Please select a file";
            // $msgClass = "warning";
        }else {
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder))  {
                //sending emails to all subscribers
                $query = "SELECT * FROM subscribe_notice";
                $result_send = mysqli_query($connection, $query);
                if(!$result_send) {
                    die("Query failed" . mysqli_error($connection));
                } else {
                    if(mysqli_num_rows($result_send)== 0) {
                        $msg = "Notice posted successfully!";
                        $msgClass = "success";
                        header("Refresh:1; url=post_notice.php");
                    } else {
                        $username = "GIGCCL";
                        $subject = "New Notice Posted";
                        $body = '<h2>Hi there!</h2>
                                 <p>A new notice is posted on GIGCCL.</p>
                                 <p>You can visit the GIGCCL notice board to see the latest notice.</p>
                                 <p>Thanks!</p>
                                 <p>For any queries feel free to contact us at:</p>
                                 <p>giccllahore@gmail.com</p>
                        ';
                        //Email headers
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
                        //Additional headers
                        $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
                        while($row = mysqli_fetch_array($result_send)) {
                            $toEmail = $row['email'];
                            if(mail($toEmail, $subject, $body, $headers)) {
                                $msg = "Notice posted successfully!";
                                $msgClass = "success";
                                header("Refresh:1; url=post_notice.php");
                            } else {
                                $msg = "Sorry something went wrong!";
                                $msgClass = "danger";
                            }
                        }
                    }
                }
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
    <title>Post Notice | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        #create_news {
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
    <?php include 'header.php' ?><!--  header ends -->

    <!-- section create news -->
    <section id="create_news" class="pd_top mb-5">
        <div class="container-custom">
            <div class="container-inner">
            <h2 class="text-center font-weight-bold mt-3 mb-3">Post Notice</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                <?php if($msg != '') { ?>
                    <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                        ×
                    </button>
                    <?php echo $msg ?>
                    </div>
                <?php } ?>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" name="uploadImage" value="" class="form-control" accept="image/*" required />
                            </div>
                            
                        <button type="submit" name="create" class="btn btn-primary btn-block"><i class="fa fa-plus-circle mr-2"></i>Post Notice</button>
                        <a href="show_notice.php" class="btn btn-secondary btn-block"><i class="fa fa-eye mr-2"></i>Show Notices</a>
                        </form>
                </div>
            </div>
            </div>
        </div>
    </section><!-- section create news ends -->
</body>
</html>
