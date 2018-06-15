<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Admin extends Model
{

   public function addadmin($data){
   

   }

   public function getadmin(){
   
   }

   public function saveadmin($data,$admins){
       
    
    }

    public function deladmin($id){
      
    }

    public function login($data){
     //  dump($_POST); die;  判断登录信息
        if (!$data['no']) {
            return 7;
        }
        if(!$data['password']) {
            return 8;
            $this->error('请输入登录密码！');
        }

        if($data['role']=='teacher')//如果选择老师登录
        {
            $ro=Db::name('teacher')->where('tno','=',$data['no'])->find();
            if(!$ro)
            {
                return 1;
            }
            if($ro['pwd']==$data['password']){
                session('id', $ro['id']);
                session('name', $ro['tno']);
                return 4; //登录密码正确的情况   
            }
        }

        if($data['role']=='student')//学生登录
        {
            $ro=Db::name('student')->where('sno','=',$data['no'])->find();
            if(!$ro)
            {
                return 1;
            }
            if($ro['pwd']==$data['password']){
                session('id', $ro['id']);
                session('name', $ro['sno']);
                return 9; //登录密码正确的情况
            }
        }
    }

}
