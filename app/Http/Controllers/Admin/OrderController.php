<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user=auth()->user();
        if ($user->hasRole('admin')){
            $orders = Order::where(function ($query) use ($request) {
                if ($request->order_id) {
                    $query->where('id', $request->order_id);
                }
                if ($request->status) {
                    $query->where('status', $request->status);
                }
                if ($request->from && $request->to) {
                    $query->whereDate('created_at', '>=', $request->from);
                    $query->whereDate('created_at', '<=', $request->to);
                }
            })->latest()->paginate(10);
        }else{
            $orders = Order::where('user_id',$user->id)->orWhere('user_id',$user->parent_id)->where(function ($query) use ($request) {
                if ($request->order_id) {
                    $query->where('id', $request->order_id);
                }
                if ($request->status) {
                    $query->where('status', $request->status);
                }
                if ($request->from && $request->to) {
                    $query->whereDate('created_at', '>=', $request->from);
                    $query->whereDate('created_at', '<=', $request->to);
                }
            })->latest()->paginate(10);
        }
        return view('admin.orders.index', compact("orders"));
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
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        $order = Order::findOrFail($id);
        $orderProducts = OrderProduct::where('order_id', $id)->get();
        return view('admin.orders.show', compact('name', 'order','orderProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function setOrderStatus(Request $request, $id){
        Order::findOrFail($id)->update(['status' => $request->status]);
        OrderStatus::create([
            'order_id' => $id,
            'status' => $request->status,
        ]);
        session()->flash('success', trans("Admin.updated_successfully"));
        return back();
    }
}
