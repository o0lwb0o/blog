<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/10
 * Time: 11:30
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use think\console\Input;
use Validator;



class HomeController extends  AdminController
{
    protected $menu;
    public function __construct()
    {
        parent::__construct();
        $this->menu = new \App\Model\MenuMode();
    }

    public function index()
    {
        return view('admin.home');
    }

    public function blogger()
    {
        $blog = new \App\Model\BloggerModel();
        $data = $blog->getList(array())->toarray();
        return view('admin.blogger',['list'=>$data[0]]);
    }

    public function upload(Request $request)
    {

        $code = 1;
        $msg = '未知錯誤';
        $url = '';
        $time = date('Ymd');
        $path = public_path();
        $dir = 'uploads/article/' .$time;
        is_dir($dir) || mkdir($path.'/'.$dir,0777,true);  //如果不存在则创建目录
        do {
            if (!$request->hasFile('image')) {
                $code = 1;
                break;
            }

            $file = $request->file('image');
            $data = $request->all();
            $rules = [
                'image'    => 'max:5120',
            ];
            $messages = [
                'image.max'    => '文件过大,文件大小不得超出5MB',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if (!$validator->passes()) {
                $code = 1;
                $msg = $validator->messages();
                break;
            }
            $name = $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            $check_ext = in_array($ext, ['gif', 'jpg', 'png'], true);
            if (!$check_ext) {
                $code = 1;
                $msg = '文件类型不允许,请上传常规的图片（gif|jpg|png）文件';
                break;
            }
            $fileName = md5(uniqid().time()).$ext;
            $fullfilename = '/'.$dir.'/'.$fileName;  //原始完整路径
            if (!$file->isValid()) {
                $code = 1;
                $msg = '文件校验失败';
                break;
            }
            $uploadSuccess = $file->move($path.'/'.$dir, $fileName);  //移动文件
            $oFilePath = $dir.'/'.$fileName;
            $code = 0;
            $msg = '上传成功';
            $url = $fullfilename;
        } while(false);
        $json = [
            'status' => $code,
            'message' => $msg,
            'url' => $url,
        ];
        return response()->json($json);
    }

}