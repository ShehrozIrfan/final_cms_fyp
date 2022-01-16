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
      // email and password sent from form
      $email = mysqli_real_escape_string($connection,$_POST['email']);
      $password = md5(mysqli_real_escape_string($connection,$_POST['password']));
      
      $query = "SELECT * FROM login_blog WHERE email = '$email' and password = '$password'";

      $result = mysqli_query($connection,$query);

      #$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);


      // If result matched $email and $password, table row must be 1 row

      if($count == 1) {
        $_SESSION['login_blog_user'] = $email;
        while($row = mysqli_fetch_array($result)) {
            $_SESSION['login_blog_id'] = $row['id'];
            $_SESSION['login_blog_username'] = $row['username'];
            $_SESSION['login_blog_status'] = $row['status'];
            $_SESSION['login_blog_department'] = $row['department'];
        }
        
        header("location: dashboard.php");
      }
      else {
        $msg = "Invalid email/password combination";
        $msgClass = "danger";   
      }
    }
?>

<?php

if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user'])) {
  header("location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Login | GICCL</title>
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


    </style>
</head>
<body>
  <div class="bg-modals"></div>
<script>
  $(document).ready(function() {
    $('#loginModal').modal('show');
  })
</script>
</body>
</html>
<div class="modal fade" id="loginModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="">
            <p class="modal-heading">Login(blog)</p>
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
                            <form action="login_blog.php" method="post">
                                <div class="form-group">
                                    <label for="email"><span class="login-label">Email</span></label>
                                    <input type="email" name="email" class="form-control login-input" id="email" placeholder="Enter Email" required>
                                </div>
                                <div class="form-group">
                                <label for="password"><span class="login-label">Password</span></label>
                                <input type="password" name="password" class="form-control login-input" id="password" placeholder="Enter Password" required>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" name="login" class="btn-login">
                                        <span>Login</span>
                                    </button>
                                </div>
                            </form>
                            <p class="text-center pt-3">Don't have an account? <a href="signup_blog.php" class="login-signup-btn">Signup</a></p>
                        </div>
                    </div>
                </div>
            </section><!-- contact section ends -->
        </div>
        <div class="modal-footer">
            <a href="blog.php" type="button" class="cta" style="text-decoration: none;">
                <span>Go to Blog</span>
                <svg width="15px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </a>
        </div>
        </div>
    </div>
</div>
