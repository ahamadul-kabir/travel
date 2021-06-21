<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;

class Login extends Controller
{
	public function index()
	{
		return view('login'); 
	}

	public function loginCheck(Request $req)
	{
		$email = trim($req->email);
		$password = trim($req->password);

		if($email == "" || $password == ""){
			return response()->json(array("result" => "empty"));
		}else{
			$password = md5($password);
			if(is_numeric($email)){
				$result = DB::table('users')
				->select('id','name')
				->where('phone', $email)
				->where('password', $password)
				->where('activation_status', 'active')
				->first();
			}else{
				$result = DB::table('users')
				->select('id','name')
				->where('email', $email)
				->where('password', $password)
				->where('activation_status', 'active')
				->first();
			}

			if($result){
				session()->put('id',$result->id);
				session()->put('name',$result->name);
				return response()->json(array("result" => "success"));
			}else{
				return response()->json(array("result" => "error"));
			}
		}
	}


	public function logout()
	{
		session()->flush();
		return redirect('login');
	}

	public function sendEmail(Request $req)
	{
		$rec_pass = array();
		$email = trim($req->email);
		
		$result = DB::table('users')
		->select('id','email','name') 
		->where('email', $email)
		->where('activation_status', 'active')
		->get(); 
		
		if(count($result)>0){
			$nowTime = Carbon::now();
			$key = $this->generateToken($email.$nowTime);
			$expired_time = Carbon::parse($nowTime)->addMinutes(30);
			$rec_pass['user_id'] = $result[0]->id;
			$rec_pass['user_email'] = $email;
			$rec_pass['token'] = $key;
			$rec_pass['token_expiration_time'] = $expired_time;
			
			$data = DB::table('recovery_password')->insert($rec_pass);
			//dd($key." url = ".$data);
			$mail_data = array(); 
			if($data){ 
				Mail::send('forget',['name'=>$result[0]->name,'code'=>$key], function($message) use ($result) {
					$message->from('tanvir3569@gmail.com');
					$message->to($result[0]->email);
					$message->subject('Reset Password'); 
				});
				return response()->json(array("result" => "success","message"=>"We have e-mailed your password reset link in your mail.Please check your mail."));
			}
		}else{
			return response()->json(array("result" => "error","message"=>"Invalid email address."));
		}


	}


	private function generateToken($key)
	{
  //   // This is set in the .env file
		// $key = config('app.key');


  //   // Illuminate\Support\Str;
		// if (Str::startsWith($key, 'base64:')) {
		// 	$key = base64_decode(substr($key, 7));
		// }
		//return $key;
		return hash_hmac('sha256', Str::random(40), $key);
	}

	public function frontendtestget($data)
	{
		echo "<pre>";
		print_r($data);
	}

	public function frontendtestpost(Request $req)
	{
		echo "<pre>";
		print_r($req->all());
	}
}
