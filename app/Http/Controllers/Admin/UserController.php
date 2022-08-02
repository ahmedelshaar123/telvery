<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasRole('admin')) {
            $users=User::whereRoleIs('user')->get();
        }else{
            $users = User::where('parent_id', auth()->user()->id)->get();
        }
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.users.create', compact('categories'));
    }

    public function create2($email,$phone)
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('admin.users.create', compact('categories', 'email','phone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if (auth()->user()->hasRole('admin')) {
            $parentId = 0;
        } else {
            $parentId = auth()->user()->id;
//        }
            $request->merge(['password' => bcrypt($request->password)]);
            $user = User::create($request->except(['permissions', 'path', 'paths']));
            foreach ($request->file('paths') as $file) {
                $path = public_path();
                $destinationPath = $path . '/uploads/users/'; // upload path
                $image = $file;
                $extension = $image->getClientOriginalExtension();
                $name = time() . '' . rand(11111, 99999) . '.' . $extension;
                $image->move($destinationPath, $name);
                $user->photos()->create(['path' => 'uploads/users/' . $name, 'type' => 'images']);
            }
            $path = public_path();
            $destinationPath = $path . '/uploads/users/'; // upload path
            $logo = $request->file('path');
            $extension = $logo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
            $logo->move($destinationPath, $name); // uploading file to given path
            $user->photo()->create(['path' => 'uploads/users/' . $name, 'type' => 'image']);
            $user->parent_id = $parentId;
            $user->save();
            $user->attachRole('user');
            if (auth()->user()->hasRole('admin')) {
                $user->syncPermissions($request->permissions);
            }
            session()->flash('success', "تم الاضافه بنجاح");
            return redirect(route('users.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $user= User::findOrFail($id);
        return view('admin.users.edit',compact('user','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        if(auth()->user()->hasRole('admin')) {
            $user->syncPermissions($request->permissions);
        }
        $user->update($request->except('path','paths'));
        if($request->hasFile('paths')) {
            foreach ($user->photos as $photo) {
                unlink($photo->path);
            }
            $user->photos()->delete();
            foreach ($request->file('paths') as $file) {
                $path = public_path();
                $destinationPath = $path . '/uploads/users/'; // upload path
                $image = $file;
                $extension = $image->getClientOriginalExtension();
                $name = time() . '' . rand(11111, 99999) . '.' . $extension;
                $image->move($destinationPath, $name);
                $user->photos()->update(['path' => 'uploads/users/' . $name, 'type' => 'image']);
            }
        }
        if ($request->hasFile('path')) {
            unlink(optional($user->photo)->path);
            $path = public_path();
            $destinationPath = $path . '/uploads/users/'; // upload path
            $photo = $request->file('path');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renaming image
            $photo->move($destinationPath, $name); // uploading file to given path
            $user->photo()->update(['path' => 'uploads/users/' . $name,'type' => 'image'
            ]);
        }
        $user->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function edit_profile($id)
    {
        $categories = Category::where('parent_id', 0)->get();
        $user= User::findOrFail($id);
        return view('admin.users.profile',compact('user','categories'));
    }
    public function update_profile(UserRequest $request,$id)
    {
        $user=User::findOrFail($id);
        if($request->password != ''){
            $password = bcrypt($request['password']);
            $data = array_merge($request->except('password'), ['password' => $password ]);
            $user->update($data);
        }else{
            $user->update($request->except('password', 'path', 'paths'));
        }
        if($request->hasFile('paths')) {
            foreach ($user->photos as $photo) {
                unlink($photo->path);
            }
            $user->photos()->delete();
            foreach ($request->file('paths') as $file) {
                $path = public_path();
                $destinationPath = $path . '/uploads/users/'; // upload path
                $image = $file;
                $extension = $image->getClientOriginalExtension();
                $name = time() . '' . rand(11111, 99999) . '.' . $extension;
                $image->move($destinationPath, $name);
                $user->photos()->create(['path' => 'uploads/users/' . $name, 'type' => 'normal']);
            }
        }
        if ($request->hasFile('path')) {
            unlink(optional($user->photo)->path);
            $path = public_path();
            $destinationPath = $path . '/uploads/users/'; // upload path
            $photo = $request->file('path');
            $extension = $photo->getClientOriginalExtension(); // getting image extension
            $name = time() . '' . rand(11111, 99999) . '.' . $extension; // renameing image
            $photo->move($destinationPath, $name); // uploading file to given path
                $user->photo()->update(['path' => 'uploads/users/' . $name,'type' => 'image'
                ]);
        }
        $user->save();
        session()->flash('success', 'تم التعديل بنجاح');
        return back();
    }

    public function activated($id)
    {
        $user = User::findOrFail($id);
        $user->activation = 1;
        $user->save();
        session()->flash('success', 'مفعل');
        return back();
    }
    public function deactivated($id)
    {
        $user = User::findOrFail($id);
        $user->activation = 0;
        $user->save();
        session()->flash('success', 'غير مفعل');
        return back();
    }
}
