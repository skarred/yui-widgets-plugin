<?php
// chain:
//	 csv file -> associative array -> JSON:
//	 adapted by Serge Karalli
//	 ska44ed+gmail.com
//	 With added routines to create Control Charts:
//		a) An R Chart
//		b) An Xbar Chart
//	 
//
// csv_to_JSON
// original:
//	 'Convert a comma separated file into an associated array'
//	  by jaywilliams
//	  https://gist.github.com/385876
// Modified to generate a JSON data set for a Pareto Chart
function csv_to_PARETO_xBar($input, $att_delimiter, $request)
{
	$arrA2= array( 2=>1.88, 3=>1.023, 4=>0.729, 5=>0.577, 6=>0.483, 7=>0.419, 8=>0.373, 9=>0.337, 10=>0.308 );
	$arrD3 = array( 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0.076, 8=>0.136, 9=>0.184, 10=>0.223 );
	$arrD4 = array( 2=>3.268, 3=>2.574, 4=>2.282, 5=>2.114, 6=>2.004, 7=>1.924, 8=>1.864, 9=>1.816, 10=>1.777 );
	
	$A2 = null;
	$D3 = null;
	$D4 = null;
	$header = null;	
	
	$xHeader=array(0=>"Sample No.", 1=>"Xbar", 2=>"CL", 3=>"UCL", 4=>"LCL");
	$rHeader=array(0=>"Sample No.", 1=>"R", 2=>"Rbar", 3=>"UCL", 4=>"LCL");


	$csvData = str_getcsv($input, "\n");
	$data = array();
	
	foreach($csvData as $csvLine){
		$items = explode($att_delimiter, $csvLine);
		if((is_null($A2))Or(is_null($D3))Or(is_null($D4))){
			$sampleSize = count($items);
			$A2 = (float)$arrA2[$sampleSize];
			$D3 = (float)$arrD3[$sampleSize];
			$D4 = (float)$arrD4[$sampleSize];
		}
		
		$xBar[] = array_sum($items)/count($items);
		$R[] = max($items)-min($items);
	}
	
	$CLx = array_sum($xBar)/count($xBar);
	$Rbar = array_sum($R)/count($xBar);
	$CLr = $Rbar;
	$UCLx = $CLx + $A2*$Rbar;
	$LCLx = $CLx - $A2*$Rbar;
	$UCLr = $D4*$Rbar;
	$LCLr = $D3*$Rbar;

	//Build X chart Array
	$k=0;
	foreach($xBar as $xAvg){
			$dataPointX[$xHeader[0]] = "Sample ".$k++;
			$dataPointX[$xHeader[1]] = $xAvg;
			$dataPointX[$xHeader[2]] = $CLx;
			$dataPointX[$xHeader[3]] = $UCLx;
			$dataPointX[$xHeader[4]] = $LCLx;
			$dataX[] = $dataPointX;
	}

	//Build X chart Array
	$j=0;
	foreach($R as $rAvg){
			$dataPointR[$rHeader[0]] = "Sample ".$j++;
			$dataPointR[$rHeader[1]] = $rAvg;
			$dataPointR[$rHeader[2]] = $CLr;
			$dataPointR[$rHeader[3]] = $UCLr;
			$dataPointR[$rHeader[4]] = $LCLr;
			$dataR[] = $dataPointR;
	}

	if($request==='x') return array($xHeader, json_encode($dataX, JSON_NUMERIC_CHECK));
	
	if($request==='r') return array($rHeader, json_encode($dataR, JSON_NUMERIC_CHECK));
}
?>
