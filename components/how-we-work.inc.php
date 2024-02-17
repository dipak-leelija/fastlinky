<?php

function eachStep($title, $subTitle, $imagepath, $pointsArray){
?>
<div class="position-relative z-20">
    <div class="w-full pb-7">
        <div class="px-4">
            <div class="d-flex flex-wrap align-items-start">
                <div class="position-sticky top-50 relative text-center d-none d-lg-block col-12 col-lg-5 col-xl-6">
                    <span class="js-scroll-block d-block transition duration-1000">
                        <h2
                            class="sec-title green-highlight tracking-tighter fw-semibold transform -translate-y-6 leading-tight">
                            <?= $title ?>
                        </h2>
                    </span>
                    <span class="position-absolute ring-ponter rounded-circle ring-white">
                    </span>
                </div>
                <div class="work-right relative js-scroll-block transition duration-1000 col-12 col-lg-7 col-xl-6 ">
                    <div class="texts">
                        <span
                            class="position-absolute ring-ponter rounded-circle ring-white translate-x-2/3  | d-lg-none">
                        </span>
                        <h2 class="sec-title green-highlight tracking-tighter fw-semibold mb-2 d-lg-none leading-tight">
                            <?= $title ?>
                        </h2>
                        <h3 class="sec-sub-title green-highlight tracking-tighter fw-semibold mt-3 mb-2 leading-tight">
                            <?= $subTitle?>
                        </h3>
                        <div class="d-md-flex">
                            <div class="redactor text-gray-800">
                                <ul class="li-points mb-8 text-mdpl-4">
                                    <?php
                                foreach ($pointsArray as $point) {
                                    echo "<li class=\"mb-2\"> $point </li>"; 
                                }
                                ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pt-5 img-container">
                        <div class="position-relative overflow-hidden">
                            <img class="rounded" src="<?= $imagepath ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
?>