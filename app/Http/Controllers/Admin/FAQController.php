<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FAQRequest;
use App\Models\Question;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faq = Question::all();
        return view('admin.faq.index', compact('faq' ));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.faq.create');

    }


    public function store(FAQRequest $request)
    {
        Question::create($request->all());
        session()->flash('success', trans("admin.added_successfully"));
        return redirect(route('faq.index'));

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
        $faq = Question::findOrFail($id);
        return view('admin.faq.edit', compact('faq'));

    }

    public function update(FAQRequest $request, $id)
    {
        $faq=Question::findOrFail($id);
        $faq->update($request->all());
        session()->flash('success', trans("admin.updated_successfully"));
        return redirect(route('faq.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return response()->json("delete");
    }
}
