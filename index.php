<?php
//Requires config.php file
require_once($_SERVER["DOCUMENT_ROOT"] . "/Converter/config.php");

// Include the submit.php for data processing
include(ROOT_PATH . "submit.php");
?>

<!--START OF HTML CODE -->
<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8">
		
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container">
			
		    <div class="form-1">
		    	
		        <form method="post" name="converter">
		        	
		 		    <label for="sel-1">Convert From:</label>
		 		    
		            <select name="sel-1" id="sel-1">
		 		        <option value="U.S.">United States</option>
		 				<option value="HK">Hong Kong</option>
		 				<option value="TW">Taiwan</option>
		 				<option value="CN">China</option>
		 				<option value="Fahrenheit">Fahrenheit</option>
		 				<option value="Celsius">Celsius</option>
		 				<option value="Pound">Pound</option>
		 				<option value="Kilogram">Kilogram</option>
		 				<option value="Gram">Gram</option>
		 				<option value="Ounce">Ounce</option>
		 			</select>
		 	
		 			<label for="conv-1">Type in a value:</label>
	
		 			<input type="text" id="conv-1" name="conv-1" placeholder="100">
		 	
		 			<label for="sel-2">Convert To:</label>
		 	
		 			<select name="sel-2" id="sel-2">
				 		<option value="U.S.">United States</option>
				 		<option value="HK">Hong Kong</option>
				 		<option value="TW">Taiwan</option>
				 		<option value="CN">China</option>
				 		<option value="Fahrenheit">Fahrenheit</option>
				 		<option value="Celsius">Celsius</option>
				 		<option value="Pound">Pound</option>
		 				<option value="Kilogram">Kilogram</option>
		 				<option value="Gram">Gram</option>
		 				<option value="Ounce">Ounce</option>
		 			</select>
		 	
		 			<input type="submit" name="submit" id="submit" value="Convert Now">
		 			
		 		</form>
		 		<p class="warning"> <?php if ($error_message != ""){ echo $error_message . " :("; }else{ echo $Wrong_Conversion; echo "Converted Value: " . $conversion_value; }?></p>
			</div>
		</div>
	</body>
</html>
