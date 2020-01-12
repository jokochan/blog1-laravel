<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        // $blogs = Blog::all();
        $categories = Category::latest()->get();
        // return view('categories.index', ['categories'=>$categories, 'blogs'=>$blogs]);
        return view('categories.index', ['categories'=>$categories]);

    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {   
        Category::create([
            'name' => $request['name'],
            'slug' => Str::slug($request['name'], '-')
        ]);
        return back();
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view ('categories.show', compact('category'));

    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();
        return redirect('categories');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('categories');
    }
}
