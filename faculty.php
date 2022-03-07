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
    <title>Departments | GICCL</title>
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
      .pd_top {
          padding-top: 100px;
      }
      #departments {
          margin-top: 95px;
      }
      .clear {
          clear: both;
      }
      .every-top-bg {
          /* background: url('assets/images/every-page-top-bg.jpg'); */
          /* background: #4169E1; */
          background: #FFEED8;
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
          color: black;
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
      .chevron-icon {
          font-size: 25px!important;
      }
      .parent-faculty-heading {
          display: flex;
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
    <section class="programs-offered" id="departments">
        <div class="every-top-bg">
            <h2 class="every-top-heading">FACULTY</h2>
        </div>
        <div class="container mt-3 mb-3">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class=" mb-0 parent-faculty-heading">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                DEPARTMENT OF COMPUTER SCIENCE
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mian Muhammad Munir Ud Din, M.Phil</td>
                                        <td>Head of Department Computer Science</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Muhammad Adnan, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Wajid Ali</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Abdul Mateen</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            DEPARTMENT OF ARABIC
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Hafiz Muhammad Saleem, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Hafiz Muhammad Anas Janjua, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            DEPARTMENT OF BOTANY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Zia ul Rehman</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Salman Randhawa</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Dr. M. Ghazanfar Ali Nasir</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Saqlain Abbas, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Muhammad Akhtar, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Muhammad Waheed</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Muhammad Waheed</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFour">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                            DEPARTMENT OF CHEMISTRY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Muhammad Akbar</td>
                                        <td>Professor</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Dr. Muhammad Salim</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Dr. Najeeb Ullah</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Tahir Haleem Khan, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Iqbal Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Talat Mahmood Alvi</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Munir Ahmad Khan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Mr. Haroon Rashid</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Syed Nayab Ali Shah</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Mr. Naveed Iqbal, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Mr. Mudassar Saddique, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Mr. Sagheer Ahmad, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Mr. Muazam Nasir, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Mr. Zafar Iqbal Tabassum, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Mr. Naveed ul lhsan, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr><tr>
                                        <td>16.</td>
                                        <td>Mr. Muhammad Sohail, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingFive">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            DEPARTMENT OF COMMERCE
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Ameer Ali, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Irfan Ahmad, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSix">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            DEPARTMENT OF ECONOMICS
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Syed Khurram Wasti</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. M. Mubarik Sulehri, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Azhar Ali, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Muhammad Shakeel, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Dr. Safdar Ali</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Muhammad Tariq</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Muhammad Shahid, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Dr. Khalil Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Mr. Muhammad Imran, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Malik Muhammad Imran, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Mr. Sheraz Qayyum</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Mr. M. Mudassar Naushahi, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Mr. Amjad Rizwan, M.Phil</td>
                                        <td>Lecturer</td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingSeven">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                            DEPARTMENT OF EDUCATION
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Muhammad Saleem, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Maqbool Ahmad</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading8">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse8" aria-expanded="true" aria-controls="collapse8">
                            DEPARTMENT OF ENGLISH LANGUAGE & LITERATURE
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Muhammad Ibrahim Awan</td>
                                        <td>Professor</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Dr. Umar Ud Din</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Syed M. Yousaf Irfan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Nasir Ali Shah</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Abdul Rahim</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mirza Ghulam Ali, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Naveed Akhtar Sameen, M.Phhil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Mr. Umar Hayyat</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Dr. Altaf Ur Rehman Malik</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Mr. Raheel Akhtar Spaui</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Rana Shafiq Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Mr. M. Akram Kharalvi, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Mr. Asad Ahmad Awan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Mr. Muhammad Nadeem Chohan, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Mr. Shafaqat Ali, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>16.</td>
                                        <td>Mr. Shabbir Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>17.</td>
                                        <td>Dr. Muhammad Siddique</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>18.</td>
                                        <td>Mr. Abdul Rafay Khan, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>19.</td>
                                        <td>Mr. Amir Mahmood Yousaf, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>20.</td>
                                        <td>Mr. M. Tanveer Yousaf, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>21.</td>
                                        <td>Ch. Tariq Rashid Bhatti</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>22.</td>
                                        <td>Mr. Mohsin Mujahid</td>
                                        <td>Lecturer</td>
                                    </tr><tr>
                                        <td>23.</td>
                                        <td>Mr. Nasir Ali Nasir</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>24.</td>
                                        <td>Hafiz Arfan Nawazish, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>25.</td>
                                        <td>Syed Muhammad Nauman, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>26.</td>
                                        <td>Mr. Yasir Iqbal, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr><tr>
                                        <td>27.</td>
                                        <td>Mr. Sohaib Akhtar Mand, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>28.</td>
                                        <td>Mr. Irshad Ullah, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr><tr>
                                        <td>29.</td>
                                        <td>Mr. Umar Yousaf</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading9">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse9" aria-expanded="true" aria-controls="collapse9">
                            DEPARTMENT OF GEOGRAPHY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Raiz Muhammad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading10">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse10" aria-expanded="true" aria-controls="collapse10">
                            DEPARTMENT OF HISTORY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Akhtar Hussain Sandhu</td>
                                        <td>Professor</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Syed Jamal Hussain Shah</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Muhammad Hanif Abbasi</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Muhammad Saleem</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Dr. Adnan Tariq</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Asim Farooq Sheikh</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Muhammad Asif, M.Phhil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Mr. Muhammad Ahmad Awan, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Mr. Muhammad Ahmad Sheikh, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading11">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse11" aria-expanded="true" aria-controls="collapse11">
                            DEPARTMENT OF ISLAMIAT
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Saif Ullah Faizi</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Syed Raghib Ilyas Shah</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Dr. Munir Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Dr. Khizer Hayat</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Dr. Ijaz Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Rashid Khan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Dr. Muhammad Awais</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Hafiz Zaka Ullah Khan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Mr. Mubashar Dawood, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Mr. Usman Haneef, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Mr. Naeem Hafeez, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading12">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse12" aria-expanded="true" aria-controls="collapse12">
                            DEPARTMENT OF LIBRARY & INFORMATION SCIENCE
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse12" class="collapse" aria-labelledby="heading12" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Muhammad Afaq</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Adeel Ahmad</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading13">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse13" aria-expanded="true" aria-controls="collapse13">
                            DEPARTMENT OF MATHEMATICS
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse13" class="collapse" aria-labelledby="heading13" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Farooq Ahmad</td>
                                        <td>Professor</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Muhammad Saleem</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Iqbal Haider Bhatti</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Muhammad Saeed, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Abdul Rashid</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Akhtar Abbas</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Mazhar Hussain, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Mr. Muhammad Mushtaq</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Mr. Muhammad Saleem Sulehri</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Mr. Faiz Farid, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Mr. Zia-ul-Haq</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Mr. Zeeshan Hussain, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Mr. Waqar Anwar Mirza</td>
                                        <td>Lecturer</td></td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Mr. Abdul Shakoor, M.Phil</td>
                                        <td>Lecturer.</td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Mr. M. Nadeem Bari, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>16.</td>
                                        <td>Mr. Zohaib Nadeem</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading14">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse14" aria-expanded="true" aria-controls="collapse14">
                            DEPARTMENT OF PERSIAN
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse14" class="collapse" aria-labelledby="heading14" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Jamshaid Azam Chishti, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Dr. Riaz Ahmad Shahid</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading15">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse15" aria-expanded="true" aria-controls="collapse15">
                            DEPARTMENT OF PHILOSOPHY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse15" class="collapse" aria-labelledby="heading15" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Qamar Hafeez</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading16">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse16" aria-expanded="true" aria-controls="collapse16">
                            DEPARTMENT OF PHYSICAL EDUCATION
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse16" class="collapse" aria-labelledby="heading16" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Safdar Ali Asif</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Tahir Mahmood</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Muhammad Zahid</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Qaisar Ali</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Muhammad Ali</td>
                                        <td>PET</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading17">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse17" aria-expanded="true" aria-controls="collapse17">
                            DEPARTMENT OF PHYSICS
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse17" class="collapse" aria-labelledby="heading17" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Tariq Ali, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Tajamal Khawar Rajput</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. M. Abbas Khalid, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Waris Ali, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Dr. Muhammad Javaid Afzal</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Kamran Ahmad Khan, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Dr. Daniel Yousaf</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Dr. Basit Ali</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Mr. Tariq Nadeem</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Hafiz Muhammad Siddique, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Mr. Umair Younus, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Mr. M. Khaleeq ur Rehman, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Mr. Muhammad Azim, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Mr. Zamran Rabeel, M.Phil</td>
                                        <td>Lecturer</td></td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Syed Jawad Hussain, M.Phil</td>
                                        <td>Lecturer.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading18">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse18" aria-expanded="true" aria-controls="collapse18">
                            DEPARTMENT OF POLITICAL SCIENCE
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse18" class="collapse" aria-labelledby="heading18" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Muhammad Khurshid</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Muhammad Ilyas</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Rana Muhammad Akram, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Abdul Hamid, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Anwaar Ahmad, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Muhammad Rashid, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Muhammad Yousaf</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading19">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse19" aria-expanded="true" aria-controls="collapse19">
                            DEPARTMENT OF PSYCHOLOGY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse19" class="collapse" aria-labelledby="heading19" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Muhammad Waseem Yar Khan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Dr. Kashif Faraz Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Syed Mohsin Raza Bukhari, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Nadeem Ahmad Chugtai</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading20">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse20" aria-expanded="true" aria-controls="collapse20">
                            DEPARTMENT OF PUNJABI
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse20" class="collapse" aria-labelledby="heading20" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Dr. Muhammad Asim Nadeem</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading21">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse21" aria-expanded="true" aria-controls="collapse21">
                            DEPARTMENT OF SOCIAL WORK
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse21" class="collapse" aria-labelledby="heading21" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Rana Ahmad Ali</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading22">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse22" aria-expanded="true" aria-controls="collapse22">
                            DEPARTMENT OF STAT
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse22" class="collapse" aria-labelledby="heading22" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Nadeem Ahmad Farooqi</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Asif Ali</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Muhammad Ramzan Khan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Muhammad Ijaz</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Mr. Asif Jamil, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. M. Waqas Aman Ullah Baig, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Mr. Farhan Hameed</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading23">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse23" aria-expanded="true" aria-controls="collapse23">
                            DEPARTMENT OF URDU
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse23" class="collapse" aria-labelledby="heading23" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Jamil Ahmad Adeel</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Dr. Aurangzaib Niazi</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Dr. Ishtiaq Ahmad</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Ashfaq Rasheed</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Dr. M. Asghar Yazdani</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Mr. Jawad Umar, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>7.</td>
                                        <td>Rana Tariq Ilyas</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>8.</td>
                                        <td>Mr. Muhammad Ishaq, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>9.</td>
                                        <td>Dr. Muhammad Aslam Bhatti</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>10.</td>
                                        <td>Mr. Hussain Nahir Khan</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>11.</td>
                                        <td>Dr. M. Arif Mughal</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>12.</td>
                                        <td>Mr. Muhammad Nawaz</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>13.</td>
                                        <td>Mr. M. Shahbaz, M.Phil</td>
                                        <td>Lecturer</td></td>
                                    </tr>
                                    <tr>
                                        <td>14.</td>
                                        <td>Mr. Mahver Abbas, M.Phil</td>
                                        <td>Lecturer.</td>
                                    </tr>
                                    <tr>
                                        <td>15.</td>
                                        <td>Mr. Ashraf Masih, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>16.</td>
                                        <td>Mr. Abdul Raheem</td>
                                        <td>Lecturer</td>
                                    </tr>
                                    <tr>
                                        <td>17.</td>
                                        <td>Mr. Mushtaq Ahmad Khan, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="heading24">
                        <h2 class="parent-faculty-heading mb-0">
                            <div class="btn btn-link btn-block text-left faculty-heading" type="button" data-toggle="collapse" data-target="#collapse24" aria-expanded="true" aria-controls="collapse24">
                            DEPARTMENT OF ZOOLOGY
                            </div>
                            <div>
                                <i class="fa fa-chevron-circle-down chevron-icon"></i>
                            </div>
                        </h2>
                    </div>
                    <div id="collapse24" class="collapse" aria-labelledby="heading24" data-parent="#accordionExample">
                        <div class="card-body">
                            <div>
                                <table class="table table-striped table-bordered">
                                    <tr>
                                        <td>1.</td>
                                        <td>Mr. Haq Nawaz</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Mr. Iftikhar Ahmad, M.Phil</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Mr. Muhammad Faisal Rehmat Ullah</td>
                                        <td>Assistant Prof.</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Mr. Usman Mushtaq, M.Phil</td>
                                        <td>Lecturer</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
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
    <script>
        $(document).on('click', '.faculty-heading', function(e) {
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
