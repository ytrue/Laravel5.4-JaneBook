<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/9/4
 * Time: 14:55
 */

namespace App\Admin\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home.index');
    }


}