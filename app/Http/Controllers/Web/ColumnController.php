<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/15
 * Time: 11:38
 */
namespace App\Http\Controllers\Web;

use App\Http\Controllers\LiuController;
use App\Http\Controllers\ApiCode;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class ColumnController extends LiuController
{
    protected $column;
    public function __construct()
    {
//        parent::__construct();
        $this->column = new \App\Model\ColumnMode();
    }

    public function getList($id)
    {
//        $list = $this->column->getList();
        $list = array();
        return view('liu.column',['list'=>$list]);
    }

}