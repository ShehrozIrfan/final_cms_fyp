<?php include 'session.php'; ?>

<?php
if(!isset($_SESSION['login_user'])) {
    header('location: index.php');
    die();
  }
?>

<?php
   $msg = '';
   $msgClass = '';
   if(isset($_POST['update'])) {
        $email = $_SESSION['login_user'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['confirm_password'];
        if(strlen($password) < 8) {
            $msg = "Password must be atleast 8 characters!";
            $msgClass = "danger";
        }
        else {
            if($password != $password_confirmation) {
                $msg = "Password and Confirm Password didn't match!";
                $msgClass = "danger";
            } else {
                $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

                $query = "UPDATE login SET password = '$password' WHERE email ='$email'";

                $result = mysqli_query($connection,$query);

                if(!$result) {
                    die("Query Failed .. !" . mysqli_error($connection));
                } else {
                    $msg = "Password changed successfully!";
                    $msgClass = "success";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile | GICCL</title>
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
        #update_profile {
            margin-top: 100px;
        }
        .container-custom {
            width: 85%;
            margin-left: auto;
        }
        .container-inner {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        @media(max-width: 992px) {
            .container-custom {
                width: 90%;
                margin-left: auto;
                margin-right: auto;
            }
            .container-inner {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php'; ?> <!-- header ends -->
    <!-- contact section -->
    <section id="update_profile" class="pd_top">
        <div class="container-custom">
            <div class="container-inner">
                <h3 class="text-center font-weight-bold mt-3 mb-3">Update Password</h3>
                <?php if ($msg != ''): ?>
                <div class="alert alert-<?php echo $msgClass ?> text-center col-md-8 mx-auto mt-3 mb-3">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                            ×
                    </button>
                    <?php echo $msg ?>
                </div>
                <?php endif ?>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="update_profile.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['login_user']; ?>" disabled="true" required>
                            </div>
                            <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                            <button type="submit" name="update" class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o mr-2"></i>Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- contact section ends -->
</body>
</html>
