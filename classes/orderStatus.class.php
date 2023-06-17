<?php


class OrderStatus extends DatabaseConnection{



    function allStatus(){
        try{
			$data   = array();
			$sql    = "SELECT * FROM `orders_status`";
			$res    = $this->conn->query($sql);
			$rows   = $res->num_rows;
			if ($rows > 0 ) {
				while ($result = $res->fetch_assoc()) {
					$data[] = $result;
				}
			}
			return $data;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
    }//eof


	function singleOrderStatus($id){

		try{
			$data   = array();
			$sql    = "SELECT * FROM `orders_status` WHERE `orders_status_id` = '$id'";
			$res    = $this->conn->query($sql);
			$rows   = $res->num_rows;
			if ($rows > 0 ) {
				while ($result = $res->fetch_array()) {
					$data[] = $result;
				}
			}
        	return $data;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
    }//eof



    /**
	*	Order name by order status
	*
	*	@param
	*			$orders_status_id			Orders status id
	*
	*	@return string
	*/
	function getOrdStatName($orders_status_id){

		try {

			$sql = "SELECT orders_status_name FROM orders_status WHERE orders_status_id ='$orders_status_id'";
			$query = $this->conn->query($sql);
			
			//check if data is there
			if($query->num_rows > 0){
				//fetch the data
				$result = $query->fetch_array();
				$data 	= $result['orders_status_name'];
			}else {
				$data = null;
			}
			
			//return the data
			return $data;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
		
	}//eof

}
?>