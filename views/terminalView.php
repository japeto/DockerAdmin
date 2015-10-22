<div class="row">
<?php include 'views/subMenuView.php'; ?>
    <div class="col-sm-9 col-sm-offset-4 col-md-9 col-md-offset-2 main">
<h1>Terminal</h1>
<div class="alert alert-danger">
	<b>Aqui escribes comandos para el servidor via ssh</b><br/>
	Recuerde que esta en el servidor con permisos, cambios pueden ser irreversibles.
</div>
<!-- <div class="cssterm">
# uname -a
Linux ThinkPad-X230.localdomain 3.9.6-301.fc19.x86_64 #1 SMP Mon Jun 17 14:26:26 UTC 2013 x86_64 x86_64 x86_64 GNU/Linux
</div> -->	
<div id="terminal">
	<div id="output"></div>
	<div id="command">
		<div id="prompt">&gt;</div>
		<input type="text">
	</div>
</div>

</div>
</div>