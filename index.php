<?php
session_start();
require_once("inc/include.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset=”utf-8”>
        <title>botw44 Booter</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet" />
        <link href="css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/functions.js"></script>
        <script src="js/dynamic.php"></script>
    </head>
    <body>

        <div class="navbar navbar-default navbar-static-top">
            <div class="container">

                <a href="./" class="navbar-brand">A simple booter</span></a>

                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse navHeaderCollapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li<?php if($url[0]=="home"||empty($url[0])){echo ' class="active"';} ?>><a href="home">home</a></li>
                        <li<?php if($url[0]=="list"){echo ' class="active"';} ?>><a href="list">list</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <?php
        if(empty($url)) {
            require_once("pages/home.php");
        }
        else {
            if(file_exists("pages/".$url[0].".php")) {
                require_once("pages/".$url[0].".php");
            }
            else {
                require_once("pages/home.php");
            }
        }
        ?>

    </body>
</html>
