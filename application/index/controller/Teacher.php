<?php
namespace app\index\controller;


use app\index\model\Teacher as TeacherModel;
use app\index\controller\Common;
class Teacher extends Common
{

    public function index()
    {
        return view();
    }
     public function data()//老师个人信息管理
    {
        $id= session('id');
        $teachers=db('teacher')->find($id);
        if(request()->isPost()){
            $da=[
                'id'=>$id,
                'tno'=>input('tno'),
                'tname'=>input('tname'),
                'tsex'=>input('tsex'),
              
                'pwd'=>input('pwd'),
            ];
            $validate = \think\Loader::validate('Teacher');
            if(!$validate->scene('da')->check($da)){
               $this->error($validate->getError()); die;
            }
            $save=db('teacher')->update($da); 
            if($save !== false){
                $this->success('修改信息成功！','data');
            }else{
                $this->error('修改信息失败！');
            }
            return;
        }
        $this->assign('teachers',$teachers);
        return view();
    }

    public function grade()
    {//成绩管理
        $id= session('id');  
        $teachers=db('teacher')->where('id',$id)->find();
        $tno=$teachers['tno'];
        //获取$tno  其为当前老师工号

      /* $coursedata=\think\Db::query("Select my_student.*,my_course.*,my_sc.*
       From my_course,my_sc,my_student
       Where my_course.tno= '$tno' and my_course.cno=my_sc.cno and my_sc.sno=my_student.sno");
       //获取当前老师的课程已选课的学生信息*/
 
$coursedata=db('sc')
            ->alias('a')
            ->join('course c','  a.cno=c.cno')
            ->join('student b', 'a.sno = b.sno')
            ->field('a.id,a.cno,c.cname,b.sno,b.sname,c.ccredit,b.sclass,a.grade')
            ->where('c.tno',$tno)
          
            ->paginate(3); 
            //dump($coursedata);die;
/*
dump($aa);die;*/

       if(request()->isPost()&&input('su')=='yes'){
            $scno=db('sc')->select();//获取选课表
            
            $arrlength=count($scno);//获取长度
            /*将id  $scno[$x]['id']转化为字符串再加前缀a利用input进行处理*/
            for($x=0;$x<$arrlength;$x++)
            {
                $data['id']=$scno[$x]['id'];
                $a=$scno[$x]['id'];
                $b=strval($a);  
                $c='a';
                $d=$c.$b;
              // dump($d); 
              $ds=input($d);
            //  dump($ds);
              if($ds=='')
              {
                 continue;
               
                }
                else
                {
                    $data['grade']=input($d);
                }
               // dump($data);die;
                $add=db('sc')->update($data);

              //每天学生成绩记录依次更新
            
            }
                $this->success('修改成绩成功！！！！！！！！！！！！！！！！',url('grade'));
        }
        $this->assign('coursedata',$coursedata);
        return view();
    }

    public function lst(){//当前选择课程的学生信息
        $id= session('id');  
        $teachers=db('teacher')->where('id',$id)->find();
        $tno=$teachers['tno'];
        //$tno  为当前老师工号
     /*   $coursedata=\think\Db::query("Select my_student.*,my_course.*,my_sc.*
        From my_course,my_sc,my_student
        Where my_course.tno= '$tno' and my_course.cno=my_sc.cno and my_sc.sno=my_student.sno"); */

        $coursedata=db('sc')
            ->alias('a')
            ->join('course c','  a.cno=c.cno')
            ->join('student b', 'a.sno = b.sno')
            ->field('a.id,a.cno,c.cname,b.sno,b.sname,c.ccredit,b.sclass,a.grade,b.ssex,b.sdept')
            ->where('c.tno',$tno)
            ->paginate(5); 



        $this->assign('coursedata',$coursedata);
        return view();
    }

    public function del(){
        if(TeacherModel::destroy(input('id'))){
            $this->success('删除成功！',url('lst'));
        }else{
            $this->error('删除失败！');
        }
    }

  
       
       
}