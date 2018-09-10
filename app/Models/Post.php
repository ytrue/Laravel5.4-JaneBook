<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Sodium\crypto_box_keypair_from_secretkey_and_publickey;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //软删除
    use SoftDeletes;

    protected $fillable=['title','content','user_id'];
    protected $guarded;
    protected $dates = ['deleted_at'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->orderBy('created_at','desc');
    }

    //和用户进行关联
    public function zan($user_id)
    {
        return $this->hasOne(\App\Models\Zan::class)->where('user_id',$user_id);
    }

    public function zans()
    {
        return $this->hasMany(\App\Models\Zan::class);
    }
}

