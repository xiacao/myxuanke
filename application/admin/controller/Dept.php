<?php
namespace app\admin\controller;
use app\admin\model\Dept as DeptModel;


use app\admin\controller\Common;
class Dept extends Common
{

    public function lst(){
         $Depts=DeptModel::paginate(5);
        $this->assign('depts',$Depts);
        return view();
    }

   public function del(){//删除course中tno  以及对应的sc表中的课程号
        $deltno= db('Dept')->where('id',input('id'))->field('tno')->find();
        $delcno= db('course')->where('tno',$deltno['tno'])->field('cno')->find();
   // dump($deltno);dump($delcno);die;
   
        if(!$deltno)
        {
            db('course')->where('tno',$deltno['tno'])->delete();
        }
        if(!$delcno){
            db('sc')->where('cno',$delcno['cno'])->delete();
        }
        if(db('Dept')->where('id',input('id'))->delete())
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
           
           
            if(db('Dept')->insert($data)){//添加数据库
                return $this->success('添加老师成功！','lst');
            }else{
                return $this->error('添加老师失败！');
            }
            
        
       
      
        }
 
        return $this->fetch();
    }
}