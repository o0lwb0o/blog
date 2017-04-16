<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/12
 * Time: 10:55
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use EndaEditor;

class AdminController extends Controller
{
    /**
     * 页面标题
     * @var string
     */
    protected $title;

    /**
     * 默认检查用户登录状态
     * @var bool
     */
    protected $checkLogin = false;

    /**
     * 默认检查节点访问权限
     * @var bool
     */
    protected $checkAuth = false;

    /**
     * 后台权限控制初始化方法
     */
    public function __construct() {

        # 用户登录状态检查
        if (($this->checkLogin || $this->checkAuth) && !$this->isLogin()) {
//            $this->redirect('index/login');
        }
        # 节点访问权限检查
        if ($this->checkLogin && $this->checkAuth) {
//            if (!auth(join('/', [$this->request->module(), $this->request->controller(), $this->request->action()]))) {
//                $this->error('抱歉，您没有访问该模块的权限！');
//            }
        }
        # 初始化赋值常用变量
//        if ($this->request->isGet()) {
//            $class_uri = strtolower($this->request->module() . '/' . $this->request->controller());
//            $this->assign('classuri', $class_uri);
//        }
    }
    /**
     * 判断用户是否登录
     * @return bool
     */
    protected function isLogin() {
        $user = session('user');
        if (empty($user) || empty($user['id'])) {
            return false;
        }
        return true;
    }

    /**
     * 一维数据数组生成数据树
     * @param array $list 数据列表
     * @param string $id 父ID Key
     * @param string $pid ID Key
     * @param string $son 定义子数据Key
     * @return array
     */
    public  function arr2tree($list, $id = 'id', $pid = 'pid', $son = 'sub') {
        $tree = $map = array();
        foreach ($list as $v){
            $list = $v;
        }
        foreach ($list as $item) {
            $map[$item[$id]] = $item;
        }
        foreach ($list as $item) {
            if (isset($item[$pid]) && isset($map[$item[$pid]])) {
                $map[$item[$pid]][$son][] = &$map[$item[$id]];
            } else {
                $tree[] = &$map[$item[$id]];
            }
        }
        unset($map);
        return $tree;
    }

    /**
     * 数组 转 对象
     *
     * @param array $arr 数组
     * @return object
     */
    public function arrayToObject($arr) {
        if (gettype($arr) != 'array') {
            return;
        }
        foreach ($arr as $k => $v) {
            if (gettype($v) == 'array' || getType($v) == 'object') {
                $arr[$k] = (object)$this->array_to_object($v);
            }
        }

        return (object)$arr;
    }

    /**
     * 对象 转 数组
     *
     * @param object $obj 对象
     * @return array
     */
    public function objectToArray($obj) {
        $obj = (array)$obj;
        foreach ($obj as $k => $v) {
            if (gettype($v) == 'resource') {
                return;
            }
            if (gettype($v) == 'object' || gettype($v) == 'array') {
                $obj[$k] = (array)$this->objectToArray($v);
            }
        }

        return $obj;
    }
}