<?php
session_start();
include 'includes/config.php';
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['submit'])) {
        $catid = intval($_GET['cid']);
        $category = $_POST['category'];
        $description = $_POST['description'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $location = $_POST['location'];
        $query = mysqli_query($con, "UPDATE `ports_users_db` SET `username`='$username',`password`='$password ',`lec`='$location' WHERE id='$catid'");
        if ($query) {
            $msg = 'Category Updated successfully ';
        } else {
            $error = 'Something went wrong . Please try again.';
        }
    } ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <title>HUC</title>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
    <script src="assets/js/modernizr.min.js"></script>

</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <?php include 'includes/topheader.php'; ?>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'includes/leftsidebar.php'; ?>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">



                    <!-- end row -->


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <hr />



                                <div class="row">
                                    <div class="col-sm-6">
                                        <!---Success Message--->
                                        <?php if ($msg) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                        </div>
                                        <?php } ?>

                                        <!---Error Message--->
                                        <?php if ($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>


                                    </div>
                                </div>

                                <?php
                                $catid = intval($_GET['cid']);
    $query = mysqli_query($con, "SELECT `id`, `username`, `password`, `lec`, `type` FROM `ports_users_db` WHERE id='$catid'");
    while ($row = mysqli_fetch_array($query)) {
        ?>


                                <div class="row">

                                    <div class="col-md-6">

                                        <form class="form-horizontal" name="category" method="post">

                                            <div class="form-group">

                                                <label class="col-md-2 control-label">Username</label>

                                                <div class="col-md-10">

                                                    <input type="text" class="form-control"
                                                        value="<?php echo htmlentities($row['username']); ?>"
                                                        name="username" required>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-2 control-label">Password</label>

                                                <div class="col-md-10">

                                                    <input type="text" class="form-control"
                                                        value="<?php echo htmlentities($row['password']); ?>"
                                                        name="password" required>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label class="col-md-2 control-label">location</label>

                                                <div class="col-md-10">

                                                    <input type="text" class="form-control"
                                                        value="<?php echo htmlentities($row['lec']); ?>" name="location"
                                                        required>

                                                </div>

                                            </div>






                                            <div class="form-group">

                                                <label class="col-md-2 control-label">&nbsp;</label>

                                                <div class="col-md-10">


                                                    <?php
    } ?>
                                                    <button type="submit"
                                                        class="btn btn-custom waves-effect waves-light btn-md"
                                                        name="submit">

                                                        Submit

                                                    </button>

                                                </div>

                                            </div>



                                        </form>

                                    </div>





                                </div>




                            </div>











                        </div>
                    </div>
                </div>
                <!-- end row -->


            </div> <!-- container -->

        </div> <!-- content -->

        <?php include 'includes/footer.php'; ?>

    </div>


    </div>
    <!-- END wrapper -->



    <script>
    var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="../plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>
<?php
} ?>