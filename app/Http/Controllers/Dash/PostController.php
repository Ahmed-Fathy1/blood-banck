<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use File;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Post::all();

      return view('dash.posts.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        return view ('dash.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'photo' =>'required',
            'content' =>'required',
            'category_id' =>'required',
          ];
          $this->validate($request, $rules);

          $data = $request->except('photo');

          if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            if ($file->isValid()) {
                $data['photo'] = $file->store('media', 'public');
            }
          }

          $record = Post::create($data);

          flash()->success("تم إضافة مقال بنجاح");

          return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $model2 = Post::findOrFail($id);
      $categories = Category::pluck('name', 'id');
      return view('dash.posts.edit', compact('model2', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $record = Post::findOrFail($id);
      $data = $request->except('photo');

      if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        if ($file->isValid()) {
            $data['photo'] = $file->store('media', 'public');
        }
      }

      $record->update($data);
      flash()->success("تم التعديل بنجاح");
      return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $record = Post::findOrFail($id);
      $record->delete();
      flash()->success("تم الحذف بنجاح");
      return back();
    }
}
