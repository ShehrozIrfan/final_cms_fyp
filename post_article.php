<?php include 'session.php' ?>
<?php
if(!isset($_SESSION['login_blog_user']))
{
  header("location: index.php");
}
?>
<?php 
$msg = '';
$msgClass = '';
if(isset($_POST['create'])) {
    $filename = $_FILES["uploadImage"]["name"];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $filename = time() . "_" . $filename;
    $folder = "images/article-images/".$filename;

    $title = $_POST['title'];
    $description = $_POST['content'];
    $date = date('Y-m-d');
    $posted_by_id = $_SESSION['login_blog_id'];

    $_SESSION['blog_title'] = $title;
    $_SESSION['blog_description'] = $description;

    $allowed_extensions = array('png', 'jpeg', 'jpg', 'gif');

    if($filename == '') {
        $msg = "Please upload the image";
        $msgClass = "danger";
    }
    else if(!in_array($ext, $allowed_extensions)) {
        $msg = "Invalid image file. Only png, jpeg, jpg, gif are allowed.";
        $msgClass = "danger";
    }
    else {
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
            } else if(strlen($description) > 15000) {
                $msg = "Description cannot be more than 15000 characters!";
                $msgClass = "danger";
            } 
            else {
                $query = "INSERT INTO blog_articles (filename,title, description, status, date, posted_by_id) VALUES('$filename','$title', '$description', 'pending', '$date', '$posted_by_id')";
                $result = mysqli_query($connection, $query);
                if(!$result) {
                    die("Query Failed .. !" . mysqli_error($connection));
                }else {
                    // Now let's move the uploaded image into the folder: image
                    if (move_uploaded_file($tempname, $folder))  {
                        $msg = "Article posted successfully! But its status is pending, you'll be get notified once your article get published!";
                        $msgClass = "success";
                        $_SESSION['blog_title'] = '';
                        $_SESSION['blog_description'] = '';
                        header("Refresh:3; url=post_article.php");
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
    $query = "SELECT * FROM blog_articles WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
        while($row = mysqli_fetch_array($result)){
            $title_blog_edit = $row['title'];
            $description_blog_edit = $row['description'];
            $filename_blog_edit = $row['filename'];
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
    $description = $_POST['content'];

    $filename = time() . "_" . $filename;
    $tempname = $_FILES["uploadImage"]["tmp_name"];
    $folder = "images/article-images/".$filename;

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
        } else if(strlen($description) > 15000) {
            $msg = "Description cannot be more than 15000 characters!";
            $msgClass = "danger";
        } else {
            if($update_image) {
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!in_array($ext, $allowed_extensions)) {
                    $msg = "Invalid file. Only png, jpeg, jpg, gif are allowed.";
                    $msgClass = "danger";
                } else {
                    $query = "UPDATE blog_articles SET ";
                    $query .= "filename = '$filename', ";
                    $query .= "title = '$title', ";
                    $query .= "description = '$description', ";
                    $query .= "status = 'pending' ";
                    $query .= "WHERE id = $id";
                    $result = mysqli_query($connection, $query);

                    if(!$result) {
                        die("Query Failed. " .  mysqli_error($connection));
                    } else {
                        if (move_uploaded_file($tempname, $folder))  {
                            $msg = "Article Updated successfully! and now in pending mood, you'll be get notified whenever it got published.";
                            $msgClass = "warning";
                            $_SESSION['blog_title'] = '';
                            $_SESSION['blog_description'] = '';
                            header("Refresh:3; url=post_article.php");
                        }
                    }
                }
            } else {
                $query = "UPDATE blog_articles SET ";
                $query .= "title = '$title', ";
                $query .= "description = '$description', ";
                $query .= "status = 'pending' ";
                $query .= "WHERE id = $id";
                $result = mysqli_query($connection, $query);

                if(!$result) {
                    die("Query Failed. " .  mysqli_error($connection));
                } else {
                        $msg = "Article Updated successfully! and now in pending mood, you'll be get notified whenever it got published.";
                        $msgClass = "warning";
                        $_SESSION['blog_title'] = '';
                        $_SESSION['blog_description'] = '';
                        header("Refresh:3; url=post_article.php");
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
    <title>Post Article</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- ckeditor -->
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

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
                <h2 class="text-center font-weight-bold mt-3 mb-3">Post Article</h2>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="form-group">
                                    <div>
                                        <?php if(isset($_GET['edit'])): ?>
                                            <img  src="images/article-images/<?php echo $filename_blog_edit; ?>" class="img-show-news">
                                        <?php endif ?>
                                    </div>
                                    <label for="image">Upload main image</label>
                                    <input type="file" name="uploadImage" value="" class="form-control" accept="image/*" />
                                </div>
                                <label for="title">Title</label>
                                <textarea type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required><?php if(isset($_GET['edit'])) { echo $title_blog_edit; } ?><?php if(isset($_SESSION['blog_title'])) echo $_SESSION['blog_title']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="description">Details</label>
                                <textarea name="content" rows="10" class="form-control" required><?php if(isset($_GET['edit'])) { echo $description_blog_edit; } ?><?php if(isset($_SESSION['blog_description'])) { echo $_SESSION['blog_description']; } ?></textarea>
                            </div>
                            <?php if(isset($_GET['edit'])): ?>
                            <button type="submit" name="update" class="btn btn-warning btn-block">Update Article</button>
                            <a href="published_articles.php" class="btn btn-secondary btn-block">Back</a>
                            <?php else: ?>
                            <button type="submit" name="create" class="btn btn-primary btn-block"><i class="fa fa-plus-circle mr-2"></i>Post Article</button>
                            <a href="published_articles.php" class="btn btn-secondary btn-block"><i class="fa fa-eye mr-2"></i>Show Articles</a>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <script src="./backToTop/backToTop.js"></script>
    <script> 
    CKEDITOR.replace( 'content',
	{
        uiColor: '#CCEAEE',
        toolbar :
		[
            { name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote' ] },
            { name: 'links', items : [ 'Link','Unlink' ] },
		    { name: 'tools', items : [ 'Maximize','-','About' ] },
            { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		    { name: 'editing', items : [ 'Find','Replace','-','SelectAll' ] },
            { name: 'insert', items : [ 'HorizontalRule','Smiley','SpecialChar','PageBreak'
				  ] },
		]
	});
    </script>
</body>
</html>
