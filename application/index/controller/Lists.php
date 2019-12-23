<?php 
namespace app\index\controller;

use think\Controller;
use think\Db;
/**
 * 
 */
class Lists extends Cats
{

    public function index(){

        dump($this->row);die;



    }
















 /**
     * 留言提交 
     */
    public function gbook_submit()
    {
        $typeid = 76;

        $post = input('post.');
        $result = $this->validate($post,
            [   
                'username|姓名'  => 'require|token',
                'mobile|手机号'=>'require',
                'content|内容'=>'require',
            ]);
        if(true !== $result){
            // 验证失败 输出错误信息
            return ['code'=>3,'msg'=>$result,'token'=>get_token()];
        }

        if(!check_mobile($post['mobile'])){
            return ['code'=>3,'msg'=>'手机号格式错误','token'=>get_token()];
        }

        $ip = clientIP();
        /*留言间隔限制*/
        $channel_guestbook_interval = tpSetting('channel_guestbook.channel_guestbook_interval');

        $channel_guestbook_interval = is_numeric($channel_guestbook_interval) ? intval($channel_guestbook_interval) : 60;

        if (0 < $channel_guestbook_interval) {
            $map = array(
                'ip'    => $ip,
                'typeid'    => $typeid,
                'lang'      => $this->home_lang,
                'add_time'  => array('gt', getTime() - $channel_guestbook_interval),
            );
            $count = M('guestbook')->where($map)->count('aid');

            if ($count > 0) {
                return ['code'=>2,'msg'=>'同一个IP在'.$channel_guestbook_interval.'秒之内不能重复提交！','token'=>get_token()];
            }
        }
        
        $this->channel = Db::name('arctype')->where(['id'=>$typeid])->getField('current_channel');
        
        $newData = array(
            'typeid'    => $typeid,
            'channel'   => $this->channel,
            'ip'    => $ip,
            'lang'  => $this->home_lang,
            'add_time'  => getTime(),
            'update_time' => getTime(),
        );
        $data = array_merge($post, $newData);
        $data['md5data'] = md5(serialize($post));
        $aid = M('guestbook')->insertGetId($data);
        $attrArr = [];
        $field_attr = Db::name('guestbook_attribute')
            ->field('attr_id')
            ->where('typeid',$typeid)
            ->where('lang',$this->home_lang)
            ->where('is_del',0)
            ->select();
        $newpost = [$data['username'],$data['mobile'],$data['email'],$data['content']];
        foreach ($field_attr as $k => $v) {
            $attrArr[$k] = [
                'aid'=>$aid,
                'attr_id'=>$v['attr_id'],
                'attr_value'=>$newpost[$k],
                'lang'=>$this->home_lang,
                'add_time'=>getTime()

            ];
        }

        $r = Db::name('guestbook_attr')->insertAll($attrArr);

        if($aid && $r){
             return ['code'=>1,'msg'=>'留言成功'];
        }else{
            return ['code'=>2,'msg'=>'留言失败，请稍候再试'];
        }
    }

   
}