<?php
require_once("../includes/constant.inc.php");
session_start();
include_once('checkSession.php');

require_once "../_config/dbconnect.php";

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
    <?php require_once ADM_DIR . "/incs/admin-common-headers.php" ?>

    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../plugins/data-table/style.css">
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
                    DR
                </th>
                <th>
                Ahrefs Traffic
                </th>
                <th>
                    Link Type
                </th>
                <th>
                    Price(<?= CURRENCY ?>)
                </th>
                <th>
                    Salling Prices (<?= CURRENCY ?>)
                </th>
                <th>
                    G.N Price (<?= CURRENCY ?>)
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
                    <?= $i++; ?>
                </td>
                <td style="WHITE-SPACE: inherit;">
                    <?= $eachRecord['domain']; ?>
                </td>
                <td style="WHITE-SPACE: inherit;">
                    <?= $eachRecord['niche'];  ?>
                </td>
                <td>
                    <?= $eachRecord['da']; ?>
                </td>
                <td>
                    <?= $eachRecord['dr']; ?>
                </td>
                <td>
                    <?= $eachRecord['organic_trafic']; ?>
                </td>
                <td>
                    <?= $eachRecord['follow']; ?>
                </td>
                <td>
                    <?= $eachRecord['cost']; ?>
                </td>
                <td>
                    <?= $eachRecord['ext_cost']; ?>
                </td>
                <td>
                    <?= $eachRecord['grey_niche_cost']; ?>
                </td>
                <td class="text-center">
                    <label class="form-switch">
                        <?php if($eachRecord['approved'] == 'yes'): ?>
                        <input id="cheak" class="form-check-input" data-id="<?= $eachRecord['blog_id']; ?>"
                            value="yes" onclick="return disapproved();" type="checkbox" checked>
                        <?php else: ?>
                        <input id="cheak" class="form-check-input" data-id="<?= $eachRecord['blog_id']; ?>"
                            value="no" onclick="return approved();" type="checkbox">
                        <?php endif ?>

                    </label>
                </td>
                <td>
                    <a class="text-decoration-none mx-1" href="blog_edit.php?action=edit_faq&id=<?= $id; ?>">
                        <i class="fa-regular fa-eye"></i>
                    </a>
                    <a class="text-decoration-none mx-1 text-danger" href="#" id="<?= $id; ?>"
                        onclick="deleteBlog(this)">
                        <i class="fa-solid fa-trash"></i>
                    </a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <!-- content-wrapper ends -->

    <script src="../plugins/data-table/simple-datatables.js"></script>
    <script src="../plugins/tinymce/tinymce.js"></script>
    <script src="../plugins/main.js"></script>

</body>

</html>