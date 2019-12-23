<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;
/**
 * 
 */
class Product extends Base
{
	
	/**
     * 产品列表
     */
    public function index($id)
    {
            
        /*******关于我们栏目信息*********/
        $t = input('t');
        if(empty($t)){
            $t=1;
        }
        $cate = Db::table('ycm_arctype')
            ->field('id,typename,seo_title,seo_keywords,seo_description,litpic')
            ->where('id',$id)
            ->limit(1)
            ->find();


        $cate['child'] = Db::table('ycm_archives')
        ->alias('a')
        ->field('a.title,a.litpic,ac.content,a.add_time,a.aid')
        ->join('ycm_product_content ac','ac.aid = a.aid')
        ->where('a.typeid',$id)
        ->where('a.status',1)
        ->where('a.is_del',0)
        ->where('a.lang',$this->home_lang)
        ->order('a.sort_order')
        ->select();
        
        // dump($cate);die;
        $this->assign('t',$t);
           // dump($cate);die;
        $this->assign('cate',$cate);




        return $this->fetch();
    }
    public function product_show($aid){


        $archives_data = Db::name('archives')
            ->alias('a')
            ->field('a.title,ac.content,a.add_time,a.aid,a.typeid,seo_title,seo_keywords,seo_description,a.litpic as pic')
            ->join('ycm_product_content ac','ac.aid = a.aid')
            ->where('a.aid',$aid)
            ->limit(1)
            ->find();
        $typeid = $archives_data['typeid'];
        //获取上级信息
        $cate = Db::table('ycm_arctype')
            ->field('id,typename,litpic')
            ->where('id',$typeid)
            ->limit(1)
            ->find();

        $cate = array_merge($archives_data,$cate);

          // dump($cate);die;
        $this->assign('cate',$cate);
        
        return $this->fetch();


    }
}