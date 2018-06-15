<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\wamp64\www\myxuanke\public/../application/index\view\sc\index.html";i:1527519485;s:71:"D:\wamp64\www\myxuanke\public/../application/index\view\public\top.html";i:1526027236;s:75:"D:\wamp64\www\myxuanke\public/../application/index\view\public\stuleft.html";i:1508500320;}*/ ?>
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

    layui.use(['element', 'layer'], function() {
        var element = layui.element(),
            layer = layui.layer;
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
        <li class="layui-nav-item layui-this"><a href="javascript:switchMy(1);">选课系统</a>
        </li>

        <li class="layui-nav-item ">
            <a href="javascript:;" class="admin-header-user">
                <img src="__index__/images/Head.jpg" width="40" height="40" class="layui-circle" />
                <span>&nbsp;<?php echo \think\Request::instance()->session('name'); ?></span></a>
            <dl class="layui-nav-child">
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
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">个人选课</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('course/index'); ?>"><i class="layui-icon">&#xe63a;</i> 选课信息</a></dd>
                           
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">课程信息</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('sc/index'); ?>"><i class="layui-icon">&#xe63a;</i>已选课程及成绩</a></dd>
                          
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed"><a href="javascript:;">信息管理</a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="<?php echo url('student/data'); ?>"><i class="layui-icon">&#xe63a;</i> 个人信息</a></dd>
                            
                        </dl>
                    </li>
                </ul>
               
            </div>
        </div> 
        <!--侧栏END-->
        <!--内容-->
        <div class="layui-body layui-tab-content" id="connn" style="bottom: 0px;">
             <span class="layui-breadcrumb">
                    <a href="<?php echo url('student/index'); ?>">首页</a>
                  
                    <a href="#"><cite>课程信息</cite></a>
                </span>
                <br><br>
                <table class="layui-table" lay-skin="row" lay-even=""> 
                <colgroup> 
                    <col width="15%" /> 
                    <col width="15%" /> 
                    <col width="15%" /> 
                    <col width="15%" /> 
                    <col width="15%" /> 
                    <col /> 
                 </colgroup> 
                <thead> 
                    <tr> 
                        <th style=" text-align:center;">课程编号</th> 
                         <th style=" text-align:center;">课程名</th> 
                        <th style=" text-align:center;">授课老师</th> 
                       
                        <th style=" text-align:center;">学分</th>
                         <th style=" text-align:center;" >课程描述</th>  
        
                       
                        <th style=" text-align:center;">成绩</th> 
                         
                    </tr> 
                </thead> 
                <tbody>   <?php if(is_array($snocourse2) || $snocourse2 instanceof \think\Collection || $snocourse2 instanceof \think\Paginator): $i = 0; $__LIST__ = $snocourse2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <tr> 
                        <td style=" text-align:center;"><?php echo $vo['cno']; ?></td> 
                        <td style=" text-align:center;"><?php echo $vo['cname']; ?></td> 
                        <td style=" text-align:center;"><?php echo $vo['tname']; ?></td> 
                        <td style=" text-align:center;"><?php echo $vo['ccredit']; ?></td> 
                         <td style=" text-align:center;"><?php echo $vo['cdescribe']; ?></td> 
                        <td style=" text-align:center;"><?php echo $vo['grade']; ?></td> 


                        
                        
                     
                       
                    </tr> 
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody> 
            </table> 
           
           
                
        </div>
    </div>
</body>
</html>
