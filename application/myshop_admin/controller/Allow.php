<?php
namespace app\myshop_admin\controller;

use think\Controller;
use think\Db;
use think\Session;

Class Allow extends Controller
{
	public $dbt = 'ms_';								//表前缀
	public $dbimg = 'ms_img';							//文件表
	public $imgPath = DS.'uploads'.DS;		//普通上传的图片路径

	protected function _initialize()
	{

	}

}
