<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//首页数据      -----------------------------------------------
    //主数据
    function listindex($data)
    {
        $arr['empty']      = "<tr><td colspan='100' style='text-align:center'>没有任何数据</td></tr>";        //显示空
        $arr['table']      = $data['table'];            //模板上使用,数据表
        $arr['con']        = $data['con'];              //模板上使用,控制器
        $arr['fun']        = $data['fun'];              //模板上使用,方法
        $arr['data_num']   = $data['showNum'];          //搜索保留值    
        $arr['pro']        = $data['pro'];              //当前页
        $arr['row']        = $data['row'];              //遍历数据
        $arr['title']      = $data['title_txt'];        //子目录
        $arr['title_txt']  = $data['title'];            //主目录
        $arr['page']       = $data['page'];             //显示页数
        $arr['nums']       = $data['nums'];             //共多少条数据
        $arr['pros']       = $data['pros'];             //分页开始
        $arr['proe']       = $data['proe'];             //分页结束
        $arr['s_ty']       = $data['s_ty'];         	//搜索键
        $arr['s_val']      = $data['s_val'];        	//搜索值

        return $arr;
    }
    //分页数据,1.显示页数,2.数据数量,3当前页
    function pageindex($showNum , $num ,$pro){
        $arr_page = $showNum == 'x'?1:ceil($num/$showNum);           //获取条数
        $page = $arr_page;
        $arr_nums = $num;
        if($pro-2<=0){
            $arr_pros = 1;
            $arr_proe = $page<8?$page+1:8;
        }else if($pro+1>$page){
            $arr_pros = $page-4<=0?1:$pro-4;
            $arr_proe = $page+1;
        }else{
            $arr_pros = $pro-2<=0?1:$pro-2;
            $arr_proe = $page+1;
        }
        $arr['arr_page'] = $arr_page;
        $arr['arr_nums'] = $arr_nums;
        $arr['arr_pros'] = $arr_pros;
        $arr['arr_proe'] = $arr_proe;
        return $arr;
    }
//首页数据  end-------------------------------------------------