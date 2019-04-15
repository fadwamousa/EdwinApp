<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }


    public function create()
    {
        $roles = Role::lists('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }


    public function store(UsersRequest $request)
    {
        $input        =  $request->all();
        if($file      =  $request->file('photo_id')){
          $FileName   = time().'_'.$file->getClientOriginalName();
          $file->move('images',$FileName);
          $photo = Photo::create(['file'=>$FileName]);
          $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($request->input('password'));
        $user = User::create($input);
        return redirect()->intended('admin/users');
    }


    public function show($id)
    {
        return view('admin.users.show');
    }


    public function edit($id)
    {
        return view('admin.users.edit');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
