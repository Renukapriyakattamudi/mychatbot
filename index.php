<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$whatvar = $json->result->parameters->whatvar;
	switch ($whatvar) {
		case 'Aadhar':
			$speech = "go to Customer Service > Service Requests > Bank Accounts > Update your Aadhaar number with Bank account  > Enter the required details and submit it.";
			break;
		case 'ChangeAadhar':
			$speech = "to chnage aadhar, go to Customer Service > Service Requests > Bank Accounts > Update your Aadhaar number with Bank account  > Enter the required details and submit it.";
			break;
		case 'CheckAadhar':
			$speech = "go to Bank Accounts > My Aadhaar number";
			break;
		case 'PPF':
			$speech = "Automatic linking will be done if the Public Provident Fund (PPF) account is opened under the same Customer ID. However, if the PPF account is opened with a different User ID, the linking request should be made at any ICICI Bank branch by submitting the physical form.";
			break;
		case 'openppf':
			$speech = "go to My Accounts > PPF Accounts > Click on Open Now> Enter the required details and submit.";
			break;		
		case 'matureppf':
			$speech = "A Public Provident Fund (PPF) account gets matured after the completion of 15 years from the end of the year in which the account was opened.";
			break;	
		case 'moneytransfer':
			$speech = "Ago to Payments & Transfer > Fund Transfer > Your linked ICICI Bank account / Pockets wallet";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "mychatbot";
	echo json_encode($response);
}
else
{
	echo "Method not allowed.Only post is allowed";
}
?>
