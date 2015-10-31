<div class="row">
<?php include 'views/subMenuView.php'; ?>
<div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">
<h1>Panel de control</h1>
<h5>Aqui estan las propiedades del docker seleccionado</h5>

<div id="notificationContainer">
</div>
<?php

	$updown="Uptime";
	$startstopbutton='&nbsp;<a type="button" class="btn btn-primary btn-sm btnstop"  containerID="'.$myContainer->Hostname.'"><span class="glyphicon glyphicon-stop"> Detener</span></a>';
	$restartbutton='&nbsp;<a type="button" class="btn btn-success btn-sm btnrestart"  containerID="'.$myContainer->Hostname.'"><span class="glyphicon glyphicon-repeat"> Re-iniciar</span></a>';
	if($myContainer->Isrunning=="danger"){
		$updown="Downtime";
		$startstopbutton='&nbsp;<a type="button" class="btn btn-success btn-sm btnstart"  containerID="'.$myContainer->Hostname.'"><span class="glyphicon glyphicon-play"> Iniciar</span></a>';
		$restartbutton='';
	}
		
	$summary=array("Container"=>$myContainer->Hostname,"Imagen"=>$myContainer->Image);


	echo '<div class="panel panel-'.$myContainer->Isrunning.'">';
	echo '<div class="panel-heading">';
    echo '<h3 class="panel-title"><strong>'.$myContainer->Hostname.'</strong></h3>';
	echo '</div>';
	echo '<div class="panel-body">';
	echo '<div class="panel">';
	echo '<div class="panel-heading">';
    echo '<h3 class="panel-title">Resumen</h3>';
    echo '<h5>Esta es la informacion de la ejecucion del docker en el equipo remoto.</h5>';
	echo '</div>';
	echo '<div class="panel-body" style="background:#eee;border-radius:3px;border:1px solid #333;">';
	foreach($summary as $key=>$value)
	{
		echo '<div class="col-md-1">';
		echo '<b>'.$key.'</b>';
		echo '</div>';
		echo '<div class="col-md-5" style="overflow:hidden; text-overflow:ellipsis;">';
		echo ': '.$value;
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	
	if($myContainer->Isrunning!="danger")
	{
		$summary=array("IP: "=>$myContainer->ContainerNetwork->IP.'/'.$myContainer->ContainerNetwork->Prefix,"Gateway"=>$myContainer->ContainerNetwork->GW,"Bridge"=>$myContainer->ContainerNetwork->Bridge);
		echo '<div class="panel">';
		echo '<div class="panel-heading">';
		echo '<h3 class="panel-title">Red</h3>';
		echo '<h5>Esta es la informacion de la red del docker seleccionado.</h5>';
		echo '</div>';
		echo '<div class="panel-body" style="background:#eee;border-radius:3px;border:1px solid #333;">';
		foreach($summary as $key=>$value)
		{
			echo '<div class="col-md-1">';
			echo '<b>'.$key.'</b>';
			echo '</div>';
			echo '<div class="col-md-5" style="overflow:hidden; text-overflow:ellipsis;">';
			echo $value;
			echo '</div>';
		}
		echo '</div>';
		echo '</div>';
		
		//display top processes
		echo '<div class="panel hidden-sm hidden-xs">';
		echo '<div class="panel-heading">';
		echo '<h3 class="panel-title">Proceso en el docker</h3>';
		echo '<h5>Esta es la informacion de la ejecucion del docker.</h5>';
		echo '</div>';
		echo '<div class="panel-body" style="background:#eee;border-radius:3px;border:1px solid #333;">';
		echo '<pre><code>'.$myContainer->RunningProcesses.'</code></pre>';
		echo '</div>';
		echo '</div>';
	}
	
    echo '</div>';
	echo '<div class="panel-footer">';
	echo '<div class="btn-group">';
	echo $startstopbutton;
	echo $restartbutton;
	echo '&nbsp;<a type="button" class="btn btn-danger btn-sm btndelete"  containerID="'.$myContainer->Hostname.'"><span class="glyphicon glyphicon-trash"> Eliminar</span></a>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

?>
</div>
</div>
<?php include 'views/deleteContainerModalView.php'; ?>