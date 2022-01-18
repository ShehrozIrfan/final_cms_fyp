<?php include 'session.php' ?>
<?php
if(isset($_SESSION['login_user'])) {
    header("location: show_notice.php");
}

if(isset($_SESSION['login_blog_user'])) {
    header("location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Life | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./backToTop/backToTop.css">

    <style>
        body {
          font-family: 'Poppins', sans-serif;
          font-size: 16px;
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
      #campus_life {
         margin-top: 95px;
      }
      .chevron-icon {
          font-size: 25px!important;
      }
      .program-heading {
          display: flex;
      }
      .btn-link {
         color: black;
      }
      .btn-link:hover {
         color: black;
         text-decoration: none;
      }
      .campus-life-img {
         max-width: 100%;
         height: 350px;
         border-radius: 5px;
         margin-top: 15px;
         margin-bottom: 15px;
      }
      @media(max-width: 600px) {
         .every-top-bg {
             min-height: 120px;
         }
         .every-top-heading {
             font-size: 22px;
         }
         .campus-life-img {
            height: auto;
         }
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <section id="campus_life">
      <div class="every-top-bg">
         <h2 class="every-top-heading">CAMPUS LIFE</h2>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <h5 class="mt-4">College provides several facilities to staff and students, which include hostel, transport, library, sports and various others. Visit the sections below: </h5>
            </div>
         </div>
         <div class="row mt-4 mb-5">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="accordion" id="accordionCampusLife">
                  <div class="card">
                     <div class="card-header" id="headingHostel">
                           <h2 class="mb-0 program-heading">
                              <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseHostel" aria-expanded="true" aria-controls="collapseHostel">
                                 <strong>Crescent Hostel</strong>
                              </div>
                              <div>
                                 <i class="fa fa-chevron-circle-down chevron-icon"></i>
                              </div>
                           </h2>
                     </div>
                     <div id="collapseHostel" class="collapse" aria-labelledby="headingHostel" data-parent="#accordionCampusLife">
                           <div class="card-body">
                              <div>
                                 <p><strong>Crescent Hostel,</strong> committed to provide quality amenities and secure atmosphere, is 'home away from home' for students who are offered numerous facilities to make their stay academically fruitful and comfortable. Limited boarding facility is available for students residing outside the city of Lahore. The students whose parents / guardians are residing or serving in Lahore are not entitled to get admission in the Hostel. Only bona-fide regular full-time students of Government Islamia College, Civil Lines, Lahore are eligible. The College does not guarantee the hostel boarding facility to all the students admitted to this college. Allocation of seats among various academic groups (Science, Arts, Commerce, BS-4 Year etc) is made on the proportional demand basis for each group. Admitted college students desirous of seeking admission in the hostel should obtain such prospectus from the Crescent Hostel. </p>
                              </div>
                              <div>
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <img src="assets/images/hostel_1.jpg" class="campus-life-img">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <img src="assets/images/hostel_2.jpg" class="campus-life-img">
                                    </div>
                                 </div>
                              </div>
                              <div>
                                 <p>The Hostel offers:</p>
                                 <ul>
                                    <li>Eco-friendly buildings</li>
                                    <li>Spacious Dining Halls</li>
                                    <li>Canteen</li>
                                    <li>Tuck Shop</li>
                                    <li>Fruit Shop</li>
                                    <li>Laundry</li>
                                    <li>Common room</li>
                                    <li>TV Lounge</li>
                                    <li>Mess</li>
                                    <li>Uninterrupted study in Library</li>
                                    <li>A stringent security system</li>
                                    <li>Graceful Air Conditioned Masjid</li>
                                 </ul>
                                 <p>The hostel remains a part of the College bound by certain rules and regulations which will facilitate a memorable stay for the boarders. The internal administration and discipline of the hostel is vested in the warden is assisted by the members of the Hostel Management Committee. The policies of the hostel are decided by the HMC under the overall guidelines and policies of the College. </p>
                              </div>
                           </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header" id="headingHostelLibraries">
                           <h2 class="mb-0 program-heading">
                              <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseLibraries" aria-expanded="true" aria-controls="collapseLibraries">
                                 <strong>Libraries</strong>
                              </div>
                              <div>
                                 <i class="fa fa-chevron-circle-down chevron-icon"></i>
                              </div>
                           </h2>
                     </div>
                     <div id="collapseLibraries" class="collapse" aria-labelledby="headingLibraries" data-parent="#accordionCampusLife">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-md-12">
                                    <p>There are <strong>two libraries</strong> in the College:</p>
                                    <ul>
                                       <li><strong>Main Library.</strong></li>
                                       <li><strong>Post-Graduate library.</strong></li>
                                    </ul>
                                    <p>All the books covering every area of study are available in the College Libraries and they offer a real treasure of literature and academic publications to the faculty and the students. Both the libraries contain more than 50,000 books with a wide range of periodicals to provide valuable material necessary for research, reference, and acquiring knowledge. New and latest books are added to cater for the needs of the readers. All the important National Dailies are available during library timings. The students are advised to make use of this treasure. The main library is to be utilized by all the college students whereas the postgraduate library is exclusively meant for postgraduate students. </p>
                                 </div>
                              </div>
                              <div>
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <img src="assets/images/library_1.jpg" class="campus-life-img">
                                    </div>
                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                       <img src="assets/images/library_2.jpg" class="campus-life-img">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <p><strong>Rules And Regulations of The Library</strong></p>
                                    <p>For the convenience of the students and the faculty, following are the usual timings to benefit from the libraries:</p>
                                    <table class="table table-bordered table-striped">
                                       <tr>
                                          <td>Summer</td>
                                          <td>08:00 AM to 06:00 PM</td>
                                       </tr>
                                       <tr>
                                          <td>Winter</td>
                                          <td>08:00 AM to 05:00 PM</td>
                                       </tr>
                                    </table>
                                    <p>College faculty and students can borrow books (faculty members can borrow up to 05 books for a month whereas the non-teaching staff would borrow only a single book for 15 days). The students cannot borrow more than three books at a time.</p>
                                    <p>Books are issued to the students for two weeks only. After the lapse of this period a fine of Rs.1/- per day is charged. The issue and returning dates of the book are not included in this period.</p>
                                    <p>College faculty can retain books for one month. After the expiry of this period, their return or re-issuance is mandatory. If the date of return of the books falls during summer vacation, they must be returned soon after the college resumes. It is mandatory for the faculty members and the students to return library books two weeks before the start of the summer vacation start or seek permission from the Principal to this effect; otherwise prescribed fine Would be charged including summer vacation.</p>
                                    <p>However, books for reading, during such vacation are issued three days prior to the start of said vacation as the libraries remain closed during this period for stock checking and other technical requirements.</p>
                                    <p>Books issued to a student cannot be transferred to another student unless they are returned to the library. A new original book has to be provided in case the library book has been damaged, smashed, torn off, spoiled or lost; usually, the return s ed books are received according to the laid down procedural rules. The price or fine of a book is not acceptable but only the original book is to be provided if the lost/damaged book relates to a series or set of books, otherwise, full price of the set of books will be charged.</p>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
                  <div class="card">
                     <div class="card-header" id="headingTransport">
                           <h2 class="mb-0 program-heading">
                              <div class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTransport" aria-expanded="true" aria-controls="collapseTransport">
                                 <strong>Transport</strong>
                              </div>
                              <div>
                                 <i class="fa fa-chevron-circle-down chevron-icon"></i>
                              </div>
                           </h2>
                     </div>
                     <div id="collapseTransport" class="collapse" aria-labelledby="headingTransport" data-parent="#accordionCampusLife">
                        <div class="card-body">
                           <div>
                              <p><strong>Five college buses</strong> are provided for traveling facility to the students on the specified routes. In view of the present working conditions of these buses, this facility is made available for routes within the city only. The recurring expenses of these buses are net out of college transport fund. No financial assistance is granted by the government All the college students bearing college identity card are allowed to travel by these buses on the routes specified by the college. It is pertinent for the students to behave decently and co-operate with the driver and conductor. Any complaint regarding the bus staff can be lodged with the Chief Proctor / Transport Committee. Anybody found damaging the buses would be fined heavily.</p>
                              <p><strong>Note:</strong> Transport FUND: Each and every student shall pay Rs. 150/- per academic year. The students who intend to avail the transport facility regularly, shall have to pay Rs. 750/- per month over and above the said Rs. 150/-</p>
                           </div>
                           <div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <img src="assets/images/transport_1.jpg" class="campus-life-img">
                                 </div>
                                 <div class="col-md-6 col-sm-12 col-xs-12">
                                    <img src="assets/images/transport_2.jpg" class="campus-life-img">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
    </section>

    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <?php include 'footer.php'; ?>
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
