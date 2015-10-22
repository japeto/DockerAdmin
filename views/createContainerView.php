<div class="row">
<?php include 'views/subMenuView.php'; ?>
<div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">
<h1>Crear un docker</h1>
<h4>Crear un docker, basado en una imagen</h4>
<div id="notificationContainer">
</div>
<?php
	echo '<div class="panel panel-danger">';
	echo '<div class="panel-heading">';
    echo '<h3 class="panel-title"><strong>Panel de creacion</strong></h3>';
	echo '</div>';
	echo '<div class="panel-body">';
	?>
	<div class="col-md-5">
		<form role="form" id="formCreateContainer">
			<div class="form-group">
				<label for="containerNameInput">Hostname</label>
				<input type="text"  class="form-control" id="containerNameInput" placeholder="hostname" required>
			</div>
			<div class="form-group">
				<label for="containerImageInput">Image</label>
				<?php 
				$select='<select class="form-control" id="containerImageInput">';
				foreach($imageArray as $image)
				{
					$select.='<option value="'.$image[0].'">'.$image[0].' '.$image[1].'</option>';
				}
				$select.='</select>'; 
				echo $select;
				?>
			</div>
			<div class="form-group">
				<label for="commandInput">Command</label>
				<input type="text"  class="form-control" id="commandInput" placeholder="command" value="/bin/bash" required>
			</div>
			<button type="submit" class="submit" style="display:none;">
		</form>
	</div>
	<?php
    echo '</div>';
	echo '<div class="panel-footer">';
	echo '<div class="btn-group">';
	echo '<button type="button" class="btn btn-success" data-loading-text="Creating..." id="btncontainerCreate">Crear</button>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
?>
</div>
</div>
<?php include 'views/deleteContainerModalView.php'; ?>