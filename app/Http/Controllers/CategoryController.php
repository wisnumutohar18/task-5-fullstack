<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index() //list all
    {
        $categories = Category::orderBy('id','ASC')->get();

        //mengirimkan variabel $faculties ke halaman views categoryCRUD/index.blade.php
        return view('categoryCRUD.index',compact('categories'));
        //return view('categoryCRUD.index',compact('categories'));
    }

    public function show($id) //show detail
    {
        $categories = Category::find($id); //find category id
        return view('categoryCRUD.show',compact('categories'));
       
    }

    public function create()
    {
        return view('categoryCRUD.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success','Item created succesfully');
    }

    public function edit($id)
    {
        $categories = Category::find($id);
        return view('categoryCRUD.edit',compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
   
        Category::find($id)->update($request->all()); //find id category
        return redirect()->route('categories.index')->with('success','Item updated succesfully');

    }

    public function destroy($id)
    {
      Category::find($id)->delete();

      return redirect()->route('categories.index')->with('success','Item updated succesfully');
    }
}
