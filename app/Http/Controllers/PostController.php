<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Zan;
use Illuminate\Http\Request;
use function Sodium\compare;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //文章列表页
    public function index()
    {
        $post=Post::orderBy('created_at', 'desc')->withCount(["zans","comments"])->paginate(5);
        return view('post.index',['model'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //文章创建页
    public function create()
    {
        //
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //文章提交添加
    public function store(Request $request)
    {
        //check
        $this->validate($request,[
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:100',
        ]);
        $data=$request->input();
        $data['user_id']=\Auth::id();
        Post::create($data);
        return redirect('/post');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //文章详情页
    public function show(Post $post)
    {
        //
        $post->load('comments');
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //文章编辑页
    public function edit(Post $post)
    {
        //
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //文章提交修改
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|max:255|min:4',
            'content' => 'required|min:100',
        ]);

        $this->authorize('update',$post);

        $post->update(request(['title', 'content']));
        return redirect("/post/{$post->id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //文章删除
    public function destroy($id)
    {
        //
    }

    public function delete(Post $post)
    {
        $this->authorize('delete',$post);
        $post->delete();
        return redirect("/post");
    }

    //评论
    public function comment()
    {
        $this->validate(request(),[
            'post_id' => 'required|exists:post,id',
            'content' => 'required|min:10',
        ]);
        $user_id = \Auth::id();
        $params = array_merge(
            request(['post_id', 'content']),
            compact('user_id')
        );
        \App\Models\Comment::create($params);
        return back();
    }

    //赞
    public function zan(Post $post)
    {
        $data=[
            'user_id'=>\Auth::id(),
            'post_id'=>$post->id,
        ];
        Zan::create($data);
        return back();

    }

    //取消赞
    public function unzan(Post $post)
    {
        $post->zan(\Auth::id())->delete();
        return back();
    }



}
