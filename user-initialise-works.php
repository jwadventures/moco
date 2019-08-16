<?php

 
$time_start = microtime(true);
$username = $_POST["username"]; 
$password= $_POST["pwd"]; 

$username = "*DEFAULTUSER*";
$password = "MOCO";

$username = "DQC";
$password = "DQC";


$Company = "DQC";
//echo $username;
//echo $password . "<br><br>";

//$user = "*DEFAULTUSER*";
//$password = "MOCO";

	// Initialise Variables
						$Line = 0;
						$time_start = microtime(true);


include('includes/db-setup-pdo-inc.php');

//echo "Company ". $Company;

//echo __ROOT__.'/includes/db-setup-pdo-inc.php';

						//$Company = "FDS";
//$Company = $_GET("Company");
				
/*				
						$moco_host = 'localhost';
						$moco_db   = 'perfectoMOCO';
						$moco_user = 'MOCOMaster';
						$moco_pass = 'Freedom1833';
						$charset = 'utf8mb4';

// Initialise PDO 

						$moco_dsn = "mysql:host=$moco_host;dbname=$moco_db;charset=$charset";
						$options = [
						    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
						    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
						    PDO::ATTR_EMULATE_PREPARES   => false,
						];
						
						try {
						     $moco_pdo = new PDO($moco_dsn, $moco_user, $moco_pass, $options);
						} catch (\PDOException $e) {
						     throw new \PDOException($e->getMessage(), (int)$e->getCode());
						}

// Client Database

				
						$client_host = 'localhost';
						$client_db   = 'perfectoDQC';
						$client_user = 'DQCMaster';
						$client_pass = 'Freedom1833';
						$charset = 'utf8mb4';

// Initialise PDO 

						$client_dsn = "mysql:host=$client_host;dbname=$client_db;charset=$charset";
						$options = [
						    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
						    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
						    PDO::ATTR_EMULATE_PREPARES   => false,
						];
						
						try {
						     $client_pdo = new PDO($client_dsn, $client_user, $client_pass, $options);
						} catch (\PDOException $e) {
						     throw new \PDOException($e->getMessage(), (int)$e->getCode());
						}

*/







//echo "<br>-----User------" . $moco_db  . "<br>";	

						
						$stmt = $moco_pdo->prepare('SELECT Company,ID,Name,DeletedFlag FROM SYUser WHERE Code = ? AND Password = ? AND DeletedFlag <> 1 LIMIT 1');
						$stmt->execute([$username , $password ]);
						$data = $stmt->fetchAll();

					
					//	echo "<pre> <code>";						
					//	print_r ($data);
					//	echo "<code> <pre>";
					//	echo "<br>";	


						foreach ($data as $row) {
						$Company = $row['Company'];
					//	echo "<br>Company: " .  $row['Company'] . "<br>";
						$UserID = $row['ID'];
					//	echo "<br>UserID: " .  $row['ID'] . "<br>";
						}
				
						//$data = array_reverse($data);				
						
						//echo   json_encode($data);   // For return to calling program


//echo "<br>-----Company------<br>";					
						//$Company = "MOCO";
						$mysql1 = "SELECT Code,ID,Name,DeletedFlag FROM SYCompany WHERE Code = ? AND DeletedFlag <> 1 LIMIT 1";
						$stmt = $moco_pdo->prepare($mysql1);
						$stmt->execute([$Company]);
						//$data = $stmt->fetchAll();


						//$data = $stmt->fetchAll(); // For creating array
						//$result = $stmt->fetchAll(); // For Looping
	
						$data2 = $stmt->fetchAll();	
					//	echo "<pre> <code>";
					//	print_r ($data2);
					//	echo "<code> <pre>";
						
					//	foreach ($data2 as $row2) {
					//	$UserID = $row2['ID'];
					//	echo "<br>UserID: " .  $row2['ID'] . "<br>";
					//	}
// Menu 

//$UserID = 433;
//echo $UserID;
//$CompanyM = $Company;
//echo "<br>-----Menu------<br>";
						//$stmtcc = $moco_pdo->prepare('SELECT MU.UserCode, MU.UserID,MU.MenuID, MU.Company, M.Company, M.Title, M.ParentID ,
						//M.Order, M.Program,M.DeletedFlag,  MU.DeletedFlag FROM SYMenuUser as MU INNER JOIN SYMenu as M ON MU.MenuID=M.ID WHERE MU.UserID = 433 AND 
						//M.CustomerLogin <> 5 AND MU.Company = "DQC" AND M.Company = "DQC"  and MU.DeletedFlag <> 1 and M.DeletedFlag <> 1 ORDER BY M.ParentID, M.Order  ASC');
$mysql = 'SELECT MU.ID, MU.UserID , MU.UserCode, ME.ParentID, MU.MenuID, ME.Order, ME.Title, ME.Program FROM SYMenuUser as MU LEFT Join SYMenu as ME ON ME.ID = MU.MenuID WHERE MU.Company = ? AND MU.UserID = ? AND MU.Access = 1 and  MU.DeletedFlag <> 1 AND MU.MenuID = ANY (SELECT ID FROM SYMenu  WHERE Company = ?  and DeletedFlag <> "1" and `Show` = 1) ORDER By ME.ParentID , ME.Order  ';
//echo $mysql . "<br>";						
$stmtcc = $client_pdo->prepare($mysql);



						$stmtcc->execute([ $Company,$UserID,$Company ]);
						//$stmtcc->execute([ $UserID ]);
						//$stmtcc->execute();
						//$data = $stmt->fetchAll();


						//$data = $stmt->fetchAll(); // For creating array
						//$result = $stmt->fetchAll(); // For Looping
	
$data = $stmtcc->fetchAll();
//echo $data;	
$datas =   json_encode($data);
//print_r ($data);
$time_end = microtime(true);
if ($time_start>$time_end){
//echo ( (1-$time_end) + $time_start) . "Micro";	
} else {
//echo ( $time_end - $time_start) . "Micro";	
}


//echo "<br>---------- <br>it works";
?>
