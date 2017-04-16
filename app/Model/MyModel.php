<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/12
 * Time: 13:47
 */
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    protected function myWhere($obj,$where)
    {
        foreach ($where as $k=>$v) {
            if (is_array($v)) {
                $obj->where($k, $v[0], $v[1]);
            } else {
                $obj->where($k, '=', $v);
            }
        }
        return $obj;
    }

    protected function MyOrderBy($obj,$order)
    {
        foreach ($order as $k=>$v) {
            if (is_array($v)) {
                $obj->orderBy($v[0], $v[1]);
            } else {
                $obj->orderBy($order[0],$order[1]);
            }
        }
        return $obj;
    }

}