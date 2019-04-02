<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
   public function bulk_message ($sender,$mobile,$message) {
 $url = 'https://bulksms.vsms.net/eapi/submission/send_sms/2/2.0?username='.\App\Gateway::first()->bulk_user.'&password='.\App\Gateway::first()->bulk_pass.'&sender='.$sender.'&message='.$message.'&msisdn='. $mobile;
try{
	$ch = \curl_init();
  \curl_setopt($ch,CURLOPT_URL, $url); 
\curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
\curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
\curl_setopt($ch, CURLOPT_HEADER, 0); 
$resp = \curl_exec($ch); 
\curl_close($ch);

return $resp;
} catch(\Exception $e){
    //do something with the exception you caught
}
}
public function multi_message ($sender,$mobile,$message){
$url = 'http://www.MultiTexter.com/tools/geturl/Sms.php?username='.\App\Gateway::first()->multi_user.'&password='.\App\Gateway::first()->multi_pass.'&sender='.$sender.'&message='.$message .'&flash=0&recipients='. $mobile.'&forcednd=1';
try{
	$ch = \curl_init();
  \curl_setopt($ch,CURLOPT_URL, $url); 
\curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
\curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
\curl_setopt($ch, CURLOPT_HEADER, 0); 
$resp = \curl_exec($ch); 
\curl_close($ch);

return $resp;
} catch(\Exception $e){
    //do something with the exception you caught
}
	} 

public function nexmo_message($sender,$mobile,$message){
  try{
	$ch = \curl_init();
\curl_setopt($ch, CURLOPT_URL, 'https://rest.nexmo.com/sms/json');
\curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
\curl_setopt($ch, CURLOPT_POSTFIELDS, "from=".$sender."&text=".$message."&to=".$mobile."&api_key=".\App\Gateway::first()->nexmo_key."&api_secret=".\App\Gateway::first()->nexmo_sec);
\curl_setopt($ch, CURLOPT_POST, 1);

$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = \curl_exec($ch);
if (\curl_errno($ch)) {
    echo 'Error:' . \curl_error($ch);
}
return $result;
\curl_close ($ch);
} catch(\Exception $e){
    //do something with the exception you caught
}
}
public function before ($thisn, $inthat)
    {
        return \substr($inthat, 0, \strpos($inthat, $thisn));
    }
}
