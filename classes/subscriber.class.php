<?php 
	class EmailSubscriber extends Customer{
		
		//////////////////////////////////////////////////////////////////////////////////////////
		//
		//									Subscriber
		//
		//////////////////////////////////////////////////////////////////////////////////////////
		
		function addSubscriber($email){
			$allEmails = $this->getUserByEmail($email);

			if (isset($_SESSION[USR_SESS])) {
				$customerDetails = $this->getCustomerByemail($email);
				if ($allEmails == 0) {
					if ($customerDetails > 0) {
						if ($customerDetails['email'] == $email) {
						
							$mobNo = '';
							if($customerDetails['mobile'] != ''){
								$mobNo = $customerDetails['mobile'];
							}elseif ($customerDetails['phone1'] != '') {
								$mobNo = $customerDetails['phone1'];
							}else {
								$mobNo = $customerDetails['phone2'];
							}

							$status = 1;

							$added = $this->addSubscriberDetails($customerDetails['customer_id'], $email, $customerDetails['fname'], $customerDetails['lname'], $mobNo, $customerDetails['organization'], $status);
							if ($added == 1) {
								return ESSU;
							}
						}else {
							$added = $this->addMail($email);
							return ESSU;
						}
					}else {
						$added = $this->addMail($email);
						return ESSU;
					}

				}else{
					return ESAE;
				}
			}else {
				if ($allEmails == 0) {
					$added = $this->addMail($email);
					return ESSU;
				}else {
					return ESAE;
				}
			}	
		}

		function addMail($email){

			$email	= trim(addslashes($email));
			$sql = "INSERT INTO `email_subscriber` ( `email`, `added_on`) VALUES ('$email', now())";
			$res = $this->conn->query($sql);

			return $this->conn->insert_id;

		}




		/**
		*	Add a new subscriber
		*	@return int
		*/
		function addSubscriberDetails($cusid, $email, $fname, $lname, $phone, $company, $status){
			
			$cusid		= $cusid;
			$email		= trim($email);
			$fname		= trim(addslashes($fname));
			$lname		= trim(addslashes($lname));
			$phone		= trim(addslashes($phone));
			$company	= trim(addslashes($company));

			//inserting the email
			$insert = "INSERT INTO email_subscriber 
								(customer_id, email, fname, lname, company, phone, status, added_on)
						   		VALUES
						   		('$cusid', '$email', '$fname', '$lname', '$company', '$phone', '$status', now())";

				$query  = $this->conn->query($insert);
				
				//echo $insert.mysql_error(); exit;
				// $id		= $this->conn->insert_id;
				return $query;
			
		}//eof
		
		/**
		*	Edit a subscriber
		*
		*	@return int
		*/
		function editSubscriber($id, $email,$fname,$lname, $category, $company, $phone)
		{
			$email		= trim($email);
			$fname		= trim(addslashes($fname));
			$lname		= trim(addslashes($lname));
			$category	= (int) $category;
			$company	= trim(addslashes($company));
			$phone		= trim(addslashes($phone));
			
			
			$insert = "UPDATE email_subscriber SET 
					   email 		= '$email', 
					   fname		= '$fname', 
					   lname		= '$lname',  
					   cat_id		= '$category',  
					   company		= '$company',  
					   phone		= '$phone',
					   modified_on  = now()
					   WHERE 
					   subscriber_id = '$id'
					   ";
			$query  = mysql_query($insert);
			
		}//end of add subscriber
		

		public function getAllMail(){
			$sql = "SELECT email FROM email_subscriber";
			$res = $this->conn->query($sql);
			while ($data = $res->fetch_object()) {
				$result[] = $data->email;
			}
			return json_encode($result);
		}

		function getUserByEmail($email){
			$email	= trim(addslashes($email));
			
			$sql  = "SELECT * FROM `email_subscriber` WHERE `email_subscriber`.`email` = '$email'";
			$res  = $this->conn->query($sql);
			$rows = $res->num_rows;
			if ($rows > 0) {
				while ($data = $res->fetch_assoc()) {
					$result[] = $data;
				}
				return $result;
			}else {
				$result = false;
			}
		}
		/**
		*	Get email in alphabetical order
		*
		*	@param
		*			$letter		Starting Letter	
		*
		*	@return array
		*/
		function getSubsByAlpha($letter)
		{
			//security
			$letter = mysql_escape_string($letter);
			
			if($letter != '')
			{
				$sql = "SELECT * FROM email_subscriber WHERE email like '$letter%' ORDER BY email";
			}
			else
			{
				$sql = "SELECT * FROM email_subscriber ORDER BY email";
			}
			$query	= mysql_query($sql);
			$id		= array();
			
			if(mysql_num_rows($query) > 0)
			{
				while($result = mysql_fetch_object($query))
				{
					$id[] = $result->subscriber_id;
				}
			}
			return $id;
		}//eof
		
		/**
		*	Get email by status
		*
		*	@param
		*			$status		Status of the subscriber
		*
		*	@return array
		*/
		function getSubsByStatus($status)
		{
			//security
			$status = mysql_escape_string($status);
			
			if($status != '')
			{
				$sql = "SELECT * FROM email_subscriber WHERE status = '$status' ORDER BY email";
			}
			else
			{
				$sql = "SELECT * FROM email_subscriber ORDER BY email";	
			}
			
			
			$query	= mysql_query($sql);
			$id		= array();
			
			if(mysql_num_rows($query) > 0)
			{
				while($result = mysql_fetch_object($query))
				{
					$id[] = $result->subscriber_id;
				}
			}
			return $id;
		}//eof
		
		
		/**
		*	Search subscriber by key word only
		*
		*	@param
		*			$keyword	Keyword to search
		*
		*	@return array
		*/
		function getSubsKeyword($keyword)
		{
			$keyword = mysql_escape_string($keyword);
			
			if($keyword == '')
			{
				$sql =  "SELECT subscriber_id FROM email_subscriber";
			}
			else
			{
				$sql =  "SELECT subscriber_id,
						MATCH(email, fname, lname, company, phone)
						AGAINST ('$keyword' IN BOOLEAN MODE) AS score FROM  email_subscriber
						WHERE 
						MATCH(email, fname, lname, company, phone)
						AGAINST ('$keyword' IN BOOLEAN MODE) 
						ORDER BY score DESC"; 
			}
			 $query = mysql_query($sql);
			 $data = array();
			 //echo "<p>".$sql."</p>";echo "data";
			 while($result = mysql_fetch_object($query))
			 {
				$data[] = $result->subscriber_id;
			 } 
			 if(!$query)
			 {
				return mysql_error();
			 }
			 else
			 {
				return $data;
			 }
		}//eof
		
		
		/**
		*	Generate a dropdown list of Initiative letter subscriber
		*	@return NULL
		*/
		function emailList()
		{
			$sql = "SELECT * FROM email_subscriber WHERE status='a'";
			$qry = mysql_query($sql);
			$num = mysql_num_rows($qry);
			//slicing the results in number of 100, so that email will be send to 100 person at once
			$numChunks = ceil($num/100);
			
			//populationg the dropdown list
			echo "<SELECT name='email_list'>";
			for($i = 0; $i<$numChunks; $i++)
			{
				//To generate the range we are deciding the max value of the range.
				//e.g. in the range 100-200 max. value is 200
				if(($i == $numChunks) || ($num < 100) )
				{
					$maxVal = $num;
				}
				elseif($numChunks == 1)
				{
					$maxVal = 100;
				}
				else
				{
					$j = $j + 1;
					$maxVal = $j."00";
				}
				//The minimum value of the range, i.e. in the range of 100-200 100 is the min value
				if($numChunks == 1)
				{
					$minVal = 1;
				}
				else
				{
					$minVal = $i."00";
				}
				
				
				echo "<OPTION value='".$minVal."-".$maxVal."'>".
				$minVal."-".$maxVal." Persons</OPTION>";
				//echo $numChunks."<br>";
			}
			echo "<SELECT>";
		}//eof email list
		
		
}//end of class
?>