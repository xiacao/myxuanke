<?php
namespace app\index\controller;
use app\index\model\Course as CourseModel;
use app\index\controller\Common;
class Course extends Common//学生选课
{


  public function index()//选课信息
    {
        $sno= session('name');    
        $courses=CourseModel::paginate(3);

        $this->assign('courses',$courses);
        $snocno=db('sc')->where('sno',$sno)->select();
        //用sno找cno，在course中有此cno已选，无未选
        $arrlength=count($snocno);
        for($x=0;$x<$arrlength;$x++)
        {
            $y=$x+1;
            $cout[$y]=$snocno[$x]['cno'];
        }

        $cout[0]=$arrlength;//数组第一个数据为数组长度
       
        $this -> view -> assign('cout', $cout);
        return view(); 
        
    }

   

    public function add(){//选课
        //判断所点击的id 根据id即课程编号 在sc表中添加并加入sno 成绩不用管；
        $id=input('id');
        $sno= session('name');    
        $datas['cno']=$id;
        $datas['sno']=$sno;
        if(\think\Db::name('sc')->insert($datas))
        {
          $this->success('选课成功！','index');
        }
        else
        {
          $this->error('选课失败！');
        }
         
    }
    public function del(){//退选
     //判断所点击的id 根据id即课程编号 在sc表中删除，判断如果成绩有值则判断无法退选；
      $id=input('id');  
      $sno= session('name');  

      $map['sno'] = $sno;
      $map['cno'] = $id;
      $scid=db('sc')->where($map)->field('id')->select();
      if(db('sc')->delete($scid[0]))
      {
          $this->success('退选成功！','index');
      }
      else
      {
          $this->error('退选失败！');
      }
        
       
    }

    public function edit(){
       
    }

}
