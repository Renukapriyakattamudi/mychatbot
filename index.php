<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$whatvar = $json->result->parameters->text;
	switch ($text) {
		case 'Facebook':
			$speech = "Facebook is an American online social media and social networking service company";
			break;
		case 'Flipkart':
			$speech = "Bye, good night";
			break;
		case 'Amazon':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}
	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "creationportal";
	echo json_encode($response);
}
else
{
	echo "Method not allowed";
}
?>
