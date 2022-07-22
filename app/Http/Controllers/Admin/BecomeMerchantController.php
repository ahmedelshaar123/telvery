<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BecomeMerchant;
use Illuminate\Http\Request;

class BecomeMerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $becomeMerchants = BecomeMerchant::all();
        return view('admin.views.become-merchants', compact("becomeMerchants"));
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

    public function activated($id)
    {
        $becomeMerchant = BecomeMerchant::findOrFail($id);
        $becomeMerchant->is_active = 1;
        $becomeMerchant->save();
        session()->flash('success', trans("admin.activated"));
        return back();
    }

    public function deactivated($id)
    {
        $becomeMerchant = BecomeMerchant::findOrFail($id);
        $becomeMerchant->is_active = 0;
        $becomeMerchant->save();
        session()->flash('success', trans("admin.deactivated"));
        return back();
    }
}
