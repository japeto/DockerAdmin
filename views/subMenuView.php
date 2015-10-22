<div class="col-sm-2 col-md-2 sidebar hidden-sm hidden-xs">	
	<ul class="nav nav-sidebar">
		<?php
			//display Navbar Menu
		$menuItems=array("Activos","Todos","Terminal","Crear contenedor");
		// $menuItems=array("Activos","Todos","Create New");
		$activeItem=1;
		if(isset($_GET['subMenuID']))$activeItem=$_GET['subMenuID'];
		//no need to create active link if we are in the container view
		if(isset($_GET['containerID']))$activeItem=0;
		for($i=0;$i<sizeof($menuItems);$i++){
			$activeItemClass="";	
			if($activeItem==($i+1))$activeItemClass=' class="active"';
			echo '<li'.$activeItemClass.'><a href="index.php?subMenuID='.($i+1).'">'.$menuItems[$i].'</a></li>';
		}
		?>
	</ul>
	<center><h4>Herramienta para la gestion de Dockers</h4></center>
</div>