<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/13
 * Time: 9:16
 */
namespace App\Http\Controllers\Admin;

class AdminController extends admin
{
    public static $rules = array(
        'username'=>'required|alpha|unique:admin|alpha_num',
//        'email'=>'required|email|unique:users',
        'password'=>'required|alpha_num|between:6,12|confirmed',
//        'password_confirmation'=>'required|alpha_num|between:6,12'
    );

}