<div class="panel panel-default ">
<div class="panel-heading"><span class="glyphicon glyphicon-list-alt"></span> Lista de contenedores</div>
<table class="table table-striped">
	<thead>
		<tr>
			<th>CONTAINER ID</th>
			<th class="hidden-sm hidden-xs">IMAGE</th>
			<th class="hidden-sm hidden-xs">IP</th>
			<th class="hidden-sm hidden-xs">TIME</th>
			<th>ACCIONES</th>
		</tr>
	</thead>
	<tbody>
<?php
for($i=0;$i<sizeof($getContainers);$i++){
	echo '<tr class="'.$getContainers[$i]->Isrunning.'">';
	echo '<td><strong>'.$getContainers[$i]->Hostname.'</strong></td>';
	echo '<td class="hidden-sm hidden-xs">'.$getContainers[$i]->Image.'</td>';
	echo '<td class="hidden-sm hidden-xs">'.$getContainers[$i]->IP.'</td>';
	echo '<td class="hidden-sm hidden-xs">'.$getContainers[$i]->Uptime.'</td>';
	echo '<td class=""><a href="index.php?containerID='.$getContainers[$i]->Hostname.'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-cog"></span> info</a>';
	if($getContainers[$i]->Isrunning=="danger"){
		echo '&nbsp;<a type="button" class="btn btn-success btn-xs btnstart"  containerID="'.$getContainers[$i]->Hostname.'"><span class="glyphicon glyphicon-play"></span></a>';
		echo '&nbsp;<a type="button" class="btn btn-danger btn-xs btndelete"  containerID="'.$getContainers[$i]->Hostname.'"><span class="glyphicon glyphicon-trash"></span></a>';
	}else{
		echo '&nbsp;<a type="button" class="btn btn-success btn-xs btnrestart"  containerID="'.$getContainers[$i]->Hostname.'"><span class="glyphicon glyphicon-repeat"></span></a>';
		echo '&nbsp;<a type="button" class="btn btn-primary btn-xs btnstop"  containerID="'.$getContainers[$i]->Hostname.'"><span class="glyphicon glyphicon-stop"></span></a>';
	}
	echo '</tr>';
}

?>
	</tbody>
</table>
</div>