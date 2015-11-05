<div class="row">
<?php include 'views/subMenuView.php'; ?>
<div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">
<h2> </h2>
<div id="pnl-newcontainer">
</div>
<?php
	echo '<div class="panel panel-primary">';
	echo '<div class="panel-heading">';
  echo '<h3 class="panel-title"><strong>New Container</strong></h3>';
  echo '<h6>Create And Start Container From Image</h6>';
	echo '</div>';
	echo '<div class="panel-body">';
	?>
	<div class="col-md-12">
		<form role="form" id="formCreateContainer" class="form-horizontal">
          <div class="form-group has-info has-feedback">
            <label class="col-sm-3 control-label">Container name</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" name="cname" id="cname" placeholder="Container name" required/>
              <span class="text-success">Establece un nombre para identificar el contenedor</span>
            </div>
          </div>
          <div class="form-group has-info has-feedback">
            <label class="col-sm-3 control-label">DNS URL</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="cdns" id="cdns" placeholder="DNS URL" required/>
            </div>          
            <label class="col-sm-3 control-label">DNS IP</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="cdnssearch" id="cdnssearch"  placeholder="IP address" required/>
            </div>
          </div>
          <div class="form-group has-info has-feedback">
            <label class="col-sm-3 control-label">IP:Puerto Servidor</label>
            <div class="col-sm-3">
				<input type="text" class="form-control" name="ciphost" id="ciphost" placeholder="0.0.0.0" required />
			</div>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="cporthost" id="cporthost" placeholder="0 - 65536" required/>
            </div>
            <label class="col-sm-2 control-label">Container port</label>
            <div class="col-sm-2">
              <input type="text" class="form-control" name="cport" id="cport" placeholder="0 - 65536" required/>
            </div>
          </div>   
          <div class="form-group has-info has-feedback">
            <label class="col-sm-3 control-label">Host Path</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="chostpath" id="chostpath" placeholder="/home/vigtech/shared/repository/" required/>
            </div>          
            <label class="col-sm-3 control-label">Container path</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="cpath" id="cpath" placeholder="/home/vigtech/shared/repository/" required/>
            </div>
          </div> 
          <div class="form-group has-info has-feedback">
            <label class="col-sm-3 control-label">Imagen</label>
            <div class="col-sm-5">
  				<?php 
				$select='<select class="form-control" id="image" name="image">';
				$select.='<option value="-1"> Seleccione una imagen </option>';
				foreach($imageArray as $image){
					$select.='<option value="'.$image[0].'">'.$image[0].' '.$image[1].'</option>';
				}
				$select.='</select>'; 
				echo $select;
				?>
            </div>    
          </div>           
          <div class="form-group has-info has-feedback">
          	<label class="col-sm-3 control-label">Params</label>
          	<div class="col-sm-2">
          		<input type="text" class="form-control" name="cparams" id="cparams" placeholder="-w -P ..." />
          	</div>			
          	<label class="col-sm-2 control-label">Command</label>
          	<div class="col-sm-5">
          		<input type="text"  class="form-control" id="ccommand" name="ccommand" placeholder="command" value="/bin/bash" required>
          	</div>
          </div>
          <button type="submit" class="submit" style="display:none;"></button>
      </form>
	</div>
	<?php
    echo '</div>';
	echo '<div class="panel-footer">';
	echo '<div class="btn-group">';
	echo '<button type="button" class="btn btn-primary" data-loading-text="Running..." id="btncontainerCreate"><span class="glyphicon glyphicon-fire"> Run</button>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
?>
</div>
</div>
<?php include 'views/deleteContainerModalView.php'; ?>