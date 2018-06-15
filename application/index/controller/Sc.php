<?php
namespace app\index\controller;
use app\index\model\Sc as ScModel;
use app\index\controller\Common;

class Sc extends Common
{



    public function index()//已经选的课程信息查询
    {
        $sno= session('name');
        $snosc=db('Sc')->where('sno',$sno)->select();
       
        $snocourse2=db('Sc')
            ->alias('a')
            ->join('course c','  a.cno=c.cno')
            ->join('teacher b', 'c.tno = b.tno')
            //->field('a.id')
            ->where('a.sno',$sno)
          ->select();
          // dump($snocourse2);die;
            //->paginate(3); 
             $this -> view -> assign('snocourse2', $snocourse2);
        return view(); 
       /* $arrlength=count($snosc);
        for($x=0;$x<$arrlength;$x++)
        {   
          
            $snocourse[$x]=db('course')->where('cno',$snosc[$x]['cno'])->select();
            $snocourse[$x][0]['grade']=$snosc[$x]['grade'] ;
         
            $snotname =db('teacher')->where('tno',$snocourse[$x][0]['tno'])->find('tname');
            $snocourse[$x][0]['tname']=$snotname['tname'];
        }

        $snocourse2=array();
         if($arrlength!==0){
        foreach($snocourse as $value) 
        {
            foreach($value as $v) 
            {
                $snocourse2[]=$v; 
            }
        }
        unset($snocourse,$value,$v);
        }

        $this -> view -> assign('snocourse2', $snocourse2);*/
        return $this -> view -> fetch('index');

       
   
	}

    public function add(){
     
        return view();
    }

    public function edit(){
       
        return view();
    }

    public function del(){
        
    }

    




   

	












}
