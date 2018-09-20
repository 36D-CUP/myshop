<?php
namespace app\myshop_admin\controller;

use app\myshop_admin\controller\Allow;
use think\Db;
use think\Session;

class Index extends Allow
{
    //首页
    public function getIndex()
    {
        return $this->fetch('Indexpublic/index');
    }

    //管理员列表
    public function getAdmin()
    {
        //勿动
            //分页
            $pro = input('pro')==""?1:input('pro');                         //获取分页传过来的当前页
            $showNum = input('data_num')?input('data_num'):'10';            //设定每一个显示的条数
            $str = $showNum == 'x'?'0,':(($pro-1)*$showNum).",".$showNum;   //分页,x为全部
            //搜索
            $s_val  = input('search_value');                                //获取搜索传过来的值
            $s_ty   = input('search_type');                                 //获取搜索传过来的字段名
            $s_type = $s_val?input('type'):'其他';                          //获取搜索传过来的搜索类型
        //勿动


        $table = $this->dbt.'admin';        //数据表

        switch($s_type){
            case 1:
                if($s_ty == 'id'){
                    $where['id'] = $s_val;
                }else{
                    $where[] = [$s_ty,'like', '%' . $s_val . '%'];
                }
                
                $num = Db::table($table)->where($where)->count();                   //数据总数量
                $data = Db::table($table)->where($where)->limit($str)->select();    //数据
            break;
            default:
                $num = Db::table($table)->count();                                  //数据总数量
                $data = Db::table($table)->limit($str)->select();                   //数据
            break;
        }

        //分页1.显示页数,2.数据数量,3当前页          封装在common
        $pageindex = pageindex($showNum , $num ,$pro);


        $arr_data = [
            'table'     => $table,                      //数据表名          
            'con'       => 'myshopadmin',               //控制器名
            'fun'       => 'admin',                     //admin
            'showNum'   => $showNum,                    //显示页数
            'pro'       => $pro,                        //当前页
            'row'       => $data,                       //遍历数据
            'title'     => '管理员管理',                 //主目录名称
            'title_txt' => '管理员列表',                 //子目录名称
            'page'      => $pageindex['arr_page'],      //页数
            'nums'      => $pageindex['arr_nums'],      //共多少条数据
            'pros'      => $pageindex['arr_pros'],      //分页开始
            'proe'      => $pageindex['arr_proe'],      //分页结束
            's_ty'      => $s_ty,                       //搜索键
            's_val'     => $s_val,                      //搜索值
        ];

        //组装数据      封装在common
        $arr = listindex($arr_data);

        return $this->fetch('Admin/admin',$arr);
    }

    //管理员添加
    public function getAdminadd()
    {
        return $this->fetch('Admin/adminadd');
    }



}
