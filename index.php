<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>Docker UI</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
  <link href="css/dockerUI.css" rel="stylesheet">
  <link href="css/sb-admin-2.css" rel="stylesheet">
	<link href="css/cssterm/css/cssterm.css" rel="stylesheet">
  <link rel="stylesheet" href="css/screen.css">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
	 <?php
			include_once("controllers/mainController.php");  	
			include_once("controllers/notificationController.php");  			
			$controller = new mainController();  
			$notification=new notificationController();
	?>
    <div class="navbar navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="index.php?subMenuID=1" style="margin: 0px; padding: 0px">
            <img src="img/banner2.jpg"/>
         </a>
        </div>
        <div class="navbar-collapse collapse"> 
          <ul class="nav navbar-nav navbar-right">	
            <?php
              $controller->getNavbarMenu();
            ?>
          </ul>	  
        </div>
      </div>
    </div>
	
	<div class="container-fluid">
		<?php $controller->getMainContent(); ?>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="js/jquery-2.1.0.min.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/jquery.browser.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/dockerUI.js"></script>
  <script src="js/system.js"></script>
  <script src="css/cssterm/scripts/cssterm.js"> </script>
  </body>
</html>
