<?php
/**
 * Created by PhpStorm.
 * User: 阳毅
 * Date: 2018/9/4
 * Time: 14:42
 */

namespace App\Admin\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    public function layout()
    {
        return view('admin.layout.layout');
    }
}