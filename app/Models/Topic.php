<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    //获取当前专题的所有文章
    public function posts()
    {
        return $this->belongsToMany(\App\Models\Post::class,'post_topics','topic_id','post_id');
    }

    public function postTopics()
    {
        return $this->hasMany(\App\Models\PostTopic::class,'topic_id');
    }
}
