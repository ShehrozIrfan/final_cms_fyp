<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
   $msg = '';
   $msgClass = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // Data sent from form
      $username = mysqli_real_escape_string($connection,$_POST['username']);
      $email = mysqli_real_escape_string($connection, $_POST['email']);
      $matchPassword = mysqli_real_escape_string($connection,$_POST['password']);
      $matchPassConfirmation = mysqli_real_escape_string($connection,$_POST['passwordConfirmation']);

      $_SESSION['signup_username'] = $username;
      $_SESSION['signup_email'] = $email;
      $_SESSION['signup_matchPassword'] = $matchPassword;
      $_SESSION['signup_passwordConfirmation'] = $matchPassConfirmation;


        if(!empty(trim($email)) && !empty(trim($username)) && !empty(trim($matchPassword)) && !empty(trim($matchPassConfirmation))) {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $msg = "Enter a valid email";
                $msgClass = "danger";
            }
            else if(strlen($username) < 3) {
                $msg = "Username must be atleast 3 characters!";
                $msgClass = "danger";
            }
            else if(strlen($matchPassword) < 8) {
                $msg = "Password must be atleast 8 characters!";
                $msgClass = "danger";
            }
            else if(strlen($matchPassword != $matchPassConfirmation)) {
                $msg = "Password & password confirmation doesn't match!";
                $msgClass = "danger";
            }
            else {
                $password = md5(mysqli_real_escape_string($connection, $matchPassword));
                $query = "INSERT INTO login(username, email, password, is_super_admin, is_approved) ";
                $query .= "VALUES('$username', '$email', '$password', 'false', 'false')";

                $result = mysqli_query($connection,$query);

                if(!$result) {
                    #die("Query Failed .. !" . mysqli_error($connection));
                    $msg = "Email already exists!";
                    $msgClass = "danger";
                } else {
                    //send email
                    $username = "GIGCCL";
                    $toEmail = $email;
                    $subject = "Signup Request Received";
                    $body = '<h2>Hi there!</h2>
                             <p>We have recieved your request for signup at CMS(GIGCCL), we will notify you once your account get approved!</p>
                             <p>Stay tuned.</p>
                             <p>For any queries feel free to contact us at:</p>
                             <p>giccllahore@gmail.com</p>
                    ';
                    //Email headers
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
                    //Additional headers
                    $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
                    if(mail($toEmail, $subject, $body, $headers)) {
                        $msg = "We have sent you an email for further steps.";
                        $msgClass = "warning";
                    } else {
                        $msg = "Sorry something went wrong!";
                        $msgClass = "danger";
                    }
                }

            }
        } else {
            $msg = "Fields must not be blank!";
            $msgClass = "danger";
        }
    }
?>

<?php

if(isset($_SESSION['login_user'])) {
  header("location: dashboard.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | GICCL</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        /* ===================================================== */
        /* ================ Modals - Login, Signup ========================= */
        .modal-heading {
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            margin-top: 30px;
        }
        .bg-modals {
            /* background: url('../images/college.png');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh; */
            background: linear-gradient(to right, #feac5e, #c779d0, #4bc0c8);
            height: 100vh;
        }
        .btn-login {
            display: inline-block;
            border-radius: 30px;
            background-color: #ff9000;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 17px;
            padding: 10px 50px;
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
        .login-input {
            background: #F4F4F4;
        }
        .login-signup-btn {
            color: #ff9000;
        }
        .login-signup-btn:hover {
            text-decoration: none;
            color: #ff9000;
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
        .eye-parent {
            position: absolute;
            top: 210px;
            right: 30px;
            color: #ff9000;
            cursor: pointer;
        }
        .icon-eye-show {
            margin-top: 4px;
            display: none;
        }
        .icon-eye-hide {
            display: block;
            margin-top: 4px;
        }
    </style>
</head>
<body>
    <div class="bg-modals"></div>
<script>
  $(document).ready(function() {
    $('#signupModal').modal('show');
  })
</script>
</body>
</html>
<div class="modal fade" id="signupModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="signupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="">
            <p class="modal-heading">Signup</p>
        </div>
        <div class="modal-body">
            <!-- contact section -->
            <section id="contact" class="">
                <div class="container">

                    <?php if ($msg != ''): ?>
                    <div class="alert alert-<?php echo $msgClass ?> text-center col-md-11 col-sm-12 col-xs-12 mx-auto mt-3 mb-3">
                        <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                ×
                        </button>
                        <?php echo $msg ?>
                    </div>
                    <?php endif ?>
                    <div class="row justify-content-center">
                        <div class="col-md-11 col-sm-12 col-xs-12">
                            <form action="signup.php" method="post">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control login-input" value="<?php if(isset($_SESSION['signup_username'])) echo $_SESSION['signup_username']; ?>" id="username" placeholder="Enter Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Email</label>
                                    <input type="email" name="email" class="form-control login-input" value="<?php if(isset($_SESSION['signup_email'])) echo $_SESSION['signup_email']; ?>" id="email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control login-input" value="<?php if(isset($_SESSION['signup_matchPassword'])) echo $_SESSION['signup_matchPassword']; ?>" id="password" placeholder="Enter Password" required>
                                <div class="eye-parent"><i class="fa fa-eye icon-eye-show" ></i><i class="fa fa-eye-slash icon-eye-hide"></i></div>
                                </div>
                                <div class="form-group">
                                <label for="password">Password Confirmation</label>
                                <input type="password" name="passwordConfirmation" class="form-control login-input" value="<?php if(isset($_SESSION['signup_passwordConfirmation'])) echo $_SESSION['signup_passwordConfirmation']; ?>" id="passwordConfirmation" placeholder="Confirm Password" required>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="login" class="btn-login">
                                        <span>Signup</span>
                                    </button>
                                </div>
                            </form>
                            <p class="text-center pt-3">Already have an account? <a href="login.php" class="login-signup-btn">Login</a></p>
                        </div>
                    </div>
                </div>
            </section><!-- contact section ends -->
        </div>
        <div class="modal-footer">
            <a href="index.php" type="button" class="cta" style="text-decoration: none;">
                <span>Go to Home</span>
                <svg width="15px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </a>
        </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.icon-eye-hide', function() {
        var password = document.getElementById('password');
        if(password.type == 'password') {
            password.type = 'text';
            $('.icon-eye-show').css('display', 'block');
            $('.icon-eye-hide').css('display', 'none');
        }
    })
    $(document).on('click', '.icon-eye-show', function() {
        var password = document.getElementById('password');
        if(password.type == 'text') {
            password.type = 'password';
            $('.icon-eye-show').css('display', 'none');
            $('.icon-eye-hide').css('display', 'block');
        }
    })
</script>