<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Blogs;

class BlogController extends Controller
{
    public function update_blogs(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'meta' => 'required',
            'author' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->with(['error'=>'Field Data Correctly']);
        }

        Blogs::where('blogs_id', $request->id)->update([
            'blogs_title' => $request->title,
            'blogs_meta' => $request->meta,
            'blogs_author' => $request->author,
            'blogs_content' => $request->content,
            'blogs_comments_section' => $request->comments_section ?? 'Yes',
            'blogs_status' => $request->status,
        ]);
        return redirect('/blog')->with(['status'=>'Update Blogs Successfully']);
    }

    public function upload_blogs($id) {
        $blogs = Blogs::where('blogs_id', $id)->first();
        return view('/createblogs', ['blogs' => $blogs]);
    }

    public function create_blogs() {
        $random = rand();
        Blogs::create([
            'blogs_id' => $random,
            'blogs_status' => 'Only Save',
        ]);
        return redirect('/blogs/update/'.$random)->with(['status'=>'Create Blogs Successfully']);
    }

    public function view_blogs() {
        $blogs = Blogs::all();
        return view('/blogs', ['blogs' => $blogs]);
    }

    public function delete_blogs($id) {
        $blogs = Blogs::where('blogs_id', $id)->delete();
        return redirect('/blog')->with(['status'=>'Delete Blogs Successfully']);
    }
}
