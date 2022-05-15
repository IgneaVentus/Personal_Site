<?php
	require ("./controllers/MailManager.php");

	if (isset($_POST["auth"]) && isset($_POST["subj"]) && isset($_POST["msg"])) {
		$email = new MailManager($_POST["auth"], $_POST["subj"], $_POST["msg"]);
		if($email->prepare() == 0) echo "This email address does not follow example@address.com pattern";
		else {
			$response = $email->send();
			if ($response == 1) echo "Email successfully sent!";
			else echo "Fatal error: " . $response->message;
		}
	}
	else echo "Error - not every data set.";
?>