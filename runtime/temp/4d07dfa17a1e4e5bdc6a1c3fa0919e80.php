<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\wamp64\www\myxuanke\public/../application/admin\view\sc\lst.html";i:1509182090;s:71:"D:\wamp64\www\myxuanke\public/../application/admin\view\public\top.html";i:1508314157;s:72:"D:\wamp64\www\myxuanke\public/../application/admin\view\public\left.html";i:1527576101;}*/ ?>
<!DOCTYPE html>

 <head runat="server"> 
  <title>选课管理系统</title> 
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
  <link rel="shortcut icon" href="__ADMIN__/images/favicon.ico" type="image/x-icon" /> 
  <link rel="stylesheet" href="__index__/layui/css/layui.css" media="all" /> 
  
  <script src="__ADMIN__/js/jquery-1.12.4.js" type="text/javascript"></script> 
   <script src="__ADMIN__/js/bootstrap.js" type="text/javascript"></script> 
  <script src="__ADMIN__/layui/layui.js" charset="utf-8">
    

  </script> 
  <link rel="stylesheet" href="__ADMIN__/css/myCss.css" /> 
 </head> 
 <body> 
  <div class="layui-layout layui-layout-admin"> 
   <!--头部-->   <script type="text/javascript">

        function ShowHiddenLeft() {

            var sideWidth = $('#SiteSidebar').width();
            if (sideWidth === 200) {
                $('#connn').animate({
                    left: '0'
                });
                $('#SiteSidebar').animate({
                    width: '0'
                });
            } else {
                $('#connn').animate({
                    left: '200px'
                });
                $('#SiteSidebar').animate({
                    width: '200px'
                });
            }
        }

        layui.use(['element', 'layer'], function () {
            var element = layui.element()
            , layer = layui.layer;
            if ($("#myiframe").css("height") == "150px") {
                $("#connn").css("height", "781px")
            }
        });
        //跳转iframe
        function ChangePage(strStr) {
            $("#myiframe").attr("src", strStr);
        }

        function switchMy(num) {
            $("[lay-filter='test']").hide();
            $("#left" + num).show();
        }

    </script>


 <div class="layui-header ymheader" style="background: #393d49;">
            <a href="javascript:" class="logo"><i class="layui-icon" style="font-size: 42px;">&#xe62e;</i>
                选课管理系统</a>
            <button class="layui-btn layui-btn-mini MyYinCang" title="隐藏/显示" onclick="javascript:ShowHiddenLeft()">
                〓</button>
            <ul class="layui-nav" style="float: right;">
                <li class="layui-nav-item layui-this"><a href="javascript:switchMy(1);">选课管理</a>
                </li>
              
                <li class="layui-nav-item "><a href="javascript:;" class="admin-header-user">
                    <img src="__ADMIN__/images/Head.jpg" width="40" height="40" class="layui-circle" />
                    <span>&nbsp;<?php echo \think\Request::instance()->session('aname'); ?></span></a>
                    <dl class="layui-nav-child">
                        <dd>
                            <a href="<?php echo url('admin/edit',array('id'=>\think\Request::instance()->session('id'))); ?>"><i class="layui-icon">&#xe612;</i>
                                管理员管理</a>
                        </dd>
                        <dd>
                            <a href="<?php echo url('admin/logout'); ?>"><i class="layui-icon">&#xe609;</i> 注销</a>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div> 
   <!--头部END--> 
   <!--侧栏--> 
<div class="layui-side layui-bg-black" id="SiteSidebar">
            <div class="layui-side-scroll">
                <ul class="layui-nav layui-nav-tree" lay-filter="test" id="left1">
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">学生管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('student/lst'); ?>"><i class="layui-icon">&#xe63a;</i> 学生信息</a></dd>
                           
                        </dl>
                          <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('sc/lst'); ?>"><i class="layui-icon">&#xe63a;</i> 选课信息</a></dd>
                           
                        </dl>
                    
                    </li>
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">教师管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('teacher/lst'); ?>"><i class="layui-icon">&#xe63a;</i> 教师信息</a></dd>
                          
                        </dl>
                    </li>
                     <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">课程管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('course/lst'); ?>"><i class="layui-icon">&#xe606;</i>
                                    课程信息</a></dd>
                            
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">管理员管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('admin/lst'); ?>"><i class="layui-icon">&#xe63a;</i> 管理员信息</a></dd>
                            
                        </dl>
                    </li>
                   
                </ul>
                <ul class="layui-nav layui-nav-tree" lay-filter="test" id="left2" style="display: none;">
                    
                   
                   
                </ul>
            </div>
        </div> 
   <!--侧栏END--> 
   <!--内容--> 
   <div class="layui-body layui-tab-content" id="connn" style=""> 
     <span class="layui-breadcrumb">
                    <a href="<?php echo url('index/index'); ?>">首页</a>
                    <a href="<?php echo url('course/lst'); ?>">选课信息</a>
                  
                </span>
                <br><br>
    <a href="<?php echo url('sc/add'); ?>">
        <button class="layui-btn"> <i class="layui-icon">&#xe608;</i> 添加</button>
    </a>
 
    <table class="layui-table" lay-skin="row" lay-even=""> 
     <colgroup> 
      <col width="20%" /> 
      <col width="20%" /> 
      <col width="20%" /> 
      <col width="20%" /> 
      <col width="20%" /> 
      <col /> 
     </colgroup> 
     <thead> 
      <tr> 
       <th style=" text-align:center;">ID</th> 
        <th style=" text-align:center;">课程号</th> 
       <th style=" text-align:center;">学号</th> 
       
       <th style=" text-align:center;">成绩</th>

         <th style=" text-align:center;">操作</th> 
      </tr> 
     </thead> 
     <tbody>   <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
      <tr> 
        <td style=" text-align:center;"><?php echo $vo['id']; ?></td> 
       
         <td style=" text-align:center;"><?php echo $vo['cno']; ?></td> 
          <td style=" text-align:center;"><?php echo $vo['sno']; ?></td> 
          <td style=" text-align:center;"> <?php if($vo['grade']) echo $vo['grade']; else echo '未录入成绩';?>
                                
                                  </td> 
               
         
        <td align="center">
                                    <a href="<?php echo url('sc/edit',array('id'=>$vo['id'])); ?>" class="btn btn-primary btn-sm shiny">
                                        <i class="fa fa-edit"></i> <button class="layui-btn"><i class="layui-icon">&#xe642;</i></button>

                                    </a>
                               
                                    <a href="#" onClick="warning('确实要删除吗', '<?php echo url('admin/del',array('id'=>$vo['id'])); ?>')" class="btn btn-danger btn-sm shiny">
                                        <i class="fa fa-trash-o"></i> <button onclick=" layer.confirm('确定删除？', {
             btn: ['确定','取消'] //按钮
        },  function(){
                 
               document.location.href='<?php echo url('sc/del',array('id'=>$vo['id'])); ?>';
            }, function(){
            layer.msg('已取消', {
            time: 2000, //2s后自动关闭
       
        });
});"  class="layui-btn layui-btn-danger"><i class="layui-icon">&#xe640;</i></button>
                                  </a>
            </td>
      </tr> 
     
        <?php endforeach; endif; else: echo "" ;endif; ?>
     </tbody> 


    </table> <div class="layui-col-md12" style="float: right;">
        <div id="layui-laypage-1" class="layui-box layui-laypage layui-laypage-default"><?php echo $list; ?></div>
    </div>
 

   </div>    











  </div>
 </body>

</html>