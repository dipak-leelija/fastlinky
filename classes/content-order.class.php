<?php 

class ContentOrder extends DatabaseConnection{

      #######################################################################################################################
      #                                                                                                                     #
      #                                                     ORDER DETAILS                                                   #
      #                                                                                                                     #
      #######################################################################################################################


      public function addGuestPostOrder($clientUserId, $clientEmail, $clientOrderedSite, $clientRequirement, $clientOrderPrice, $orderStatus){

            $clientRequirement      = addslashes(trim($clientRequirement));

            $sql = "INSERT INTO `order_details` (
                                    `clientUserId`,
                                    `clientEmail`,	
                                    `clientOrderedSite`,	
                                    `clientRequirement`,	
                                    `order_price`,
                                    `order_status`,	
                                    `added_on`                                            
                                    ) VALUES (            
                                    '$clientUserId',
                                    '$clientEmail',
                                    '$clientOrderedSite',
                                    '$clientRequirement',
                                    '$clientOrderPrice',
                                    '$orderStatus',
                                    now()
                                    )";
            // echo $sql;
            $query = $this->conn->query($sql);
            $insert_id= $this->conn->insert_id;

            return $insert_id;

      }//eof




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
            $sql  = "SELECT * FROM `order_details` WHERE `order_status` >=0";
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
            $sql  = "SELECT * FROM `order_details` WHERE `clientUserId` = '$userId' AND `order_status` = 2 OR `order_status` = 'pending' OR `order_status` = 'Pending'";
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



      function ordersByStatus($userId, $statusId){

            $data = array();
            $sql  = "SELECT * FROM `order_details` WHERE `clientUserId` = '$userId' AND `order_status` = $statusId";
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
                  while ($result = $res->fetch_assoc()) {
                        $data[] = $result;
                  }
            }
            return $data;

      }//eof




      /**
       * @param $id = table `id` of tha table
       */
      function clientOrderById($id){

            $data = false;
            $sql  = "SELECT * FROM `order_details` WHERE `order_id` = '$id'";
            $res  = $this->conn->query($sql);
            $rows = $res->num_rows;
            if ($rows > 0 ) {
                  while ($result = $res->fetch_array()) {
                        $data = $result;
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




      /**
       * @param $orderId      = table `id`
       * @param $orderStatus  = table `order_status`
       */
      function contentOrderStatusUpdate($orderId, $orderStatus){

            $sql= "UPDATE `order_details`
                  SET
                  `order_status`     = '$orderStatus'
                  WHERE `order_id` = '$orderId' ";
            $query = $this->conn->query($sql);
            
            if ($query != 1) {
                  echo $sql.$this->conn->error;
            }

            return $query;

      }//eof



      function orderSingleDataUpdate($ord_id, $colName, $colVal, $updatedBy){

            $colVal = addslashes(trim($colVal));

            $sql= "UPDATE `order_details`
                                    SET
                                    `$colName`        ='$colVal',
                                    `modified_by`     ='$updatedBy',
                                    `modified_on`     =now()
                                    WHERE
                                    `order_id`  = '$ord_id' ";
            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);

            return $query;

      }//eof






      function ClientOrderOrderUpdate($orderId, $orderStatus, $column='', $columnData='' ){

            if ($column == '' || $columnData == '') {
                  
                  $sql= "UPDATE `order_details` SET  `order_status`      ='$orderStatus'
                                                WHERE 
                                                `order_id`= '$orderId'";
            }else {
                  $sql= "UPDATE `order_details` SET  `order_status` = '$orderStatus', `$column` = '$columnData'
                                                WHERE 
                                                `order_id`= '$orderId'";
            }

            $query = $this->conn->query($sql);
            return $query;
      }



      ######################################################################################################################
      #                                                                                                                    #
      #                                                    ORDER CONTENTS                                                  #
      #                                                                                                                    #
      ######################################################################################################################
      
      

      function addContent($orderId, $content_type, $title, $path="", $content=""){

            $title       = addslashes(trim($title));
            $path        = addslashes(trim($path));
            $content     = addslashes(trim($content));

            if ($content_type == 'doc') {
                  $sql = "INSERT INTO order_contents (`order_id`, `content_type`, `title`, `path`, `added_on`)
                                                VALUES
                                                ('$orderId', '$content_type', '$title', '$path', now())";
            }else {
                  $sql = "INSERT INTO order_contents (`order_id`, `content_type`, `title`, `content`, `added_on`)
                                                VALUES
                                                ('$orderId', '$content_type', '$title', '$content', now())";
            }

            if($this->conn->query($sql) != 1){
                  return false;
            }else {
                  $insert_id= $this->conn->insert_id;
                  return $insert_id;
            }

      }//eof


      function titleUpdate($orderId, $title){

            $update = "UPDATE order_contents
                              SET
                              title             = '$title',
                              updated_on        = now()
                              WHERE	
                              order_id	      = '$orderId'";
            $query = $this->conn->query($update);
            return $query;
      }


      function contentUpdate($orderId, $fileType, $path){

            $update = "UPDATE order_contents
                              SET
                              path             = '$path',
                              content_type     = '$fileType',
                              updated_on        = now()
                              WHERE	
                              order_id	      = '$orderId'";
            $query = $this->conn->query($update);
            return $query;
      }

      // function orderedContentUpdate($orderId, $title){

      //       $content     = addslashes(trim($content));

      //       if ($content_type == 'doc') {
      //             $sql = "INSERT INTO order_contents (`order_id`, `content_type`, `title`, `path`, `added_on`)
      //                                           VALUES
      //                                           ('$orderId', '$content_type', '$title', '$path', now())";
      //       }else {
      //             $sql = "INSERT INTO order_contents (`order_id`, `content_type`, `title`, `content`, `added_on`)
      //                                           VALUES
      //                                           ('$orderId', '$content_type', '$title', '$content', now())";
      //       }

      //       if($this->conn->query($sql) != 1){
      //             return false;
      //       }else {
      //             $insert_id= $this->conn->insert_id;
      //             return $insert_id;
      //       }
      // }

      function getOrderContent($orderId){

            $select = "SELECT * FROM order_contents WHERE order_id = $orderId";
            $query  = $this->conn->query($select);
            if ($query->num_rows > 0) {
                  while ($data = $query->fetch_assoc()) {
                        $res = $data;
                  }
                  return $res;
            }else{
                  return false;
            }
      }


      ######################################################################################################################
      #                                                                                                                    #
      #                                                    ORDER HYPERLINK                                                 #
      #                                                                                                                    #
      ######################################################################################################################

      function addContentHyperlink($contentId, $client_anchor, $client_url, $reference_anchor1, $reference_url1, $reference_anchor2, $reference_url2){

            $client_anchor     = addslashes(trim($client_anchor));
            $reference_anchor1        = addslashes(trim($reference_anchor1));
            $reference_anchor2        = addslashes(trim($reference_anchor2));

            $sql= "INSERT INTO `ordered_content_hyperlinks`  
                              (`content_id`,
                              `client_anchor`,
                              `client_url`,
                              `reference_anchor1`,
                              `reference_url1`,
                              `reference_anchor2`,
                              `reference_url2`,
                              `added_on`)
                              VALUES
                              ('$contentId', '$client_anchor', '$client_url', '$reference_anchor1', '$reference_url1','$reference_anchor2', '$reference_url2', now())";

            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);

            return $query;

      }//eof



      function updateHyperLinks($contentId, $client_anchor, $client_url, $reference_anchor1, $reference_url1, $reference_anchor2, $reference_url2){
            $update = "UPDATE ordered_content_hyperlinks SET
                              client_anchor     = '$client_anchor',
                              client_url        = '$client_url',
                              reference_anchor1 = '$reference_anchor1',
                              reference_url1    = '$reference_url1',
                              reference_anchor2 = '$reference_anchor2',
                              reference_url2    = '$reference_url2',
                              added_on          = now()
                              WHERE 
                              content_id        = $contentId";

            $query = $this->conn->query($update);

            return $query;
      }

      function getContentHyperLinks($content_id){
            
            $res    = false;
            $select = "SELECT * FROM ordered_content_hyperlinks WHERE content_id = $content_id";
            $query  = $this->conn->query($select);
            if ($query->num_rows > 0) {
                  while ($data = $query->fetch_assoc()) {
                        $res = $data;
                  }
            }
            return $res;
      }
      

      function delContentHyperlink($id){

		$sql = "DELETE FROM ordered_content_hyperlinks WHERE id = '$id'";

            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);
            
            return $query;

      }//eof


      ######################################################################################################################
      #                                                                                                                    #
      #                                               Order Transections                                                   #
      #                                                                                                                    #
      ######################################################################################################################


      public function showTrxnByOrderId($order_id){

            $sql= "SELECT * FROM  `order_transections` WHERE `order_id`  = '$order_id' ";
            // echo $sql.$this->conn->error;
            $query = $this->conn->query($sql);
            if ($query->num_rows > 0) {
                  while ($data = $query->fetch_assoc()) {
                       $res = $data;
                  }
            }else {
                  $res = false;
            }

            return $res;

      }//eof


      function addOrderTransection($order_id, $trxn_id, $trxn_mode, $trxn_status, $item_amount, $content_price, $order_amount, $due_amount, $paid_amount, $transection_by){

            $trxn_mode = addslashes(trim($trxn_mode));	
	
            $sql = "INSERT INTO `order_transections` 
                        (`order_id`, `transection_id`, `transection_mode`, `transection_status`, `item_amount`, `content_price`, `order_amount`, `due_amount`, `paid_amount`, `transection_by`, `updated_on`)	
                        VALUES
                        ('$order_id', '$trxn_id', '$trxn_mode', '$trxn_status', '$item_amount', '$content_price', '$order_amount', '$due_amount', '$paid_amount','$transection_by', now())";
            // echo $sql.$this->conn->error;
            
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
            $data = false;
            $sql = "SELECT * FROM `order_transections` WHERE `order_id` = '$order_id'";
            $query = $this->conn->query($sql);
            if ($query->num_rows > 0) {
                  while ($result = $query->fetch_assoc()) {
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