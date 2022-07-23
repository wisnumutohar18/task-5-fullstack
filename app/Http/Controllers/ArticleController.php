<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class ArticleController extends Controller
{
    public function index() //list all
    {
        $articles = DB::table('articles')
        ->join('categories', 'articles.category_id', '=', 'categories.id')
        ->select('articles.*', 'categories.name')
        ->get();


        //mengirimkan variabel $articles ke halaman views articleCRUD/index.blade.php
        return view('articleCRUD.index',compact('articles'));
        //return view('articleCRUD.index',compact('articles'));
    }

    public function show($id) //show detail
    {
        $articles = Article::find($id); //find article id
        return view('articleCRUD.show',compact('articles'));
       
    }

    public function create()
    {
        $articles = Category::all();
        return view('articleCRUD.create', compact('articles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success','Item created succesfully');
    }

    public function edit($id)
    {
        $articles = Article::find($id);
        return view('articleCRUD.edit',compact('articles'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ]);
   
        Article::find($id)->update($request->all()); //find id Article
        return redirect()->route('articles.index')->with('success','Item updated succesfully');

    }

    public function destroy($id)
    {
      Article::find($id)->delete();

      return redirect()->route('articles.index')->with('success','Item updated succesfully');
    }
}
