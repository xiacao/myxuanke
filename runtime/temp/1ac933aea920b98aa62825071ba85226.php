<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\wamp64\www\myxuanke\public/../application/admin\view\teacher\add.html";i:1527580372;s:71:"D:\wamp64\www\myxuanke\public/../application/admin\view\public\top.html";i:1508314157;s:72:"D:\wamp64\www\myxuanke\public/../application/admin\view\public\left.html";i:1527576101;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>选课管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="__ADMIN__/images/favicon.ico" type="image/x-icon" />
    
    <link rel="stylesheet" href="__index__/layui/css/layui.css" media="all">
    <script src="__ADMIN__/js/jquery-1.12.4.js" type="text/javascript"></script>
     <script src="__ADMIN__/layui/layui.js" charset="utf-8"></script>
    <link rel="stylesheet" href="__ADMIN__/css/myCss.css">
  
   
  
</head>

<body>
    <div class="layui-layout layui-layout-admin">
        <!--头部-->
         <script type="text/javascript">

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
        <div class="layui-body layui-tab-content" id="connn" style="bottom: 0px;">
             

                <span class="layui-breadcrumb">
                    <a href="<?php echo url('index/index'); ?>">首页</a>
                    <a href="<?php echo url('teacher/lst'); ?>">教师信息</a>
                    <a href="#"><cite>添加</cite></a>
                </span>
                <br><br>





        <form class="layui-form" role="form" action="" method="post">
            <div class="layui-form-item">
                <label class="layui-form-label ">工号</label>
                <div class="layui-input-block " style="width: 40%">
                     <input type="text" name="tno" lay-verify="title" autocomplete="off" placeholder="请输入学号" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item ">
                <label class="layui-form-label">姓名</label>
                <div class="layui-input-block" style="width: 40%">
                    <input type="text" name="tname" lay-verify="title" autocomplete="off" placeholder="请输入姓名" class="layui-input">
                </div>
            </div>
             <div class="layui-form-item">
                <label class="layui-form-label ">性别</label>
                <div class="layui-input-block " style="width: 40%">
                     <select name="tsex">
                                    <option value="男">男</option>
                                  
                                    <option value="女">女</option>
                                  
                    </select>
                     
                </div>
            </div>
           
           
             <div class="layui-form-item ">
                <label class="layui-form-label">所在系</label>
                <div class="layui-input-block" style="width: 40%">
                    <input type="text" name="tdept" lay-verify="title" autocomplete="off" placeholder="请输入专业" class="layui-input">
                </div>
            </div>
             <div class="layui-form-item ">
                <label class="layui-form-label">邮箱</label>
                <div class="layui-input-block" style="width: 40%">
                    <input type="text" name="temail" lay-verify="title" autocomplete="off" placeholder="请输入专业" class="layui-input">
                </div>
            </div>
            
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="demo1"> 立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
        </div>
</body>
<script>
    layui.use(['form'],function(){
        var form = layui.form();

        form.render();
    });
</script>
</html>
