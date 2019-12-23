<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:52:"./application/admin/template/arctype\ajax_newtpl.htm";i:1573115083;s:55:"D:\WWW\ycm\application\admin\template\public\layout.htm";i:1571728724;s:55:"D:\WWW\ycm\application\admin\template\public\footer.htm";i:1571728724;}*/ ?>
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
<link href="/public/plugins/layui/css/layui.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/css/main.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/css/page.css?v=<?php echo $version; ?>" rel="stylesheet" type="text/css">
<link href="/public/static/admin/font/css/font-awesome.min.css" rel="stylesheet" />
<!--[if IE 7]>
  <link rel="stylesheet" href="/public/static/admin/font/css/font-awesome-ie7.min.css">
<![endif]-->
<script type="text/javascript">
    var eyou_basefile = "<?php echo \think\Request::instance()->baseFile(); ?>";
    var module_name = "<?php echo MODULE_NAME; ?>";
    var GetUploadify_url = "<?php echo url('Uploadify/upload'); ?>";
    var __root_dir__ = "";
    var __lang__ = "<?php echo $admin_lang; ?>";
</script>  
<link href="/public/static/admin/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
<link href="/public/static/admin/js/perfect-scrollbar.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">html, body { overflow: visible;}</style>
<script type="text/javascript" src="/public/static/admin/js/jquery.js"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/public/plugins/layer-v3.1.0/layer.js"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.cookie.js"></script>
<script type="text/javascript" src="/public/static/admin/js/admin.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.validation.min.js"></script>
<script type="text/javascript" src="/public/static/admin/js/common.js?v=<?php echo $version; ?>"></script>
<script type="text/javascript" src="/public/static/admin/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/public/static/admin/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="/public/plugins/layui/layui.js"></script>
<script src="/public/static/admin/js/myFormValidate.js"></script>
<script src="/public/static/admin/js/myAjax2.js?v=<?php echo $version; ?>"></script>
<script src="/public/static/admin/js/global.js?v=<?php echo $version; ?>"></script>
</head>

<link rel="stylesheet" type="text/css" href="/public/static/admin/js/codemirror/codemirror.css">
<script type="text/javascript" src="/public/static/admin/js/codemirror/codemirror.js"></script>
<script type="text/javascript" src="/public/static/admin/js/codemirror/mode/xml/xml.js"></script>
<script type="text/javascript" src="/public/static/admin/js/codemirror/mode/javascript/javascript.js"></script>
<script type="text/javascript" src="/public/static/admin/js/codemirror/mode/css/css.js"></script>
<script type="text/javascript" src="/public/static/admin/js/codemirror/mode/php/php.js"></script>
<script type="text/javascript" src="/public/static/admin/js/codemirror/mode/clike/clike.js"></script>
<script type="text/javascript" src="/public/static/admin/js/codemirror/mode/htmlmixed/htmlmixed.js"></script>

<body style="background-color: #FFF; overflow: auto;min-width:auto;">
<div id="toolTipLayer" style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page" style="min-width:auto;box-shadow:none;">
    <form class="form-horizontal" id="post_form" action="<?php echo url('Arctype/ajax_newtpl'); ?>" method="post">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">模板目录</dt>
                <dd class="opt">
                    /template/<select name="tpldir" id="tpldir" tabindex="1">
                    <?php if(is_array($tpldirList) || $tpldirList instanceof \think\Collection || $tpldirList instanceof \think\Paginator): $i = 0; $__LIST__ = $tpldirList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $vo; ?>"><?php echo $vo; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="url">文件名称</label>
                </dt>
                <dd class="opt">
                    <?php echo $type; ?>_<?php echo $nid; ?><font id="font_filename"></font><input type="text" name="filename" value="" id="filename" placeholder="自定义" tabindex="2">.htm
                    <span class="err"></span>
                    <p class="notic">只允许字母、数字、下划线、连接符的任意组合</p>
                    <p class="red" id="txt_filename"></p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="content">HTML代码</label>
                </dt>
                <dd class="opt">
                    <textarea name='content' id="content" style='width:99%;height:450px;background:#ffffff;' tabindex="3"></textarea>
                    <span class="err"></span>
                    <p class="notic"></p>
                </dd>
            </dl>
            <div class="bot">
                <input type="hidden" name="type" value="<?php echo $type; ?>" />
                <input type="hidden" name="nid" value="<?php echo $nid; ?>" />
                <a href="JavaScript:void(0);" onclick="checkForm();" class="ncap-btn-big ncap-btn-green" id="submitBtn" tabindex="4">确认提交</a>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(function(){

        $('#filename').keyup(function(){
            var filename = $(this).val();
            if (filename) {
                $('#font_filename').html('_');
            } else {
                $('#font_filename').html('');
            }

            $.ajax({
                type: "POST",
                url: "<?php echo url('Arctype/ajax_newtpl', ['nosubmit'=>1,'_ajax'=>1]); ?>",
                data: $('#post_form').serialize(),
                dataType: 'json',
                success: function (res) {
                    if(res.code == 1){
                        $('#txt_filename').html('');
                    } else {
                        $('#txt_filename').html(res.msg);
                    }
                }
            });
        });
    });

    // 判断输入框是否为空
    function checkForm(){
        if($.trim($('#tpldir').val()) == ''){
            showErrorMsg('模板目录不能为空！');
            $('#tpldir').focus();
            return false;
        }
        layer_loading('正在处理');
        $.ajax({
            type: "POST",
            url: "<?php echo url('Arctype/ajax_newtpl', ['_ajax'=>1]); ?>",
            data: $('#post_form').serialize(),
            dataType: 'json',
            success: function (res) {
                if(res.code == 1){
                    parent.layer.closeAll();
                    if ('lists' == res.data.type) {
                        var id = 'templist';
                    } else {
                        var id = 'tempview';
                    }
                    $('#'+id, window.parent.document).append('<option value="'+res.data.filename+'" selected="true">'+res.data.filename+'</option>');
                    parent.layer.msg(res.msg, {icon: 1, time: 1000});
                    return false;
                }else{
                    layer.closeAll();
                    if (res.data.focus) {
                        $('#'+res.data.focus).focus();
                    }
                    layer.msg(res.msg, {icon: 2});
                    return false;
                }
            },
            error:function(){
                layer.closeAll();
                layer.alert(ey_unknown_error, {icon: 2, title:false});
            }
        });
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