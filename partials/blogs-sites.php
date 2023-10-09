<?php
require_once ROOT_DIR."/classes/blog_mst.class.php";
$BlogMst    = new BlogMst;

$blogs = $BlogMst->staticBlogLists(12);
$splitInto = 3;
$lists = $BlogMst->splitArrayIntoParts($blogs, $splitInto);
?>

<section class="blogs-sites-table-cards">
    <h2 class="text-center">Avilable Guest Posting Sites</h2>
    <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, quia est sunt odit eum
        molestiae itaque quaerat blanditiis iste? Perspiciatis id quibusdam eveniet rerum sapiente asperiores,
        exercitationem aperiam necessitatibus atque!</p>
    <div class="row">
        <div class="col-md-8 pt-5 m-auto">
            <div class="table-responsive card">
                <table class="table ">
                    <thead>
                        <tr>
                            <?php for($i = 0; $i < $splitInto; $i++){ ?>
                            <th scope="col-1" class="text-center py-3">Blog Site</th>
                            <th scope="col-1" class="text-end py-3 pe-0">DA</th>
                            <th scope="col-2" class="py-3">DR</th>
                            <?php } ?>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        foreach ($lists as $chunk) {
                            echo '<tr>';
                            foreach ($chunk as $item) {
                                echo '<td class="text-center">' . $item['domain'] . '</td>';
                                echo '<td class="text-end pe-0">' . $item['da'] . '</td>';
                                echo '<td>' . $item['dr'] . '</td>';
                            }
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class=" text-center mt-3">
                <a href="#pricing-cards">
                    <button type="button" class="btn srvc-common-btn py-2">View More</button>
                </a>
            </div>
        </div>
    </div>
</section>