<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Cats extends Base
{

    public $row = array();
	/*
     * 初始化操作
     */
    public function _initialize() 
    {	
        parent::_initialize();
        
        // $param = input('param.');

        // $tid = input('tid');
        // // dump($param);die;
        // /*获取当前栏目ID以及模型ID*/
        // $page_tmp = input('param.page/s', 0);
        // if (empty($tid)) {
        //     abort(404,'页面不存在');
        // }

        // $map = [];

        // if (!is_numeric($tid) || strval(intval($tid)) !== strval($tid)) {
        //     $map = array('a.dirname'=>$tid);
        // } else {
        //     $map = array('a.id'=>$tid);
        // }
        // $map['a.is_del'] = 0; // 回收站功能
        // $map['a.lang'] = $this->home_lang; // 多语言
        // $row = M('arctype')
        //     ->field('a.id, a.current_channel, b.nid')
        //     ->alias('a')
        //     ->join('__CHANNELTYPE__ b', 'a.current_channel = b.id', 'LEFT')
        //     ->where($map)
        //     ->find();
        // if (empty($row)) {
        //     abort(404,'页面不存在');
        // }
        // $this->row = $row;

    }


}
