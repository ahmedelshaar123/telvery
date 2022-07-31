<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TeamRequest;
use App\Models\Team;
use http\Env\Response;
use Illuminate\Http\Request;

class TeamController extends Controller
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
        $job = "job_$lang";
        $desc = "desc_$lang";
        $teams = Team::all();
        return view('admin.teams.index', compact('name', 'job', 'desc', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(TeamRequest $request)
    {
        $team = Team::create($request->except('path'));
        $path = public_path();
        $destinationPath = $path . '/uploads/teams/'; // upload path
        $image = $request->file('path');
        $extension = $image->getClientOriginalExtension(); // getting image extension
        $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
        $image->move($destinationPath, $name); // uploading file to given path
        $team->photo()->create(['path' => 'uploads/teams/' . $name,'type' => 'image']);
        session()->flash('success', trans("admin.added_successfully"));
        return redirect(route('teams.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.teams.edit', compact('team'));
    }


    public function update(TeamRequest $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->update($request->except('path'));
        if ($request->hasFile('path')) {
            unlink(optional($team->photo)->path);
            $path = public_path();
            $destinationPath = $path . '/uploads/teams/'; // upload path
            $photo = $request->file('path');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
            $team->photo()->update(['path' => 'uploads/teams/' . $name,'type' => 'image'
            ]);
        }
        session()->flash('success', trans("admin.updated_successfully"));
        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        unlink(optional($team->photo)->path);
        $team->photo()->delete();
        $team->delete();
        return response()->json("delete");
    }
}
