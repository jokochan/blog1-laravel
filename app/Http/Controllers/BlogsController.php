<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Session;


class BlogsController extends Controller
{
    public function __construct() {
        $this->middleware('author', ['only'=>['create', 'store', 'edit', 'update']]);
        $this->middleware('admin', ['only'=>['delete', 'trash', 'restore', 'permanentDelete']]);
    }

    public function index () {
        // $blogs = Blog::orderBy('id', 'desc')->get();
        // $blogs = Blog::latest()->get(); // sort based on created_at
        $blogs = Blog::where('status', 1)->latest()->get();
        return view ('blogs.index', compact('blogs'));
    }

    public function create() {
        $categories = Category::latest()->get();
        return view ('blogs.create', compact('categories'));
    }

    public function store(Request $request) {

        // validate
        $rules = [
            'title' => ['required', 'min:20', 'max:160'],
            'body' => ['required', 'min:202'],
        ];

        $this->validate($request, $rules);

        $input = $request->all();
        // slug, meta title and meta description
        $input['slug'] = Str::slug($request->title);
        $input['meta_title'] = Str::limit($request->title, 55);
        $input['meta_description'] = Str::limit($request->body, 155);

        // image upload
        if($file = $request->file('featured_image')) {
            $name = uniqid() . '-' . $file->getClientOriginalName();  // uniqid-namafile
            $name = strtolower(str_replace(' ', '-', $name)); // replace space to - , with the filename is $name
            $file->move('images/', $name); // simpan file di folder images
            $input['featured_image'] = $name;
        }

        // $blog = Blog::create($input);
        $blogByUser = $request->user()->blogs()->create($input);
        // dd($blog);


        // sync with categories
        if($request->category_id) {
            // $blog->category()->sync($request->category_id); 
            $blogByUser->category()->sync($request->category_id); 
        }

        Session::flash('blog_created_message', 'Congratulation on creating a great blog!');

        return redirect('/blogs');
    }

    // public function show($id) {
    //     $blog = Blog::findOrFail($id);
    //     return view('blogs.show', compact('blog'));
    // }

    public function show($slug) {
    // public function show($id) {
        $blog = Blog::whereSlug($slug)->first();
        // $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id) {
        // $categories = Category::get();
        $categories = Category::latest()->get();
        $blog = Blog::findOrFail($id);
        // dd($categories); // ok
        
        // $bc = ['0', '1'];  // $bc = blog category
        $bc = array();  // $bc = blog category
        foreach ($blog->category as $c) {
            // $bc[] = $c->id;
            $bc[] = $c->id-1;
        }

        // dd($bc);  // ok


        $filtered = array_except($categories, $bc);
        // $filtered = Arr::except($categories, $bc);
        // $filtered = Arr::except($categories, ['0', '1']);  // ok

        // dd($filtered);

        // return view('blogs.edit', compact('blog', 'categories'));
        return view('blogs.edit', ['blog' => $blog, 'categories' => $categories, 'filtered' => $filtered]);
    }

    public function update(Request $request, $id) {
        // dd($request->status);
        $input = $request->all();
        $blog = Blog::findOrFail($id);

        // bila gambar featured_image ada, bila blog->feature_image ada maka unlink nama file tsb, lalu buat nama file unik yg lain.
        if($file = $request->file('featured_image')) {
            if($blog->featured_image) {
                unlink('images/featured_image/' . $blog->featured_image);
            }

            $name = uniqid() . '-' . $file->getClientOriginalName();  // uniqid-namafile
            $name = strtolower(str_replace(' ', '-', $name)); // replace space to - , with the filename is $name
            $file->move('images/', $name); // simpan file di folder images
            $input['featured_image'] = $name;
        }

        $blog->update($input);

        // sync with categories
        if($request->category_id) {
            $blog->category()->sync($request->category_id); 
        }
        
        return redirect('/blogs');
    }

    public function delete($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect('/blogs');
    }

    public function trash() {
        $trashedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('trashedBlogs'));
    }

    public function restore($id) {
        $restoredBlog = Blog::onlyTrashed()->findOrFail($id);
        $restoredBlog->restore($restoredBlog);
        return redirect('blogs');
    }

    public function permanentDelete($id){
        $permanentDeleteBlog = Blog::onlyTrashed()->findOrFail($id);
        $permanentDeleteBlog->forceDelete($permanentDeleteBlog);
        return back();
    }

    

}
