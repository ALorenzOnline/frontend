
<?php
require_once('path.inc');
require_once('get_host_info.inc');
require_once('rabbitMQLib.inc');

function send($type,$sid){
echo "function called";
echo $sid;
$client = new rabbitMQClient("testRabbitMQ.ini","testServer");
/*
if (isset($argv[1]))
{
  $msg = $argv[1];
}
else
{
  $msg = "test message";
}
*/
$request = array();
$request['type'] = "$type";
echo "<br>";
echo $request['type'];
echo "<br>";
//echo "array created";
$request['steamid'] = "$sid";
echo $request['steamid'];
//$request['password'] = "password";
//$request['message'] = $msg;
$response = $client->send_request($request);
//echo "request sent";
//$response = $client->publish($request);

$i=0;
if($type=='showFriends'){
foreach($response as $em)
{

		echo "<img src=$em>";
		echo "\r\n";
		$i++;	
		if($i==0){
		}
		else
		{
			echo $em;
			echo "<br>";
			$i--;	
		}
	}
}

//echo "client received response: ".PHP_EOL;
//print_r($response);
//echo "\n\n";

echo $argv[0]." END".PHP_EOL;
}
?>
