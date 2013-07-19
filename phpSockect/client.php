<?php
$fh = fopen('php://stdin', 'r');
echo "enter your infomation:\n";
$str = fread($fh, 1000);
fclose($fh);

send_message('127.0.0.1', '80', $str);

function send_message($ipServer, $portServer, $message = STDIN) {
	$fp = stream_socket_client("tcp://$ipServer:$portServer", $errno, $errstr);
	
	if (!$fp) {
		echo "ERROR : $errno - $errstr<br />\n";
	} else {
		fwrite($fp, "$message\n");		
		
		$response = fread($fp, 20);
		if (!$response) {
			die('failed');
		}

		echo $response;		
		fclose($fp);
	}
}

?>
