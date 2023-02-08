<!-- <header id="header" class="fixed-top"> -->
<nav class="navbar navbar-expand-lg navbar-dark text-light ">

    <div class="container-fluid">
        <a class="navbar-brand d-flex" href="<?php echo URL;?>">
            <img src="<?php echo LOGO_WITH_PATH; ?>" alt="logo" class="pe-md-4">
            <div class="text-center emailstyle  m-auto ps-4 ">
                <?php
                $cusDtl			= $customer->getCustomerData($cusId); 

                if($cusId != 0){
                    echo "Hi, ".$cusDtl[0][5];
                }else {
                    echo SITE_EMAIL;
                }
                ?>
            </div>
        </a>
        <div class="right_mbl text-end">
            <?php
            if($cusId == 0){
            ?>
            <a href="<?php echo URL;?>/login.php" class="btn login-btn mobile_login_btn">
                <i class="pe-2 fa-solid fa-user-lock fa-fade"
                    style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;color: darkgreen;"></i>Login
            </a>
            <?php
            }else {
            ?>
            <!-- <a href="<?php echo URL;?>/dashboard.php" class="btn login-btn mobile_login_btn">Dashboard</a> -->
            <li class="nav-item dropdown dashboaard_button mobile_login_btn">
                <button class=" dropdown  login-btn external-styling">My Account <i class="bi bi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu  external-drop-menu">
                    <li> <a href="<?php echo URL;?>/dashboard.php" class="dropdown-item  external-lis"><i
                                class="fa fa-home pe-2"></i>Dashboard</a>
                    </li>
                    <li><a class="dropdown-item external-lis" href="<?php echo URL;?>/logout.php"><i
                                class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a></li>
                </ul>
            </li>
            <?php
            }
            ?>
            <!-- mobile-menu -->
            <button id="navbar-toggler" class="navbar-toggler mobile-menu border-0 shadow-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>

        <div class="collapse navbar-collapse mt-2 mt-lg-0" style="width: 59%;justify-content: inherit;"
            id="navbarSupportedContent">
            <ul class="navbar-nav   mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link  li-style" aria-current="page" href="<?php echo URL;?>">Home</a>
                </li>


                <li class="nav-item dropdown myiconupdown">
                    <a class="nav-link dropdown d-flex li-style myservicecss" href="#">
                        Services
                        <i class=" ps-1  fa-solid fa-sort-down nav-drop-sortdown" style="padding-top: 1px;"></i>
                        <i class="ps-1 fa-solid fa-sort-up nav-drop-sortup"></i>
                    </a>
                    <ul class="dropdown-menu producting-menues mydropdownmenu">

                        <div class="row producting-divs-main-row">

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/managed-link-building.php">MANAGED
                                        LINK BUILDING</a></li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/white-label-link-building.php">WHITE LABEL LINK
                                        BUILDING</a>
                                </li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/high-authority-backlinks.php">HIGH
                                        AUTHORITY BACKLINKS</a></li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/country-specific-backlinks.php">COUNTRY SPECIFIC
                                        BACKLINKS</a>
                                </li>

                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/casino-backlinks.php">CASINO
                                        BACKLINKS</a></li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/link-insertion-service.php">LINK
                                        INSERTION SERVICE</a></li>


                                <li><a class="dropdown-item   producting-menues-lis"
                                        href="<?php echo URL;?>/blogger-outreach.php">BLOGGER
                                        OUTREACH</a></li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/cannabis-backlinks.php">CANNABIS
                                        BACKLINKS</a></li>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <li>
                                    <a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/guest-posting.php">GUEST
                                        POSTING</a>
                                </li>

                                <li>
                                    <a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/guest-post-offer.php">GUEST POST
                                        OFFER</a>
                                </li>
                            </div>
                        </div>

                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link li-style" href="<?php echo URL;?>/about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link li-style" href="contact.php">Contact</a>
                </li>
            </ul>
            <?php
            if($cusId == 0){
            ?>
            <a class="login-btn desktop-login-btn" href="<?php echo URL;?>/login.php">
                <i class="pe-2 fa-solid fa-user-lock fa-fade"
                    style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;color: darkgreen;"></i>
                Login</a>
            <?php
            }else {
            ?>

            <li class="nav-item dropdown dashboaard_button desktop-login-btn">
                <button class=" dropdown  login-btn external-styling ">My Account <i class="bi bi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu external-drop-menu">
                    <li> <a href="<?php echo URL;?>/dashboard.php" class="dropdown-item  external-lis"><i
                                class="fa fa-home pe-2"></i>Dashboard</a>
                    </li>
                    <li><a class="dropdown-item  external-lis" href="<?php echo URL;?>/logout.php"><i
                                class="fa-solid fa-arrow-right-from-bracket pe-2"></i>Logout</a></li>
                </ul>
            </li>
            <?php
            }
            ?>

        </div>
    </div>
</nav>
<!-- </header> -->
<script src="js/jquery-2.2.3.min.js"></script>