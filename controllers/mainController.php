<?php
include_once("models/notificationModel.php"); 
include_once("models/settingModel.php"); 
include_once("models/containerModel.php"); 

class mainController {  
     public $lastNotification;   
	 public $notificationModel;
	 public $settingModel;
	 public $containerModel;
	 public $activeItemTitle;
	
	 
     public function __construct() {    
          $this->notificationModel = new notificationModel();  
		  $this->settingModel = new settingModel();  
		  $this->containerModel = new containerModel();  
     }   

     public function getMainContent(){  

		// echo " 1>>>>>> ";
		$this->lastNotification = $this->notificationModel->checkConfigFile(); 
		// echo " 2>>>>>> ".$this->lastNotification;
		$config=$this->settingModel->getConfig();
		// echo " 3>>>>>> ".$config->port;

		$args='';
		if (isset($_GET['subMenuID'])){ 
				switch($_GET['subMenuID']){
					case 2: 
						echo '<div class="row"><div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">';
						echo "<h1>Dockers</h1>";
        				echo "<h5>Aqui esta la lista de contenedores en <b>".$config->host.":".$config->port."</b></h5>";
        				echo '</div>';
						$args='-a';
					break;
					case 3: 
					include 'views/terminalView.php';
					return;
					case 4: $imageArray=$this->containerModel->getImages();
						if(@get_class($imageArray)=='Notification'){
							$this->lastNotification=$imageArray;
							echo '<div class="row"><div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">';
							include 'views/notificationView.php';
							echo '<a href="index.php">Regresar a la principal</a>';
							echo '</div></div>';
							return;
						}
					include 'views/createContainerView.php';
					return;
					default :
						echo '<div class="row"><div class="col-sm-9 col-sm-offset-2 col-md-8 col-md-offset-2 main">';
						echo "<h1>Dockers Activos</h1>";
        				echo "<h5>Aqui esta la lista de contenedores activos <b>".$config->host.":".$config->port."</b></h5>";
        				echo '</div>';
					break;

				}
			}
		    
			
			if (isset($_GET['containerID'])){

				$myContainer=$this->containerModel->getContainer($_GET['containerID']);
				if(@get_class($myContainer)=='Notification'){
					$this->lastNotification=$myContainer;
					echo '<div class="row"><div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-3 main">';
					include 'views/notificationView.php';
					echo '<a href="index.php">Regresar a la principal</a>';
					echo '</div></div>';
					
				}else{	
					include 'views/containerView.php';
				}
				return;
			}
			
			$menuID=1;
			if (isset($_GET['menuID']))  $menuID=$_GET['menuID'];
				switch($menuID)
				{
					case 1: //dashboard;
							include 'views/dashboardView.php'; 							
							if(!is_int($this->lastNotification) && $this->lastNotification->Type != "success"){
								include 'views/notificationView.php';
								//somehow run script here to change logo color
							}else{
								$getContainers=$this->containerModel->getContainerList($args);
								if(@get_class($getContainers)=='Notification'){	
									$this->lastNotification = $getContainers;
									include 'views/notificationView.php';
								}else{
									include 'views/containerListView.php';
								}
							}
							echo '</div></div>';
							break;
					case 2: //settings
							include 'views/settingsView.php'; 
							break;
					default: //;
							include 'views/dashboardView.php'; 
							break;
				}

			
			
     } 
		
	 public function getNavbarMenu(){
			if (!isset($_GET['menuID']))  { 
				$activeItem=1;
			}else{
				$activeItem=$_GET['menuID'];
			}
			include 'views/navbarMenuView.php';
			$this->activeItemTitle=$menuItems[$activeItem-1];
     }	

}  
?>