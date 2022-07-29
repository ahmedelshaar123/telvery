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
            'black_friday' => $request->black_friday ? 1 : 0,
            'today_deal' => $request->today_deal ? 1 : 0,
            'video_url' => $request->video_url ? $request->video_url : null,
            'type' => $request->type ? $request->type : null,
        ]);
        for ($x=0;$x<count($request->governorate_id);$x++) {
            $product->deliveryCosts()->create([
                'governorate_id' => $request->governorate_id[$x],
                'product_id' => $product->id,
                'price' => $request->delivery_cost[$x],
            ]);
        }
        for ($x=0;$x<count($request->des_color_product_id);$x++) {
            $product->linkedProducts()->create([
                'des_product_id' => $request->des_color_product_id[$x],
                'product_id' => $product->id,
                'type' => "color",
            ]);
        }
        for ($x=0;$x<count($request->des_size_product_id);$x++) {
            $product->linkedProducts()->create([
                'des_product_id' => $request->des_size_product_id[$x],
                'product_id' => $product->id,
                'type' => "size",
            ]);
        }
        $path = public_path();
        $destinationPath = $path . '/uploads/products';
        foreach ($request->file('paths') as $file) {
            $image = $file;
            $extension = $image->getClientOriginalExtension();
            $name = time() . '' . rand(11111, 99999) . '.' . $extension;
            $image->move($destinationPath, $name);
            $product->photos()->create(['path' => 'uploads/products/' . $name, 'type' => 'images']);
        }
        foreach ($request->file('3d') as $file) {
            $image = $file;
            $extension = $image->getClientOriginalExtension();
            $name = time() . '' . rand(11111, 99999) . '.' . $extension;
            $image->move($destinationPath, $name);
            $product->images()->create(['path' => 'uploads/products/' . $name, 'type' => '3d']);
        }
        session()->flash('success', trans("admin.added_successfully"));
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
        $product = Product::findOrFail($id);
        $sizes = $product->linkedProducts()->where('type', 'size')->get();
        $colors = $product->linkedProducts()->where('type', 'color')->get();
        $deliveryCosts = $product->deliveryCosts()->get();
        return view('admin.products.show', compact('product', 'sizes', 'colors', 'deliveryCosts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $governorates = Governorate::all();
        $brands = Brand::all();
        $categories = Category::where('parent_id','!=','0')->get();
        $products = Product::where('user_id',auth()->user()->id)->orWhere('user_id',auth()->user()->parent_id)->where('id', '!=', $id)->get();
        return view('admin.products.edit', compact('governorates', 'brands', 'categories', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'specification_ar' => $request->specification_ar,
            'specification_en' => $request->specification_en,
            'detail_ar' => $request->detail_ar,
            'detail_en' => $request->detail_en,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'color' => $request->color,
            'in_stock' => $request->in_stock,
            'price_before' => $request->price_before,
            'price_after' => $request->price_after ? $request->price_after : 0,
            'black_friday' => $request->black_friday ? 1 : 0,
            'today_deal' => $request->today_deal ? 1 : 0,
            'video_url' => $request->video_url ? $request->video_url : null,
            'type' => $request->type ? $request->type : null,
        ]);
        for ($x=0;$x<count($request->governorate_id);$x++) {
            foreach ($product->deliveryCosts as $deliveryCost) {
                $deliveryCost->delete();
            }
            $product->deliveryCosts()->create([
                'governorate_id' => $request->governorate_id[$x],
                'product_id' => $product->id,
                'price' => $request->delivery_cost[$x],
            ]);
        }
        for ($x=0;$x<count($request->des_color_product_id);$x++) {
            foreach ($product->linkedProducts->where('type', 'color') as $linkedProduct) {
                $linkedProduct->delete();
            }
            $product->linkedProducts()->create([
                'des_product_id' => $request->des_color_product_id[$x],
                'product_id' => $product->id,
                'type' => "color",
            ]);
        }
        for ($x=0;$x<count($request->des_size_product_id);$x++) {
            foreach ($product->linkedProducts->where('type', 'size') as $linkedProduct) {
                $linkedProduct->delete();
            }
            $product->linkedProducts()->create([
                'des_product_id' => $request->des_size_product_id[$x],
                'product_id' => $product->id,
                'type' => "size",
            ]);
        }
        if ($request->file('paths')) {
            foreach ($product->photos as $photo) {
                unlink($photo->path);
            }
            $product->photos()->delete();
            foreach ($request->file('paths') as $file) {
                $path = public_path();
                $destinationPath = $path . '/uploads/products';
                $image = $file;
                $extension = $image->getClientOriginalExtension();
                $name = time() . '' . rand(11111, 99999) . '.' . $extension;
                $image->move($destinationPath, $name);
                $product->photos()->create(['path' => 'uploads/products/' . $name, 'type' => 'images']);
            }
        }
        if ($request->file('3d')) {
            foreach ($product->threeDImages as $photo) {
                unlink($photo->path);
            }
            $product->threeDImages()->delete();
            foreach ($request->file('3d') as $file) {
                $path = public_path();
                $destinationPath = $path . '/uploads/products';
                $image = $file;
                $extension = $image->getClientOriginalExtension();
                $name = time() . '' . rand(11111, 99999) . '.' . $extension;
                $image->move($destinationPath, $name);
                $product->images()->create(['path' => 'uploads/products/' . $name, 'type' => '3d']);
            }
        }
        session()->flash('success', trans("admin.updated_successfully"));
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->carts()->count() || $product->orders()->count()) {
            return response()->json("not-delete");
        }
        foreach ($product->photos as $photo) {
            unlink($photo->path);
            $photo->delete();
        }
        foreach ($product->threeDImages as $threeDImage) {
            unlink($threeDImage->path);
            $threeDImage->delete();
        }
        $product->deliveryCosts()->delete();
        $product->linkedProducts()->delete();
        $product->clients()->detach();
        $product->reviews()->delete();
        $product->delete();

    }
}
