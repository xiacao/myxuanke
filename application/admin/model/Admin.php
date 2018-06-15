<?php
namespace app\admin\model;
use think\Model;
use think\Db;
class Admin extends Model
{

    public function login($data){
        $captcha = new \think\captcha\Captcha();
        if (!$captcha->check($data['code'])) {
            return 4;
        } 
        $user=Db::name('admin')->where('aname','=',$data['aname'])->find();
        if($user){
            if($user['password'] == $data['password']){

                session('aname',$user['aname']);
                session('id',$user['id']);
                return 3; //信息正确
            }else{
                return 2; //密码错误
            }
        }else{
            return 1; //用户不存在
        }
    

    }


}