<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | GICCL</title>
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <style>
        /* ===================================================== */
        /* ================ Header FILE ========================= */
        .custom-navbar {
            background: #ffffff;
            border: 1px solid grey;
            box-shadow: 2px 2px 2px grey;
        }
        .nav-link {
            color: black;
            font-size: 15px;
        }
        .nav-link:hover {
            color: black;
        }
        .nav-link-login {
            color: #ff9000;
        }
        .nav-link-login:hover {
            color: #ff9000;
        }
        .nav-link-signup {
            background: #ff9000;
            border-radius: 20px;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 5px;
            color: white;
            margin-top: 5px;
        }
        .nav-link-signup:hover {
            color: white;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0,0,0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");

        }
        /* Logos */
        #main_logo {
            margin-left: 50px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
        }
        #main_logo_dashboard {
            margin-left: 55px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        /* Vertical Navbar */
        .vertical-nav {
            margin-top: 29px;
        }
        .vertical-navbar-link {
            text-align: center;
        }
        .vertical-navbar-icon {
            display: block;
            font-size: 30px;
        }
        @media (min-width:992px) {
            .vertical-nav {
                position: fixed;
                top: 56px;
                left: 0;
                width: 200px;
                height: 100%;
                background-color: #f8f8f8;
                overflow-y: auto;
                padding-top: 30px
            }
            }
        @media(max-width: 992px) {
            #main_logo {
                margin-left: 0px;
            }
            #main_logo_dashboard {
                margin-left: 0px;
            }
            .vertical-navbar-link {
                text-align: left;
            }
            .vertical-navbar-icon {
                display: inline;
                font-size: 20px;
                padding-right: 10px;
            }
        }
    </style>
</head>
<body>
<!-- header -->
<header>
    <!-- nav-bar -->
    <?php if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user'])){ ?>
        <nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark">
        <a class="navbar-brand" href="index.php"><img src="assets/images/main_logo.jpeg" id="main_logo_dashboard" ></a>
    <?php } else { ?>
        <nav class="navbar navbar-expand-xl fixed-top custom-navbar">
        <a class="navbar-brand" href="index.php"><img src="assets/images/main_logo.jpeg" id="main_logo" ></a>
    <?php } ?>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if(isset($_SESSION['login_blog_user'])): ?>
                <ul class="navbar-nav mr-auto flex-column vertical-nav bg-dark">
                    <li class="nav-item">
                        <a class="nav-link vertical-navbar-link" href="dashboard.php"><i class="fa fa-home vertical-navbar-icon"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link vertical-navbar-link" href="post_article.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link vertical-navbar-link" href="published_articles.php"><i class="fa fa-eye vertical-navbar-icon"></i>My published Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link vertical-navbar-link" href="waiting_approval_articles.php"><i class="fa fa-pause vertical-navbar-icon"></i>Waiting Approval Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link vertical-navbar-link" href="not_accepted_articles.php"><i class="fa fa-times vertical-navbar-icon"></i>Not Accepted Articles</a>
                    </li>
                </ul>
            <?php endif ?>
            <?php if(isset($_SESSION['login_user'])): ?>
            <ul class="navbar-nav mr-auto flex-column vertical-nav bg-dark">
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="dashboard.php"><i class="fa fa-home vertical-navbar-icon"></i>Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="post_news.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="show_news.php"><i class="fa fa-eye vertical-navbar-icon"></i>Show News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="post_notice.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post Notice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="show_notice.php"><i class="fa fa-eye vertical-navbar-icon"></i>Show Notices</a>
                </li>
                <?php if($_SESSION['is_super_admin'] == 'true'): ?>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="blog_requests.php"><i class="fa fa-th-large vertical-navbar-icon"></i>Blog Requests</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="signup_requests.php"><i class="fa fa-thumbs-up vertical-navbar-icon"></i>Signup Requests</a>
                </li>
                <?php endif ?>
            </ul>
            <?php endif ?>
            <ul class="navbar-nav ml-auto">
            <?php if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user'])){ ?>
                <!-- Dropdown -->
                <?php if(isset($_SESSION['login_user'])): ?>
                <li class="nav-item dropdown mr-5 d-none">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-tasks mr-2"></i>Management
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Accounts Management</a>
                    <a class="dropdown-item" href="#">Admission Management</a>
                    <a class="dropdown-item" href="#">Attendance Management</a>
                    <a class="dropdown-item" href="#">Examination Management</a>
                    <a class="dropdown-item" href="#">Hostel Management</a>
                    </div>
                </li><!-- Dropdown ends -->
                <li class="nav-item mr-5">
                    <a class="nav-link" href="update_profile.php"><i class="fa fa-edit pr-2"></i>Update Password</a>
                </li>
                <?php endif ?>
                <?php if(isset($_SESSION['login_blog_user'])): ?>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="update_blog_profile.php"><i class="fa fa-edit pr-2"></i>Update Profile</a>
                </li>
                <?php endif ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"><i class="fa fa-sign-out pr-2"></i>Logout</a>
                </li>
            <?php } else { ?>
                <li class="nav-item mr-5">
                  <a class="nav-link" href="index.php"><i class="fa fa-home pr-2"></i>Home</a>
                </li>
                <!-- Dropdown -->
                <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fa fa-tasks mr-2"></i>Management
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Accounts Management</a>
                    <a class="dropdown-item" href="#">Admission Management</a>
                    <a class="dropdown-item" href="#">Attendance Management</a>
                    <a class="dropdown-item" href="#">Examination Management</a>
                    <a class="dropdown-item" href="#">Hostel Management</a>
                    </div>
                </li><!-- Dropdown ends -->

                  <li class="nav-item mr-5 d-none">
                    <a class="nav-link" href="about.php"><i class="fa fa-book mr-2"></i>About</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="notice.php"><i class="fa fa-bell mr-2"></i>Notice</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="show_all_news.php"><i class="fa fa-sticky-note mr-2"></i>News</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="blog.php"><i class="fa fa-th-large mr-2"></i>Blog</a>
                  </li>
                  <li class="nav-item mr-5">
                    <a class="nav-link" href="contact.php"><i class="fa fa-envelope mr-2"></i>Contact</a>
                  </li>
                  <li class="nav-item mr-5 d-none">
                    <a class="nav-link nav-link-login" href="login.php" id="loginBtn"><i class="fa fa-sign-in mr-2"></i>Login</a>
                  </li>
                  <li class="nav-item mr-5 d-none">
                    <a class="btn btn-sm nav-link-signup" href="signup.php" id="loginBtn"><i class="fa fa-user-plus mr-2"></i>Sign up</a>
                  </li>                
            <?php } ?>
            </ul>
        </div>
    </nav>
</header><!-- header ends -->
</body>
</html>
