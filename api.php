<?php
//   +--------------------------------------------------------------------------+
//   ¦                                                                          ¦
//   ¦  Author John West First Data Systems Limited                             ¦
//   ¦                                                                          ¦
//   +--------------------------------------------------------------------------+

//   +--------------------------------------------------------------------------+
//   ¦                                                                          ¦
//   ¦  Allow only our servers - also set in .htaccess                          ¦
//   ¦                                                                          ¦
//   +--------------------------------------------------------------------------+

			$allowedIps= "Our Allowed IPs:  103.14.41.18 120.138.27.221 158.140.224.226";  // Umbrella , Sitehost, Home Ip
			$rip = $_SERVER['REMOTE_ADDR'];
			$ipAllowed = strpos($allowedIps, $rip);
/*
			echo $rip . "<br>";
			echo $allowedIps;
			echo $pos;
*/			
	switch ($ipAllowed) {
		
				
	case true:

//   +--------------------------------------------------------------------------+
//   ¦                                                                          ¦
//   ¦  Script Starts                                                           ¦
//   ¦                                                                          ¦
//   +--------------------------------------------------------------------------+
	

			$Company = $_GET ["Company"];
			include 'includes/dbh.inc.php';
			include 'includes/user.inc.php';
			include 'includes/viewuser.inc.php';

			$users = new ViewUser();
			//$users-> showAllUsers('  Company ="' . $Company .'" and ID=620 '); // Works
			$users-> showAllUsers('  Company ="' . $Company .'"  '); // Works
			//$users-> showAllUsers("MOCO");  // works
			//echo "<br><br>Done Company =" . $Company;

	break;
	
	
	default:
			// ip not allowed
			echo "Access denied for this IP address";
	
	
	
	} 



//   +--------------------------------------------------------------------------+
//   ¦                                                                          ¦
//   ¦  Script End                                                              ¦
//   ¦                                                                          ¦
//   +--------------------------------------------------------------------------+
		
	
?>




