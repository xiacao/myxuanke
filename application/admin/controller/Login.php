<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin;
class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
           // $this->check(input('code'));
        	$admin=new Admin();
        	$num=$admin->login(input('post.'));
        	if($num==1){
        		$this->error('用户不存在！');
        	}else
        	if($num==3){
        		$this->success('登录成功,正在为你跳转！',url('index/index'));
        	}else
        	if($num==2){
        		$this->error('密码错误！');
        	}else
            if ($num==4){
                    $this->error('验证码错误！');
            }
        	return;
        }
        return view();
    }


  
   /* public function check($code='')
    {
        if (!captcha_check($code)) {
            $this->error('验证码错误');
        } else {
            return true;
        }
    }*/

}
