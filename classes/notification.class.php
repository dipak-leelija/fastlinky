<?php

class Notifications extends DatabaseConnection{

    function addNotification($type, $title, $message, $reference_link, $added_for){
        try {
            $sql = "INSERT INTO notification 
                    (type, title, message, reference_link, added_for, added_on)
                    VALUES
                    ('$type', '$title', '$message', '$reference_link', '$added_for', now())";

            
            $query = $this->conn->query($sql);
            // $this->conn->close();
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
            $SQL = "SELECT * FROM notification WHERE added_for = $USERID ORDER BY added_on $SORT";
        }else {
           $SQL = "SELECT * FROM notification WHERE added_for = $USERID ORDER BY added_on $SORT LIMIT $LIMIT";
        }
        $result = $this->conn->query($SQL);

        if ($result->num_rows > 0) {
            
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }

        // $this->conn->close();
            return $data;
        }

        // $this->conn->close();
        return array();
            
    }// eof allNotifications


    function delByDaysOldNotification($today, $daysBefore, $added_for){

        $sql   = "DELETE FROM notification WHERE added_for = '$added_for' AND added_on < '$today' - INTERVAL $daysBefore DAY;";        
        $query = $this->conn->query($sql);
        return $query;

    }// eof delByDaysOldNotification
}