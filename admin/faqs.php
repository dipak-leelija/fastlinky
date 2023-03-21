<?php
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');
require_once "../_config/dbconnect.php";

require_once("../classes/adminLogin.class.php"); 
require_once("../classes/date.class.php"); 
require_once("../classes/content-order.class.php");
require_once("../classes/utility.class.php"); 
require_once("../classes/faqs.class.php");

/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
// $product		= new Product();
$utility		= new Utility();
$faqs		    = new faqs();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');

$faqsDtl 	= $faqs->getfaqDetail(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"> -->
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.2.1/css/sharp-solid.css">


    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png" />
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
            <!-- partial:../../ -->

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Frequently Asked Questions (FAQs)</h4>
                                    <button type="button" class="btn btn-primary .ml-1 addnewbtncss"
                                        onclick="location.href='faqs-add.php?action=addfaqs';"> Add New Faqs
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
                                                        Question
                                                    </th>
                                                    <th>
                                                        Description
                                                    </th>
                                                    <th>
                                                        Page Title
                                                    </th>
                                                    <th>
                                                        Added On
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                               
                                                foreach($faqsDtl as $row){
                                                  $id = $row['id'];
                                                ?>


                                                <tr>
                                                    <td>
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['question']; ?>
                                                    </td>
                                                    <td style="WHITE-SPACE: inherit;">
                                                        <?php echo $row['ans']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['page']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row['added_on']; ?>
                                                    </td>
                                                    <td>
                                                        <a class="text-decoration-none mx-1"
                                                            href="faq-edit.php?action=edit_faq&id=<?php echo $id; ?>">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </a>
                                                        <a href='faqs_delete.php?id=<?php    echo $row['id']  ?>'
                                                            class="text-decoration-none mx-1">
                                                            <i class="fa-regular fa-trash-can-xmark text-danger mx-1"
                                                                onclick="return deleteClass();"></i>
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
               
                <!-- Footer Start  -->
                <?php require_once "partials/_footer.php"; ?>
                <!-- Footer End  -->
                
                <!-- partial -->
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
    <script src="../plugins/data-table/simple-datatables.js"></script>
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>

    <script>
    function deleteClass() {

        return confirm("Are you sure that you want to delete the faqs Contents ?")

    };
    </script>

    <!-- endinject -->
    <!-- Custom js for this page-->
    <!-- End custom js for this page-->
</body>

</html>