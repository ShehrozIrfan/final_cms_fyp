<?php include('session.php'); ?>
<?php
if(!isset($_SESSION['login_user'])){
    header("location: index.php");
    die();
 } else if($_SESSION['is_super_admin'] == 'false') {
     header("location: dashboard.php");
 }
?>
<?php 

$query = "SELECT * FROM login WHERE is_approved = 'false'";

$result = mysqli_query($connection, $query);

if(!$result) {
    die("Query failed" . mysqli_error($connection));
}

?>

<?php 
//get all the previous approved/declined requests
$query = "SELECT * from login WHERE is_approved = 'approved' OR is_approved = 'declined' ORDER BY id";
$result_prev = mysqli_query($connection, $query);
if(!$result_prev) {
    die("Query failed" . mysqli_error($connection));
}

?>

<?php 
$msg = '';
$msgClass = '';
if(isset($_GET['ap_id'])) {
    $approve_id = $_GET['ap_id'];
    $query = "UPDATE login SET ";
    $query .= "is_approved = 'approved' ";
    $query .= "WHERE id = $approve_id";

    $result_ap = mysqli_query($connection, $query);
    if(!$result_ap) {
        die("Query failed...!" . mysqli_error($connection));
    } else {
        //send email
        $username = "GIGCCL";
        $toEmail = $_GET['email'];
        $subject = "Account approved!";
        $body = '<h2>Hi there!</h2>
                 <p>Your account has been approved by the admin!</p>
                 <p>You can now login to CMS(GIGCCL) using the credentials that you have set during signup.</p>
                 <p>Thanks.</p>
                 <p>For any queries feel free to contact us at:</p>
                 <p>giccllahore@gmail.com</p>
        ';
        //Email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
        //Additional headers
        $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
        if(mail($toEmail, $subject, $body, $headers)) {
            $msg = 'Account approved successfully and email has been sent!';
            $msgClass = 'success';
            header("Refresh:1; url=signup_requests.php");
        } else {
            $msg = "Sorry something went wrong!";
            $msgClass = "danger";
        }
    }
}

?>

<?php 

if(isset($_GET['dc_id'])) {
    $decline_id = $_GET['dc_id'];

    $query = "UPDATE login SET ";
    $query .= "is_approved = 'declined' ";
    $query .= "WHERE id = $decline_id";

    $result_dc = mysqli_query($connection, $query);
    if(!$result_dc) {
        die("Query failed...!" . mysqli_error($connection));
    }  else{
        //send email
        $username = "GIGCCL";
        $toEmail = $_GET['email'];
        $subject = "Account Declined!";
        $body = '<h2>Hi there!</h2>
                <p>We are sorry to say that, your account has been declined by admin!</p>
                <p>You can not login to CMS, GIGCCL.</p>
                <p>For any queries feel free to contact us at:</p>
                <p>giccllahore@gmail.com</p>
        ';
        //Email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
        //Additional headers
        $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
        if(mail($toEmail, $subject, $body, $headers)) {
            $msg = 'Account declined successfully and email has been sent!';
            $msgClass = 'success';
            header("Refresh:1; url=signup_requests.php");
        } else {
            $msg = "Sorry something went wrong!";
            $msgClass = "danger";
        }
    }
}

?>

<?php 

if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $query = "DELETE FROM login WHERE id = $delete_id";

    $result_d = mysqli_query($connection, $query);
    if(!$result_d) {
        die("Query failed...!" . mysqli_error($connection));
    }  else{
        //send email
        $username = "GIGCCL";
        $toEmail = $_GET['email'];
        $subject = "Account Deleted";
        $body = '<h2>Hi there!</h2>
                <p>Your account has been deleted from CMS(GIGCCL)!</p>
                <p>You now can not access CMS, GIGCCL.</p>
                <p>For any queries feel free to contact us at:</p>
                <p>giccllahore@gmail.com</p>
        ';
        //Email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset= UTF-8" . "\r\n";
        //Additional headers
        $headers .= "From: " . $username . "<" . 'noreply@gmail.com' . ">" . "\r\n";
        if(mail($toEmail, $subject, $body, $headers)) {
            $msg = 'Account deleted successfully and email has been sent!';
            $msgClass = 'success';
            header("Refresh:1; url=signup_requests.php");
        } else {
            $msg = "Sorry something went wrong!";
            $msgClass = "danger";
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
    <title>Signup Requests | GICCL</title>
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <style>
        .container-custom {
            width: 85%;
            margin-left: auto;
        }
        .container-inner {
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
        #signupRequests {
            margin-top: 100px;
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
    <?php include 'header.php' ?> <!-- header ends -->
    <div class="container-custom">
        <div class="container-inner">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div id="signupRequests">
                        <h2 class="text-center font-weight-bold mt-3 mb-3">Signup Requests</h2>
                        <?php if($msg != '') { ?>
                            <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible mt-5">
                            <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                                ×
                            </button>
                            <?php echo $msg ?>
                            </div>
                        <?php } ?>
                        <h4 class="mt-5"><u>Available Requests</u></h4>
                        <?php if(mysqli_num_rows($result) == 0) { ?>
                            <div class="alert alert-warning mt-4 mb-4">No signup requests found!</div>
                        <?php } else { ?>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                                <div class="mt-5 mb-5">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <td class="table-dark">Name: </td>
                                            <td class="table-secondary"><?php echo $row['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-dark">Email: </td>
                                            <td class="table-secondary"><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <a href="signup_requests.php?ap_id=<?php echo $row['id']; ?>&email=<?php echo $row['email']; ?> " class="btn btn-warning btn-sm btn-block" ><i class="fa fa-check pr-2"></i>Approve</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><a href="signup_requests.php?dc_id=<?php echo $row['id']; ?>&email=<?php echo $row['email']; ?> " class="btn btn-danger btn-sm btn-block"><i class="fa fa-times pr-2"></i>Decline</a></td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h4 class="text-center"><u>Previous Requests</u></h4>
                    <?php if(mysqli_num_rows($result_prev) == 0) { ?>
                            <div class="alert alert-warning text-center mt-4">No previous requests found!</div>
                        <?php } else { ?>
                            <?php while($row = mysqli_fetch_array($result_prev)){ ?>
                                <div class="mt-5 mb-5">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="table-dark">Name: </td>
                                            <td class="table-secondary" colspan="2"><?php echo $row['username']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-dark">Email: </td>
                                            <td class="table-secondary" colspan="2"><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-dark">Current Status: </td>
                                            <td class="table-warning font-weight-bold" colspan="2"><?php echo $row['is_approved']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-dark">Change status to: </td>
                                            <td class="font-weight-bold"><?php echo $row['is_approved'] == 'approved' ? 'Declined' : 'Approved'; ?></td>
                                            <td><a onClick="javascript: return confirm('Please confirm, you want to <?php echo $row['is_approved'] == 'approved' ? 'Decline' : 'Approve'; ?> this request');" href="signup_requests.php?<?php echo $row['is_approved'] == 'approved' ? 'dc_id=' : 'ap_id='; ?><?php echo $row['id']; ?>&email=<?php echo $row['email']; ?>" class="btn btn-secondary btn-sm"><?php echo $row['is_approved'] == 'approved' ? 'Decline' : 'Approve'; ?></a></td>
                                        </tr>
                                        <?php 
                                            if($row['is_approved'] == 'approved' || $row['is_approved'] == 'declined'):
                                        ?>
                                        <tr>
                                            <td colspan="3">
                                                <a onClick="javascript: return confirm('By deleting the account means that you want to remove this account details from the database. Are you sure, you want to delete this account.')" href="signup_requests.php?delete=<?php echo $row['id']; ?>&email=<?php echo $row['email']; ?>" class="btn btn-danger btn-block"><i class="fa fa-trash-o mr-2"></i>Delete Account</a>
                                            </td>
                                        </tr>
                                        <?php endif ?>
                                    </table>
                                </div>
                            <?php } ?>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <script src="./backToTop/backToTop.js"></script>
</body>
</html>
