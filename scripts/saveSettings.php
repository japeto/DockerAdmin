<?php
include_once('../models/settingModel.php');
$settings=new settingModel();
$setting=new Setting($_POST['host'],$_POST['user'],$_POST['password'],$_POST['port']);
// echo "<center>".$_POST['host'],$_POST['user'],$_POST['password'],$_POST['port']."</center>"
echo $settings->createConfig($setting);
?>