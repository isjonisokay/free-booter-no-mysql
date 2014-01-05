<?php
//url mod
$url = explode("/",str_replace(str_replace(basename($_SERVER["SCRIPT_NAME"]),"",$_SERVER["SCRIPT_NAME"]),"",$_SERVER["REQUEST_URI"]));
