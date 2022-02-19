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
    $id = $_GET['id'];
    $query = "SELECT * FROM notices where id = '$id'";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    } else {
      while($row = mysqli_fetch_array($result)) {
        $notice_image = $row['filename'];
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Specific Notice | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <link rel="stylesheet" href="./assets/styles/animations.css">

    <style>
        body {
          font-family: 'Poppins', sans-serif;
          font-size: 16px;
        }
        .pd_top {
          margin-top: 95px;
        }

        .every-top-bg {
          background: url('assets/images/every-page-top-bg.jpg');
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
          min-height: 200px;
          display: flex;
          align-items: center;
          justify-content: center;
      }
      .every-top-heading {
          font-size: 35px;
          font-weight: bold;
          color: white;
      }
      .text-black {
          color: black;
      }
      .notice-image {
        max-width: 100%;
        height: auto;
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section create news -->
    <section id="show_news" class="pd_top mb-5">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Notice Board</h2>
        </div>
        <div class="container mt-3 mb-3">
            <div class="">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-10 col-sm-12 col-xs-12">
                      <img src="images/notice-images/<?php echo $notice_image; ?>" class="notice-image">
                    </div>
                </div>
            </div>
        </div>
    </section><!-- section create news ends -->

    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <?php include 'footer.php'; ?>
    <script src="./backToTop/backToTop.js"></script>
    <script>
        $(document).on("click", '.show-notice-img', function(e) {
            var elm = $(e.target);
            var closestParent = elm.closest('.show-notice-img-parent');
            var req = closestParent.find('.img-notice');
            $('.img-notice-modal').html(req.html());
        })
    </script>
</body>
</html>
