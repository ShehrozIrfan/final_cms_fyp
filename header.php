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
            background: white;
            /* border-bottom: 1px solid grey; */
            /* box-shadow: 2px 2px 2px grey; */
        }
        .nav-link {
            color: #0B1D39;
            font-size: 16px;
        }
        .nav-link:hover {
            color: black;
            /* border-bottom: 3px solid #2AACFE; */
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
        .navbar-toggler {
            border: 1px solid black;
            outline: none!important;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0,0,0, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");

        }
        /* Logos */
        #main_logo {
            margin-left: 20px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }
        #main_logo_dashboard {
            margin-left: 55px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .top-main-logo {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 150px;
            height: 130px;
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
        .admin-panel {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
            margin-top: 10px;
            text-decoration: underline;
            font-size: 14px;
        }
        .heading-admin-panel {
            text-decoration: none;
            color: black;
            font-size: 14px;
        }
        .last-item {
            margin-bottom: 100px;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .dropdown-menu {
            margin-top: 0px;
        }
        .center-nav-item {
            display: flex;
            align-items: center;
        }
        #navbar-all {
            padding: 10px;
        }
        .fa-caret-down {
            font-size: 12px;
            margin-top: 5px;
        }
        .notices {
            margin-left: 10px;
        }
        /* Media Queries */
        @media(max-width: 1200px) {
            .nav-link-research {
                padding-left: 0px!important;
            }
        }
        @media(max-width: 1200px) {
            .notices {
                margin-left: 0px;
            }
            .fa-caret-down {
                padding-left: 12px;
            }
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
            .last-item {
                margin-bottom: 0px;
            }
            #navbar-all {
                padding: 0px;
            }
        }
        @media(max-width: 600px) {
            .top-main-logo {
                width: 120px;
                height: 100px;
            }
            .center-nav-item {
                margin-top: 8px;
                margin-bottom: 8px;
            }
            .notices {
                margin-left: 0px;
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
        <nav class="navbar navbar-expand-xl fixed-top custom-navbar" id="navbarLanding">
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
                    <a class="nav-link vertical-navbar-link" href="post_notice.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post Notice</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="show_notice.php"><i class="fa fa-eye vertical-navbar-icon"></i>Show Notices</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="post_career.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post Career</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="show_careers.php"><i class="fa fa-eye vertical-navbar-icon"></i>Show Careers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="post_news.php"><i class="fa fa-plus-square vertical-navbar-icon"></i>Post News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="show_news.php"><i class="fa fa-eye vertical-navbar-icon"></i>Show News</a>
                </li>
                <?php if($_SESSION['is_super_admin'] == 'true'): ?>
                <li class="nav-item">
                    <a class="nav-link vertical-navbar-link" href="blog_requests.php"><i class="fa fa-th-large vertical-navbar-icon"></i>Blog Requests</a>
                </li>
                <li class="nav-item last-item">
                    <a class="nav-link vertical-navbar-link" href="signup_requests.php"><i class="fa fa-thumbs-up vertical-navbar-icon"></i>Signup Requests</a>
                </li>
                <?php endif ?>
            </ul>
            <?php endif ?>
            <ul class="navbar-nav ml-auto" id="navbar-all">
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
                    <a class="nav-link" href="update_profile.php"><i class="fa fa-edit pr-2"></i>Update Profile</a>
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
                <!-- Dropdown -->
                <li class="nav-item dropdown center-nav-item">
                    <a class="nav-link">
                        <a href="index.php" class=" nav-link">MAIN PAGE</a>
                        <span class="fa fa-caret-down "></span>
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="principal_message.php">Principal Message</a>
                    <a class="dropdown-item" href="about.php">About us</a>
                    <a class="dropdown-item" href="history.php">Brief History</a>
                    </div>
                </li><!-- Dropdown ends -->
                <!-- Dropdown -->
                <li class="nav-item center-nav-item dropdown">
                    <a class="nav-link">
                        <a href="#" class=" nav-link">ACADEMICS</a>
                        <span class="fa fa-caret-down "></span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="faculty.php">Faculty</a>
                        <a class="dropdown-item" href="programs_offered.php">Programs Offered</a>
                        <a class="dropdown-item" href="campus_life.php">Campus Life</a>
                    </div>
                </li><!-- Dropdown ends -->
                <li class="nav-item notices">
                    <a class="nav-link" href="notice.php"><!-- <i class="fa fa-bell mr-2"></i> -->NOTICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="show_all_news.php"><!-- <i class="fa fa-sticky-note mr-2"></i> -->NEWS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="careers.php">CAREERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php"><!-- <i class="fa fa-envelope mr-2"></i> --> CONTACT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="downloads.php">DOWNLOADS</a>
                </li>
                <!-- Dropdown -->
                <li class="nav-item center-nav-item dropdown">
                    <a class="nav-link">
                        <a href="blog.php" class=" nav-link">BLOG</a>
                        <span class="fa fa-caret-down "></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="login_blog.php">Login</a>
                    <a class="dropdown-item" href="signup_blog.php">Signup</a>
                    </div>
                </li><!-- Dropdown ends -->
                <!-- Dropdown -->
                <li class="nav-item dropdown center-nav-item">
                    <a class="nav-link">
                        <a href="#" class=" nav-link">MANAGEMENT</a>
                        <span class="fa fa-caret-down "></span>
                    </a>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Accounts Management</a>
                    <a class="dropdown-item" href="#">Admission Management</a>
                    <a class="dropdown-item" href="#">Attendance Management</a>
                    <a class="dropdown-item" href="#">Examination Management</a>
                    <a class="dropdown-item" href="#">Hostel Management</a>
                    </div>
                </li><!-- Dropdown ends -->
                <li class="nav-item nav-link-research pl-3">
                    <a class="nav-link" href="research.php">RESEARCH</a>
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
