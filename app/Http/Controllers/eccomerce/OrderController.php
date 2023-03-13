<?php

namespace App\Http\Controllers\eccomerce;

use Auth;
use App\Order;
use App\Category;
use App\StoreSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
    	$categories = Category::all();
    	$orders = Order::where('user_id', Auth::user()->id)->get();
    	return view('eccomerce.user.order', compact('categories', 'orders'));
    }

    public function show($id)
    {
    	$categories = Category::all();
    	$order = Order::where('id', $id)->first();
		$store_setting = StoreSetting::first();
    	return view('eccomerce.user.order_detail', compact('categories', 'order', 'store_setting'));
    }

	public function paymentConfirmation (Request $request)
    {
    	$id = $request->order_id;
    	$order = Order::where('id', $id)->update(['status' => "Pending"]);
		// var_dump($id); die;
    	return redirect()->route('user.order.show', $id)->with('success', 'Thank you for your payment. Please wait 24 hours for your order status to change.');
    }
}
