<?php
	//config
	$config 	= include('config.php');

	//globals
	$url 		= 'https://api.bbb.org';
	$fileName 	= 'token.json';

	$maxCount 	= 10;

	//attempting api
	function curl($url, $method, $body, $headers = null) {
		//arguments
		if($method == 'GET') {
			$headers = $body;
			$body = null;
		}

		//(drake voice) start it
		$curl = curl_init($url);

		//set headers
		if($headers)
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

		//post
		if($method == 'POST') {
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $body);
		}

		//misc
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

		//exec
		$response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

		//done
		curl_close($curl);

		//return
		return array(
			'response' => $response,
			'status' => $status
		);
	}

	//get our token, see if it's still good
	$tokenString 	= @file_get_contents($fileName);
	$tokenJson 		= json_decode($tokenString, true);

	//this should never expire but who knows
	//they might be using this in the year 2290
	$expireTime 	= date_create_from_format("D, d M Y G:i:s e", $tokenJson['.expires']);

	if($expireTime)
		$expireTime = date_format($expireTime, "U");

	//if we need a new token
	if(
		$tokenString === false || //file couldn't be read
		$expireTime < (time() + 30) //token is expired
	) {
		//fetch new token
		$response = curl(
			$url . '/token',
			'POST',
			'grant_type=password&username=' . $config['user'] . '&password=' . $config['pass']
		);

		//make sure we got in
		if($response['status'] === 200) {
			$tokenString = $response['response'];

			//json
			$tokenJson = json_decode($tokenString, true);

			//try to write to file
			if(!file_put_contents($fileName, $tokenString)) {
				http_response_code(500); //error
				exit;
			}
		} else {
			http_response_code(403); //unauth
			exit;
		}
	}

	//make sure token is active
	$activeTime = strtotime($tokenJson['.issued']) + 10;

	if($activeTime > time()) {
		http_response_code(202);

		echo $activeTime;

		exit;
	}

	//guaranteed to be valid
	$tokenVal = $tokenJson['access_token'];

	//now to use it
	$id 	= $_GET['id'];
	$state 	= $_GET['state'];
	$count 	= intval($_GET['count']);

	$count 	= max(min(($count ? $count : 0), $maxCount), 1);

	$response = curl(
		$url . "/api/orgs/search?BusinessId=$id&StateProvince=$state&PageSize=$count",
		'GET',
		array("Authorization: Bearer $tokenVal")
	);

	if($response['status'] == 200) {
		http_response_code(200);

		echo $response['response'];

		exit;
	} else {
		//token is bad
		if($response['status'] == 401)
			@unlink($fileName);

		http_response_code(500);

		echo json_encode($response);

		exit;
	}
?>