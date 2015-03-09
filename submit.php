<?php
//  Requires the config.php file
require_once($_SERVER["DOCUMENT_ROOT"] . "/Converter/config.php");

// Variable Declarations
$error_message = "";  // This variable is to store error messages if users input or select wrong type or data
$conversion_value = "";  // This variable stores the final converted value in string form to concatenate with other string characters
$Wrong_Conversion = "";  // This variable stores a "Good Conversion" if conversion is successful otherwise stores "Bad Conversion"

// If user clicks submit, its form data will be processed
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $FirstSelection = $_POST["sel-1"];  //Store the "Convert To value"
	$FirstValue = $_POST["conv-1"];  // Stores the user input value to convert
	$SecondSelection = $_POST["sel-2"];  // Stores the "Convert From value"
	
	// Simple validation check if the user input is empty or non-numerical data
	if($FirstValue == "" OR !is_numeric($FirstValue)){
		$error_message = "Check for the following: 1) Conversion type must be in the same measurement group
						 2) Textbox must not be empty and contains only numeric data";
	}

// Includes the conveter.php file
include(ROOT_PATH . "converter.php");

//Loops through each of the $conversion_data associative array in the converter.php file and run its function if it finds a good match
foreach($conversion_data as $data){
	$Wrong_Conversion = "Good Conversion! ";  //Writes "Good Conversion! " as its default message if conversion is ran correctly
	
	// $data will be checked against the $conversion_data associative array in the converter.php, if $FirstSelection and $SecondSelection are
	// matched in the same "logical grouping" in the associative array, it will run the its specified "convertNow" function
	if(in_array($FirstSelection, $data["conversion"]) AND in_array($SecondSelection, $data["conversion"])){
	    $conversion_value = $data["convertNow"]($FirstSelection, $SecondSelection, $FirstValue);
		
		// Breaks out of loop if it finds its first good match
		break;	
		
	}else{
		// If it cannot find a good match, run this code by storing "Bad Conversion!"
		$Wrong_Conversion = "Bad Conversion! ";
	}
}
}  //End of code after submit was clicked by user
?>
