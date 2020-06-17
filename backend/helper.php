<?php

function callAPI($method, $url, $data){
   $curl = curl_init();
   switch ($method){
      case "POST":
         curl_setopt($curl, CURLOPT_POST, 1);
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         break;
      case "PUT":
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
         break;
      default:
         if ($data)
            $url = sprintf("%s?%s", $url, http_build_query($data));
   }
   // OPTIONS:
   curl_setopt($curl, CURLOPT_URL, $url);
   curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      'Content-Type: application/json',
   ));
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   // EXECUTE:
   $result = curl_exec($curl);
   if(!$result){die("Connection Failure");}
   curl_close($curl);
   return $result;
}

function gcaptchaVerify($secret, $response, $remoteip = '') {
  $url = "https://www.google.com/recaptcha/api/siteverify";

  $post_data = http_build_query(
      array(
          'secret' => $secret,
          'response' => $response,
          'remoteip' => $remoteip
      )
  );  

  $options=array(

      // If site has SSL then

    'http' =>
      array(
          'method'  => 'POST',
          'header'  => 'Content-type: application/x-www-form-urlencoded',
          'content' => $post_data
      )
  );

  $context = stream_context_create( $options );   

  $result_json = file_get_contents( $url, false, $context );
  $resulting = json_decode($result_json, true);

  return $resulting;
}

?>
