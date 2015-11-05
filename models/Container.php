<?php

class Container
{
	public $ID;
	public $longID;
	public $Name;
	public $Image;
	public $Hostname;
	public $Uptime;
	public $Isrunning;
	public $IP;
	public $Created;
	//exposed ports is an array
	public $Exposedports;
	//Environment variable is an array
	public $Environmentvariables;
	//running processes in the container
	public $RunningProcesses;
	//container network
	public $ContainerNetwork;
	
	public $WorkingDir;
	public $Cmd;
	public $DnsSearch;
	public $Dns;	
	
	public function __construct($containerID,$containerImage,$containerHostname,$containerName,$containerUptime,$containerIsrunning,$containerIP,$containerLongID)
	{
		$this->ID=$containerID;
		$this->Name=$containerName;
		$this->Image=$containerImage;
		$this->Hostname=$containerHostname;
		$this->Uptime=$containerUptime;
		$this->Isrunning=$containerIsrunning;
		$this->IP=$containerIP;
		$this->longID = $containerLongID;
	}
	public function longContainer($containerID,$containerImage,$containerHostname,$containerUptime,$containerIsrunning,$containerName,$containerCreated,$containerExposedports,$containerEnvironmentvariables,$containerNetwork,$containerRunningProcesses,$WorkingDir,$Cmd,$Dns,$DnsSearch,$containerLongID)
	{
		$instance=new self($containerID,$containerImage,$containerHostname,$containerName,$containerUptime,$containerIsrunning,$containerNetwork->IP);
		$instance->Name=$containerName;
		$instance->Created=$containerCreated;
		$instance->Exposedports=$containerExposedports;
		$instance->Environmentvariables=$containerEnvironmentvariables;
		$instance->ContainerNetwork=$containerNetwork;
		$instance->RunningProcesses=$containerRunningProcesses;
		$instance->WorkingDir=$WorkingDir;
		$instance->Cmd=$Cmd;
		$instance->Dns=$Dns;
		$instance->DnsSearch=$DnsSearch;

		$instance->longID=$containerLongID;
		return $instance;
	}
}

?>