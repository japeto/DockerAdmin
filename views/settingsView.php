 <div class="row">
        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1>Configuracion SSH</h1>
			<?php 
			echo '<div id="notificationSettings">';
				if(!is_int($this->lastNotification) && $this->lastNotification->Type != "success" ) {
					include 'notificationView.php';
				}else{
					$info=$this->containerModel->infoDocker();
					$numberImages=$this->containerModel->getNumberIntermediateImages();
					if($numberImages>0)$btnClear='<button type="button" id="btnClearIntermediateImages" class="btn btn-danger" data-loading-text="Clearing...">Clear Intermediate Images <span class="badge">'.$numberImages.'</span></button>';
				}
			echo '</div>';
			?>
			<div class="row">
				<div class="col-md-4">
					<form role="form" id="formSettings">
						<div class="panel panel-green">
							<div class="panel-heading">SSH</div>
							<div class="panel-body">	
								<div class="form-group">
									<label for="hostInput">Direccion IP:Puerto</label>
										<div class="row">
											<div class="col-xs-8"><input type="text" value="<?php echo $config->host; ?>" class="form-control" id="hostInput" placeholder="host" required></div>
											<div class="col-xs-4"><input type="number" value="<?php echo $config->port; ?>" class="form-control" id="portInput" placeholder="port" min="0" max="65535" required></div>
										</div>
								</div>
								<div class="form-group">
									<label for="userInput">Usuario</label>
									<input type="text" value="<?php echo $config->user; ?>" class="form-control" id="userInput" placeholder="user" required>
								 </div>
								 <div class="form-group">
									<label for="passwordInput">Contraseña</label>
									<input type="password" value="<?php echo $config->password; ?>" class="form-control" id="passwordInput" placeholder="password" required>
								</div>
								<div class="btn-group">
									<button type="button" class="btn btn-success" id="btnCheckSettings" data-loading-text="Verificando..."><span class="glyphicon glyphicon-hand-right"></span> Verificar SSH</button>
									<button type="button" id="btnSaveSettings" class="btn btn-primary" data-loading-text="Guardando..." disabled><span class="glyphicon glyphicon-download-alt"></span> Guardar</button>
									<button type="submit" class="submit" style="display:none;">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading">Informcacion del sistema Docker</div>
						<div class="panel-body" >	
							<pre><?php if(isset($info)) echo $info; ?></pre>
								<div class="btn-group">
										<?php //if(isset($btnClear))echo $btnClear;?>	
								</div>
						</div>
					</div>
				</div>
			</div>
      </div>
</div>
