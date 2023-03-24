<?php 
require_once dirname(__DIR__) . "/includes/constant.inc.php";
session_start();
include_once ADM_DIR .'checkSession.php';
require_once ROOT_DIR ."/_config/dbconnect.php";

require_once ROOT_DIR . "/classes/adminLogin.class.php";
require_once ROOT_DIR . "/classes/date.class.php";
require_once ROOT_DIR . "/classes/utility.class.php"; 

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$utility		= new Utility();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$adminData	   = $adminLogin->ShowUserData();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH; ?>" type="image/png">
    <title><?php echo COMPANY_S?> - Admin List</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo ADM_URL?>vendors/feather/feather.css">
    <link rel="stylesheet" href="<?php echo ADM_URL?>vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo ADM_URL?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?php echo URL?>/plugins/data-table/style.css">
    <link rel="stylesheet" href="<?php echo ADM_URL?>css/vertical-layout-light/style.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">

    <style>
    .addnewbtncss {
        margin: auto;
        display: flex;
        align-items: center;
        margin-right: 1rem;
        margin-top: -2.6rem;

    }

    @media (min-width:150px) and (max-width:390px) {
        .addnewbtncss {
            margin: 0rem;
            display: flex;
            align-items: center;
            margin-right: 0rem;
            margin-top: -1.2rem;
        }
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <?php require_once "partials/_navbar.php"; ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php require_once "partials/_settings-panel.php"; ?>


            <!-- partial -->
            <?php require_once "partials/_sidebar.php"; ?>
            <!-- partial end -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Admin User</h4>
                                    <button type="button" class="btn btn-primary addnewbtncss"
                                        onclick="location.href='add_user.php?action=add_user#addAdmin';"> Add New Admin
                                    </button>
                                    <div class="table-responsive">
                                        <table id="dtBasicExample" class="table table-striped datatable"
                                            cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        Id
                                                    </th>
                                                    <th>
                                                        Name
                                                    </th>
                                                    <th>
                                                        Login Id
                                                    </th>                                                 
                                                    <th>
                                                        Added On
                                                    </th>
                                                    <th>
                                                        Last Login
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;                                             
                                                foreach($adminData as $row){
                                                $id = $row['username'];
                                                ?>

                                                <tr >
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['fname']." ".$row['lname']; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['username']; ?>
                                                    </td>                                                                                                 
                                                    <td>
                                                        <?php echo $row['added_on']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['last_logon']; ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="admin_edit.php?action=edit_user&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a class="text-decoration-none mx-1"
                                                            href="admin_password.php?action=edit_pass&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                        </a>
                                                        <a href='admin_delete.php?id=<?php    echo $id;  ?>'
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="return deleteUser();"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;}
                                              ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
    <script src="<?php echo ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?php echo URL ?>/plugins/jquery-3.6.0.min.js"></script>
    
    <!-- inject:js -->
    <script src="<?php echo ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?php echo ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?php echo ADM_URL ?>js/template.js"></script>
    <script src="<?php echo ADM_URL ?>js/settings.js"></script>
    <script src="<?php echo ADM_URL ?>js/todolist.js"></script>

    <script src="<?php echo URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?php echo URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?php echo URL ?>/plugins/main.js"></script>

    <script>
    function deleteUser() {

        return confirm("Are you sure that you want to delete the User Contents ?")

    };
    </script>
</body>

</html>