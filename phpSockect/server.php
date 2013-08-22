<?php

while (true) {	
	receive_message('127.0.0.1', '80', 5);
}

function receive_message($ipServer, $portNumber, $nbSecondsIdle) {
	$socket = stream_socket_server('tcp://' . $ipServer . ':' . $portNumber, $errno, $errstr);
	if (!$socket) {
		echo "$errstr ($errno)<br />\n";
	} else {
		while ($conn = @stream_socket_accept($socket, $nbSecondsIdle)) {	
			$message= fread($conn, 1024);

			if (!$message) {
				die('operation failed!');
			}
			
			$message = trim($message);
			
			switch ($message) {
				case "lijiawei":
					$return = "password:\n";
					echo "password:\n";
				break;
				case 'ljwaaaaa123':
					$return = "success:\n";
					echo "success!\n";
				break;
				case 'get_user_list':
					$return = "ljw,hzx\n";
					echo "ljw,hzx\n";
				break;
				default:
					$return = "$message\n";					
					echo "username:\n";
			}
			
			fputs($conn, $return);
			fclose ($conn);			
		}
		
		fclose($socket);
	}
}
?>
