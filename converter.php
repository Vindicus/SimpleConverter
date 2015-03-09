<?php
// This function runs the currency for United States, Hong Kong, Taiwan, and China currencies
function currency($selectionB, $value, $USD, $HK, $TW, $CN){
	$FinalValue = 0;  // Declaring variable, storing the calculated value
	$FinalValueString = "";  // Declaring variable, storing the string character such as $, HK$ ...
	
	// Runs the case statement and match it against the "Convert To" value and run its specified calculation
	switch($selectionB){
		case "U.S.":
			$FinalValue = $value * $USD;
			$FinalValueString = "$";
			
			break;	
			
		case "HK":
			$FinalValue = $value * $HK;
			$FinalValueString = "HK$";
			
			break;
		case "TW":
			$FinalValue = $value * $TW;
			$FinalValueString = "NT$";
			
			break;
		case "CN":
			$FinalValue = $value * $CN;
			$FinalValueString = "¥";
			
			break;  
	}
	
	// Format the calculated value and turn it into a string currency format	
	$FinalValueString = $FinalValueString . number_format((string) $FinalValue, 2);
	
	return $FinalValueString;
}



// This function runs the temperature for Fahrenheit and Celsius
function temperature($selectionA, $selectionB, $value){
	$FinalValue = 0;  // Declaring variable, storing the calculated vaue
	$FinalValueString = "";  // Declaring variable, storing the string character such as $, HK$ ...
	
	// Runs the case statement and match it against the "Convert To" value and run its specified calculation
	switch($selectionB){
		case "Fahrenheit":
			
			// If the "Convert From" value is the same as the "Convert To" value, no need to do a conversion
			if ($selectionA == "Fahrenheit"){
				
				$FinalValue = $value;
				$FinalValueString = "°F";
				
			}else{
				
				$FinalValue = ($value * (9/5)) + 32;
				$FinalValueString = "°F";	
			}
			
			break;
		case "Celsius":
			
			// If the "Convert From" value is the same as the "Convert To" value, no need to do a conversion
			if ($selectionA == "Celsius"){
				
				$FinalValue = $value;
				$FinalValueString = "°C";
				
			}else{
				
				$FinalValue = ($value - 32) * (5/9);
				$FinalValueString = "°C";	
			}
			
			break;
	}
	// Format the calculated value and turn it into a string
	$FinalValueString = $FinalValue . $FinalValueString;
	
	return $FinalValueString;
}

include(ROOT_PATH . "array_data.php");
?>
