<?php
namespace app\index\controller;
use app\index\model\Cate as CateModel;

use app\index\model\Student as StudentModel;
use app\index\controller\Common;
class Student extends Common
{

    public function index()
    {
       
         return view();
    }

     public function data()//个人信息修改
    {
        $id= session('id');
        $students=db('student')->find($id);
    
        if(request()->isPost()){
            $da=[
                'id'=>$id,
                'sno'=>input('sno'),
                'sname'=>input('sname'),
                'ssex'=>input('ssex'),
                'pwd'=>input('pwd'),
            ];
            $validate = \think\Loader::validate('Student');
            if(!$validate->scene('da')->check($da)){
               $this->error($validate->getError()); die;
            }
            $save=db('student')->update($da); 
            if($save !== false){
                $this->success('修改信息成功！','data');
            }else{
                $this->error('修改信息失败！');
            }
            return;
        }
        $this->assign('students',$students);
        return view();
    }

    public function lst(){
        $students=StudentModel::paginate(5);
        $this->assign('students',$students);
        return view();
    }

    public function del(){
    
    }

  public function add()
    {   
       
    }
}