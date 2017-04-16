<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/13
 * Time: 15:07
 */
namespace App\Http\Controllers;

class ApiCode {

    const CODE_0000_TYPE = '0000';
    const CODE_9999_TYPE = '9999';

    const CODE_1000_TYPE = '1000';
    const CODE_1001_TYPE = '1001';
    const CODE_1002_TYPE = '1002';

    //圖片上傳
    const CODE_0_TYPE = '0';
    const CODE_1_TYPE = '1';

    public static $msg = array(
        self::CODE_0000_TYPE    => '操作成功',
        self::CODE_9999_TYPE    => '操作失败',

        self::CODE_1000_TYPE    => '登陆成功',
        self::CODE_1001_TYPE    => '登陆失败',
        self::CODE_1002_TYPE    => '缺少参数',

        //圖片上傳
        self::CODE_0_TYPE    => '缺少参数',
        self::CODE_1_TYPE    => '缺少参数',
    );

}