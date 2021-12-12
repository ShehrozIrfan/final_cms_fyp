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
    //main image
    $filename = $_FILES["uploadImage"]["name"];

    //sub-images - gallery
    $sub_image_one = $_FILES["sub_image_one"]["name"];
    $sub_image_two = $_FILES["sub_image_two"]["name"];
    $sub_image_three = $_FILES["sub_image_three"]["name"];

    //extension main image
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    //extension sub images
    $ext_sub_image_one = pathinfo($sub_image_one, PATHINFO_EXTENSION);
    $ext_sub_image_two = pathinfo($sub_image_two, PATHINFO_EXTENSION);
    $ext_sub_image_three = pathinfo($sub_image_three, PATHINFO_EXTENSION);


    $tempname = $_FILES["uploadImage"]["tmp_name"];
    
    $tempname_sub_image_one = $_FILES["sub_image_one"]["tmp_name"];
    $tempname_sub_image_two = $_FILES["sub_image_two"]["tmp_name"];
    $tempname_sub_image_three = $_FILES["sub_image_three"]["tmp_name"];

    // $filename = uniqid($filename) . '.' .$ext;
    $filename = time() . "_" . $filename;

    $sub_image_one = time() . "_" . $sub_image_one;
    $sub_image_two = time() . "_" . $sub_image_two;
    $sub_image_three = time() . "_" . $sub_image_three;

    $folder = "images/news-images/".$filename;
    
    $folder_sub_image_one = "images/news-images/".$sub_image_one;
    $folder_sub_image_two = "images/news-images/".$sub_image_two;
    $folder_sub_image_three = "images/news-images/".$sub_image_three;

    $title = $_POST['title'];
    $description = $_POST['description'];
    
    $_SESSION['title_news'] = $title;
    $_SESSION['title_description'] = $description;

    $date = date('Y-m-d');

    $allowed_extensions = array('png', 'jpeg', 'jpg', 'gif');
    
    if($filename == '' || $sub_image_one == '' || $sub_image_two == '' || $sub_image_three == '') {
        $msg = "Please choose all the image files";
        $msgClass = "danger";
    }
    else if(!in_array($ext, $allowed_extensions) || !in_array($ext_sub_image_one, $allowed_extensions) || !in_array($ext_sub_image_two, $allowed_extensions) || !in_array($ext_sub_image_three, $allowed_extensions)) {
        $msg = "Invalid image file(s). Only png, jpeg, jpg, gif are allowed.";
        $msgClass = "danger";
    } else {
        if(!empty(trim($title)) && !empty(trim($description))) {
            if(strlen($title) < 10) {
                $msg = "Title must be atleast 10 characters!";
                $msgClass = "danger";
            } else if(strlen($title) > 255) {
                $msg = "Title can't be more than 255 characters!";
                $msgClass = "danger";
            }
            else if(strlen($description) < 15) {
                $msg = "Description must be atleast 15 characters!";
                $msgClass = "danger";
            } else if(strlen($description) > 5000) {
                $msg = "Description cannot be more than 5000 characters!";
                $msgClass = "danger";
            } 
            else {
                $user_id = $_SESSION['user_id'];
                $query = "INSERT INTO news (filename,title, description, date, created_by_id, sub_img_one, sub_img_two, sub_img_three) VALUES('$filename','$title', '$description', '$date', '$user_id', '$sub_image_one', '$sub_image_two', '$sub_image_three')";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query Failed .. !" . mysqli_error($connection));
                    // $msg = "File already exists, please change the file name!";
                    // $msgClass = "danger";
                }else {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $folder) && move_uploaded_file($tempname_sub_image_one, $folder_sub_image_one) && move_uploaded_file($tempname_sub_image_two, $folder_sub_image_two) && move_uploaded_file($tempname_sub_image_three, $folder_sub_image_three))  {
                        $msg = "News posted successfully!";
                        $msgClass = "success";
                        $_SESSION['title_news'] = '';
                        $_SESSION['title_description'] = '';
                        header("Refresh:1; url=post_news.php");
                    }
                }
            }
        } else {
            $msg = "Title or Description can't be blank";
            $msgClass = "danger";
        }
    }
}
?>
<?php
if(isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $filename_edit;
    $title_edit;
    $description_edit;
    $query = "SELECT * FROM news WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_array($result)){
            $title_edit = $row['title'];
            $description_edit = $row['description'];
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
    $description = $_POST['description'];

    $filename = time() . "_" . $filename;
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/news-images/".$filename;

    $allowed_extensions = array('png', 'jpeg', 'jpg', 'gif');

    if(!empty(trim($title)) && !empty(trim($description))) {
        if(strlen($title) < 10) {
            $msg = "Title must be atleast 10 characters!";
            $msgClass = "danger";
        } else if(strlen($title) > 255) {
            $msg = "Title can't be more than 255 characters!";
            $msgClass = "danger";
        }
        else if(strlen($description) < 15) {
            $msg = "Description must be atleast 15 characters!";
            $msgClass = "danger";
        } else if(strlen($description) > 5000) {
            $msg = "Description cannot be more than 5000 characters!";
            $msgClass = "danger";
        } else {
            if($update_image) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed_extensions)) {
                    $msg = "Invalid file. Only png, jpeg, jpg, gif are allowed.";
                    $msgClass = "danger";
                } else {
                    $query = "UPDATE news SET ";
                    $query .= "filename = '$filename', ";
                    $query .= "title = '$title', ";
                    $query .= "description = '$description' ";
                    $query .= "WHERE id = $id";
                    $result = mysqli_query($connection, $query);

                    if(!$result) {
                        die("Query Failed. " .  mysqli_error($connection));
                    } else {
                        if (move_uploaded_file($tempname, $folder))  {
                            $msg = "News Updated successfully!";
                            $msgClass = "warning";
                            header("Refresh:1; url=show_news.php");
                        }
                    }
                }
            } else {
                $query = "UPDATE news SET ";
                $query .= "title = '$title', ";
                $query .= "description = '$description' ";
                $query .= "WHERE id = $id";
                $result = mysqli_query($connection, $query);

                if(!$result) {
                    die("Query Failed. " .  mysqli_error($connection));
                } else {
                        $msg = "News Updated successfully!";
                        $msgClass = "warning";
                        header("Refresh:1; url=show_news.php");
                }
            }
        } 
    } else {
        $msg = "Title and description can't be blank!";
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
    <title>Create News | GICCL</title>
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
            <h2 class="text-center font-weight-bold mt-3 mb-3">Update News</h2>
            <?php } else {?>
            <h2 class="text-center font-weight-bold mt-3 mb-3">Post News</h2>
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
                            <div class="form-group">
                                <div>
                                    <?php if(isset($_GET['edit'])): ?>
                                        <img  src="images/news-images/<?php echo $filename_edit; ?>" class="img-show-news">
                                    <?php endif ?>
                                </div>
                                <label for="image">Upload main image</label>
                                <input type="file" name="uploadImage" value="" class="form-control" accept="image/*" />
                            </div>
                            <label for="title">Title</label>
                            <textarea type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required><?php if(isset($_GET['edit'])) { echo $title_edit; } ?><?php if(isset($_SESSION['title_news'])) echo $_SESSION['title_news']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="10" required><?php if(isset($_GET['edit'])) { echo $description_edit; } ?><?php if(isset($_SESSION['title_description'])) echo $_SESSION['title_description']; ?></textarea>
                        </div>
                        <?php if(!isset($_GET['edit'])): ?>
                        <div class="form-group">
                            <label for="description">Add Gallery</label>
                            <input type="file" class="form-control" name="sub_image_one" accept="image/*" required>
                            <input type="file" class="form-control" name="sub_image_two" accept="image/*" required>
                            <input type="file" class="form-control" name="sub_image_three" accept="image/*" required>
                        </div>
                        <?php endif ?>
                        <?php if(isset($_GET['edit'])): ?>
                        <button type="submit" name="update" class="btn btn-warning btn-block">Update News</button>
                        <a href="show_news.php" class="btn btn-secondary btn-block">Back</a>
                        <?php else: ?>
                        <button type="submit" name="create" class="btn btn-primary btn-block"><i class="fa fa-plus-circle mr-2"></i>Post News</button>
                        <a href="show_news.php" class="btn btn-secondary btn-block"><i class="fa fa-eye mr-2"></i>Show News</a>
                        <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section><!-- section create news ends -->
</body>
</html>
