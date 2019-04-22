<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index')->with('categories',$categories);
    }


    public function create()
    {

    }

    public function store(Request $request)
    {
        Category::create(['name'=>$request->input('name')]);
        return redirect('/admin/categories');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {

      $category = Category::findOrFail($id);
      $category->update(['name'=>$request->name]);
      return redirect('/admin/categories');
    }


    public function destroy($id)
    {
      $category = Category::findOrFail($id);
      $category->delete();
      return redirect('/admin/categories');
    }

    
}
