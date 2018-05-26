<html>
<body>
<?php
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
OnCallEmail = "oncallsm@spectrumcare.org.nz";
//Property Manager
PropManEmail = "";

//BSS

BSSEmail = "";

//Sanitise inputs based on form, If forms are loaded dynamically probably not needed 

//Decide severity nested Ifs based on selections


$severity = "None";

//ACCIDENT
if($_POST["Event Type"]) == "Accident"{
	//First Level
	if($_POST["Accident Type"] == "Accident" ||
	   $_POST["Accident Type"] == "Fall/Trip/Slip" ||
	   $_POST["Accident Type"] == "Near miss" ||
	   $_POST["Accident Type"] == "Unknown/Unwitnessed injury"){
			$severity = "Reportable";
	}
	elseif($_POST["Accident Type"] == "Serious harm injury involved"){
		$severity = "Sentinel";
	}
	//Multilevel
	elseif($_POST["Accident Type"] == "Vehicle - involving person"){
		if($_POST["Vehicle accident treatment"] == "Hospitalisation less than 48 hours"){
			$severity = "Reportable";
		}
		elseif($_POST["Vehicle accident treatment"] == "A&E treatment"){
			$severity = "Serious";
		}
		elseif($_POST["Vehicle accident treatment"] == "Hospitalisation greater than 48 hours"){
			$severity = "Sentinel"
		}
	}
}


//INCIDENT
if($_POST["Event Type"]) == "Incident"{
//First level decisions	
	if($_POST["What Happened"] == "Injury as a result of someones behaviour" ||
	   $_POST["What Happened"] == "Near miss" ||
	   $_POST["What Happened"] == "Property damage" ||
	   $_POST["What Happened"] == "Tools/Appliances"){
		$severity = "Reportable";	
	}	
		
	elseif($_POST["What Happened"] == "Death(unexpected)" ||
	   $_POST["What Happened"] == "Major event involving multiple community agencies or Spectrum Care departments" ||
	   $_POST["What Happened"] == "Major systems failure" ){
		$severity = "Sentinel";	
	}
//More than one level decisions	
	
	if($_POST["What Happened"] == "Assault, Abuse or Neglect" 
	){
		if($_POST["Treatment"] == "Hospitalisation"){
			//TODO add police involved Checkbox to above if statement, once multi selection checkbox POST is understood
			$severity = "Sentinel";
		}
		else{
			$severity = "Serious";
		}		
	}

	elseif($_POST["What Happened"] == "Financial"){
		if($_POST["Amount"] == "Less than $20.00"){
			$severity = "Reportable";	
		}
		if($_POST["Amount"] == "More than $20.00"){
			$severity = "Serious";	
		}	
	}
	
	elseif($_POST["What Happened"] == "Medical"){
		//Medical Problem list
		if($_POST["Medical Problem"] == "Asthma" ||
		   $_POST["Medical Problem"] == "Bladder Infection (and indwelling catheter)" ||
		   $_POST["Medical Problem"] == "Constipation" ||
		   $_POST["Medical Problem"] == "Diabetes" ||
		   $_POST["Medical Problem"] == "Influenza" ||
		   $_POST["Medical Problem"] == "Lower respiratory tract infection" ||
		   $_POST["Medical Problem"] == "Pain or discomfort" ||
		   $_POST["Medical Problem"] == "Seizure" ||
		   $_POST["Medical Problem"] == "Skin and soft tissue infection" ||
		   $_POST["Medical Problem"] == "Skin and soft tissue infestation" ||
		   $_POST["Medical Problem"] == "Skin and soft tissue pressure injury" ||
		   $_POST["Medical Problem"] == "Sunburn" ||
		   $_POST["Medical Problem"] == "Vomiting/Diarrhoea" ){
			$severity = "Reportable";
		}
		elseif($_POST["Medical Problem"] == "Choking"){
			if($_POST["Choking harm"] == "No harm" ||
			   $_POST["Choking harm"] == "Temporary harm(e.g. scratched throat)")
				$severity = "Serious";
			}
			elseif($_POST["Choking harm"] == "Permanent harm(e.g.Brain damage)" ||
				   $_POST["Choking harm"] == "Death"){
					$severity = "Sentinel";
			 }
		}
		elseif($_POST["Medical Problem"] == "Bowel motion signs of blood present"||
			   $_POST["Medical Problem"] == "Poisoning and toxic effects"||
			   $_POST["Medical Problem"] == "Serious harm injury"||
			   $_POST["Medical Problem"] == "Surgery-acute not booked"||
			   $_POST["Medical Problem"] == "Unknown/Unwitnessed injury"||
			   $_POST["Medical Problem"] == "Vomiting and has signs of blood present"){
					$severity = "Serious";		
		}	
	}
	
	if($_POST["What Happened"] == "Medication"){
		if($_POST["Medical Problem"] == "Adverse reaction"){
			$severity = "Serious";
		}
		else{// other 4 are all reportable
			$serverity = "Reportable";
		}
	}
	
}
//BEHAVIOUR
if($_POST["Event Type"]) == "Behaviour"{
	//Single level
	// note some have multilevel decisions, but the second level are all the same results
	if($_POST["What Happened"] == "Upset or agitated" ||
	   $_POST["What Happened"] == "Verbal abuse" ||
	   $_POST["What Happened"] == "Physical aggression against objects" ||	   
	   $_POST["What Happened"] == "Inappropriate sexual behaviour(including verbalisation)" ||
	   $_POST["What Happened"] == "Stripping" ||
 	   $_POST["What Happened"] == "Near miss or attempt" ||
	   $_POST["What Happened"] == "Inappropriate urination/defecation" ||
	   $_POST["What Happened"] == "Insomnia" ||
	   $_POST["What Happened"] == "Faecal/body fluid smearing" ||
	   $_POST["What Happened"] == "Inappropriate behaviour" ||
	   $_POST["What Happened"] == "Food" ||
	   $_POST["What Happened"] == "Threatening behaviour"){
			$severity = "Reportable";
	}
	elseif($_POST["What Happened"] == "Disturbance to and from members of public " ||
		   $_POST["What Happened"] == "Away from setting(absconding)" ||
		   $_POST["What Happened"] == "Weapon used" ||
		   $_POST["What Happened"] == "Physical aggression against others"
		   ){
				$severity = "Serious";
	}
	elseif($_POST["What Happened"] == "Sexual assault - Police involved"){
		$severity = "Sentinel";
	}
	//Second level groups
	if($_POST["What Happened"] == "Physical aggression against self"){
		if($_POST["What Happened"] == "Bangs head, hits fists onto objects, throws self(uninjured)"){
			$severity = "Reportable";
		}
		else{
			$severity = "Serious";
		}
	}
}


//Create Message




	foreach( $_POST as $key => $data ){
		
			$message = $key . ": " . $data . "<br>";
			echo $message;


	}



//decide on address list and send to each one
// Service Manager, can only do if it's a group inbox

//QRM
if($_POST["Event Type"] == "Incident"){
	if($_POST["What Happened"] == "Medical"){
		if($_POST["Medical Problem"] == "Bladder Infection (and indwelling catheter)" ||
		   $_POST["Medical Problem"] == "Influenza" ||
		   $_POST["Medical Problem"] == "Lower respiratory tract infection" ||
		   $_POST["Medical Problem"] == "Skin and soft tissue infestation" ||
		   $_POST["Medical Problem"] == "Skin and soft tissue infection" ){
			//send email to QRM
		}
	}
}

//General manager service delivery
if($_severity == "Sentinel"){
	//email GMSD
}

//email Human Resource Manager

if($_POST["Event Type"] == "Accident"){
	if($_POST["Accident Type"] == "Serious harm injury involved"){
		//email HRMEmail
	}
}
elseif($_POST["Event Type"] == "Incident"){
	if($_POST["What Happened"] == "Medical"){
		if($_POST["Medical Problem"] == "Serious harm injury"){
			//email HRMEmail
		}
	}
}
//Finance manager
if($)

// On call staff
if($severity == "Serious" || $severity == "Sentinel"){
	if(//date and time is after business hours){
		//email OCS
	}
}	
//Property Manager
if($_POST["Event Type"] == "Incident"){
	if($_POST["What Happened"] == "Property damage" ||
		$_POST["What Happened"] == "Tools/Appliances" ){
			//email property manager
		
	}
}
	
//BSS	
if($_POST["Event Type"] == "Behaviour"){
	if($_POST["Staff response"] == "Physical restraint" || $serverity = "Serious"){//doublecheck naming on this one
		
	}
}
	
?>
</body>
</html> 