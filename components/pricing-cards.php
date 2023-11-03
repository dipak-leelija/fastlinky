<section class="blogger-fourth-section" id="pricing-cards">
    <div class="price-table py-md-4 py-2">
        <div class="container">
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" id="package-cards">
                <div class="price-table-box">
                    <div class="row">
                        <!-- card 1 -->
                        <?php
                    foreach ($packages as $eachPack) {
                        $feature = $GPPackage->featureByPackageId($eachPack['id']);
                    ?>
                        <div class="col-md-4 px-0 px-md-1 px-lg-2">
                            <input type="radio" class="d-none" id="radio-id-<?php echo $eachPack['id'];?>"
                                name="packageid" value="<?php echo $eachPack['id'];?>">
                            <label class="w-100 d-block" for="radio-id-<?php echo $eachPack['id'];?>">
                                <div class="price-box-content" id="">
                                    <?php if (!empty($packCat['discount']) || $packCat['discount'] != ''): ?>
                                    <div class="sale-offer-div">
                                        <?= $packCat['discount'] ?> Off
                                    </div>
                                    <?php endif; ?>
                                    <p class="package_type_category"><?php echo $eachPack['package_name']; ?></p>
                                    <div class="packHr"></div>
                                    <p class="price-box-title"><sup class="dollar"><?php echo CURRENCY; ?></sup><span
                                            class="main-price"><?php echo $eachPack['price']; ?></span>
                                        <!-- <span class="fs-4">&#8725;</span>month -->
                                    </p>
                                    <p>
                                        <small class="small text-secondary">
                                            <?php
                                            if ($packCat['id'] == 6) {
                                                echo "{$eachPack['blog_post']} Links insertion";
                                            }else {
                                                echo "Including {$eachPack['blog_post']} Blog Posts";
                                            }
                                            ?>
                                        </small>
                                    </p>
                                    <p class="chooseNiche"></p>
                                    <ul class="price-box-ul">
                                        <?php
                                    foreach ($feature as $eachFeature) {
                                        echo '<li>'.$eachFeature['features'].'</li>';
                                    }
                                    ?>
                                    </ul>
                                    <button type="button" id="package-purchase-btn" class="package-purchase-btn"
                                        onClick="purchasePackage(this)">purchase now</button>
                                </div>
                            </label>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
const purchasePackage = (elem) => {
    elem.parentNode.click();
    document.getElementById('package-cards').submit();
}
</script>