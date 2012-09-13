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
// Modified to generate a JSON data set for a Histogram
function csv_to_histogram($input,  $request)
{
	$header= null;
	$data= array();
	$csvData=explode("\n", $input);

	foreach($csvData as $csvLine){
		if(is_null($header)) $header= $csvLine;
		elseif(is_numeric($csvLine))
		{
			$histogramData[]= $csvLine;
		}
	}
	$binRange=ceil(count($histogramData)/$request);
	if (count($histogramData)>$request){
		sort($histogramData,SORT_NUMERIC);
		$maxData=max($histogramData);
		$minData=floor(min($histogramData));
		$range=$maxData-$minData;
		$binRange=ceil($range/$request);
		for ($i=0;$i<$request;$i++){
			$strmin=(string)($minData+$i*$binRange);
			$strmax=(string)($minData+($i+1)*$binRange);
			$bin['interval']=$strmin.'-'.$strmax;
			$freq=0;
			foreach($histogramData as $histogramValue){
				if (($histogramValue<=$minData+($i+1)*$binRange)And($histogramValue>=$minData+$i*$binRange)){
					$freq++;
				}
			}
			$bin['frequency']=$freq;
			$output[]=$bin;
		}
	}
	$JSONdata= json_encode($output, JSON_NUMERIC_CHECK);
	return array($header,$JSONdata);
}
