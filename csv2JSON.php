<?php
// chain:
//	 csv file -> associative array -> JSON: 
//	 adapted by Serge Karalli 
//	 ska44ed+gmail.com
// 
// csv_to_JSON
// original:
//	 'Convert a comma separated file into an associated array'
//	  by jaywilliams
//	  https://gist.github.com/385876
function csv_to_JSON($input, $att_delimiter, $request) 
{ 
	$header= null;
	$data= array(); 
	$csvData= str_getcsv($input, "\n"); 
	foreach($csvData as $csvLine){ 
		if(is_null($header)) $header= explode($att_delimiter, $csvLine); 
		else{ 
			$items= explode($att_delimiter, $csvLine); 
			for($n= 0, $m= count($header); $n < $m; $n++){ 
				$items[$n]= trim($items[$n]);
				$prepareData[$header[$n]]= $items[$n]; 
			} 
			$data[]= $prepareData; 
		} 
	} 
	$JSONdata= json_encode($data, JSON_NUMERIC_CHECK);
	if($request=="JSON") return $JSONdata;
	elseif($request=="keys") return $header;
	else return null;
}
?>
