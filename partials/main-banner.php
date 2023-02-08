<section class="new_section main_banner">
    <div class="row">
        <div class="col-12 col-lg-7 px-0 px-md-4">
            <h1>We will help you to <span>DREAM BIG</span> about your <span>BUSINESS</span>.</h1>
            <p class=" mt-3 mb-4 py-0 py-md-2"> We’re a team of SEO and development experts <br> who provide a complete
                set of integrated services to scale your company’s digital growth.
            </p>
            <!-- We’re a team of design and development experts <br> who help you transform and scale
                your organization. -->
            <div class=" buttonsinfo ">
                <!-- <button class="btn btn-danger seller-btn me-3 " type="submit"> -->
                    <a class="btn btn-danger seller-btn me-3 " href="./start-selling.php">
                        <!-- <i class="fa-solid fa-paper-plane pe-3"></i> -->
                        <!-- <i class="fa-solid fa-dollar-sign"></i> -->
                        <i class="fa-light fa-dollar-sign"></i>
                        Start Selling
                    </a>
                <!-- </button> -->
                <!-- <button type="button" class="btn text-capitalize seller-btn btn-outline-dark"> -->
                    <a href="./domains.php" class="btn text-capitalize seller-btn btn-outline-dark">
                        <i class="fa-solid fa-cart-shopping"></i>
                        marketplace
                    </a>
                <!-- </button> -->
            </div>
        </div>
        <div class="col-12 col-lg-5 vid-col">
            <!-- d-flex align-items-center justify-content-center -->
            <figure class="figure">
                <video width="100%" id="vid" loop>
                    <!-- <source src="images/videos/banner.mp4" type="video/mp4"> -->
                    <source src="images/videos/main-banner.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </figure>
        </div>
    </div>
</section>
<script>
// document.getElementById('vid').play();
var video = document.querySelector('video');
video.muted = true;
video.play()
</script>