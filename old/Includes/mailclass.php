<?php
	include("phpmailer/class.phpmailer.php");
	include("phpmailer/class.smtp.php");
	include("phpmailer/class.pop3.php");
	include("phpmailer/PHPMailerAutoload.php");

	class mailclass {
		private $objMail;
		function __construct() {
			$this->objMail = new PHPMailer(true);
			$this->objMail->SMTPSecure 	= "tls";
			$this->objMail->SMTPAuth 	= true;
			$this->objMail->Username 	= "factory@seachill.co.uk";
			$this->objMail->Password 	= "Corfac6157";
			$this->objMail->Host 		= "smtp.office365.com";
			$this->objMail->Port 		= "587";

			$this->mail_from 			= "factory@seachill.co.uk";
			$this->mail_to 				= "waynearliss@icelandic.co.uk";

			//	  $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
			//	  $mail->Debugoutput = 'html';
			$this->objMail->IsSMTP();
		}

		public function send($subject,$message) {
			try {
					$body = "<html>" . $message . "</html>";
					$this->objMail->AddAddress($this->mail_to, '');
					$this->objMail->SetFrom($this->mail_from);
					$this->objMail->Subject = $subject;
					$this->objMail->MsgHTML($body);
					$this->objMail->Priority=1;
					$this->objMail->Send();
			} catch (phpmailerException $e) {
				echo $e->errorMessage(); //Pretty error messages from PHPMailer
				echo "<p>Using Username: ".$mail->Username."</p>";
			exit();
			} catch (Exception $e) {
			  echo $e->getMessage(); //Boring error messages from anything else!
				exit();
			}
		}
	}
?>