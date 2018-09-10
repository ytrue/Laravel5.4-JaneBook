<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/9/10
 * Time: 15:04
 */

namespace App\Admin\Controllers;


use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $post=Post::orderBy('created_at', 'desc')->where('status',0)->paginate(10);
        return view('admin.post.index',compact('post'));
    }


}