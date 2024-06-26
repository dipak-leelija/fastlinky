<?php
require_once __DIR__ . "/includes/common-service-class-functions.inc.php";

$packages = $GPPackage->packDetailsByCat(7);
$packCat  = $GPPackage->packCatById(7);

require_once ROOT_DIR."/includes/package-submission.inc.php";

?>
<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <?php require_once ROOT_DIR."/components/fastlinky-head.php" ?>

    <title>#1 link building blogger outreach service for SEO agencies - <?php echo COMPANY_S; ?></title>
    <meta name="description"
        content="Fastlinky, a trusted link building agency provide top quality backlinks as per client's requirements.This Blogger Outreach Services help your brand grow globally." />
    <meta name="keywords"
        content="Guest Post, Guest Posting,Guest Post Service, blogger outreach, guest posting services, guest posting blogs, fashion blogs, beauty blogs, health blogs, travel blogs, fitness blogs, tech blogs, home improvement blogs, CBD blogs, Casino Blogs" />
    <!-- plugins  files -->
    <link href="<?= URL ?>/plugins/bootstrap-5.2.0/css/bootstrap.css" rel="stylesheet" />
    <?php require_once ROOT_DIR.'/plugins/font-awesome/fontawesome.php'?>

    <!-- Custom CSS -->
    <link href="<?= URL ?>/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/blogger-outreach.css" rel='stylesheet' type='text/css' />
    <link href="<?= URL ?>/css/testimonials.css" rel="stylesheet" />
    <link href="<?= URL ?>/css/clientside-logo.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>
<body>
    <?php require_once "components/navbar.php"; ?>
    <!-- ------------------------------------------- -->
    <!-- pricing section -->
    <section class="mt-5">
        <h1 class="text-center pricing-bo-h1 mb-3 mt-5">Blogger Outreach Pricing
        </h1>
        <p class="text-center pricing-bo-p1 mb-3">We offer blogger outreach links categorised as per DA,
            DR, or organic traffic. Below is the pricing for All 3 models.</p>

        <?php require_once "components/pricing-cards.php"; ?>
    </section>
    <!-- pricing section ends -->
    <!------------------------------------------------->
    <!-- confused-action start -->
    <?php require_once "components/confused-action.inc.php"; ?>
    <!-- confused-action end -->
    <!------------------------------------------------->
    <!-- starting of blogger-outreach main banner -->
        <section class="blogger_outreach_banner">
            <div class="">
                <div class="row w-100 m-auto">
                    <div class="col-md-6  px-0 px-md-3">
                        <div class="bo-wrap">
                            <h2 class="large-heading">
                                Genuine <span>Blogger Outreach</span> Services </h2>
                            <p class=" mt-3 mb-4 py-0 py-md-2 blogout-main-p">FastLinky uses a manual
                                <b>blogger outreach service</b> to introduce your company to actual bloggers in your
                                niche to provide excellent
                                links and brand honors. Take your company to the next level to outrank your competitors.
                            </p>
                            <div class=" text-center text-md-start mb-5  mb-md-0 ">
                                <a href="#pricing-cards">
                                    <button type="button" class="btn srvc-common-btn ">Get Started</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="bo-wrap">
                            <img src="./images/freepik-img/blogger-outreach-banner.png" class="w-100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- end of blogger-outreach main banner -->
    <!-- ---------------------------------------- -->
    <!-- paragraph_texts section start -->
    <section class="paragraph_texts">
        <div class="row w-100 m-auto">
            <div class="col-md-6 order-2 order-md-1 m-auto">
                <div class="text-center">
                    <img src="./images/freepik-img/livecenter-img-front.webp" class="w-100 m-auto mb-md-4" alt="">
                </div>
            </div>
            <div class=" col-md-6 order-1 order-md-2">
                <div>
                    <h2 class="mb-3">Crafting Quality Backlinks <br> <span>to Enhance Domain
                            Authority</span>
                    </h2>
                </div>
                <div>
                    <p>Along with domain authority, our links evaluate past link performance, domain score, and
                        reliability connections. <b>Our blogger outreach services</b> offer additional capabilities, in
                        addition, to support for problems such as thorough article layout,quantity and quality of
                        backlinks, customer requirements, and comment management.</p>
                    <div class=" text-center mb-5 mb-md-0 mt-5 text-md-end">
                        <a href="#pricing-cards">
                            <button type="button" class="btn srvc-common-btn">Get Your Links Now</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- paragraph_texts section end -->
    <!-- -------------------------------------------------->
    <!-- real-blogger-outreach-section start -->
    <section class="real-bo-section">
        <div class="row  w-100 m-auto">
            <div class="col-lg-6 col-md-6 real-bo-col-first px-0">
                <div class="">
                    <div>
                        <h2 class="real-bo-text-h1">Real Contributors, Real Links, <span>And Real Outcomes</span> </h2>
                    </div>
                    <div>
                        <div class="py-4">
                            <div class="real-bo-secondcol-div1">
                                <div class="  px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    create <b> content</b>
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">

                                <div class=" px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    <b>Secure </b> placements .
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1 mb-3">
                                <div class=" px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    Boost website <b> rankings</b>
                                </div>
                            </div>
                        </div>
                        <div class=" text-center text-md-start mb-5 mb-md-0 ">
                            <a href="#pricing-cards">
                                <button type="button" class="btn srvc-common-btn ">Get Your Links Now</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="text-center">
                    <img src="./images/freepik-img/blogger-outrech-Link-Building.webp" class="w-100 mb-md-4" alt="">
                </div>
                <p class="real-bo-text-p mb-3 text-md-start">Fastlinky collaborates with multiple contributors to get
                    relevant and
                    long-lasting links that increase your search engine results and develop targeted traffic. We filter
                    our database to find out the client’s website matches. This takes two steps once automated from our
                    system and then manually by our outreach experts. Our aim is to provide genuinely, do follow,
                    indexed backlinks that can help clients to rank higher.</p>
            </div>
        </div>
    </section>
    <!-- real-blogger-outreach-section end -->
    <!-- ==================== Does-Blogger-Outreach Work For You starts ============================ -->
    <section class="works-for-you-bo-section py-0">
        <div class="custom-cntainr">
            <div class="how-its-wrok-bo-main-div">
                <div>
                    <h2 class="question-heading text-center mt-4 my-3">Why Use Fastlinky Blogger Outreach Service <span>For
                            Your Business?</span></h2>
                </div>
                <div class="works-f-u-main-card-div">
                    <div class="row w-100 m-auto">
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card  how-it-work-f-u-card h-100">
                                <div class="pb-3 ">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Relevance, Authority, And Influence Links</h3>
                                <p class="">
                                    Links that are relevant, authoritative, and influential are necessary if you want to
                                    rank highly on search engines.For this, you should use the best <b>custom outreach
                                        services</b> .
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading  py-2">Customized Outreach Plan For Your Website</h3>
                                <p class="">
                                    We base your website's niche on our outreach plan. Before implementing the plan, our
                                    outreach specialists seek out high-quality websites with higher DA that are
                                    pertinent to your topic. </p>

                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">No Duplication</h3>
                                <p class="">
                                    To ensure that there are no duplicate orders on partner domains, we keep track of
                                    every order you place.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Domain Authority</h3>
                                <p class="">
                                    We maintain our outreach primarily to domains that have continuously high domain
                                    authority in order to get you the finest stats for your site.</p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class=" pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Native Content</h3>
                                <p class="">
                                    You hire smart authors to compose your content using your native language. Before
                                    creating interesting content, factors like brand beliefs and other factors are
                                    examined. These techniques guarantee that your links appear to be inserted naturally
                                    and inside the content of the articles. </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class=" pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Reasonable Prices</h3>
                                <p class="">
                                    We are able to provide exceptional SEO services with highly competitive pricing
                                    thanks to our SEO experience. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Does-Blogger-Outreach Work For You ends -->
    <!-- ---------------------------------------------------------------- -->
    <!-- AMAZING -blogger-outreach-section start -->
    <section class="real-bo-section">
        <div class="row  w-100 m-auto">
            <div class="col-lg-6 col-md-6 m-auto real-bo-col-second">
                <div class="">
                    <div>
                        <img src="./images/freepik-img/blogger-outrech-cc.png" class="w-100  mb-md-4 " alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-first p-0">
                <div class="">
                    <div>
                        <h2>Excellent Content <span> + </span> Superb Placements <span> = </span> Incredible
                        <span>Outcomes</span> </h1>
                        <div class="mt-3">
                            <p class="real-bo-text-p mb-3 text-md-start">Our link-building strategy goes beyond just
                                considering Domain Authority. We take into account a variety of measures that are
                                focused on results, including site ranking, trust flow, and past link history.</p>
                            <p class="real-bo-text-p mb-3 text-md-start">We make sure that the content copy we provide
                                undergoes two rounds of meticulous editing, paying close attention to:</p>
                        </div>
                    </div>
                    <div>
                        <div class="py-4">
                            <div class="real-bo-secondcol-div1">
                                <div class="  px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class=""> the overall layout of the content
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">
                                <div class="  px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    respectable clients' preferences
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1">

                                <div class="  px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">both the quantity & quality of outgoing links
                                </div>
                            </div>
                            <div class="real-bo-secondcol-div1 mb-3">
                                <div class="  px-0 px-sm-3 pe-2">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <div class="">
                                    following-up after placement
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" text-center text-md-end">
                <a href="#pricing-cards">
                    <button type="button" class="btn srvc-common-btn ">Get Your
                        Links Now</button>
                </a>
            </div>
        </div>
    </section>
    <!-- AMAZING-blogger-outreach-section end -->
    <!-- ==================== Does-Blogger-Outreach Work For You starts ============================ -->
    <section class="works-for-you-bo-section py-0">
        <div class="custom-cntainr">
            <div>
                <h2 class="question-heading text-center mt-4 my-3">How Does Blogger Outreach Service <span> Improve Your
                        Brand?</span></h2>
            </div>
            <div class="works-f-u-main-card-div">
                <div class="row w-100 m-auto">
                    <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                        <div class="card works-for-u-card h-100">
                            <div class="pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <h3 class="question-sub-heading py-2">Businesses</h3>
                            <p class="">
                                Keep in mind that improving your company website's search results is no easy feat.
                                You're going to have a tough time doing this. Allow our blogger outreach agency's
                                knowledgeable staff to manage the burden of constructing high-quality backlinks that
                                will enhance your site's ranking. Hence, you can manage the more important aspects of
                                running your business. </p>
                        </div>
                    </div>
                    <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                        <div class="card works-for-u-card h-100">
                            <div class="pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <h3 class="question-sub-heading py-2">Resellers</h3>
                            <p class="">
                                If you're an SEO reseller having trouble locating quality links for your clients, our
                                blogger service is your go-to resource. We are not just masters in link-building, we
                                also provide white-label research services without accepting any payment in exchange for
                                our work. </p>
                        </div>
                    </div>
                    <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                        <div class="card works-for-u-card h-100">
                            <div class=" pb-3">
                                <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                    alt="">
                            </div>
                            <h3 class="question-sub-heading py-2">Marketing Partners</h3>
                            <p class="">
                                The majority of individuals are unsure of how to improve affiliate sites using an SEO
                                strategy that is result-based. The simplest solution is to obtain enough high-quality
                                links. Our knowledgeable crew is competent in this. You might concentrate on other
                                crucial elements like inventive content and conversation improvement. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Does-Blogger-Outreach Work For You ends -->
    <!-- _________________________________________________________________________________________ -->
    <!-- real-blogger-outreach-section start -->
    <section class="real-bo-section">
        <div class="row m-auto w-100">
            <div class="col-lg-6 col-md-6 real-bo-col-first">
                <div class="">
                    <div>
                        <h2 class="mb-4">Blogger Outreach <span>Agency</span> </h2>
                    </div>
                    <p class="real-bo-text-p text-md-start mb-5">Being a reputable <b>blogger outreach agency</b> , our
                        distinctive strategy has helped our clients' websites secure content from blogs that link to
                        them, and enhance their SEO. Our experience staffs are always in touch with top blogs and
                        websites so that clients can feel hassle-free in their link building target. This could be less
                        time and energy consuming for them going forwards.</p>

                    <div class=" text-center text-md-start mb-5 mb-md-0">
                        <a href="#pricing-cards">
                            <button type="button" class="btn srvc-common-btn ">Get Your Links Now</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 real-bo-col-second">
                <div class="text-center">
                    <img src="./images/freepik-img/link-insertion-banner.png" class="w-100 mb-md-4" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- real-blogger-outreach-section end -->
    <!-- -------------------------------------------------------------- -->
    <!-- clients-logo -->
    <?php require_once "components/Clients-Slides.inc.php"; ?>
    <!-- clients-logo -->
    <!------------------------------------->
    <!-- testimonials customers reviews -->
    <?php require_once "components/testimonials.php"; ?>
    <!-- testimonials customers reviews -->
    <!-- ------------------------------------------- -->
    <?php require_once "components/blogs-sites.php"; ?>
    <!-- ==================== Does-Blogger-Outreach Work For You starts ============================ -->
    <section class="works-for-you-bo-section py-0">
        <div class="custom-cntainr">
            <div class="how-its-wrok-bo-main-div">
                <div>
                    <h2 class="question-heading text-center mt-4 my-3">How Does <span>The FastLinky Blogger Outreach Service
                        </span>Work?</h2>
                </div>
                <p class="fbos-p">
                    Our best blogger outreach services actively connect with admin,genuine publishers and relevant
                    professionals in order to build relationships, open up opportunities for guest posting, promote new
                    content, and get new backlinks.
                </p>
                <div class="works-f-u-main-card-div">
                    <div class="row w-100 m-auto">
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card  how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">The Best Prospects To Pursue:</h3>
                                <p class="">
                                    Our outreach link-building <b>blogger service </b> chooses the most advantageous
                                    ways to drive relevant traffic to your website. We make sure you receive the best
                                    blogs and the proper link placements. .
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Dealing With The Outreach:</h3>
                                <p class="">
                                    We aim to create permanent links for you with selected admin,publishers that are
                                    well-established in your domain.We relieve you of such a load, despite the fact that
                                    it could be a difficult job. </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class=" pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Generate Ideas And Make Recommendations:</h3>
                                <p class="">
                                    Once blogs are selected by our outreach expert teams, we actively come up with
                                    creative content ideas, recommend them to the authors of those blogs, and keep you
                                    informed of any advances. This is done with consideration for the entire blogger
                                    outreach service. </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-1.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Content Production And Promotion:</h3>
                                <p class="">
                                    Our staff of talented writers crafts editorially in-depth guest pieces that aren't
                                    intended to be promotional and can be seamlessly incorporated into any production.
                                    Many blogs with high Page Authority quickly review and publish these excellent
                                    posts.</p>
                            </div>
                        </div>
                        <div class="col-md-4  my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class="pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-2.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">Custom Outreach Services:</h3>
                                <p class="">
                                    We offer custom outreach services for clients with genre-specific conditions to get
                                    links to blogs that support their tasks and vision.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 my-2 my-md-3 px-0 px-sm-2">
                            <div class="card how-it-work-f-u-card h-100">
                                <div class=" pb-3">
                                    <img src="./images/dummy-img/real-bo-ul-li-3.png" class="real-bo-second-ul-li-img"
                                        alt="">
                                </div>
                                <h3 class="question-sub-heading py-2">White-Labeled Solutions: </h3>
                                <p class="">
                                    Our <b>blogger outreach agency</b> fills large orders for your customers while still
                                    paying attention to quality and deadlines. You receive reports that are
                                    white-labeled for your clients, and as a result, you own the links that we create.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Does-Blogger-Outreach Work For You ends -->
    <!-- ------------------------------------------------------------------ -->
    <!-- Why Choose Fast Linky WebSolution For Casino Link Building Services? starts -->
    <section class="advantages-of-using-bos-section">
        <div>
            <h2 class="text-center mb-5">Advantages Of Using Our <span>Blogger Outreach Service</span> </h2>
            <ul>
                <li> <b>Extremely Affordable :</b> <br>
                    Use the best blogger outreach services to expand your customers and save money
                </li>
                <li> <b>High-Quality Links :</b> <br>
                    As website traffic is the only statistic we pay attention for effective link building, you don't
                    need to bother about our blogger outreach service.</li>
                <li><b>Logical Activity :</b> <br>
                    The method is flawless and has stood the test of time. And as a result,
                    you receive the same successful link-building approach that supports more than 5000 websites.</li>
                <li><b>On-Time Delivery :</b> <br>
                    Put your trust in us with your large SEO orders; our internal employees
                    are excellent at fulfilling deadlines.</li>
                <li><b>Trusted By 1000+ Websites :</b> <br>
                    The pleasure of more than 100 clients is the best approval we
                    could possibly receive as a <b>blogger service</b> for our manual outreach approach.</li>
                <li><b>Money-Back Guarantee :</b> <br>
                    We always get the job done and promise to keep our word. If we fail,
                    you will receive a full refund.</li>
            </ul>

        </div>
    </section>
    <!-- Why Choose Fast Linky WebSolution For Casino Link Building Services? ending -->
<!-- ----------------------------------------- -->
    <!-- extra details -->
    <div class="features-sec">
        <div class="features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-chart-line"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Real Ranking Sites
                            </p>
                            <p class="features-sec-details">
                                Manual outreach on 100% real sites ranking in Google
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-th"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Customize Your Criteria
                            </p>
                            <p class="features-sec-details">
                                Choose between Domain Authority or Publisher Traffic
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-truck"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Fast Deliverables
                            </p>
                            <p class="features-sec-details">
                                7-day turnaround time guaranteed for your Guest Post
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <p class="features-sec-head-icon">
                            <i class="fas fa-users"></i>
                        </p>
                        <div class="features-sec-all-details">
                            <p class="features-sec-head">
                                Reseller Friendly
                            </p>
                            <p class="features-sec-details">
                                Reseller friendly white-label reports to share with your clients
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- extra details -->
    <!-- ------------------------------->
    <!-- Frequently Asked Questions starts -->
    <?php require_once "components/faqs-new.php"; ?>
    <!-- Frequently Asked Questions ends -->
    <!----------------------------------------->
    <!-- <div class="mt-4">
        <?php // include_once 'components/seller-action.php'; ?>
    </div> -->
    <!----------------------------------------------------- -->
    <!-- curious section starts -->
    <?php require_once "components/curious-section.inc.php"; ?>
    <!-- curious section ended -->
    <!-- -------------------------------------------------- -->
    <!-- --------------------------------------- -->
    <!-- feedback form -->
    <?php require_once "components/feedback.php"; ?>
    <!-- feedback form -->
    <!-- ----------------------------------------------- -->
    <!-- Footer -->
    <?php require_once "components/footer.php"; ?>
    <!-- footer -->
    <script src="<?= URL ?>/js/jquery-2.2.3.min.js"></script>
    <script src="<?= URL ?>/plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 10,
            loop: true,
            // pagination: {
            //     el: ".swiper-pagination",
            //     clickable: true,
            // },
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
            // When window width is >= 576px (for mobile devices)
            280: {
                slidesPerView: 3,
            },
            // When window width is >= 768px (for iPad)
            768: {
                slidesPerView: 3,
            },
            // When window width is >= 992px
            992: {
                slidesPerView: 4,
            },
            // When window width is >= 1200px
            1200: {
                slidesPerView: 5,
            },
        },
        });
    </script>
</body>

</html>