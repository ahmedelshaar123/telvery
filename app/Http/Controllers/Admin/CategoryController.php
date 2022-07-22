<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->get();
        $lang = \LaravelLocalization::getCurrentLocale();
        $name = "name_$lang";
        return view('admin.categories.index', compact('categories', 'name'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
        session()->flash('success', trans("admin.added_successfully"));
        return redirect(route('categories.index'));
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
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));

    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category ->update($request->all());
        session()->flash('success', trans("admin.updated_successfully"));
        return redirect(route('categories.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if($category->subCategories()->count() || $category->users()->count()) {
            return response()->json("not-delete");
        }
        $category->delete();
        return response()->json("delete");


    }
}
