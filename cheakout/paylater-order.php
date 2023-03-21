<?php
session_start();

require_once dirname(__DIR__)."/includes/constant.inc.php";
require_once ROOT_DIR."/_config/dbconnect.php";

require_once ROOT_DIR."/classes/customer.class.php";
require_once ROOT_DIR."/classes/gp-package.class.php";
require_once ROOT_DIR."/classes/gp-order.class.php";
require_once ROOT_DIR."/classes/date.class.php";
require_once ROOT_DIR."/classes/location.class.php";
require_once ROOT_DIR."/classes/countries.class.php";
require_once ROOT_DIR."/classes/utility.class.php";


/* INSTANTIATING CLASSES */
$DateUtil       = new DateUtil();

$GPPackage      = new GuestPostpackage();
$PackageOrder   = new PackageOrder();
$customer		= new Customer();
$Location       = new Location();
$Countries      = new Countries();
$utility		= new Utility();

############################################################################################
$typeM		= $utility->returnGetVar('typeM','');
//user id
$cusId		= $utility->returnSess('userid', 0);
$cusDtl		= $customer->getCustomerData($cusId);

if($cusId == 0){
	header("Location: ".URL);
}

if($cusDtl[0][0] == 2){ 
	header("Location: dashboard.php");
}
if (!isset($_SESSION['package'])) {
    // print_r($_SESSION['package']);
    header('Location: ../customer-packages.php' );
    exit;   
}

$customerName       = $cusDtl[0][5].' '.$cusDtl[0][6];
$customerEmail      = $cusDtl[0][3];
$customerMobile     = $cusDtl[0][34];
$customerCity       = $Location->getCityDataById($cusDtl[0][27])['city'];
$customerCountry    = $Location->getCountyDataByCountyId($cusDtl[0][30])[1];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Order Summary - <?php echo COMPANY_S; ?></title>
    <link rel="shortcut icon" href="<?php echo FAVCON_PATH?>" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo FAVCON_PATH?>" />

    <link rel="stylesheet" href="../plugins/bootstrap-5.2.0/css/bootstrap.css">
    <link rel="stylesheet" href="../css/payment-summary-style.css">
</head>

<body>
    <section class="paylater-main-section">
        <!-- logo codes -->
        <div class="logos-section">
            <div class="text-center">
                <img src="<?php echo LOGO_WITH_PATH; ?>" alt="<?php echo COMPANY_FULL_NAME; ?>" class="main_logo">
            </div>
        </div>
        <!-- cards for customers details -->
        <div class="row my-3 my-md-4">
            <div class="col">
                <div class="jumbotron">
                    <div class="row">
                        <div class="col-sm d-flex">
                            <div class="card card-body flex-fill  customer-d-card">
                                <div>
                                    <h5>Customer Details</h5>
                                    <p><label><?php echo $customerName; ?></label></p>
                                    <p><label><?php echo $customerEmail; ?></label></p>
                                    <p><label><?php echo $customerMobile; ?></label></p>
                                    <p><label><?php echo $customerCity; ?></label></p>
                                    <p><label><?php echo $customerCountry; ?></label></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm d-flex">
                            <div class="card card-body flex-fill customer-d-card">
                                <h5>Bill Details</h5>
                                <p><label>Invoice Date : <?php echo $DateUtil->todayDate("/"); ?> </label>
                                </p>
                                <p><label>Due Date : <?php echo $DateUtil->todayDate("/"); ?><label></p>
                                <p><label>Payment Mode : PayLater<label></p>
                                <p><label>Total Package: <?php echo count($_SESSION['package']); ?></label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form action="order-processing.php" method="post">
            <div class=" display-table text-center">
                <!-- <div class="features_grids table-responsive"> -->
                <table class="table detailing-table">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Rate</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $totalCost = 00.00;

                            foreach ($_SESSION['package'] as $index => $packId) {
                            
                                $pack           = $GPPackage->packDetailsById($packId);
                                $packCat        = $GPPackage->packCatById($pack['category_id']);
                                $packFullName   = $packCat['category_name'].' '.$pack['package_name'];
                            
                                $totalCost      += $pack['price'];

                                
                                $orderIds[] = $PackageOrder->addPackageOrder($packId, '', $cusId, $customerName, $customerEmail, $pack['price'], $pack['price'], 'PayLater', '', '2', '2');
                            ?>
                        <tr>
                            <td class="text-start fw-semibold"><?php echo $packFullName; ?></td>
                            <td><?php echo 1; ?></td>
                            <td><?php echo CURRENCY.$pack['price']; ?></td>
                            <td> <?php echo CURRENCY; ?><span id="amount"><?php echo $pack['price']; ?></span>
                            </td>
                        </tr>
                        <?php
                            }
                            $_SESSION['orderIds']    =    $orderIds;
                            ?>
                    </tbody>
                </table>
                <!-- </div> -->
            </div>

            <!-- invoice table -->
            <div class="second-table-fr-total">
                <div class="row" style="display: flex; justify-content: end;">
                    <div class="col-md-5  ">
                        <table class="table table-responsive">
                            <thead class="table-secondary">
                                <tr>
                                    <th class="text-center" scope="col">Invoice Summary</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-6">Total</div>
                                            <div class="col-6 text-end fw-semibold">
                                                <?php echo CURRENCY.$totalCost;?></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-8"><b> Payment Method </b></div>
                                            <div class="col-4 text-end"><b>PayLater</b> </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row mt-2">
                                            <div class="col-12 text-end">
                                                <button type="submit"
                                                    class="btn btn-primary rounded-pill w-100 fw-semibold"
                                                    name="paylaterForm">Place Order</button>
                                            </div>
                                            <div class="col-12 text-end">
                                                <button type="button"
                                                    class="btn btn-danger rounded-pill w-100 fw-semibold mt-2"
                                                    onclick="history.back()">Cancel</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </form>
    </section>


    <script src="../plugins/bootstrap-5.2.0/js/bootstrap.js"></script>
</body>

</html>