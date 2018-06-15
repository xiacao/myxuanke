<?php
namespace app\admin\controller;
use app\admin\model\Student as StudentModel;
use app\admin\model\Dept as DeptModel;
use app\admin\controller\Common;
class Student extends Common
{

    public function lst(){
        $student=StudentModel::paginate(10);
        $this->assign('students',$student);
          $coursedata=db('class')
            ->alias('a')
            ->join('dept c','  a.did=c.did')
            ->field('c.dname');
             $this->assign('dept', $coursedata);
         return $this->fetch();
    }
    public function del(){
    //此处删除需要关联，删除该学生的同时必须删除该学生所有的选课信息
       
        $delsno= db('student')->where('id',input('id'))->field('sno')   ->find();
        if(!$delsno)
        {
            db('sc')->where('sno',$delsno['sno'])->delete();
        }
        if(StudentModel::destroy(input('id')))
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
        if(request()->isPost())
        {
            $data=[
                'sno'=>input('sno'),
                'sname'=>input('sname'),
                'sclass'=>input('sclass'),
                'ssex'=>input('ssex'),
               
                'pwd'=>'123456',//默认密码
             
            ];
            $validate = \think\Loader::validate('Student');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
            if(db('student')->insert($data))
            {
                return $this->success('添加学生成功！','lst');
            }
            else
            {
                return $this->error('添加学生失败！');
            }           
        }
      
        return $this->fetch();
    }
    public function edit()
    {
      
           
      // $admins=
       $students=StudentModel::where('id',input('id'))->find();
    
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Student');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }
           //$student=new StudentModel();
             $data['id']=$students['id'];
           
          //var_dump( $data);die;
            $savenum=db('student')->update($data);
            if($savenum !== false){
                $this->success('修改成功！',url('lst'));
            }else{
                $this->error('修改失败！');
            }
            return;
        }
        
        if(!$students){
            $this->error('该学生不存在');
        }
   
    $this->assign('student',$students);
  //  var_dump($depts);die;
 
   
        return view();
    }
}