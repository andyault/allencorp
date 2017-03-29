<?php
	//config
	$config = include('config.php');

	//config vars
	$toAddress 		= $config['toAddress'];
	$senderAddress 	= $config['senderAddress'];
	$defaultName 	= $config['defaultName'];
	$subject 		= $config['subject'];
	$bodyWidth 		= $config['bodyWidth'];

	//check post fields
	function fieldFilled($field) {
		$value = $_POST[$field];

		return (isset($value) && !empty($value));
	}

	//form security
	require_once 'hash_equals.php';

	session_start();

	$csrfField = 'csrf-token';

	$postToken 		= $_POST[$csrfField];
	$sessionToken 	= $_SESSION[$csrfField];

	//only process form info if our token matches
	if(!empty($postToken)) {
		if(hash_equals($sessionToken, $postToken)) {
			//make sure fields are filled
			if(fieldFilled('email') && fieldFilled('body')) {
				$fromAddress = $_POST['email'];

				//make sure email is valid
				if(filter_var($fromAddress, FILTER_VALIDATE_EMAIL)) {
					$body = wordwrap($_POST['body'], $bodyWidth, "\r\n");

					$name = $defaultName;

					if(fieldFilled('name'))
						$name = $_POST['name'];

					//escape variables
					$senderAddress 	= htmlspecialchars($senderAddress);
					$fromAddress 	= htmlspecialchars($fromAddress);
					$toAddress 		= htmlspecialchars($toAddress);
					$name 			= htmlspecialchars($name);
					$body 			= htmlspecialchars($body);

					//headers
					$headers[] = 'Sender: ' . $senderAddress;
					$headers[] = 'From: ' . $name . ' via Contact Form <' . $fromAddress . '>';
					$headers[] = 'Reply-to: ' . $name . '<' . $fromAddress . '>';
					$headers[] = 'To: Sales Support <' . $toAddress . '>';
					//$headers[] = 'Cc: aault@allencorp.com';

					//sending
					if(mail(
						$toAddress,
						$subject,
						$body,
						implode("\r\n", $headers)
					)) {
						//done :)
						http_response_code(200); //OK

						exit;
					}

					http_response_code(500); //internal error

					exit;
				}
			}

			http_response_code(400); //bad request

			exit;
		}
	}

	http_response_code(403); //forbidden

?>
