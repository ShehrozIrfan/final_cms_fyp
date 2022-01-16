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

    //extension main image
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $tempname = $_FILES["uploadImage"]["tmp_name"];
    
    // $filename = uniqid($filename) . '.' .$ext;
    $filename = time() . "_" . $filename;

    $folder = "images/career-images/".$filename;

    $title = $_POST['title'];
    $description = $_POST['description'];
    $last_date = $_POST['last_date'];
    $last_date = date("Y-m-d", strtotime($last_date));  
    
    $_SESSION['title_news'] = $title;
    $_SESSION['title_description'] = $description;
    $_SESSION['last_date'] = $last_date;
    
    $date = date('Y-m-d');

    $allowed_extensions = array('pdf');
    
    if($filename == '') {
        $msg = "Please upload file";
        $msgClass = "danger";
    }
    else if(!in_array($ext, $allowed_extensions)) {
        $msg = "Invalid image file(s). Only pdf are allowed.";
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
            } else if($last_date < $date) {
                $msg = "Invalid date selected! Last date can not be less than the today date.";
                $msgClass = "danger";
            }
            else {
                $user_id = $_SESSION['user_id'];
                $query = "INSERT INTO careers (filename,title, description, date, created_by_id, last_date) VALUES('$filename','$title', '$description', '$date', '$user_id', '$last_date')";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query Failed .. !" . mysqli_error($connection));
                }
                else {
                    // Now let's move the uploaded image/file into the folder: career-images
                    if (move_uploaded_file($tempname, $folder))  {
                        $msg = "Career posted successfully!";
                        $msgClass = "success";
                        unset($_SESSION['title_news']);
                        unset($_SESSION['title_description']);
                        unset($_SESSION['last_date']);
                        header("Refresh:1; url=post_career.php");
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
    $query = "SELECT * FROM careers WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_array($result)){
            $title_edit = $row['title'];
            $description_edit = $row['description'];
            $filename_edit = $row['filename'];
            $last_date_apply = $row['last_date'];
            $date = date('Y-m-d');
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
    $last_date = $_POST['last_date'];

    $filename = time() . "_" . $filename;
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/career-images/".$filename;

    $allowed_extensions = array('pdf');

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
        } else if($last_date < $date) {
                $msg = "Invalid date selected! Last date can not be less than the today date.";
                $msgClass = "danger";
        }else {
            if($update_image) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed_extensions)) {
                    $msg = "Invalid file. Only pdf are allowed.";
                    $msgClass = "danger";
                } else {
                    $query = "UPDATE careers SET ";
                    $query .= "filename = '$filename', ";
                    $query .= "title = '$title', ";
                    $query .= "description = '$description', ";
                    $query .= "last_date = '$last_date' "; 
                    $query .= "WHERE id = $id";
                    $result = mysqli_query($connection, $query);

                    if(!$result) {
                        die("Query Failed. " .  mysqli_error($connection));
                    } else {
                        if (move_uploaded_file($tempname, $folder))  {
                            $msg = "Career Updated successfully!";
                            $msgClass = "warning";
                            header("Refresh:1; url=show_careers.php");
                        }
                    }
                }
            } else {
                $query = "UPDATE careers SET ";
                $query .= "title = '$title', ";
                $query .= "description = '$description', ";
                $query .= "last_date = '$last_date' "; 
                $query .= "WHERE id = $id";
                $result = mysqli_query($connection, $query);

                if(!$result) {
                    die("Query Failed. " .  mysqli_error($connection));
                } else {
                        $msg = "Career Updated successfully!";
                        $msgClass = "warning";
                        header("Refresh:1; url=show_careers.php");
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
    <title>Post Career | GICCL</title>
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
            /* width: 300px;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto; */
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
            <h2 class="text-center font-weight-bold mt-3 mb-3">Update Career</h2>
            <?php } else {?>
            <h2 class="text-center font-weight-bold mt-3 mb-3">Post Career</h2>
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
                                <label for="image">Upload file</label>
                                <input type="file" name="uploadImage" value="" class="form-control" accept="" <?php if(!isset($_GET['edit'])){ ?> required <?php } ?> />
                                <div>
                                    <?php if(isset($_GET['edit'])): ?>
                                        <a  href="images/career-images/<?php echo $filename_edit; ?>" class="img-show-news" download><?php echo $filename_edit ?></a>
                                    <?php endif ?>
                                </div>
                            </div>
                            <label for="title">Title</label>
                            <textarea type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required><?php if(isset($_GET['edit'])) { echo $title_edit; } ?><?php if(isset($_SESSION['title_news'])) echo $_SESSION['title_news']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Enter Description" rows="5" required><?php if(isset($_GET['edit'])) { echo $description_edit; } ?><?php if(isset($_SESSION['title_description'])) echo $_SESSION['title_description']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="last_date">Last date to apply</label>
                            <input type="date" class="form-control" name="last_date" value="<?php if(isset($_GET['edit'])) { echo $last_date_apply; } ?><?php if(isset($_SESSION['last_date'])) echo $_SESSION['last_date']; ?>" min="<?php echo date('Y-m-d'); ?>" max="2030-12-31">
                        </div>
                        <?php if(isset($_GET['edit'])): ?>
                        <button type="submit" name="update" class="btn btn-warning btn-block">Update Career</button>
                        <a href="show_careers.php" class="btn btn-secondary btn-block">Back</a>
                        <?php else: ?>
                        <button type="submit" name="create" class="btn btn-primary btn-block"><i class="fa fa-plus-circle mr-2"></i>Post Career</button>
                        <a href="show_careers.php" class="btn btn-secondary btn-block"><i class="fa fa-eye mr-2"></i>Show Careers</a>
                        <?php endif ?>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section><!-- section create news ends -->
</body>
</html>
