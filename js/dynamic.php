$(document).ready(function() {
/*
BOOTER SHITZ
*/
    <?php
    $dir = "../lists/";


    $handle = null;
    if($handle = opendir($dir)) {
        while(false !== ($entry = readdir($handle))) {
            if($entry!="."&&$entry!="..") {
                $splitted = explode("~~~", $entry);
                $special = $splitted[0].$splitted[1];
                ?>
                var myVar<?php echo $special; ?>;
                <?php
                echo "\n";
            }
        }
        closedir($handle);
    }
    ?>
    $(".booterStart").click(function(){
    <?php
    $handle = null;
    if($handle = opendir($dir)) {
        while(false !== ($entry = readdir($handle))) {
            if($entry!="."&&$entry!="..") {
                $splitted = explode("~~~", $entry);
                $special = $splitted[0].$splitted[1];
                ?>
                if($(this).attr("name")=="<?php echo $entry; ?>") {
                    $myrandom = Math.floor(Math.random() * 800) + 200;
                    myVar<?php echo $special; ?> = setInterval(function(){myTimer<?php echo $special; ?>()},$myrandom);
                }
                <?php
                echo "\n";
            }
        }
        closedir($handle);
    }
    ?>
    });
    $(".booterStop").click(function(){
        <?php
        $handle = null;
        if($handle = opendir($dir)) {
            while(false !== ($entry = readdir($handle))) {
                if($entry!="."&&$entry!="..") {
                    $splitted = explode("~~~", $entry);
                    $special = $splitted[0].$splitted[1];
                    ?>
                    if($(this).attr("name")=="<?php echo $entry; ?>") {
                        $("textarea[name*='<?php echo $entry; ?>']").html("");
                        clearInterval(myVar<?php echo $special; ?>);
                    }
                    <?php
                    echo "\n";
                }
            }
            closedir($handle);
        }
        ?>
    });

    <?php
    $handle = null;
    if($handle = opendir($dir)) {
        while(false !== ($entry = readdir($handle))) {
            if($entry!="."&&$entry!="..") {
                $splitted = explode("~~~", $entry);
                $special = $splitted[0].$splitted[1];
                ?>
                function myTimer<?php echo $special; ?>() {

                    $action = {
                        list: '<?php echo $entry; ?>'
                    };
                    $.ajax({
                        url: 'ajax/booter.php',
                        type: 'GET',
                        data: $action,
                        success: function(data){
                            <?php
                            if($splitted[0]=="tcp") {
                                echo 'console.log(data);';
                            }
                            ?>
                            $("textarea[name*='<?php echo $entry; ?>']").html(data);
                        }
                    });
                }
                <?php
                echo "\n";
            }
        }
        closedir($handle);
    }
    ?>
});
