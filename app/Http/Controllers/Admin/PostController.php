<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post_category;
use App\Models\Post;
use Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('backend.admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories  = Category::where('status', 1)->get();
        return view('backend.admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;

        $image = $request->file('image');
        if($image)
        {
            $image_name=str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path = 'images/post_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $post->image = $image_url;
            }
        }
        $post->description = $request->description;
        $post->status = $request->status;
        $post->save();

        $category_id= $request->category_id;
        if ($category_id) {
            foreach ($category_id as $key => $value ){
                $post_category = new Post_category();
                $post_category->post_id =$post->id;
                $post_category->category_id=$value;
                $post_category->save();
            }   
        }

        $notification=array(
            'message' => 'Post Saved Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findorfail($id);
        $categories  = Category::where('status', 1)->get();
        $post_categories = Post_category::where('post_id', $id)->get();
        return view('backend.admin.post.edit', compact('post', 'categories', 'post_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findorfail($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->meta_title = $request->meta_title;
        $post->meta_description = $request->meta_description;

        $image = $request->file('image');
        if($image)
        {
            $image_name=str::random(5);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name. '.' .$ext;
            $upload_path = 'images/post_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if($success)
            {
                $old_image = $request->old_image;
                if (file_exists($old_image)) {
                    unlink($request->old_image);
                }
                
                $post->image = $image_url;
            }
        }
        $post->description = $request->description;
        $post->status = $request->status;
        $post->save();

        $PostCategory = Post_category::where('post_id', $id)->delete();
        $category_id= $request->category_id;
        if ($category_id) {
            foreach ($category_id as $key => $value ){
                $post_category = new Post_category();
                $post_category->post_id =$post->id;
                $post_category->category_id=$value;
                $post_category->save();
            }   
        }

        $notification=array(
            'message' => 'Post Updated Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagePath = Post::select('image')->where('id', $id)->first();
        $filePath = $imagePath->image;
        if (file_exists($filePath)) {
            unlink($filePath);
            Post::where('id', $id)->delete();
        }else{
            Post::where('id', $id)->delete();
        }
        
        $PostCategory = Post_category::where('post_id', $id)->delete();

        $notification=array(
            'message' => 'Post Deleted Successfully !!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
