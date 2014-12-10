<?
error_reporting(E_ALL);
ini_set('display_errors', '1');


	$html = file_get_contents('http://coinmarketcap.com/');
	$text = explode("\n", $html);
	foreach($text as $line){
		if(strpos($line, 'Bitcoin') !== false){
			print $line;
		}
	}
	print "Shit";




?>