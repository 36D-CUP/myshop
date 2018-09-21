<?php
namespace app\myshop_admin\controller;

use think\Controller;
use think\Db;
use think\Session;

Class Allow extends Controller
{
	public $dbt = 'ms_';								//表前缀
	public $dbimg = 'ms_img';							//文件表
	public $imgPath = '/myshop/public/uploads/';		//普通上传的图片路径
	public $url     = '/myshop/public/';		//普通上传的图片路径

	protected function initialize()
	{
	    Session_start();       //使用SESSION前必须调用该函数。

		if(!isset($_SESSION['admin_id'])){
			return $this->redirect($this->url.'myshoplogin/login');
	    }
	}

}
