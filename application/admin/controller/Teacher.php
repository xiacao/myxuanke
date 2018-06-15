<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;

use app\admin\model\Teacher as TeacherModel;
use app\admin\controller\Common;
class Teacher extends Common
{

    public function lst(){
         $teachers=TeacherModel::paginate(5);
        $this->assign('teachers',$teachers);
        return view();
    }

   public function del(){//删除course中tno  以及对应的sc表中的课程号
        $deltno= db('teacher')->where('id',input('id'))->field('tno')->find();
        $delcno= db('course')->where('tno',$deltno['tno'])->field('cno')->find();
   // dump($deltno);dump($delcno);die;
   
        if(!$deltno)
        {
            db('course')->where('tno',$deltno['tno'])->delete();
        }
        if(!$delcno){
            db('sc')->where('cno',$delcno['cno'])->delete();
        }
        if(db('teacher')->where('id',input('id'))->delete())
        {
            $this->success('删除成功！',url('lst'));
        }
        else
        {
            $this->error('删除失败！');
        }
    }

  public function add()
    {   
       
         if(request()->isPost()){
            // dump($_POST); die;
            $data=[
                'tno'=>input('tno'),
               
                'tname'=>input('tname'),
                'tsex'=>input('tsex'),
               
               'tdept'=>input('tdept'),
               
                'temail'=>input('temail'),
                'pwd'=>'123456',
            ];
         
           
            if(db('teacher')->insert($data)){//添加数据库
                return $this->success('添加老师成功！','lst');
            }else{
                return $this->error('添加老师失败！');
            }
            
        
       
      
        }
 
        return $this->fetch();
    }
        public function edit()
    {
      
           
      // $admins=
       $teacher=TeacherModel::where('id',input('id'))->find();
    
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('teacher');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
           //$student=new StudentModel();
             $data['id']=$teacher['id'];
           
          //var_dump( $data);die;
            $savenum=db('teacher')->update($data);
            if($savenum !== false){
                $this->success('修改成功！',url('lst'));
            }else{
                $this->error('修改失败！');
            }
            return;
        }
        
        if(!$teacher){
            $this->error('该老师不存在');
        }
   
    $this->assign('teacher',$teacher);
  //  var_dump($depts);die;
 
   
        return view();
    }
}