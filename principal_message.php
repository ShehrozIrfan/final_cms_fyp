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
    <title>Message | GICCL</title>
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
      .pd_top {
          padding-top: 100px;
      }
      #message {
          margin-top: 95px;
      }
      .clear {
          clear: both;
      }
      .parent-full-principal-img {
          text-align: center;
      }
      .full-principal-img {
          border-radius: 5%;
      }
      .full-principal-text {
          text-align: justify;
          font-size: 20px;
      }
      .heading-message {
          text-decoration: underline;
      }
      .every-top-bg {
          /* background: url('assets/images/every-page-top-bg.jpg'); */
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
          min-height: 200px;
          display: flex;
          align-items: center;
          justify-content: center;
          /* background: #4169E1; */
          background: #FFEED8;
      }
      .every-top-heading {
          font-size: 35px;
          font-weight: bold;
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
      @media(max-width: 500px) {
          .full-principal-img {
              /* border-radius: 50%; */
              width: 250px;
              height: 250px;
          }
          .heading-message {
              font-size: 22px;
          }
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    <section class="full-principal-message" id="message">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Message of The Principal</h2>
        </div>
        <div class="container mt-3 mb-3">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="parent-full-principal-img">
                        <img src="assets/images/principal.jpeg" class="full-principal-img">
                        <p class="font-weight-bold">Professor Dr. Akhtar Hussain Sandhu
                            <span class="d-block">Principal</span>
                        </p>
                    </div>
                    <div class="full-principal-text">
                        <p>Dear Students,</p>
                        <p>Education is an epithet which distinguishes man from the rest of the creatures of Allah. The significance of learning cannot be overlooked as it helps man to explore new vistas and dimensions of life. It enables him to excel over his fellow beings and secure a place of distinction. As the human civilization is making great strides forward, it is offering man a highly competitive environment in which survival and well-being is for those who can move ahead at the required pace.</p>
                        <p>Islamia Graduate College Civil Lines took its shape in 1892. I thank the Almighty for His bountiful blessings and guidance, which helped the institution function efficiently all through the years since the founding of the college. We seek His benevolence and mercy for all the years to come. Our team believes itself to be the custodian of the values of 119 years of the history of the college. We therefore, are fully committed to elevating our students to the extremes of professional excellence through self-discipline and self-respect and motivate them to pay back to the community. Our campus is a spacious and comprehensive educational institution, offering an environment that not only reflects the acceptable norms of our society but also equips our students to become innovative professionals and respectful citizens.</p>
                        <p>Keeping in view the challenges posed to man by emerging trends of the present millennium, we have introduced a system of education that is based on the lines and parameters of modern approaches in the field of science and education. The basic purpose of the college is to provide the students the opportunities for quality education at an affordable cost and to groom them in a well-disciplined environment. Our goal is to work collaboratively with students, their parents and society to implement effective strategies that ensure the creation of a safe yet effective learning environment for our nation builders. I envision a scintillating future for this college and wish it great colors in the times to come.</p>
                        <p>Welcome to Islamia Graduate College, Civil Lines, Lahore.</p>
                        <p class="font-weight-bold">Professor Dr. Akhtar Hussain Sandhu
                            <span class="d-block">Principal</span>
                        </p>
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
