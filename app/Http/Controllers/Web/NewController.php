<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/17
 * Time: 10:51
 */
namespace App\Http\Controllers\Web;

use App\Http\Controllers\LiuController;
use Illuminate\Http\Request;

class NewController extends LiuController
{
    public function getList($id)
    {

        return view('liu.new');
    }
}