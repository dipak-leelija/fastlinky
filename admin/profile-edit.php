<?php 
require_once dirname(__DIR__) . "/includes/constant.inc.php";
session_start();

require_once ADM_DIR  . "checkSession.php";
require_once ROOT_DIR . "/_config/dbconnect.php";
require_once ROOT_DIR . "/classes/adminLogin.class.php"; 
require_once ROOT_DIR . "/classes/utility.class.php";
require_once ROOT_DIR . "/classes/utilityImage.class.php";

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$utility		= new Utility();
$uImg 			= new ImageUtility();

/////////////////////////////////////////////////////////////////////////////////////////////////

//declare variables
$typeM		    = $utility->returnGetVar('typeM','');
//admin detail
$userData 		=  $adminLogin->getUserDetail($_SESSION[ADM_SESS]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title>Admin Profile | <?php echo COMPANY_FULL_NAME;?></title>
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>

            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?php
                    if (isset($_GET['action'])) {
                        echo '
                            <div class="card shadow-sm border border-danger px-4 py-3">
                                <p class="my-0 font-weight-bold">'.$_GET['action'].'</p>
                            </div>';
                    }
                    ?>
                    <div class="">
                        <div class="row justify-content-md-around px-2">
                            <div class="col-md-6 my-md-4">
                                <div class="img_bx card shadow-sm px-2">
                                    <h4 class="text-center text-md-left mt-4">Details Edit</h4>
                                    <form method="POST" action="ajax/profile-update.ajax.php" class="row m-3"
                                        enctype="multipart/form-data">


                                        <style>
                                        .form-input {
                                            width: 35%;
                                            padding: 15px;
                                            background: #fff;
                                            box-shadow: -3px -3px 7px rgb(94 104 121 / 9%), 3px 3px 7px rgb(94 104 121 / 24%);
                                        }

                                        .form-input input {
                                            display: none;

                                        }

                                        .form-input label {
                                            display: block;
                                            line-height: 28px;
                                            text-align: center;
                                            background: #1172c2;
                                            color: #fff;
                                            font-size: 11px;
                                            text-transform: Uppercase;
                                            font-weight: 600;
                                            border-radius: 5px;
                                            cursor: pointer;
                                        }

                                        .form-input img {
                                            width: 100%;
                                            display: none;
                                            margin-bottom: 30px;
                                        }

                                        @media (max-width: 767.98px) {
                                            .form-input {
                                                width: 75%;
                                            }
                                        }

                                        @media (max-width: 575.98px) {
                                            .form-input {
                                                width: 65%;
                                            }
                                        }

                                        @media (max-width: 767.98px) {
                                            .form-input {
                                                width: 55%;
                                            }
                                        }

                                        @media (max-width: 991.98px) {
                                            .form-input {
                                                width: 45%;
                                            }
                                        }
                                        </style>

                                        <div class="col-12">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <?php
                                            if ($userData[5] != null) {
                                                $img = '../images/admin/user/'.$userData[5];
                                            }
                                            ?>
                                                <div class="form-input">
                                                    <div class="preview">
                                                        <?php
                                                        if ($userData[5] != null) {
                                                            echo 
                                                            '<img src="'.URL.'/images/admin/user/'.$userData[5].'" id="file-ip-1-preview" style="display: block;">'; 
                                                        }else {
                                                            echo  '<img id="file-ip-1-preview">';
                                                        }
                                                        ?>
                                                    </div>
                                                    <label for="file-ip-1">CHange Image</label>
                                                    <input type="file" id="file-ip-1" name="profile-image"
                                                        accept="image/*" onchange="showPreview(event);">

                                                </div>
                                            </div>
                                        </div>

                                        <script type="text/javascript">
                                        function showPreview(event) {
                                            if (event.target.files.length > 0) {
                                                var src = URL.createObjectURL(event.target.files[0]);
                                                var preview = document.getElementById("file-ip-1-preview");
                                                preview.src = src;
                                                preview.style.display = "block";
                                            }
                                        }
                                        </script>

                                        <div class="col-12 text-center mt-3">
                                            <button class="btn btn-primary" name="updateAdminimage"
                                                type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>


                                <div class="details_bx card shadow-sm mt-4 px-2">
                                    <h4 class="text-center text-md-left mt-4">Details Edit</h4>
                                    <form method="POST" action="ajax/profile-update.ajax.php" class="row m-3"
                                        enctype="multipart/form-data">

                                        <div class="col-12 col-md-6">
                                            <label for="fname" class="form-label">First Name</label>
                                            <input type="text" name="fname" class="form-control" id="fname"
                                                value="<?php echo $userData[0]; ?>">
                                        </div>

                                        <div class="col-12 col-md-6">
                                            <label for="lname" class="form-label">Last Name</label>
                                            <input type="text" name="lname" class="form-control"
                                                value="<?php echo $userData[1]; ?>">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" name="city" class="form-control"
                                                value="<?php echo $userData[2]; ?>">
                                        </div>
                                        <div class="col-12 mt-3">
                                            <label for="mail-id" class="form-label">Email</label>
                                            <input type="text" name="mail-id" class="form-control"
                                                value="<?php echo $userData[4]; ?>">
                                        </div>

                                        <div class="col-12 text-center mt-3">
                                            <button class="btn btn-primary" name="updateAdminDetails"
                                                type="submit">Update</button>
                                        </div>
                                    </form>
                                </div>

                            </div>



                            <div class="col-md-5 card shadow-sm my-md-4">
                                <h4 class="text-center text-md-left mt-4">Change Password</h4>
                                <form method="POST" action="ajax/admin-password-reset.ajax.php" class="row m-3"
                                    enctype="multipart/form-data">

                                    <div class="col-12">
                                        <label for="current-password" class="form-label">Current Password</label>
                                        <input type="password" name="current-password" class="form-control" required>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="new-password" class="form-label">New Password</label>
                                        <input type="password" name="new-password" class="form-control" required>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <label for="confirm-password" class="form-label">Confirm Password</label>
                                        <input type="password" name="confirm-password" class="form-control" required>
                                    </div>

                                    <div class="col-12 text-center mt-3">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial footer -->
                <?php require_once ADM_DIR . 'partials/_footer.php'; ?>
                <!-- partial footer end-->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="../plugins/jquery-3.6.0.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <!-- <script src="plugins/bootstrap-5.2.0/js/bootstrap.js"></script> -->
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>