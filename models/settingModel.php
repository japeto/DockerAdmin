<?php
include_once("Notification.php");  
include_once("Setting.php");  

class settingModel { 
 
	private $configFile="config.xml";
	//private $configFil=realpath("config.xml");
	private $dockerPackage='lxc-docker';
	private $xmlConfig;
	public $configInfo;
	
	public function __construct(){}
	
    public function checkConfigFile(){  
    	
    	// $this->xmlConfig=@simplexml_load_file(realpath("config.xml"));
		if(!file_exists($this->configFile)) return new Notification(notificationType::Danger,'Error!', 'El archivo de configuración <b>"'.$this->configFile.'"</b> no es un código xml correcto o no existe <a href="index.php?menuID=2" class="alert-link">Cree uno.</a>');
		$this->xmlConfig=@simplexml_load_file($this->configFile);
		// print $this->xmlConfig;
		if(!isset($this->xmlConfig->ssh->host))return new Notification(notificationType::Danger,'Error!', 'El archivo de configuración <b>"'.$this->configFile.'"</b> no es un código xml correcto, no tiene host al que conectarse');
		if(!isset($this->xmlConfig->ssh->user))return new Notification(notificationType::Danger,'Error!', 'El archivo de configuración <b>"'.$this->configFile.'"</b> no es un código xml correcto, no tiene usuario con que conectarse');
		if(!isset($this->xmlConfig->ssh->password))return new Notification(notificationType::Danger,'Error!', 'El archivo de configuración <b>"'.$this->configFile.'"</b> no es un código xml correcto, no tiene contraseña con que conectarse');
		
		if(!isset($this->xmlConfig->ssh->port)){
			$this->port=22;
			//!!!!!!NEEDS FIXING!!!!!!
			//WILL NOT CHECKCONNECT BECAUSE OF RETURN
			//!!!!!!NEEDS FIXING!!!!!!
			return new Notification(notificationType::Warning,'Warning!', 'El archivo de configuración <b>"'.$this->configFile.'"</b> no es un código xml correcto, no conectarse al puerto indicado ');	
		}
		$this->configInfo=new Setting($this->xmlConfig->ssh->host,$this->xmlConfig->ssh->user,$this->xmlConfig->ssh->password,intval($this->xmlConfig->ssh->port));
		return 0;
    }  
      
	 public function checkConnec($settings,$checkPackage){  
		//PING HOST
		//http://www.cyberciti.biz/tips/simple-linux-and-unix-system-monitoring-with-ping-command-and-scripts.html
		// echo " checkConnec1 ";
		$ping_result=exec("ping -c2 -n -i 0.2 ".$settings->host." | grep 'received' | awk -F',' '{ print $2}' | awk '{ print $1}'");
		if($ping_result!=2)return new Notification(notificationType::Danger,'Error!', 'The host '.$settings->host.' Este equipo no responde a la conexion remota...');
		// echo " checkConnec2 ".$settings->host." , ".intval($settings->port);
		//TRY SSH TO THE HOST+CHECK IF DOCKER IS INSTALLED
		//http://www.php.net/manual/en/function.ssh2-exec.php
		$connection = @ssh2_connect($settings->host, intval($settings->port));
		// echo "checkConnec3 ";
		if (!$connection) return new Notification(notificationType::Danger,'Error!', 'la conexion SSH  '.$settings->host.':'.$settings->port.' tiene problemas, verifique el puerto en que corre el servicio.');
		if(!@ssh2_auth_password($connection, $settings->user,$settings->password))return new Notification(notificationType::Danger,'Problema!', 'El intento de conexión a '.$settings->host.':'.$settings->port.' <b>NO</b> fue correcto, inténtelo de nuevo.');;
		
		// echo " checkConnec4 ";
		if($checkPackage){

			$stream = ssh2_exec($connection, 'dpkg -s '.$this->dockerPackage);
			// echo " checkPackage: ".$stream;
			$errorStream = ssh2_fetch_stream($stream, SSH2_STREAM_STDERR);
			// echo " checkPackage: ".$errorStream;
			// Enable blocking for both streams
			stream_set_blocking($errorStream, true);
			stream_set_blocking($stream, true);
			$errorOutput=stream_get_contents($errorStream);
			$output=stream_get_contents($stream);
			fclose($errorStream);
			fclose($stream);
			if($errorOutput!="")return new Notification(notificationType::Danger,'Error!', $errorOutput.' @ '.$settings->host);
		}
		// echo " checkConnec5 <br/> ";
		return 0;
    } 
      
	public function getConfig(){
		if(!is_int($this->checkConfigFile())) return new Setting("","","","");
		$this->xmlConfig=simplexml_load_file($this->configFile);
		return new Setting($this->xmlConfig->ssh->host,$this->xmlConfig->ssh->user,$this->xmlConfig->ssh->password,intval($this->xmlConfig->ssh->port));
	}


	 public function createConfig($settings){
	 	try{
			if(!file_exists("../config.xml")){
				touch("../config.xml");
			}
			$xml = new DOMDocument('1.0', 'utf-8');
			$settingstag=$xml->createElement('settings');
			$ssh=$xml->createElement('ssh');
			$host=$xml->createElement('host');
			$user=$xml->createElement('user');
			$password=$xml->createElement('password');
			$port=$xml->createElement('port');
			$host->nodeValue=$settings->host;
			$user->nodeValue=$settings->user;
			$password->nodeValue=$settings->password;
			$port->nodeValue=$settings->port;
			$ssh->appendChild($host);
			$ssh->appendChild($user);
			$ssh->appendChild($password);
			$ssh->appendChild($port);
			$settingstag->appendChild($ssh);
			$xml->appendChild($settingstag);
			$xml->save("../config.xml");
			return 0;



		}catch (Exception $e){
			return $e;
		}
	 }
}  


?>