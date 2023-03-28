<?php
require_once("includes/constant.inc.php");

require_once("classes/date.class.php");
require_once("classes/error.class.php");
require_once("classes/search.class.php");
require_once("classes/customer.class.php");
require_once("classes/login.class.php");

require_once("classes/blog_mst.class.php");
require_once("classes/utility.class.php");
require_once("classes/utilityMesg.class.php");
require_once("classes/utilityImage.class.php");
require_once("classes/utilityNum.class.php");

/* INSTANTIATING CLASSES */
$dateUtil      	= new DateUtil();
$error 			= new Error();
$search_obj		= new Search();
$customer		= new Customer();
$logIn			= new Login();

//$ff				= new FrontPhoto();
$blogMst		= new BlogMst();
$utility		= new Utility();
$uMesg 			= new MesgUtility();
$uImg 			= new ImageUtility();
$uNum 			= new NumUtility();
######################################################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

/* PAGE ACTIVE */
$activePage = basename($_SERVER['PHP_SELF']);
// echo $activePage; exit;

?>
<div class="logo text-center">
    <a href="edit-profile.php">
        <?php
			if($cusDtl[0][9] == ''){
		?>
        <img src="images/icons/user.png" alt="" class="visible-xs visible-sm circle-logo">
        <?php
								}else{
							?>
        <img src="images/user/<?php echo $cusDtl[0][9] ?>" alt="<?php echo $cusDtl[0][5] ?>"
            class="visible-xs visible-sm circle-logo">
        <?php
								}
							?>
    </a>
    <p class="blod"><?php echo $cusDtl[0][5];?></p>
    <p><?php echo $cusDtl[0][14];?></p>
</div>


<div class="navi mt-4">

    <?php if($cusDtl[0][0] == 2){?>
    <!-- Customer Switch Mode -->
    <div class="form-check form-switch  my-3">
        <input class="form-check-input" type="checkbox" id="toClient" />
        <label class="form-check-label" for="flexSwitchCheckDefault" style="color: #383a50; font-weight: 600;">Become a
            Client</label>
    </div>
    <!-- Customer Switch Mode end-->

     <!-- Customer Switch Mode -->
     <div class="form-check form-switch  my-3">
        <input class="form-check-input" type="checkbox" id="toSeller" />
        <label class="form-check-label" for="flexSwitchCheckDefault" style="color: #383a50; font-weight: 600;">Become a
            Seller</label>
    </div>
    <!-- Customer Switch Mode end-->


    <ul>
        <li class="<?= ($activePage == 'dashboard.php') ? 'active-styling':''; ?>">
            <a href="dashboard.php" class="dboard-li-atag"><i class="fa fa-home pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Dashboard</span></a>
        </li>

        <li class="<?= ($activePage == 'my-guest-post.php') ? 'active-styling':''; 
            if($activePage =='order-view-update'){echo 'active-styling';}?>">
            <a href="my-guest-post.php" class="dboard-li-atag"><i class="fas fa-cart-arrow-down"></i> <span
                    class="hidden-xs hidden-sm">Order</span></a>

        </li>

        <li class="<?= ($activePage == 'gblogs-list.php') ? 'active-styling':''; if($activePage =='edit-my-blog.php'){echo 'active-styling';}?> ?>">
            <a href="gblogs-list.php" class="dboard-li-atag"><i class="fa fa-tasks pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Guest posting Blogs</span></a>
        </li>
        <li class="<?= ($activePage == 'add-blog.php') ? 'active-styling':''; ?>">
            <a href="add-blog.php" class="dboard-li-atag"><i class="fa fa-plus pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Add Blog for Guest Post</span></a>
        </li>
        <li class="<?= ($activePage == 'notifications.php') ? 'active-styling':''; ?>">
            <a href="notifications.php" class="dboard-li-atag"><i class="fa fa-user pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Notification</span></a>
        </li>

        <li class="<?= ($activePage == 'edit-profile.php') ? 'active-styling':''; ?>">
            <a href="edit-profile.php" class="dboard-li-atag"><i class="fa fa-cog pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Setting</span></a>
        </li>
    </ul>
    <?php } else{?>


    <!-- ===============================================================================================================
        ==========================================     Side Navbar For Client     ==========================================
        =================================================================================================================-->

    <ul>
        <li class="<?= ($activePage == 'app.client.php') ? 'active-styling':''; ?>">
            <a href="app.client.php" class="dboard-li-atag"><i class="fa fa-home pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Dashboard</span></a>
        </li>
        <li
            class="<?= ($activePage == 'my-orders.php' || $activePage == 'guest-post-order-list.php' || $activePage == 'package-order-history.php') ? 'active-styling':''; if($activePage == 'guest-post-article-submit.php'){echo 'active-styling';}  ?>">
            <a href="my-orders.php" class="dboard-li-atag"><i class=" fas fa-handshake pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">My Orders</span></a>
        </li>

        <li
            class="<?= ($activePage == 'blogs-list.php') ? 'active-styling':''; if($activePage == 'order-now.php'){echo 'active-styling';} ?>">
            <a href="blogs-list.php" class="dboard-li-atag"><i class="fa fa-tasks pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Guest posting Blogs</span></a>
        </li>

        <li
            class="<?= ($activePage == 'customer-packages.php') ? 'active-styling':''; ?>">
            <a href="customer-packages.php" class="dboard-li-atag"><i class="fa-solid fa-cubes pe-2"></i><span
                    class="hidden-xs hidden-sm">Packages</span></a>
        </li>
        <li
            class="<?= ($activePage == 'exclusive-guest-post.php') ? 'active-styling':''; ?>">
            <a href="exclusive-guest-post.php" class="dboard-li-atag"><i class="fa-solid fa-tag pe-2"></i><span
                    class="hidden-xs hidden-sm">Exclusive guest posting </span></a>
        </li>


        <li class="<?= ($activePage == 'notifications.php') ? 'active-styling':''; ?>">
            <a href="notifications.php" class="dboard-li-atag"><i class="fa fa-user pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Notification</span></a>
        </li>

        <li class="<?= ($activePage == 'edit-profile.php') ? 'active-styling':''; ?>">
            <a href="edit-profile.php" class="dboard-li-atag"><i class="fa fa-cog pe-2" aria-hidden="true"></i><span
                    class="hidden-xs hidden-sm">Setting</span></a>
        </li>
        <li class="<?= ($activePage == 'wishlist.php') ? 'active-styling':''; ?>">
            <a href="wishlist.php" class="wishlistBlog dboard-li-atag"><span class="wisListHeart"><i class="fas fa-heart"></i></span>
                <span>Wishlist</span></a>
        </li>
    </ul>
    <?php }?>
</div>