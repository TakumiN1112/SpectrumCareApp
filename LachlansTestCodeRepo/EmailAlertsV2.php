<html>
<body>
<?php
///READ THIS PART IF YOU HAVE ERRORS
//prevents errors being displayed to users
//error_reporting(0);
//Declare email function with 

//email variables i.e. a list of email groups
//As we can't use a DB, house/centre and service manager aren't achievable
// all email addresses will need to be hard coded until DB becomes available, so group inboxes are advised
//Arrays of emails is also a possibility

//Investigating Service Coordinator
$InVestCoordEmail = "";

//QRM
$QRMEmail = "";

//General Manager Service Delivery
$GenManSerDelEmail = "";

//Strategic Project Manager, Clinical Advisor, Clinical Nurse Specialist - Health and ageing practice Leader

//Human Resource Manager
$HRMEmail = "";

//Financial Manager
$FMEmail = "";

//On Call Staff
$OnCallEmail = "oncallsm@spectrumcare.org.nz";
//Property Manager
$PropManEmail = "";

//BSS

$BSSEmail = "";

//Sanitise inputs based on form, If forms are loaded dynamically probably not needed 


//Decide severity nested Ifs based on selections

$severity = "None";

//ACCIDENT
if($_POST["Event_Type"] == "Accident"){
	//First Level
	if($_POST["Accident_Type"] == "Accident" ||
	   $_POST["Accident_Type"] == "Fall/Trip/Slip" ||
	   $_POST["Accident_Type"] == "Near miss" ||
	   $_POST["Accident_Type"] == "Unknown/Unwitnessed injury"){
			$severity = "Reportable";
	}
	elseif($_POST["Accident_Type"] == "Serious harm injury involved"){
		$severity = "Sentinel";
	}
	//Multilevel
	elseif($_POST["Accident_Type"] == "Vehicle - involving person"){
		if($_POST["Vehicle_accident_treatment"] == "Hospitalisation less than 48 hours"){
			$severity = "Reportable";
		}
		elseif($_POST["Vehicle_accident_treatment"] == "A&E treatment"){
			$severity = "Serious";
		}
		elseif($_POST["Vehicle_accident_treatment"] == "Hospitalisation greater than 48 hours"){
			$severity = "Sentinel";
		}
	}
}


//INCIDENT
if($_POST["Event_Type"] == "Incident"){
//First level decisions	
	if($_POST["What_Happened"] == "Injury as a result of someones behaviour" ||
	   $_POST["What_Happened"] == "Near miss" ||
	   $_POST["What_Happened"] == "Property damage" ||
	   $_POST["What_Happened"] == "Tools/Appliances"){
		$severity = "Reportable";	
	}	
		
	elseif($_POST["What_Happened"] == "Death(unexpected)" ||
	   $_POST["What_Happened"] == "Major event involving multiple community agencies or Spectrum Care departments" ||
	   $_POST["What_Happened"] == "Major systems failure" ){
		$severity = "Sentinel";	
	}
//More than one level decisions	
	
	if($_POST["What_Happened"] == "Assault, Abuse or Neglect" ){
		if($_POST["Treatment"] == "Hospitalisation"){
			//TODO add police involved Checkbox to above if statement, once multi selection checkbox POST is understood
			$severity = "Sentinel";
		}
		else{
			$severity = "Serious";
		}		
	}

	elseif($_POST["What_Happened"] == "Financial"){
		if($_POST["Amount"] == "Less than $20.00"){
			$severity = "Reportable";	
		}
		if($_POST["Amount"] == "More than $20.00"){
			$severity = "Serious";	
		}	
	}
	
	elseif($_POST["What_Happened"] == "Medical"){
		//Medical Problem list
		if($_POST["Medical_Problem"] == "Asthma" ||
		   $_POST["Medical_Problem"] == "Bladder Infection (and indwelling catheter)" ||
		   $_POST["Medical_Problem"] == "Constipation" ||
		   $_POST["Medical_Problem"] == "Diabetes" ||
		   $_POST["Medical_Problem"] == "Influenza" ||
		   $_POST["Medical_Problem"] == "Lower respiratory tract infection" ||
		   $_POST["Medical_Problem"] == "Pain or discomfort" ||
		   $_POST["Medical_Problem"] == "Seizure" ||
		   $_POST["Medical_Problem"] == "Skin and soft tissue infection" ||
		   $_POST["Medical_Problem"] == "Skin and soft tissue infestation" ||
		   $_POST["Medical_Problem"] == "Skin and soft tissue pressure injury" ||
		   $_POST["Medical_Problem"] == "Sunburn" ||
		   $_POST["Medical_Problem"] == "Vomiting/Diarrhoea" ){
			$severity = "Reportable";
		}
		elseif($_POST["Medical_Problem"] == "Choking"){
			if($_POST["Choking_harm"] == "No harm" ||
			   $_POST["Choking_harm"] == "Temporary harm(e.g. scratched throat)"){
				$severity = "Serious";
			}
			elseif($_POST["Choking_harm"] == "Permanent harm(e.g.Brain damage)" ||
				   $_POST["Choking_harm"] == "Death"){
					$severity = "Sentinel";
			}
		}
		elseif($_POST["Medical_Problem"] == "Bowel motion signs of blood present"||
			   $_POST["Medical_Problem"] == "Poisoning and toxic effects"||
			   $_POST["Medical_Problem"] == "Serious harm injury"||
			   $_POST["Medical_Problem"] == "Surgery-acute not booked"||
			   $_POST["Medical_Problem"] == "Unknown/Unwitnessed injury"||
			   $_POST["Medical_Problem"] == "Vomiting and has signs of blood present"){
					$severity = "Serious";		
		}	
	}
	
	if($_POST["What_Happened"] == "Medication"){
		if($_POST["Medical_Problem"] == "Adverse reaction"){
			$severity = "Serious";
		}
		else{// other 4 are all reportable
			$serverity = "Reportable";
		}
	}	
}
//BEHAVIOUR
if($_POST["Event_Type"] == "Behaviour"){
	//Single level
	// note some have multilevel decisions, but the second level are all the same results
	if($_POST["What_Happened"] == "Upset or agitated" ||
	   $_POST["What_Happened"] == "Verbal abuse" ||
	   $_POST["What_Happened"] == "Physical aggression against objects" ||	   
	   $_POST["What_Happened"] == "Inappropriate sexual behaviour(including verbalisation)" ||
	   $_POST["What_Happened"] == "Stripping" ||
 	   $_POST["What_Happened"] == "Near miss or attempt" ||
	   $_POST["What_Happened"] == "Inappropriate urination/defecation" ||
	   $_POST["What_Happened"] == "Insomnia" ||
	   $_POST["What_Happened"] == "Faecal/body fluid smearing" ||
	   $_POST["What_Happened"] == "Inappropriate behaviour" ||
	   $_POST["What_Happened"] == "Food" ||
	   $_POST["What_Happened"] == "Threatening behaviour"){
			$severity = "Reportable";
	}
	elseif($_POST["What_Happened"] == "Disturbance to and from members of public " ||
		   $_POST["What_Happened"] == "Away from setting(absconding)" ||
		   $_POST["What_Happened"] == "Weapon used" ||
		   $_POST["What_Happened"] == "Physical aggression against others"
		   ){
				$severity = "Serious";
	}
	elseif($_POST["What_Happened"] == "Sexual assault - Police involved"){
		$severity = "Sentinel";
	}
	//Second level groups
	if($_POST["What_Happened"] == "Physical aggression against self"){
		if($_POST["What_Happened"] == "Bangs head, hits fists onto objects, throws self(uninjured)"){
			$severity = "Reportable";
		}
		else{
			$severity = "Serious";
		}
	}
}


//Create Message


$message ="";

	foreach( $_POST as $key => $data ){
			$keyReplace = str_replace("_"," ", $key);
			
			$message = $message . $keyReplace . ": " . $data . "<br>";

	}

echo $message;
echo $severity;

//decide on address list and send to each one
// Service Manager, can only do if it's a group inbox

//QRM
if($_POST["Event_Type"] == "Incident"){
	if($_POST["What_Happened"] == "Medical"){
		if($_POST["Medical_Problem"] == "Bladder Infection (and indwelling catheter)" ||
		   $_POST["Medical_Problem"] == "Influenza" ||
		   $_POST["Medical_Problem"] == "Lower respiratory tract infection" ||
		   $_POST["Medical_Problem"] == "Skin and soft tissue infestation" ||
		   $_POST["Medical_Problem"] == "Skin and soft tissue infection" ){
			//send email to QRM
		}
	}
}

//General manager service delivery
if($severity == "Sentinel"){
	//email GMSD
}

//Human Resource Manager
if($_POST["Event_Type"] == "Accident"){
	if($_POST["Accident_Type"] == "Serious harm injury involved"){
		//email HRMEmail
	}
}
elseif($_POST["Event_Type"] == "Incident"){
	if($_POST["What_Happened"] == "Medical"){
		if($_POST["Medical_Problem"] == "Serious harm injury"){
			//email HRMEmail
		}
	}
}
//Finance manager
//Unsure of this, only monetary one is incident financial, but others could involve money
if($_POST["What_Happened"] == "Financial"){
	//Email financial manager
}

// On call staff
if($severity == "Serious" || $severity == "Sentinel"){
	/*if(//date and time is after business hours
	){
		//email OCS
	}*/
}	
//Property Manager
if($_POST["Event_Type"] == "Incident"){
	if($_POST["What_Happened"] == "Property damage" ||
		$_POST["What_Happened"] == "Tools/Appliances" ){
			//email property manager
		
	}
}
	
//BSS	
if($_POST["Event_Type"] == "Behaviour"){
	if($_POST["Staff_response"] == "Physical restraint" || $serverity = "Serious"){//doublecheck naming on this one
		
	}
}
	
?>
</body>
</html> 