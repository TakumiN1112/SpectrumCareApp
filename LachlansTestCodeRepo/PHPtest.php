<html>
<body>
<!--email variables i.e. a list of email groups-->


<!--input comes in as POST -->

<!--Sanitise inputs based on form, If forms are loaded dynamically probably not needed -->

<!--Decide severity nested Ifs based on selections-->


<!--Create Message -->



<?php
$severity = "NULL";
	foreach( $_POST as $key => $data ){
		if($data == "on"){
			$data = "yes";
		}
	
		$message = $key . ": " . $data . "<br>";
		
		echo $message;


	}
	

	echo $severity;
	
	$message = "I wonder if this works";
	
	//mail("LachlanSneddon7@gmail.com","Subject", $message, "From: admin@localhost")

?>


<!-- decide on address list and send to each one -->
</body>
</html> 