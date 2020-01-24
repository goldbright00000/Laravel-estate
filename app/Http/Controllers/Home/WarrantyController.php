<?php
namespace App\Http\Controllers\Home;
use App\Model\User;
use App\Model\Warranty;
use App\Model\ProductImages;
use App\Model\CountryCode;
use App\Model\Role_Setting;
use App\Model\Estates;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use Carbon\Carbon;

class WarrantyController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default AnnouncementController
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	
	|
	*/

	public function showWarranty(Request $request)
	{
		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}

		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.home.warranty', array('user'=>Auth::user(), 'submenu'=>'warranty', 'menu'=>'home', 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}	

	public function showRegistration(Request $request)
	{
		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}

		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.home.warranty_registration', array('user'=>Auth::user(), 'submenu'=>'warranty', 'menu'=>'home', 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function registWarranty(Request $request)
	{
		$image = $request->file('file');
		if($image){
			$image_name = $request->brand."_".$request->model.'_'.$request->serial_number.'_'.time();
			$image_ext = $image->getClientOriginalExtension();
			$filename = $image_name.'.'.$image_ext;
			$image->move(public_path('uploads/images/products/'), $filename);
			$imgInfo['image_name'] = $image_name;
			$imgInfo['image_ext'] = $image_ext;
			$image_id = ProductImages::insertGetId($imgInfo);
			$product['image_id'] = $image_id;
		}

		$product['brand'] = $request->brand;
		$product['model'] = $request->model;
		$product['color'] = $request->color;
		$product['serial_number'] = $request->serial_number;
		$product['merchant'] = $request->merchant;
		$product['user_id'] = Auth::user()->id;
		$product['created_at'] = Carbon::now();
		$product['purchase_date'] = (new Carbon($request->purchase_date))->toDateTimeString();
		$product['activation_date'] = (new Carbon($request->activation_date))->toDateTimeString();
		$product['purchase_country'] = $request->purchase_country;
		$product_id = Warranty::insertGetId($product);

		return redirect('home/warranty');
	}

	public function getWarranty(Request $request)
	{
		$warranty = Warranty::select(DB::raw('warranty.*, product_images.image_name, product_images.image_ext, country_code.country_name'))
							->leftjoin('product_images', 'warranty.image_id','=','product_images.id')
							->leftjoin('country_code', 'country_code.code','=', 'warranty.purchase_country')
							->where('user_id', Auth::user()->id)
							->get();
		echo json_encode(array('aaData'=>$warranty));
	}

	public function showEditWarranty(Request $request)
	{
		$warranty = Warranty::select(DB::raw('warranty.*, product_images.image_name, product_images.image_ext'))
							->leftjoin('product_images', 'warranty.image_id','=','product_images.id')
							->where('user_id', Auth::user()->id)
							->where('warranty.id', $request->id)
							->first();

		$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();        
		if (!$RoleSetting) {
			$record['user_id'] = Auth::user()->id;
			$id = Role_Setting::insertGetId($record);			

			$RoleSetting = Role_Setting::where('user_id', Auth::user()->id)->first();
		}

		$estate = Estates::select(DB::raw('estates.*'))
							->leftjoin('estate_staff', 'estates.id','=','estate_staff.estate_id')
							->where('estate_staff.user_id', Auth::user()->id)
							->first();

		return View::make('pages.home.edit_warranty', array('user'=>Auth::user(), 'submenu'=>'warranty', 'menu'=>'home', 'warranty'=>$warranty, 'rolesetting'=>$RoleSetting, 'estate'=>$estate));
	}

	public function updateWarranty(Request $request)
	{
		$image = $request->file('file');
		if($image){
			$image_name = $request->brand."_".$request->model.'_'.$request->serial_number.'_'.time();
			$image_ext = $image->getClientOriginalExtension();
			$filename = $image_name.'.'.$image_ext;
			$image->move(public_path('uploads/images/products/'), $filename);
			$imgInfo['image_name'] = $image_name;
			$imgInfo['image_ext'] = $image_ext;
			$image_id = ProductImages::insertGetId($imgInfo);
			$product['image_id'] = $image_id;
		}else{
			$product['image_id'] = NULL;
		}

		$product['brand'] = $request->brand;
		$product['model'] = $request->model;
		$product['color'] = $request->color;
		$product['serial_number'] = $request->serial_number;
		$product['merchant'] = $request->merchant;
		$product['user_id'] = Auth::user()->id;
		$product['created_at'] = Carbon::now();
		$product['purchase_date'] = (new Carbon($request->purchase_date))->toDateTimeString();
		$product['activation_date'] = (new Carbon($request->activation_date))->toDateTimeString();
		$product['purchase_country'] = $request->purchase_country;
		$product_id = Warranty::where('id', $request->id)
								->update($product);

		return redirect('home/warranty');
	}

	public function removeWarranty(Request $request)
	{
		$id = $request->id;
		$result = Warranty::where('id', $id)
							->delete();
		$image_id = $request->image_id;
		$result = ProductImages::where('id', $image_id)
							->delete();
		echo json_encode($result);
	}
}	