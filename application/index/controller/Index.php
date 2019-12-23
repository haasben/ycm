<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;
/**
 * 
 */
class Index extends Base
{
	
	public function index(){

		/*** 手机PC端轮播图***/

		$banner = cache('banner');
		if(empty($banner)){
			$banner = Db::table('ycm_ad_position')
				->alias('hap')
				->field('ha.*,hap.title as titles')
				->join('ycm_ad ha','ha.pid=hap.id')
				->where('hap.lang',$this->home_lang)
				->where('hap.status',1)
				->where('hap.is_del',0)
				->where('ha.status',1)
				->where('ha.is_del',0)
				->where('hap.id','in',[1,3])
				->select();
			
			cache('banner',$banner,60);
		}

		$data['banner'] = $banner;
		/***手机PC端轮播图end**/

		/***关于我们**/
		$about = Db::table('ycm_archives')
			->alias('a')
			->join('ycm_article_content ac','ac.aid = a.aid')
			->where('a.typeid',1)
			->where('a.status',1)
			->where('a.is_del',0)
			->order('a.sort_order')
			->limit(1)
			->find();
		// dump($about);die;
		$data['about'] = $about;
		/***关于我们end**/

		/***新闻动态**/
		//头条新闻
		$top_id = 2;
		$typeidArr = Db::table('ycm_arctype')
			->where('is_hidden',0)
			->where('status',1)
			->where('is_del',0)
			->where('parent_id',$top_id)
			->where('lang',$this->home_lang)
			->field('id')
			->select();
		$top_id_arr = array_column($typeidArr, 'id');
		$top_id_arr[] = $top_id;
		$archivesModle = M('archives');
		$headNews = $archivesModle
			->field('aid,title,litpic,add_time')
			->where('typeid','in',$top_id_arr)
			->where('status',1)
			->where('is_del',0)
			->where('is_head',1)
			->order('add_time desc')
			->limit(1)
			->find();
		$data['headNews'] = $headNews;


		$data['news'] = $archivesModle
			->field('aid,title,add_time')
			->where('typeid','in',$top_id_arr)
			->where('status',1)
			->where('arcrank',0)
			->where('is_del',0)
			->order('add_time desc')
			->limit(9)
			->select();
		// dump($data);die;
		/***新闻动态end**/

		/*****联系我们*******/
		$data['contact'] = $archivesModle
			->alias('a')
			->join('ycm_single_content sc','sc.aid = a.aid')
			->field('a.title,sc.content')
			->where('a.aid',111)
			->where('status',1)
			->where('is_del',0)
			->limit(1)
			->find();

		/*****联系我们END****/

		/******产品介绍*******/
		//获取产品分类
		$product_id = 72;
		$data['product_cat'] = Db::name('arctype')
			->where('parent_id',$product_id)
			->where('is_hidden',0)
			->where('status',1)
			->where('is_del',0)
			->where('lang',$this->home_lang)
			->field('id,typename')
			->select();
		$arr_id = array();
		$arr_id[] = $product_id;
		$data['product_list'] = $archivesModle
			->alias('a')
			->join('ycm_product_content pc','pc.aid = a.aid')
			->field('a.aid,a.title,a.litpic,pc.content')
			->where('a.typeid','in',$arr_id)
			->where('a.status',1)
			->where('a.is_del',0)
			->order('a.sort_order desc')
			->limit(6)
			->select();
		/*******产品介绍END******/

		/*****团队介绍*******/
		//获取排序前四个团队成员
		$team_id = 70;

		$data['team_list'] = $archivesModle
			->alias('a')
			->join('ycm_images_content pc','pc.aid = a.aid')
			->field('a.aid,a.title,a.litpic,pc.content,pc.subtitle')
			->where('a.typeid',$team_id)
			->where('a.status',1)
			->where('a.is_del',0)
			->order('a.sort_order')
			->limit(4)
			->select();

		// dump($data);die;

		/*****团队介绍END*******/


		$this->assign('data',$data);
		return $this->fetch();
	}

	public function message($id){
		$cate = Db::table('ycm_arctype')
            ->field('id,typename,seo_title,seo_keywords,seo_description,litpic')
            ->where('id',$id)
            ->limit(1)
            ->find();
        $this->assign('cate',$cate);

        // $dailiData = Db::table('ycm_archives')
        // 		->alias('a')
        // 		->field('a.title,sc.content')
        // 		->join('ycm_single_content sc','sc.aid = a.aid')
        // 		->where('a.typeid',90)
        // 		->where('a.status',1)
        // 		->where('a.is_del',0)
        // 		->limit(1)
        // 		->find();
        		
        // $this->assign('dailiData',$dailiData);
        // dump($dailiData);die;

		return $this->fetch();
	}

	public function messages($id){
		$cate = Db::table('ycm_arctype')
            ->field('id,typename,seo_title,seo_keywords,seo_description,litpic')
            ->where('id',$id)
            ->limit(1)
            ->find();
        $this->assign('cate',$cate);

        $dailiData = Db::table('ycm_archives')
        		->alias('a')
        		->field('a.title,sc.content')
        		->join('ycm_single_content sc','sc.aid = a.aid')
        		->where('a.typeid',$id)
        		->where('a.status',1)
        		->where('a.is_del',0)
        		->limit(1)
        		->find();
        		
        $this->assign('dailiData',$dailiData);
        // dump($dailiData);die;

		return $this->fetch();
	}


	public function searchs(){

		$key = input('key');
		$data = Db::name('archives')
			->field('aid,title,add_time')
			->where('channel',1)
			->where('lang',$this->home_lang)
			->where('status',1)
			->where('is_del',0)
			->where("title",'like',"%".$key."%")
			->paginate(10,false,[
                'query' => request()->param(),
                'type'     => 'bootstrap',
            ]);

		
		$this->assign('data',$data);
		$this->assign('keywords',$key);
		return $this->fetch('search');
	}

}