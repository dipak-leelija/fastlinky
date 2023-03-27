<?php 

class Feedback extends DatabaseConnection{

      function addFeedback($userId, $name, $email, $star, $feedback){
            
            $feedback = addslashes(trim($feedback));

            $sql = "INSERT INTO `feedbacks`
                                    (`user_id`, `name`, `email`, `star`, `feedback`, `added_on`)
                                    VALUES
                                    ('$userId', '$name', '$email', '$star', '$feedback', now())";
            
            $query = $this->conn->query($sql);
            // $insert_id= $this->conn->insert_id;

            return $query;

      }//eof

      // function showOrderUpdateById($order_id, $order_by){
            
      //       $data = array();
      //       if ($order_by == 'ASC' || $order_by == 'DESC') {
      //             $sql = "SELECT * FROM `order_updates` WHERE `order_id` = '$order_id' ORDER BY `updated_on` $order_by;";
      //             $query = $this->conn->query($sql);
      //             if ($query->num_rows > 0) {
      //                   while ($result = $query->fetch_array()) {
      //                         $data[] = $result;
      //                   }
      //             }
      //       }else{
      //             $sql = "SELECT * FROM `order_updates` WHERE `order_id` = '$order_id'";
      //             $query = $this->conn->query($sql);
      //             if ($query->num_rows > 0) {
      //                   while ($result = $query->fetch_array()) {
      //                         $data[] = $result;
      //                   }
      //             }
      //       }
      //       return $data;

      // }//eof

      function checkFeedBackExistance($customerId){

            $sql = "SELECT id FROM feedbacks WHERE user_id = $customerId";
            $query = $this->conn->query($sql);
            if ($query->num_rows == 0) {
                  return true;
            }else {
                  return false;
            }

      }


}
?>