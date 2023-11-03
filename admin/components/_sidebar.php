<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?= $page == 'dashboard' ? 'active' : ''; ?>">
            <a class="nav-link" href="dashboard.php">
                <i class="fa-light fa-grid-2 menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li
            class="nav-item  <?php if($page == "adminOrder" || $page == "adminOrderDetails" || $page == "adminPackageOrder" || $page == "adminPackageOrderDetails" ){echo "active";} ?>">

            <a class="nav-link <?php if($page == "adminOrder" || $page == "adminOrderDetails" || $page == "adminPackageOrder" || $page == "adminPackageOrderDetails" ){echo "noaction";} else {
                echo "collapsed"; 
            } ?>
            " data-toggle="collapse" href="#order-management" aria-expanded="false" aria-controls="order-management">
                <i class="fa-regular fa-diagram-project menu-icon"></i>
                <span class="menu-title">Order Management</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse <?php if($page == "adminOrder" || $page == "adminOrderDetails" || $page == "adminPackageOrder" || $page == "adminPackageOrderDetails"){echo "show";} ?>"
                id="order-management">
                <ul class="nav flex-column sub-menu ">

                    <li class="nav-item"> <a class="nav-link" href="orders.php">Guest
                            Post Orders</a></li>

                    <li class="nav-item"> <a class="nav-link" href="package-order.php">Package
                            Orders</a></li>
                </ul>
            </div>
        </li>

        <li
            class="nav-item <?php if($page == "adminCustomer" || $page == "adminContact" || $page == "adminContactViews"){echo "active";} ?>">
            <a class="nav-link <?php if($page == "adminCustomer" || $page == "adminContact" || $page == "adminContactViews"){echo "noaction";} else {
                echo "collapsed"; 
            } ?>" data-toggle="collapse" href="#customer-management" aria-expanded="false"
                aria-controls="customer-management">
                <i class="fa-regular fa-users menu-icon"></i>
                <span class="menu-title">Customers</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse <?php if($page == "adminCustomer" || $page == "adminContact" || $page == "adminContactViews"){echo "show";} ?>"
                id="customer-management">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="customer.php">Customer</a></li>
                    <li class="nav-item"> <a class="nav-link" href="contacts.php">Contact Details</a></li>
                </ul>
            </div>
        </li>

        <li
            class="nav-item   <?php if($page == "adminBlogMaster" || $page == "adminBlogNiches" || $page == "adminNicheAdd" || $page == "adminNicheEdit" || $page == "adminBlogAdd" || $page == "adminBlogEdit" ){echo "active";} ?>">
            <a class="nav-link <?php if($page == "adminBlogMaster" || $page == "adminBlogNiches" || $page == "adminNicheAdd" || $page == "adminNicheEdit" || $page == "adminBlogAdd" || $page == "adminBlogEdit" ){echo "noaction";} else {
                echo "collapsed"; 
            } ?>" data-toggle="collapse" href="#blogs" aria-expanded="false" aria-controls="blogs">
                <i class="fa-light fa-table-layout menu-icon"></i>
                <span class="menu-title">Blogs Management</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse  <?php if($page == "adminBlogMaster" || $page == "adminBlogNiches" || $page == "adminNicheAdd" || $page == "adminNicheEdit" || $page == "adminBlogAdd" || $page == "adminBlogEdit"){echo "show";} ?>"
                id="blogs">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="blog-master.php">Blogs</a></li>
                    <li class="nav-item"> <a class="nav-link" href="blog-niche.php">Niche</a></li>
                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#packagemanagement" aria-expanded="false"
                aria-controls="packagemanagement">
                <i class="fa-light fa-table-layout menu-icon"></i>
                <span class="menu-title">Package Management</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse" id="packagemanagement">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="packages.php">Packages</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Services</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Services Featured</a></li>
                </ul>
            </div>
        </li>

        <li
            class="nav-item <?php if($page == "adminFAQ" || $page == "adminFaqAdd" || $page == "adminfaqEdit"){echo "active";} ?>">
            <a class="nav-link <?php if($page == "adminFAQ" || $page == "adminFaqAdd" || $page == "adminfaqEdit"){echo "noaction";} else {
                echo "collapsed"; 
            } ?>" data-toggle="collapse" href="#faqs" aria-expanded="false" aria-controls="faqs">
                <i class="fa-light fa-objects-column menu-icon"></i>
                <span class="menu-title">Editor</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse <?php if($page == "adminFAQ" || $page == "adminFaqAdd" || $page == "adminfaqEdit"){echo "show";} ?>"
                id="faqs">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="static-pages.php">Pages</a></li>
                    <li class="nav-item"> <a class="nav-link" href="faqs.php">Faqs</a></li>
                </ul>
            </div>
        </li>


        <li class="nav-item ">
            <a class="nav-link " data-toggle="collapse" href="#contentmanagement" aria-expanded="false"
                aria-controls="contentmanagement">
                <i class="fa-light fa-folder-grid menu-icon"></i>
                <span class="menu-title">Content Management</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse" id="contentmanagement">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Web Categories</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Web Pages</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">eBox-136 Newsletters</a></li>

                </ul>
            </div>
        </li>


        <li
            class="nav-item <?php if($page == "Mail-groups-mail" || $page == "Mails-historys" || $page == "viewEmail-history" || $page == "view_All-mail"){echo "active";} ?>">
            <a class="nav-link <?php if($page == "Mail-groups-mail" || $page == "Mails-historys" || $page == "viewEmail-history" || $page == "view_All-mail"){echo "noaction";} else {
                echo "collapsed"; 
            } ?>" data-toggle="collapse" href="#marketing" aria-expanded="false" aria-controls="marketing">
                <i class="fa-light fa-bullhorn menu-icon"></i>
                <span class="menu-title">Marketing</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse <?php if($page == "Mail-groups-mail" || $page == "Mails-historys" || $page == "viewEmail-history" || $page == "view_All-mail"){echo "show";} ?>"
                id="marketing">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="group-mail.php">Group Mail</a></li>
                    <li class="nav-item"> <a class="nav-link" href="mails-history.php">Mail History</a></li>
                </ul>
            </div>
        </li>

        <li
            class="nav-item  <?php if($page == "adminAdminEdit" || $page == "adminAddUser" || $page == "adminAdminUser"){echo "active";} ?>">
            <a class="nav-link <?php if($page == "adminAdminEdit" || $page == "adminAddUser" || $page == "adminAdminUser"){echo "noaction";} else {
                echo "collapsed"; 
            } ?>" data-toggle="collapse" href="#sitesetup" aria-expanded="false" aria-controls="sitesetup">
                <i class="fa-duotone fa-gears menu-icon"></i>
                <span class="menu-title">Setup Tools</span>
                <i class="fa-regular fa-chevron-right menu-right-arrow"></i>
            </a>
            <div class="collapse <?php if($page == "adminAdminEdit" || $page == "adminAddUser" || $page == "adminAdminUser"){echo "show";} ?>"
                id="sitesetup">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="admin-user.php">Admin Users</a></li>
                    <li class="nav-item"> <a class="nav-link" href="database.php">Database backup</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>