<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"D:\WWW\ycm/application/index\view\product\index.htm";i:1574825805;s:44:"D:\WWW\ycm\application\index\view\header.htm";i:1574993737;s:44:"D:\WWW\ycm\application\index\view\footer.htm";i:1574992651;}*/ ?>
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

			<div class="inner">
				<div class="top_title">
					<h3><?php echo $cate['typename']; ?></h3>
					<p>当前位置：
						<a href="./">首页</a>&nbsp;>&nbsp;<span><?php echo $cate['typename']; ?></span>
					</p>
				</div>
				<div class="content">
					<ul class="product_list" id="prod1" >
						<?php if(is_array($cate['child']) || $cate['child'] instanceof \think\Collection || $cate['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $cate['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="/product_show?aid=<?php echo $c['aid']; ?>">
								<div class="img_box">
									<img src="<?php echo $c['litpic']; ?>" >
								</div>
								<div class="tit"><?php echo $c['title']; ?></div>
								<p class="desc">
									<?php echo mb_substr(strip_tags(htmlspecialchars_decode($c['content'])),0,160); ?>
								</p>
							</a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>

					</ul>
		
				</div>
			</div>
		</div>
		
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
		<script type="text/javascript">
			$('.tabs').on('click','a', function(){
				const id = $(this).attr('data-id');
				$(this).addClass('on').siblings().removeClass('on');
				$('.product_list').hide();
				$('#prod'+id).show();
			})
		</script>

