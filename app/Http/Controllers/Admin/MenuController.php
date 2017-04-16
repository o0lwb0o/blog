<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/12
 * Time: 10:50
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
//use phpDocumentor\Reflection\Types\Object;
use App\Http\Controllers\ApiCode;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends AdminController
{
    protected $menu;
    public function __construct()
    {
        parent::__construct();
        $this->menu = new \App\Model\MenuMode();
    }

    public function getList()
    {
        $list =  $this->menu->getList(array(),'*',array(array('id','asc'),array('path','asc')));
        $arr =  is_object($list)?$this->objectToArray($list):$list;
        $list =$this->arr2tree($arr);
        return view('admin.menu',['list'=>$list]);
    }


    public function add($id)
    {
        $where = array();
        $where['id'] = $id;
        $list = $this->menu->getOne($where);
        return view('admin.menuadd',['list'=>$list]);
    }
    public function eidt($id)
    {
        $where = array();
        $where['id'] = $id;
        $list = $this->menu->getOne($where);
        if ($list->pid > 0) {
            $a = $this->menu->getOne(array('id' => $list->pid));
            $list->pids = $a->id;
            $list->pid_title = $a->title;
        }else {
            $list->pids = 0;
            $list->pid_title = '顶级';
        }
        return view('admin.menueidt',['list'=>$list]);
    }
    public function del($id)
    {
        echo 3;
    }

    public function menuPost(Request $request)
    {
        $res = array();
        $code = ApiCode::CODE_9999_TYPE;
        $url = url('admin');
        do {
            if (!$request->isMethod('post')) {
                break;
            }

            $act = $request->input('act');
            $title = $request->input('title');
            $icon = $request->input('icon');
            $urls = $request->input('url');
            $status = $request->input('status', 0);
            if(empty($title) || empty($urls) || empty($act)) {
                break;
            }
            if ($act == 'add') {
                $pid = $request->input('pid',0);
                $path = $request->input('path',0);

                $data = array();
                $data['title'] = $title;
                $data['pid'] = $pid;
                $data['url'] = $urls?$urls:'';
                $data['path'] = $path.'-'.$pid;
                $data['icon'] = $icon?$icon:'';
                $data['status'] = $status;
                $data['create_by'] = Auth::guard('admin')->id();
                $data['create_at'] = time();
                $ret = $this->menu->add($data);
                if (!$ret) {
                    $url = url('admin/menu/add');
                    $code = ApiCode::CODE_9999_TYPE;
                    break;
                }
            }elseif ($act == 'eidt') {

                $id = $request->input('id', '');
                $data = array();
                $data['title'] = $title;
                $data['url'] = $urls;
                $data['icon'] = $icon;
                $data['status'] = $status;
                $ret = $this->menu->eidt(array('id'=>$id),$data);
                if (!$ret) {
                    $url = url('admin/menu/eidt');
                    $code = ApiCode::CODE_9999_TYPE;
                    break;
                }
            }
            $code = ApiCode::CODE_0000_TYPE;
            $url = url('admin/menu/getlist');
        }while(false);
        $res['msg'] = ApiCode::$msg[$code];
        $res['url'] = $url;
        return redirect('prompt')->with('list', $res);
    }

    /**
     * 導航欄
     * @param $id
     */
    public function getMenu($id)
    {
        $where = array();
        $where['path'] = array('like','0-1%');

        $list = $this->menu->getList($where);
        $arr =  is_object($list)?$this->objectToArray($list):$list;
        $list =$this->arr2tree($arr);
        $data = array();
        if (!empty($list)) {
            foreach ($list as $k=>$v) {
                $data[$k]["title"]=$v['title'];
                $data[$k]['icon'] = $v['icon'];
                $data[$k]['spread'] = $k==0? true:false;
                if (!empty($v['sub'])){
                    foreach ($v['sub'] as $key=>$value) {
                        $data[$k]['children'][$key]["title"] = $value['title'];
                        $data[$k]['children'][$key]['icon'] = $value['icon'];
                        $data[$k]['children'][$key]['href'] = url($value['url']);
                    }
                }
            }
        }
        exit(json_encode($data));
    }
}