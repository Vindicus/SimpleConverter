<?php
$conversion_data = array(); //Creates an empty array to store measurement types into logical groupings

/*
 * For example, A logical group of stored currencies will be stored in the array[0] with its own conversion type function
 * A logical group of temperature types will be stored in the array[1] with its own conversion type function
 * (Each element in the array will have its own associative array)
 */
 
$conversion_data[0] = array(
    "conversion" => ["U.S.", "HK", "TW", "CN"],  // Inside this assiociative array has a nested array containing currency types
	"convertNow" => function($selectionA, $selectionB, $value){  //Runs this function for the selected type and match it against its selected value
		$ConvertedValueString = "";	
				
		if ($selectionA == "U.S."){
			//Converting from U.S. to U.S., Hong Kong, Taiwan, or China currency rate
			// currency arguments are "Converted To" value, user input value, U.S. rate, Hong Kong rate, Taiwan Rate, China rate
		    $ConvertedValueString = currency($selectionB, $value, 1.00000, 7.75687, 31.6100, 6.26465);
		}
		
		if ($selectionA == "HK"){
			//Converting from Hong Kong to U.S., Hong Kong, Taiwan, or China currency rate
			// currency arguments are "Converted To" value, user input value, U.S. rate, Hong Kong rate, Taiwan Rate, China rate
			$ConvertedValueString = currency($selectionB, $value, 0.128918, 1.00000, 4.07510, 0.807627);
		}
		
		if($selectionA == "TW"){
			//Converting from Taiwan to U.S., Hong Kong, Taiwan, or China currency rate
			// currency arguments are "Converted To" value, user input value, U.S. rate, Hong Kong rate, Taiwan Rate, China rate
			$ConvertedValueString = currency($selectionB, $value, 0.0316356, 0.245393, 1.00000, 0.198186);
		}
		
		if ($selectionA == "CN"){
			//Converting from China to U.S., Hong Kong, Taiwan, or China currency rate
			// currency arguments are "Converted To" value, user input value, U.S. rate, Hong Kong rate, Taiwan Rate, China rate
			$ConvertedValueString = currency($selectionB, $value, 0.159626, 1.23820, 5.04577, 1.00000);
		}
		
		return $ConvertedValueString;
});	

$conversion_data[1] = array(
    "conversion" => ["Fahrenheit", "Celsius"],  // Inside this assiociative array has a nested array containing currency types
	"convertNow" => function($selectionA, $selectionB, $value){  //Runs this function for the selected type and match it against its selected value
		$ConvertedValueString = "";
		
		if ($selectionA == "Fahrenheit"){
			//Converting from Fahrenheit to Fahrenheit or Celsius
			// arguments are "Converted From" value, "Converted To" value and user input value. (values to convert fahrenheit to celsius not needed due to only two conversion types)
			$ConvertedValueString = temperature($selectionA, $selectionB, $value);
		}
		
		if ($selectionA == "Celsius"){
			//Converting from Celsius to Fahrenheit or Celsius
			// arguments are "Converted From" value, "Converted To" value and user input value. (values to convert fahrenheit to celsius not needed due to only two conversion types)
			$ConvertedValueString = temperature($selectionA, $selectionB, $value);
		}
		
		return $ConvertedValueString;
});

$conversion_data[2] = array(
	"conversion" => ["Pound", "Kilogram", "Gram", "Ounce"], //Inside this associative array has a nested array containing weight types
	"convertNow" => function($selectionA, $selectionB, $value){
			$ConvertedValueString = "";
			
			if ($selectionA == "Pound"){
				//Converting from Pound to Kilogram, Gram, Ounce
				//arguments are "Converted To" value, user input value, Pound, Kilogram, Ounce
				$ConvertedValueString = mass($selectionB, $value, 1.00000, 0.453592, 453.592, 16);
			}
			
			if ($selectionA == "Kilogram"){
				//Converting from Kilogram to Pound, Gram, Ounce
				//arguments are "Converted To" value, user input value, Pound, Kilogram, Ounce
				$ConvertedValueString = mass($selectionB, $value, 2.20462, 1.00000, 1000, 35.274);
			}
			
			if ($selectionA == "Gram"){
				//Converting from Gram to Pound, Kilogram, Ounce
				//arguments are "Converted To" value, user input value, Pound, Kilogram, Gram, Ounce
				$ConvertedValueString = mass($selectionB, $value, 0.00220462, 0.001, 1.00000, 0.035274);
			}
			
			if ($selectionA == "Ounce"){
				//Converting from Ounce to Pound, Kilogram, Gram
				//arguments are "Converted To" value, user input value, Pound, Kilogram, Gram, Ounce
				$ConvertedValueString = mass($selectionB, $value, 0.0625, 0.0283495, 28.3495, 1.00000);
			}
			return $ConvertedValueString;
});
?>
