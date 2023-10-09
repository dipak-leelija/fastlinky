<?php
require_once ROOT_DIR."/classes/blog_mst.class.php";
$BlogMst    = new BlogMst;

$blogs = $BlogMst->staticBlogLists(10);
$blogs = json_decode($blogs);
?>

<section class="blogs-sites-table-cards">
    <h2 class="text-center">Avilable Guest Posting Sites</h2>
    <p class="text-center">We believe that <b>SEO Guest Posting Services</b> with maintaining high-quality content, definitely helps all brands to grow their business. We can assure you that your website will touch the vertex of the mountain after creating quality content for your brand through our <b>Premium Guest Posting Services</b>. There are <b>30000+</b> high <b>Domain Authority (DA)</b> websites spread worldwide. Hence you can choose easily any website to post by using our <b>Guest Posting Services</b>. Few blogs are given bellow-</p>
    <div class="row">
        <div class="col-md-8 pt-3 m-auto">
            <div class="table-responsive card">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col-1" class="text-start py-3">Blog Name</th>
                            <th scope="col-1" class="text-center py-3">Niche</th>
                            <th scope="col-1" class="text-center py-3">DA</th>
                            <th scope="col-1" class="text-center py-3">DR</th>
                            <th scope="col-1" class="text-center py-3">Traffic</th>
                            <th scope="col-1" class="text-center py-3">Grey Niche Price</th>
                            <th scope="col-1" class="text-center py-3">General Price</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php foreach ($blogs as $eachBlog) { ?>
                            <tr>
                                <td class="text-start"><?= $eachBlog->domain?></td>
                                <td class="text-center"><?= $eachBlog->niche?></td>
                                <td class="text-center"><?= $eachBlog->da?></td>
                                <td class="text-center"><?= $eachBlog->dr?></td>
                                <td class="text-center"><?= $eachBlog->organic_trafic?></td>
                                <td class="text-center">$<?= $eachBlog->grey_niche_cost?></td>
                                <td class="text-center">$<?= $eachBlog->ext_cost?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class=" text-center mt-3">
                <a href="<?= URL ?>/blogs-list">
                    <button type="button" class="btn srvc-common-btn py-2">View More</button>
                </a>
            </div>
        </div>
    </div>
</section>