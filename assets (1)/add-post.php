<?php

session_start();

include('includes/config.php');

error_reporting(0);

if (strlen($_SESSION['login']) == 0) {

    header('location:index.php');
} else {



    // For adding post  

    if (isset($_POST['submit'])) {
        $posttitle = htmlspecialchars(mysqli_real_escape_string($con, $_POST['posttitle']));

        $catid = htmlspecialchars(mysqli_real_escape_string($con, $_POST['category']));

        $postdetails = htmlspecialchars(mysqli_real_escape_string($con, $_POST['postdescription']));

        $arr = explode(" ", $posttitle);



        $imgfile = htmlspecialchars(mysqli_real_escape_string($con, $_FILES["postimage"]["name"]));



        $PostUrl = htmlspecialchars(mysqli_real_escape_string($con, $_POST['link']));
        $YT_link = htmlspecialchars(mysqli_real_escape_string($con, $_POST['YT_link']));



        // get the image extension

        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));

        // allowed extensions

        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");

        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        $allowedFileType = array('jpg', 'png', 'jpeg');

        // Velidate if files exist
        
        if (!in_array($extension, $allowed_extensions)) {

            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            if(isset($_POST['send']))
            {
                foreach($_POST['selectpicker'] as $selected){
                    echo '  ' . $selected;
                  } 
            
            }
            //rename the image file

            $imgnewfile = md5($imgfile) . $extension;

            // Code for move image into directory

            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);



            $status = 1;

            $query = mysqli_query($con, "insert into tblposts(PostTitle,CategoryId,PostDetails,PostUrl,YT_link,Is_Active,PostImage) values('$posttitle','$catid','$postdetails','$PostUrl','$YT_link','$status','$imgnewfile')");

            if ($query) {

                $msg = "Post successfully added ";
            } else {

                $error = "Something went wrong . Please try again.";
            }
        }
    }

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <meta name="author" content="Coderthemes">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

    <!-- (Optional) Latest compiled and minified JavaScript translation files -->

    <!-- App favicon -->

    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->

    <title>HUC | Add Post</title>



    <!-- Summernote css -->

    <link href="../plugins/summernote/summernote.css" rel="stylesheet" />



    <!-- Select2 -->

    <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />



    <!-- Jquery filer css -->

    <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />

    <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />



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

    <script>
    function getSubCat(val) {

        $.ajax({

            type: "POST",

            url: "get_subcategory.php",

            data: 'catid=' + val,

            success: function(data) {

                $("#subcategory").html(data);

            }

        });

    }
    </script>
    <style>
    .imgGallery .img {
        height: 10%;


    }

    .imgPreviewPlaceholder {
        height: 10%;
    }

    .imgGallery .imgPreviewPlaceholder {

        height: 10%;
    }
    </style>
</head>





<body class="fixed-left">



    <!-- Begin page -->

    <div id="wrapper">



        <!-- Top Bar Start -->

        <?php include('includes/topheader.php'); ?>

        <!-- ========== Left Sidebar Start ========== -->

        <?php include('includes/leftsidebar.php'); ?>

        <!-- Left Sidebar End -->







        <!-- ============================================================== -->

        <!-- Start right Content here -->

        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Start content -->

            <div class="content">

                <div class="container">





                    <div class="row">

                        <div class="col-xs-12">

                            <div class="page-title-box">

                                <h4 class="page-title">Add Post </h4>

                                <ol class="breadcrumb p-0 m-0">

                                    <li>

                                        <a href="#">Post</a>

                                    </li>

                                    <li>

                                        <a href="#">Add Post </a>

                                    </li>

                                    <li class="active">

                                        Add Post

                                    </li>

                                </ol>

                                <div class="clearfix"></div>

                            </div>

                        </div>

                    </div>

                    <!-- end row -->



                    <div class="row">

                        <div class="col-sm-6">

                            <!---Success Message--->

                            <?php if ($msg) { ?>

                            <div class="alert alert-success" role="alert">

                                <strong></strong> <?php echo htmlentities($msg); ?>

                            </div>

                            <?php } ?>



                            <!---Error Message--->

                            <?php if ($error) { ?>

                            <div class="alert alert-danger" role="alert">

                                <strong></strong> <?php echo htmlentities($error); ?>
                            </div>

                            <?php } ?>





                        </div>

                    </div>





                    <div class="row">

                        <div class="col-md-10 col-md-offset-1">

                            <div class="p-6">

                                <div class="">

                                    <form name="addpost" method="post" enctype="multipart/form-data">


                                        <div class="">

                                            <label for="exampleInputEmail1">يرجى اختيار الاقسام </label>

                                            <select class="selectpicker" name="selectpicker[]" multiple data-max-options="4">
                                                <?php

                                                    // Feching active categories
                                                    require_once 'db.php';

                                                    $ret = mysqli_query($link, "SELECT `id`, `name`, `level_cont` FROM `department` WHERE 1
                                                    ");

                                                    while ($result = mysqli_fetch_array($ret)) {

                                                    ?>

                                                <option value="<?php echo htmlentities($result['name']); ?>">
                                                    <?php echo htmlentities($result['name']); ?></option>

                                                <?php } ?>
                                            </select>
                                            <script>
                                           
                                            </script>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الاسم الرباعي</label>

                                                <input type="text" class="form-control" id="name" name="name"  >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">نوع الدراسة</label>

                                                <select class="form-control" name="type" id="category"
                                                required>

                                                <option value="صباحي"> صباحي</option>
                                                <option value="مسائي"> مسائي</option>

                                                



                                            </select>

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الجنس</label>

                                                <select class="form-control" name="gender" id="category"
                                                required>

                                                <option value="ذكر"> ذكر</option>
                                                <option value="انثى"> انثى</option>                                                     >
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">جنسية الطالب</label>

                                                <input type="text" class="form-control" id="nation" name="nation"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">قومية</label>

                                                <input type="text" class="form-control" id="nationzem" name="nationzem"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الديانة</label>

                                                <input type="text" class="form-control" id="religion" name="religion"
                                                     >

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">تاريخ التولد</label>

                                                <input type="text" class="form-control" id="brith" name="brith"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">رقم هوية الاحوال او الموحدة</label>

                                                <input type="text" class="form-control" id="id_number" name="id_number"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">رقم الهاتف</label>

                                                <input type="text" class="form-control" id="posttitle" name="phone_number"
                                                     >

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الرقم الامتحاني</label>

                                                <input type="text" class="form-control" id="posttitle" name="test_number"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الرقم السري</label>

                                                <input type="text" class="form-control" id="posttitle" name="privte_number"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">قناة القبول</label>

                                                <select class="form-control" name="gate_type" id="category"
                                                required>

                                                <option value="العامة"> العامة</option>
                                                <option value="ذوي الشهداء"> ذوي الشهداء</option>
                                                <option value="السجناء"> السجناء</option>
                                                <option value="ابناء الهئية التدريسية"> ابناء الهيئة التدريسية</option>
                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">مجموع الدرجات الاعدادية</label>

                                                <input type="text" class="form-control" id="posttitle" name="degree_sum"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">معدل الاعدادية</label>

                                                <input type="text" class="form-control" id="posttitle" name="degree_percentage"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">عدد المواد</label>

                                                <select class="form-control" name="subjects_number" id="category"
                                                required>

                                                <option value="6"> 6</option>
                                                <option value="7"> 7</option>
                                                <option value="8"> 8</option>

                                                </select>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">سنة التخرج من الدراسة الاعدادية</label>

                                                <input type="text" class="form-control" id="posttitle" name="finish_year"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">فرع دراسة الاعدادية</label>

                                                <input type="text" class="form-control" id="posttitle" name="branch_type"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الدور في العدادية</label>

                                                <select class="form-control" name="dor_number" id="category"
                                                required>

                                                <option value="1"> 1</option>
                                                <option value="2"> 2</option>
                                                <option value="3"> 3</option>
                                                </select>

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">اسم المدرسة</label>

                                                <input type="text" class="form-control" id="posttitle" name="school_name"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">مديرة التربية</label>

                                                <input type="text" class="form-control" id="posttitle" name="mederi_namer"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">تاريخ تأييد التخرج </label>

                                                <input type="text" class="form-control" id="posttitle" name="grad_year"
                                                     >

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">رقم تأييد التخرج</label>

                                                <input type="text" class="form-control" id="posttitle" name="grad_number"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">محافظة السكن</label>

                                                <input type="text" class="form-control" id="posttitle" name="res_name"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">منطقة السكن</label>

                                                <input type="text" class="form-control" id="posttitle" name="res_area"
                                                     >

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">محلة</label>

                                                <input type="text" class="form-control" id="posttitle" name="shop"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الزقاق</label>

                                                <input type="text" class="form-control" id="posttitle" name="ali"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الدار</label>

                                                <input type="text" class="form-control" id="posttitle" name="house"
                                                     >

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">اسم الام</label>

                                                <input type="text" class="form-control" id="posttitle" name="mother_name"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">اسم ولي الامر</label>

                                                <input type="text" class="form-control" id="posttitle" name="father_name"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">الصلة</label>

                                                <input type="text" class="form-control" id="posttitle" name="raltion"
                                                     >

                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">مهنة ولي الامر</label>

                                                <input type="text" class="form-control" id="posttitle" name="father_job"
                                                     >

                                            </div>
                                            <div class="col-md-4">

                                                <label for="exampleInputEmail1">هاتف ولي الامر</label>

                                                <input type="text" class="form-control" id="posttitle" name="father_number"
                                                     >

                                            </div>

                                        </div>
                                        <br><br>












                                        <div class="row">

                                            <div class="col-l-4">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>ملاحظات</b></h4>

                                                    <textarea class="summernote" name="postdescription"
                                                         ></textarea>

                                                </div>

                                            </div>

                                        </div>






                                        <br>

                                        <br>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>صورة هوية احوال او بطاقة
                                                            الموحدة</b></h4>

                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage1" accept="image/*"  >

                                                </div>

                                            </div>

                                        </div>
                                        <br>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>صورة هوية احوال او بطاقة
                                                            الموحدة او شهادة الوفاة لوالد الطالب</b></h4>

                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage2" accept="image/*"  >

                                                </div>

                                            </div>

                                        </div>

                                        <br>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>بطاقة السكن</b></h4>

                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage3" accept="image/*"  >

                                                </div>

                                            </div>

                                        </div>

                                        <br>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>صورة بطاقة الرقم الامتحاني
                                                            و السري</b></h4>

                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage4" accept="image/*"  >

                                                </div>

                                            </div>

                                        </div>

                                        <br>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>تأييد التخرج</b></h4>

                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage5" accept="image/*"  >

                                                </div>

                                            </div>

                                        </div>
                                        <br>


                                        <div class="row">

                                            <div class="col-sm-12">

                                                <div class="card-box">

                                                    <h4 class="m-b-30 m-t-0 header-title"><b>استمارة تقديم الاولي</b>
                                                    </h4>

                                                    <input type="file" class="form-control" id="postimage"
                                                        name="postimage6" accept="image/*"  >

                                                </div>

                                            </div>

                                        </div>


                                        <button type="submit" name="submit"
                                            class="btn btn-success waves-effect waves-light">Save and Post</button>

                                        <button type="button"
                                            class="btn btn-danger waves-effect waves-light">Discard</button>

                                    </form>

                                </div>

                            </div> <!-- end p-20 -->

                        </div> <!-- end col -->

                    </div>

                    <!-- end row -->







                </div> <!-- container -->



            </div> <!-- content -->



            <?php include('includes/footer.php'); ?>



        </div>





        <!-- ============================================================== -->

        <!-- End Right content here -->

        <!-- ============================================================== -->





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



    <!--Summernote js-->

    <script src="../plugins/summernote/summernote.min.js"></script>

    <!-- Select 2 -->

    <script src="../plugins/select2/js/select2.min.js"></script>

    <!-- Jquery filer js -->

    <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>



    <!-- page specific js -->

    <script src="assets/pages/jquery.blog-add.init.js"></script>



    <!-- App js -->

    <script src="assets/js/jquery.core.js"></script>

    <script src="assets/js/jquery.app.js"></script>


    <script>
    jQuery(document).ready(function() {



        $('.summernote').summernote({

            height: 240, // set editor height

            minHeight: null, // set minimum height of editor

            maxHeight: null, // set maximum height of editor

            focus: false // set focus to editable area after initializing summernote

        });

        // Select2

        $(".select2").select2();



        $(".select2-limiting").select2({

            maximumSelectionLength: 2

        });

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>


    <script src="../plugins/switchery/switchery.min.js"></script>



    <!--Summernote js-->

    <script src="../plugins/summernote/summernote.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>









</body>

</html>

<?php } ?>