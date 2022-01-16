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
    <title>Research | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <style>
      /* Global */
      body {
          font-family: 'Poppins', sans-serif;
          font-size: 16px;
      }
      #research {
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
      .book-img {
          width: 200px;
          height: 250px;
          display: block;
          margin-left:auto;
          margin-right: auto;
          border-radius: 5px;
      }
      .heading-books {
        text-align: center;
        padding-top: 10px;
        padding-bottom: 10px;
        color: white;
        background: black;
        margin-top: 20px;
      }
      .heading-books {
            font-size: 22px;
        }
        .text-black {
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
    <section id="research">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Research &amp; Publications</h2>
        </div>
        <div class="container">
            <h2 class="heading-books">Google Scholar</h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-sm-12">
                    <p class="text-center font-weight-bold pt-4"><a href="https://scholar.google.com/citations?hl=en&user=25g40mIAAAAJ" class="text-black" target="_blank">Google Scholar profile of Prof. Dr. Akhtar Hussain Sandhu</a></p>
                </div>
            </div>
        </div>
        <!-- <div class="container">
            <h2 class="heading-books">Bulletin</h2>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-sm-12">
                    <p class="text-center font-weight-bold pt-4">FARANIAN, College News Bulletin, October 2021 to December 2021.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/research-page/Bulletins.pdf" download>
                                        <img src="assets/research-page/bulletin.jpg" class="book-img">
                                    </a>
                                </td>
                            </tr>
                        </table>                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/research-page/Bulletins.pdf" download>
                                        <img src="assets/research-page/bulletin_2.jpg" class="book-img">
                                    </a>
                                </td>
                            </tr>
                        </table>                        
                    </div>
                </div>
            </div>
        </div> -->
        <div class="container">
            <h2 class="heading-books">Books</h2>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/research-page/BS Pak-Study.pdf" download>
                                        <img src="assets/research-page/bs-pak-studies-book.jpg" class="book-img">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="font-weight-bold small text-center">By: <span>Asim Farooq Sheikh</span></p>
                                </td>
                            </tr>
                        </table>                        
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12 mt-4 mb-4">
                    <div>
                        <table class="table table-bordered">
                            <tr>
                                <td>
                                    <a class="to-download" href="assets/research-page/BS Psychology.pdf" download>
                                        <img src="assets/research-page/bs-psychology-book.jpg" class="book-img">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="font-weight-bold small text-center">By: <span>Prof. Dr. Kashif Firaz Ahmed &amp; Prof. Syed Mohsin Bukhari</span></p>
                                </td>
                            </tr>
                        </table>                        
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
