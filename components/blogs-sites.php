<?php
require_once ROOT_DIR."/classes/blog_mst.class.php";
$BlogMst    = new BlogMst;

$blogs = $BlogMst->staticBlogLists(10);
$blogs = json_decode($blogs);
?>

<section class="blogs-sites-table-cards">
    <h2 class="text-center">Avilable Guest Posting Sites</h2>
    <p class="text-center">We believe that <b>SEO Guest Posting Services</b> with maintaining high-quality content,
        definitely helps all brands to grow their business. We can assure you that your website will touch the vertex of
        the mountain after creating quality content for your brand through our <b>Premium Guest Posting Services</b>.
        There are <b>30000+</b> high <b>Domain Authority (DA)</b> websites spread worldwide. Hence you can choose easily
        any website to post by using our <b>Guest Posting Services</b>. Few blogs are given bellow-</p>
    <div class="row">
        <div class="col-md-8 pt-3 m-auto">
            <div class="table-responsive card">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col-1" class="text-start py-3">Blog Name</th>
                            <th scope="col-1" class="text-center py-3">DA</th>
                            <th scope="col-1" class="text-center py-3">DR</th>
                            <th scope="col-1" class="text-center py-3">Traffic</th>
                            <th scope="col-1" class="text-center py-3">Grey Niche Price</th>
                            <th scope="col-1" class="text-center py-3">General Price</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-start">https://www.elivestory.com</td>
                            <td class="text-center">28</td>
                            <td class="text-center">48</td>
                            <td class="text-center">50k</td>
                            <td class="text-center">$400</td>
                            <td class="text-center">$60</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://newsforshopping.com</td>
                            <td class="text-center">55</td>
                            <td class="text-center">44</td>
                            <td class="text-center">25k</td>
                            <td class="text-center">$250</td>
                            <td class="text-center">$50</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://webtechhelp.org</td>
                            <td class="text-center">54</td>
                            <td class="text-center">40</td>
                            <td class="text-center">1k</td>
                            <td class="text-center">$200</td>
                            <td class="text-center">$50</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://bizmaa.com</td>
                            <td class="text-center">53</td>
                            <td class="text-center">41</td>
                            <td class="text-center">5k</td>
                            <td class="text-center">$250</td>
                            <td class="text-center">$50</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://www.fnbbuzz.com</td>
                            <td class="text-center">54</td>
                            <td class="text-center">44</td>
                            <td class="text-center">2k</td>
                            <td class="text-center">$250</td>
                            <td class="text-center">$40</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://www.neybg.com</td>
                            <td class="text-center">62</td>
                            <td class="text-center">33</td>
                            <td class="text-center">4k</td>
                            <td class="text-center">$250</td>
                            <td class="text-center">$50</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://www.activagain.com</td>
                            <td class="text-center">60</td>
                            <td class="text-center">20</td>
                            <td class="text-center">1k</td>
                            <td class="text-center">$150</td>
                            <td class="text-center">$40</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://capsaq.me</td>
                            <td class="text-center">55</td>
                            <td class="text-center">20</td>
                            <td class="text-center"></td>
                            <td class="text-center">$100</td>
                            <td class="text-center">$20</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://www.insideelsewhere.com</td>
                            <td class="text-center">53</td>
                            <td class="text-center">48</td>
                            <td class="text-center">1k</td>
                            <td class="text-center">$200</td>
                            <td class="text-center">$40</td>
                        </tr>
                        <tr>
                            <td class="text-start">http://www.exactarticle.com</td>
                            <td class="text-center">66</td>
                            <td class="text-center">20</td>
                            <td class="text-center"></td>
                            <td class="text-center">$100</td>
                            <td class="text-center">$20</td>
                        </tr>
                        <tr>
                            <td class="text-start">http://www.todayhealthplan.com</td>
                            <td class="text-center">54</td>
                            <td class="text-center">50</td>
                            <td class="text-center"></td>
                            <td class="text-center">$100</td>
                            <td class="text-center">$20</td>
                        </tr>
                        <tr>
                            <td class="text-start">https://www.abilogic.com</td>
                            <td class="text-center">56</td>
                            <td class="text-center">65</td>
                            <td class="text-center">2k</td>
                            <td class="text-center">$100</td>
                            <td class="text-center">$40</td>
                        </tr>
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