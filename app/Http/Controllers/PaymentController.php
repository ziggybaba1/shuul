<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Paystack;
use Cartalyst\Stripe\Stripe;
use App\Http\Controllers\Wepay;
class PaymentController extends Controller
{
     public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
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
        $message=new \App\Payment;
        $message->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
         $message->class=\App\Student::where('data_id',\Auth::user()->id)->first()->class;
        $message->amount=$request->amount;
         $message->session=\App\Session::latest()->first()->session;
         $message->term=\App\Session::latest()->first()->terms;
        $message->type='2';
        $message->status='1';
         $message->method='Paystack';
        $message->save();
        $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
        'status'=>'1',
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'amount'=>\App\Bookassign::where('id',$input['reqid'][$i])->first()->price,
        'student_id'=>\App\Student::where('data_id',\Auth::user()->id)->first()->id,
        'class'=>\App\Student::where('data_id',\Auth::user()->id)->first()->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('payitems')->insert($key);
      }
        return '1';
         }else{
         	 return '0';
         
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
  $token  = $request->ref;
  $amount=0;
  $input=$request->all();
   for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
    $amount+=\App\Bookassign::where('id',$input['reqid'][$i])->first()->price;
}
 $email=\Auth::user()->id_user.'@'.\App\Student::where('data_id',\Auth::user()->id)->first()->gname.'.'.\App\Student::where('data_id',\Auth::user()->id)->first()->fname;
$customer=new \App\Sbill;
$customer->customer_id=$token;
$customer->user_id=\Auth::user()->id;
$customer->save();
if(\App\Setting::first()->status==0){
  $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => \App\Currency::find(\App\Setting::first()->currency)->code,
    'amount'   => $amount,
    'description' => \Auth::user()->name.' Book Payment',
]);
}
elseif(\App\Setting::first()->status==1){
 $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => 'USD',
    'amount'   => round(($amount/\App\Setting::first()->convert)* 100) / 100,
    'description' => \Auth::user()->name.' Book Payment',
]);
}

 
  if($charge['status'] == 'succeeded') {
 $message=new \App\Payment;
        $message->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
         $message->class=\App\Student::where('data_id',\Auth::user()->id)->first()->class;
        $message->amount=$request->amount;
        $message->type='2';
        $message->method='Stripe';
         $message->session=\App\Session::latest()->first()->session;
         $message->term=\App\Session::latest()->first()->terms;
        $message->receipt_id=$request->ref;
        $message->status='1';
        $message->save();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'amount'=>\App\Bookassign::where('id',$input['reqid'][$i])->first()->price,
        'status'=>'1',
        'student_id'=>\App\Student::where('data_id',\Auth::user()->id)->first()->id,
        'class'=>\App\Student::where('data_id',\Auth::user()->id)->first()->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('payitems')->insert($key);
      }
      return '1';
}
else{
	 return '0';
}
    }
 public function wepayurl (Request $request){
 	  $account_id = getenv('WEPAY_ACCOUNT_ID');
    $client_id = getenv('WEPAY_CLIENT_ID');
    $client_secret = getenv('WEPAY_CLIENT_SECRET');
    $access_token = getenv('WEPAY_ACCESS_TOKEN');
    $amount=0;
    $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
    $amount+=\App\Bookassign::where('id',$input['reqid'][$i])->first()->price;
}
if(\App\Setting::first()->status==0){
    $data = array(
    "account_id" => $account_id,
    "amount" => $amount,
    "short_description"=>"Book payment",
    "type"=>"service",
    "currency"=>\App\Currency::find(\App\Setting::first()->currency)->code,
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/payment/redirect"]
    
);
  }
  elseif(\App\Setting::first()->status==1){
$data = array(
    "account_id" => $account_id,
    "amount" => round(($amount/\App\Setting::first()->convert)* 100) / 100,
    "short_description"=>"Book payment",
    "type"=>"service",
    "currency"=>"USD",
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/payment/redirect"]
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
if(count(\App\Payment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('status','0')->get())==0){
 	$message=new \App\Payment;
 }  
elseif (count(\App\Payment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('status','0')->get())>0) {
	if (count(\App\PayItem::where('item_id',$input['reqid'][0])->get())==0) {
   $message=new \App\Payment;
}
if(count(\App\PayItem::where('item_id',$input['reqid'][0])->get())>0){
$message=\App\Payment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('status','0')->first();
}
}
        $message->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
        $message->class=\App\Student::where('data_id',\Auth::user()->id)->first()->class;
        $message->amount=$request->amount;
        $message->type='2';
         $message->session=\App\Session::latest()->first()->session;
         $message->term=\App\Session::latest()->first()->terms;
        $message->method='Wepay';
        $message->status='0';
        $message->save();
        
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'amount'=>\App\Bookassign::where('id',$input['reqid'][$i])->first()->price,
         'status'=>'0',
        'student_id'=>\App\Student::where('data_id',\Auth::user()->id)->first()->id,
        'class'=>\App\Student::where('data_id',\Auth::user()->id)->first()->class,
            ];
         $dataSet1[] = $data1;
      if(count(\App\Payitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->get())>0){
      	\App\Payitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->delete();
      }
      }

      foreach ($dataSet1 as $key ) {
        \DB::table('payitems')->insert($key);
      }
      return $result;
 }
 public function wepay_confirm(Request $request){
 	 $account_id = getenv('WEPAY_ACCOUNT_ID');
    $client_id = getenv('WEPAY_CLIENT_ID');
    $client_secret = getenv('WEPAY_CLIENT_SECRET');
    $access_token = getenv('WEPAY_ACCESS_TOKEN');
 	$id=$request->checkout_id;
 	 $data = array(
    "account_id" => $account_id,
);
$data = json_encode($data);
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
	$message=\App\Payment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('status','0')->first();
	 $message->status='1';
	 $message->receipt_id=$id;
	 $message->save();
	 \App\Payitem::where('pay_id',$message->id)->where('status','0')->update(['status'=>'1']);
	 return back()->with(['message' => "".__('admin.succ_update')]);
			}
		}  
	}
 } 

 public function pay_test(Request $request){
 	 $stripe =Stripe::make(''.getenv('STRIPE_API_SECRET').'');
  $token  = $request->ref;
  
 $email=\Auth::user()->id_user.'@'.\App\Student::where('data_id',\Auth::user()->id)->first()->gname.'.'.\App\Student::where('data_id',\Auth::user()->id)->first()->fname;
$customer=new \App\Sbill;
$customer->customer_id=$token;
$customer->user_id=\Auth::user()->id;
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
    $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
    $amount+=\App\Bookassign::where('id',$input['reqid'][$i])->first()->price;
}
 $paymentCheck = $paypal->validatr($paymentID, $token, $payerID);
 if($paymentCheck && $paymentCheck->state == 'approved'){
 if(count(\App\Payment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('status','1')->get())==0){
 	$message=new \App\Payment;
 }  
elseif (count(\App\Payment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('class',\App\Student::where('data_id',\Auth::user()->id)->first()->class)->where('status','1')->get())>0) {
$message=new \App\Payment;
}
        $message->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
        $message->class=\App\Student::where('data_id',\Auth::user()->id)->first()->class;
        $message->amount=$request->amount;
        $message->type='2';
        $message->receipt_id=$paymentID;
         $message->session=\App\Session::latest()->first()->session;
         $message->term=\App\Session::latest()->first()->terms;
        $message->method='Paypal';
        $message->status='1';
        $message->save();
        
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
        'status'=>'1',
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'amount'=>\App\Bookassign::where('id',$input['reqid'][$i])->first()->price,
        'student_id'=>\App\Student::where('data_id',\Auth::user()->id)->first()->id,
        'class'=>\App\Student::where('data_id',\Auth::user()->id)->first()->class,
            ];
         $dataSet1[] = $data1;
      if(count(\App\Payitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->get())>0){
      	\App\Payitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->delete();
      }
      }

      foreach ($dataSet1 as $key ) {
        \DB::table('payitems')->insert($key);
      }
 return '1';
}
else{
	 return '0';
		}
	}
}
