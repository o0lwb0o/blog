<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/15
 * Time: 11:38
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiCode;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class ColumnController extends AdminController
{
    protected $column;
    public function __construct()
    {
        parent::__construct();
        $this->column = new \App\Model\ColumnMode();
    }

    public function getList()
    {
        $list = $this->column->getList();
        return view('admin.column',['list'=>$list]);
    }

    public function add(){
        return view('admin.columnadd');
    }


    public function eidt($id){
        $where = array();
        $where['id'] = $id;
        $list = $this->column->getOne($where);
        return view('admin.columneidt',['list'=>$list]);
    }

    public function del($id)
    {
        $where = array();
        $where['id'] = $id;
        $ret = $this->column->del($where);
        if (!$ret){
            $code = ApiCode::CODE_9999_TYPE;
        }else {
            $code = ApiCode::CODE_0000_TYPE;
        }
        $res['msg'] = ApiCode::$msg[$code];
        $res['url'] = url('admin/column/getlist');
        return redirect('prompt')->with('list', $res);
    }


    public function columnPost(Request $request)
    {
        $res = array();
        $code = ApiCode::CODE_9999_TYPE;
        $url = url('admin');
        do {
            if (!$request->isMethod('post')) {
                break;
            }
            $act = $request->input('act');

            $name = $request->input('name');
            $info = $request->input('info');
            if(empty($name) || empty($act)) {
                break;
            }
            if ($act == 'add') {
                $data = array();
                $data['name'] = $name;
                $data['info'] = $info?$info:'';
                $ret = $this->column->add($data);
                if (!$ret) {
                    $url = url('admin/column/add');
                    $code = ApiCode::CODE_9999_TYPE;
                    break;
                }
            }elseif ($act == 'eidt') {

                $id = $request->input('id', '');
                $data = array();
                $data['name'] = $name;
                $data['info'] = $info?$info:'';
                $ret = $this->column->eidt(array('id'=>$id),$data);
                if (!$ret) {
                    $url = url('admin/column/eidt');
                    $code = ApiCode::CODE_9999_TYPE;
                    break;
                }
            }
            $code = ApiCode::CODE_0000_TYPE;
            $url = url('admin/column/getlist');
        }while(false);
        $res['msg'] = ApiCode::$msg[$code];
        $res['url'] = $url;
        return redirect('prompt')->with('list', $res);
    }
}