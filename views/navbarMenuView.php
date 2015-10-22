<?php
//display Navbar Menu
$menuItems=array("Principal","Configuracion SSH","?");
for($i=0;$i<sizeof($menuItems);$i++){
	 $activeItemClass="";	
	 if($activeItem==($i+1))$activeItemClass=' class="active"';
	 echo '<li'.$activeItemClass.'><a href="index.php?menuID='.($i+1).'">'.$menuItems[$i].'</a></li>';
}
?>