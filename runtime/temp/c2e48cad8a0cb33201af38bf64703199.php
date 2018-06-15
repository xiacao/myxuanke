<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:72:"D:\wamp64\www\myxuanke\public/../application/admin\view\index\index.html";i:1507894872;s:71:"D:\wamp64\www\myxuanke\public/../application/admin\view\public\top.html";i:1508314157;s:72:"D:\wamp64\www\myxuanke\public/../application/admin\view\public\left.html";i:1527575965;}*/ ?>
﻿
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>选课管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="__index__/images/favicon.ico" type="image/x-icon" />
    
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
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">管理员管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('admin/lst'); ?>"><i class="layui-icon">&#xe63a;</i> 管理员信息</a></dd>
                            
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">课程管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('course/lst'); ?>"><i class="layui-icon">&#xe606;</i>
                                    课程信息</a></dd>
                            
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
                <div style="text-align:center; line-height:1000%; font-size:24px;">
                欢迎登陆选课系统<br>
                <p style="color:#f00;">ThinkPHP交流群①：484519446【满】 | 群②：480018415【满】  | 群③：198909858</p></div>
                </div>
           
                
        </div>
    </div>
</body>
</html>
