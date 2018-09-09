<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    protected $fillable=['name','email','password'];

    //用户的文章列表
    public function posts()
    {
        return $this->hasMany(\App\Models\Post::class,'user_id','id');
    }
    //关注我的fan模型
    public  function fans()
    {
        return $this->hasMany(\App\Models\Fan::class,'star_id','id');
    }

    //我关注的fan模型
    public function stars()
    {
        return $this->hasMany(\App\Models\Fan::class,'fan_id','id');
    }

    //关注某人
    public function doFan($uid)
    {
        $fan=new \App\Models\Fan();
        $fan->star_id=$uid;
        return $this->stars()->save($fan);
    }
    //取消关注
    public function doUnFan($uid)
    {
        $fan=new \App\Models\Fan();
        $fan->star_id=$uid;
        return $this->stars()->delete($fan);
    }

    //当前用户是否被uid关注了
    public function hasFan($uid)
    {
        return $this->fans()->where('fan_id',$uid)->count();
    }

    //当前用户是否关注了uid
    public function hasStar($uid)
    {
        return $this->stars()->where('star_id',$uid)->count();
    }

}
