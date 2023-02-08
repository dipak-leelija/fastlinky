<?php 
require_once '../classes/adminLogin.class.php'; 
require_once "../classes/utility.class.php"; 

//instantiate class
$numLogin 		= new adminLogin(); 
$utility		= new Utility();

//admin detail
$userData =  $numLogin->getUserDetail($_SESSION[ADM_SESS]);

?>
<link rel="stylesheet" type="text/css" href="../style/admin/admin.css"/>

    <div id="body-top">
    	<!-- Left -->
    	<div id="top-left">
        	<a href="../" target="_blank">Website Home</a>
            <a href="admin.php">Admin Home</a>
        </div>
        
        <!-- Right -->
        <div id="top-right">
        	<div id="dropdown-options" title="Click Here to View Options">
            	<a href="javascript:void(0)">
            		<img src="../images/admin/icon/admin-logo.png" width="30" height="30" alt="ansysoft-options" border="0" />
                </a>
                <div id="dropdown-back">
               		<div>
                    	Total No of Login: 
						<?php 
						if(isset($_SESSION[ADM_SESS]))
						{ 
							echo $userData[7];
						} 
						?> 
                    </div>
                    <div class="logout">
                    	I am done with my work. <a href="partials/logout.php" title="logout">Logout</a>
                    </div>
                </div>
            </div>
        	<div class="divider"></div>
            
        	<div id="welcome">
            	Welcome, <?php $utility->printSess('adminuser'); ?>
            </div>
            <div class="cl"></div>
        </div>
    </div>
    
    <div id="header">
    	
    </div>