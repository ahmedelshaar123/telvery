<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SubCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = Category::where('parent_id', '!=', 0)->get();
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        return view('admin.sub-categories.index', compact('subCategories', 'name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        return view('admin.sub-categories.create', compact('categories', 'name'));
    }


    public function store(SubCategoryRequest $request)
    {
        $subCategory = Category::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'parent_id' => $request->id,
        ]);
        $path = public_path();
        $destinationPath = $path . '/uploads/sub-categories/'; // upload path
        $image = $request->file('path');
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
        $image->move($destinationPath, $name); // uploading file to given path
        $subCategory->photo()->create(['path' => 'uploads/sub-categories/' . $name,'type' => 'image']);
        session()->flash('success', trans("admin.added_successfully"));
        return redirect(route('sub-categories.index'));

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
        $subCategory = Category::findOrFail($id);
        $categories = Category::where('id', '!=', $subCategory->id)->get();
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        return view('admin.sub-categories.edit', compact('categories', 'subCategory', 'name'));

    }

    public function update(SubCategoryRequest $request, $id)
    {
        $subCategory = Category::findOrFail($id);
        $subCategory->update([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'parent_id' => $request->id,
        ]);
        if ($request->hasFile('path')) {
            unlink(optional($subCategory->photo)->path);
            $path = public_path();
            $destinationPath = $path . '/uploads/sub-categories/'; // upload path
            $photo = $request->file('path');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
            $photo->move($destinationPath, $name); // uploading file to given path
            $subCategory->photo()->update(['path' => 'uploads/sub-categories/' . $name,'type' => 'image']);
        }
        session()->flash('success', trans("admin.updated_successfully"));
        return redirect(route('sub-categories.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $subCategory = Category::findOrFail($id);
        if ($subCategory->products()->count() || $subCategory->SubCategories()->count()) {
            return response()->json("not-delete");
        }
        unlink(optional($subCategory->photo)->path);
        $subCategory->photo()->delete();
        $subCategory->delete();
        return response()->json("delete");
    }
}
