<?php include 'session.php'; ?>

<?php
if(!isset($_SESSION['login_blog_user']))
{
  header("location: index.php");
}
?>

<?php 
$email = $_SESSION['login_blog_user'];
$query = "SELECT * FROM login_blog WHERE email = '$email'";
$result = mysqli_query($connection, $query);
$username;
$status;
$department;
if(!$result) {
    die("Query failed..." . mysqli_error($connection));
}
while($row = mysqli_fetch_array($result)) {
    $username = $row['username'];
    $status = $row['status'];
    $department = $row['department'];
}
?>

<?php
   $msg = '';
   $msgClass = '';
   if(isset($_POST['update_blog_profile'])) {
        $email = $_SESSION['login_blog_user'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['passwordConfirmation'];
        $username = $_POST['username'];
        $status = $_POST['status'];
        $department = $_POST['department'];
        
        if(strlen($username) < 3) {
            $msg = "Fullname must be atleast 3 characters!";
            $msgClass = "danger";
        } else if(strlen($password) < 8) {
            $msg = "Password must be atleast 8 characters!";
            $msgClass = "danger";
        } else if($password != $password_confirmation) {
            $msg = "Password and Confirm Password didn't match!";
            $msgClass = "danger";
        } else {
            $password = md5(mysqli_real_escape_string($connection,$_POST['password']));

            $query = "UPDATE login_blog SET username = '$username', status = '$status', department = '$department', password = '$password' WHERE email ='$email'";

            $result = mysqli_query($connection,$query);

            if(!$result) {
                die("Query Failed .. !" . mysqli_error($connection));
            } else {
                $msg = "Profile updated successfully!";
                $msgClass = "success";
                header("Refresh:1; url=update_blog_profile.php");
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
    <title>Update Blog Profile | GICCL</title>
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
                <h3 class="text-center font-weight-bold mt-3 mb-3">Update Profile</h3>
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
                        <form action="update_blog_profile.php" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="<?php echo $_SESSION['login_blog_user']; ?>" disabled="true" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Full Name</label>
                                <input type="text" name="username" class="form-control login-input" value="<?php echo $username; ?>" id="username" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group">
                            <label for="password">You're a?</label>
                            <select name="status" id="signupBlogStatus" class="form-control" required>
                                <option value="Student">Student</option>
                                <option value="Teacher">Teacher</option>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="password">Department</label>
                            <select name="department" id="signupBlogDepartment" class="form-control" required>
                                <option value="Computer Science">Computer Science</option>
                                <option value="English">English</option>
                                <option value="Urdu">Urdu</option>
                                <option value="Zoology">Zoology</option>
                                <option value="Botany">Botany</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Math">Math</option>
                                <option value="Islamiat">Islamiat</option>
                                <option value="Arabic">Arabic</option>
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control login-input" id="password" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password Confirmation</label>
                                <input type="password" name="passwordConfirmation" class="form-control login-input" id="passwordConfirmation" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                            <button type="submit" name="update_blog_profile" class="btn btn-primary btn-block"><i class="fa fa-pencil-square-o mr-2"></i>Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- contact section ends -->
</body>
</html>
