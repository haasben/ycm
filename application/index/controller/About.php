<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;
/**
 * 
 */
class About extends Base
{
	
	/**
     * 关于我们
     */
    public function index($id)
    {
            
        /*******关于我们栏目信息*********/

        $cate = Db::table('ycm_arctype')
            ->field('id,typename,seo_title,seo_keywords,seo_description,litpic')
            ->where('id',$id)
            ->limit(1)
            ->find();

        $cate['child'] = Db::table('ycm_archives')
            ->alias('a')
            ->field('a.title,a.litpic,ac.content,ac.subtitle')
            ->join('ycm_article_content ac','ac.aid = a.aid')
            ->where('a.typeid',$id)
            ->where('a.status',1)
            ->where('a.is_del',0)
            ->where('a.lang',$this->home_lang)
            ->order('a.sort_order')
            ->limit(1)
            ->find();
        $this->assign('cate',$cate);
        // dump($cate);die;



        return $this->fetch();
    }
}