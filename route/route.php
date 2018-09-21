<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// use think\Route;
Route::Controller('/publics','myshop_admin/Publics');			//公共

Route::Controller('/myshopadmin','myshop_admin/Index');			//后台首页


Route::Controller('/myshopnotice','myshop_admin/Notice');		//后台公告

Route::Controller('/myshoplogin','myshop_admin/Login');			//后台登录



