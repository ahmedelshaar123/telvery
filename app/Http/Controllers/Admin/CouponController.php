<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        $user=auth()->user();
        if ($user->hasRole('admin')){
            $coupons = Coupon::all();
        }else{
            $coupons = Coupon::where('user_id',$user->id)->orWhere('user_id',$user->parent_id)->get();
        }
        return view('admin.coupons.index', compact('name', 'coupons'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        $brands = Brand::all();
        return view('admin.coupons.create', compact('name', 'brands'));
    }


    public function store(CouponRequest $request)
    {
        if (auth()->user()->hasRole('admin')){
            $userId = auth()->user()->id;
        }else{
            if (auth()->user()->parent_id==0){
                $userId = auth()->user()->id;
            }else{
                $userId = auth()->user()->parent_id;
            }
        }
        Coupon::create([
            'num_users' =>$request->num_users,
            'expiry_date' =>$request->expiry_date,
            'code' =>$request->code,
            'discount' =>$request->discount,
            'user_id' =>$userId,
            'brand_id' => $request->brand_id
            ]);
        session()->flash('success', trans("admin.added_successfully"));
        return redirect(route('coupons.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon->orders()->count()) {
            return response()->json("not-delete");
        }
        $coupon->delete();
        return response()->json("delete");
    }
}
