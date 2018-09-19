<?php
namespace app\myshop_admin\controller;

use app\myshop_admin\controller\Allow;
use think\Db;
use think\Session;

class Index extends Allow
{
    public function getIndex()
    {
    	return $this->fetch('Indexpublic/index');
    }

    public function getAdmin()
    {
        //分页
        $pro = input('pro')==""?1:input('pro');                         //获取分页传过来的当前页
        $showNum = input('data_num')?input('data_num'):'10';             //设定每一个显示的条数
        $str = (($pro-1)*$showNum).",".$showNum;                        //分页

    	$data = Db::table($this->dbt.'admin')->select();

        //分页
        $num = count($data);
        $arr['page'] = ceil($num/$showNum);//获取条数
        $page = $arr['page'];
        $arr['nums'] = $num;
        if($pro-2<=0){
            echo 1;
            $arr['pros'] = 1;
            $arr['proe'] = $page<8?$page+1:8;
        }else if($pro+1>$page){
            echo 2;
            $arr['pros'] = $page-4<=0?1:$pro-4;
            $arr['proe'] = $page+1;
        }else{
            echo 3;
            $arr['pros'] = $pro-2<=0?1:$pro-2;
            $arr['proe'] = $page+1;
        }
        $arr['pro'] = $pro;                                                                                 //当前页


    	$arr['row']        = $data;																			//列表数据
    	return $this->fetch('Admin/admin',$arr);
    }

}
