<?php include 'session.php'; ?>
<?php
if(!isset($_SESSION['login_user']))
{
  header("location: index.php");
}
?>
<?php
   $career_id;
if(isset($_GET['career_id'])) {
    $career_id = $_GET['career_id'];
    $_SESSION['career_id'] = $career_id;
    //Getting all the applicants who have applied to this specific career.
    $query = "SELECT * ";
    $query .= "FROM applicants ";
    $query .= "LEFT JOIN career_applicants ";
    $query .= "ON applicants.id = career_applicants.applicant_id ";
    $query .= "LEFT JOIN careers ";
    $query .= "ON career_applicants.career_id = careers.id ";
    $query .= "WHERE career_id = '$career_id' ";
    $query .= "ORDER BY applicants.id DESC";

    $result = mysqli_query($connection, $query);
    if(!$result) {
       die("Query Failed .." . mysqli_error($connection));
    }
}
?>
<?php

if(isset($_GET['delete_applicant_id'])) {
   $id = $_GET['delete_applicant_id'];
   $query_delete_applicant = "DELETE FROM applicants WHERE id = '$id'";
   $result_delete_applicant = mysqli_query($connection, $query_delete_applicant);
   if(!$result_delete_applicant) {
      die("Query Failed .. " . mysqli_error($connection));
   } else {
      $msg = "Applicant deleted successfully!";
      $msgClass = "success";
      $session_career_id = $_SESSION['career_id'];
      header("Refresh:1; url=applicants.php?career_id=" . $session_career_id);
   }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Applicants | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <style>
        #show_news {
            margin-top: 100px;
        }
        .img-show-news {
            /* width: 500px;
            height: auto;
            display: block;
            margin-left: auto;
            margin-right: auto; */
        }
        .title-show-news {
            font-size: 25px;
            font-weight: bold;
            line-height: 2.5rem;
        }
        .description-show-news {
            font-size: 18px;
            text-align: justify;
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
        .last_date {
            font-size: 15px;
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
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section create news -->
    <section id="show_news" class="pd_top mb-5">
    <div class="container-custom">
        <div class="container-inner">
            <h2 class="text-center font-weight-bold mt-3 mb-3">Applicants</h2>
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-12 col-xs-12">
                <?php if($msg != '') { ?>
                    <div class="alert alert-<?php echo $msgClass ?> text-center alert-dismissible">
                    <button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">
                        ×
                    </button>
                    <?php echo $msg ?>
                    </div>
                <?php } ?>
                <?php if(mysqli_num_rows($result)== 0){ ?>
                    <div class="text-center alert alert-warning">No Applicant found!</div>
                 <?php } else { ?>
                <?php
                while ($row = mysqli_fetch_array($result)) { ?>
                    <table class="table table-bordered">
                   <tr>
                        <td><span class="font-weight-bold">First name: </span></td>
                        <td><?php echo $row['first_name']; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Last name: </span></td>
                        <td><?php echo $row['last_name']; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Email: </span></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">CNIC: </span></td>
                        <td><?php echo $row['cnic']; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Contact: </span></td>
                        <td><?php echo $row['contact']; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Date applied: </span></td>
                        <td><?php echo $row['date_applied']; ?></td>
                    </tr>
                    <tr>
                        <td><span class="font-weight-bold">Resume</span></td>
                        <td>
                            <div><a href="./images/applicant-resumes/<?php echo $row['resume']; ?>" class="btn btn-sm btn-primary" download>Download</a></div>
                        </td>
                    </tr>
                    <tr>
                       <td colspan='2'>
                          <a href="mailto: <?php echo $row['email']; ?>" class="btn btn-block btn-warning">Reply with email</a>
                       </td>
                    </tr>
                    <tr>
                       <td colspan='2'>
                          <a onClick="javascript: return confirm('Please confirm applicant deletion!');" href="applicants.php?career_id=<?php echo $career_id ?>&delete_applicant_id=<?php echo $row['applicant_id']; ?>" class="btn btn-block btn-danger" name='delete_applicant'>Delete applicant</a>
                       </td>
                    </tr>
                   </table>
                   <hr>
                <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </section><!-- section create news ends -->
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <script src="./backToTop/backToTop.js"></script>
</body>
</html>
