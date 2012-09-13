<?php
/**
* Convert a CSV string to JSON
* 
* chain:
*	 csv file -> associative array -> JSON:
*	 adapted by Serge Karalli
*	 ska44ed+gmail.com
*
* Additional options:
*	 add a trendline (for YUI MarkerSeries charts)
*
* original:
*	 'Convert a comma separated file into an associated array'
*	  by jaywilliams
*	  https:*gist.github.com/385876
*/
function csv_to_JSON($input, $att_delimiter)
{
	$header = null;
	$data = array();
	$csvData = str_getcsv($input, "\n");
	foreach($csvData as $csvLine){
		if(is_null($header)) $header = explode($att_delimiter, $csvLine);
		else{
			$items = explode($att_delimiter, $csvLine);
			for($n = 0, $m = count($header); $n < $m; $n++){
				$items[$n] = trim($items[$n]);
				$prepareData[$header[$n]] = $items[$n];
			}
			$data[] = $prepareData;
		}
	}
	$JSONdata = json_encode($data, JSON_NUMERIC_CHECK);
	return array($header, $JSONdata);
}
// The Following function is augmented from the one obeve to 
// compute and add a trendline to a scatterplot.
//
function csv_to_JSON_add_trend($input, $att_delimiter)
{
	$header = null;
	$data = array();
	$csvData = str_getcsv($input, "\n");
	$markerData = array();
	$augmentedData = array();
	foreach($csvData as $csvLine){
		if(is_null($header)) {
			$header = explode($att_delimiter, $csvLine);
			//if trendline
				$tlHeader = 'Trend';
				$header[] = $tlHeader;
			//endif trendline

		}else{
			$items = explode($att_delimiter, $csvLine);
			for($n = 0, $m = count($header); $n < $m; $n++){
				$items[$n] = trim($items[$n]);
				$markerData[$header[$n]] = $items[$n];
			}

			//if trendline
				$markerData['Trend'] = 0;

				$augmentedData['X'] = $items[0];
				$augmentedData['Y'] = $items[1];
				$augmentedData['XY'] = $items[0]*$items[1];
				$augmentedData['X2'] = $items[0]*$items[0];

				$regData[] = $augmentedData;
			//endif trendline

			$data[] = $markerData;
		}
	}
	//if trendline
		foreach ($regData as $key => $row) {
			$X[$key]  = $row['X'];
			$Y[$key] = $row['Y'];
			$XY[$key] = $row['XY'];
			$X2[$key] = $row['X2'];
		};

		$N = count($regData);
		$sumX = array_sum($X);
		$sumY = array_sum($Y);
		$sumXY = array_sum($XY);
		$sumX2 = array_sum($X2);

		$b = ($N*$sumXY-$sumX*$sumY)/($N*$sumX2-$sumX*$sumX);
		$a = ($sumY-$b*$sumX)/$N;

		for ($k = 0;$k<count($data);$k++) {
			$data[$k]['Trend']  = $a+$b*$data[$k][$header[0]];
		};
	//endif trendline
	$JSONdata = json_encode($data, JSON_NUMERIC_CHECK);
	return array($header, $JSONdata);
}
?>
