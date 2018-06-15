<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;

use app\admin\model\Course as CourseModel;
use app\admin\controller\Common;
class Course extends Common
{

    public function lst(){
         $courses=CourseModel::paginate(5);
        $this->assign('courses',$courses);
        return view();
    }

   public function add()//添加课程
    {     
         if(request()->isPost()){
            // dump($_POST); die;
            $data=[
                'cno'=>input('cno'),
           
                'tno'=>input('tno'),
                'cname'=>input('cname'),
                'ccredit'=>input('ccredit'),
              
                'cdescribe'=>input('cdescribe'),
              
             
            ];
            if(db('course')->insert($data)){//添加数据库
                return $this->success('添加课程成功！','lst');
            }else{
                return $this->error('添加课程失败！');
            }
        }
        
         $lists=db('teacher')->select();//查询更新
        $this->assign('lists',$lists);

        return $this->fetch();
    }
    public function edit(){
        $id=input('id');
        $courses=db('course')->find($id);
        if(request()->isPost()){
            $data=[
               'cno'=>input('cno'),
           
                'tno'=>input('tno'),
                'cname'=>input('cname'),
                'ccredit'=>input('ccredit'),
              
                'cdescribe'=>input('cdescribe'),
            ];
            
            $validate = \think\Loader::validate('Course');
            if(!$validate->scene('edit')->check($data)){
               $this->error($validate->getError()); die;
            }
            $save=db('course')->update($data);
            if($save !== false){
                $this->success('修改课程成功！','lst');
            }else{
                $this->error('修改课程失败！');
            }
            return;
        }
        $lists=db('teacher')->select();//查询更新
        $this->assign('lists',$lists);

        $this->assign('courses',$courses);
        return $this->fetch();
    }

     public function del(){//删除
        $id=input('id');
        //寻找此id的cno主键
        $cno=db('course')->where('id',$id)->find(); 
        //dump($id);die;
        if($id != 1){
           // dump($id);
            if(db('course')->where('id',$id)->delete()){
               // dump($cno);
                db('sc')->where('cno',$cno['cno'])->delete();
                $this->success('删除课程成功！','lst');
            }else{
                $this->error('删除课程失败！');
            }
        }else{
            $this->error('初始化管理员不能删除！');
        }
    }
}