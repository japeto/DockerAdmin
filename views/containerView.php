<div class="row">
<?php include 'views/subMenuView.php'; ?>
<div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main" style="padding-top:50px;">
<div id="notificationContainer">
</div>
<?php
	$updown="Uptime";
	$startstopbutton='&nbsp;<a type="button" class="btn btn-primary btn-sm btnstop"  containerID="'.$myContainer->longID.'"><span class="glyphicon glyphicon-stop"></span> <span class="hidden-sm hidden-xs"> Detener </span></a>';
	$restartbutton='&nbsp;<a type="button" class="btn btn-success btn-sm btnrestart"  containerID="'.$myContainer->longID.'"><span class="glyphicon glyphicon-repeat"></span> <span class="hidden-sm hidden-xs"> Re-iniciar </span></a>';
	if($myContainer->Isrunning=="danger"){
		$updown="Downtime";
		$startstopbutton='&nbsp;<a type="button" class="btn btn-success btn-sm btnstart"  containerID="'.$myContainer->longID.'"><span class="glyphicon glyphicon-play"></span> <span class="hidden-sm hidden-xs"> Iniciar </span></a>';
		$restartbutton='';
	}
	$summary=array("HostName "=>$myContainer->Hostname,"Image"=>$myContainer->Image,"Container"=>$myContainer->Name,"Created"=>$myContainer->Created);
	echo '<div class="panel panel-'.$myContainer->Isrunning.' ">';
	echo '<div class="panel-heading">';
	echo "<h1>Container panel</h1>";
	// echo "<h5>Docker properties</h5>";
    echo '<h5 class="panel-title"><strong>'.$myContainer->Hostname.'</strong></h5>';
	echo '</div>';
	echo '<div class="panel-body">';
	echo '<div class="panel">';
	echo '<div class="panel-heading">';
    echo '<h3 class="panel-title">Container info:</h3>';
    // echo '<h5>Esta es la informacion de la ejecucion del docker en el equipo remoto.</h5>';
	echo '</div>';
	echo '<div class="panel-body" style="background:#eee;border-radius:3px;border:1px solid #333;">';
	foreach($summary as $key=>$value){
		echo '<div class="col-md-2">';
		echo '<b>'.$key.'</b>';
		echo '</div>';
		echo '<div class="col-md-4">';
		echo ': '.$value;
		echo '</div>';
	}
	echo '<div class="col-md-1">';
	echo '<b>Args</b>';
	echo '</div>';
	echo '<div class="col-md-10">';
	echo ': '.$myContainer->Cmd." ";
	echo '</div>';

	echo '</div>';
	echo '</div>';
	
	if($myContainer->Isrunning!="danger")
	{
		$summary=array("IP: "=>$myContainer->ContainerNetwork->IP.'/'.$myContainer->ContainerNetwork->Prefix, //"Gateway"=>$myContainer->ContainerNetwork->GW
		"Bridge"=>$myContainer->ContainerNetwork->Bridge,"Dns:"=>$myContainer->Dns,"DnsSearch:"=>$myContainer->DnsSearch);
		echo '<div class="panel">';
		echo '<div class="panel-heading">';
		echo '<h3 class="panel-title">Network info</h3>';
		// echo '<h5>Esta es la informacion de la red del docker seleccionado.</h5>';
		echo '</div>';
		echo '<div class="panel-body" style="background:#eee;border-radius:3px;border:1px solid #333;">';
		foreach($summary as $key=>$value)
		{
			echo '<div class="col-md-2">';
			echo '<b>'.$key.'</b>';
			echo '</div>';
			echo '<div class="col-md-4" style="overflow:hidden; text-overflow:ellipsis;">';
			echo $value;
			echo '</div>';
		}
		echo '<div class="col-md-2">';
		echo '<b>Volumes:</b>';
		echo '</div>';
		echo '<div class="col-md-10" style="overflow:hidden; text-overflow:ellipsis;">';
		echo $myContainer->ContainerNetwork->Volumes;
		echo '</div>';		
		echo '<div class="col-md-2">';
		echo '<b>Port / type:</b>';
		echo '</div>';
		echo '<div class="col-md-4" style="overflow:hidden; text-overflow:ellipsis;">';
		echo "<kbd style='color:#ccc;background:#00F;'>".array_keys($myContainer->ContainerNetwork->Ports)[0]."</kbd>";//['5000/tcp']['0']['HostIp'];
		echo '</div>';
		echo '<div class="col-md-3">';
		echo '<b>HostIP / HostPort:</b>';
		echo '</div>';
		echo '<div class="col-md-3" style="overflow:hidden; text-overflow:ellipsis;">';
		echo "<kbd style='color:#ccc;background:#00F;'>".$myContainer->ContainerNetwork->Ports[array_keys($myContainer->ContainerNetwork->Ports)[0]]['0']['HostIp']
		."/".$myContainer->ContainerNetwork->Ports[array_keys($myContainer->ContainerNetwork->Ports)[0]]['0']['HostPort']."</kbd>";
		echo '</div>';					
		echo '</div>';			
		//display top processes
		echo '<div class="panel hidden-sm hidden-xs">';
		echo '<div class="panel-heading">';
		echo '</div>';
		echo '<div class="panel-body" >';
		echo '<pre>'.$myContainer->RunningProcesses.'</pre>';
		echo '</div>';
		echo '</div>';
	}
	
    echo '</div>';
	echo '<div class="panel-footer">';
	echo '<div class="btn-group">';
	echo $startstopbutton;
	echo $restartbutton;
	echo '&nbsp;<a type="button" class="btn btn-danger btn-sm btndelete"  containerID="'.$myContainer->longID.'"><span class="glyphicon glyphicon-trash"></span> <span class="hidden-sm hidden-xs">Eliminar</span> </a>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

?>
</div>
</div>
<?php include 'views/deleteContainerModalView.php'; ?>