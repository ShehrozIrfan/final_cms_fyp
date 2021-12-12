<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
    //Getting top 3 news
    $msg = '';
    $msgClass = '';
    $row;
    $query = "SELECT * FROM news ORDER BY id DESC LIMIT 3";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GIGCCL</title>
    <!-- font - Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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
/* ================ INDEX FILE ========================= */

/* Nav-bar */

/* Section Parallax */


.header_parallax {
    background-image: url('./assets/images/bg_parallax.png');
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.header_parallax h2 {
    font-size: 35px;
    line-height: 1.5em;
    font-weight: bold;
    color: black;
}
.header_parallax a {
    margin-top: 20px;
    padding: 10px 30px 10px 30px;
    border-radius: 10px;
}

/* Special button effect */
.cta {
    position: relative;
    margin: auto;
    padding: 12px 18px;
    transition: all 0.2s ease;
    border: none;
    background: none;
   }
   
   .cta:before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    display: block;
    border-radius: 50px;
    background: #ff9000;
    width: 45px;
    height: 45px;
    transition: all 0.3s ease;
   }
   
   .cta span {
    position: relative;
    font-family: "Ubuntu", sans-serif;
    font-size: 18px;
    font-weight: 700;
    letter-spacing: 0.05em;
    color: black;
   }
   
   .cta svg {
    position: relative;
    top: 0;
    margin-left: 10px;
    fill: none;
    stroke-linecap: round;
    stroke-linejoin: round;
    stroke: black;
    stroke-width: 2;
    transform: translateX(-5px);
    transition: all 0.3s ease;
   }
   
   .cta:hover:before {
    width: 100%;
    background: #ff9000;
   }
   
   .cta:hover svg {
    transform: translateX(0);
   }
   
   .cta:active {
    transform: scale(0.95);
   }


    /* Section MS */

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease-in;
        background-color: #343a40; /* #b05857  */
      }

      .b_1:hover .overlay {
        opacity: 1;
        border-radius: 10px;
      }
      .overlay h4  a {
          text-decoration: none;
          color: white;
      }

      .text {
        color: white;
        font-size: 20px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        text-align: center;
      }

    #ms_boxes {
        background: #f9f9f9;
        background-attachment: fixed;
    }
    #ms_boxes h2 {
        padding-top: 30px;
        padding-bottom: 20px;
        font-weight: bold;
    }
    .ms_img_1 {
        background-image: url('../images/accounts.png');
    }
    .ms_img_2 {
        background-image: url('../images/admission.png');
    }
    .ms_img_3 {
        background-image: url('../images/attendance.png');
    }
    .ms_img_4 {
        background-image: url('../images/exam.png');
    }
    .ms_img_5 {
        background-image: url('../images/hostel.png');
    }



    .ms_img_1:hover,.ms_img_2:hover,.ms_img_3:hover,.ms_img_4:hover,.ms_img_5:hover {
        opacity: 0.5;
    }
    .row_ms .box_ms {
        /* border: 2px solid coral; */
        max-height: 250px;
        margin-bottom: 30px;
    }
    .ms_img_div {
        height: 200px;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 10px;
    }
    .box_ms h4 {
        font-size: 18px;
        padding-top: 5px;
    }
    .box_ms a {
        color: black;
        text-decoration: none;
    }

    /* Section News */
    #s_news {
        padding-top: 30px;
        padding-bottom: 30px;
        background: #F0F9FC;
        color: black;
    }
    .dummy {
        height: 1000px;
        border: 2px solid green;
    }
    #s_news h2 {
        font-weight: bold;
    }
    #s_news .container {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .news {
        padding: 5px;
        border: 1px solid grey;
        border-radius: 10px;
    }
    .news_date {
        padding: 10px;
        font-size: 12px;
        display: block;
    }
    .news_title {
        padding: 10px;
        font-size: 14px;
        display: block;
    }
    .index-news-inner {
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
        background: white;
        min-height: 400px;
        padding: 20px;
        border-radius: 10px;
    }
    .img-index-news {
        width: 100%;
        height: 200px;
        display: block;
        margin-left: auto;
        margin-right: auto;
        border-radius: 10px;
    }
    .title-index-news {
        font-size: 18px;
        font-weight: bold;
        line-height: 1.5rem;
        padding-top: 20px;
    }
    .date-index-news {
        font-size: 15px;
    }
    .btn-index-news {
        margin-top: 10px;
    }
    .title-news {
        margin-top: 30px;
    }
    .description-news {
        margin-top: 30px;
    }

    .btn-login {
        display: inline-block;
        border-radius: 30px;
        background-color: #ff9000;
        border: none;
        color: #FFFFFF;
        text-align: center;
        font-size: 12px;
        padding: 5px 20px;
        transition: all 0.5s;
        cursor: pointer;
        margin: 5px;
        outline: none;
    }
    
    .btn-login span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        color: white;
    }

    .btn-login span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -15px;
        transition: 0.5s;
    }

    .btn-login:hover span {
        padding-right: 15px;
    }

    .btn-login:hover span:after {
        opacity: 1;
        right: 0;
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
    <?php include 'header.php' ?>
    <!-- section parallax -->
    <section>
        <div class="header_parallax parallax pd_top ">
            <div class="container">
                <div class="header_parallax_text">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <h2 class="">Welcome to GIGCCL</h2>
                    <p>GOVERNMENT ISLAMIA GRADUATE COLLEGE, CIVIL LINES, LAHORE is one of the first ranked institutions of the Punjab.</p>
                    <?php if(!isset($_SESSION['login_user'])): ?>
                      <a href="about.php" class="cta" style="text-decoration: none;">
                      <span>Brief History</span>
                      <svg width="15px" height="10px" viewBox="0 0 13 10">
                        <path d="M1,5 L11,5"></path>
                        <polyline points="8 1 12 5 8 9"></polyline>
                      </svg>
                    </a>
                    <?php endif ?>
                  </div>
                </div>
            </div>
        </div>
    </section><!-- section parallax ends-->

    <!-- section news-->
    <section id="s_news">
      <h3 class="text-center font-weight-bold mt-3 mb-5">News &amp; Updates</h3>
      <div class="container">
          <div class="row justify-content-center">
            <?php if(mysqli_num_rows($result)== 0){ ?>
                <div class="col-md-6 text-center alert alert-warning">No news found!</div>
            <?php } else { ?>  
            <?php while($row = mysqli_fetch_array($result)) { ?>
              <div class="col-md-4 col-sm-12 col-xs-12 index-news" >
                <div class="index-news-inner">
                  <div>
                    <div><img  src="images/news-images/<?php echo $row['filename']; ?>" class="img-index-news"></div>
                    <h3 class="title-index-news"><?php echo $row['title']; ?></h3>
                    <span class="date-index-news">Posted on <?php echo $row['date']; ?></span>
                  </div>
                    <a href="news.php?id=<?php echo $row['id'] ?>" class="btn-login" style="text-decoration: none;">
                      <span>Read</span>
                    </a>
                </div>
              </div>
            <?php } ?>
            <?php } ?>
          </div>
        <div class="row justify-content-center mt-5">
          <div class="col-md-6">
            <div class="text-center mt-3 mb-3">
                <a href="show_all_news.php" class="cta" style="text-decoration: none;">
                    <span>Click Here To View All</span>
                    <svg width="15px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                    </svg>
                </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- section news ends -->

    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <?php include 'footer.php' ?>
    <script src="./backToTop/backToTop.js"></script>
</body>
</html>