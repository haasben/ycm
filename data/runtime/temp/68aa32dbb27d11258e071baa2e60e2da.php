<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:57:"./application/admin/template/index\ajax_content_total.htm";i:1573115083;s:55:"D:\WWW\ycm\application\admin\template\public\footer.htm";i:1571728724;}*/ ?>
<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-capable" content="yes">
<!-- Apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link href="/public/static/admin/css/main.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
<link href="/public/static/admin/css/index.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<!--[if IE 7]>
  <link rel="stylesheet" href="/public/static/admin/font/css/font-awesome-ie7.min.css">
<![endif]-->
<script type="text/javascript">
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var __root_dir__ = "";
    var __lang__ = "<?php echo $admin_lang; ?>";
    var __main_lang__ = "<?php echo $main_lang; ?>";
</script>  
<script type="text/javascript" src="/public/static/admin/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js"></script>
<script src="/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>

</head>
<body style="background-color:#F4F4F4;padding:6px; overflow: auto;min-width:auto;">
    <form id="post_form">
        <div class="navboxs sort-list">
            <?php if(is_array($totalList) || $totalList instanceof \think\Collection || $totalList instanceof \think\Paginator): $i = 0; $__LIST__ = $totalList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <div>
                <label style="cursor: pointer;">
                    <span><input type="checkbox" name="checkedids[]" value="<?php echo $vo['id']; ?>" <?php if($vo['checked']): ?>checked<?php endif; ?> /></span><?php echo $vo['title']; ?>
                    <input type="hidden" name="ids[]" value="<?php echo $vo['id']; ?>" />
                </label>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; ?> 
        </div>
        <div class="navboxs_bt" onclick="check_submit();">确认提交</div>
    </form>

    <script type="text/javascript">
        $(function () {

            $('input[name*=checkedids]').click(function(){
                if ($(this).is(':checked') && 9 < $('input[name*=checkedids]:checked').length) {
                    $(this).attr('checked', false);
                    showErrorMsg('最多只勾选9个！');
                }
            });

            /** 拖动排序相关 js*/
            $( ".sort-list" ).sortable({
                start: function( event, ui) {

                }
                ,stop: function( event, ui ) {

                }
            });
            $( ".sort-list" ).disableSelection();
        });

        var parentObj = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

        // 表单提交
        function check_submit(){

            if (9 < $('input[name*=checkedids]:checked').length) {
                showErrorMsg('最多只勾选9个！');
                return false;
            }

            layer_loading('正在处理');
            $.ajax({
                url: "<?php echo url('Index/ajax_content_total', ['_ajax'=>1]); ?>",
                type: 'POST',
                dataType: 'JSON',
                data: $('#post_form').serialize(),
                success: function(res){
                    layer.closeAll();
                    if (res.code == 1) {
                        var _parent = parent;
                        _parent.layer.close(parentObj);
                        _parent.layer.msg(res.msg, {shade: 0.3, time: 1000}, function(){
                            _parent.gourl(res.url);
                        });
                    } else {
                        showErrorMsg(res.msg);
                    }
                },
                error: function(e){
                    layer.closeAll();
                    layer.alert(ey_unknown_error, {icon:5, time:1500});
                }
            });

            return false;
        }
    </script>
    <br/>
<div id="goTop">
    <a href="JavaScript:void(0);" id="btntop">
        <i class="fa fa-angle-up"></i>
    </a>
    <a href="JavaScript:void(0);" id="btnbottom">
        <i class="fa fa-angle-down"></i>
    </a>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#think_page_trace_open').css('z-index', 99999);
    });
</script>
</body>
</html>