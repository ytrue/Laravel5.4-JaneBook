<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        for ($i=0; $i < 20; $i++){
            $tmp=[];
            $tmp['title']=str_random(20);
            $tmp['content']=str_random(200);
            $tmp['user_id']=mt_rand(1,100);
            $tmp['updated_at']=date('Y-m-d H:i:s');
            $tmp['created_at']=date('Y-m-d H:i:s');
            $data[]=$tmp;
        }
        DB::table('post')->insert($data);

    }
}
