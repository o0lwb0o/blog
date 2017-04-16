<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/12
 * Time: 11:16
 */
namespace App\Model;

use App\Model\MyModel;

use DB;
class ArticleMode extends MyModel
{
    // 设置当前模型对应的数据表名称
    protected $table = 'article';
    //指定主键
    protected $primaryKey= 'id';
    protected $field;

    /**添加单条
     * @param $data
     * @return string
     */
    public function add($data)
    {
        if (empty($data)) {
            return false;
        }
        $id = DB::table($this->table)->insertGetId($data);
        return $id;
    }

    /** 修改信息
     * @param $where
     * @param $data
     * @return bool|int|string
     */
    public function eidt($where,$data)
    {
        if (empty($where) || empty($data)) {
            return false;
        }
        $ret = DB::table($this->table)->where($where)->update($data);
        return $ret;
    }

    /**获取多条信息
     * @param array $where
     * @param string $field
     * @param string $order
     * @return array
     */
    public function getList($where=array(), $field = array('*'), $order = array('id','asc'))
    {
        $obj =  DB::table($this->table);
        $obj = $this->myWhere($obj,$where);
        $obj = $this->myOrderBy($obj,$order);
        $ret = $obj->select($field)->get();
        return $ret;
    }


    /**获取一条信息
     * @param $where
     * @param string $field
     * @return array|bool
     */
    public function getOne($where, $field = array('*'))
    {
        if (empty($where)) {
            return false;
        }
        $obj =  DB::table($this->table);
        $obj = $this->myWhere($obj,$where);
        $ret = $obj->select($field)->first();
        return $ret;
    }

    /**移除数据
     * @param $where
     * @return bool|int
     */
    public function del($where)
    {
        if (empty($where)) {
            return false;
        }
        $obj =  DB::table($this->table);
        $obj = $this->myWhere($obj,$where);
        $ret = $obj->delete();
        return $ret;
    }
}