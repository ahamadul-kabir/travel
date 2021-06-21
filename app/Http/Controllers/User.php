<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Datatables;

class User extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		$ccObj = new CommonController();
		if($ccObj->checkUserAccess(22) == "no_access"){
			return view('no_access');
		};
		return view('user/user'); 
	}

	

	public function getUserDepratment()
	{
		$result = DB::table('users')
		->select('id','name','department')
		->where('id', session('id'))
		->where('activation_status', 'active')
		->first();
		echo $result->department;
	}

	public function returnUserDepratment()
	{
		$result = DB::table('users')
		->select('id','name','department')
		->where('id', session('id'))
		->where('activation_status', 'active')
		->first();
		return $result->department;
	}

	

	function userDelete(Request $req)
	{
		$ccObj = new CommonController();
		$tableName = 'users';
		$columnName = 'id';
		$id = $req->id; 

		if($ccObj->dataDeletion($tableName, $columnName, $id)>0){
			return response()->json(array("result" => "success", "message" => "User deleted successfully"));
		}else{
			return response()->json(array("result" => "fail", "message" => "Something went wrong"));
		}
	}

	function changePass(Request $req)
	{
		$old_password = trim($req->old_password);
		$password = trim($req->password);
		$re_password = trim($req->re_password);
		$id_user = session('id');

		$error_list = array();
		$data = array();

		if($password == "" || $re_password == "" || $old_password == ""){
			array_push($error_list, "Fill the required fields");
		}

		if($password != $re_password){
			array_push($error_list, "Password and re-typed password didn't matched");
		}

		if(strlen($password) < 6){
			array_push($error_list, "At least 6 characters password required");
		}

		$oldPassCheck = DB::table('users')
		->select('id')
		->where('id', $id_user)
		->where('activation_status', 'active')
		->where('password', md5($old_password))
		->get();

		if(count($oldPassCheck) < 1){
			array_push($error_list, "Wrong old password given");
		}


		if(count($error_list)>0){
			return response()->json(array("result" => "error", "message" => $error_list));
		}else{
			$updateData['password'] = md5($password);
			try{
				DB::table('users')
				->where('id', $id_user)
				->limit(1)
				->update($updateData);
				return response()->json(array("result" => "success", "message" => "Password changed successfully"));
			}catch(Exception $e) {
				return response()->json(array("result" => "fail", "message" => $e));
			}
		}
	}


	function userListDataTable(Request $request)
	{
		if ($request->ajax()) {
			$data = DB::table('users')
			->select('users.id','users.name','users.phone','users.email','department.department_name as department','users.designation',
				'users.address', 'users.image')
			->leftJoin('department', 'department.id_department', '=', 'users.department')
			->where('users.activation_status', 'active')
			->where('users.email','!=', 'sa@ent.com')
			->get();
			return Datatables::of($data)
			->addIndexColumn()
			->addColumn('image', function($row){
				$img = $row->image;
				if ($img != '') {
					$img = '<img class="img-circle" data-id="'.$row->id.'" src="uploads/userimages/'.$row->image.'" width="40">';
				} else {
					$img = '<img data-id="'.$row->id.'" src="uploads/userimages/man.png" width="40">';
				}
				return $img;
			})
			->addColumn('action', function($row){
				$btn = '<i data-id="'.$row->id.'"  class="deleteData ti-close p-10" data-target="#deleteModal"></i>';
				return $btn;
			})
			->rawColumns(['image','action'])
			->make(true);
			return $data;
		} 
	}


	function addNewUser(Request $req)
	{

		$error_list = array();
		$data = array();

		$data['name'] = trim($req->name);
		$data['phone'] = trim($req->phone);
		$data['email'] = trim($req->email);
		$data['department'] = trim($req->department);
		$data['password'] = trim($req->password);
		$data['designation'] = trim($req->designation);
		$re_password = trim($req->re_password);
		$data['address'] = trim($req->address);
		$id_department = trim($req->department);

		$ccObj = new CommonController();

		if($data['name'] == ""){
			array_push($error_list, "User name required");
		}
		if($data['password'] == "" || $re_password == ""){
			array_push($error_list, "Password fields are required");
		}
		if($data['password'] != $re_password){
			array_push($error_list, "Password fields are miss matched");
		}
		if(strlen($data['password']) < 6){
			array_push($error_list, "Atleast 6 characters password required");
		}
		if($data['phone'] == ""){
			array_push($error_list, "Phone number required");
		}
		if($data['department'] == ""){
			array_push($error_list, "Department selection required");
		}

		if(strlen($data['phone']) >13 || strlen($data['phone']) < 11){
			array_push($error_list, "Invalid phone number");
		}


		if($data['email'] != ""){
			if(count($ccObj->checkDataDuplicacy("users", "email", $data['email']))>0){
				array_push($error_list, "This email already exist");
			}
		}

		if(count($ccObj->checkDataDuplicacy("users", "phone", $data['phone']))>0){
			array_push($error_list, "This phone number already exist");
		}


		// File upload with validation start
		$file = $req->file('user-picture');
		if($file != ""){
			$file_extension = $file->getClientOriginalExtension();
			if($ccObj->fileExtensionsAllowed($file_extension) == "allowed"){
				$file_size = $file->getSize();
				if($file_size <= 2100000){  // Allowed file size is 2.1 MB
					//$destinationPath = 'uploads/userimages';
					try{
						$data['image'] = time().'.'.$file->getClientOriginalExtension();
						$file->move('uploads/userimages',$data['image']);
					}catch(Exception $e){
						echo $e;
					}
				}else{
					array_push($error_list, "Please try with a smaller file size");
				}
			}else{
				array_push($error_list, "Attached file type is not allowed");
			}
		}
		// File upload with validation end


		if(count($error_list)>0){
			return response()->json(array("result" => "error", "message" => $error_list));
		}else{
			$data['password'] = md5($data['password']);
			$data['id_user_created_by'] = session('id');

			try{
				DB::beginTransaction();
				DB::table('users')->insert($data);
				$id_user = DB::getPdo()->lastInsertId();
				$this->giveUserAccessByDept($id_user, $id_department);
				DB::commit();
				return response()->json(array("result" => "success", "message" => "Data saved successfully"));
			}catch(Exception $e) {
				DB::rollback();
				return response()->json(array("result" => "fail", "message" => $e));
			}
		}
	}


	function giveUserAccessByDept($id_user, $id_department)
	{
		$module_name = "";
		if($id_department == 1){
			$module_name = "Reception";
		}else if($id_department == 3){
			$module_name = "OT";
		}else if($id_department == 4){
			$module_name = "Accounts";
		}else if($id_department == 5 || $id_department == 6 || $id_department == 7 || $id_department == 8){
			$module_name = "Diagnostics";
		}else if($id_department == 9){
			$module_name = "Pharmacy";
		}

		$id_pages = DB::table('page')
		->select('id_page')
		->orderBy('id_page')
		->where('module_name', $module_name)
		->get()->toArray();

		foreach ($id_pages as $key => $value) {
			$data['id_page'] = $value->id_page;
			$data['id_user'] = $id_user;
			$data['allow_deny'] = 'allow';
			$data['module_name'] = $module_name;
			$data['id_user_access_given_by'] = session('id');
			DB::table('page_users')->insert($data);
		}
	}



}
