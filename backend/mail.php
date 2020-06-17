<?php

if (isset($_POST['from_name']) && isset($_POST['message']) && isset($_POST['company']) && isset($_POST['reply_to']) && isset($_POST['recaptcha_response'])) {
  
  require("conf.php");
  require("class.phpmailer.php");
  require("helper.php");

  $reCaptchaSecret = getenv('GRECAPTCHA_SECRET');

  $reCaptchaResponse = gcaptchaVerify($reCaptchaSecret, $_POST['recaptcha_response'], $_SERVER['REMOTE_ADDR']);

  if ($reCaptchaResponse['success']) {
    $fromName = $_POST['from_name'];
    $message = $_POST['message'];
    $company = $_POST['company'];
    $replyTo = $_POST['reply_to'];
    $mailTo = getenv('MAIL_TO');
    $userName = getenv('MAIL_USER');
    $password = getenv('MAIL_PASSWORD');
    $mailHost = getenv('MAIL_HOST');
    $mailSmtpPort = getenv('MAIL_SMTP_PORT');
  
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(true);
    $mail->SetLanguage("tr", "phpmailer/language");
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth = true;
    $mail->CharSet  ="utf-8";
    $mail->SMTPSecure = 'tls';
    $mail->Mailer = 'smtp';
    $mail->Host = $mailHost;
    $mail->Port = $mailSmtpPort;
    $mail->Username = $userName;
    $mail->Password = $password;
  
    $mail->SetFrom($userName, 'Polirons.com Mail');
    $mail->AddReplyTo($replyTo, $fromName);
    $mail->AddAddress($mailTo);
    $mail->Subject = "A new e-mail has been sent by $fromName of $company via polirons.com Web Site";
    $mail->Body = $message;
  
    if(!$mail->Send()) {
      http_response_code(401);
      echo $mail->ErrorInfo;
      exit;
    } else {
      http_response_code(200);
      var_dump("E-Posta barıyla gönderild");
      exit;
    }
  } else {
    http_response_code(500);
    var_dump("Lütfen robot olmaiginiz� onaylayın");
  }
} else {
  http_response_code(402);
  var_dump("Tüm alanların doldurulması zorunludur");
}
 
?>
