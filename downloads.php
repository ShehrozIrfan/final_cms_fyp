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
    <title>Downloads | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <link rel="stylesheet" href="./assets/styles/animations.css">
    <style>
      /* Global */
      body {
          font-family: 'Poppins', sans-serif;
          font-size: 16px;
      }
      #downloads {
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
      .downloads-heading {
          background: black;
          color: white;
      }
      .to-download {
          color: black;
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
    <section id="downloads">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Downloads</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Admissions</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/Admission Policy.pdf" download>GIGCCL Admission Policy</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/Admission Steps.pdf" download>GIGCCL Admission Steps</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Bulletin</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/Bulletins.pdf" download>FARANIAN, College News Bulletin, October 2021 to December 2021.</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Project Guideline</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Guidelines for Synopsis & Project</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Forms for Students</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Subject Change Form</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Fee Refund Form</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Late College Admission Form</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Affidavit for Students</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Affidavit for students regarding Covid-19 SOP's</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Forms for Non-Teaching Positions</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Job Form for Non-Teaching Staff</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Challan Form for Non-Teaching Posts</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>Application Form for Job</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr class="downloads-heading">
                                <td>Prospectus</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/downloads-page/dummy-file.pdf" download>GIGCCL Prospectus</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>
    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <script src="./backToTop/backToTop.js"></script>
</body>
</html>
