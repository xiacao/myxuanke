<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'aname'  =>  'require|max:25|unique:admin',
        'password' =>  'require',
    ];
    protected $message  =   [
        'aname.require' => '管理员名称必须填写',
        'aname.max' => '管理员名称长度不得大于25位',
        'aname.unique' => '管理员名称不得重复',
        'password.require' => '管理员密码必须填写',

    ];
    protected $scene = [
        'add'  =>  ['aname'=>'require|unique:admin','password'],
        'edit'  =>  ['aname'=>'require|unique:admin','password'],
    ];
}