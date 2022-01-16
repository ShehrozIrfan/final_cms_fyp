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

    $title = $_POST['title'];
    $date = date('Y-m-d');

    $allowed_extensions = array('png', 'jpeg', 'jpg', 'gif');

    if($_FILES["uploadImage"]["name"] == '') {
        $msg = "Please select a file!";
        $msgClass = "danger";
    }
    else if(!in_array($ext, $allowed_extensions)) {
        $msg = "Invalid file. Only png, jpeg, jpg, gif are allowed.";
        $msgClass = "danger";
    } else if (trim($title) == '') {
        $msg = "Title can't be blank.";
        $msgClass = "danger";
    } else if(strlen($title) < 10) {
        $msg = "Title must be atleast 10 characters!";
        $msgClass = "danger";
    } else if (strlen($title) > 255) {
        $msg = "Title can be only upto 255 characters.";
        $msgClass = "danger";
    }
    else {
        $user_id = $_SESSION['user_id'];
        $query = "INSERT INTO notices (filename, title, date, created_by_id) VALUES('$filename', '$title', '$date', '$user_id')";
        $result = mysqli_query($connection, $query);
        if(!$result) {
            die("Query Failed .. !" . mysqli_error($connection));
            // $msg = "Please select a file";
            // $msgClass = "warning";
        }else {
            // Now let's move the uploaded image into the folder: image
            if (move_uploaded_file($tempname, $folder))  {
                $msg = "Notice posted successfully!";
                $msgClass = "success";
                header("Refresh:1; url=post_notice.php");
                // //sending emails to all subscribers
                // $query = "SELECT * FROM subscribe_notice";
                // $result_send = mysqli_query($connection, $query);
                // if(!$result_send) {
                //     die("Query failed" . mysqli_error($connection));
                // } else {
                //     if(mysqli_num_rows($result_send)== 0) {
                //         $msg = "Notice posted successfully!";
                //         $msgClass = "success";
                //         header("Refresh:1; url=post_notice.php");
                //     } else {
                //         $username = "GIGCCL";
                //         $subject = "New Notice Posted";
                //         $body = '<h2>Hi there!</h2>
                //                  <p>A new notice is posted on GIGCCL.</p>
                //                  <p>You can visit the GIGCCL notice board to see the latest notice.</p>
                //                  <p>Thanks!</p>
                //                  <p>For any queries feel free to contact us at:</p>
                //                  <p>giccllahore@gmail.com</p>
                //         ';
                //         //Email headers
                //         $headers = "MIME-Version: 1.0" . "\r\n";
                //         $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
                //         //Additional headers
                //         $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
                //         while($row = mysqli_fetch_array($result_send)) {
                //             $toEmail = $row['email'];
                //             if(mail($toEmail, $subject, $body, $headers)) {
                //                 $msg = "Notice posted successfully!";
                //                 $msgClass = "success";
                //                 header("Refresh:1; url=post_notice.php");
                //             } else {
                //                 $msg = "Sorry something went wrong!";
                //                 $msgClass = "danger";
                //             }
                //         }
                //     }
                // }
            } else {
                $msg = "Sorry something went wrong! Please try again.";
                $msgClass = "danger";
            }
        }
    }
}
?>

<?php
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $filename_edit;
    $title_edit;
    $query = "SELECT * FROM notices WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_array($result)){
            $title_edit = $row['title'];
            $filename_edit = $row['filename'];
        }
    }
}
?>

<?php
if(isset($_POST['update'])) {
    $id = $_GET['edit'];
    $filename = $_FILES["uploadImage"]["name"];
    $update_image = $filename == '' ? false : true;
    $title = $_POST['title'];

    $filename = time() . "_" . $filename;
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/notice-images/".$filename;

    $allowed_extensions = array('png', 'jpeg', 'jpg', 'gif');

    if( !empty( trim($title) ) ) {
        if(strlen($title) < 10) {
            $msg = "Title must be atleast 10 characters!";
            $msgClass = "danger";
        } else if(strlen($title) > 255) {
            $msg = "Title can't be more than 255 characters!";
            $msgClass = "danger";
        }
        else {
            if($update_image) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed_extensions)) {
                    $msg = "Invalid file. Only png, jpeg, jpg, gif are allowed.";
                    $msgClass = "danger";
                } else {
                    $query = "UPDATE notices SET ";
                    $query .= "filename = '$filename', ";
                    $query .= "title = '$title' ";
                    $query .= "WHERE id = $id";
                    $result = mysqli_query($connection, $query);

                    if(!$result) {
                        die("Query Failed. " .  mysqli_error($connection));
                    } else {
                        if (move_uploaded_file($tempname, $folder))  {
                            $msg = "Notice Updated successfully!";
                            $msgClass = "warning";
                            header("Refresh:1; url=show_notice.php");
                        }
                    }
                }
            } else {
                $query = "UPDATE notices SET ";
                $query .= "title = '$title' ";
                $query .= "WHERE id = $id";
                $result = mysqli_query($connection, $query);

                if(!$result) {
                    die("Query Failed. " .  mysqli_error($connection));
                } else {
                        $msg = "Notice Updated successfully!";
                        $msgClass = "warning";
                        header("Refresh:1; url=show_notice.php");
                }
            }
        } 
    } else {
        $msg = "Title can't be blank!";
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
        .img-show-news {
            width: 300px;
            height: auto;
            display: block;
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
                <?php if(isset($_GET['edit'])){ ?>
                <h2 class="text-center font-weight-bold mt-3 mb-3">Update Notice</h2>
                <?php } else {?>
                <h2 class="text-center font-weight-bold mt-3 mb-3">Post Notice</h2>
                <?php } ?>
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
                            <div>
                                <?php if(isset($_GET['edit'])): ?>
                                    <img  src="images/notice-images/<?php echo $filename_edit; ?>" class="img-show-news">
                                <?php endif ?>
                            </div>
                            <label for="image">Upload Image</label>
                            <input type="file" name="uploadImage" value="" class="form-control" accept="image/*" <?php if(!isset($_GET['edit'])){ ?> required <?php } ?> />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="<?php if(isset($_GET['edit'])) { echo $title_edit; } ?>" class="form-control" placeholder="Enter title" required />
                        </div>
                        <?php if(isset($_GET['edit'])): ?>
                        <button type="submit" name="update" class="btn btn-warning btn-block">Update Notice</button>
                        <a href="show_notice.php" class="btn btn-secondary btn-block">Back</a>
                        <?php else: ?>
                        <button type="submit" name="create" class="btn btn-primary btn-block"><i class="fa fa-plus-circle mr-2"></i>Post Notice</button>
                        <a href="show_notice.php" class="btn btn-secondary btn-block"><i class="fa fa-eye mr-2"></i>Show Notices</a>
                        <?php endif ?>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </section><!-- section create news ends -->
</body>
</html>
