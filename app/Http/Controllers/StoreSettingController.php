<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StoreSetting;
use App\Province;
use App\City;
use App\Subdistrict;

class StoreSettingController extends Controller
{
    public function index()
    {
    	$provinces = Province::all();
    	$cities = City::all();
    	$subdistricts = Subdistrict::all();

    	$setting = StoreSetting::first();
		$data = [];
		if($setting){
			$subdistrict = Subdistrict::where('id', $setting->subdistricts_id)->first();
			$data['province_id'] = $subdistrict->province_id;
			$data['city_id'] = $subdistrict->city_id;
		}
    	return view('admin.setting.store_setting', compact('setting', 'provinces', 'cities', 'subdistricts', 'data'));
    }

    public function add(Request $request)
    {
    	//data kecamatan harus ada di database
    	$request->validate([
    		'subdistrict_id' => 'required|integer|exists:subdistricts,id',
			'bank_name' => 'required|max:64',
			'account_name' => 'required',
			'account_number' => 'required|max:32',
    	]);

    	$setting = StoreSetting::create([
			'bank_name' => $request->bank_name,
			'bank_account_name' => $request->account_name,
			'bank_account_number' => $request->account_number,
			'subdistricts_id' => $request->subdistrict_id,
    		'address_detail'  => $request->address_detail
    	]);

    	return redirect()->back()->with('success', 'Update Successfully!');
    }

    public function edit($id)
    {
    	$provinces  = Province::all();
    	$address_id = $id;
    	return view('admin.setting.edit_store_address', compact('address_id', 'provinces')); 
    }

    public function update(Request $request, $id)
    {
    	//data kecamatan harus ada di database
    	$request->validate([
    		'subdistrict_id' => 'required|integer|exists:subdistricts,id',
			'bank_name' => 'required|max:64',
			'account_name' => 'required',
			'account_number' => 'required|max:32',
    	]);

    	$setting = StoreSetting::where('id', $id)->update([
    		'bank_name' => $request->bank_name,
			'bank_account_name' => $request->account_name,
			'bank_account_number' => $request->account_number,
			'subdistricts_id' => $request->subdistrict_id,
    		'address_detail'  => $request->address_detail
    	]);

    	return redirect()->route('store.setting')->with('success', 'Update Successfully!');
    }
}
