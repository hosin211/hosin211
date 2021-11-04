<?php
session_start();
include 'includes/config.php';
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    // Code for Forever deletionparmdel
    if ($_GET['action'] == 'parmdel' && $_GET['rid']) {
        $id = intval($_GET['rid']);
        $query = mysqli_query($con, "DELETE FROM `ports_users_db` WHERE `id`='$id'");
        $delmsg = 'Port deleted ';
    } ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title> | Manage Categories</title>
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

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'includes/leftsidebar.php'; ?>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">



                    <!-- end row -->


                    <div class="row">
                        <div class="col-sm-6">

                            <?php if ($msg) { ?>
                            <div class="alert alert-success" role="alert">
                                <strong></strong> <?php echo htmlentities($msg); ?>
                            </div>
                            <?php } ?>

                            <?php if ($delmsg) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong></strong> <?php echo htmlentities($delmsg); ?>
                            </div>
                            <?php } ?>


                        </div>








                        <div class="row">
                            <div class="col-md-12">
                                <div class="demo-box m-t-20">


                                    <div class="table-responsive">
                                        <table class="table m-0 table-colored-bordered table-bordered-primary">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th> Name</th>
                                                    <th>Location</th>


                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
$query = mysqli_query($con, "SELECT `id`, `username`, `password`, `lec`, `type` FROM `ports_users_db` WHERE type='admin'");
    $cnt = 1;
    while ($row = mysqli_fetch_array($query)) {
        ?>

                                                <tr>
                                                    <th scope="row"><?php echo htmlentities($cnt); ?></th>
                                                    <td><?php echo htmlentities($row['username']); ?></td>
                                                    <td><?php echo htmlentities($row['lec']); ?></td>

                                                    <td><a
                                                            href="edit-ports.php?cid=<?php echo htmlentities($row['id']); ?>"><i
                                                                class="fa fa-pencil" style="color: #29b6f6;"></i></a>
                                                        &nbsp;<a
                                                            href="manage-ports.php?rid=<?php echo htmlentities($row['id']); ?>&&action=parmdel">
                                                            <i class="fa fa-trash-o" style="color: #f05050"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
++$cnt;
    } ?>
                                            </tbody>

                                        </table>
                                    </div>




                                </div>

                            </div>


                        </div>
                        <!--- end row -->





















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