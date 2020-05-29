<?php

if (isset($_GET['islem'])) {
	
	if ($_POST['from_name']<>'' && $_POST['message']<>'' && $_POST['company']<>'' && $_POST['reply_to']<>'') {

    require_once("class.phpmailer.php");

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "polirons.com";
    $mail->SMTPAuth = true;
    $mail->Username = "mail.sender@polirons.com";
    $mail->Password = "jdzszanqivqonkxa";
    $mail->From = "mail.sender@polirons.com";
    $mail->Fromname = "Polirons Web Mail";
    $mail->AddAddress($_POST['reply_to'], $_POST['from_name']);
    $mail->AddReplyTo('info@polirons.com', 'Polirons');
    $mail->Subject = $_POST['company'] . ' ' . $_POST['konu'] . ' ' . $_POST['eposta'];
    $mail->Body = $_POST['mesaj'];

    if(!$mail->Send())
    {
      http_response_code(500);
      echo $mail->ErrorInfo;
      exit;
    } else 
    {
      http_response_code(200);
      echo "E-Posta Başarıyla Gönderildi";
      exit;
    }
	} else {
     http_response_code(500);
		 echo "Tüm alanların doldurulması zorunludur";
	}
}
?>