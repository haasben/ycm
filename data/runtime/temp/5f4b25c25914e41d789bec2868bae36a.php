<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:49:"D:\WWW\ycm/application/index\view\index\index.htm";i:1574993754;s:44:"D:\WWW\ycm\application\index\view\footer.htm";i:1575281489;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo $web_config['web_name']; ?></title>
		<meta name="keywords" content="<?php echo $web_config['web_keywords']; ?>" />
		<meta name="description" content="<?php echo $web_config['web_description']; ?>" />
		<link rel="shortcut icon" href="<?php echo $web_config['web_ico']; ?>" />
		<link rel="stylesheet" type="text/css" href="/public/static/index/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/public/static/index/js/swiper/css/swiper.min.css"/>
	</head>
	<body>
		<header>
			<div class="wrap">
				<div class="logo">
					<a href="./"><img src="<?php echo $web_config['web_logo']; ?>" ></a>
				</div>
				<div class="search">
					<input type="search" placeholder="请输入关键字" id="key" lang="zh-CN">
				</div>
				<div class="tel">
					<span>咨询热线</span>
					<span><?php echo $web_config['web_attr_1']; ?></span>
				</div>
			</div>
			<!-- 移动端头部 -->
			<div class="mobile_header">
				<div class="wrap">
					<div class="logo">
						<a href="./"><img src="<?php echo $web_config['web_attr_13']; ?>" ></a>
					</div>
					<div class="menu">导航</div>
				</div>
				<div class="nav">
					<ul>
						<li><a href="/">网站首页</a></li>
						<?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if(!(empty($v['child']) || (($v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator ) && $v['child']->isEmpty()))): ?>
							 <li class="par">
						       <a href="javascript:" data-src=''><?php echo $v['typename']; ?></a>
							       <ul class="children">
							        <li><a href="<?php if($v['is_part'] == 0): ?>/<?php echo $v['dirname']; ?>?id=<?php echo $v['id']; else: ?><?php echo $v['typelink']; endif; ?>"><?php echo $v['typename']; ?></a></li>
							        <?php if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
							        <li><a href="<?php if($c['is_part'] == 0): ?>/<?php echo $c['dirname']; ?>?id=<?php echo $c['id']; else: ?><?php echo $c['typelink']; endif; ?>"><?php echo $c['typename']; ?></a></li>
							         <?php endforeach; endif; else: echo "" ;endif; ?>
							       </ul>
						      </li>

						<?php else: ?>
							<li><a href="<?php if($v['is_part'] == 0): ?>/<?php echo $v['dirname']; ?>?id=<?php echo $v['id']; else: ?><?php echo $v['typelink']; endif; ?>"><?php echo $v['typename']; ?></a>
							</li>
						<?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
			</div>
		</header>
		
		<div class="banner">
			<div class="swiper-container swiper">
				<div class="swiper-wrapper">
					<?php if(!(empty($data['banner']) || (($data['banner'] instanceof \think\Collection || $data['banner'] instanceof \think\Paginator ) && $data['banner']->isEmpty()))): if(is_array($data['banner']) || $data['banner'] instanceof \think\Collection || $data['banner'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['banner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v['pid'] == 1): ?>
						<div class="swiper-slide" style="background: url(<?php echo $v['litpic']; ?>) no-repeat center;background-size: cover;"></div>
						<?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
				</div>
				<!-- 如果需要分页器 -->
				<div class="swiper-pagination"></div>
				
				<!-- 如果需要导航按钮 -->
				<!-- <div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div> -->
			</div>
			<!-- 导航 -->
			<div class="nav">
				<ul>
					<li><a href="./">网站首页</a></li>
					<?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<li><a href="<?php if($v['is_part'] == 0): ?>/<?php echo $v['dirname']; ?>?id=<?php echo $v['id']; else: ?><?php echo $v['typelink']; endif; ?>"><?php echo $v['typename']; ?></a></li>
					<?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
		<!-- 移动端轮播 -->
		<div class="mobile_banner">
			<div class="swiper-container mobile_swiper">
				<div class="swiper-wrapper">
					<?php if(!(empty($data['banner']) || (($data['banner'] instanceof \think\Collection || $data['banner'] instanceof \think\Paginator ) && $data['banner']->isEmpty()))): if(is_array($data['banner']) || $data['banner'] instanceof \think\Collection || $data['banner'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['banner'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v['pid'] == 3): ?>
							<div class="swiper-slide">
							<a href="<?php echo $v['links']; ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?>  style="background-image: url(<?php echo $v['litpic']; ?>);"></a>
							</div>
							<?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
				</div>
				<!-- 如果需要分页器 -->
				<div class="swiper-pagination"></div>
			</div>
		</div>
		<!-- 内容主体 -->
		<div class="container">
			<div class="inner">
				<!-- 关于我们 -->
				<div class="about wrap">
					<?php if(!(empty($data['about']) || (($data['about'] instanceof \think\Collection || $data['about'] instanceof \think\Paginator ) && $data['about']->isEmpty()))): ?>
					<div class="title">
						<h3>关于我们</h3>
						<span>About</span>
						<p><?php echo $data['about']['seo_description']; ?></p>
					</div>
					<div class="box">
						<div class="left" style="text-align: center;">
							<img src="<?php echo $data['about']['litpic']; ?>" >
						</div>
						<div class="right">
							<h4><?php echo $data['about']['title']; ?></h4>
							<span><?php echo $data['about']['subtitle']; ?></span>
							<div class="desc">
								<?php echo strip_tags(htmlspecialchars_decode($data['about']['content'])); ?>
							</div>
							<div class="more">
								<a href="/about?id=<?php echo $data['about']['typeid']; ?>" class="">查看更多</a>
							</div>
						</div>
					</div>
					<?php endif; ?>
				</div>
				
				<!-- 产品介绍 -->
				<div class="product wrap">
					<div class="title">
						<h3>产品介绍</h3>
						<span>Product</span>
						<ul class="tab">
							<?php if(is_array($data['product_cat']) || $data['product_cat'] instanceof \think\Collection || $data['product_cat'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['product_cat'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<li><a href="<?php echo $v['id']; ?>"><?php echo $v['typename']; ?></a></li>

							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
					<ul class="box cont">
						<?php if(is_array($data['product_list']) || $data['product_list'] instanceof \think\Collection || $data['product_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['product_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="/product_show?aid=<?php echo $v['aid']; ?>">
					
								<div class="img" style="background-image: url(<?php echo $v['litpic']; ?>);"></div>
								<div class="tit"><?php echo $v['title']; ?></div>
								<div class="desc">
									<?php echo strip_tags(htmlspecialchars_decode($v['content'])); ?>
								</div>
							</a>
							<a href="javascript:" class="mo">了解详情> </a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>

				<!-- 专家团队 -->
				<div class="team wrap">
					<div class="title">
						<h3>专家团队</h3>
						<span>Exeprt Team</span>
					</div>
					<ul class="box cont">
						<?php if(is_array($data['team_list']) || $data['team_list'] instanceof \think\Collection || $data['team_list'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['team_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="/team_show?aid=<?php echo $v['aid']; ?>">
								<div class="pic" style="background-image: url(<?php echo $v['litpic']; ?>);"></div>
							
								<div class="intro">
									<p class="name"><?php echo $v['title']; ?></p>
									<p class="job"><?php echo $v['subtitle']; ?></p>
									<p class="brief">
										<?php echo strip_tags(htmlspecialchars_decode($v['content'])); ?>
									</p>
									<em>了解更多> </em>
								</div>
							</a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				
				<!-- 新闻动态 -->
				<div class="news wrap">
					<div class="title">
						<h3>新闻动态</h3>
						<span>News</span>
					</div>
					<div class="box">
						<?php if(!(empty($data['headNews']) || (($data['headNews'] instanceof \think\Collection || $data['headNews'] instanceof \think\Paginator ) && $data['headNews']->isEmpty()))): ?>
						<div class="case">
							<a href="/news_detail?aid=<?php echo $data['headNews']['aid']; ?>"><img src="<?php echo $data['headNews']['litpic']; ?>" ></a>
							<p class="title"><?php echo $data['headNews']['title']; ?></p>
							<p class="time"><?php echo date('Y-m-d',$data['headNews']['add_time']); ?></p>
					<!-- 		<p class="out">4月14日，积极分子走进开封市晋安路温馨...</p> -->
						</div>
						<?php endif; ?>
						<ul class="lists">
							<?php if(is_array($data['news']) || $data['news'] instanceof \think\Collection || $data['news'] instanceof \think\Paginator): $i = 0; $__LIST__ = $data['news'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
							<li>
								<a href="/news_detail?aid=<?php echo $v['aid']; ?>">
									<span><?php echo date('Y-m-d',$v['add_time']); ?></span>
									<p><?php echo $v['title']; ?></p>
								</a>
							</li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
					</div>
				</div>
				
				<!-- 联系我们 -->
				<div class="contact wrap">
					<div class="title">
						<h3>联系我们</h3>
						<span>Contact Us</span>
					</div>
					<div class="box">
						<?php echo htmlspecialchars_decode($data['contact']['content']); ?>
						<div class="qrcode box1">
							<img src="<?php echo $web_config['web_attr_15']; ?>" >
						</div>
						<div class="message box1">
							<form id="message">
								<div class="">
									<input type="text" name="username" value="" placeholder="姓名" />
									<input type="text" name="mobile" value="" placeholder="电话" />
								</div>
								<div class="">
									<input type="text" name="email" value="" placeholder="邮箱" />
								</div>
								<div class="">
									<textarea rows="" name="content" cols="" placeholder="留言内容"></textarea>
								</div>
								<input type="hidden" name="__token__" id="token" value="<?php echo \think\Request::instance()->token(); ?>">
								<input type="submit" class="submit" value="提交"/>
							</form>
						</div>
						<script type="text/javascript" src="/public/static/index/js/jquery-1.9.1.min.js"></script>
						<script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js"></script>
						<script type="text/javascript">
							$('.submit').click(function(){
								var data = $('#message').serialize();
									
								$.post('<?php echo url("index/Lists/gbook_submit"); ?>',data,function(data){
									if(data.code == 1){
										layer.msg(data.msg,{icon:1,time:1000});
									}else{
										$('#token').val(data.token);
										layer.msg(data.msg,{icon:5,time:1000});
									}

								})

								


								return false;

							})

						</script>



						<!-- 移动端二维码 -->
						<div class="mobile_qrcode box1" style="display: none;">
							<img src="<?php echo $web_config['web_attr_15']; ?>" >
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<!-- 底部 -->
		<footer>
<div class="wrap">
	<div class="links">
		<span>友情连接：</span>
		<?php if(is_array($linkData) || $linkData instanceof \think\Collection || $linkData instanceof \think\Paginator): $i = 0; $__LIST__ = $linkData;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
		<a href="<?php echo $v['url']; ?>" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> title="<?php echo $v['title']; ?>"><?php echo $v['title']; ?></a>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<p>Copyright &copy; <?php echo $web_config['web_copyright']; ?> 版权所有</p>
</div>
</footer>

<script src="/public/static/index/js/public.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).keyup(function(event){
	  if(event.keyCode ==13){
	    	
	    	var key = $('#key').val();
	    	if(key == ''){
	    		layer.msg('请输入关键字',{icon:5,time:1000});return false;
	    	}

	    	window.location.href="/searchs?key="+key;


	  }
	});


</script>
	</body>
</html>
		<!--底部结束-->
		<script src="/public/static/index/js/swiper/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
		
		<script type="text/javascript">
			var mySwiper = new Swiper ('.swiper', {
				direction: 'horizontal', // 垂直切换选项
				loop: true, // 循环模式选项
				autoplay: true,
				
				// 如果需要分页器
				pagination: {
				  el: '.swiper-pagination',
				},
				
				// 如果需要前进后退按钮
				navigation: {
				  nextEl: '.swiper-button-next',
				  prevEl: '.swiper-button-prev',
				},
			})
			
			var myMobileSwiper = new Swiper ('.mobile_swiper', {
				direction: 'horizontal', // 垂直切换选项
				loop: true, // 循环模式选项
				autoplay: true,
				
				// 如果需要分页器
				pagination: {
				  el: '.swiper-pagination',
				},
			})
		
		</script>

