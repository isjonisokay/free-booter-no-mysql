<?php
setlocale(LC_ALL, 'en_US.UTF8');
function toAscii($str, $replace=array(), $delimiter='-') {
	if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
	}

	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

	return $clean;
}
if(!empty($_GET["text"])) {
    if($_GET["udptcp"]=="udp"||$_GET["udptcp"]=="tcp") {
        if(!empty($_GET["name"])) {
            if(!file_exists("../lists/".$_GET["udptcp"]."~~~".toAscii($_GET["name"]))) {
               file_put_contents("../lists/".$_GET["udptcp"]."~~~".toAscii($_GET["name"]), $_GET["text"]);
               echo '<div class="warning-label label label-success">file is saved</div>';
            }
            else {
                echo '<div class="warning-label label label-warning">this shell name allready exists please choose another</div>';
            }
        }
        else {
            echo '<div class="warning-label label label-warning">you did not enter a name</div>';
        }
    }
    else {
        echo '<div class="warning-label label label-warning">you need to fill in if the shell is udp OR tcp</div>';
    }
}
else {
    echo '<div class="warning-label label label-warning">you need to fill in at least one shell</div>';
}
?>
