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
    <title>Programs Offered | GICCL</title>
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
      .programs-offered {
          margin-top: 95px;
      }
      .btn-link {
          color: black;
          border: none;
          outline: none;
          text-decoration: none;
      }
      .btn-link:hover {
          color: black;
          text-decoration: none;
      }
      .pd_top {
          padding-top: 100px;
      }
      .clear {
          clear: both;
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
      .inter-programs, .bs-programs {
        padding: 20px;
        /* border: 1px solid black; */
        margin: 10px;
        border-radius: 5px;
      }
      .heading-inter-programs, .heading-bs, .heading-mor-shift, .heading-eve-shift {
          font-size: 25px;
          font-weight: bold;
          text-decoration: underline;
      }
      .text-inter-programs, .text-bs {
          /* font-style: italic; */
      }
      .list {
          padding: 5px;
      }
      .list li a {
          color: black;
      }
      .chevron-icon {
          font-size: 25px!important;
      }
      .program-heading {
          display: flex;
      }
      .list-inter-programs {
          border: 1px solid grey;
          padding: 25px;
      }
      @media(max-width: 600px) {
         .every-top-bg {
             min-height: 120px;
         }
         .every-top-heading {
             font-size: 22px;
         }
         .heading-inter-programs, .heading-bs, .heading-mor-shift, .heading-eve-shift {
             font-size: 22px;
         }
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    <section class="programs-offered">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Programs Offered</h2>
        </div>
        <div class="container">
            <div class="inter-programs">
                <h2 class="heading-inter-programs mt-4 mb-4">Intermediate Programs</h2>
                <p class="text-inter-programs">College is offering following intermediate programs in morning and afternoon classes:</p>
                <div class="container text-uppercase">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 col-xs-12 list-inter-programs">Pre Engineering</div>
                        <div class="col-md-4 col-sm-12 col-xs-12 list-inter-programs">Pre Medical</div>
                        <div class="col-md-4 col-sm-12 col-xs-12 list-inter-programs">ICS-Physics</div>
                        <div class="col-md-4 col-sm-12 col-xs-12 list-inter-programs">ICS-Statistics</div>
                        <div class="col-md-4 col-sm-12 col-xs-12 list-inter-programs">Humanities(Arts) [Morning Session Only]</div>
                        <div class="col-md-4 col-sm-12 col-xs-12 list-inter-programs">Commerce(ICOM)</div>
                    </div>
                </div>
                <div>
                    <h2 class="heading-inter-programs mt-4 mb-4">Intermediate (First & Second Shift)</h2>
                    <div class="accordion" id="accordionProgramsTop">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0 program-heading">
                                    <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Compulsory Subjects
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionProgramsTop">
                                <div class="card-body">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <td>English</td>
                                                <td>Islamic Education</td>
                                                <td>Pakistan Studies</td>
                                                <td>Urdu</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="heading-inter-programs mt-4 mb-4">Elective Subjects</h2>
                    <p>Applicants are required to select One Set out of the given Thirty Nine Sets:</p>
                    <div class="accordion" id="accordionPrograms">
                        <!-- set 1 starts -->
                        <div class="card">
                            <div class="card-header" id="headingSet1">
                                <h2 class="program-heading mb-0">
                                    <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSet1" aria-expanded="true" aria-controls="collapseSet1">
                                        Pre-Medical
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseSet1" class="collapse" aria-labelledby="headingSet1" data-parent="#accordionPrograms">
                                <div class="card-body">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <td>Set No. 1:</td>
                                                <td>Biology</td>
                                                <td>Chemistry</td>
                                                <td>Physics</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- set 1 ends -->
                        <!-- set 2 starts -->
                        <div class="card">
                            <div class="card-header" id="headingSet2">
                                <h2 class="program-heading mb-0">
                                    <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSet2" aria-expanded="true" aria-controls="collapseSet2">
                                        Pre-Engineering
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseSet2" class="collapse" aria-labelledby="headingSet2" data-parent="#accordionPrograms">
                                <div class="card-body">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <td>Set No. 2:</td>
                                                <td>Chemistry</td>
                                                <td>Mathematics</td>
                                                <td>Physics</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- set 2 ends -->
                        <!-- set 3-4 starts -->
                        <div class="card">
                            <div class="card-header" id="headingSet3-4">
                                <h2 class="program-heading mb-0">
                                    <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSet3-4" aria-expanded="true" aria-controls="collapseSet3-4">
                                        I.C.S
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseSet3-4" class="collapse" aria-labelledby="headingSet3-4" data-parent="#accordionPrograms">
                                <div class="card-body">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <td>Set No. 3:</td>
                                                <td>Computer Science</td>
                                                <td>Mathematics</td>
                                                <td>Statistics</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 4:</td>
                                                <td>Computer Science</td>
                                                <td>Mathematics</td>
                                                <td>Physics</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- set 3-4 ends -->
                        <!-- set 5 starts -->
                        <div class="card">
                            <div class="card-header" id="headingSet5">
                                <h2 class="program-heading mb-0">
                                    <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSet5" aria-expanded="true" aria-controls="collapseSet5">
                                        I.Com
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseSet5" class="collapse" aria-labelledby="headingSet5" data-parent="#accordionPrograms">
                                <div class="card-body">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <td>Set No. 5:</td>
                                                <td>Accounting</td>
                                                <td>Business Math</td>
                                                <td>Principal of Commerce</td>
                                                <td>Principal of Economics</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- set 5 ends -->
                        <!-- set 6-39 starts -->
                        <div class="card">
                            <div class="card-header" id="headingSet6-39">
                                <h2 class="program-heading mb-0">
                                    <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSet6-39" aria-expanded="true" aria-controls="collapseSet6-39">
                                        Arts (Offered Only in Morning Shift)
                                    </div>
                                    <div>
                                        <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                    </div>
                                </h2>
                            </div>
                            <div id="collapseSet6-39" class="collapse" aria-labelledby="headingSet6-39" data-parent="#accordionPrograms">
                                <div class="card-body">
                                    <div>
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <td>Set No. 6:</td>
                                                <td>Civics</td>
                                                <td>Education</td>
                                                <td>Islamic Studies</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 7:</td>
                                                <td>Civics</td>
                                                <td>Education</td>
                                                <td>Geography</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 8:</td>
                                                <td>Economics</td>
                                                <td>Islamic Studies</td>
                                                <td>Statistics</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 9:</td>
                                                <td>Health & Physical Education</td>
                                                <td>History of Islam</td>
                                                <td>Islamic Studies</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 10:</td>
                                                <td>Health & Physical Education</td>
                                                <td>Islamic Studies</td>
                                                <td>Psychology</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 11:</td>
                                                <td>Arabic</td>
                                                <td>Civics</td>
                                                <td>History of Islam</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 12:</td>
                                                <td>Civics</td>
                                                <td>History of Islam</td>
                                                <td>Persian</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 13:</td>
                                                <td>Civics</td>
                                                <td>History of Islam</td>
                                                <td>Punjabi</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 14:</td>
                                                <td>Civics</td>
                                                <td>History of Islam</td>
                                                <td>Urdu Adv.</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 15:</td>
                                                <td>Civics</td>
                                                <td>English Elec.</td>
                                                <td>History of Islam</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 16:</td>
                                                <td>Arabic</td>
                                                <td>History of Islam</td>
                                                <td>Philosophy</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 17:</td>
                                                <td>History of Islam</td>
                                                <td>Persian </td>
                                                <td>Philosophy</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 18:</td>
                                                <td>History of Islam</td>
                                                <td>Philosophy</td>
                                                <td>Punjabi</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 19:</td>
                                                <td>History of Islam</td>
                                                <td>Philosophy</td>
                                                <td>Urdu Adv.</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 20:</td>
                                                <td>English Elec.</td>
                                                <td>History of Islam</td>
                                                <td>Philosophy</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 21:</td>
                                                <td>Education</td>
                                                <td>Philosophy</td>
                                                <td>Psychology</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 22:</td>
                                                <td>Philosophy</td>
                                                <td>Psychology</td>
                                                <td>Sociology</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 23:</td>
                                                <td>Education</td>
                                                <td>Health & Physical Education</td>
                                                <td>Psychology</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 24:</td>
                                                <td>Education</td>
                                                <td>Health & Physical Education</td>
                                                <td>Sociology</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 25:</td>
                                                <td>Education</td>
                                                <td>Health & Physical Education</td>
                                                <td>Punjabi</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 26:</td>
                                                <td>Civics</td>
                                                <td>Computer Science</td>
                                                <td>Economics</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 27:</td>
                                                <td>Economics</td>
                                                <td>Psychology</td>
                                                <td>Statistics</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 28:</td>
                                                <td>Computer Science</td>
                                                <td>Economics</td>
                                                <td>Mathematics</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 29:</td>
                                                <td>Computer Science</td>
                                                <td>Economics</td>
                                                <td>Geography</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 30:</td>
                                                <td>Civics</td>
                                                <td>History of Islam</td>
                                                <td>Islamic Studies</td>
                                            </tr>
                                            <tr>
                                                <td>Set No. 31:</td>
                                                <td>Civics</td>
                                                <td>Geography</td>
                                                <td>History of Pakistan</td>
                                            </tr>
                                                <td>Set No. 32:</td>
                                                <td>Education</td>
                                                <td>Geography</td>
                                                <td>Health & Physical Education</td>
                                            </tr>
                                                <td>Set No. 33:</td>
                                                <td>Civics</td>
                                                <td>Education</td>
                                                <td>Persian</td>
                                            </tr>
                                                <td>Set No. 34:</td>
                                                <td>Economics</td>
                                                <td>Mathematics</td>
                                                <td>Statistics</td>
                                            </tr>
                                                <td>Set No. 35:</td>
                                                <td>Education</td>
                                                <td>Health & Physical Education</td>
                                                <td>Persian</td>
                                            </tr>
                                                <td>Set No. 36:</td>
                                                <td>Education</td>
                                                <td>Health & Physical Education</td>
                                                <td>Islamic Studies</td>
                                            </tr>
                                                <td>Set No. 37:</td>
                                                <td>Health & Physical Education</td>
                                                <td>History of Islam</td>
                                                <td>Punjabi</td>
                                            </tr>
                                                <td>Set No. 38:</td>
                                                <td>Civics</td>
                                                <td>Education</td>
                                                <td>Health & Physical Education</td>
                                            </tr>
                                                <td>Set No. 39:</td>
                                                <td>Health & Physical Education</td>
                                                <td>History of Pakistan</td>
                                                <td>Punjabi</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div><!-- set 6-39 ends -->
                    </div>
                </div>
            </div>
            <div class="bs-programs">
                <h2 class="heading-bs mb-4">BS 4 YEAR PROGRAMME</h2>
                <p class="text-bs">The College offers a unique range of BS 4 Year Programs, affiliated with University of the Punjab Lahore, designed to provide students a strong base for their academic and professional careers.</p>
                <h2 class="heading-mor-shift mt-4 mb-4">Morning Shift</h2>
                <div class="accordion" id="accordionBs">
                    <!-- BS-IT -->
                    <div class="card">
                        <div class="card-header" id="headingBsOne">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsOne" aria-expanded="true" aria-controls="collapseBsOne">
                                    Information Technology
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsOne" class="collapse" aria-labelledby="headingBsOne" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Information-Technology.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-IT ends -->
                    <!-- BS-Physics -->
                    <div class="card">
                        <div class="card-header" id="headingBsTwo">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsTwo" aria-expanded="true" aria-controls="collapseBsTwo">
                                    Physics
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsTwo" class="collapse" aria-labelledby="headingBsTwo" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Physics.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Physics ends -->
                    <!-- BS-Chemistry -->
                    <div class="card">
                        <div class="card-header" id="headingBsThree">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsThree" aria-expanded="true" aria-controls="collapseBsThree">
                                    Chemistry
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsThree" class="collapse" aria-labelledby="headingBsThree" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-chemistry.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Chemistry ends -->
                    <!-- BS-Mathematics -->
                    <div class="card">
                        <div class="card-header" id="headingBsFour">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsFour" aria-expanded="true" aria-controls="collapseBsFour">
                                    Mathematics
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsFour" class="collapse" aria-labelledby="headingBsFour" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Mathematics.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Mathematics ends -->
                    <!-- BS-Zoology -->
                    <div class="card">
                        <div class="card-header" id="headingBsFive">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsFive" aria-expanded="true" aria-controls="collapseBsFive">
                                    Zoology
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsFive" class="collapse" aria-labelledby="headingBsFive" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Zoology.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Zoology ends -->
                    <!-- BS-Botany -->
                    <div class="card">
                        <div class="card-header" id="headingBsSix">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsSix" aria-expanded="true" aria-controls="collapseBsSix">
                                    Botany
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsSix" class="collapse" aria-labelledby="headingBsSix" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-botany.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Botany ends -->
                    <!-- BS-English -->
                    <div class="card">
                        <div class="card-header" id="headingBsSeven">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsSeven" aria-expanded="true" aria-controls="collapseBsSeven">
                                    English
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsSeven" class="collapse" aria-labelledby="headingBsSeven" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-english.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-English ends -->
                    <!-- BS-Economics -->
                    <div class="card">
                        <div class="card-header" id="headingBsEight">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEight" aria-expanded="true" aria-controls="collapseBsEight">
                                    Economics
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEight" class="collapse" aria-labelledby="headingBsEight" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-economics.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Economics ends -->
                    <!-- BS-Statistics -->
                    <div class="card">
                        <div class="card-header" id="headingBsTen">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsNine" aria-expanded="true" aria-controls="collapseBsNine">
                                    Statistics
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsNine" class="collapse" aria-labelledby="headingBsNine" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Statistics.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Statistics ends -->
                    <!-- BS-Pol. Science -->
                    <div class="card">
                        <div class="card-header" id="headingBsTen">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsTen" aria-expanded="true" aria-controls="collapseBsTen">
                                    Political Science
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsTen" class="collapse" aria-labelledby="headingBsTen" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Political-Science.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Pol. Science ends -->
                    <!-- BS-History -->
                    <div class="card">
                        <div class="card-header" id="headingBs11">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBs11" aria-expanded="true" aria-controls="collapseBs11">
                                    History
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBs11" class="collapse" aria-labelledby="headingBs11" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-history.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Pol. Science ends -->
                    <!-- BS-Islamic Studies -->
                    <div class="card">
                        <div class="card-header" id="headingBs12">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBs12" aria-expanded="true" aria-controls="collapseBs12">
                                    Islamic Studies
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBs12" class="collapse" aria-labelledby="headingBs12" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Islamic-Studies.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Islamic Studies ends -->
                    <!-- BS-Urdu -->
                    <div class="card">
                        <div class="card-header" id="headingBs13">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBs13" aria-expanded="true" aria-controls="collapseBs13">
                                    Urdu
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBs13" class="collapse" aria-labelledby="headingBs13" data-parent="#accordionBs">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Urdu.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Urdu -->
                </div>
                <h2 class="heading-eve-shift mt-4 mb-4">Evening Shift</h2>
                <div class="accordion" id="accordionBsEve">
                    <!-- BS-IT -->
                    <div class="card">
                        <div class="card-header" id="headingBsEveOne">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEveOne" aria-expanded="true" aria-controls="collapseBsEveOne">
                                    Information Technology
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEveOne" class="collapse" aria-labelledby="headingBsEveOne" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Information-Technology.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-IT ends -->
                    <!-- BS-Physics -->
                    <div class="card">
                        <div class="card-header" id="headingBsEveTwo">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEveTwo" aria-expanded="true" aria-controls="collapseBsEveTwo">
                                    Physics
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEveTwo" class="collapse" aria-labelledby="headingBsEveTwo" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Physics.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Physics ends -->
                    <!-- BS-Chemistry -->
                    <div class="card">
                        <div class="card-header" id="headingBsEveThree">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEveThree" aria-expanded="true" aria-controls="collapseBsEveThree">
                                    Chemistry
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEveThree" class="collapse" aria-labelledby="headingBsEveThree" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-chemistry.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Chemistry ends -->
                    <!-- BS-Mathematics -->
                    <div class="card">
                        <div class="card-header" id="headingBsEveFour">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEveFour" aria-expanded="true" aria-controls="collapseBsEveFour">
                                    Mathematics
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEveFour" class="collapse" aria-labelledby="headingBsEveFour" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Mathematics.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Mathematics ends -->
                    <!-- BS-Zoology -->
                    <div class="card">
                        <div class="card-header" id="headingBsEveSix">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEveSix" aria-expanded="true" aria-controls="collapseBsEveSix">
                                    Zoology
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEveSix" class="collapse" aria-labelledby="headingBsEveSix" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Zoology.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Zoology ends -->
                    <!-- BS-Botany -->
                    <div class="card">
                        <div class="card-header" id="headingBsSeven">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsSeven" aria-expanded="true" aria-controls="collapseBsSeven">
                                    Botany
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsSeven" class="collapse" aria-labelledby="headingBsSeven" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>50</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-botany.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-Botany ends -->
                    <!-- BS-English -->
                    <div class="card">
                        <div class="card-header" id="headingBsEveEight">
                            <h2 class="mb-0 program-heading">
                                <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseBsEveEight" aria-expanded="true" aria-controls="collapseBsEveEight">
                                    English
                                </div>
                                <div>
                                    <i class="fa fa-chevron-circle-down chevron-icon"></i>
                                </div>
                            </h2>
                        </div>
                        <div id="collapseBsEveEight" class="collapse" aria-labelledby="headingBsEveEight" data-parent="#accordionBsEve">
                            <div class="card-body">
                                <div>
                                    <table class="table table-striped table-bordered">
                                        <tr>
                                            <td>Total Seats</td>
                                            <td>100</td>
                                        </tr>
                                        <tr>
                                            <td>For further details about the program, please click the details button.</td>
                                            <td><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-english.html" target="_blank" class="btn btn-sm btn-dark">Details</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- BS-English ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>
    <!-- footer -->
    <?php include 'footer.php' ?><!-- footer ends -->

    <script src="./backToTop/backToTop.js"></script>
    <script>
        $(document).on('click', '.program-heading', function(e) {
            var elm = $(e.target);
            var closest = elm.closest('.card-header');
            var req = closest.find('.chevron-icon');
            if(req.hasClass('fa-chevron-circle-down')) {
                req.removeClass('fa-chevron-circle-down');
                req.addClass('fa-chevron-circle-up');
            } else {
                req.removeClass('fa-chevron-circle-up');
                req.addClass('fa-chevron-circle-down');
            }
        })
    </script>
</body>
</html>
