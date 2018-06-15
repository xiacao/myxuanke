<?php
namespace app\admin\controller;
use app\admin\model\Sc as ScModel;
use app\admin\controller\Common;
class Sc extends Common
{

    public function lst(){
   
  $model= new  ScModel();
        $list =  ScModel::paginate(10);
        $this->assign('list',$list);
        return $this->fetch();
}
    public function add(){//添加选课信息
        if(request()->isPost()){
            $data['cno']=input('cno');

           $data['sno']=input('sno');
           
            $add=db('sc')->insert($data);
            if($add){
                $this->success('添加成功！',url('lst'));
            }else{
                $this->error('添加失败！');
            }
        }
        $list=db('course')->select();//查询更新
         $lists=db('student')->select();//查询更新
        $this->assign('list',$list);
        $this->assign('lists',$lists);
        return view();
    }

    public function edit(){
        if(request()->isPost()){
            $data=input('post.');
            $validate = \think\Loader::validate('Sc');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->getError());
            }

            $Sc=new ScModel();
           
            $save=$Sc->save($data,['id'=>input('id')]);
            if($save !== false){
                $this->success('修改成功！',url('lst'));
            }else{
                $this->error('修改失败！');
            }
            return;
        }
        $scs=ScModel::find(input('id'));
        $this->assign('scs',$scs);
        $list=db('course')->select();//查询更新
         $lists=db('student')->select();//查询更新
        $this->assign('list',$list);
        $this->assign('lists',$lists);
        return view();
    }

    public function del(){
        $del=ScModel::destroy(input('id'));
        if($del){
           $this->success('删除成功！',url('lst')); 
        }else{
            $this->error('删除失败！');
        }
    }

    




   

	












}
