<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class PackageOrder extends DatabaseConnection{



  function insertPackageOrder($packageId, $niche, $customerID, $name, $email, $paymentType, $transection_id, $status, $orderStatus){
    $sql ="INSERT INTO `gp_package_order`(`package_id`, `niche`, `customer_id`, `name`,	`email`, `date`,
                                          `payment_type`,  `transection_id`, `status`, `order_status`	)
                                  VALUES ('$packageId', '$niche', '$customerID', '$name', '$email', now(),
                                          '$paymentType', '$transection_id', '$status', '$orderStatus')";
        $data  = $this->conn->query($sql);
        if ($data) {
          $id = $this->conn->insert_id;
          return $id;
        }else {
          return false;
        }
        
    }



    function gpOrderById($orderId){ 
      $sql = "SELECT * FROM `gp_package_order` WHERE `order_id`= '$orderId'";
      $res = $this->conn->query($sql);
      if ($res->num_rows > 0) {
        while ($data = $res->fetch_array()) {
          $order[] = $data;
        }
        return $order;
      }
    }


    function successPayment($order_id, $transectionId, $paymentMode, $paymentStatus, $order_status){
      $sql = "UPDATE `gp_package_order` 
              SET 
              `transection_id` = '$transectionId',
              `payment_type`   = '$paymentMode',
              `order_status`   = '$order_status',
              `status`         = '$paymentStatus'
              WHERE 
              `order_id`= '$order_id'";

      $data = $this->conn->query($sql);
      if($data){
        return 1;
      }else {
        return 0;
      }
      //echo $sql.mysql_error();
    }


  function getAllOrderDetails(){
    $sql = "SELECT * FROM `gp_package_order`";
    $data = $this->conn->query($sql);
    $myArr = array();

    while($res = $this->conn->fetch_assoc($data)){
      $myArr[]= $res;
    }
    return $myArr;

  }

  

  function getOrderDetails($userId){
    $myArr = array();
    $sql = "SELECT * FROM `gp_package_order` WHERE `customer_id`='$userId'";
    $data = $this->conn->query($sql);
    while($res = $data->fetch_object()){
        $myArr[] = $res;
    }
    return $myArr;
  }




  

  function insertPackOrder($orderId,$key,$link,$text){
      $sql ="INSERT INTO `gp_package_order_details`(`pack_order_id`, `anchor_text`, `anchor_link`, `comment`, `added_on`, `modified_on`) VALUES ('$orderId','$key','$link','$text',now(),now())";
      $data = $this->conn->query($sql);
      $count = $this->conn->insert_id();
  }


  function ccavTrackingInsert($orderId, $trackId){
    $sql = "UPDATE  `gp_package_order` SET `cc_ordered_key` = '$trackId' WHERE `order_id` = '$orderId'";
    $res = $this->conn->query($sql);
    return $res;
  }

}

 ?>