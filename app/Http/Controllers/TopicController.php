<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTopic;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function show(Topic $topic)
    {
        $keys=PostTopic::where('topic_id',$topic->id)->select('post_id')->get();
        $y=sizeof($keys->toArray());
        if ($y) {
            foreach ($keys as $key => $value) {
                $posts_id[] = $value->post_id;
            }
        }
        //是我的文章且还没有投稿
         if ($y){
             $posts=Post::where('user_id',\Auth::id())->whereNotIn('id',  $posts_id)->get();
         }else{
             $posts=Post::where('user_id',\Auth::id())->whereNotIn('id',  [0])->get();
         }
        //带文章数的专题
        $topic=Topic::withCount('postTopics')->find($topic->id);
        //当前模块所有投稿的文章
        $topicPost=$topic->posts()->orderBy('created_at','desc')->take(10)->get();
        return view('topic/show',compact('posts','topic','topicPost'));
    }

    public function submit(Topic $topic,Request $request)
    {
        //建议使用事务处理来处理此事件
         $post_ids=$request->input('post_ids');
         foreach ($post_ids as $key=>$value)
         {
             DB::beginTransaction();
             try{
                 PostTopic::create(['topic_id'=>$topic->id,'post_id'=>$value]);
                 Post::where('id',$value)->update(['key'=>1]);
                 DB::commit();
             }catch (\Exception $exception){
                 DB::rollBack();
             }
         }
        return  back();
    }
}
