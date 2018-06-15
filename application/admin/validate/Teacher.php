<?php
namespace app\admin\validate;
use think\Validate;
class Teacher extends Validate
{

        protected $rule=[
        'tno'=>'unique:teacher|require',
         'tname'=>'require',
         'tdept'=>'require',
    ];


    protected $message=[
        'tno.require'=>'工号不得为空！',
        'tno.unique'=>'工号不得重复！',
        // 'title.max'=>'文章标题长度大的大于25个字符！',
        'tname.require'=>'姓名不得为空！',
         'tdept.require'=>'系别不得为空！',
       
    ];

    protected $scene=[
        'add'=>['tno','tname','tdept'],
        'edit'=>['tno','tname','tdept'],
    ];







    

    




   

	












}
