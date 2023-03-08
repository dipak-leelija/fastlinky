<?php 

class ContentOrder extends DatabaseConnection{



      function showOrderdContentsByCol($column, $value, $andCol, $andvalue){
            // $data = array();
            if ($andCol == null || $andvalue == null) {
                  $sql  = "SELECT * FROM `order_details` WHERE `$column` = '$value'";
            }else {
                  $sql  = "SELECT * FROM `order_details` WHERE `$column` = '$value' AND `$andCol` = '$andvalue'";
            }
            // echo $sql;
            $res  = $this->conn->query($sql);
            $rows = $res->num_rows;
            if ($rows > 0 ) {
                  while ($result = $res->fetch_array()) {
                        $data[] = $result;
                  }
            }
            return $data;

      }//eof






      function activeOrders(){

            $data = array();
            $sql  = "SELECT * FROM `order_details` WHERE `clientOrderStatus` >=0";
            // echo $sql;
            $res  = $this->conn->query($sql);
            $rows = $res->num_rows;
            if ($rows > 0) {
                  while ($result = $res->fetch_array()) {
                        $data[] = $result;
                  }
            }
            return $data;

      }//eof


      function pendingOrders($userId){

            $data = array();
            $sql  = "SELECT * FROM `order_details` WHERE `clientUserId` = '$userId' AND `clientOrderStatus` = 2 OR `clientOrderStatus` = 'pending' OR `clientOrderStatus` = 'Pending'";
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





      function showAllOrderdContents(){

            $data = array();
            $sql  = "SELECT * FROM `order_details`";
            $res  = $this->conn->query($sql);
            $rows = $res->num_rows;
            if ($rows > 0 ) {
                  while ($result = $res->fetch_array()) {
                        $data[] = $result;
                  }
            }
            return $data;

      }//eof




      /**
       * @param $id = table `id` of tha table
       */
      function clientOrderById($id){

            $data = array();
            $sql  = "SELECT * FROM `order_details` WHERE `order_id` = '$id'";
            $res  = $this->conn->query($sql);
            $rows = $res->num_rows;
            if ($rows > 0 ) {
                  while ($result = $res->fetch_array()) {
                        $data[] = $result;
                  }
            }
            return $data;

      }//eof




      function clientOrders($userId){

            $data = array();
            $sql  = "SELECT * FROM `order_details` WHERE `clientUserId` = '$userId' ORDER BY `order_id` DESC";
            $res  = $this->conn->query($sql);
            $rows = $res->num_rows;
            if ($rows > 0 ) {
                  while ($result = $res->fetch_array()) {
                        $data[] = $result;
                  }
            }
            return $data;

      }//eof



      function contentOrdersBySeller($userId){
            $data = array();
            $activeOrder    = $this->activeOrders();
            foreach ($activeOrder as $order) {
                  // $domains = $blogMst->ShowUserBlogData($cusDtl[0][2]);
                  $res = "SELECT * FROM blog_mst where created_by ='$userId' order by blog_id desc";
                  $query = $this->conn->query($res);
      
                  $rows= $query->num_rows;
      
                  while($result = $query->fetch_assoc()) {
                        if ($order['clientOrderedSite'] == $result['domain']) {
                              // $data[] = $result;
                              $data[] = $order;
                              
                        }
                  }    
            } 
            return $data; 
      }



      function mostSellingBlogs(){
            $sql = 'SELECT clientOrderedSite,order_id FROM order_details as od inner join blog_mst as b on od.clientOrderedSite = b.domain';
            $res = $this->conn->query($sql);
            while ($result = $res->fetch_assoc()) {
                  $data[] = $result;
            }
            return $data;
      }



      /**
       * @param $contentsId    = table `id`
       * @param $tranId        = table `clientTransactionId`
       * @param $pymntStatus   = table `paymentStatus`
       * @param $orderStatus   = table `clientOrderStatus`
       * 
       */
      function contentOrderStatusUpdate($orderId, $tranId, $pymntStatus, $orderStatus){

            $sql= "UPDATE `order_details`
                  SET
                  `clientTransactionId`   = '$tranId',
                  `paymentStatus`         = '$pymntStatus',
                  `clientOrderStatus`     = '$orderStatus'
                  WHERE `order_id` = '$orderId' ";
            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);

            return $query;

      }//eof




      // ========================================================================================================================
      // ========================================================================================================================
      // ========================================================================================================================
      // ========================================================================================================================
      // ========================================================================================================================



      public function contentOrderDetails($clientUserId, $clientName, $clientEmail, $clientOrderedSite, $clientTargetUrl, $clientAnchorText, $clientContent, $clientRequirement, $clientOrderPrice, $orderStatus){

            $clientAnchorText       = addslashes(trim($clientAnchorText));
            $clientContent          = addslashes(trim($clientContent));
            $clientRequirement      = addslashes(trim($clientRequirement));


            $sql = "INSERT INTO `order_details` ( `clientUserId`, `clientName`, `clientEmail`, `clientOrderedSite`, `clientTargetUrl`, `clientAnchorText`, `clientContent`, `clientRequirement`,`clientOrderPrice`, `clientOrderStatus`) VALUES ('$clientUserId','$clientName','$clientEmail','$clientOrderedSite','$clientTargetUrl','$clientAnchorText','$clientContent','$clientRequirement','$clientOrderPrice', '$orderStatus')";
            // echo $sql;
            $query = $this->conn->query($sql);
            $insert_id= $this->conn->insert_id;

            return $insert_id;

      }//eof



      function orderSingleDataUpdate($ord_id, $colName, $colData, $updatedBy){

            $colData = addslashes(trim($colData));

            $sql= "UPDATE `order_details`
                                    SET
                                    `$colName`   ='$colData',
                                    `modified_by`     ='$updatedBy',
                                    `modified_on`     =now()
                                    WHERE
                                    `order_id`  = '$ord_id' ";
            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);

            return $query;

      }//eof





      public function ClientOrderDetailsUpdate($id, $tranId, $tranStatus){

            $sql= "UPDATE `order_details`
                                    SET
                                    `clientTransactionId`   ='$tranId',
                                    `clientOrderStatus`     ='$tranStatus'
                                    WHERE
                                    `order_id`  = '$id' ";
            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);

            return $query;

      }//eof



      function ClientOrderContentUpdate($orderId, $clientAnchorText, $clientTargetUrl, $clientContent, $clientRequirement){

            $clientAnchorText       = addslashes(trim($clientAnchorText));
            $clientContent          = addslashes(trim($clientContent));
            $clientRequirement      = addslashes(trim($clientRequirement));

            if ($clientContent == '') {
                  $sql= "UPDATE `order_details` 
                                    SET 
                                    `clientAnchorText`      ='$clientAnchorText',
                                    `clientTargetUrl`       ='$clientTargetUrl',
                                    `clientRequirement`     ='$clientRequirement'
                                    WHERE 
                                    `order_id`= '$orderId'";
                  // echo $sql.$this->conn->error;
                  $query = $this->conn->query($sql);
            }else {
                  $sql= "UPDATE `order_details` 
                                    SET 
                                    `clientAnchorText`      ='$clientAnchorText',
                                    `clientTargetUrl`       ='$clientTargetUrl',
                                    `clientContent`         ='$clientContent',
                                    `clientRequirement`     ='$clientRequirement'
                                    WHERE 
                                    `order_id`= '$orderId'";
                  // echo $sql.$this->conn->error;
                  $query = $this->conn->query($sql);

            }
            return $query;

      }//eof



      function ClientOrderOrderUpdate($orderId, $orderStatus, $column, $columnData ){

            if ($column == null) {
                  
                  $sql= "UPDATE `order_details` 
                                          SET 
                                          `clientOrderStatus`      ='$orderStatus'
                                          WHERE 
                                          `order_id`= '$orderId'";
                  $query = $this->conn->query($sql);
                  
                  return $query;
            }else {
                  $sql= "UPDATE `order_details` 
                                          SET 
                                          `clientOrderStatus`      ='$orderStatus',
                                          `$column`                ='$columnData'
                                          WHERE 
                                          `order_id`= '$orderId'";
                                          // echo $sql;
                  $query = $this->conn->query($sql);
                  
                  return $query;
            }
      }



      public function ClientOrderDetails2($clientUserId,$clientName,$clientEmail,$clientOrderedSite,$clientTargetUrl,$clientAnchorText,$clientRequirement,$clientOrderPrice){

            $sql= "INSERT INTO `order-details2`( `clientUserId`, `clientName`, `clientEmail`, `clientOrderedSite`, `clientTargetUrl`, `clientAnchorText`, `clientRequirement`, `clientOrderPrice`) VALUES ('$clientUserId','$clientName','$clientEmail','$clientOrderedSite','$clientTargetUrl','$clientAnchorText','$clientRequirement','$clientOrderPrice')";
           
            $query= $this->conn->query($sql);
            // $insert_id= $this->conn->insert_id;

               return $query;

         }//eof




      ######################################################################################################################
      #                                                                                                                    #
      #                                               Order Transections                                                   #
      #                                                                                                                    #
      ######################################################################################################################


      function addOrderTransection($order_id, $transection_id, $transection_mode, $item_amount, $due_amount, $paid_amount, $t_date, $transection_by){
            
            $transection_mode = addslashes(trim($transection_mode));

            $sql = "INSERT INTO `order_transections` 
                        (`order_id`, `transection_id`, `transection_mode`, `item_amount`, `due_amount`, `paid_amount`, `t_date`, `transection_by`)
                        VALUES
                        ('$order_id','$transection_id','$transection_mode','$item_amount', '$due_amount', '$paid_amount','$t_date','$transection_by')";
            
            $query = $this->conn->query($sql);
            // $insert_id= $this->conn->insert_id;

            return $query;

      }//eof



      function updatepayLaterTransection($order_id, $transection_id, $transection_mode, $due_amount, $paid_amount, $updated_on, $updated_by){
            
            $transection_mode = addslashes(trim($transection_mode));

            $sql = "UPDATE `order_transections`
                              SET
                              `transection_id`  = '$transection_id',
                              `transection_mode`= '$transection_mode',
                              `due_amount`      = '$due_amount',
                              `paid_amount`     = '$paid_amount',
                              `updated_on`      = '$updated_on',
                              `updated_by`      = '$updated_by'
                              WHERE
                              `order_id`        = '$order_id'";
            
            $query = $this->conn->query($sql);
            // $insert_id= $this->conn->insert_id;

            return $query;

      }//eof



      function showTransectionByOrder($order_id){
            
            $sql = "SELECT * FROM `order_transections` WHERE `order_id` = '$order_id'";
            $query = $this->conn->query($sql);
            if ($query->num_rows > 0) {
                  while ($result = $query->fetch_array()) {
                        $data = $result;
                  }
            }
            return $data;

      }//eof



      ######################################################################################################################
      #                                                                                                                    #
      #                                                     Order Updates                                                  #
      #                                                                                                                    #
      ######################################################################################################################


      function addOrderUpdate($order_id, $subject, $dsc, $updated_by){
            
            $subject = addslashes(trim($subject));
            $dsc     = addslashes(trim($dsc));

            $sql = "INSERT INTO `order_updates`
            (`order_id`, `subject`,	`dsc`, `updated_by`, `updated_on`)
                        VALUES
                        ('$order_id','$subject','$dsc','$updated_by', now())";
            
            $query = $this->conn->query($sql);
            // $insert_id= $this->conn->insert_id;

            return $query;

      }//eof

      function showOrderUpdateById($order_id, $order_by){
            
            $data = array();
            if ($order_by == 'ASC' || $order_by == 'DESC') {
                  $sql = "SELECT * FROM `order_updates` WHERE `order_id` = '$order_id' ORDER BY `updated_on` $order_by;";
                  $query = $this->conn->query($sql);
                  if ($query->num_rows > 0) {
                        while ($result = $query->fetch_array()) {
                              $data[] = $result;
                        }
                  }
            }else{
                  $sql = "SELECT * FROM `order_updates` WHERE `order_id` = '$order_id'";
                  $query = $this->conn->query($sql);
                  if ($query->num_rows > 0) {
                        while ($result = $query->fetch_array()) {
                              $data[] = $result;
                        }
                  }
            }
            return $data;

      }//eof

      function lastUpdate($ordId){

            $data = array();
            $sql = "SELECT * FROM order_updates WHERE order_id = $ordId ORDER BY id DESC LIMIT 1";
            $query = $this->conn->query($sql);
            if ($query->num_rows > 0) {
                  while ($result = $query->fetch_array()) {
                        $data = $result;
                  }
            }
            return $data;

      }


}
?>