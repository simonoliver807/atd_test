<?php	

	if(isset($_POST['title']) && $_POST['title'] != '' ) {
		$title = preg_replace('/\s+/', '_', $_POST['title']);
		$url='https://atd.atdtravel.com/api/products?title=' . $title;		
	}
	else{
		$url='https://atd.atdtravel.com/api/products';
	}


	$username='dev-interview';
	$password='asdf1234';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	$output = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	echo json_encode( $output );
?>