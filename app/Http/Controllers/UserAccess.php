<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAccess extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	public function noAccess()
	{
		return view('no_access');
	}

	public function index()
	{
		$ccObj = new CommonController();
		if($ccObj->checkUserAccess(23) == "no_access"){
			return view('no_access');
		};
		return view('user/user_access');
	}

	function moduleWiseAccess()
	{
		$ccObj = new CommonController();
		if($ccObj->checkUserAccess(23) == "no_access"){
			return view('no_access');
		};
		return view('user/user_access_by_module');
	}


	function moduleList()
	{
		$data = DB::table('page')
		->select('module_name')
		->orderBy('module_name')
		->groupBy('module_name')
		->get();
		echo json_encode($data);
	}

	function moduleWiseAccessStatus($id_user)
	{
		$startTime = microtime(true);

		$userPageArray = array();
		$pageArray = array();
		$allPageArray = array();
		$moduleNames = DB::table('page')
		->select('module_name')
		->orderBy('module_name')
		->groupBy('module_name')
		->get();


		foreach ($moduleNames as $key => $value) {
			$module_name = $value->module_name;
			$id_pages = DB::table('page')
			->select('id_page')
			->where('module_name', $module_name)
			->get();

			$id_user_pages = DB::table('page_users')
			->select('id_page')
			->where('module_name', $module_name)
			->where('allow_deny', 'allow')
			->where('id_user', $id_user)
			->get();

			$total_pages = count($id_pages); 
			$allowed_pages = count($id_user_pages); 


			if($total_pages == $allowed_pages){
				$pageArray['module_name'] = $module_name; 
				$pageArray['status'] = "All allowed"; 
			}else if($allowed_pages == 0){
				$pageArray['module_name'] = $module_name; 
				$pageArray['status'] = "All denied"; 
			}else if($allowed_pages != 0 && $total_pages != $allowed_pages){
				$pageArray['module_name'] = $module_name; 
				$pageArray['status'] = "Partially allowed"; 
			}

			array_push($allPageArray, $pageArray);
			$pageArray = array();
		}

		echo json_encode($allPageArray);
	}

	function allowOrDenyModuleAccess(Request $req)
	{
		$startTime = microtime(true);

		$id_user = $req->id_user; 
		$module_name = $req->module_name; 
		$allow_or_deny = $req->allow_deny;
		
		$id_pages = DB::table('page')
		->select('id_page')
		->orderBy('id_page')
		->where('module_name', $module_name)
		->get()->toArray();

		$count = 0;
		foreach ($id_pages as $key => $value) {
			if($allow_or_deny == "allow"){
				$checkPageExistence = DB::table('page_users')
				->select('id_page_users')
				->where('id_page',$value->id_page)
				->where('id_user',$id_user)
				->where('allow_deny','allow')
				->get();

				if(count($checkPageExistence)>0){

				}else{
					$count++;
					$data['id_page'] = $value->id_page;
					$data['id_user'] = $id_user;
					$data['allow_deny'] = 'allow';
					$data['module_name'] = $module_name;
					$data['id_user_access_given_by'] = session('id');
					DB::table('page_users')->insert($data);
				}
			}else if($allow_or_deny == "deny"){
				$count++;
				DB::table('page_users')
				->where('id_page', $value->id_page)
				->where('id_user', $id_user)
				->delete();
			}	
		}

		$endTime = microtime(true);
		$seconds = $endTime - $startTime;
		if($count > 0 && $allow_or_deny == 'allow'){
			return response()->json(array("result" => "success", "time" =>$seconds, "message" => "All page access given successfully for ".$module_name." module"));
		}
		else if($count > 0 && $allow_or_deny == 'deny'){
			return response()->json(array("result" => "success", "time" =>$seconds, "message" => "All page access removed successfully for ".$module_name." module" ));
		}
		else{
			return response()->json(array("result" => "fail", "message" => "Something went wrong"));
		}

	}


	function userList()
	{
		$data = DB::table('users')
		->select('users.id','users.name', 'users.phone', 'department.department_name')
		->leftJoin('department', 'department.id_department', '=', 'users.department')
		->where('users.email','!=', 'sa@ent.com')
		->get();
		return response()->json($data);
	}


	function pageListByUserId($id_user)
	{
		$data['all_pages'] = DB::table('page')
		->select('id_page as id_page_of_page', 'module_name', 'page_name')
		->where('activation_status','active')
		->orderBy('module_name')
		->orderBy('page_name')
		->get()->toArray();

		$data['pages_by_user'] = DB::table('page_users')
		->select('page.module_name','page.page_name','page_users.id_page')
		->leftJoin('page', 'page.id_page', '=', 'page_users.id_page')
		->where('page_users.id_user',$id_user)
		->where('page_users.allow_deny','allow')
		->orderBy('page.module_name')
		->orderBy('page.page_name')
		->get()->toArray();


		foreach ($data['pages_by_user'] as $key => $values) {
			foreach ($data['all_pages'] as $key => $value) {
				if($values->id_page == $value->id_page_of_page){
					$data['all_pages'][$key]->status = "Allow";
				}
			}
		}
		echo json_encode($data['all_pages']);
	}


	function allowOrDenyAccess(Request $req)
	{
		$startTime = microtime(true);
		$submitted_data = $req->all();

		$data['id_page'] = $submitted_data['id_page'];
		$data['id_user'] = $submitted_data['id_user'];
		$data['id_user_access_given_by'] = session('id');
		$data['module_name'] = $submitted_data['module_name'];

		$allow_deny = $submitted_data['allow_deny'];

		if($allow_deny == "allow"){
			try{
				DB::table('page_users')->insert($data);
				
				$endTime = microtime(true);
				$seconds = $endTime - $startTime;

				return response()->json(array("result" => "success", "time" => $seconds, "message" => "Access given successfully"));
			}catch(Exception $e) {
				return response()->json(array("result" => "fail", "message" => $e));
			}
		}else if($allow_deny == "deny"){
			try{
				DB::table('page_users')
				->where('id_page', $data['id_page'])
				->where('id_user', $data['id_user'])
				->delete();

				$endTime = microtime(true);
				$seconds = $endTime - $startTime;

				return response()->json(array("result" => "success", "time" => $seconds, "message" => "Access removed successfully"));
			}catch(Exception $e) {
				return response()->json(array("result" => "fail", "message" => $e));
			}
		}
	}
}
