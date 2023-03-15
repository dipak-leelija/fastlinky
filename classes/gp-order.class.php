<?php 
class PackageOrder extends DatabaseConnection{



  function addPackageOrder($packageId, $niche, $customerID, $name, $email, $price, $paid_amount, $paymentType, $transection_id, $status, $orderStatus){
    
    $sql ="INSERT INTO `gp_package_order`(`package_id`, `niche`, `customer_id`, `name`,	`email`, `price`, `paid_amount`, `payment_type`,
                                          `transection_id`, `status`, `order_status`, `date`)
                                  VALUES ('$packageId', '$niche', '$customerID', '$name', '$email', '$price', '$paid_amount', '$paymentType',
                                          '$transection_id', '$status', '$orderStatus', now())";
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
        while ($data = $res->fetch_assoc()) {
          $order = $data;
        }
        return $order;
      }
    }


    function updatePayment($order_id, $transectionId, $paymentMode, $paymentStatus, $order_status){
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
        return true;
      }else {
        return false;
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

  

  function getPackOrderDetails($userId, $limit){
    $myArr = array();

    if ($limit !== '*') {
      $sql = "SELECT * FROM `gp_package_order` WHERE `customer_id`='$userId' LIMIT $limit";
      $data = $this->conn->query($sql);
      while($res = $data->fetch_assoc()){
        $myArr[] = $res;
      }
    }else {
      $sql = "SELECT * FROM `gp_package_order` WHERE `customer_id`='$userId'";
      $data = $this->conn->query($sql);
      while($res = $data->fetch_assoc()){
        $myArr[] = $res;
      }
    }
    return $myArr;
  }


  function countPackOrderByUser($userId){
    
    $sql  = "SELECT order_id FROM `gp_package_order` WHERE `customer_id`='$userId'";
    $data = $this->conn->query($sql);
    $rows = $data->num_rows;
    return $rows;
  }


  

  function pendingGPOrders($userId){

    $data = array();
    $sql  = "SELECT * FROM `gp_package_order` WHERE `customer_id` = '$userId' AND `order_status` = 2 OR `order_status` = 'pending' OR `order_status` = 'Pending'";
    // echo $sql;
    $res  = $this->conn->query($sql);
    $rows = $res->num_rows;
    if ($rows > 0) {
          while ($result = $res->fetch_assoc()) {
                $data[] = $result;
          }
    }
    return $data;

  }//eof



  ##############################################################################################################
  #                                                                                                            #
  #                                         GP PACKAGE ORDER DETAILS                                           #
  #                                                                                                            #
  ##############################################################################################################


  function addPackOrderDtls($orderId, $for_post, $anchor, $url, $added_by){

    $anchor = addslashes(trim($anchor));
    $url    = addslashes(trim($url));

      $query =  "INSERT INTO `gp_package_order_details`(`order_id`, `for_post`, `anchor`, `url`, `added_by`, `added_on`)
                                              VALUES ('$orderId', '$for_post','$anchor','$url', '$added_by', now())";
      $res = $this->conn->query($query);
      // $count = $this->conn->insert_id();
      return $res;
  }

  function getPackOrdLinks($orderId, $forPost){
    $data     = array();
    $query    = "SELECT anchor,url FROM `gp_package_order_details` 
                WHERE order_id = '$orderId' AND for_post = '$forPost' ORDER BY for_post ASC";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_assoc()) {
      $data[] = $result;
    }
    return $data;
  }

  function deletePackOrdDtls($orderId, $forPost){
    $res      = $this->conn->query("DELETE FROM `gp_package_order_details` WHERE order_id = '$orderId' AND for_post = '$forPost'");
    return $res;
  }
}

 ?>