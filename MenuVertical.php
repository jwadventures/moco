<?php
include"MenuLogic.php";
                global $MenuItems;
                global $ParentMenuIDs;
                foreach($MenuItems as $ParentID)
                {
                  $ParentMenuIDs[] = $ParentID['ParentID'];
                }
                $MenuItems = $MenuItems;

                function GenerateMenu($Parent,$X,$Type)
                {
                        $HasChilds = false;
                        global $MenuItems;
                        global $ParentMenuIDs;
                        foreach($MenuItems as $MenuItem)
                        {
						if(strtoupper($MenuItem['Name'])=="LOGIN"){$ExtraText='data-toggle="modal" data-target=".Login"';}else{$ExtraText="";}

                            if ($MenuItem['ParentID'] == $Parent)
                            {
                                if ($HasChilds === false)
                                {
                                  $HasChilds = true;
                                  if($Parent != 0)
                                  {
                                    echo '<ul class="dnl-sub-'.$Type.' collapse" id="collapse'.$X.'">';
                                  }
                                }
                                if($MenuItem['ParentID'] == 0 && in_array($MenuItem['ID'], $ParentMenuIDs))
                                {
								$Type="one";
								echo'<li>';
									  echo'<a class="collapsed" data-toggle="collapse" href="#collapse'.$MenuItem['ID'].'" aria-expanded="false" aria-controls="collapseLevelOne" >';
										echo'<span class="dnl-link-text">'. $MenuItem['Name'] . '</span>';
										echo'<span class="fa fa-angle-up dnl-btn-sub-collapse"></span>';
									  echo'</a>';
                                }
                                else if($MenuItem['ParentID'] != 0 && in_array($MenuItem['ID'], $ParentMenuIDs))
                                {
								$Type="two";
									echo'<li>';
									  echo'<a class="collapsed" data-toggle="collapse" href="#collapseLevelTwo" aria-expanded="false" aria-controls="collapseLevelTwo">';
										echo'<span class="dnl-link-text">'. $MenuItem['Name'] . '</span>';
										echo'<span class="fa fa-angle-up dnl-btn-sub-collapse"></span>';
									  echo'</a>';
                                }
                                else
                                {
								$Type="";
									echo'<li>';
									  echo'<a href="'.$MenuItem['Program'].'" '.$ExtraText.' class="MenuVerticalLink">';
										echo'<span class="dnl-link-text">'. $MenuItem['Name'] . '</span>';
									  echo'</a>';
                                }
                                GenerateMenu($MenuItem['ID'],$MenuItem['ID'],$Type);
                                echo '</li>';
                            }
                        }
						
                        if ($HasChilds === true) echo '</ul>';
                }
 
    echo'<nav class="navbar navbar-static-top dash-navbar-top dnl-hidden">';
      echo'<div class="container-fluid">';
        echo'<div class="navbar-header">';
          echo'<button class="dnl-btn-toggle">';
            echo'<span class="fa fa-bars"></span>';
          echo'</button>';
          echo'<a class="navbar-brand" href="Home"><img class="Logo" src="'.$Logo.'"></a>';
        echo'</div>';
      echo'</div>';
    echo'</nav>'; 

    echo'<div class="dash-navbar-left dnl-hidden">';
      echo'<ul class="dnl-nav">';
	  GenerateMenu(0);
     echo'</ul>';
	echo'</div>'; 
	
require_once "Core/Login.php";	
?>

