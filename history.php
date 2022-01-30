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
    <title>History | GICCL</title>
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
      #about-text {
          padding-bottom: 30px;
      }
      .pd_top {
          padding-top: 100px;
      }
      .clear {
          clear: both;
      }
      .parallax {
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
          background-attachment: fixed;
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
      /* Media Queries - for mobile responsive */
      @media (max-width: 768px) {
          .box_ms h4 {
              font-size: 18px;
          }
          #ms_boxes h2, #s_news h2, #about h2, #contact h2 {
              font-size: 22px;
          }
          #about h3 {
              font-size: 20px;
          }

          #main_footer .row div {
              margin: 5px;
          }
          .news {
              margin: 5px;
          }
          .img-index-news {
              max-width: 100%;
              height: auto;
          }
          .index-news {
              margin: 20px;
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
      @media (max-width: 560px) {
          .header_parallax {
              height: 450px;
          }
          .header_parallax h2 {
              font-size: 25px;
          }
          .header_parallax a {
              margin-top: 10px;
              font-size: 12px;
              padding: 5px 15px 5px 15px;
          }
          .ms_box {
              width: 80%;
              margin-left: auto;
              margin-right: auto;
          }
          .ms_box_container .ms_box{
              float: none;
          }

          .simple_footer,.f_icons {
              float: none;
          }
          .f_icons {
              margin-top: 0px;
              margin-left: auto;
              margin-right: auto;
              text-align: center;
              margin-bottom: 15px;
          }

      }

    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?> <!-- header ends -->
    <div class="about-top-bg" id="about-top">
        <div class="every-top-bg">
            <h2 class="every-top-heading">History</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <h3 class="text-center font-weight-bold">A Brief History of Government Islamia College, Civil Lines, Lahore</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- section about -->
    <section id="about-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
             <div class="para_2">
              Government Islamia College, Civil Lines, Lahore is one of the top-ranking institutions of Punjab. Tracing the history of Islamia Graduate College, Civil Lines involves presenting illustrious educational chronicles of two highly influential educational movements of their times.
            </div>
            <div class="para_3">
              First, the Arya Samaj movement established DAV (Daya-Anand Ayur Vedic) School in the present building on June 1, 1886. The school was named after the founder of the Arya Samaj Movement, the prominent Hindu social worker Daya-Anand Sarasvati. Many prominent Lahorite philanthropists of the late 19th century generously contributed towards the construction of the grand building of the school. Every building shows list of people who contributed in the construction of that specific block.
            </div>
            <div class="para_3">
              Secondly, much earlier, the Anjuman Hamayat- e- Islam, under the president ship of rchiz1M. Flarnid-ud-Din had established its first Islamic School in 1884 to provide religious education to Muslim children. The same school located in Sheranwala Gate was upgraded to intermediate level by the name of Islamia College in 1892. In 1896 Islamia College was affiliated to the Punjab University and the first graduate programme was offered, matching the turn of the century, in 1900. It was at that time 'The only' Arts college in Punjab affiliated to the Punjab University. In 1907, the Anjuman, with the generous contributions from local Muslim philanthropists and funds collected by the Islamia College students over a period of seven years, had built a handsome block of buildings spread over 8 acres between Brandreth and Railway Road, Lahore, which we now know as Govt. Islamia College, Railway Road.
            </div>
            <div class="para_3">
              In 1947, just after the partition, when almost all the local population of Hindus migrated to India, and massive Muslim migration brought hundreds of thousands of distressed people to Lahore. During those times of great trial, the building of DAV. College housed hundreds of homeless Muslim immigrants from all over India. Later when the migrants were rehabilitated elsewhere, in half of the building, Licentiate State Medical School faculty- LSMF School was established. The other half of the DAV College building was handed over to 'Taleem ul Islam College' which was later moved to Rabwa in 1954. Anjuman- e-Hirnayat e Islam, the largest charity and welfare organization of its times, was able to acquire that part of the campus by offering to renovate the building with the support of the government of Punjab. The Anjuman shifted all its B.A and M.A classes to this campus under the name-Islamia College. When Licentiate State Medical Faculty School -LSMF School was moved to Bahawalpur in 1955, the emptied block and buildings were also handed over to Anjuman- e- Himayat Islam. So during the period 1954 to 1958, intermediate classes were held in Islamia College, Railway Road. B.A and M.A classes were held in Islamia College, Civil Lines. Both campuses were administered by the same Principal.
            </div>
            <div class="para_3">
              In 1958, the Anjuman decided to separate the two campuses under two different principals, while both Arts and Science intermediate classes were started in Civil Lines campus, B.A/B.Sc. and M.A/ classes were initiated on Railway Road campus. Besides equipping the youth with high quality education, the college also provided excellent co-curricular activities. Consequently, the college remained a rich source of talented sportsmen in all major sports like hockey, cricket, boxing, athletics, and football.
            </div>
            <div class="para_3">
              The college is presently going through its important phase that started over 44 years. s ago as a result of the policy of nationalization in 1972, when all private educational institutio.n were nationalized. Consequently, Islamia College became Government Islamia College, Civil Lines and has been run, since then, by the Ministry of Higher Education, the Government of the Punjab.
            </div>
            <div class="para_3">
              These 44 years witnessed furthergrowth both in the number of students and on campus buildings to house those large numbers of students. On 7th May 1990 a new Scl,en Block was built to accommodate growing number of science students. On April 22, 1996nder another one the Computer Block was established. Since the hostel lodging facility was 11998. enormous pressure, a three story new •block of students' hostel residences was built in.1.1 tines Being a college of exhibiting of high academic performance, Govt. Islamia College, Civil has always been under tremendous pressure to accommodate maximum number of students in various courses. To meet the growing need for rooms, the government established a Post Graduate Block in 2007. Now, another spacious academic block has been completed and made functional for academic activities
            </div>
            <div class="para_4">
              This is indeed a very brief introduction to a place blossoming with history and tradition. The human effort that went a long way to contribute to the betterment of this alma mater of distinction deserves a much larger mention and appreciation. The rooms, halls and corridors of this magnificent campus have seen probably hundreds of tireless teachers becoming role models for fresh and highly receptive youthful minds. The sons of the college are serving as educationists, researcher, engineers, doctors, public servants, politician, artists men in rank and plumes, with many a distinction. In law and politics Rana Muhammad Iqbal, Mian Manzoor Ahmad Watoo, Bilal Yasin, Mian Marghoob Ahmad and Malik Muhammad Munsaf Awan and in journalism and art Dr, Faqer Hussain Saga, Muhammad Hassan Askri, C.184. Munir, Mamoon Aiman, Hafeez Tahir and Adeel Burki and poets and men of letters Brig, R ) Sadique Salik, Amjad Islam Amjad, Dr, Gohar Naushahi, Dr. Tehseen Feraqi and 'IltalQureshi and in teaching Prof Airak Siprin, Prof Shuhrat Bukhari, Dr. Sajjad Bactar Rizvi and Dr, Zultigar Ali Malik and many others alumnies have proved their worth in their tes,Pective fields.The college also provides facilities to students participate in sports. Our indtined Players have always brought a good name and repute to the college and country in Khrrnati"al, Olympics and Asian games. For instance, the names of Sami Ullah Khan, Qasim 'Salem Sherwani Naveed Alan, Ahsan Ullah, Muhammad Naeem, Anjum Saeed and kaib4a,c1hishti in Hockey and Mohsin Kamal, Waseem Akiam, Massed, Amir Nazir, a;ed, Ashraf Ali, Faheem Ashraf and. Aleem Dar in cricket are worth mentioning.
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
