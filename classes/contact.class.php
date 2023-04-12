<?php
class Contact extends DatabaseConnection{

	

	//Add contact data on contact table
	function addContact($contact_name, $contact_email, $contact_phone, $message) {
		$id = 0;
		$contact_name 			= addslashes(trim($contact_name));
		$contact_email			= addslashes(trim($contact_email));
		$contact_phone			= addslashes(trim($contact_phone));
		$message 				= addslashes(trim($message));

		$sql = 			"INSERT INTO contact 
						(contact_name, contact_email, contact_phone, message, added_on)
						 VALUES
						('$contact_name', '$contact_email', '$contact_phone', '$message', now())";
		$query	= $this->conn->query($sql); 
		if ($query == 1) {
			return $query;
		}

	}

	


	/**
	*	Retrive  from the contact table
	*
	*	@param
	*			$id			contact id or primary key
	*			
	*	@return array
	*/
	function getContactData($id){
		$data	= array();
		$select		= "SELECT * FROM contact WHERE id = $id";
		$query		= $this->conn->query($select);
		if($query->num_rows > 0){
			$result = $query->fetch_object();
			$data = array(
							$result->id,					//0
							$result->contact_name,			//1
							$result->contact_email,			//2
							$result->contact_phone,			//3
							$result->message,				//4
							$result->added_on				//5
						 );
		}
	  	return $data;
	}//eof	

	

	/**
	*	Returns the list of registered customer
	*/
	function getAllContact($num){
		$data		= array();



		if($num == 'ALL'){

			$select		= "SELECT * FROM contact ORDER BY added_on DESC";

		}else if($num > 0){

			$select		= "SELECT * FROM contact ORDER BY added_on DESC LIMIT $num";

		}else{

			$select		= "SELECT * FROM contact";

		}

		

		$query		= $this->conn->query($select);

		

		while($result	= 	$query->fetch_array()){

			$data[]		= $result['id'];

		}

		return $data;

	}//eof

	

	/**

	*	Show contact data

	*	@param

	*	

	*			$id		Contact identity

	*/

	function showContactInfo($id){

		$data		= array();

		$select		= "SELECT * FROM contact WHERE id ='$id'";

		$query		= $this->conn->query($select);

		if($query->num_rows > 0){

			while($result	= 	$query->fetch_array()){

				$data	=	array(

								  $result['id'],				//0
								  $result['contact_name'],		//1
								  $result['contact_email'],		//2
								  $result['contact_phone'],		//3
								  $result['message'],			//4
								  $result['added_on']			//5

								);

			}//while

		}//if

		

		return $data;	

		

	}//	eof

	



	//  Display Contact identity  use
	public function ShowContact(){
		$temp_arr 	= array();
		$res 		= "SELECT * FROM contact order by id asc";
		$resQuery 	= $this->conn->query($res);
		while($row 	= $resQuery->fetch_array()) {
			 $temp_arr[] =$row;
	
		}
		return $temp_arr;
	}
	
	

	

}

?>