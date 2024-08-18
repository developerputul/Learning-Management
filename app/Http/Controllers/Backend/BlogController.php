<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Intervention\Image\Image;

class BlogController extends Controller
{
   public function AllBlogCategory(){

    $category = BlogCategory::latest()->get();
    return view('admin.backend.blogcategory.blog_category',compact('category'));

   } // End Method

   public function BlogCategoryStore(Request $request){

    BlogCategory::insert([
        'category_name' =>$request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

    ]);

    $notification = array(
        'message' => 'Blog Category Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);

   }// End Method

   public function EditBlogCategory($id){

    $categories = BlogCategory::find($id);
    return response()->json($categories);
   }// End Method

   public function BlogCategoryUpdate(Request $request){

    $cat_id = $request->cat_id;

    BlogCategory::find($cat_id)->update([
        'category_name' =>$request->category_name,
        'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),

    ]);
    $notification = array(
        'message' => 'Blog Category Updated Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);

   }// End Method

   public function DeleteBlogCategory($id){

    BlogCategory::find($id)->delete();

    $notification = array(
        'message' => 'Blog Category Deleted Successfully',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
   } // End Method

   ////////// Blog Post All Method ////////

   public function BlogPost(){

    $post = BlogPost::latest()->get();
    return view('admin.backend.post.all_post',compact('post'));
   } // End Method

   public function AddBlogPost(){

    $blogcat = BlogCategory::latest()->get();
    return view('admin.backend.post.add_post',compact('blogcat'));

   } // End Method

   public function StoreBlogPost(Request $request){

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/post_image'), $name_gen);
        $save_url = 'upload/post_image/'.$name_gen;

        BlogPost::insert([
            'blogcat_id' => $request->blogcat_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'long_desc' => $request->long_desc,
            'post_tags' => $request->post_tags,
            'post_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('blog.post')->with($notification);
   } // End Method

}
