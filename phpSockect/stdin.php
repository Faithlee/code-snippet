<?php

//use [php::stdin] protocal
$fh = fopen('php://stdin', 'r');

echo 'Please input string:';

//read input content
$str = fread($fh, 1000);
echo '[php://stdin]You input content:' . $str;
fclose($fh);

//go on input string 
echo '[STDIN] please input any string';
$str = fread(STDIN, 1000);
echo '[STDIN] You input ' . $str;

while($str = fread(STDIN, 1000)) {
	echo 'you print: ' . $str;
}
