<?php
include "Core/MenuLogic.php";
						
//Menu Associative Array

                global $MenuItems;
                global $ParentMenuIDs;
                foreach($MenuItems as $ParentID)
                {
                  $ParentMenuIDs[] = $ParentID['ParentID'];
                }
                $MenuItems = $MenuItems;

                function GenerateMenu($Parent)
                {
                        $HasChilds = false;
                        global $MenuItems;
                        global $ParentMenuIDs;
						global $MyWebPage;
                        foreach($MenuItems as $MenuItem)
                        {
						if(strtoupper($MenuItem['Name'])=="LOGIN"){$ExtraText='data-toggle="modal" data-target=".Login"';}else{$ExtraText="";}

                            if ($MenuItem['ParentID'] == $Parent)
                            {
							$MyActiveClass = "";
							if($MyWebPage == $MenuItem['Program']){$MyActiveClass="active";}
                                if ($HasChilds === false)
                                {
                                  $HasChilds = true;
                                  if($Parent != 0)
                                  {
                                    echo '<ul class="dropdown-menu">';
                                  }
                                }
                                if($MenuItem['ParentID'] == 0 && in_array($MenuItem['ID'], $ParentMenuIDs))
                                {
                                  echo '<li class="dropdown '.$MyActiveClass.'"><a class="dropdown-toggle" data-toggle="dropdown" href="'.$MenuItem['Program'].'">' . $MenuItem['Name'] . '<b class="caret"></b></a>';
                                }
                                else if($MenuItem['ParentID'] != 0 && in_array($MenuItem['ID'], $ParentMenuIDs))
                                {
                                  echo '<li class="dropdown-menu '.$MyActiveClass.'"><a href="'.$MenuItem['Program'].'" '.$ExtraText.'>' . $MenuItem['Name'] . '</a>';
                                }
                                else
                                {
                                  echo '<li class="'.$MyActiveClass.'"><a href="'.$MenuItem['Program'].'" '.$ExtraText.'>' . $MenuItem['Name'] . '</a>';
                                }
//                                GenerateMenu($MenuItem['ID']);
                                echo '</li>';
                            }
                        }
						
                        if ($HasChilds === true) echo '</ul>';
                }


echo'<div ID="page-top"></div>';
echo'<nav class="navbar navbar-default navbar-fixed-top" role="navigation">';
	echo'<div class="backer">';
    echo'<div class="container">';
        echo'<div class="navbar-header">';
            echo'<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">';
              echo'<span class="sr-only">Toggle navigation</span>';
              echo'<span class="icon-bar"></span>';
              echo'<span class="icon-bar"></span>';
              echo'<span class="icon-bar"></span>';
            echo'</button>';
            echo'<a class="navbar-brand page-scroll" href="Home">';
                echo'<img src="'.$Logo.'">';
            echo'</a>';
        echo'</div>';
        echo'<div class="collapse navbar-collapse navbar-right navbar-main-collapse">';
            echo'<ul class="nav navbar-nav">';
                GenerateMenu(0);
       echo'</ul>';
    echo'</div>';
    echo'</div>';
echo'</nav>';
//Login PopUp
require_once "Core/Login.php";



?>