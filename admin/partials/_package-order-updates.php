<div class="mt-4">
    <p class="card-title mb-2">Updates</p>
    <div class="card status_card rounded border">
        <div class="card-body">
            <ul class="icon-data-list">

                <?php foreach ($updates as $ordUpdate) { ?>

                <li>
                    <div class="d-flex">
                        <img src="images/faces/face1.jpg" alt="user">
                        <div>
                            <p class="text-info mb-1">
                                <?php
                                $updateShow = $OrderStatus->singleOrderStatus($ordUpdate['status']);
                                echo $updateShow[0][1];
                                ?>
                            </p>
                            <p class="mb-0">
                                <?php
                                if ($ordUpdate['dsc'] != null) {
                                    echo $ordUpdate['dsc'] . '<br>';
                                }
                                
                                if ($ordUpdate['updator'] != null) {
                                    echo '<small>By ' . $ordUpdate['updator'] . '</small>';
                                }
                                ?>
                            </p>
                            <small><?php echo $ordUpdate['added_on']; ?></small>
                        </div>
                    </div>
                </li>
                
                <?php } ?>
                
            </ul>
        </div>
    </div>
</div>