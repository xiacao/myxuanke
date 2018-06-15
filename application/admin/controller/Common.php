<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Common extends Controller
{
   public function _initialize(){
        if(!session('id') || !session('aname')){
           $this->error('您尚未登录系统',url('login/index')); 
        }

  
        
    }


}
