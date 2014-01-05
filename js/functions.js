$(document).ready(function() {
    $(".listSave").click(function(){
        $action = {
            text: $(".listText").val(),
            udptcp: $(".listUdpTcp").val(),
            name: $(".listName").val()
        };
        $.ajax({
            url: 'ajax/list.php',
            type: 'GET',
            data: $action,
            success: function(data){
                $(".error").html(data);
            }
        });
    });
    $(".booterSave").click(function(){
        $action = {
            ip: $(".booterIP").val(),
            port: $(".booterPort").val()
        };
        $.ajax({
            url: 'ajax/saveip.php',
            type: 'GET',
            data: $action,
            success: function(data){
                $(".error").html(data);
            }
        });
    });
});
