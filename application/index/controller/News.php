<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;
/**
 * 
 */
class News extends Base
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
            ->field('a.title,a.litpic,ac.content,a.add_time,a.aid')
            ->join('ycm_article_content ac','ac.aid = a.aid')
            ->where('a.typeid',$id)
            ->where('a.status',1)
            ->where('a.is_del',0)
            ->where('a.lang',$this->home_lang)
            ->order('a.add_time desc')
            ->paginate(5,false,[
                'query' => request()->param(),
                'type'     => 'bootstrap',
            ]);
         // dump($cate);die;
        $this->assign('cate',$cate);
        // dump($cate);die;



        return $this->fetch();
    }
    public function news_detail($aid){


        $archives_data = Db::name('archives')
            ->alias('a')
            ->field('a.title,ac.content,a.add_time,a.aid,a.typeid,seo_title,seo_keywords,seo_description')
            ->join('ycm_article_content ac','ac.aid = a.aid')
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
        /*****上一篇******/
        $cate['prev'] = Db::name('archives')
            ->field('title,aid')
            ->where('lang',$this->home_lang)
            ->where('channel',1)
            ->where('typeid',$typeid)
            ->where('aid','>',$aid)
            ->order('aid')
            ->limit(1)
            ->find();

        /*****下一篇******/
        $cate['next'] = Db::name('archives')
            ->field('title,aid')
            ->where('lang',$this->home_lang)
            ->where('typeid',$typeid)
            ->where('channel',1)
            ->where('aid','<',$aid)
            ->order('aid desc')
            ->limit(1)
            ->find();
        // dump($cate);die;
        $this->assign('cate',$cate);
        
        return $this->fetch();


    }
}