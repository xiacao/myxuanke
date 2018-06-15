<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"D:\wamp64\www\myxuanke\public/../application/index\view\login\index.html";i:1508499202;}*/ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>后台登陆</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="__index__/images/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="__index__/layui/css/layui.css" />
    <link rel="stylesheet" type="text/css" href="__index__/css/loginCss.css" />

</head>
<body class="login-body">
    <div class="login-box">
        <form class="layui-form layui-form-pane"  method="post">
        <div class="layui-form-item">
            <h3>
                <span>选课系统</span><br />
                <span class="version">提示：使用360浏览器访问本系统，请切换极速模式！</span></h3>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                用户名：</label>
            <div class="layui-input-inline">
                <input type="text" name="no" autocomplete="off" class="layui-input" lay-verify="account"
                    placeholder="请输入用户名" maxlength="20" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">
                密码：</label>
            <div class="layui-input-inline">
                <input type="password" name="password" class="layui-input" lay-verify="password" placeholder="请输入密码"
                    maxlength="20" />
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block" style="background: #fff;margin-left: 0px;width: 93.5%">
                <input name="role" title="学生" type="radio" checked="" value="student">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input name="role" title="老师" type="radio" value="teacher" >
            
            </div>
        </div>
     
        <div class="layui-form-item">
            <button type="reset" class="layui-btn btn-reset layui-btn-danger">
                重置</button>
            <button class="layui-btn btn-submit logSubmit" type="submit">
                立即登录</button>
        </div>
        </form>
    </div>
    <script type="text/javascript" src="__index__/layui/layui.js"></script>
    <script type="text/javascript">

        layui.use(['form', 'layer'], function () {
            var $ = layui.jquery, form = layui.form(), layer = layui.layer;
            form.render();
            // 登录表单验证
            form.verify({
                account: function (value) {
                    if (value == "") {
                        return "请输入用户名";
                    }
                },
                password: function (value) {
                    if (value == "") {
                        return "请输入密码";
                    }
                },
                verify: function (value) {
                    if (value == "") {
                        return "请输入验证码";
                    }
                }
            });

        })

    </script>
</body>
</html>
