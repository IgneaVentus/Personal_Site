<?php

class MailManager {
	private $author, $subject, $message, $headers;

	public function __construct($author, $subject, $message) {
		$this->subject = $subject;
		$this->message = $message;
		$this->author = $author;
	}

	private function sanitize($data) {
		// Clear data of leading and ending white characters, brackets and semicolons
		return trim($data, " \n\r\t\v\x00()[]{};'\"");
	}

	private function checkAddress($address) {
		// Check mail address to make sure it follows example@domain.com pattern
		return preg_match("/([a-z0-9\!\#\$\%\&\'\*\+\-\/\=\^\_\`\|]+)@([a-z0-9]+)\.([a-z]{2,})/i", $address);
	}

	private function prepareMessage($msg) {
		// Sanitize message contents, replace all CR with CRLF and break lines so there are only 70 characters in one line
		$msg = $this->sanitize($msg);
		$msg = str_replace("\n.", "\r\n.", $msg);
		$msg = wordwrap($msg, 70, "\r\n");
		return $msg;
	}

	public function prepare() {
		// Prepare everything for sending email
		$this->author = $this->sanitize($this->author);
		if (!$this->checkAddress($this->author)) return 0;
		$this->subject = $this->sanitize($this->subject);
		$this->message = $this->prepareMessage($this->message);
		$this->headers = "From: ". $this->author . "\r\n" . "Reply-To: " . $this->author . "\r\n";
		return 1;
	}

	public function send() {
		// Try to send the email, if failed - return error
		try {
			mail("k.p.krupinski@gmail.com", $this->subject, $this->message, $this->headers);
			return 1;
		}
		catch (Exception $e) {
			return ($e);
		}
	}
}

?>