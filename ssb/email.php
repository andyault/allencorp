<?php
	session_start();

	require_once 'hash_equals.php';

	//config
	$config = include('config.php');

	//check post fields
	function fieldFilled($field) {
		$value = $_POST[$field];

		return (isset($value) && !empty($value));
	}

	//escape input
	function e($str) {
		return htmlspecialchars(trim($str));
	}

	//form security
	$postToken 		= $_POST['csrf-token'];
	$sessionToken 	= $_SESSION['csrf-token'];

	//only process form info if our token matches
	if(!empty($postToken)) {
		if(hash_equals($sessionToken, $postToken)) {
			//make sure fields are filled
			if(fieldFilled('email') && fieldFilled('body')) {
				$fromAddress = e($_POST['email']);

				//make sure email is valid
				if(filter_var($fromAddress, FILTER_VALIDATE_EMAIL)) {
					$body = wordwrap(e($_POST['body']), $config['bodyWidth'], "\r\n");

					$name = $config['defaultName'];

					if(fieldFilled('name'))
						$name = e($_POST['name']);

					//headers
					$headers[] = 'Sender: ' . $config['senderAddress'];
					$headers[] = 'From: ' . $name . ' via Contact Form <' . $fromAddress . '>';
					$headers[] = 'Reply-to: ' . $name . '<' . $fromAddress . '>';
					$headers[] = 'To: Sales Support <' . $config['toAddress'] . '>';
					//$headers[] = 'Cc: aault@allencorp.com';

					//sending
					if(mail(
						$config['toAddress'],
						$config['subject'],
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
