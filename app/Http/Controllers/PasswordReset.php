<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PasswordReset extends Controller
{


	public function passwordResetView()
	{
		
		return view('passwordreset');
	}

	function passwordReset(Request $req)
	{

		$password = trim($req->password);
		$con_password = trim($req->con_password);

		$error_list = array();

		if($password == "" || $con_password == ""){
			array_push($error_list, "Fill the required fields");
		}else{
			if($password != $con_password){
				array_push($error_list, "Password and re-typed password didn't matched");
			}else{
				if(strlen($password) < 6){
					array_push($error_list, "At least 6 characters password required");
				}
			}

		}

		if(count($error_list)>0){
			return response()->json(array("result" => "error", "message" => $error_list));
		}else{

			$rec_pass = DB::table('recovery_password')
			->select('id','user_id','user_email','token_expiration_time','token_status') 
			->where('token', $req->email_token)
			->get();
			$nowTime = Carbon::now();
			$expired_time = Carbon::parse($rec_pass[0]->token_expiration_time);

			if($expired_time->gte($nowTime)){
				if($rec_pass[0]->token_status == "active"){

					//dd($req->password." ".$req->email_token); 

					$update_pass['password'] = md5($password);
					$update_token_status['token_status'] ='expired';
					try{
						DB::table('users')
						->where('id', $rec_pass[0]->user_id)
						->where('email', $rec_pass[0]->user_email)
						->limit(1)
						->update($update_pass);

						DB::table('recovery_password')
						->where('id', $rec_pass[0]->id)
						->where('token', $req->email_token)
						->limit(1)
						->update($update_token_status);
						return response()->json(array("result" => "success", "message" => "Password changed successfully"));
						
					}catch(Exception $e) {
						return response()->json(array("result" => "fail", "message" => $e));
					} 
				}else{
					return response()->json(array("result" => "error","message"=>"Your Request time already expired. Please try again"));
				}
			}else{
				return response()->json(array("result" => "error","message"=>"Your Request time already expired. Please try again"));
			}
		}
	}


}