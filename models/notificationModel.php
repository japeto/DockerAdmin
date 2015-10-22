<?php
include_once("Notification.php");  
include_once("settingModel.php");  
  
class notificationModel { 
 
	private $settings;
       
	  public function checkConfigFile(){
	  	// echo "  >> c1";
		//check config
		$this->settings=new settingModel();
		// echo "  >> c2";
		$notification=$this->settings->checkConfigFile();
		// echo "  >> c3";
		if(!is_int($notification))return $notification;
		// echo "  >> c4 <<<".$notification;
		$notification=$this->settings->checkConnec($this->settings->configInfo,false);
		// echo "  >> c5 " ;
		if(!is_int($notification))return $notification;
		// echo "  >> c6";
		
		return 0;
	  }
	  
}  


?>