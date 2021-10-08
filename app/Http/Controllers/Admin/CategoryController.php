<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
         ]);
        $category = Category::create($request->all());
        return redirect()->route('admin.category.index')->with('info','La categoria '.$category->name.' se creo con exito');
    }
 
    
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>'required',
            'slug'=>"required|unique:categories,slug,$category->id"
         ]);
         $category->update($request->all());
         return redirect()->route('admin.category.edit',$category)->with('info','La categoria se actualizo a: ' .$category->name.'');

    }

    
    public function destroy(Category $categorium)
    {
        $categorium->delete();
        return redirect()->route('admin.category.index')->with('info','La categoria se elimino con exito');
    }
}