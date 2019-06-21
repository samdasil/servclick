<?php 

	class Email {

		const USERNAME  = "contato@servclick.com.br";
		const PASSWORD  = "gfa7xh2yb";
		const NAME_FROM = "Informativo ServClick";

		private $mail;

		public function __construct($email, $nome, $assunto, $msg) {

			//Create a new PHPEmail instance
			$this->mail = new PHPMailer();

			//Tell PHPEmail to use SMTP
			$this->mail->isSMTP();

			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$this->mail->SMTPDebug = 0;

			//Set the hostname of the mail server
			$this->mail->Host = 'a2plcpnl0814.prod.iad2.secureserver.net';
			// use
			// $this->mail->Host = gethostbyname('smtp.gmail.com');
			// if your network does not support SMTP over IPv6

			//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
			$this->mail->Port = 465;

			//Set the encryption system to use - ssl (deprecated) or tls
			$this->mail->SMTPSecure = 'tls';

			//Whether to use SMTP authentication
			$this->mail->SMTPAuth = true;

			//Username to use for SMTP authentication - use full email address for gmail
			$this->mail->Username = Email::USERNAME;

			//Password to use for SMTP authentication
			$this->mail->Password = Email::PASSWORD;

			//Set who the message is to be sent from
			$this->mail->setFrom(Email::USERNAME, Email::NAME_FROM);

			//Set an alternative reply-to address
			//$this->mail->addReplyTo('replyto@example.com', 'First Last');

			//Set who the message is to be sent to
			$this->mail->addAddress($email, $nome);

			//Set the subject line
			$this->mail->Subject = $assunto;

			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$this->mail->msgHTML($msg);

			//Replace the plain text body with one created manually
			$this->mail->AltBody = 'This is a plain-text message body';

			//Attach an image file
			//$this->mail->addAttachment('images/phpEmail_mini.png');

			
			//send the message, check for errors
			/*
			if (!$mail->send()) {
			    echo "Email Error: " . $mail->ErrorInfo;
			} else {
			    echo "Message sent!";
			    //Section 2: IMAP
			    //Uncomment these to save your message in the 'Sent Mail' folder.
			    #if (save_mail($mail)) {
			    #    echo "Message saved!";
			    #}
			}*/

			//Section 2: IMAP
			//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
			//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
			//You can use imap_getmailboxes($imapStream, '/imap/ssl') to get a list of available folders or labels, this can
			//be useful if you are trying to get this working on a non-Gmail IMAP server.
			function save_mail($mail)
			{
			    //You can change 'Sent Mail' to any other folder or tag
			    $path = "{a2plcpnl0814.prod.iad2.secureserver.net:993/imap/ssl}[ServClick]/Sent Mail";

			    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
			    $imapStream = imap_open($path, $mail->Username, $mail->Password);

			    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
			    imap_close($imapStream);

			    return $result;
			}


		}

		public function send() {

			return $this->mail->send();

		}

	}

?>