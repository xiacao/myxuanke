<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\Admin;
class Login extends Controller
{
    public function index()
    {
        if(request()->isPost()){
         


        	$admin=new Admin();
        	$num=$admin->login(input('post.'));


            if($num==7){
                $this->error('请输入用户名');
            }if($num==8){
                $this->error('请输入登录密码！');
            }


        	if($num==1){
        		$this->error('用户不存在！');
        	}
        	if($num==4){

        		$this->success('登录成功！',url('teacher/index'));
        	}
            if($num==9){

                $this->success('登录成功！',url('student/index'));
            }
        	if($num==3){
        		$this->error('密码错误！');
        	}
        	return;
        }
        return view();


    }



}

