<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $lang = \LaravelLocalization::getCureentLocale();
        $name = "name_$lang";
        $shippings = Shipping::where('client_id', $id)->get();
        return view('admin.clients.show', compact('name','shippings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {

    }

    public function activated($id)
    {
        $client = Client::findOrFail($id);
        $client->is_Active = 1;
        $client->save();
        session()->flash('success', trans("admin.activated"));
        return back();
    }

    public function deactivated($id)
    {
        $client = Client::findOrFail($id);
        $client->is_Active = 0;
        $client->save();
        session()->flash('success', trans("admin.deactivated"));
        return back();
    }
}
