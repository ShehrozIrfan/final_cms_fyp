<?php include('session.php'); ?>
<?php
if(!isset($_SESSION['login_user']) && !isset($_SESSION['login_blog_user'])){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GICCL</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .container-custom {
            width: 85%;
            margin-left: auto;
        }
        .container-inner {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        .jumbotron {
            margin-top: 80px;
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
    <div class="pd_top"></div>
    <div class="container-custom">
        <div class="container-inner">
            <div class="row justify-content-center mt-5 mb-3">
                <div class="col-md-12 text-center">
                    <div class="jumbotron">
                        <?php if(isset($_SESSION['login_blog_user'])) { ?>
                            <h1>Welcome to Blog, GIGCCL.</h1>
                            <p>You can write and publish your articles from this platform.</p>
                        <?php } else { ?>
                            <h1>Welcome '<?php echo $_SESSION['username']; ?>' to CMS, GIGCCL.</h1>
                            <p>You can manage News, Notices, Blogs, Careers, Signup requests, Accounts, Admissions, Attendances, Examinations, Hostel from this single platform.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
