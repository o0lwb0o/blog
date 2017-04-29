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

class ArticleController extends LiuController
{
    protected $article;
//    protected $column;
    public function __construct()
    {
//        parent::__construct();
        $this->article = new \App\Model\ArticleMode();
//        $this->column = new \App\Model\ColumnMode();
    }

    public function getList($id)
    {
        var_dump($id);
        $list = $this->article->getList();
        $list = array();
        return view('liu.article',['list'=>$list]);
    }
    public function getInfo($id)
    {
        $list = $this->article->getOne(array('id'=>$id));
        $list->content =   str_replace(array("\r\n"), "\\r\\n", $list->content);
        return view('liu.article',['list'=>$list]);
    }


}