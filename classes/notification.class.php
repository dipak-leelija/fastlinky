<?php
// "CREATE TABLE `fastlinky_db`.`notification` (`id` BIGINT(12) PRIMARY KEY NOT NULL , `order_name` VARCHAR(24) NOT NULL , `order_id` BIGINT(12) NOT NULL , `status` INT(2) NOT NULL , `message` VARCHAR(300) NOT NULL , `reference_table` VARCHAR(50) NOT NULL , `reference_id` VARCHAR(24) NOT NULL , `added_by` VARCHAR(24) NOT NULL , `added_on` DATETIME NOT NULL )";

class Notifications extends DatabaseConnection{

    function addNotification($type, $title, $message, $reference_link, $added_by){
        try {
            $sql = "INSERT INTO notification 
                    (type, title, message, reference_link, added_by, added_on)
                    VALUES
                    ('$type', '$title', '$message', '$reference_link', '$added_by', now())";

            
            $query = $this->conn->query($sql);
            $this->conn->close();
            return $query;
        } catch (Exception $e) {
            echo '<b>Error on:</b> '.__FILE__.', <b>On Line:</b>'.__LINE__.'<br>';
            echo '<b>Error:</b> '.$e->getMessage();
            exit;
        }
        
    }// eof addNotification


    public function allNotifications($USERID, $LIMIT = '*', $SORT = 'DESC'){

        $data = array();
        if ($LIMIT == '*') {
            $SQL = "SELECT * FROM notification WHERE added_by = $USERID ORDER BY added_on $SORT";
        }else {
           $SQL = "SELECT * FROM notification WHERE added_by = $USERID ORDER BY added_on $SORT LIMIT $LIMIT";
        }
        $result = $this->conn->query($SQL);

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

        $this->conn->close();
            return $data;
        }

        $this->conn->close();
        return array();
            
    }// eof allNotifications

}