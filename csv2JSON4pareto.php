<?php
// chain:
//	 csv file -> associative array -> JSON:
//	 adapted by Serge Karalli
//	 ska44ed+gmail.com
//	 With added routines to create
//		a) a Pareto Chart
//		b) An ABC Analysis
//	 
//
// csv_to_JSON
// original:
//	 'Convert a comma separated file into an associated array'
//	  by jaywilliams
//	  https://gist.github.com/385876
// Modified to generate a JSON data set for a Pareto Chart
function csv_to_PARETO($input, $att_delimiter, $request)
{
	$header= null;
	$data= array();
	$csvData= str_getcsv($input, "\n");
	$pHeader=array(0=>"Item",1=>"Usage");
	$tab= array();
	$paretoData= array();
	$prepareData= array();
	$usageData= array();
	$augmentedData= array();
	$chartData= array();
	foreach($csvData as $csvLine){
		if(is_null($header)) $header= explode($att_delimiter, $csvLine);
		else{
			$items= explode($att_delimiter, $csvLine);
			for($n= 0, $m= count($pHeader); $n < $m; $n++){
				$items[$n]= trim($items[$n]);
				$prepareData[$header[$n]]= $items[$n];
			}
			$paretoData['Item']= $items[0];
			$paretoData['Usage']= $items[1];
			//$paretoData['Percentage']=0;
			$paretoData['CumPercent']=0;

			//$prepareData['Percentage']=0;
			$prepareData['CumPercent']=0;
			$data[]= $prepareData;
			$usageData[]= $paretoData;
		}
	}
    foreach ($usageData as $key => $row) {
        $Item[$key]  = $row['Item'];
        $Usage[$key] = $row['Usage'];
        $ItemStrLength[]=strPixels($row['Item']);
    };
	if(max($ItemStrLength)<=100) $chartHeight='400px';
	else $chartHeight='600px';

	array_multisort($Usage, SORT_DESC,$Item, SORT_ASC, $usageData);
	$maxUsage=round(max($Usage)*1.2/10,0)*11.111111;
	$cumUsageSum=array_sum($Usage);
	$k=0;
	foreach($Usage as $usageItem){
		$temp=$usageItem/$cumUsageSum*100;
		$tab[]=$temp;
		$augmentedData['Item']=$usageData[$k]['Item'];
		$augmentedData['Usage']=$usageData[$k++]['Usage'];
		//$augmentedData['Percentage']=$usageItem/$cumUsageSum*100;
		$augmentedData['CumPercent']=array_sum($tab);
		$chartData[]= $augmentedData;

	}
	$JSONdata= json_encode($chartData, JSON_NUMERIC_CHECK);
	return array($maxUsage, $header, $JSONdata, $chartHeight);
}
function csv_to_ABC($input, $att_delimiter, $request)
{
	$header= null;
	$data= array();
	$csvData= str_getcsv($input, "\n");
	$pHeader=array(0=>"Item",1=>"Usage");
	$tab= array();
	$abcData= array();
	$prepareData= array();
	$usageData= array();
	$diff= array();
	$augmentedData= array();
	$partitionkey= array();
	$chartData= array();
	foreach($csvData as $csvLine){
		if(is_null($header)) $header= explode($att_delimiter, $csvLine);
		else{
			$items= explode($att_delimiter, $csvLine);
			for($n= 0, $m= count($pHeader); $n < $m; $n++){
				$items[$n]= trim($items[$n]);
				$prepareData[$header[$n]]= $items[$n];
			}
			$abcData['Item']= $items[0];
			$abcData['Usage']= $items[1];
			//$abcData['Percentage']=0;
			$abcData['CumPercent']=0;

			//$prepareData['Percentage']=0;
			$prepareData['CumPercent']=0;
			$data[]= $prepareData;
			$usageData[]= $abcData;
		}
	}
	foreach ($usageData as $key => $row) {
		$Item[$key]  = $row['Item'];
		$Usage[$key] = $row['Usage'];
		$diffUsage[$key] = $row['Usage'];
        $ItemStrLength[]=strPixels($row['Item']);

	};
	if(max($ItemStrLength)<=100) $chartHeight='400px';
	else $chartHeight='600px';

	rsort($diffUsage);
	$diff[]=0;
	for ($j = 1;$j<count($Usage);$j++) {
		$diff[$j] = $diffUsage[$j-1] - $diffUsage[$j];
	};
	arsort($diff);

	$h=0;
	foreach ($diff as $key => $break) {
		$partitionkey[]=$key;
	};
	if($partitionkey[0]<$partitionkey[1]){
		$partition=array(0=>$partitionkey[0],1=>$partitionkey[1]);

	}else{
		$partition=array(0=>$partitionkey[1],1=>$partitionkey[0]);
	}

	array_multisort($Usage, SORT_DESC,$Item, SORT_ASC, $usageData);
	$maxUsage=round(max($Usage)*1.2/10,0)*11.111111;
	$cumUsageSum=array_sum($Usage);
	$k=0;
	$numItems=count($Usage);
	$aItems=0;
	$bItems=0;
	$cItems=0;
	$diff[]=0;
	foreach($Usage as $key => $usageItem){
		$temp=$usageItem/$cumUsageSum*100;
		$tab[]=$temp;
		$augmentedData['Item']=$usageData[$k]['Item'];
		if($k<$partition[0]) {
			$aItems++;
			$augmentedData['aUsage']=$usageData[$k++]['Usage'];
			$augmentedData['bUsage']=null;
			$augmentedData['cUsage']=null;
		}elseif(($k>=$partition[0])&&($k<$partition[1])){
			$bItems++;
			$augmentedData['aUsage']=null;
			$augmentedData['bUsage']=$usageData[$k++]['Usage'];
			$augmentedData['cUsage']=null;
		}else{
			$cItems++;
			$augmentedData['aUsage']=null;
			$augmentedData['bUsage']=null;
			$augmentedData['cUsage']=$usageData[$k++]['Usage'];
		}

		//$augmentedData['Percentage']=$usageItem/$cumUsageSum*100;
		$augmentedData['CumPercent']=array_sum($tab);
		$chartData[]= $augmentedData;

	}
	foreach ($chartData as $key => $row) {
		$aUsage[$key] = $row['aUsage'];
		$bUsage[$key] = $row['bUsage'];
		$cUsage[$key] = $row['cUsage'];

	};
/*
	$aPerc=number_format($aItems/$numItems*100,2)." %";
	$bPerc=number_format($bItems/$numItems*100,2)." %";
	$cPerc=number_format($cItems/$numItems*100,2)." %";
	$aPercUsage = number_format(array_sum($aUsage)/$cumUsageSum*100,2)." %";
	$bPercUsage = number_format(array_sum($bUsage)/$cumUsageSum*100,2)." %";
	$cPercUsage = number_format(array_sum($cUsage)/$cumUsageSum*100,2)." %";
*/
 	$aPerc=number_format($aItems/$numItems*100,2);
	$bPerc=number_format($bItems/$numItems*100,2);
	$cPerc=number_format($cItems/$numItems*100,2);
	$aPercUsage = number_format(array_sum($aUsage)/$cumUsageSum*100,2);
	$bPercUsage = number_format(array_sum($bUsage)/$cumUsageSum*100,2);
	$cPercUsage = number_format(array_sum($cUsage)/$cumUsageSum*100,2);

	$tableData="Division,percItems,percUsage\n";
	$tableData.="A Items, ".$aPerc.", ".$aPercUsage."\n";
	$tableData.="B Items, ".$bPerc.", ".$bPercUsage."\n";
	$tableData.="C Items, ".$cPerc.", ".$cPercUsage."\n";
	$tableData.="<strong>Totals:</strong>, 100, 100\n";

	$JSONdata= json_encode($chartData, JSON_NUMERIC_CHECK);
	return array($maxUsage, $header, $JSONdata, $tableData, $chartHeight);
}
?>
