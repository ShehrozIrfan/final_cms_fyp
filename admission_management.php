<?php include 'session.php' ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Management | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <link rel="stylesheet" href="./assets/styles/animations.css">
    <style>
      /* Global */
      * {
        margin: 0px;
        padding: 0px;
      }

      body {
          font-family: 'Poppins', sans-serif;
      }
      #about {
          margin-top: 95px;
          padding-bottom: 30px;
      }
      #about-top {
          margin-top: 95px;
      }
      .pd_top {
          padding-top: 100px;
      }
      /* ===================================================== */
      /* ================ ABOUT PAGE ========================= */
      .about-top-bg {
          /* background: #F0F9FC; */
          /* min-height: 300px; */
          /* padding-top: 150px; */
          /* padding-bottom: 20px; */
      }
      .para_1,.para_2,.para_3,.para_4 {
          text-align: justify;
          padding-top: 5px;
          padding-bottom: 5px;
          font-size: 20px;
      }
      .every-top-bg {
          /* background: url('assets/images/every-page-top-bg.jpg'); */
          background: #4169E1;
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
      .parent-management {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50vh;
      }
      /* Media Queries - for mobile responsive */
      @media (max-width: 768px) {
          .parent-management {
            height: 80vh;
          }
          .management-heading {
            font-size: 18px;
          }
      }
      @media(max-width: 600px) {
        .every-top-bg {
             min-height: 120px;
         }
         .every-top-heading {
             font-size: 22px;
         }
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    <div id="about-us-page">
        <div class="about-top-bg" id="about-top">
            <div class="every-top-bg">
                <h2 class="every-top-heading">Admissions Management</h2>
            </div>
            <div class="container parent-management">
                <div class="row">
                    <div class="col-md-12">
                      <div>
                        <h4 class="management-heading">This is the sample page for admissions management. The admissions management module will be added later which is already built by our seniors. As per the supervisor's instruction we've added this link here, so that they can add the admissions management module link here.</h4>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>
    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <script src="./backToTop/backToTop.js"></script>
</body>
</html>
