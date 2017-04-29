<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/17
 * Time: 10:19
 */
namespace App\Http\Controllers\Web;

use App\Http\Controllers\LiuController;
use Illuminate\Http\Request;

class HomeController extends LiuController
{
    protected $article;
    protected $column;
    public function __construct()
    {
        $this->article = new \App\Model\ArticleMode();
        $this->column = new \App\Model\ColumnMode();
    }

    public function index($page = 1)
    {
        $number = 10;
        $list = array();
        $pages = array();
        $data = $this->column->getList();
        foreach ($data as &$v) {
            $v->column_nu = $this->article->getCount(array('column_id' => $v->id));
        }
        $where = array('status'=>1);
        $articleCount = $this->article->getCount($where);
        $num = ceil($articleCount/$number);
        if ($page<=$num) {
            $offset = $page > 1 ? $page * $number : 0;
            $list = $this->article->getList($where, array('*'), array('id', 'asc'), $offset, $number);
            unset($v);
            foreach ($list as &$vo) {
                $vo->column_name = $this->column->firstOne(array('id' => $vo->column_id), 'name');
            }
            unset($vo);
            $pages = ['page' => $num, 'next' => $page + 1];
        }
        return view('liu.home',['list'=>$list,'data'=>$data,'page'=>$pages]);
    }
}