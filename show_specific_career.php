<?php include 'session.php'; ?>
<?php
if(isset($_SESSION['login_user']) || isset($_SESSION['login_blog_user']))
{
  header("location: dashboard.php");
}
?>
<?php
    $query = "SELECT * FROM careers WHERE status='Open' ORDER BY id DESC";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>

<?php
    $id = $_GET['id'];
    $query = "SELECT * FROM careers where id = '$id'";
    $result = mysqli_query($connection, $query);
    if(!$result) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
?>

<?php
if(isset($_POST['apply-btn'])) {
    //resume
    $filename = $_FILES["resume"]["name"];

    //extension main image
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $tempname = $_FILES["resume"]["tmp_name"];

    // $filename = uniqid($filename) . '.' .$ext;
    $filename = time() . "_" . $filename;

    $folder = "./images/applicant-resumes/".$filename;

    $career_id = (int)$_POST['career-id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $cnic = $_POST['cnic'];
    $contact = $_POST['contact'];

    $date = date('Y-m-d');

    $query_add_career = "INSERT INTO applicants (first_name, last_name, email, cnic, contact, resume, date_applied, applied_to_career_id) VALUES('$first_name','$last_name', '$email', '$cnic', '$contact', '$filename', '$date', '$career_id')";

    $result_add_career = mysqli_query($connection, $query_add_career);
    if(!$result_add_career) {
        die("Query Failed .. !" . mysqli_error($connection));
    }
    else {
        // Now let's move the uploaded image/file into the folder: career-images
        if (move_uploaded_file($tempname, $folder))  {
            $query_find_applicant = "SELECT * from applicants where email = '$email'";
            $result_find_applicant = mysqli_query($connection, $query_find_applicant);
            if($result_find_applicant) {
                while($row = mysqli_fetch_array($result_find_applicant)) {
                    $applicant_id = $row['id'];
                }
                $query_career_applicants = "INSERT INTO career_applicants (career_id, applicant_id) VALUES ('$career_id', '$applicant_id')";
                $result_career_applicants = mysqli_query($connection, $query_career_applicants);

                if(!$result_career_applicants) {
                    die("Query Failed .. !" . mysqli_error($connection));
                }
            }
            $msg = "Successfully applied for the job!";
            $msgClass = "success";
            // header("Refresh:2; url=careers.php");
            } else {
                die("Query Failed .. !" . mysqli_error($connection));
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
    <title>Career Details | GICCL</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./backToTop/backToTop.css">
    <link rel="stylesheet" href="./assets/styles/animations.css">

    <style>
        body {
          font-family: 'Poppins', sans-serif;
          font-size: 16px;
        }
        #show_news {
            margin-top: 95px;
        }
        .every-top-bg {
          /* background: url('assets/images/every-page-top-bg.jpg'); */
          background: #4169E1;
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
      .text-black {
          color: black;
      }
      .job-description {
        border: 1px solid black;
        padding: 20px;
        border-radius: 10px;
        font-size: 20px;
      }
      .apply-online-modal-body {
          padding: 30px;
      }
      @media(max-width: 600px) {
        .every-top-bg {
            min-height: 120px;
        }
        .every-top-heading {
            font-size: 22px;
        }
      }
    </style>
</head>
<body>
    <!-- header -->
    <?php include 'header.php' ?><!-- header ends -->

    <!-- section create news -->
    <section id="show_news" class="pd_top mb-5">
        <div class="every-top-bg">
            <h2 class="every-top-heading">Careers</h2>
        </div>
    <div class="container mt-3 mb-3">
        <div class="">
            <div class="row justify-content-center mt-5">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <?php while($row = mysqli_fetch_array($result)) { ?>
                    <table class="table table-sm table-bordered">
                      <thead class="bg-dark text-white">
                        <th>Last Date</th>
                        <th>Posted On</th>
                        <th>Status</th>
                      </thead>
                      <tr>
                        <td><?php echo $row['last_date']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                      </tr>
                    </table>
                    <div class="job-description">
                      <h5><strong>Job Description</strong></h5>
                      <p><?php echo $row['description']; ?></p>
                      <hr>
                      <a href="images/career-images/<?php echo $row['filename']; ?>" title="click to download the notice" download class="btn btn-dark"><span>Download Details</span></a>
                      <?php if($row['status'] == 'Open'): ?>
                        <button class="btn btn-primary apply-online-btn" career-id="<?php echo $row['id']; ?>" >Apply Online</button>
                      <?php endif ?>
                    </div>
                  <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </section><!-- section create news ends -->
    <!-- back to top -->
    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-chevron-circle-up"></i></a>

    <?php include 'footer.php'; ?>
    <script src="./backToTop/backToTop.js"></script>

    <script>
        $(document).on('click', '.apply-online-btn', function(e) {
            $('#applyOnlineModal').modal('show');
            $('#apply-online-first-name').val('');
            $('#apply-online-last-name').val('');
            $('#apply-online-email').val('');
            $('#apply-online-contact').val('');
            $('#apply-online-cnic').val('');
            $('#apply-online-resume').val('');
            $('#apply-online-error').css('display', 'none');

            var elm = $(e.target)
            var career_id = elm.attr('career-id')
            $('#modal-career-id').val(career_id)
        })

        $(document).on('click', '#apply-online-apply-btn', function(e) {
            var first_name = $('#apply-online-first-name').val()
            var last_name = $('#apply-online-last-name').val()
            var email = $('#apply-online-email').val()
            var contact = $('#apply-online-contact').val()
            var cnic = $('#apply-online-cnic').val()
            var resume = $('#apply-online-resume').val()
            var error_msg = $('#apply-online-error')
            var email_regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var number_regex = /^[0-9]+$/

            var submitForm = true;

            if(first_name.trim().length == 0) {
                error_msg.css('display', 'block');
                error_msg.text("First name can't be blank!");
                submitForm = false;
            } else if (first_name.trim().length < 3) {
                error_msg.css('display', 'block');
                error_msg.text("First name can't be less than 3 characters!");
                submitForm = false;
            } else if(last_name.trim().length == 0) {
                error_msg.css('display', 'block');
                error_msg.text("Last name can't be blank!");
                submitForm = false;
            } else if (last_name.trim().length < 3) {
                error_msg.css('display', 'block');
                error_msg.text("Last name can't be less than 3 characters!");
                submitForm = false;
            } else if(!email_regex.test(email)) {
                error_msg.css('display', 'block');
                error_msg.text("Please enter a valid email address!");
                submitForm = false;
            } else if(cnic.trim().length < 13 || !cnic.match(number_regex)){
                error_msg.css('display', 'block');
                error_msg.text("Please enter a valid CNIC number of 13 digits without any '-'");
                submitForm = false;
            } else if(contact.trim().length < 11 || !contact.match(number_regex)) {
                error_msg.css('display', 'block');
                error_msg.text("Please enter a valid phone number with 11 digits without any '-' and '+' ");
                submitForm = false;
            } else if(resume.length == '') {
                error_msg.css('display', 'block');
                error_msg.text("Please upload your resume!");
                submitForm = false;
            } else if(resume.split('.').pop() != 'pdf') {
                error_msg.css('display', 'block');
                error_msg.text("Only pdf files are allowed. Please upload your resume in pdf format!");
                submitForm = false;
            } else {
                submitForm = true;
            }

            if(submitForm == false) {
                e.preventDefault();
            } else {
                error_msg.removeClass('alert-danger');
                error_msg.addClass('alert-success');
                error_msg.text("You've successfully applied to this career/job.");
            }
        })
    </script>
</body>
</html>

<!-- Modal Apply Online -->
<div class="modal fade" id="applyOnlineModal" tabindex="-1" aria-labelledby="applyOnlineModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Apply Online</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body apply-online-modal-body">
        <form action="careers.php" method="post" enctype="multipart/form-data">
            <div class="alert alert-danger" id="apply-online-error"></div>
            <input type="hidden" id="modal-career-id" name="career-id">
            <div class="form-group">
                <label>First name</label>
                <input type="text" name="first_name" id="apply-online-first-name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" id="apply-online-last-name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" id="apply-online-email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>CNIC</label>
                <input type="number" name="cnic" id="apply-online-cnic" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Contact</label>
                <input type="number" name="contact" id="apply-online-contact" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Resume</label>
                <input type="file" name="resume" id="apply-online-resume" class="form-control" accept="application/pdf" required>
            </div>
            <div class="form-group">
                <button type="submit" name='apply-btn' id="apply-online-apply-btn" class="btn btn-dark btn-block">Apply</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>