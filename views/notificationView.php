<?php
echo '<div class="alert alert-'.$this->lastNotification->Type.' alert-dismissable"><b>'.$this->lastNotification->Title.'</b><pre>'.$this->lastNotification->Message.'</pre></div>';
?>