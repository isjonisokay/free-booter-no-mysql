<?php
if(!empty($_GET["ip"])) {
    if(!empty($_GET["port"])) {
            if(!file_exists("../ips/".$_GET["ip"]."~~~".$_GET["port"])) {
               file_put_contents("../ips/".$_GET["ip"]."~~~".$_GET["port"], "");
               echo '<div class="warning-label label label-success">file is saved</div>';
            }
            else {
                echo '<div class="warning-label label label-warning">this ip with port is allready added, please choose a other one</div>';
            }
    }
    else {
        echo '<div class="warning-label label label-warning">you did not enter a port</div>';
    }
}
else {
    echo '<div class="warning-label label label-warning">you did not enter a ip</div>';
}
?>
