<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Paystack;
use Cartalyst\Stripe\Stripe;
use App\Http\Controllers\Wepay;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;

class FpaymentController extends Controller
{
     public function initiate(Request $request)
    {
        if(count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())==0){
  $message=new \App\Fpayment;
 }  
elseif (count(\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())>0) {
$message=\App\Fpayment::where('student_id',\App\Student::where('data_id',\Auth::user()->id)->first()->id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->first();
}
         $message->student_id=\App\Student::where('data_id',\Auth::user()->id)->first()->id;
        $message->class=\App\Student::where('data_id',\Auth::user()->id)->first()->class;
        $message->pamount=$request->totalpaid;
        $message->plan=$request->plan;
        $message->session=\App\Session::latest()->first()->session;
        $message->term=\App\Session::latest()->first()->terms;
        $message->save();
        for($h=0;$h<\App\Plan::find($request->plan)->number;$h++){
    if(count(\App\Feepay::where('pay_id',$message->id)->where('index',$h)->get())>0){
  $pay=\App\Feepay::where('pay_id',$message->id)->where('index',$h)->first();
  }
   elseif(count(\App\Feepay::where('pay_id',$message->id)->where('index',$h)->get())==0){
    $pay=new \App\Feepay;
   }
     $pay->pay_id=$message->id;
    $pay->receipt_id=\Keygen1::numeric(7)->generate();
    $pay->sign='';
  $pay->amount=\ceil($request->totalpaid*(\App\Planlist::where('plan_id',$request->plan)->where('index',$h)->first()->percent/100));
    $pay->index=$h;
    $pay->status='0';
     $pay->method='';
     $pay->type='';
     $pay->save();  
    }
        $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
        'status'=>'0',
         'amount'=>\App\Fee::where('id',$input['reqid'][$i])->first()->price,
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'student_id'=>\App\Student::where('data_id',\Auth::user()->id)->first()->id,
        'class'=>\App\Student::where('data_id',\Auth::user()->id)->first()->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
      }
        return back()->with(['message' => "".__('admin.payn_succ')]);

    }
 public function pinitiate(Request $request,$id)
    {
        if(count(\App\Fpayment::where('student_id',$id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())==0){
  $message=new \App\Fpayment;
 }  
elseif (count(\App\Fpayment::where('student_id',$id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->get())>0) {
$message=\App\Fpayment::where('student_id',$id)->where('session',\App\Session::latest()->first()->session)->where('term',\App\Session::latest()->first()->terms)->first();
}
         $message->student_id=$id;
        $message->class=\App\Student::find($id)->class;
        $message->pamount=$request->totalpaid;
        $message->plan=$request->plan;
        $message->session=\App\Session::latest()->first()->session;
        $message->term=\App\Session::latest()->first()->terms;
        $message->save();
        for($h=0;$h<\App\Plan::find($request->plan)->number;$h++){
    if(count(\App\Feepay::where('pay_id',$message->id)->where('index',$h)->get())>0){
  $pay=\App\Feepay::where('pay_id',$message->id)->where('index',$h)->first();
  }
   elseif(count(\App\Feepay::where('pay_id',$message->id)->where('index',$h)->get())==0){
    $pay=new \App\Feepay;
   }
     $pay->pay_id=$message->id;
    $pay->receipt_id=\Keygen1::numeric(7)->generate();
    $pay->sign='';
    $pay->amount=$request->totalpaid*(\App\Planlist::where('plan_id',$request->plan)->where('index',$h)->first()->percent/100);
    $pay->index=$h;
    $pay->status='0';
     $pay->method='';
     $pay->type='';
     $pay->save();  
    }
        $input=$request->all();
      for($i=0; $i <= count($input['reqid']); $i++){
    if(empty($input['reqid'][$i])) continue;
        $data1 = [
         'pay_id'=>$message->id,
        'item_id'=>$input['reqid'][$i],
        'type'=>'2',
        'status'=>'0',
         'amount'=>\App\Fee::where('id',$input['reqid'][$i])->first()->price,
         'session'=>\App\Session::latest()->first()->session,
        'term'=>\App\Session::latest()->first()->terms,
        'student_id'=>$id,
        'class'=>\App\Student::find($id)->class,
            ];
         $dataSet1[] = $data1;
      }
      foreach ($dataSet1 as $key ) {
        \DB::table('fpayitems')->insert($key);
      }
        return back()->with(['message' => "".__('admin.payn_succ')]);
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
      $pay=\App\Feepay::find($request->idd);
    $pay->sign=\Auth::user()->name;
    $pay->status='1';
     $pay->method=$request->method;
     $pay->type='2';
     $pay->save();
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
  if(\Auth::user()->role=='student'){
  $email=\Auth::user()->id_user.'@'.\App\Student::where('data_id',\Auth::user()->id)->first()->gname.'.'.\App\Student::where('data_id',\Auth::user()->id)->first()->fname;
  }
 else{
  $email=$request->ref.'@'.\Auth::user()->role.'.pat';
 }
$customer=new \App\Sbill;
$customer->customer_id=$token;
$customer->user_id=\Auth::user()->id;
$customer->save();
if(\App\Setting::first()->status==0){
  $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => \App\Currency::find(\App\Setting::first()->currency)->code,
    'amount'   =>\App\Feepay::find($request->idd)->amount,
    'description' => 'School Fee Payment',
]);
}
elseif(\App\Setting::first()->status==1){
 $charge = $stripe->charges()->create([
    'card' => $token,
    'currency' => 'USD',
    'amount'   => round((\App\Feepay::find($request->idd)->amount/\App\Setting::first()->convert)* 100) / 100,
    'description' => 'School Fee Payment',
]);
}
  if($charge['status'] == 'succeeded') {
    $pay=\App\Feepay::find($request->idd);
    $pay->sign=\Auth::user()->name;
    $pay->status='1';
     $pay->method=$request->method;
     $pay->type='2';
     $pay->save();
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
    if(\App\Setting::first()->status==0){
    $data = array(
    "account_id" => $account_id,
    "amount" => $request->paid,
    "short_description"=>"School Fee payment",
    "type"=>"service",
    "currency"=>\App\Currency::find(\App\Setting::first()->currency)->code,
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/fpayment/redirect/".$request->idd]
    
);
  }
  elseif(\App\Setting::first()->status==1){
$data = array(
    "account_id" => $account_id,
    "amount" => round(($request->paid/\App\Setting::first()->convert)* 100) / 100,
    "short_description"=>"School Fee payment",
    "type"=>"service",
    "currency"=>"USD",
    'hosted_checkout' => ['mode' => 'iframe','redirect_uri' => url('')."/fpayment/redirect/".$request->idd]
    );
  }
$data = json_encode($data);
if(getenv('WEPAY_CLIENT_STATUS')=='production'){
  $ch = curl_init('https://wepayapi.com/v2/checkout/create'); // URL of the call
}
else{
   $ch = curl_init('https://stage.wepayapi.com/v2/checkout/create'); // URL of the call
}CURL_SETOPT($ch, CURLOPT_POST, 1);
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
      return $result;
 }
 public function wepay_confirm(Request $request,$idd){
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
 $pay=\App\Feepay::find($idd);
    $pay->sign=\Auth::user()->name;
    $pay->status='1';
     $pay->method='Wepay';
     $pay->type='3';
     $pay->save();
	 return back()->with(['message' => "".__('admin.payn_succ')]);
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
 $paymentCheck = $paypal->validatr($paymentID, $token, $payerID);
 if($paymentCheck && $paymentCheck->state == 'approved'){
     $pay=\App\Feepay::find($request->idd);
     $pay->sign=\Auth::user()->name;
     $pay->status='1';
     $pay->method=$request->method;
     $pay->type='2';
     $pay->save();
 return '1';
}
else{
	 return '0';
		}
	}
  public function transferpay(Request $request)
   {
     $pay=\App\Feepay::find($request->idd);
     $pay->sign=\Auth::user()->name;
     $pay->status='2';
     $pay->method=$request->method;
     $pay->type='2';
      $picture = $request->file('file');
        if($picture != ""){
      $filename = time() . '.' . $picture->getClientOriginalExtension();
        Image::make($picture)->resize(600, 600)->save(public_path('/uploads/proof/' . $filename) );
      $pay->file= $filename;
    }
     $pay->save();
 return '1';

  }
  
}
