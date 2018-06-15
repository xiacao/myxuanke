<?php
namespace app\admin\validate;
use think\Validate;
class Student extends Validate
{

    protected $rule=[
        'sno'=>'unique:Student|require',
         
          'sname'=>'require',
    ];


    protected $message=[
        'sno.require'=>'学号不得为空！',
        'sno.unique'=>'学号不得重复！',
        // 'title.max'=>'文章标题长度大的大于25个字符！',
        'sname.require'=>'姓名不得为空！',
       
    ];

    protected $scene=[
        'add'=>['sno','sname'],
        'edit'=>['sno','sname'],
    ];





    

    




   

	












}
