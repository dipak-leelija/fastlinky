<?php 
session_start();
include_once('checkSession.php');

require_once "../_config/dbconnect.php";
require_once "../_config/dbconnect.trait.php";

require_once "../classes/adminLogin.class.php"; 
require_once "../classes/date.class.php"; 
require_once "../classes/content-order.class.php";
require_once "../classes/utility.class.php"; 
require_once "../classes/blog_mst.class.php";


/* INSTANTIATING CLASSES */
$adminLogin 	= new adminLogin();
$dateUtil      	= new DateUtil();
$utility		= new Utility();
$blogMst		= new BlogMst();

######################################################################################################################

//declare vars
$typeM			= $utility->returnGetVar('typeM','');
$keyword		= $utility->returnGetVar('keyword','');
$type			= $utility->returnGetVar('type','');
$mode			= $utility->returnGetVar('mode','');



$blogsDtls	   = $blogMst->ShowBlogData();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">

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

    <table id="dtBasicExample" class="table table-striped datatable" cellspacing="0">
        <thead>
            <tr>
                <th>
                    Sl. No.
                </th>
                <th>
                    Sites
                </th>
                <th>
                    Niches
                </th>
                <th>
                    DA
                </th>
                <th>
                    PA
                </th>

                <th>
                    TF
                </th>
                <th>
                    Org.Traffic
                </th>
                <th>
                    Link Type
                </th>
                <th>
                    AdminPrices
                </th>
                <th>
                    Prices
                </th>
                <th>
                    Approved
                </th>
                <th>
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i=1;
                foreach($blogsDtls as $eachRecord){
                   $id = $eachRecord['blog_id'];
            ?>
            <tr>
                <td>
                    <?php echo $i++; ?>
                </td>
                <td style="WHITE-SPACE: inherit;">
                    <?php echo $eachRecord['domain']; ?>
                </td>
                <td style="WHITE-SPACE: inherit;">
                    <?php echo $eachRecord['niche'];  ?>
                </td>
                <td>
                    <?php echo $eachRecord['da']; ?>
                </td>
                <td>
                    <?php echo $eachRecord['pa']; ?>
                </td>
                <td>
                    <?php echo  $eachRecord['tf']; ?>
                </td>
                <td>
                    <?php echo $eachRecord['organic_trafic']; ?>
                </td>
                <td>
                    <?php echo $eachRecord['follow']; ?>
                </td>
                <td>
                    <?php echo $eachRecord['ext_cost']; ?>
                </td>
                <td>
                    <?php echo $eachRecord['cost']; ?>
                </td>
                <td class="text-center">
                    <label class="form-switch">
                        <?php if($eachRecord['approved'] == 'yes'): ?>
                        <input id="cheak" class="form-check-input" data-id="<?php echo $eachRecord['blog_id']; ?>"
                            value="yes" onclick="return disapproved();" type="checkbox" checked>
                        <?php else: ?>
                        <input id="cheak" class="form-check-input" data-id="<?php echo $eachRecord['blog_id']; ?>"
                            value="no" onclick="return approved();" type="checkbox">
                        <?php endif ?>

                    </label>
                </td>
                <td>
                    <a class="text-decoration-none mx-1" href="blog_edit.php?action=edit_faq&id=<?php echo $id; ?>">
                        <i class="fa-regular fa-eye"></i>
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <!-- content-wrapper ends -->
    
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
    function disapproved() {

        return confirm("Are you sure that you want to disapproved the blog Contents ?")

    };

    function approved() {

        return confirm("Are you sure that you want to approved the blog Contents ?")

    };
    </script>

</body>

</html>