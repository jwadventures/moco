<?php
// user-initialise.php 
						$time_start = microtime(true);
						$username = $_POST["username"]; 
						$password = $_POST["pwd"]; 

						$username = "*DEFAULTUSER*";
						$password = "MOCO";

						$username = "DQC";
						$password = "DQC";
						$Company  = "DQC";

						
// Initialise Variables
						$Line = 0;
						$time_start = microtime(true);

// Setup Connections
						include('includes/db-setup-pdo-inc.php');

// SYUser						
						$stmt = $moco_pdo->prepare('SELECT Company,ID,Name,DeletedFlag FROM SYUser WHERE Code = ? AND Password = ? AND DeletedFlag <> 1 LIMIT 1');
						$stmt->execute([$username , $password ]);
						$data = $stmt->fetchAll();

						foreach ($data as $row) {
						$Company = $row['Company'];
						$UserID = $row['ID'];
						}
// SYCompany				
						$mysql1 = "SELECT Code,ID,Name,DeletedFlag FROM SYCompany WHERE Code = ? AND DeletedFlag <> 1 LIMIT 1";
						$stmt = $moco_pdo->prepare($mysql1);
						$stmt->execute([$Company]);
						$data2 = $stmt->fetchAll();	
					
// SYMenuUser 

						$mysql = 'SELECT MU.ID, MU.UserID , MU.UserCode, ME.ParentID, MU.MenuID, ME.Order, ME.Title, ME.Program FROM SYMenuUser as MU
						 LEFT Join SYMenu as ME ON ME.ID = MU.MenuID WHERE MU.Company = ? AND MU.UserID = ? AND MU.Access = 1 and  
						 MU.DeletedFlag <> 1 AND MU.MenuID = ANY (SELECT ID FROM SYMenu  WHERE Company = ?  and DeletedFlag <> "1" and `Show` = 1) 
						 ORDER By ME.ParentID , ME.Order  ';
						$stmtcc = $client_pdo->prepare($mysql);
						$stmtcc->execute([ $Company,$UserID,$Company ]);
						$data = $stmtcc->fetchAll();

						$datas =   json_encode($data);
						//print_r ($data);


						if ($TEST = 0){
						$time_end = microtime(true);
							if ($time_start>$time_end){
							echo ( (1-$time_end) + $time_start) . "Micro";	
							} else {
							echo ( $time_end - $time_start) . "Micro";	
							}
						}

?>
