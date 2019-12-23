<?php

namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;

class Base extends Controller
{


    //类别
    public $cate = array();


	/*
     * 初始化操作
     */
    public function _initialize() 
    {	
        parent::_initialize();
        //网站信息
        $web_config = web_config();
        //dump($web_config);die;
        $this->assign('web_config',$web_config);
        //友情链接
        $linkData = links();
        // dump($linkData);die;
	    $this->assign('linkData',$linkData);

        $cats = cache('cats');
        // if(empty($cats)){
             $field = 'id,parent_id,typename,dirname,englist_name,typelink,litpic,seo_title,seo_keywords,seo_description,sort_order,is_part';
            //栏目列表
            $cats = Db::name('arctype')
                ->field($field)
                ->where('parent_id',0)
                ->where('is_del',0)
                ->where('status',1)
                ->where('is_hidden',0)
                ->where('lang',$this->home_lang)
                ->order('sort_order')
                ->select();
            foreach ($cats as $k => $v) {
                $cats[$k]['child'] = Db::name('arctype')
                ->field($field)
                ->where('parent_id',$v['id'])
                ->where('is_del',0)
                ->where('status',1)
                ->where('is_hidden',0)
                ->where('lang',$this->home_lang)
                ->order('sort_order')
                ->select();
            }
            cache('cats',$cats,60);
        // }

       
        $this->assign('cats',$cats);

          // dump($cats);die;

    }


	




}










?>