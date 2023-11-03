<?php 
require_once dirname(__DIR__) . "/includes/constant.inc.php";
session_start();
$page = "adminAdminUser";
include_once ADM_DIR .'checkSession.php';
require_once ROOT_DIR ."/_config/dbconnect.php";
require_once ROOT_DIR."/classes/encrypt.inc.php";

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
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>
    <title><?php echo COMPANY_S?> - Admin List</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= ADM_URL ?>vendors/ti-icons/css/themify-icons.css" />
    <link rel="stylesheet" href="<?= URL ?>/plugins/data-table/style.css" />


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
        <?php require_once "components/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <?php require_once "components/_settings-panel.php"; ?>
            <?php require_once "components/_sidebar.php"; ?>
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
                                                        Total Login
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
                                                $id = url_enc($row['username']);
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
                                                        <?php echo $row['no_logon']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $dateUtil->dateTimeNumber($row['last_logon']); ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="admin-profile.php?user=<?=$id?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a class="text-decoration-none mx-1"
                                                            href="admin_password.php?user=<?=$id?>">
                                                            <i class="fa-regular fa-pen-to-square mx-1"></i>
                                                        </a>
                                                        <a href='admin_delete.php?id=<?=$id?>'
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
                <?php require_once ADM_DIR . 'components/_footer.php'; ?>
                <!-- partial footer end-->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= ADM_URL ?>vendors/js/vendor.bundle.base.js"></script>
    <script src="<?= URL ?>/plugins/jquery-3.6.0.min.js"></script>
    
    <!-- inject:js -->
    <script src="<?= ADM_URL ?>js/off-canvas.js"></script>
    <script src="<?= ADM_URL ?>js/hoverable-collapse.js"></script>
    <script src="<?= ADM_URL ?>js/template.js"></script>
    <script src="<?= ADM_URL ?>js/settings.js"></script>
    <script src="<?= ADM_URL ?>js/todolist.js"></script>
    <script src="<?= URL ?>/plugins/data-table/simple-datatables.js"></script>
    <script src="<?= URL ?>/plugins/tinymce/tinymce.js"></script>
    <script src="<?= URL ?>/plugins/main.js"></script>
    <script>
    function deleteUser() {

        return confirm("Are you sure that you want to delete the User Contents ?")

    };
    </script>
</body>

</html>