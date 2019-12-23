<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:52:"D:\WWW\ycm/application/index\view\speech\company.htm";i:1575282223;s:44:"D:\WWW\ycm\application\index\view\header.htm";i:1574993737;s:44:"D:\WWW\ycm\application\index\view\footer.htm";i:1575281489;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title><?php echo $cate['seo_title']; ?></title>
		<meta name="keywords" content="<?php echo $cate['seo_keywords']; ?>" />
		<meta name="description" content="<?php echo $cate['seo_description']; ?>" />
		<link rel="shortcut icon" href="<?php echo $web_config['web_ico']; ?>" />

		<link rel="stylesheet" type="text/css" href="/public/static/index/css/style.css"/>
		<link rel="stylesheet" type="text/css" href="/public/static/index/css/public.css"/>
		<script src="/public/static/index/js/jquery-1.9.1.min.js" type="text/javascript" charset="utf-8"></script>
	</head>
	<body>
		<!-- 头部 -->
		<header>
			<div class="wrap">
				<div class="logo">
					<a href="/"><img src="<?php echo $web_config['web_logo']; ?>" ></a>
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
						<a href="/"><img src="<?php echo $web_config['web_attr_13']; ?>" ></a>
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
		
		<!-- 导航 -->
		<nav>
			<ul>
				<li><a href="/">网站首页</a></li>
				<?php if(is_array($cats) || $cats instanceof \think\Collection || $cats instanceof \think\Paginator): $i = 0; $__LIST__ = $cats;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
					<li><a href="<?php if($v['is_part'] == 0): ?>/<?php echo $v['dirname']; ?>?id=<?php echo $v['id']; else: ?><?php echo $v['typelink']; endif; ?>"><?php echo $v['typename']; ?></a>
						<?php if(!(empty($v['child']) || (($v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator ) && $v['child']->isEmpty()))): ?>
						<ul class="children">
							<?php if(is_array($v['child']) || $v['child'] instanceof \think\Collection || $v['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
					       <li><a href="<?php if($c['is_part'] == 0): ?>/<?php echo $c['dirname']; ?>?id=<?php echo $c['id']; else: ?><?php echo $c['typelink']; endif; ?>"><?php echo $c['typename']; ?></a></li>
					       <?php endforeach; endif; else: echo "" ;endif; ?>
					     </ul>
					    <?php endif; ?>
					</li>
				<?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</nav>
		
		<div class="container">
		<div class="banners" style="background-image: url(<?php echo $cate['litpic']; ?>);">
		</div>
<link rel="stylesheet" type="text/css" href="/public/static/index/js/swiper/css/swiper.min.css"/>
			<div class="inner">
				<div class="top_title">
					<h3><?php echo $cate['typename']; ?></h3>
					<p>当前位置：
						<a href="./">首页</a>&nbsp;>&nbsp;<span><?php echo $cate['typename']; ?></span>
					</p>
				</div>
				<div class="content">
					<h3 style="margin-bottom: 0px"><?php echo $cate['child']['title']; ?></h3>
					<p style="text-align: center;font-size: 19px;margin-bottom: 25px;line-height: 40px;"><?php echo $cate['child']['subtitle']; ?></p>

					<div class="desc">
						<img src="<?php echo $cate['child']['litpic']; ?>" >
						
						<?php echo htmlspecialchars_decode($cate['child']['content']); ?>
					</div>
				</div>

					<div class="swiper-container" id="pc_swiper">
						<div class="swiper-wrapper">
							<?php if(is_array($cate['image']) || $cate['image'] instanceof \think\Collection || $cate['image'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['image'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($i % 2 );++$i;?>
							<div class="swiper-slide">
								<div class='img' style="background-image: url(<?php echo $i['litpic']; ?>);"></div>
								<div class="zs_title">
									<?php echo $i['title']; ?>
								</div>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
							
						</div>
				  </div>

				  
				  <div class="swiper-container" id="mobile_swiper">
						<div class="swiper-wrapper">
							<?php if(is_array($cate['image']) || $cate['image'] instanceof \think\Collection || $cate['image'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['image'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$i): $mod = ($i % 2 );++$i;?>
							<div class="swiper-slide">
								<div class='img' style="background-image: url(<?php echo $i['litpic']; ?>);"></div>
								<div class="zs_title">
									<?php echo $i['title']; ?>
								</div>
							</div>
							<?php endforeach; endif; else: echo "" ;endif; ?>
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

<script src="/public/static/index/js/swiper/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
			function zs_swiper(num){
				effect = 0;
				console.log(num)
				var swiper = new Swiper('#pc_swiper', {
					loop: true,
					speed: 1000,
					slidesPerView: num,
					spaceBetween: 20,
					centeredSlides : true,
					watchSlidesProgress : true,
					autoplay: true,
					on: {
						setTranslate: function(){
							slides = this.slides
							for(i=0; i< slides.length; i++){
								slide = slides.eq(i)
								progress = slides[i].progress
								//slide.html(progress.toFixed(2)); 看清楚progress是怎么变化的
									slide.css({'opacity': '','background': ''});slide.transform('');//清除样式
									
									if(effect == 1){
										slide.transform('scale('+(1 - Math.abs(progress)/8)+')');  
									}else if(effect == 2){
										slide.css('opacity',(1-Math.abs(progress)/6));
										slide.transform('translate3d(0,'+ Math.abs(progress)*20+'px, 0)');  
									}
									else if(effect == 3){
										slide.transform('rotate('+ progress*30+'deg)');  
									}else if(effect == 4){
										slide.css('background','rgba('+ (255 - Math.abs(progress)*20) +','+ (127 + progress*32) +',' + Math.abs(progress)*64 + ')');
									}
								}	
						},
						setTransition: function(transition) {
							for (var i = 0; i < this.slides.length; i++) {
								var slide = this.slides.eq(i)
								slide.transition(transition);
							}
						},
					},
				});
			}
			
			function slider_num(){
				let devW = document.documentElement.clientWidth;
				console.log(devW)
				 let num = devW < 1200 ? 3 : 5;
				 zs_swiper(num)
			}
			
			$(function(){
				slider_num();
			})
			$(window).resize(function(){
				slider_num();
			})
			
			
			var swiper = new Swiper('#mobile_swiper', {
				direction: 'horizontal', // 垂直切换选项
				loop: true,
				speed: 1000,
				autoplay: true,
			});

		</script>
