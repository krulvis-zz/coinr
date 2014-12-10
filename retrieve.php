<?

error_reporting(E_ALL);
	ini_set('display_errors', '1');
	
	function getString($name){
		$raw = file_get_contents("http://coinmarketcap.com/".$name.".html");
		$raw = explode("\n", $raw);
		foreach($raw as $r){
		   if (strrpos($r, "#long-term-graph") != FALSE){
			  $begin = strpos($r , "data:") + 5;
			  $end = strpos($r , "}],");
			  return substr($r, $begin, $end - $begin - 2);
			}
		}
		return "N3rd";
	}
	function getTimes($name){
		$text = getString($name);
		$array = explode('],',$text);
		for($i = 0; $i<sizeof($array); $i++){
			 $arr = str_replace("[", "", $array[$i]);
			 $double = explode(', ', $arr);
			 for($x = 0; $x<sizeof($double); $x++){
				$megaArray[$i][$x] = ($double[$x]+0);
				if($x==0){
				   $time[$i] = $double[$x];
				}
			 } 
		  }
		  return $time;
	}
	function getAll($name){
		$text = getString($name);
		$array = explode('],',$text);
		for($i = 0; $i<sizeof($array); $i++){
			 $arr = str_replace("[", "", $array[$i]);
			 $double = explode(', ', $arr);
			 for($x = 0; $x<sizeof($double); $x++){
				$megaArray[$i][$x] = ($double[$x]+0);
				if($x==1){
				   $y[$i] = $double[$x];
				}else{
				   $time[$i] = $double[$x];
				}
			 } 
		  }
		  return $megaArray;
	}
	function getValues($name){
		$text = getString($name);
		$array = explode('],',$text);
		for($i = 0; $i<sizeof($array); $i++){
			 $arr = str_replace("[", "", $array[$i]);
			 $double = explode(', ', $arr);
			 for($x = 0; $x<sizeof($double); $x++){
				$megaArray[$i][$x] = ($double[$x]+0);
				if($x==1){
				   $y[$i] = $double[$x];
				}
			 } 
		  }
		  return $y;
	}
	
	function getArray($name){
		$values = getValues($name);
		for($i = 0; $i<sizeof($values); $i++){
			print $values[$i];
			 if ($i != sizeof($values)-1){print ", ";}
		  }
	}
	?>
