<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersEditRequest;
use App\User;
use App\Role;
use App\Photo;
use Session;

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

        if(trim($request->password) == ''){
          $input = $request->except('password');
        }else{
          $input = $request->all();
          $input['password'] = bcrypt($request->input('password'));
        }
        $input        =  $request->all();
        if($file      =  $request->file('photo_id')){
          $FileName   = time().'_'.$file->getClientOriginalName();
          $file->move('images',$FileName);
          $photo = Photo::create(['file'=>$FileName]);
          $input['photo_id'] = $photo->id;
        }

        $user = User::create($input);
        return redirect()->intended('admin/users');
    }


    public function show($id)
    {
       $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }


    public function edit($id)
    {
         $user = User::findOrFail($id);
         $roles = Role::lists('name','id')->all();
         return view('admin.users.edit',compact('user','roles'));
    }


    public function update(UsersEditRequest $request, $id)
    {

        if(trim($request->password) == ''){
          $input = $request->except('password');
        }else{
          $input = $request->all();
          $input['password'] = bcrypt($request->input('password'));
        }
         $user     = User::findOrFail($id);
         $input    = $request->all();
         if($file  = $request->file('photo_id')){
           $fileName = time().'-'.$file->getClientOriginalName();
           $file->move('images',$fileName);
           $photo = Photo::create(['file'=>$fileName]);
           $input['photo_id'] = $photo->id;
       }

       $user->update($input);
       return redirect()->intended('/admin/users');

    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        unlink(public_path().$user->photo->file);
        $user->delete();
        return redirect('/admin/users')->with('success','The User Removed');

    }
}
