<?php 
$method = $_SERVER['REQUEST_METHOD'];
// Process only when method is POST
if($method == 'POST'){
	$requestBody = file_get_contents('php://input');
	$json = json_decode($requestBody);
	$whatvar = $json->result->parameters->text;
	switch ($whatvar) {
		case 'Facebook':
			$speech = "Facebook is an American online social media and social networking service company";
			break;
		case 'Flipkart':
			$speech = "Flipkart Pvt Ltd. is an Indian electronic commerce company based in Bengaluru, India. 
			Founded by Sachin Bansal and Binny Bansal (no relation) in 2007, the company initially focused on book sales, 
			before expanding into other product categories such as consumer electronics, fashion, and lifestyle products.";
			break;
		case 'Amazon':
			$speech = "Amazon.com, Inc., doing business as Amazon (/ˈæməˌzɒn/), is an American electronic commerce and cloud computing company based in Seattle, 
			Washington that was founded by Jeff Bezos on July 5, 1994.";
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
	echo "Method not allowed.Only post is allowed";
}
?>
