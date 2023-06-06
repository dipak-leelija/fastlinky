<?php 
class PackageOrder extends DatabaseConnection{



  function addPackageOrder($packageId, $niche, $customerID, $name, $email, $price, $due_amount, $paid_amount, $paymentType, $transection_id, $status, $orderStatus){
    
    $sql ="INSERT INTO gp_package_order 
                        (`package_id`, `niche`, `customer_id`, `name`,	`email`, `price`, `due_amount`, `paid_amount`,
                        `payment_type`, `transection_id`, `status`, `order_status`, `date`)
                        VALUES
                        ('$packageId', '$niche', '$customerID', '$name', '$email', '$price', '$due_amount', '$paid_amount',
                        '$paymentType', '$transection_id', '$status', '$orderStatus', now())";
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

    
    function updatePackOrdersStatus($orderId, $statusId, $updatedBy) {

      try {
        $sql  = "UPDATE `gp_package_order` SET `order_status` = '$statusId', `updated_by` = '$updatedBy'
                                            WHERE `order_id` = '$orderId'";
    
        $res  = $this->conn->query($sql);
    
        if ($res) {
          return true;
        } else {
          return false;
        }
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }
    


    function getOrderStatus($orderId){
      $myArr = '';
      $sql = "SELECT order_status FROM `gp_package_order` WHERE `order_id` = '$orderId'";
      $data = $this->conn->query($sql);
  
      while($res = $data->fetch_object()){
        $myArr = $res->order_status;
      }
      return $myArr;
  
    }




  function getAllOrderDetails(){
    $myArr = array();
    $sql = "SELECT * FROM `gp_package_order`";
    $data = $this->conn->query($sql);

    while($res = $data->fetch_assoc()){
      $myArr[]= $res;
    }
    return $myArr;

  }

  

  function getPackOrderDetails($userId, $limit = '*'){
    
    try {
      
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
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


  function countPackOrderByUser($userId){
    try {
      $sql  = "SELECT COUNT(order_id) AS 'package_order_no' FROM `gp_package_order` WHERE `customer_id`='$userId'";
      $data = $this->conn->query($sql);
      while($res = $data->fetch_assoc()){
        $count = $res['package_order_no'];
      }
      return $count;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
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
  #                                         GP PACKAGE ORDER LINKS                                             #
  #                                                                                                            #
  ##############################################################################################################


  function addPackOrderLinks($orderId, $for_post, $anchor, $url, $added_by){

    $anchor = addslashes(trim($anchor));
    $url    = addslashes(trim($url));

      $query =  "INSERT INTO `gp_package_order_links`(`order_id`, `for_post`, `anchor`, `url`, `added_by`, `added_on`)
                                              VALUES ('$orderId', '$for_post','$anchor','$url', '$added_by', now())";
      $res = $this->conn->query($query);
      // $count = $this->conn->insert_id();
      return $res;
  }



  function getPackOrdLinks($orderId, $forPost){
    $data     = array();
    $query    = "SELECT id,anchor,url FROM `gp_package_order_links` 
                WHERE order_id = '$orderId' AND for_post = '$forPost' ORDER BY for_post ASC";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_assoc()) {
      $data[] = $result;
    }
    return $data;
  }



  function deletePackOrdLinks($orderId, $forPost){
    $res      = $this->conn->query("DELETE FROM `gp_package_order_links` WHERE order_id = '$orderId' AND for_post = '$forPost'");
    return $res;
  }




  

  ##############################################################################################################
  #                                                                                                            #
  #                                       GP PACKAGE ORDER LINK STATUS                                         #
  #                                                                                                            #
  ##############################################################################################################


  function raisePackOrderLinksIssue($linkId, $statusId, $issue, $added_by){

    $issue = addslashes(trim($issue));

      $query =  "INSERT INTO `gp_package_order_link_status`
                (`link_id`, `status`, `issue`, `added_by`, `added_on`)
                VALUES
                ('$linkId', '$statusId', '$issue', '$added_by', now())";

      $res = $this->conn->query($query);
      // $count = $this->conn->insert_id();
      return $res;
  }



  function getPackOrdLinksIssue($linkId){
    $data     = array();
    $query    = "SELECT id,status,issue FROM `gp_package_order_link_status` 
                WHERE link_id = '$linkId' ORDER BY id ASC";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_assoc()) {
      $data[] = $result;
    }
    return $data;
  }

  // function deletePackOrdLinks($orderId, $forPost){
  //   $res      = $this->conn->query("DELETE FROM `gp_package_order_links` WHERE order_id = '$orderId' AND for_post = '$forPost'");
  //   return $res;
  // }






  ##############################################################################################################
  #                                                                                                            #
  #                                         GP PACKAGE ORDER DETAILS                                           #
  #                                                                                                            #
  ##############################################################################################################


  function addPackOrderDtls($orderId, $statusId, $dsc, $added_by, $updator){
    if ($orderId == '') {
      return false;
    }else {
      $dsc = addslashes(trim($dsc));
      
      $query =  "INSERT INTO `gp_package_order_details`(`order_id`, `status`, `dsc`, `added_by`, `updator`, `added_on`)
                                              VALUES ('$orderId', '$statusId', '$dsc', '$added_by', '$updator', now())";
      $res = $this->conn->query($query);
      // $count = $this->conn->insert_id();
      return $res;
    }
  }





  function getPackOrdUpdates($orderId, $ordrBy){

    $data     = array();
    $query    = "SELECT * FROM `gp_package_order_details` 
                WHERE order_id = '$orderId' ORDER BY id $ordrBy";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_assoc()) {
      $data[] = $result;
    }
    return $data;

  }

  function getLastUpdateTime($orderId){

    $data     = array();
    $query    = "SELECT added_on FROM `gp_package_order_details` 
                WHERE order_id = '$orderId' ORDER BY id DESC LIMIT 1";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_assoc()) {
      $data = $result['added_on'];
    }
    return $data;

  }

  // function deletePackOrdDtls($orderId, $forPost){
  //   $res      = $this->conn->query("DELETE FROM `gp_package_order_details` WHERE order_id = '$orderId' AND for_post = '$forPost'");
  //   return $res;
  // }


  

  ##############################################################################################################
  #                                                                                                            #
  #                                      GP PACKAGE ORDER PUBLISHED LINKS                                      #
  #                                                                                                            #
  ##############################################################################################################


  /**
   * status code 1 = delivered;
   */
  function addPackPubLinks($orderId, $for_post, $pubUrl, $added_by){

      $pubUrl = addslashes(trim($pubUrl));

      $query =  "INSERT INTO `package_publish_links`(`order_id`,	`for_post`,	`url`, `status`, `added_on`, `added_by`)
                                              VALUES ('$orderId', '$for_post', '$pubUrl', '1', now(), '$added_by')";
      $res = $this->conn->query($query);
      // $count = $this->conn->insert_id();
      return $res;
  }





  function getPackPubUrl($orderId, $forPost){

    $data     = array();
    $query    = "SELECT * FROM `package_publish_links` 
                WHERE order_id = '$orderId'AND for_post = '$forPost'";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_assoc()) {
      $data = $result;
    }
    return $data;

  }



  function getPublishedUrlNo($orderId){

    $data     = array();
    $query    = "SELECT COUNT(*) as published FROM `package_publish_links` WHERE order_id = '$orderId'";
    $res      = $this->conn->query($query);
    while ($result = $res->fetch_object()) {
      $data = $result->published;
    }
    return $data;

  }

  function raiseIssue($linkId, $orderId, $issue, $status, $updatedBy){

    try {
      $sql  = "UPDATE `package_publish_links` SET status = '$status', issue = '$issue', updated_by = '$updatedBy', updated_on = now()
                                              WHERE id = '$linkId' AND order_id = '$orderId'";
      $res  = $this->conn->query($sql);
        return $res;
    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }

  function updateLiveURLS($linkId, $orderId, $url, $status, $updatedBy){

    try {
      $sql  = "UPDATE `package_publish_links` SET url = '$url', status = '$status', issue = '', updated_by = '$updatedBy', updated_on = now()
                                              WHERE id = '$linkId' AND order_id = '$orderId'";
      $res  = $this->conn->query($sql);
        return $res;
    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }


}

 ?>