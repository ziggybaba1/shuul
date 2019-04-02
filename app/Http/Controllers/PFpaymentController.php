<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Paystack;
use Cartalyst\Stripe\Stripe;
use App\Http\Controllers\Wepay;

class PFpaymentController extends Controller
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
        $message=new \App\Fpayment;
        $message->student_id=$request->stud;
         $message->class=\App\Student::find($request->stud)->class;
        $message->amount=$request->amount;
        $message->type='2';
        $message->status='1';
         $message->method='Paystack';
         $message->term=\App\Session::latest()->first()->terms;
        $message->save();
        $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
        'status'=>'1',
         'amount'=>\App\Fee::where('id',$input['reqid'][$i])->first()->price,
        'term'=>\App\Session::latest()->first()->terms,
        'student_id'=>$request->stud,
        'class'=>\App\Student::find($request->stud)->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
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
    $amount+=\App\Fee::where('id',$input['reqid'][$i])->first()->price;
}
 $email=\Auth::user()->id_user.'@'.\App\Student::find($request->stud)->gname.'.'.\App\Student::find($request->stud)->fname;
$customer=new \App\Sbill;
$customer->customer_id=$token;
$customer->user_id=\App\Student::find($request->stud)->user_id;
$customer->save();
 $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => \App\Currency::find(\App\Setting::first()->currency)->code,
    'amount'   => $amount,
    'description' =>\App\User::find(\App\Student::find($request->stud)->data_id)->name.' School Fee Payment',
]);
  if($charge['status'] == 'succeeded') {
 $message=new \App\Fpayment;
        $message->student_id=$request->stud;
         $message->class=\App\Student::find($request->stud)->class;
        $message->amount=$amount;
        $message->type='2';
        $message->method='Stripe';
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
        'amount'=>\App\Fee::where('id',$input['reqid'][$i])->first()->price,
        'status'=>'1',
        'term'=> \App\Session::latest()->first()->terms,
        'student_id'=>$request->stud,
        'class'=>\App\Student::find($request->stud)->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
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
    $data = array(
    "account_id" => $account_id,
    "amount" => $amount,
    "short_description"=>"School Fee payment",
    "type"=>"service",
    "currency"=>"USD",
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/payment/redirect"]
    
);
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
if(count(\App\Payment::where('student_id',$request->stud)->where('class',\App\Student::find($request->stud)->class)->where('status','0')->get())==0){
 	$message=new \App\Payment;
 }  
elseif (count(\App\Fpayment::where('student_id',$request->stud)->where('class',\App\Student::find($request->stud)->class)->where('status','0')->get())>0) {
	if (count(\App\FpayItem::where('item_id',$input['reqid'][0])->get())==0) {
   $message=new \App\Fpayment;
}
if(count(\App\FpayItem::where('item_id',$input['reqid'][0])->get())>0){
$message=\App\Fpayment::where('student_id',$request->stud)->where('class',\App\Student::find($request->stud)->class)->where('status','0')->first();
}
}
        $message->student_id=$request->stud;
         $message->class=\App\Student::find($request->stud)->class;
        $message->amount=$request->amount;
        $message->type='2';
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
         'amount'=>\App\Fee::where('id',$input['reqid'][$i])->first()->price,
         'status'=>'0',
         'term'=>\App\Session::latest()->first()->terms,
        'student_id'=>$request->stud,
        'class'=>\App\Student::find($request->stud)->class,
            ];
         $dataSet1[] = $data1;
      if(count(\App\Fpayitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->get())>0){
      	\App\Payitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->delete();
      }
      }

      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
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
	$message=\App\Payment::where('student_id',$request->stud)->where('class',\App\Student::find($request->stud)->class)->where('status','0')->first();
	 $message->status='1';
	 $message->receipt_id=$id;
	 $message->save();
	 \App\Payitem::where('pay_id',$message->id)->where('status','0')->update(['status'=>'1']);
	 return back()->with(['message' => 'Payment of School Fee was Successfull, your payment Receipt number is '.$id]);
			}
		}  
	}
 } 

 public function pay_test(Request $request){
 	 $stripe =Stripe::make(''.getenv('STRIPE_API_SECRET').'');
  $token  = $request->ref;
  
 $email=\App\Student::find($request->stud)->id_user.'@'.\App\Student::find($request->stud)->gname.'.'.\App\Student::find($request->stud)->fname;
$customer=new \App\Sbill;
$customer->customer_id=$token;
$customer->user_id=\App\Student::find($request->stud)->id_user;
$customer->save();
 $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => \App\Currency::find(\App\Setting::first()->currency)->code,
    'amount'   => '2000',
    'description' => \App\User::find(\App\Student::find($request->stud)->id_user)->name.' School Fee Payment',
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
    $amount+=\App\Fee::where('id',$input['reqid'][$i])->first()->price;
}
 $paymentCheck = $paypal->validatr($paymentID, $token, $payerID);
 if($paymentCheck && $paymentCheck->state == 'approved'){
 if(count(\App\Fpayment::where('student_id',$request->stud)->where('class',\App\Student::find($request->stud)->class)->where('status','1')->get())==0){
 	$message=new \App\Fpayment;
 }  
elseif (count(\App\Fpayment::where('student_id',$request->stud)->where('class',\App\Student::find($request->stud)->class)->where('status','1')->get())>0) {
$message=new \App\Fpayment;
}
        $message->student_id=$request->stud;
        $message->class=\App\Student::find($request->stud)->class;
        $message->amount=$amount;
        $message->type='2';
        $message->term=\App\Session::latest()->first()->terms;
        $message->receipt_id=$paymentID;
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
         'amount'=>\App\Fee::where('id',$input['reqid'][$i])->first()->price,
        'term'=>\App\Session::latest()->first()->terms,
        'student_id'=>$request->stud,
        'class'=>\App\Student::find($request->stud)->class,
            ];
         $dataSet1[] = $data1;
      if(count(\App\Fpayitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->get())>0){
      	\App\Payitem::where('pay_id',$message->id)->where('item_id',$input['reqid'][$i])->delete();
      }
      }

      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
      }
 return '1';
}
else{
	 return '0';
		}
	}
}
