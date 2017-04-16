<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/10
 * Time: 11:30
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use think\console\Input;


class HomeController extends  AdminController
{
    protected $menu;
    public function __construct()
    {
        parent::__construct();
        $this->menu = new \App\Model\MenuMode();
    }

    public function index()
    {
        return view('admin.home');
    }

    public function blogger()
    {
        $blog = new \App\Model\BloggerModel();
        $data = $blog->getList(array())->toarray();
        return view('admin.blogger',['list'=>$data[0]]);
    }

    public function uplode(Request $request)
    {
//       $file =  $request->file('file');
//       var_dump($_FILES);
        $file = Input::file('file');
    }

}