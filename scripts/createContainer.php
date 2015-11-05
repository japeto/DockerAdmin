<?php
include_once('../models/containerModel.php');
$container=new containerModel();
// echo $_POST['cname'].'->'.$_POST['cdnssearch'].'->'.$_POST['cdns'].'->'.$_POST['ciphost'].'->'.$_POST['cporthost'].'->'.$_POST['cport'].'->'.$_POST['chostpath'].'->'.$_POST['cpath'].'->'.$_POST['image'].'->'.$_POST['ccommand']
$cmdContainer=$container->createContainer($_POST['cname'],$_POST['cdns'],$_POST['cdnssearch'],$_POST['ciphost'],$_POST['cporthost'],$_POST['cport'],$_POST['chostpath'],$_POST['cpath'],$_POST['image'],$_POST['ccommand'],$_POST['cparams']);
$patternID='/[0-9a-fA-F]{64}/';
if(@preg_match($patternID,@substr($cmdContainer,0,-1))!=1){
	echo $cmdContainer->Message;
	return;
}
echo $cmdContainer;

?>