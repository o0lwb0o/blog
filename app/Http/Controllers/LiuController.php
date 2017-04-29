<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/12
 * Time: 10:55
 */
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LiuController extends Controller
{


    public function getArticle()
    {
        $article = new \App\Model\ArticleMode();

    }
}