<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $search = $request->input('search');
        $query = Order::query()->join('users', 'users.id', '=', 'orders.user_id')
        ->select('orders.*', 'users.name');
        if (!empty($status)) {
            $query->where('status', $status);
        }
        
        if (!empty($search)) {
            $query->where('invoice','LIKE', "%$search%");
            $query->orWhere('name','LIKE', "%$search%");
        }
        
        $orders = $query->paginate(10);
        
        // \dd($query);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::join('users', 'users.id', '=', 'orders.user_id')
                       ->select('orders.*', 'users.name')
                       ->findOrFail($id);
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::join('users', 'users.id', '=', 'orders.user_id')
                       ->select('orders.*', 'users.name')
                       ->findOrFail($id);
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required'
        ]);

        Order::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect()->route('order.index')->with('success', 'Order Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index')->with('Order Deleted Successfully!');
    }
}
