<?php
namespace app\index\controller;
use app\index\model\Admin as AdminModel;
use app\index\controller\Common;
class Admin extends Common
{

    public function lst()
    {  
	}

	public function add()
    {
       
	}

	public function edit($id)
    {
      
	}

    public function del($id){
        $admin=new AdminModel();
        $delnum=$admin->deladmin($id);
        if($delnum == '1'){
            $this->success('删除管理员成功！',url('lst'));
        }else{
            $this->error('删除管理员失败！');
        }
    }

    public function logout(){
        session(null); 
        $this->success('退出系统成功！',url('login/index'));
    }













}
