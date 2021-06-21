<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}

	// public function dataDeletion($tableName, $id)
	// {
	// 	$result = DB::select(DB::raw("SHOW KEYS FROM {$tableName} WHERE Key_name = 'PRIMARY'"));
	// 	$pkColumn = $result[0]->Column_name; 

	// 	try{
	// 		$result = DB::table($tableName)
	// 		->where($pkColumn,$id)
	// 		->delete();
	// 		if($result){
	// 			return response()->json(array("result" => "success", "message" => "Data deleted completely"));
	// 		}else{
	// 			return response()->json(array("result" => "fail", "message" => "Something went wrong"));
	// 		}
	// 	}catch (\Illuminate\Database\QueryException $e) {
	// 		$errorCode = $e->errorInfo[1];
	// 		if($errorCode == 1451){
	// 			$update_data['activation_status'] = 'deactive';
	// 			$result2 = DB::table($tableName)
	// 			->where($pkColumn, $id)
	// 			->limit(1)  
	// 			->update($update_data); 

	// 			if($result2){
	// 				return response()->json(array("result" => "success", "message" => "Data deleted successfully"));
	// 			}else{
	// 				return response()->json(array("result" => "fail", "message" => "Something went wrong"));
	// 			}
	// 		}
	// 	}
	// }

	public function get_string_between($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return substr($string, $ini, $len);
	}

	public function checkUserAccess($id_page)
	{
		$id_user =  session('id');
		$data = DB::table('page_users')
		->select('allow_deny')
		->where('id_user', $id_user)
		->where('id_page', $id_page)
		->where('allow_deny', 'allow')
		->get();

		if(count($data) == 0){
			return "no_access";
		}
	}

	public function getMicroTime()
	{
		return microtime(true);
	}

	public function getTimeDifference($startTime, $endTime)
	{
		return $endTime - $startTime;
	}

	public function getDataById($tableName, $id)
	{
		if($tableName != "users"){
			$result = DB::select(DB::raw("SHOW KEYS FROM {$tableName} WHERE Key_name = 'PRIMARY'"));
			$primaryKey = $result[0]->Column_name; 

			$data = DB::table($tableName)->select('*')->where($primaryKey, $id)->limit(1)->get();
			return response()->json($data);
		}
	}

	public function dataDeletion($tableName, $columnName, $id)
	{
		$update_data['activation_status'] = 'deactive';
		
		$data = DB::table($tableName)
		->where($columnName, $id)
		->limit(1)  
		->update($update_data); 
		return $data;
	}

	public function checkDataDuplicacy($tableName, $columnName, $compareValue)
	{
		$data = DB::table($tableName)
		->select($columnName)
		->where($columnName, $compareValue)
		->where('activation_status', '!=', 'deactive')
		->limit(1)
		->get();
		return $data;
	}
	
	function checkThanaDuplicacy($tableName, $column1, $compare1,$column2, $compare2)
	{
		$data = DB::table($tableName)
		->select($column1)
		->where($column1, $compare1)
		->where($column2, $compare2)
		->where('activation_status', '!=', 'deactive')
		->limit(1)
		->get();
		return $data;
	}

	public function checkDataDuplicacyOnEdit($tableName, $columnName, $compareValue, $idColumnName, $id)
	{
		$data = DB::table($tableName)
		->select($columnName)
		->where($columnName, $compareValue)
		->where($idColumnName,'!=', $id)
		->where('activation_status', '!=', 'deactive')
		->limit(1)
		->get();
		return $data;
	}

	public function allIncomeHeadList()
	{
		$data = DB::table('accounts_head')
		->select('id_accounts_head AS id_income_head','name AS income_head_name')
		->where('parent_or_child', 'parent')
		->where('activation_status', 'active')
		->where('income_or_expense', 'income')
		->get();
		return response()->json($data);
	}

	public function fileExtensionsAllowed($file_extension)
	{
		$allowed_or_not = "";
		$allowed_extensions = array('bmp','jpg','jpeg','png','pdf','doc','docx','xls','xlsx','txt');
		if (in_array($file_extension, $allowed_extensions)) 
		{ 
			$allowed_or_not = "allowed"; 
		} 
		else
		{ 
			$allowed_or_not = "not_allowed"; 
		}
		return $allowed_or_not;
	}

	public function billServices($id)
	{
		$data = DB::table('bill_subheads')
		->select('bill_subheads.id_bill_subheads','accounts_head.name','bill_subheads.rate')
		->leftjoin('accounts_head', 'accounts_head.id_accounts_head', '=', 'bill_subheads.id_income_subhead')
		->where('bill_subheads.id_bill', $id)
		->get();
		return response()->json($data);
	}

	public function departmentList()
	{
		$data = DB::table('department')
		->select('id_department','department_name')
		->where('activation_status', 'active')
		->orderBy('department_name')
		->get();
		return response()->json($data);
	}

	public function dueAmountReceive(Request $req)
	{
		$id_bill = $req->id_bill;
		$grand_total = $req->grand_total;

		$data['paid'] = $grand_total;
		$data['due'] = 0;

		$result = DB::table('bill')
		->where('id_bill', $id_bill)
		->limit(1)
		->update($data);


		if($result){
			return response()->json(array("result" => "success", "message" => "Due amount received successfully"));
		}else{
			return response()->json(array("result" => "fail", "message" => "Something went wrong"));
		}
	}


	public function getDistrictList()
	{
		$data = DB::table('districts')->select('id', 'name')->orderby('name','asc')->get();
		echo json_encode($data);
	}
	
	public function getThanaList($id)
	{
		$data = DB::table('upazilas_or_thanas')
		->select('id', 'name')
		->where('district_id', $id)
		->orderby('name','asc')
		->get();
		echo json_encode($data);
	}
	public function getCategoryList()
	{
		$data = DB::table('reso_category')->select('id', 'name')->orderby('name','asc')->get();
		echo json_encode($data);
	}
	public function getGroupList()
	{
		$data = DB::table('group_list')
		->select('id', 'name')
		->where('activation_status','active')
		->orderby('name','asc')
		->get();
		echo json_encode($data);
	}
	public function getReferralList()
	{
		$data = DB::table('referrals')->select('id', 'name','address')->orderby('name','asc')->get();
		echo json_encode($data);
	}

}
