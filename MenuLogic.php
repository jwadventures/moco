<?php
// MenuLogic.php

				$TEST = 0;
				$first_time = microtime();
				echo '<html> <head> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
				integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
				integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
				</script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
				integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
				<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
				integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> </head><body>';




$Company = "DQC";

									
// Get Menu Data 								
				include "user-initialise.php";
				$json = json_decode($datas, true);
				$jsonsub = json_decode($datas, true);

				$x =0;
				$nav = '<nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
				<a class="navbar-brand" href="#"> <img src="http://www.moco.co.nz/' .  $Company  . '/Images/Logo.jpg" width="51" height="51" 
				class="d-inline-block align-middle" alt="">' . ' ' . '</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" 
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
				';
				 
// Loop through JSON Data 				 
				foreach ($json as $value) {
					
				$parentId = $json[$x][ParentID];
				$menuId = $json[$x][MenuID];
				$title = strtoupper($json[$x][Title]);
				$program = $json[$x][Program];

				$start_time = microtime();
				if ($parentId == 0) {
				$nav = $nav . 
				'<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" 
				aria-expanded="false">' . $title . '</a><div class="dropdown-menu" aria-labelledby="navbarDropdown"> ' ; 

				$xx = 0;
					foreach ($jsonsub as $v) {
					
							$parentsubId = $jsonsub[$xx][ParentID];
							$menusubId = $jsonsub[$xx][MenuID];
							$titlesub = $jsonsub[$xx][Title];
							$programsub = $jsonsub[$xx][Program];

							if ($menuId == $parentsubId ) {
							$nav = $nav . ' <a class="dropdown-item" href="' . $programsub .  ' ">' . $titlesub . '</a>' ;
							} else {
							}
								 
							$xx ++;
							
					}
					$nav = $nav . '</div></li>';
				 
					} 
				//	}
					$x ++;
				}	


				$nav = $nav . '</ul>    <form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
				</div>
				</nav>';

				echo $nav;
					
				$end_time = microtime();	
if ($TEST = 0){
					echo "<div>Menu logic " . ($end_time - $start_time). "ms</div>";
					echo "<div>Total " . ($end_time - $first_time). "ms</div>";
				}
				echo '</body></html>';
		
?>