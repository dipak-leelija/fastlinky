<!-- <header id="header" class="fixed-top"> -->
<nav class="navbar navbar-expand-lg navbar-dark text-light ">

    <div class="container-fluid">
        <a class="navbar-brand me-0" href="<?php echo URL;?>">
            <img src="<?php echo LOGO_WITH_PATH; ?>" alt="logo" class="pe-md-4">
        </a>
        <a class="head-mail-sec" href="mailto:info@fastlinky.com">
            <div class="text-center emailstyle  m-auto ps-4 ">
                <?php
                    if($cusId != 0){
                        $cusDtl			= $customer->getCustomerData($cusId);
                        echo "Hi, ".$cusDtl[0][5];
                    }else {
                        echo INFO_MAIL;
                    }
                ?>
            </div>
        </a>
        <div class="right_mbl text-end">
            <a class="second-btn-dark me-3 d-lg-none" href="<?php echo URL;?>/contact">
                <i class="fa-regular fa-comments d-none d-md-sm-block pe-1"></i>
                Let's Talk
            </a>
            <?php
            if($cusId == 0){
            ?>
            <a href="<?php echo URL;?>/login" class="login-btn d-lg-none">
                <i class="fa-solid fa-user-lock fa-fade d-none d-md-sm-block pe-2"
                    style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;color: darkgreen;"></i>Login
            </a>
            <?php
            }else {
            ?>
            <!-- <a href="<?php echo URL;?>/dashboard" class="btn login-btn mobile_login_btn">Dashboard</a> -->
            <li class="nav-item dropdown dashboaard_button mobile_login_btn">
                <button class=" dropdown  login-btn external-styling">My Account <i class="bi bi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu  external-drop-menu">
                    <li> <a href="<?php echo URL;?>/dashboard" class="dropdown-item  external-lis"><i
                                class="fa fa-home pe-2"></i>Dashboard</a>
                    </li>
                    <li><a class="dropdown-item external-lis" href="<?php echo URL;?>/logout"><i
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

        <div class="collapse navbar-collapse justify-content-end mt-2 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0 ">
                <li class="nav-item mynav_item">
                    <a class="nav-link  li-style" aria-current="page" href="<?php echo URL;?>">Home</a>
                </li>

                <li class="nav-item mynav_item">
                    <a class="nav-link  li-style" href="<?php echo URL.'/blog';?>">Blog</a>
                </li>

                <li class="nav-item mynav_item dropdown myiconupdown">
                    <a class="nav-link dropdown d-flex li-style myservicecss" href="#">
                        Services
                        <i class=" ps-1  fa-solid fa-sort-down nav-drop-sortdown"></i>
                        <i class="ps-1 fa-solid fa-sort-up nav-drop-sortup"></i>
                    </a>
                    <ul class="dropdown-menu producting-menues mydropdownmenu">

                        <div class="row producting-divs-main-row">

                            <div class="col-lg-4 col-md-6 col-sm-6">

                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/white-label-link-building">WHITE LABEL LINK
                                        BUILDING</a>
                                </li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/high-authority-backlinks">HIGH
                                        AUTHORITY BACKLINKS</a></li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/country-specific-backlinks">COUNTRY SPECIFIC
                                        BACKLINKS</a>
                                </li>

                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">

                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/link-insertion-service">LINK
                                        INSERTION SERVICE</a></li>


                                <li><a class="dropdown-item   producting-menues-lis"
                                        href="<?php echo URL;?>/blogger-outreach">BLOGGER
                                        OUTREACH</a></li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/cannabis-backlinks">CANNABIS
                                        BACKLINKS</a></li>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/managed-link-building">MANAGED
                                        LINK BUILDING</a></li>
                                <li>
                                    <a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/guest-posting">GUEST
                                        POSTING</a>
                                </li>
                                <li><a class="dropdown-item  producting-menues-lis"
                                        href="<?php echo URL;?>/casino-backlinks">CASINO
                                        BACKLINKS</a></li>
                            </div>
                        </div>

                    </ul>
                </li>
                <li class="nav-item mynav_item">
                    <a class="nav-link li-style" href="<?php echo URL;?>/how-we-work">How We Work</a>
                </li>
                <li class="nav-item mynav_item">
                    <a class="nav-link li-style" href="<?php echo URL;?>/about">About</a>
                </li>
            </ul>
            <a class="btn second-btn-dark me-3 d-none d-lg-inline-flex" href="<?php echo URL;?>/contact">
                <i class="fa-regular fa-comments pe-1"></i>Let's Talk
            </a>
            <?php
            if($cusId == 0){
            ?>
            <a class="login-btn d-none d-lg-inline-flex" href="<?php echo URL;?>/login">
                <i class="pe-2 fa-solid fa-user-lock fa-fade"
                    style="--fa-animation-duration: 2s; --fa-fade-opacity: 0.6;color: darkgreen;"></i>
                Login</a>
            <?php
            }else {
            ?>

            <li class="nav-item mynav_item dropdown dashboaard_button d-none d-lg-inline-flex">
                <button class=" dropdown  login-btn external-styling ">My Account <i class="bi bi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu external-drop-menu">
                    <li> <a href="<?php echo URL;?>/dashboard" class="dropdown-item  external-lis"><i
                                class="fa fa-home pe-2"></i>Dashboard</a>
                    </li>
                    <li><a class="dropdown-item  external-lis" href="<?php echo URL;?>/logout"><i
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