<?php

// Initialize an URL to the variable
$url = "https://www.facebook.com/watch/zxscdfvgbhnj";

// Use get_headers() function
$headers = @get_headers($url);
print_r($headers);
// Use condition to check the existence of URL
if(!$headers || strpos( $headers[0], '404')) {
	$status = "URL Doesn't Exist";
}
else {
	$status = "URL Exist";
}

// Display result
echo($status);

?>
