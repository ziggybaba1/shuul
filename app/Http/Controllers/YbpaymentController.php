<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Paystack;
use Cartalyst\Stripe\Stripe;
use App\Http\Controllers\Wepay;
class YbpaymentController extends Controller
{
    public function paystackpay(Request $request)
    {
        $result = array();
//The parameter after verify/ is the transaction reference to be verified
$url = 'https://api.paystack.co/transaction/verify/'.$request->ref;
$ch = \curl_init();
\curl_setopt($ch, CURLOPT_URL, $url);
\curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
\curl_setopt(
  $ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer '.getenv('PAYSTACK_SECRET_KEY').'']
);
$requestn = \curl_exec($ch);
\curl_close($ch);
if ($requestn) {
    $result = \json_decode($requestn, true);
    // print_r($result);
    if($result){
         //something came in
        if($result['status'] == 'success'){
        	$token=\Keygen1::numeric(10)->generate();
        $message=new \App\Ypayment;
        $message->pay_id=$request->ref;
         $message->pay_name=$request->name;
        $message->pay_email=$request->email;
        $message->item=$request->iddd;
        $message->token=$token;
        $message->amount=\App\Yearbook::find($request->iddd)->price;
         $message->method='Paypal';
         $message->status='0';
          $message->pstatus='1';
        $message->save();
        $email=$request->email;$title='Yearbook Download Link';
        $data = [
           'title' => 'Yearbook Download Link',
           'message' => url('').'/yearbook/download/'.$token,
				];  
        try {
    \Mail::send('email.yearbook',["data1"=>$data] , function($messager) use ($email,$title){
$messager->to($email, ''.\App\Provider::first()->name)
        ->subject($title);
   });
    $messagn=\App\Ypayment::find($message->id);
      $messagn->status='1';
    $messagn->save();
return array('status'=>'1','pay'=>$token);
     } catch (\Exception $ex) {
      $messagn=\App\Ypayment::find($message->id);
      $messagn->status='2';
    $messagn->save();
      return array('status'=>'2','pay'=>'');
}
         }else{
         	 return array('status'=>'0','pay'=>'');
         
        }
      
    }else{
      //print_r($result);
      die("Something went wrong while trying to convert the request variable to json. Uncomment the print_r command to see what is in the result variable.");
    }
  }else{
    //var_dump($request);
    die("Something went wrong while executing curl. Uncomment the var_dump line above this line to see what the issue is. Please check your CURL command to make sure everything is ok");
  }
    }
     public function stripepay(Request $request)
    {
  $stripe =Stripe::make(''.getenv('STRIPE_API_SECRET').'');
  $tokenn  = $request->ref;
  $amount=0;
  if(\App\Setting::first()->status==0){
  $charge = $stripe->charges()->create([
    'card' => $tokenn,
    'currency' => \App\Currency::find(\App\Setting::first()->currency)->code,
    'amount'   => \App\Yearbook::find($request->iddd)->price,
    'description' => ' Yearbook Payment',
]);
}
elseif(\App\Setting::first()->status==1){
 $charge = $stripe->charges()->create([
    'card' => $tokenn,
    'currency' => 'USD',
    'amount'   => round((\App\Yearbook::find($request->iddd)->price/\App\Setting::first()->convert)* 100) / 100,
    'description' => ' Yearbook Payment',
]);
}
  if($charge['status'] == 'succeeded') {
$token=\Keygen1::numeric(10)->generate();
        $message=new \App\Ypayment;
        $message->pay_id=$tokenn;
         $message->pay_name=$request->name;
        $message->pay_email=$request->email;
        $message->item=$request->iddd;
        $message->token=$token;
        $message->amount=\App\Yearbook::find($request->iddd)->price;
         $message->method='Stripe';
         $message->status='0';
          $message->pstatus='1';
        $message->save();
        $email=$request->email;$title='Yearbook Download Link';
        $data = [
           'title' => 'Yearbook Download Link',
           'message' => url('').'/yearbook/download/'.$token,
				];  
        try {
    \Mail::send('email.yearbook',["data1"=>$data] , function($messager) use ($email,$title){
$messager->to($email, ''.\App\Provider::first()->name)
        ->subject($title);
   });
    $messagn=\App\Ypayment::find($message->id);
      $messagn->status='1';
    $messagn->save();
 return array('status'=>'1','pay'=>$token);
     } catch (\Exception $ex) {
      $messagn=\App\Ypayment::find($message->id);
      $messagn->status='2';
    $messagn->save();
      return array('status'=>'2','pay'=>'');
}
}
else{
	 return array('status'=>'0','pay'=>'');
}
    }
 public function wepayurl (Request $request){
 	$token=\Keygen1::numeric(10)->generate();
 	  $account_id = getenv('WEPAY_ACCOUNT_ID');
    $client_id = getenv('WEPAY_CLIENT_ID');
    $client_secret = getenv('WEPAY_CLIENT_SECRET');
    $access_token = getenv('WEPAY_ACCESS_TOKEN');
    $amount=0;
    if(\App\Setting::first()->status==0){
    $data = array(
    "account_id" => $account_id,
    "amount" => \App\Yearbook::find($request->iddd)->price,
    "short_description"=>"YearBook payment",
    "type"=>"service",
    "currency"=>\App\Currency::find(\App\Setting::first()->currency)->code,
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/ybpayment/redirect/".$token."/".$request->email]
    
);
  }
  elseif(\App\Setting::first()->status==1){
$data = array(
    "account_id" => $account_id,
    "amount" => round((\App\Yearbook::find($request->iddd)->price/\App\Setting::first()->convert)* 100) / 100,
    "short_description"=>"YearBook payment",
    "type"=>"service",
    "currency"=>"USD",
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/ybpayment/redirect/".$token."/".$request->email]
    );
  }  
$data = json_encode($data);
if(getenv('WEPAY_CLIENT_STATUS')=='production'){
  $ch = curl_init('https://wepayapi.com/v2/checkout/create'); // URL of the call
}
else{
   $ch = curl_init('https://stage.wepayapi.com/v2/checkout/create'); // URL of the call
}
CURL_SETOPT($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"Authorization: Bearer ". $access_token));
curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8');
// execute the api call
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
        $message=new \App\Ypayment;
         $message->pay_name=$request->name;
        $message->pay_email=$request->email;
        $message->item=$request->iddd;
        $message->token=$token;
        $message->amount=\App\Yearbook::find($request->iddd)->price;
         $message->method='Wepay';
         $message->status='0';
          $message->pstatus='0';
        $message->save();
        return $result;
        
}
 public function wepay_confirm(Request $request,$token,$email){
 	 $account_id = getenv('WEPAY_ACCOUNT_ID');
    $client_id = getenv('WEPAY_CLIENT_ID');
    $client_secret = getenv('WEPAY_CLIENT_SECRET');
    $access_token = getenv('WEPAY_ACCESS_TOKEN');
 	$id=$request->checkout_id;
 	 $data = array(
    "account_id" => $account_id,
);
$data = json_encode($data);
if(getenv('WEPAY_CLIENT_STATUS')=='production'){
  $ch = curl_init('https://wepayapi.com/v2/checkout/find'); // URL of the call
}
else{
   $ch = curl_init('https://stage.wepayapi.com/v2/checkout/find'); // URL of the call
}
CURL_SETOPT($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',"Authorization: Bearer ". $access_token));
curl_setopt($ch, CURLOPT_POSTFIELDS,  $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1a2pre) Gecko/2008073000 Shredder/3.0a2pre ThunderBrowse/3.2.1.8');
// execute the api call
$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);
$array = json_decode( $result, true );
foreach($array as $item) { //foreach element in $arr
	if($item['checkout_id']==$id){
if($item['state']=='authorized'||$item['state']=='released'){
	$title='Yearbook Download Link';
        $data = [
           'title' => 'Yearbook Download Link',
           'message' => url('').'/yearbook/download/'.$token,
				];  
        try {
    \Mail::send('email.yearbook',["data1"=>$data] , function($message) use ($email,$title){
$message->to($email, ''.\App\Provider::first()->name)
        ->subject($title);
   });
    if(count(\App\Ypayment::where('token',$token)->get())>0){
    	 $message=\App\Ypayment::where('token',$token)->first();
    	  $message->pay_id=$id;
    	   $message->pstatus='1';
      $message->status='1';
    $message->save();
    }
 return back()->with(['message' => 'Download Link Has been Sent to your mail, your payment Receipt number is '.$token]);
     } catch (\Exception $ex) {
     if(count(\App\Ypayment::where('token',$token)->get())>0){
    	 $message=\App\Ypayment::where('token',$token)->first();
    	  $message->pay_id=$id;
      $message->status='2';
    $message->save();
    return back()->with(['error' => 'Error sending Download Link to your mail, your payment Receipt number is '.$token]);
    }
 }
			}
		}  
	}
 } 

 public function pay_test(Request $request){
 	 $stripe =Stripe::make(''.getenv('STRIPE_API_SECRET').'');
  $token  = $request->ref;
  
 $email=\App\Student::find($request->stud)->user_id.'@'.\App\Student::find($request->stud)->gname.'.'.\App\Student::find($request->stud)->fname;
$customer=new \App\Sbill;
$customer->customer_id=$token;
$customer->user_id=\App\Student::find($request->stud)->data_id;
$customer->save();
 $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => \App\Currency::find(\App\Setting::first()->currency)->code,
    'amount'   => '2000',
    'description' => \Auth::user()->name.' Book Payment',
]);
  if($charge['status'] == 'succeeded') {
  	return 'success';
  }
 	
 }
   public function paypalpay (Request $request)
   {
  $paypal = new PaypalController;
   // Get payment info from URL
    $paymentID = $request->paymentID;
    $token = $request->token;
    $payerID =$request->payerID;
      $amount=0;
 $paymentCheck = $paypal->validatr($paymentID, $token, $payerID);
 if($paymentCheck && $paymentCheck->state == 'approved'){
$token=\Keygen1::numeric(10)->generate();
        $message=new \App\Ypayment;
        $message->pay_id=$paymentID;
         $message->pay_name=$request->name;
        $message->pay_email=$request->email;
        $message->item=$request->iddd;
        $message->token=$token;
        $message->amount=\App\Yearbook::find($request->iddd)->price;
         $message->method='Paypal';
         $message->status='0';
         $message->pstatus='1';
        $message->save();
        $email=$request->email;$title='Yearbook Download Link';
        $data = [
           'title' => 'Yearbook Download Link',
           'message' => url('').'/yearbook/download/'.$token,
				];  
        try {
    \Mail::send('email.yearbook',["data1"=>$data] , function($messager) use ($email,$title){
$messager->to($email, ''.\App\Provider::first()->name)
        ->subject($title);
   });
    $messagn=\App\Ypayment::find($message->id);
      $messagn->status='1';
    $messagn->save();
 return array('status'=>'1','pay'=>$token);
     } catch (\Exception $ex) {
      $messagn=\App\Ypayment::find($message->id);
      $messagn->status='2';
    $messagn->save();
     return array('status'=>'2','pay'=>'');
}
}
else{
	 return array('status'=>'1','pay'=>'');
		}
	} 
}
