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
        border: 1px solid black;
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
                <h2 class="heading-inter-programs">Intermediate Programs</h2>
                <p class="text-inter-programs">College is offering following intermediate programs in morning and afternoon classes:</p>
                <div class="container text-uppercase">
                    <ol class="list">
                        <li>Pre Engineering</li>
                        <li>Pre Medical</li>
                        <li>ICS-Physics</li>
                        <li>ICS-Statistics</li>
                        <li>Humanities(Arts) [Morning Session Only]</li>
                        <li>Commerce(ICOM)</li>
                    </ol>
                </div>
                <div>
                    <h2 class="heading-inter-programs pb-2">Intermediate (First & Second Shift)</h2>
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
                    <h2 class="heading-inter-programs pt-4">Elective Subjects</h2>
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
                <h2 class="heading-bs">BS 4 YEAR PROGRAMME</h2>
                <p class="text-bs">The College offers a unique range of BS 4 Year Programs designed to provide students a strong base for their academic and professional careers.</p>
                <h2 class="heading-mor-shift">Morning Shift</h2>
                <div class="container text-uppercase">
                    <ol class="list">
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Information-Technology.html" target="_blank">BS IT</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Physics.html" target="_blank">PHYSICS</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-chemistry.html" target="_blank">CHEMISTRY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Mathematics.html" target="_blank">MATHEMATICS</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Zoology.html" target="_blank">ZOOLOGY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-botany.html" target="_blank">BOTANY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-english.html" target="_blank">ENGLISH</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-economics.html" target="_blank">ECONOMICS</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Statistics.html" target="_blank">STATISTICS</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Political-Science.html" target="_blank">POL. SCIENCE</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-history.html" target="_blank">HISTORY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Islamic-Studies.html" target="_blank">ISLAMIC STUDIES</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Urdu.html" target="_blank">URDU</a></li>
                    </ol>
                </div>
                <h2 class="heading-eve-shift">Evening Shift</h2>
                <div class="container">
                    <ol class="list">
                    <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Information-Technology.html" target="_blank">BS IT</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Physics.html" target="_blank">PHYSICS</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-chemistry.html" target="_blank">CHEMISTRY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Mathematics.html" target="_blank">MATHEMATICS</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-Zoology.html" target="_blank">ZOOLOGY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-botany.html" target="_blank">BOTANY</a></li>
                        <li><a href="http://pu.edu.pk/home/bs4yearsdegree/BS-4Years-english.html" target="_blank">ENGLISH</a></li>
                    </ol>
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
