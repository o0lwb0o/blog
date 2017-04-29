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

class ArticleController extends AdminController
{
    protected $article;
    protected $column;
    public function __construct()
    {
        parent::__construct();
        $this->article = new \App\Model\ArticleMode();
        $this->column = new \App\Model\ColumnMode();
    }

    public function getList()
    {
        $list = $this->article->getList();
        return view('admin.article',['list'=>$list]);
    }

    public function add(){

        $list = $this->column->getList();
        return view('admin.articleadd',['list'=>$list]);
    }


    public function eidt($id){
        $where = array();
        $where['id'] = $id;
        $data = $this->column->getList();
        $list = $this->article->getOne($where);
        return view('admin.articleeidt',['list'=>$data,'data'=>$list]);
    }

    public function del($id)
    {
        $where = array();
        $where['id'] = $id;
        $ret = $this->article->del($where);
        if (!$ret){
            $code = ApiCode::CODE_9999_TYPE;
        }else {
            $code = ApiCode::CODE_0000_TYPE;
        }
        $res['msg'] = ApiCode::$msg[$code];
        $res['url'] = url('admin/article/getlist');
        return redirect('prompt')->with('list', $res);
    }


    public function articlePost(Request $request)
    {
        $res = array();
        $code = ApiCode::CODE_9999_TYPE;
        $url = url('admin');
        do {
            if (!$request->isMethod('post')) {
                break;
            }
            $act = $request->input('act');

            $pid = $request->input('pid');
            $title = $request->input('title');
            $keyword = $request->input('keyword');
            $abstract = $request->input('abstract');
            $content = $request->input('content');
            if(empty($pid) || empty($title)|| empty($keyword)|| empty($abstract)|| empty($content)|| empty($act)) {
                $code = ApiCode::CODE_1002_TYPE;
                break;
            }
            if ($act == 'add') {
                $data = array();
                $data['title'] = $title;
                $data['content'] = $content;
                $data['column_id'] = $pid;
                $data['keyword'] = $keyword;
                $data['abstract'] = $abstract;
                $data['user_id'] = Auth::guard('admin')->id();
                $data['addtime'] = time();

                $ret = $this->article->add($data);
                if (!$ret) {
                    $url = url('admin/article/add');
                    $code = ApiCode::CODE_9999_TYPE;
                    break;
                }
            }elseif ($act == 'eidt') {

                $id = $request->input('id', '');
                $data = array();
                $data['title'] = $title;
                $data['content'] = $content;
                $data['column_id'] = $pid;
                $data['keyword'] = $keyword;
                $data['abstract'] = $abstract;
                $data['uptime'] = time();
                $ret = $this->article->eidt(array('id'=>$id),$data);
                if (!$ret) {
                    $url = url('admin/article/eidt',['id'=>$id]);
                    $code = ApiCode::CODE_9999_TYPE;
                    break;
                }
            }
            $code = ApiCode::CODE_0000_TYPE;
            $url = url('admin/article/getlist');
        }while(false);
        $res['msg'] = ApiCode::$msg[$code];
        $res['url'] = $url;
        return redirect('prompt')->with('list', $res);
    }
}