<section class="blogger-fourth-section" id="pricing-cards">
    <div class="price-table">
        <div class="container">
            <div class="price-table-box">
                <div class="row mb-3">
                    <!-- card 1 -->
                    <?php
                    foreach ($packages as $eachPack) {
                        $feature = $GPPackage->featureByPackageId($eachPack['id']);
                    ?>
                    <div class="col-md-4 px-0 px-md-1 px-lg-2">
                        <div class="price-box-content" id="">
                            <p class="package_type_category"><?php echo $eachPack['package_name']; ?></p>
                            <div class="packHr"></div>
                            <p class="price-box-title"><span class="dollar"><?php echo CURRENCY; ?></span><span class="main-price"><?php echo $eachPack['price']; ?></span>
                            </p>
                            <p class="chooseNiche"></p>
                            <ul class="price-box-ul">
                                <?php
                                foreach ($feature as $eachFeature) {
                                    echo '<li>'.$eachFeature['features'].'</li>';
                                }
                                ?>
                            </ul>
                            <button type="button" name="package-purchase-btn" id="package-purchase-btn"
                                class="package-purchase-btn">purchase now</button>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>