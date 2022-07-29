<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Governorate;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=auth()->user();
        if ($user->hasRole('admin')){
            $products = Product::all();
        }else{
            $products = Product::where('user_id',$user->id)->orWhere('user_id',auth()->user()->parent_id)->get();
        }
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        $brands = Brand::all();
        $categories = Category::where('parent_id','!=','0')->get();
        $products = Product::where('user_id',auth()->user()->id)->orWhere('user_id',auth()->user()->parent_id)->get();
        return view('admin.products.create', compact('governorates', 'brands', 'categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if (auth()->user()->parent_id==0){
            $parentId = auth()->user()->id;
        }else{
            $parentId = auth()->user()->parent_id;
        }
        $product = Product::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'specification_ar' => $request->specification_ar,
            'specification_en' => $request->specification_en,
            'detail_ar' => $request->detail_ar,
            'detail_en' => $request->detail_en,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'user_id' => $parentId,
            'color' => $request->color,
            'in_stock' => $request->in_stock,
            'price_before' => $request->price_before,
            'price_after' => $request->price_after ? $request->price_after : 0,
            'bla' => $request->black_friday ? $request->price_after : 0,
            'price_after' => $request->today_deal ? $request->price_after : 0,
            'price_after' => $request->video_url ? $request->price_after : 0,
        ]);
        if($request->black_friday) {
            $product->black_friday = 1;
        }
        if($request->today_deal) {
            $product->today_deal = 1;
        }
        if($request->video_url) {
            $product->video_url = $request->video_url;
        }
        if($request->sku) {
            $product->sku = $request->sku;
        }
        if($request->black_friday || $request->today_deal || $request->video_url || $request->sku) {
            $product->save();
        }
        if($request->type) {
            for ($x = 0; $x < count($request->price_after); $x++) {
                $product->sizes()->create([
                    'type' => $request->type[$x],
                    'sku' => $request->sku[$x],
                    'price_before' => $request->price_before[$x],
                    'price_after' => $request->price_after[$x],
                    'in_stock' => $request->in_stock[$x],
                ]);
            }
        }elseif($request->type == null) {
            for ($x = 0; $x < count($request->price_after); $x++) {
                $product->sizes()->create([
                    'sku' => $request->sku[$x],
                    'price_before' => $request->price_before[$x],
                    'price_after' => $request->price_after[$x],
                    'in_stock' => $request->in_stock[$x],
                ]);
            }
        }
        for ($x=0;$x<count($request->governorate_id);$x++) {
            $product->DeliveryCosts()->create([
                'governorate_id' => $request->governorate_id[$x],
                'product_id' => $product->id,
                'price' => $request->price[$x],
            ]);
        }
        $path = public_path();
        $destinationPath = $path . '/uploads/products';
        foreach ($request->file('path') as $file) {
            $image = $file;
            $extension = $image->getClientOriginalExtension();
            $name = time() . '' . rand(11111, 99999) . '.' . $extension;
            $image->move($destinationPath, $name);
            $product->photos()->create(['path' => 'uploads/products/' . $name, 'type' => 'normal']);
        }
        foreach ($request->file('icon') as $file) {
            $image = $file;
            $extension = $image->getClientOriginalExtension();
            $name = time() . '' . rand(11111, 99999) . '.' . $extension;
            $image->move($destinationPath, $name);
            $product->images()->create(['path' => 'uploads/products/' . $name, 'type' => 'icon']);
        }
        session()->flash('success', "تمت الاضافة بنجاح");
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
