<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
use app\admin\controller\Common;
class Admin extends Common
{
   

 
    public function lst(){//管理员显示
         $admins=AdminModel::paginate(5);
        $this->assign('admins',$admins);
        return view();
    }

    public function del(){//删除
        $id=input('id');
        //dump($id);die;
        if($id != 1){
           // dump($id);
            if(db('admin')->delete(input('id'))){
                $this->success('删除管理员成功！','lst');
            }else{
                $this->error('删除管理员失败！');
            }
        }else{
            $this->error('初始化管理员不能删除！');
        }
    }
      public function edit(){//修改
        $id=input('id');
        $admins=db('admin')->find($id);
        if(request()->isPost()){
            $data=[
                'id'=>input('id'),
                'aname'=>input('name'),
            ];
           
            if(input('password')==''){
                 $this->error('修改管理员失败！输入密码为空！');
                $data['password']=input('password');
            }else{
                $data['password']=$admins['password'];
            }
            $validate = \think\Loader::validate('admin');
            if(!$validate->scene('edit')->check($data)){
               $this->error($validate->getError()); die;
            }
            $save=db('admin')->update($data);
            if($save !== false){
                $this->success('修改管理员成功！','lst');
            }else{
                $this->error('修改管理员失败！');
            }
            return;
        }
        $this->assign('admins',$admins);
        return $this->fetch();
    }

    public function add()//添加
    {   
       
        if(request()->isPost()){
            // dump($_POST); die;
            $data=[           
                'aname'=>input('aname'),
                'password'=>input('password'),
            ];
            $validate = \think\Loader::validate('Admin');//验证环节
            if(!$validate->scene('add')->check($data)){
               $this->error($validate->getError()); die;
            }
            if(db('admin')->insert($data)){//添加数据
                return $this->success('添加管理员成功！','lst');
            }else{
                return $this->error('添加管理员失败！');
            }
        }
 
        return $this->fetch();
    }
    public function logout(){//退出
        session(null); 
        $this->success('退出系统成功！',url('login/index'));
    }
}