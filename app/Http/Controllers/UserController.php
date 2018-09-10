<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function setting()
    {
        return view('user.setting');
    }

    public function settingStore()
    {

    }

    public  function show(User $user)
    {
        //获取当前用户的信息，包含关注/粉丝/文章数
        $user=User::withCount(['stars','fans','post'])->find($user->id);
        //获取当前用户的文章列表，取create时间最新10条
        $posts=$user->posts()->orderBy('created_at','desc')->take(10)->get();
        //这个人关注的用户，包含关注用户的 关注/粉丝/文章数
        $stars=$user->stars;
        $susers=User::whereIn('id',$stars->pluck('star_id'))->withCount(['stars','fans','post'])->get();
        //这个人的粉丝用户，包含粉丝用户的 关注/粉丝/文章数
        $fans=$user->fans;
        $fusers=User::whereIn('id',$fans->pluck('fan_id'))->withCount(['stars','fans','post'])->get();


        return view("user/show",compact('user','posts','susers','fusers'));
    }

    public function fan(User $user)
    {
        $me=\Auth::user();
        $me->doFan($user->id);
        return back();
    }

    public function unfan(User $user)
    {
        $me=\Auth::user();
        $me->doUnFan($user->id);
        return back();
    }
}
